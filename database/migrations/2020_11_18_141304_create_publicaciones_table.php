<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() : void
    {
        Schema::create('publicaciones', function (Blueprint $table) {
            $table->id();
            $table->string('uu_id', 150);
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');

            $table->unsignedBigInteger('coleccion_id');
            $table->foreign('coleccion_id')->references('id')->on('colecciones')->onDelete('cascade');

            $table->string('titulo', 150);
            $table->string('sub_titulo', 150);
            $table->string('slug');
            $table->text('resumen');
            $table->integer('anio');
            $table->string('seo_keywords', 150)->nullable();
            $table->string('seo_titulo', 150)->nullable();
            $table->string('seo_descripcion', 150)->nullable();
            $table->boolean('destacado')->default(false);
            $table->text('issuu_embed')->nullable();
            $table->string('archivo_issuu')->nullable();
            $table->string('imagen_portada')->nullable();
            $table->string('imagen_detalle')->nullable();
            $table->boolean('activo')->default(false);
            $table->text('dedicatoria')->nullable();
            $table->text('presentacion_quote')->nullable();
            $table->string('presentacion_imagen')->nullable();
            $table->string('presentacion_titulo')->nullable();
            $table->string('presentacion_sub_titulo')->nullable();
            $table->text('presentacion_detalle')->nullable();
            $table->text('preambulo_detalle')->nullable();
            $table->string('preambulo_imagen_fondo')->nullable();
            $table->string('capitulo_titulo')->nullable();
            $table->text('capitulo_descripcion')->nullable();
            $table->text('capitulo_cita')->nullable();
            $table->string('color_base')->nullable();
            $table->string('color_alterno')->nullable();
            $table->string('color_titulo_base')->nullable();
            $table->string('color_titulo_alterno')->nullable();
            $table->string('color_imagen_titulo_base')->nullable();
            $table->string('color_imagen_titulo_alterno')->nullable();
            $table->string('color_subtitulo_base')->nullable();
            $table->string('color_subtitulo_alterno')->nullable();
            $table->string('color_texto_base')->nullable();
            $table->string('color_text_alterno')->nullable();
            $table->string('color_icono_quote')->nullable();
            $table->string('color_hover_galeria')->nullable();

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
        Schema::dropIfExists('publicaciones');
    }
}
