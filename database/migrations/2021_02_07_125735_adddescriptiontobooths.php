<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Adddescriptiontobooths extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::table('booths', function (Blueprint $table) {
            $table->longText("description_two")->nullable(); //Wysiwyg
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('booths', function (Blueprint $table) {
            $table->dropColumn("description_two");
        });
    }
}
