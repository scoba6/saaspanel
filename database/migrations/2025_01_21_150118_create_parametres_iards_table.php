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
        Schema::create('parametres_iards', function (Blueprint $table) {
            $table->id();
            $table->string('clepar')->nullable(false)->default('clepar');
            $table->string('libpar')->nullable(false)->default('libpar');
            $table->integer('ordpar')->nullable(false)->default(0);
            $table->string('valpar')->nullable(false)->default('valpar');
            $table->text('despar')->nullable(true)->default(null);
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
        Schema::dropIfExists('parametres_iards');
    }
};
