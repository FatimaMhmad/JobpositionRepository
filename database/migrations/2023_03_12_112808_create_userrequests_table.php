<?php

use App\Models\UserJobposition;
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
        Schema::create('userrequests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age');
            $table->string('marital_status');
            $table->string('address');
            $table->integer('phone');
            $table->string('email');
            $table->string('scientific_experience');
            $table->string('practical_experience');
            $table->enum('mother_langue',['Chinese', 'English', 'Spanish', 'Arabic',
            'French', 'Persian', 'German', 'Russian','Malay' , 'Portuguese',
            'Italian' , 'Turkish', 'Lahnda', 'Tamil', 'Urdu',' Korean', 'Hindi', 'Bengali',
            'Japanese', 'Vietnamese', 'Telugu',  'Marathi']);
            $table->enum('level_of_mother_langue',['Beginners','Intermediate','Advanced']);
            $table->enum('additional_languages',['Chinese', 'English', 'Spanish', 'Arabic',
            'French', 'Persian', 'German', 'Russian','Malay' , 'Portuguese',
            'Italian' , 'Turkish', 'Lahnda', 'Tamil', 'Urdu',' Korean', 'Hindi', 'Bengali',
            'Japanese', 'Vietnamese', 'Telugu',  'Marathi']);
            $table->enum('level_of_additional_languages',['Beginners','Intermediate','Advanced']);
            $table->string('skills');
            $table->string('hobbies');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userrequests');
    }
};
