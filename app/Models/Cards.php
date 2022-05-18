<?php

namespace App\Models;

use DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


final class Cards extends Model {
    const TABLE = 'cards';

    protected $table = self::TABLE;
    protected $fillable = [];

    public function id() {
        return $this->id;
    }

    public function card_name() {
        return $this->card_name;
    }

    public function manacost() {
        return $this->manacost;
    }

    public function colors() {
        return $this->colors;
    }

    public function type() {
        return $this->type;
    }

    public function rarity() {
        return $this->rarity;
    }

    public function card_set() {
        return $this->card_set;
    }

    public function multiverseid() {
        return $this->multiverseid;
    }

    public function image_url() {
        return $this->image_url;
    }

    public function created_at() {
        return new Carbon($this->created_at);
    }

    public function updated_at() {
        return new Carbon($this->updated_at);
    }
    
}
?>