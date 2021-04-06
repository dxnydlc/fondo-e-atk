<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFondoEditorialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() : void
    {
        Schema::create('fondo_editorial', function (Blueprint $table) {
            $table->id();
            $table->string('uu_id');
            $table->string('titulo');
            $table->string('slug');
            $table->text('resumen');
            $table->longText('contenido');
            $table->string('imagen')->nullable();
            $table->string('seo_titulo')->nullable();
            $table->string('seo_descripcion')->nullable();
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
        Schema::dropIfExists('fondo_editorial');
    }
}
