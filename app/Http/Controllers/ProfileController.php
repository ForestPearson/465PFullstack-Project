<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Decks;
use App\Models\Cards;
use App\Models\CardRel;
use App\Models\Accounts;

class ProfileController extends Controller {
    public function show() {
        $user = Auth::user();
        $firstName = $user->first_name;
        $lastName = $user->last_name;
        $email = $user->email;
        return view('profile', compact('firstName', 'lastName', 'email'));
    }

    public function changeProfile(Request $request) {
        $user = Auth::user();
        $firstName = $request->input('first_name');
        $lastName = $request->input('last_name');
        $email = $request->input('email');
        $user->first_name = $firstName;
        $user->last_name = $lastName;
        $user->email = $email;
        $user->save();
        return redirect('/profile');
    }

    public function signUp() {
        return view('signup');
    }

}