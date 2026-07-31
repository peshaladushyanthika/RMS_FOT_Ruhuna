<?php

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
        Schema::create('presentation_panel_supervisor', function (Blueprint $table) {
            $table->id();
            $table->foreignId('presentation_panel_id')
            ->constrained()
            ->cascadeOnDelete();
            $table->foreignId('supervisor_id')
            ->constrained()
            ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presentation_panel_supervisor');
    }
};
