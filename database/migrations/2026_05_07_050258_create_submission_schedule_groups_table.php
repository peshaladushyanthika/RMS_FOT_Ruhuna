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
        Schema::create('submission_schedule_groups', function (Blueprint $table) {
            $table->id();

            $table->foreignId('submission_schedule_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->foreignId('group_id')
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
        Schema::dropIfExists('submission_schedule_groups');
    }
};
