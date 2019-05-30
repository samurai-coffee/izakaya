<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    //
     public function user() {
      return $this->belongsTo('App\User', 'user_id');
     }
     public function reservesToShop() {
      return $this->hasMany('App\Reserve','shop_id');
    }
}
