<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicacionGaleriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() : void
    {
        Schema::create('publicacion_galeria', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_publicacion');
            $table->foreign('id_publicacion')->references('id')->on('publicaciones')->onDelete('cascade');

            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->string('imagen');
            $table->integer('orden')->nullable();
            $table->boolean('activo')->default(false);
            $table->integer('tipo')->nullable();
            $table->integer('token')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() : void
    {
        Schema::dropIfExists('publicacion_galeria');
    }
}
