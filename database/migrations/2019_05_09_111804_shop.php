<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Shop extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() { 
        Schema::create('shops', function (Blueprint $table) { 
            $table->bigIncrements('id'); 
            $table->string('name'); 
            $table->longText('message'); 
            $table->string('address'); 
            $table->string('tel');
            $table->string('category');
            $table->text('photo_path'); 
            $table->unsignedBigInteger('user_id'); 
            $table->decimal('lat', 11, 8); 
            $table->decimal('lng', 11, 8); 
            $table->timestamps(); 
            $table->index('user_id');

            // 参照制約（Usersテーブルへの外部キー）
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');

            
        }); 
    } 
    public function down() {
        Schema::drop('shops'); 
    }
}
