<?php

use Illuminate\Support\Facades\Route;

define( "URL_HOME" , env('APP_URL') );
define( "URL_MEDIA" , env('MEDIA_URL') );
define( "WEB_URL" , env('WEB_URL') );


# . CODIGO DXNY
$fecha 		= date('Y-m-d');
$fecha_hora = date('Y-m-d h:i:s');
$fecha_lat 	= date('d/m/Y');# g:i:s a

$nuevafecha = strtotime ( '-1 day' , strtotime ( $fecha ) );
$fechahace5 = strtotime ( '-5 day' , strtotime ( $fecha ) );

$hace5 = date ( 'Y-m-d' , $nuevafecha );
$ayer = date ( 'Y-m-d' , $nuevafecha );
$anio = date ( 'Y' , $nuevafecha );
$mes = date ( 'm' , $nuevafecha );

define( "FECHA_HOY_HORA" , $fecha_hora );
define( "FECHA_AYER" , $ayer );
define( "FECHA_HOY" , $fecha );
define( "FECHA_HORA_HOY" , $fecha_hora );
define( "FECHA_MYSQL" , $fecha );
define( "FECHA_MYSQL5" , $hace5 );
define( "FECHA_LAT" , $fecha_lat );
define( "ANIO" , $anio );
define( "MES" , $mes );
define( "COOKIE_VIDA" , 120 );
# ./ CODIGO DXNY

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', function () {
    return redirect('/');
});



Route::get('/', 'publicoController@index');

# JSON para el buscador de publicaciones
Route::post('/json/publicacion', 'publicoController@get_json_publicaciones');

# Cargando una publicación
Route::get('/publicacion/{slug?}', 'publicoController@cargar_publicacion');

# home publicaciones
Route::get('/publicaciones', 'publicoController@publicaciones_');

# Fondo editorial
Route::get('/fondo-editorial', 'publicoController@fondo_editorial');

# Cargando noticia
Route::get('/noticias/{slug?}', 'publicoController@cargar_noticias');







# $$$$$$$$$$$$$$$$$$$$$$$$  ADMINISTRADOR DE CONTENIDOS $$$$$$$$$$$$$$$$$$$$$$$$

Route::prefix('manager')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('home');

    Route::get('/home', function () {
        return view('home');
    });
    Route::get('/', function () {
        return redirect('/manager/home');
    });

    # . CODIGO DXNY
    Route::get('/setclave', function () {
        return view('cambiarClave');
    });
    
    # Adjuntar imagen publicacion
    Route::post( '/simple/carga/archivo/' , 'CkeditorController@adjunar_archivo_ckEditor' );
    
    
    Auth::routes();
    
    Route::get('/home', 'HomeController@index')->name('home');
    
    
    
    # Cambiar la contraseña del usuario principal
    Route::post('/cambio_clave', 'HomeController@cambiar_clave' );
    
    # Configuracion
    Route::get('/configuracion', 'HomeController@configuracion' );
    
    # Banners
    Route::get('/banners', 'HomeController@banners' );
    
    # Publicaciones
    Route::get('/publicaciones', 'HomeController@publicaciones' );
    
    # Adjuntar imagen banner
    Route::post( '/adjuntar/banner/' , 'adjuntoController@adjunar_archivo_banner' );
    Route::post( '/adjuntar/pdf/' , 'adjuntoController@adjuntar_archivo_pdf' );
    
    # Adjuntar imagen publicacion
    Route::post( '/adjuntar/publicacion/' , 'adjuntoController@adjunar_archivo_publicacion' );
    
    # Adjuntar imagen publicacion
    Route::post( '/adjuntar/noticias/' , 'adjuntoController@adjuntar_archivo_noticias' );
    
    # Adjuntar imagen publicacion
    Route::post( '/adjuntar/fondo_editorial/' , 'adjuntoController@adjuntar_fondo_editorial' );
    
    
    # ////////////////////////////////////////////////////////////////////////////
    
    # Guardar Banner
    Route::post( '/guardar/banner/' , 'HomeController@guardar_banner' );
    # Actualizar Banner
    Route::post( '/actualizar/banner/{uuid}' , 'HomeController@actualizar_banner' );
    # Cargar banners
    Route::post( '/todos/banner/' , 'HomeController@todos_banner' );
    # cargar un banner
    Route::post( '/cargar/banner/{uuid}' , 'HomeController@cargar_banner' );
    
    # Cargar datos de Categorias
    Route::post( '/listar/categorias/' , 'HomeController@listar_categorias' );
    
    # Guardar Autor en publicación
    Route::post( '/guardar/autor/' , 'HomeController@guardar_autores' );
    
    # Eliminar Autor en publicación
    Route::post( '/del/autor/' , 'HomeController@borrar_autor' );
    
    # Cargar Autor
    Route::post( '/get/autor/' , 'HomeController@cargar_autor' );
    
    # Guardar Galeria Publicacion
    Route::post( '/galeria/publicacion/' , 'HomeController@guardar_galeria_pub' );
    
    # Eliminar Galeria Publicacion
    Route::post( '/del/galeria/' , 'HomeController@borrar_galeria' );
    
    # Carar Galeria Publicacion
    Route::post( '/get/galeria/' , 'HomeController@cargar_galeria' );
    
    # Guardar publicacion
    Route::post( '/guardar/publicacion/' , 'HomeController@guardar_publicacion' );
    
    # Actualizar publicacion
    Route::post( '/actualizar/publicacion/{uuid}' , 'HomeController@actualizar_publicacion' );
    
    # cargar un publicacion
    Route::post( '/cargar/publicacion/{uuid}' , 'HomeController@cargar_publicacion' );
    
    # Listar un publicacion
    Route::post( '/listar/publicacion/' , 'HomeController@listar_publicacion' );
    
    # ////////////////////////////////////////////////////////////////
    
    # Noticias
    Route::get( '/noticias' , 'HomeController@noticias' );
    
    # Listar Noticias
    Route::post( '/listar/noticias/' , 'HomeController@listar_noticias' );
    
    # Cargar Noticias
    Route::post( '/cargar/noticias/{uuid}' , 'HomeController@cargar_noticia' );
    
    # Guardar Noticias
    Route::post( '/guardar/noticias/{uuid?}' , 'HomeController@guardar_noticia' );
    
    # ////////////////////////////////////////////////////////////////
    
    # Categorias
    Route::get( '/categoria/' , 'HomeController@categoria' );
    
    # Listar Categorias
    Route::post( '/listar/categorias/' , 'HomeController@listar_categorias' );
    
    # Cargar Categorias
    Route::post( '/cargar/categorias/{uuid}' , 'HomeController@cargar_categorias' );
    
    # Guardar Categorias
    Route::post( '/guardar/categorias/{uuid?}' , 'HomeController@guardar_categorias' );
    
    # Eliminar Categorias
    Route::post( '/del/categorias/{uuid}' , 'HomeController@borrar_categorias' );
    
    # Buscar Categorias
    Route::post( '/buscar/categorias/' , 'HomeController@guardar_categorias' );
    
    # ////////////////////////////////////////////////////////////////
    
    # Colecciones
    Route::get( '/colecciones/' , 'HomeController@colecciones' );
    
    # Listar Colecciones
    Route::post( '/listar/colecciones/' , 'HomeController@listar_colecciones' );
    
    # Cargar Colecciones
    Route::post( '/cargar/colecciones/{uuid}' , 'HomeController@cargar_colecciones' );
    
    # Guardar Colecciones
    Route::post( '/guardar/colecciones/{uuid?}' , 'HomeController@guardar_colecciones' );
    
    # Eliminar Colecciones
    Route::post( '/del/colecciones/{uuid}' , 'HomeController@borrar_colecciones' );
    
    # ////////////////////////////////////////////////////////////////
    
    # Fondo editorial
    Route::get( '/fondo_editorial/' , 'HomeController@fondo_editorial' );
    
    # Listar Fondo editorial
    Route::post( '/listar/fondo_editorial/' , 'HomeController@listar_fondo_editorial' );
    
    # Cargar Fondo editorial
    Route::post( '/cargar/fondo_editorial/{uuid}' , 'HomeController@cargar_fondo_editorial' );
    
    # Guardar Fondo editorial
    Route::post( '/guardar/fondo_editorial/{uuid?}' , 'HomeController@guardar_fondo_editorial' );
    
    # Eliminar Fondo editorial
    Route::post( '/del/fondo_editorial/{uuid}' , 'HomeController@borrar_fondo_editorial' );
    
    # ////////////////////////////////////////////////////////////////
    
    # Listar Hito
    Route::post( '/listar/hitos/' , 'HomeController@listar_hitos' );
    
    # Guardar Hito
    Route::post( '/guardar/hitos/' , 'HomeController@guardar_hitos' );
    
    # Cargar Hito
    Route::post( '/cargar/hito/{uuid}' , 'HomeController@cargar_hitos' );
    
    # Eliminar Hito
    Route::post( '/del/hito/{uuid}' , 'HomeController@borrar_hitos' );
    

    # ./ CODIGO DXNY

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
