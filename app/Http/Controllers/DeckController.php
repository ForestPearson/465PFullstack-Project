<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\Decks;
use App\Models\Cards;
use App\Models\CardRel;
use App\Models\Accounts;

class DeckController extends Controller {

    public function show() {
        $user = Auth::user();
        $userDecks = Decks::where('account_id', $user->id)->get();
        return view('decks', compact('user', 'userDecks'));
    }

    public function modifyDeck(Request $request) {
        $user = Auth::user();
        $deck_id = $request->deck_id;
        $deck = Decks::where('id', $deck_id)->first();
        return view('modify', compact('user', 'deck'));
    }

    public function getUserDecks() {
        $user = Auth::user();
        $id = $user->id;
        $alldecks = Decks::where('account_id', $id)->get();
        $decks = json_encode($alldecks);

        return view('browse', compact('decks'));
    }

    public function getDeckByName(Request $request) {
        $user = Auth::user();
        $deck_name = $request->input('deck_name');
        
        $deck = Decks::where('name', 'like', '%' . $deck_name . '%')->first();
        if(!$decks) {
            return response()->json(['error' => 'Deck not found.'], 404);
        }
        if($deck->account_id != $user->id) {
            return response()->json(['error' => 'Not authorized.'], 404);
        }
        return response()->json($decks);
    }

    public function getDeckCards(Request $request) {
        $user = Auth::user();
        $deck_name = $request->input('deck_name');
        $deck = Decks::where('name', $deck_name)->first();
        if(!$decks) {
            return response()->json(['error' => 'Deck not found.'], 404);
        }
        if($deck->account_id != $user->id) {
            return response()->json(['error' => 'Not authorized.'], 404);
        }
        return response()->json($decks->cards->deck($deck->id));
        //return response()->json($decks->cards);
    }

    public function createDeck(Request $request) {
        $user = Auth::user();
        $deck_name = $request->input('deck_name');
        $deck_art = $request->input('deck_art');
        $deck_model = new Decks;
        $deck_model->name = $deck_name;
        $deck_model->account_id = $user->id;
        $deck_model->preview = $deck_art;
        $deck_model->save();
        return redirect()->route('decks');
    }

    public function getDeckCard(Request $request) {
        $user = Auth::user();
        $multiverseid = $request->input('multiverseid');
        $deck_name = $request->input('deck_name');
        $card = Card::where('multiverseid',$multiverseid)->first();
        $deck = Decks::where('name', 'like', '%' . $deck_name . '%')->get();
        if(!$decks) {
            return response()->json(['error' => 'Deck not found.'], 404);
        }
        if($deck->account_id != $user->id) {
            return response()->json(['error' => 'Not authorized.'], 404);
        }
        return response()->json($decks->cards->card($card->id));
        //return response()->json($decks->cards);
    }

    public function addCardsToDeck(Request $request) {
        $multiverseid = $request->input('multiverseid');
        $deck_id = $request->input('deck_id');
        $card_model = new CardRel;
        $card_model->deck_id = $deck_id;
        $card_model->card_id = $multiverseid;
        $card_model->save();
        return response()->json('Card added');
    }

    public function deleteCard(Request $request) {
        $multiverseid = $request->input('multiverseid');
        $deck_id = $request->input('deck_id');
        $card_rel = CardRel::where('deck_id', $deck_id)->where('card_id', $multiverseid)->first();
        $card_rel->delete();
        return redirect()->back();
    }

    public function deleteDeck($deck_id) {
        $deck = Decks::where('id', $deck_id)->first();
        $cards = CardRel::where('deck_id', $deck_id)->get();
        foreach($cards as $card) {
            $card->delete();
        }
        $deck->delete();
        return redirect()->back();
    }
}