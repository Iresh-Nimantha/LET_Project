<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('title')->nullable()->after('id');
            $table->string('slug')->nullable()->unique()->after('title');
            $table->text('description')->nullable()->after('slug');
            $table->string('icon_class')->nullable()->after('description');
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropUnique(['slug']);
            $table->dropColumn(['title', 'slug', 'description', 'icon_class']);
        });
    }
};

