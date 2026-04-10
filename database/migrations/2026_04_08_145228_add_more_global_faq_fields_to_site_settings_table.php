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
        Schema::table('site_settings', function (Blueprint $table) {
            $table->string('projects_faq_1_question')->nullable();
            $table->text('projects_faq_1_answer')->nullable();
            $table->string('projects_faq_2_question')->nullable();
            $table->text('projects_faq_2_answer')->nullable();
            
            $table->string('vision_highlights_faq_1_question')->nullable();
            $table->text('vision_highlights_faq_1_answer')->nullable();
            $table->string('vision_highlights_faq_2_question')->nullable();
            $table->text('vision_highlights_faq_2_answer')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn([
                'projects_faq_1_question', 'projects_faq_1_answer',
                'projects_faq_2_question', 'projects_faq_2_answer',
                'vision_highlights_faq_1_question', 'vision_highlights_faq_1_answer',
                'vision_highlights_faq_2_question', 'vision_highlights_faq_2_answer',
            ]);
        });
    }
};
