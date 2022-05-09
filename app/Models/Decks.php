<?php

namespace App\Models;

use DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

final class Decks extends Model {
    const TABLE = 'decks';

    protected $table = self::TABLE;
    protected $fillable = [];

    public function deck_id() {
        return $this->id;
    }

    public function account_id() {
        return $this->account_id;
    }

    public function name() {
        return $this->name;
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

    public function cards() {
        return $this->hasMany(CardRel::class, 'deck_id', 'deck_id');
    }

}
?>