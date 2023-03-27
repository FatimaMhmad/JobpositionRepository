<?php

use App\Models\CompanySpecialization;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jobpositions', function (Blueprint $table) {
            $table->id();
            $table->string('work_nature');
            $table->integer('working_hours');
            $table->double('salary')->nullable();
            $table->string('required_qualifications');
            $table->integer('number_of_people_allowed');
            $table->dateTime('date_of_publication');
            $table->foreignId('company_specialization_id')->constrained('company_specialization');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobpositions');
    }
};
