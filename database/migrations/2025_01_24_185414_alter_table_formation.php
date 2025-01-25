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
        Schema::table('formation', function (Blueprint $table) {
            $table->text("description")->nullable();
        });

        Schema::table('tag', function (Blueprint $table) {
            $table->boolean("isTaggable")->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('formation', function (Blueprint $table) {
            //
        });
    }
};
