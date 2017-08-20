<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheatContents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cheat_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cheat_id')->unsigned();
            $table->text('content');

            $table->foreign('cheat_id')
                ->references('id')->on('cheats')
                ->onDelete('cascade');
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
