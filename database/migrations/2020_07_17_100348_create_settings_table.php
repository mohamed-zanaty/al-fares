<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{

    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('email');
            $table->text('number1');
            $table->text('number2');
            $table->text('url');
            $table->text('facebook');
            $table->text('twitter');
            $table->text('instagram');
            $table->text('youtube');
            $table->string('image')->default('logo.com');
            $table->string('address');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
