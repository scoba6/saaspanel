<?php

use App\Enums\Titre;
use App\Enums\ClassificationClient;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->constrained('teams');
            $table->foreignId('apporteur_id')->constrained('apporteurs');
            $table->string('titre')->default(Titre::A);
            $table->string('clacli')->default(ClassificationClient::A);
            $table->string('rsncli')->nullable(false)->default('client');
            $table->string('maicli')->nullable();
            $table->string('telcli')->nullable();
            $table->string('auxcli')->nullable(); //cpt auxilliaire client
            $table->string('comcli')->nullable();
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
        Schema::dropIfExists('clients');
    }
};
