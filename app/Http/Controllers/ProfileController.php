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
        $account = Accounts::where('account_id', '=', auth()->user()->account_id)->first();
        $decks = Decks::where('account_id', '=', auth()->user()->account_id)->get();

        return view('profile', compact('account', 'decks', 'cards', 'card_rel'));
    }

}