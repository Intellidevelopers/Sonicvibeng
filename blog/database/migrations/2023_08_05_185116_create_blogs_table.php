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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id');
            $table->foreignId('category_id');
            $table->text('name');
            $table->text('slug');
            $table->text('description');
            $table->string('image');
            $table->string('other_image')->nullable();
            $table->string('video')->nullable();
            $table->string('audio')->nullable();
            $table->enum('status',['pending','approved','declined']);
            $table->enum('slide',['1','0']);
            $table->enum('trending',['1','0']);
            $table->longText('body');
            $table->longText('bodytwo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};