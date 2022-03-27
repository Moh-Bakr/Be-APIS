<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('a_lerts', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->string('name');
            $table->string('StartTime');
            $table->string('description');
            $table->string('ActionTaken');
            $table->string('NextAction');
            $table->string('who');
            $table->string('status');
            $table->string('CloseTime');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('a_lerts');
    }
};
