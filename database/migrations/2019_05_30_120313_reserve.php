<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Reserve extends Migration {
    public function up() { 
        Schema::create('reserves', function (Blueprint $table) { 
            $table->bigIncrements('id'); 
            $table->unsignedBigInteger('user_id'); 
            $table->date('reserve_at'); 
            $table->integer('time'); 
            $table->integer('count'); 
            $table->timestamps(); 
            $table->unsignedBigInteger('shop_id'); 
            $table->index( 'user_id' );
            $table->index( 'shop_id' );

            // 参照制約（Usersテーブルへの外部キー）
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');
            // 参照制約（Shopsテーブルへの外部キー）
            $table->foreign('shop_id')
                  ->references('id')
                  ->on('shops');
        }); 
    } 
    public function down() {
        Schema::drop('reserves'); 
    } 
} 