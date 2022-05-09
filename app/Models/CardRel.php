<?php

namespace App\Models;

use DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

final class CardRel extends Model {
    const TABLE = 'card_rel';

    protected $table = self::TABLE;
    protected $fillable = [];
    
    public function card_id() {
        return $this->card_id;
    }

    public function deck_id() {
        return $this->deck_id;
    }

    public function card() {
        return $this->hasOne(Cards::class, 'card_id', 'card_id');
    }

    public function deck() {
        return $this->hasOne(Decks::class, 'deck_id', 'deck_id');
    }

}
?>