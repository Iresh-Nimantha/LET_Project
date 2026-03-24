<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->default('London Elite Trades Ltd');
            $table->string('logo_path')->nullable();
            
            // Contact
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->text('address')->nullable();
            $table->string('opening_hours')->nullable();
            
            // Front Page Text
            $table->text('hero_title')->nullable();
            $table->text('hero_description')->nullable();
            
            $table->text('about_title')->nullable();
            $table->text('about_description')->nullable();
            
            $table->text('footer_description')->nullable();
            
            // Social Links
            $table->string('social_facebook')->nullable();
            $table->string('social_instagram')->nullable();
            $table->string('social_linkedin')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
