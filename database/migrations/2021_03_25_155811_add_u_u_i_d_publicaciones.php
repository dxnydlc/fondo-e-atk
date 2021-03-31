<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUUIDPublicaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('publicaciones', function($table) {
            $table->text('archivo_issuu')->change();
            $table->string('uu_id')->nullable()->after('id');
        });
        Schema::table('categorias', function($table) {
            $table->string('uu_id')->nullable()->after('id');
        });
        Schema::table('noticias', function($table) {
            $table->string('uu_id')->nullable()->after('id');
        });
        Schema::table('colecciones', function($table) {
            $table->string('uu_id')->nullable()->after('id');
        });
        Schema::table('fondo_editorial', function($table) {
            $table->string('uu_id')->nullable()->after('id');
        });
        Schema::table('fondo_editorial_hito', function($table) {
            $table->string('uu_id')->nullable()->after('id');
            $table->string('token')->nullable()->after('imagen');
        });
        Schema::table('banners', function($table) {
            $table->string('uu_id')->nullable()->after('id');
        });
        
        
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('publicaciones', function($table) {
            $table->dropColumn('archivo_issuu');
            $table->dropColumn('uu_id');
        });
        Schema::table('categorias', function($table) {
            $table->dropColumn('uu_id');
        });
        Schema::table('noticias', function($table) {
            $table->dropColumn('uu_id');
        });
        Schema::table('colecciones', function($table) {
            $table->dropColumn('uu_id');
        });
        Schema::table('fondo_editorial', function($table) {
            $table->dropColumn('uu_id');
        });
        Schema::table('fondo_editorial_hito', function($table) {
            $table->dropColumn('token');
            $table->dropColumn('uu_id');
        });
        Schema::table('banners', function($table) {
            $table->dropColumn('uu_id');
        });
    }
}
