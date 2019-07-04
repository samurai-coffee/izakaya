<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Contact extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
        $table-> bigIncrements('id');
        $table->date('reserve_at');
        $table->text('time');
        $table->unsignedBigInteger('shop_id'); 
        $table->unsignedBigInteger('user_id'); 
        $table->timestamps();
        $table->index( 'shop_id' );
        $table->index( 'user_id' );

        // 参照制約（shopsテーブルへの外部キー）
        $table->foreign('shop_id')
              ->references('id')
              ->on('shops');
        // 参照制約（Usersテーブルへの外部キー）
        $table->foreign('user_id')
              ->references('id')
              ->on('users');
            });
      }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
