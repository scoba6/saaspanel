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
        Schema::create('prestataires', function (Blueprint $table) {
            $table->id();
            $table->string('rsnpre')->nullable(false)->default('');
            $table->string('telpre')->nullable(false)->default('');
            $table->string('mailpre')->nullable(true)->default(null);
            $table->string('adrpre')->nullable(true)->default(null);
            $table->string('vilpre')->nullable(false)->default('');
            $table->string('paypre')->nullable(false)->default('');
            $table->boolean('active')->nullable(false)->default(true);
            $table->timestamps();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestataires');
    }
};
