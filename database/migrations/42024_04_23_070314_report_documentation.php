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
        Schema::create('report', function (Blueprint $table) {
            $table->id();
            $table->string('report');
            $table->string('media');
            $table->boolean('report_is_approved');
            $table->date('report_date');
            $table->date('report_approved_date')->nullable();
            $table->string('report_request_date');
            $table->foreignId('event_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade')->references('id')->on('event');
            $table->foreignId('admin_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade')->references('id')->on('admin');
            $table->foreignId('organizer_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade')->references('id')->on('organizer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('report');
    }
};
