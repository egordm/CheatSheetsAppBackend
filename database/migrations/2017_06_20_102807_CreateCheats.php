<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cheats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cheat_group_id')->unsigned();
            $table->text('description')->nullable();
            $table->tinyInteger('layout')->unsigned();
            $table->text('usage')->nullable();
            $table->string('source')->nullable();
            $table->timestamps();

            $table->foreign('cheat_group_id')
                ->references('id')->on('cheat_groups')
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
