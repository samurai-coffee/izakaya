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
            $table->text('photo_path'); 
            $table->timestamps(); 

            
        }); 
    } 
    public function down() {
        Schema::drop('shops'); 
    }
}
