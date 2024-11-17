<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string("photo")->nullable();
            $table->string("name");
            $table->string("bio");
            $table->string("vision");
            $table->string("mission");
            // $table->string("contract_candidateId");
            $table->foreignId("classroom_id")->constrained();
            $table->foreignId("election_id")->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
