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
        dd($user);
        $firstName = $user->first_name;
        $lastName = $user->last_name;
        $email = $user->email;
        return view('profile', compact('firstName', 'lastName', 'email'));
    }

    public function signUp() {
        return view('signup');
    }

}