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
        Schema::table('roles', function (Blueprint $table) {
            if (!Schema::hasColumn('roles', 'actions')) {
                $table->text('actions')->nullable();
            }
        });

        Schema::table('permissions', function (Blueprint $table) {
            if (!Schema::hasColumn('permissions', 'actions')) {
                $table->text('actions')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('roles', function (Blueprint $table) {
            if (Schema::hasColumn('roles', 'actions')) {
                $table->dropColumn('actions');
            }
        });

        Schema::table('permissions', function (Blueprint $table) {
            if (Schema::hasColumn('permissions', 'actions')) {
                $table->dropColumn('actions');
            }
        });
    }
};
