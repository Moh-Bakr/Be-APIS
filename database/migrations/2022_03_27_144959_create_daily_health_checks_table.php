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
        Schema::create('daily_health_checks', function (Blueprint $table) {
            $table->id();
            $table->text('Description');
            $table->string('Status');
            $table->text('IssuesFound')->nullable();
            $table->string('Component')->nullable();
            $table->string('Ip')->nullable();
            $table->string('Hostname')->nullable();
            $table->string('StartTime')->nullable();
            $table->text('IssueDescription')->nullable();
            $table->text('ActionTaken')->nullable();
            $table->text('NextAction')->nullable();
            $table->string('Who')->nullable();
            $table->string('IssueStatus')->nullable();
            $table->string('CloseTime')->nullable();
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
        Schema::dropIfExists('daily_health_checks');
    }
};
