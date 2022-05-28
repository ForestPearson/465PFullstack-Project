<?php

namespace App\Models;

use DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

final class CardRel extends Model {
    const TABLE = 'card_rel';

    protected $table = self::TABLE;
    protected $fillable = [];

    public function id() {
        return $this->id;
    }

    public function card_id() {
        return $this->card_id;
    }

    public function deck_id() {
        return $this->deck_id;
    }
    public function created_at() {
        return new Carbon($this->created_at);
    }

    public function updated_at() {
        return new Carbon($this->updated_at);
    }

    public function deleted_at() {
        return new Carbon($this->deleted_at);
    }
    
    public function card() {
        return $this->hasOne(Cards::class, 'multiverseid', 'card_id');
    }

    public function deck() {
        return $this->hasOne(Decks::class, 'deck_id', 'deck_id');
    }

}
?>