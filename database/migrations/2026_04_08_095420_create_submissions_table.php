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
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('group_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->string('type'); // proposal, progress1, etc.
            $table->integer('version')->default(1);

            $table->string('file_path')->nullable();
            $table->integer('marks')->nullable();

            $table->enum('status', ['pending', 'accepted', 'rejected'])
                  ->default('pending');

            $table->text('feedback')->nullable();
            $table->timestamp('submitted_at')->nullable();
            $table->timestamps();
                });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};
