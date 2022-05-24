<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Decks;
use App\Models\Cards;
use App\Models\CardRel;
use App\Models\Accounts;

class CardController extends Controller {

    public function show() {
        return view('browse');
    }

    public function getCardByName(Request $request) {
        $card_name = $request->input('card_name');
        $card = Cards::where('card_name', $card_name)->first();
        if(!$card) {
            return response()->json(['error' => 'Card not found.'], 404);
        }
        return response()->json($card);
    }

    public function getCardsByColor(Request $request) {
        $color = $request->input('color');
        $cards = Cards::where('colors', $color)->get();
        if(!$cards) {
            return response()->json(['error' => 'No cards found.'], 404);
        }
        return response()->json($cards);
    }

    public function getCardsBySet(Request $request) {
        $set = $request->input('card_set');
        $cards = Cards::where('card_set', $set)->get();
        if(!$cards) {
            return response()->json(['error' => 'No cards found.'], 404);
        }
        return response()->json($cards);
    }

    public function getCardsByType(Request $request) {
        $type = $request->input('type');
        $cards = Cards::where('type', $type)->get();
        if(!$cards) {
            return response()->json(['error' => 'No cards found.'], 404);
        }
        return response()->json($cards);
    }

    public function getCardsByRarity(Request $request) {
        $rarity = $request->input('rarity');
        $cards = Cards::where('rarity', $rarity)->get();
        if(!$cards) {
            return response()->json(['error' => 'No cards found.'], 404);
        }
        return response()->json($cards);
    }
}