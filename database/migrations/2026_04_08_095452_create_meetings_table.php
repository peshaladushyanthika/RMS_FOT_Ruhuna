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
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('group_id')
                  ->constrained()
                  ->cascadeOnDelete();
            $table->foreignId('supervisor_id')
                ->nullable()
                ->constrained('supervisors')
                ->cascadeOnDelete();

            $table->date('meeting_date'); // proposal, progress1, etc.
            $table->text('discussion_note')->nullable();

            $table->text('next_actions')->nullable();
            $table->date('next_meeting_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meetings');
    }
};
