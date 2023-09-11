<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuggestionsTable extends Migration
{
    public function up()
    {
        Schema::create('suggestions', function (Blueprint $table) {
            $table->id();
            $table->integer('bucket_id')->nullable();
            $table->integer('ball_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('suggestions');
    }
}
