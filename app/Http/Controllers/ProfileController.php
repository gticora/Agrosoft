<?php

namespace Agrososft\Http\Controllers;

use Agrososft\User;
use Agrososft\Cargo;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = User::first(); //or auth()->user()

        return view('profile.edit', [
            'user' => $user,
            'cargos' => Cargo::orderBy('title')->get(),
        ]);
    }

    public function update(Request $request)
    {
        $user = User::first(); //or auth()->user()

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $user->profile->update([
            'bio' => $request->bio,
            'twitter' => $request->twitter,
            'cargo_id' => $request->cargo_id,
        ]);

        return back();
    }
}
