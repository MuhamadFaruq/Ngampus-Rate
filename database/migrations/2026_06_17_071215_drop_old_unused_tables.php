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
        Schema::dropIfExists('pertanyaans');
        Schema::dropIfExists('kuisioners');
        
        if (Schema::hasTable('jawabans') && Schema::hasColumn('jawabans', 'dosen_id')) {
            Schema::table('jawabans', function (Blueprint $table) {
                $table->dropForeign(['dosen_id']);
                $table->dropColumn('dosen_id');
            });
        }

        Schema::dropIfExists('dosens');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // We do not need to recreate them as they are obsolete
    }
};
