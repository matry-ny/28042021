<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function login()
    {

    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:5|max:255',
            'email' => 'required|email:rfc,dns',
            'password' => 'min:3|required_with:repeatPassword|same:repeatPassword',
            'repeatPassword' => 'min:3',
        ]);

        var_dump($validated);exit;
    }
}
