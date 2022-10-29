<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function index(Request $request)
    {
        $search_key = $request['search'] ?? '';

        if ($search_key != '') {
            $users = User::latest()
                ->whereFullText('name', $search_key)
                ->paginate(10);
        } else {
            $users = User::latest()
                ->paginate(10);
        }

        return view('admin.users.index', [
            'users' => $users,
        ]);
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric'],
            'address' => ['required', 'string', 'max:255'],
            'is_verified' => ['boolean'],
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
            'is_verified' => $request->is_verified,
        ]);

        return to_route('admin.users.index')->with('success', 'The user is updated.');
    }

    public function destroy(User $user)
    {
        Storage::delete($user->photo);
        Storage::delete($user->id_doc);
        $user->delete();

        return to_route('admin.users.index')->with('success', 'The user is deleted.');
    }
}
