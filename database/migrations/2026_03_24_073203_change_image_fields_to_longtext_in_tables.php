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
        Schema::table('projects', function (Blueprint $table) {
            $table->longText('image_path')->nullable()->change();
        });

        Schema::table('blogs', function (Blueprint $table) {
            $table->longText('cover_image_path')->nullable()->change();
        });

        Schema::table('testimonials', function (Blueprint $table) {
            $table->longText('image_path')->nullable()->change();
        });
        
        Schema::table('site_settings', function (Blueprint $table) {
            $table->longText('logo_path')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('image_path')->nullable()->change();
        });

        Schema::table('blogs', function (Blueprint $table) {
            $table->string('cover_image_path')->nullable()->change();
        });

        Schema::table('testimonials', function (Blueprint $table) {
            $table->string('image_path')->nullable()->change();
        });
        
        Schema::table('site_settings', function (Blueprint $table) {
            $table->string('logo_path')->nullable()->change();
        });
    }
};
