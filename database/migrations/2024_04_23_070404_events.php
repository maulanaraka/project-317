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
        Schema::create('event', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('event_date');
            $table->string("media");
            $table->boolean('event_status');
            $table->foreignId('event_category')->constrained()->onUpdate('cascade')->onDelete('cascade')->references('id')->on('category');;
            $table->boolean('event_is_approve');
            $table->date('event_approved_date');
            $table->date('event_request_date');
            $table->foreignId('admin_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade')->references('id')->on('admin');
            $table->foreignId('organizer_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade')->references('id')->on('organizer');
            $table->foreignId('community_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade')->references('id')->on('community');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('event');
    }
};
