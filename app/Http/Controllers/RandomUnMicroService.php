<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cards;
use App\Models\CardsRel;

class RandomUnMicroService extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function un(Request $request)
    {
        $cards = Cards::where('card_set', 'UGL')->get();
        if(!$cards) {
            return response()->json(['error' => 'Cards not found.'], 404);
        }
        $count = count($cards);
        $random = str_random($count);
        return response()->json($cards[$random]);
    }
}