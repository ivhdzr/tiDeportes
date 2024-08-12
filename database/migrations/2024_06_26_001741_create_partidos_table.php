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
        Schema::create('partidos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->bigInteger('torneo_id')->unsigned();
            $table->dateTime('fecha_partido');
            $table->bigInteger('equipo_local_id')->unsigned();
            $table->bigInteger('equipo_visitante_id')->unsigned();
            $table->bigInteger('arbitro_id')->unsigned();
            $table->timestamps();

            $table->foreign('torneo_id')->references('id')->on('torneos')->onDelete('cascade');
            $table->foreign('equipo_local_id')->references('id')->on('equipos')->onDelete('cascade');
            $table->foreign('equipo_visitante_id')->references('id')->on('equipos')->onDelete('cascade');
            $table->foreign('arbitro_id')->references('id')->on('arbitros')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partidos');
    }
};
