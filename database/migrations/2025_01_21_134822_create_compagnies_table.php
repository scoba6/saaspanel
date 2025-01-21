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
        Schema::create('compagnies', function (Blueprint $table) {
            $table->id();
            $table->integer('codcie')->nullable(false)->unique();
            $table->string('libcie')->nullable(false)->unique();
            $table->string('adrcie')->nullable(false)->unique();
            $table->string('logcie')->nullable();
            $table->integer('rcicie')->nullable()->default(0);
            $table->integer('ticcie')->nullable()->default(0);
            $table->integer('drecie')->nullable()->default(0);
            $table->boolean('mandat')->nullable(false);
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compagnies');
    }
};
