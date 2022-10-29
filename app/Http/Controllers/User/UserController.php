<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rules\File;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function show(User $user)
    {
        if (! $user->is(Auth::user())) {
            abort(403);
        }

        return view('user.users.user', compact('user'));
    }

    public function edit(User $user)
    {
        if (! $user->is(Auth::user())) {
            abort(403);
        }

        return view('user.users.edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user)
    {
        if (! $user->is(Auth::user())) {
            abort(403);
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric'],
            'address' => ['required', 'string', 'max:255'],
            'photo' => [File::image()->max(1024)],
            'id_doc' => [File::image()->max(1024)],
        ]);

        if ($request->hasFile('photo')) {
            Storage::delete($user->photo);
            $user->update([
                'photo' => $request->file('photo')->store('images/users'),
            ]);
        }

        if ($request->hasFile('id_doc')) {
            Storage::delete($user->id_doc);
            $user->update([
                'id_doc' => $request->file('id_doc')->store('images/docs'),
            ]);
        }

        if (! $request->hasFile('photo') || $request->hasFile('id_doc')) {
            $user->update([
                'photo' => $user->photo,
                'id_doc' => $user->id_doc,
            ]);
        }

        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return to_route('user.users.show', $user)->with('success', 'The user is updated.');
    }

    public function changePassword()
    {
        return view('user.users.change-password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if (! Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with('error', 'The password did not match.');
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'The password is changed.');
    }
}
