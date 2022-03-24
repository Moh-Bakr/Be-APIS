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
        Schema::create('use_cases', function (Blueprint $table) {
            $table->id();
            $table->string('identifier');
            $table->string('purpose');
            $table->string('risk');
            $table->string('type');
            $table->string('stakeholders');
            $table->string('requirements');
            $table->string('logic');
            $table->string('output');
            $table->string('volume');
            $table->string('falsepositive');
            $table->string('priority');
            $table->string('playbook');
            $table->string('production');
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
        Schema::dropIfExists('use_cases');
    }
};
