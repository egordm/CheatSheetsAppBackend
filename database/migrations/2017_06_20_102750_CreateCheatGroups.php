<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheatgroups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cheat_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cheat_sheet_id')->unsigned();
            $table->string('title');
            $table->text('description');
            $table->timestamps();

            $table->foreign('cheat_sheet_id')
                ->references('id')->on('cheat_sheets')
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
