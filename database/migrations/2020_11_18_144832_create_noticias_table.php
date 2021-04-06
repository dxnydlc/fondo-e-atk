<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() : void
    {
        Schema::create('noticias', function (Blueprint $table) {
            $table->id();
            $table->string('uu_id');
            $table->string('titular'); 
            $table->string('slug');
            $table->text('bajada'); 
            $table->text('contenido');
            $table->date('publicacion');
            $table->boolean('destacado')->default(false);
            $table->string('seo_keywords')->nullable();
            $table->string('seo_titulo')->nullable();
            $table->string('seo_descripcion')->nullable();
            $table->string('imagen_portada');
            $table->string('imagen_detalle');
            $table->string('categoria')->nullable();
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
        Schema::dropIfExists('noticias');
    }
}
