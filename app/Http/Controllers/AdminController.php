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

    //Syncs the DB and should only need to be run when either
    //the DB is empty or the MTGSDK is updated.
    public function syncDB(){
        //Copy all cards over from the MTG SDK.
        $cards = Card::all();

        //loop through all cards and insert them into the DB.
        foreach($cards as $card){
            //Check if the card is already in the DB.
            $card_current = Cards::where('card_id', $card->id)->first();
            //If it is, update the card.
            if(!$card_current){
                $card_model = new Cards;
                $card_model->card_id = $card->id;
                $card_model->card_name = $card->name;
                $card_model->manacost = $card->manaCost;
                $card_model->colors = $card->colors;
                $card_model->type = $card->type;
                $card_model->rarity = $card->rarity;
                $card_model->card_set = $card->set;
                $card_model->multiverseid = $card->multiverseId;
                $card_model->image_url = $card->imageUrl;
                $card_model->save();
            }
        }
        //return the view with the cards.
        return redirect()->route('admin')->with(['success' => 'Cards synced successfully.']);
    }
}