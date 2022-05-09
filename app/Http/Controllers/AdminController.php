<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use mtgsdk\Card;

use App\Models\Decks;
use App\Models\Cards;
use App\Models\CardRel;
use App\Models\Accounts;


class AdminController extends Controller {
    public function show() {
        return view('admin');
    }
}
