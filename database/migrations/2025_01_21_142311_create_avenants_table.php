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
        Schema::create('avenants', function (Blueprint $table) {
            $table->id();
            $table->integer('ordavn')->unique()->nullable(false)->default(0);
            $table->string('libavn')->unique()->nullable(false)->default('');
            $table->enum('grpavn', ['FIXE', 'CHANGEMENT', 'SUSPENSION', 'AUTRE'])->nullable(false)->default('FIXE');
            $table->text('txtavn')->nullable(true)->default(null);
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('avenants');
    }
};
