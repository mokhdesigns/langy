<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLangsTable extends Migration
{

    public function up()
    {
        Schema::create('langs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->uniqid();
            $table->string('code')->uniqid();
            $table->string('flag')->uniqid();
            $table->string('defualt')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('langs');
    }
}
