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
        Schema::create('communications', function (Blueprint $table) {
            $table->id();
            $table->string('Team');
            $table->string('Action');
            $table->string('PrimaryEmail')->nullable();
            $table->string('PrimaryName')->nullable();
            $table->string('PrimaryPhone')->nullable();
            $table->string('SecondaryEmail')->nullable();
            $table->string('SecondaryName')->nullable();
            $table->string('SecondaryPhone')->nullable();
            $table->string('PrimaryMobile')->nullable();
            $table->string('SecondaryMobile')->nullable();
            $table->string('GroupEmail')->nullable();
            $table->string('GroupManager')->nullable();
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
        Schema::dropIfExists('communications');
    }
};
