<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('title')->nullable()->after('id');
            $table->string('slug')->nullable()->unique()->after('title');
            $table->text('description')->nullable()->after('slug');
            $table->string('category')->nullable()->after('description');
            $table->string('image_path')->nullable()->after('category');
            $table->string('url')->nullable()->after('image_path');
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropUnique(['slug']);
            $table->dropColumn(['title', 'slug', 'description', 'category', 'image_path', 'url']);
        });
    }
};

