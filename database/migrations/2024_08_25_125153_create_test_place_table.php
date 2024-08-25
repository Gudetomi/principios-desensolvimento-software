<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('test_place', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->text('type');
            $table->text('sourcetype');
            $table->text('sourcename');
        });

        DB::statement('ALTER TABLE test_place ADD COLUMN embedding VECTOR');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_place');
    }
};
