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
        Schema::create('advisory_sources', function (Blueprint $table) {
            $table->id();
            $table->string('source');
            $table->string('date');
            $table->string('referenceid');
            $table->string('description');
            $table->boolean('applicable');
            $table->string('token');
            $table->string('notes');
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
        Schema::dropIfExists('advisory_sources');
    }
};
