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
        Schema::create('service_cateloges', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('owner');
            $table->text('description');
            $table->string('status');
            $table->string('hours');
            $table->text('inputs');
            $table->text('outputs');
            $table->text('consumers');
            $table->text('processes');
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
        Schema::dropIfExists('service_cateloges');
    }
};
