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
        Schema::create('societes', function (Blueprint $table) {
            $table->id();
            $table->string('libste')->nullable(false);
            $table->string('nifste')->nullable(); //NIF
            $table->string('agrste')->nullable(); //Agrement
            $table->string('adrste')->nullable(); //adresse
            $table->string('telste')->nullable(); // telephone
            $table->string('webste')->nullable(); // fax
            $table->string('logste')->nullable(false)->default('logo'); // logo
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('societes');
    }
};
