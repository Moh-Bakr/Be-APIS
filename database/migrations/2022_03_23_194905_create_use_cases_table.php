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
            $table->text('identifier');
            $table->text('purpose');
            $table->text('risk');
            $table->string('type');
            $table->string('stakeholders');
            $table->text('requirements');
            $table->text('logic');
            $table->text('output');
            $table->string('volume');
            $table->string('falsepositive');
            $table->string('priority');
            $table->string('playbook');
            $table->text('production');
            $table->string('testing');
            $table->text('tactics')->nullable();
            $table->text('techniques')->nullable();
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
