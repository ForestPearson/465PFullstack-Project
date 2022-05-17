<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Decks;
use App\Models\Cards;
use App\Models\CardRel;
use App\Models\Accounts;

class ProfileController extends Controller {
    public function show() {
        $firstName = 'tempFirst';
        $lastName = 'tempLast';
        $email = 'email@temp.com';
        return view('profile', compact('firstName', 'lastName', 'email'));
    }

    public function signUp() {
        return view('signup');
    }

}