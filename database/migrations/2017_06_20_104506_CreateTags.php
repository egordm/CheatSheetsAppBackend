<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('content');
        });

        Schema::create('cheats_tags', function (Blueprint $table) {
            $table->integer('cheat_id')->unsigned();
            $table->integer('tag_id')->unsigned();
            $table->primary(['cheat_id', 'tag_id']);

            $table->foreign('cheat_id')
                ->references('id')->on('cheats')
                ->onDelete('cascade');
            $table->foreign('tag_id')
                ->references('id')->on('tags')
                ->onDelete('cascade');
        });

        Schema::create('cheat_groups_tags', function (Blueprint $table) {
            $table->integer('cheat_group_id')->unsigned();
            $table->integer('tag_id')->unsigned();
            $table->primary(['cheat_group_id', 'tag_id']);

            $table->foreign('cheat_group_id')
                ->references('id')->on('cheat_groups')
                ->onDelete('cascade');
            $table->foreign('tag_id')
                ->references('id')->on('tags')
                ->onDelete('cascade');
        });

        Schema::create('cheat_sheets_tags', function (Blueprint $table) {
            $table->integer('cheat_sheet_id')->unsigned();
            $table->integer('tag_id')->unsigned();
            $table->primary(['cheat_sheet_id', 'tag_id']);

            $table->foreign('cheat_sheet_id')
                ->references('id')->on('cheat_sheets')
                ->onDelete('cascade');
            $table->foreign('tag_id')
                ->references('id')->on('tags')
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
