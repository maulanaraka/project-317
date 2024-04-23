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
        Schema::create('community_event', function (Blueprint $table) {
            $table->foreignId('community_id')->constrained()->onUpdate('cascade')->onDelete('cascade')->references('id')->on('community');
            $table->foreignId('event_id')->constrained()->onUpdate('cascade')->onDelete('cascade')->references('id')->on('event');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('community_event');
    }
};
