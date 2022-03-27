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
        Schema::create('system_health_issues', function (Blueprint $table) {
            $table->id();
            $table->string('component');
            $table->string('ip');
            $table->string('Hostname');
            $table->string('StartTime');
            $table->string('IssueDescription');
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
        Schema::dropIfExists('system_health_issues');
    }
};
