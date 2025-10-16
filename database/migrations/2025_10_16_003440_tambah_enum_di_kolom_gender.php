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
        // Change the 'gender' column to include 'Prefer not to say'
        Schema::table('pelanggan', function (Blueprint $table) {
            $table->enum('gender', ['Male', 'Female', 'Other', 'Prefer not to say'])->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       // Revert the 'gender' column to its previous enum values
        Schema::table('pelanggan', function (Blueprint $table) {
            $table->enum('gender', ['Male', 'Female', 'Other'])->nullable()->change();
            });
    }

};
