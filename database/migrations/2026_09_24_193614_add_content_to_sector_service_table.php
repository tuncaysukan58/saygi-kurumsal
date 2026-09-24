<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('sector_service', function (Blueprint $table) {
            $table->text('content')->nullable()->after('sector_id');
        });
    }

    public function down(): void
    {
        Schema::table('sector_service', function (Blueprint $table) {
            $table->dropColumn('content');
        });
    }
};
