<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search_key = $request['search'] ?? "";

        if ($search_key != "") {
            $users = User::latest()
                ->whereFullText('name', $search_key)
                ->paginate(10);
        } else {
            $users = User::latest()
                ->paginate(10);
        }

        return view('users.index', [
            'users' => $users,
            'search_key' => $search_key
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
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

        if (!$request->hasFile('photo') || $request->hasFile('id_doc')) {
            $user->update([
                'photo' => $user->photo,
                'id_doc' => $user->id_doc,
            ]);
        }

        $user->update([
            'name' => $request->name,
            'is_verified' => $request->is_verified,
        ]);

        return to_route('users.index')->with('success', 'The user is updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (condition) {
            # code...
        }
        Storage::delete($user->photo);
        Storage::delete($user->id_doc);
        $user->delete();

        return to_route('users.index')->with('success', 'The user is deleted.');
    }
}
