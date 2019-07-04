<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'reserve_at', 'time', 'shop_id', 'user_id'
    ];
    public function shop() {
      return $this->belongsTo('App\Shop', 'shop_id');
    }
    public function user() {
      return $this->belongsTo('App\User', 'user_id');
    }
}
