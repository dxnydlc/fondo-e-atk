<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFondoEditorialHitoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() : void
    {
        Schema::create('fondo_editorial_hito', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_fondo_editorial');
            $table->foreign('id_fondo_editorial')->references('id')->on('fondo_editorial')->onDelete('cascade');

            $table->integer('anio');
            $table->string('titulo')->nullable();
            $table->text('descripcion');
            $table->string('imagen')->nullable();
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
        Schema::dropIfExists('fondo_editorial_hito');
    }
}
