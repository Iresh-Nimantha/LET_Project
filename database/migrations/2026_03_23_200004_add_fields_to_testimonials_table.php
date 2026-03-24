<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('testimonials', function (Blueprint $table) {
            $table->string('name')->nullable()->after('id');
            $table->string('role')->nullable()->after('name');
            $table->text('quote')->nullable()->after('role');
            $table->string('image_path')->nullable()->after('quote');
        });
    }

    public function down(): void
    {
        Schema::table('testimonials', function (Blueprint $table) {
            $table->dropColumn(['name', 'role', 'quote', 'image_path']);
        });
    }
};

