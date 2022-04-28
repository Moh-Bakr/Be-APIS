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
        Schema::create('pending_issues', function (Blueprint $table) {
            $table->id();
            $table->text('issue');
            $table->text('description');
            $table->string('StartTime');
            $table->string('ActionTaken');
            $table->text('NextAction');
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
        Schema::dropIfExists('pending_issues');
    }
};
