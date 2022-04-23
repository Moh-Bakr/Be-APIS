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
        Schema::create('incident_g_s', function (Blueprint $table) {
            $table->id();
            $table->string('TimeOfDetection');
            $table->string('IncidentName');
            $table->string('RepeatedIncidentNumber');
            $table->string('DetectorName');
            $table->string('ContactInfo');
            $table->string('Location');
            $table->string('IncidentReferenceNo');
            $table->string('RepeatedIncident');
            $table->string('Priority');
            $table->string('ImpactDuration');
            $table->string('AffectedSystem');
            $table->string('IncidentVerification');
            $table->string('IncidentClassification');
            $table->string('Description');
            $table->string('EvidenceAcquiring');
            $table->string('DataHealth');
            $table->string('ContainmentMeasures');
            $table->string('EradicationMeasures');
            $table->string('RecoveryMeasures');
            $table->string('Notification');
            $table->string('CaseAnalysis');
            $table->string('IncidentAvailability');
            $table->string('Improvements');
            $table->string('TimeOfClosure');
            $table->string('Title');
            $table->string('Signature');
            $table->string('Date');
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
        Schema::dropIfExists('incident_g_s');
    }
};
