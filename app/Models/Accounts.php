<?php

namespace App\Models;

use DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

final class Accounts extends Model {
    const TABLE = 'accounts';

    protected $table = self::TABLE;
    protected $fillable = [];

    public function account_id() {
        return $this->id;
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
}
?>