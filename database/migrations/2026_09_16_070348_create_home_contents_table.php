<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('home_contents', function (Blueprint $table) {
            $table->id();
            $table->string('hero_eyebrow')->nullable();
            $table->string('hero_title')->nullable();
            $table->text('hero_subtitle')->nullable();
            $table->string('hero_primary_btn_text')->nullable();
            $table->string('hero_primary_btn_url')->nullable();
            $table->string('hero_secondary_btn_text')->nullable();
            $table->string('hero_secondary_btn_url')->nullable();
            $table->string('about_label')->nullable();
            $table->string('about_title')->nullable();
            $table->text('about_text')->nullable();
            $table->string('about_image')->nullable();
            $table->string('experience_years')->nullable();
            $table->string('why_label')->nullable();
            $table->string('why_title')->nullable();
            $table->text('why_text')->nullable();
            $table->string('process_label')->nullable();
            $table->string('process_title')->nullable();
            $table->text('process_text')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_contents');
    }
};
