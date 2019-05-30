<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    public function user() {
      return $this->belongsTo('App\User', 'user_id');
    }
    public function shop() {
      return $this->belongsTo('App\Shop', 'shop_id');
    }
  
}
