<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->string('name')->nullable()->after('id');
            $table->string('email')->nullable()->after('name');
            $table->string('phone')->nullable()->after('email');
            $table->longText('message')->nullable()->after('phone');
            $table->timestamp('read_at')->nullable()->after('message');
        });
    }

    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn(['name', 'email', 'phone', 'message', 'read_at']);
        });
    }
};

