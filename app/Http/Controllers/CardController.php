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
        $allCards = Cards::distinct('card_name')->orderBy('card_name')->paginate(50);

        return view('browse', compact('allCards'));
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
        $colors = explode(",", $request->input('color'));
        $colorCount = count($colors);
        
        if($colorCount == 1) {
            $cards = Cards::where('colors', $colors[0])->get();
            return response()->json($cards);
        } 
        if($colorCount == 2) {
            $cards = Cards::where('colors', 'like', '%' . $colors[0] . '%')
                          ->where('colors', 'like', '%' . $colors[1] . '%')
                          ->whereRaw('LENGTH(colors) = ?', strlen($colors[0]) + strlen($colors[1]))
                          ->get();
            return response()->json($cards);
        }
        if($colorCount == 3) {
            $cards = Cards::where('colors', 'like', '%' . $colors[0] . '%')
                          ->where('colors', 'like', '%' . $colors[1] . '%')
                          ->where('colors', 'like', '%' . $colors[2] . '%')
                          ->whereRaw('LENGTH(colors) = ?', strlen($colors[0]) + strlen($colors[1]) + strlen($colors[2]))
                          ->get();
            return response()->json($cards);
        }
        if($colorCount == 4) {
            $cards = Cards::where('colors', 'like', '%' . $colors[0] . '%')
                          ->where('colors', 'like', '%' . $colors[1] . '%')
                          ->where('colors', 'like', '%' . $colors[2] . '%')
                          ->where('colors', 'like', '%' . $colors[3] . '%')
                          ->whereRaw('LENGTH(colors) = ?', strlen($colors[0]) + strlen($colors[1]) + strlen($colors[2]) + strlen($colors[3]))
                          ->get();
            return response()->json($cards);
        }
        if($colorCount == 5) {
            $cards = Cards::where('colors', 'like', '%' . $colors[0] . '%')
                          ->where('colors', 'like', '%' . $colors[1] . '%')
                          ->where('colors', 'like', '%' . $colors[2] . '%')
                          ->where('colors', 'like', '%' . $colors[3] . '%')
                          ->where('colors', 'like', '%' . $colors[4] . '%')
                          ->whereRaw('LENGTH(colors) = ?', strlen($colors[0]) + strlen($colors[1]) + strlen($colors[2]) + strlen($colors[3]) + strlen($colors[4]))
                          ->get();
            return response()->json($cards);
        }
        return response()->json(['error' => 'No cards found.'], 404);
        
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