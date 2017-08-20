<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePDFS extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pdfs', function (Blueprint $table) {
            $table->integer('cheat_sheet_id')->unsigned();
            $table->string('url');
            $table->timestamps();
            $table->primary('cheat_sheet_id');
        });
        Schema::table('pdfs', function (Blueprint $table) {
            $table->foreign('cheat_sheet_id')->references('id')
                ->on('cheat_sheets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pdfs');
    }
}
