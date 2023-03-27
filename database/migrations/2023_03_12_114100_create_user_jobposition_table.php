<?php

use App\Models\Cvrequest;
use App\Models\Jobposition;
use App\Models\User;
use App\Models\Userrequest;
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
        Schema::create('user_jobposition', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Jobposition::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Userrequest::class)->nullable()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Cvrequest::class)->nullable()->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_jobposition');
    }
};
