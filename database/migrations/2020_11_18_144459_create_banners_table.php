<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() : void
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('titulo');
            $table->string('subtitulo')->nullable();
            $table->string('texto_boton')->nullable();
            $table->string('enlace')->nullable();
            $table->boolean('nueva_ventana')->default(false);
            $table->string('imagen_desktop')->nullable();
            $table->string('imagen_movil')->nullable();
            $table->string('imagen_publicacion')->nullable();
            $table->integer('orden');
            $table->boolean('activo')->default(false);
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
        Schema::dropIfExists('banners');
    }
}
