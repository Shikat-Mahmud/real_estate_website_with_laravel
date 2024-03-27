<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPasswordToAdminUsers extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Check if the 'password' column doesn't exist before adding it
        if (!Schema::hasColumn('admin_users', 'password')) {
            Schema::table('admin_users', function (Blueprint $table) {
                $table->string('password');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove the 'password' column if it exists
        if (Schema::hasColumn('admin_users', 'password')) {
            Schema::table('admin_users', function (Blueprint $table) {
                $table->dropColumn('password');
            });
        }
    }
}
