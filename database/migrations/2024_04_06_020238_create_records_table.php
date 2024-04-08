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
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(false);
            $table->integer('bpm')->nullable(false);
            $table->date('listing_date')->nullable(false);
            $table->decimal('price', 8, 2)->nullable(false);
            $table->string('UID')->nullable(false);
            $table->boolean('is_exclusive')->default(false);
            $table->string('audio_file')->nullable(false);
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('records');
    }
};
