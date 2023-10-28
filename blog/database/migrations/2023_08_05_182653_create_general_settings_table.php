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
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->string('sitename');
            $table->longText('description');
            $table->string('logo');
            $table->string('favicon');
            $table->string('address');
            $table->string('copyright');
            $table->string('chatstatus');
            $table->string('link');
            $table->string('footer');
            $table->longText('about');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_settings');
    }
};