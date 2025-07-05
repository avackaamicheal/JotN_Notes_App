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
        Schema::create('note_collaborators', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Note::class, 'note_id')->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\User::class, 'user_id')->constrained()->cascadeOnDelete();
            $table->boolean('can_edit')->default(false);
            $table->timestamps();

            $table->unique(['note_id', 'user_id']); // prevents duplicate
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('note_collaborators');
    }
};
