<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('title')->nullable()->after('id');
            $table->string('slug')->nullable()->unique()->after('title');
            $table->text('excerpt')->nullable()->after('slug');
            $table->longText('content')->nullable()->after('excerpt');
            $table->string('cover_image_path')->nullable()->after('content');
        });
    }

    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropUnique(['slug']);
            $table->dropColumn(['title', 'slug', 'excerpt', 'content', 'cover_image_path']);
        });
    }
};

