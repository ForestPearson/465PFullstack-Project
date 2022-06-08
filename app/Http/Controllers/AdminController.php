<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use mtgsdk\Card;

use App\Models\Decks;
use App\Models\Cards;
use App\Models\CardRel;
use App\Models\User;


class AdminController extends Controller {
    public function show() {
        $user = Auth::user();
        $allUsers = User::all();
        return view('admin', compact('user', 'allUsers'));
    }

    public function deleteAccount(Request $request) {
        $user = User::find($request->id);
        $userDecks = Decks::where('account_id', $user->id)->get();
        foreach($userDecks as $deck) {
            $deckCards = CardRel::where('deck_id', $deck->id)->get();
            foreach($deckCards as $card) {
                $card->delete();
            }
            $deck->delete();
        }
        $user->delete();
        return redirect()->route('admin');
    }

    public function makeAdmin(Request $request) {
        $user = User::find($request->id);
        $user->is_admin = 1;
        $user->save();
        return redirect()->route('admin');
    }

    public function revokeAdmin(Request $request) {
        $user = User::find($request->id);
        $user->is_admin = 0;
        $user->save();
        return redirect()->route('admin');
    }

    //Syncs the DB and should only need to be run when either
    //the DB is empty or the MTGSDK is updated.
    public function syncDB(){
        //Copy all cards over from the MTG SDK.
        $pageNum = 0;
        do {
            $cards = Card::where(['page' => $pageNum, 'pageSize' => 100])->all();

            foreach($cards as $card){
                if(!isset($card->multiverseid)) { continue; }

                //Check if the card is already in the DB.
                $card_current = Cards::where('multiverseid', $card->multiverseid)->first();
            
                //If it is, update the card.
                if(!$card_current){
                    $card_model = new Cards;

                    if(!isset($card->name)) { 
                        $card->name = "N\A";
                    } else {
                        $card_model->card_name = $card->name;
                    }
                    
                    if(!isset($card->manaCost)) {
                        $card_model->manacost = "N\A";
                    } else {
                        $card_model->manacost = $card->manaCost;
                    }

                    $colorString = "";
                    if(!isset($card->colors)) { 
                        $colorString = "N\A";
                    }
                    else {
                        foreach($card->colors as $color){
                            $colorString = $colorString . $color;
                        }
                    }
                    $card_model->colors = $colorString;

                    if(!isset($card->type)) {
                        $card_model->type = "N\A";
                    } else {
                        $card_model->type = $card->type;
                    }
                    
                    if(!isset($card->rarity)) {
                        $card_model->rarity = "N\A";
                    } else {
                        $card_model->rarity = $card->rarity;
                    }
                    
                    if(!isset($card->set)) {
                        $card_model->card_set = "N\A";
                    } else {
                        $card_model->card_set = $card->set;
                    }
                    
                    $card_model->multiverseid = intval($card->multiverseid);

                    if(!isset($card->imageUrl)) {
                        $card_model->image_url = "https://i.pinimg.com/474x/ca/9c/f3/ca9cf3805131982d0b205b694022c637--magic-cards-web-browser.jpg";
                    }
                    else {
                        $card_model->image_url = $card->imageUrl;
                    }
                    
                    $card_model->save();
                }
            }
            $pageNum += 1;
            set_time_limit(60);
        } while($cards);
        
        //return the view with the cards.
        return redirect()->route('admin');
    }

}