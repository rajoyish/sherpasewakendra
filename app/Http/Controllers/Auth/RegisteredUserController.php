<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rules\File;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'photo' => ['required', File::image()->max(1024)],
            'id_doc' => ['required', File::image()->max(1024)],
            'role_id' => ['required', 'int:1,2'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
        ]);

        if ($request->hasFile('photo')) {
            $user->update([
                'photo' => $request->file('photo')->store('images/users'),
            ]);
        }

        if ($request->hasFile('id_doc')) {
            $user->update([
                'id_doc' => $request->file('id_doc')->store('images/docs'),
            ]);
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route(auth()->user()->getRedirectRoute());
    }
}
