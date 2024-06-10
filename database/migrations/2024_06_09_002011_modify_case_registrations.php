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
        Schema::table('case_registrations', function (Blueprint $table) {
            // Example: Add a new column
            // $table->string('new_column')->nullable();

            // Example: Modify an existing column
            $table->integer('case_type')->change();
            $table->integer('file_no')->change();
            $table->date('dor')->change();
            $table->date('dol')->change();
            $table->date('doion')->change();
            $table->date('doson')->change();


            // Example: Drop a column
            // $table->dropColumn('unwanted_column');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('case_registrations', function (Blueprint $table) {
            // Example: Drop the new column
            // $table->dropColumn('new_column');

            // Example: Revert the modification of an existing column
            // $table->string('existing_column')->change();

            // Example: Add the dropped column back
            // $table->string('unwanted_column')->nullable();
        });
    }
};
