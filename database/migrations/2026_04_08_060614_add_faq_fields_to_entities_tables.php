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
        $tables = ['services', 'projects', 'vision_highlights', 'blogs'];
        
        foreach ($tables as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->string('faq_question')->nullable();
                $table->text('faq_answer')->nullable();
            });
        }
        
        Schema::table('site_settings', function (Blueprint $table) {
            $table->string('why_choose_us_faq_question')->nullable();
            $table->text('why_choose_us_faq_answer')->nullable();
            $table->string('vision_faq_1_question')->nullable();
            $table->text('vision_faq_1_answer')->nullable();
            $table->string('vision_faq_2_question')->nullable();
            $table->text('vision_faq_2_answer')->nullable();
            $table->string('region_faq_1_question')->nullable();
            $table->text('region_faq_1_answer')->nullable();
            $table->string('region_faq_2_question')->nullable();
            $table->text('region_faq_2_answer')->nullable();
            $table->string('review_faq_1_question')->nullable();
            $table->text('review_faq_1_answer')->nullable();
            $table->string('review_faq_2_question')->nullable();
            $table->text('review_faq_2_answer')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $tables = ['services', 'projects', 'vision_highlights', 'blogs'];
        
        foreach ($tables as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->dropColumn(['faq_question', 'faq_answer']);
            });
        }
        
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn([
                'why_choose_us_faq_question', 'why_choose_us_faq_answer',
                'vision_faq_1_question', 'vision_faq_1_answer',
                'vision_faq_2_question', 'vision_faq_2_answer',
                'region_faq_1_question', 'region_faq_1_answer',
                'region_faq_2_question', 'region_faq_2_answer',
                'review_faq_1_question', 'review_faq_1_answer',
                'review_faq_2_question', 'review_faq_2_answer',
            ]);
        });
    }
};
