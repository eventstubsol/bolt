<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Createlinkstable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("to")->nullable();
            $table->string("name")->nullable();
            $table->string("height")->nullable();
            $table->string("width")->nullable();
            $table->string("top")->nullable();
            $table->string("left")->nullable();
            $table->string("type")->nullable();
            $table->string("page")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
