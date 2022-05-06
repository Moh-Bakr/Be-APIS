<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('play_books', function (Blueprint $table) {
//            $table->longText('data')->change();
//            $table->longText('description')->change();
//            $table->longText('category')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('play_books', function (Blueprint $table) {
//            $table->text('data')->change();
//            $table->text('description')->change();
//            $table->text('category')->change();
        });
    }
};
