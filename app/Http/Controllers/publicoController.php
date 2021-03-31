<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Hash;


use App\AutorModel;
use App\User;
use App\BannerModel;
use App\CategoriaModel;
use App\galeriaPubModel;
use App\PublicacionModel;
use App\FondoEditorialModel;
use App\FondoEditorialHitoModel;
use App\NoticiaModel;
use App\ColeccionesModel;



use DB;
use Validator;
use Redirect;
use Session;
use Auth;
use Exception;
use Storage;
use Str;



class publicoController extends Controller
{
    // --------------------------------------------
    public function __construct()
    {
        #$this->middleware('guest');
    }
    // --------------------------------------------
    public function cambiar_contrasenia()
    {
        return 'hola';
        return view('cambiarClave');
    }
    // --------------------------------------------
    public function index(Request $request)
    {
        $data = array();
        $data['vista'] = 'home';
        $data['noticias'] = array();

        $banners = BannerModel::orderby('orden','ASC')->where('activo',1)->get();
        $data['banners'] = $banners;
        # Publicaciones para la marquesina (destacadas)
        $publicaciones = PublicacionModel::where([
            [ 'activo' , '=' , 1 ] , [ 'destacado' , '=' , 1 ]
        ])
        ->orderby('id','DESC')
        ->get();
        $data['publicaciones'] = $publicaciones;

        # Fondo editorial
        $fondo = FondoEditorialModel::orderby('id','DESC')->first();
        $data['fondo'] = $fondo;

        # Noticias 3
        $lastNoti = NoticiaModel::orderby( 'id' , 'DESC' )->first();
        $data['lastNoti'] = $lastNoti;
        if( $lastNoti ){
            $lastNoti = NoticiaModel::where('id' ,'<>' , $lastNoti->id )
            ->orderby( 'id' , 'DESC' )
            ->limit(2)
            ->get();
            $data['noticias'] = $lastNoti;
        }

        # Noticias

        return view( 'welcome' , compact('data') );
    }
    // --------------------------------------------
    public function get_json_publicaciones(Request $request)
    {
        # Para el buscador del "JOME"
        $publicaciones = PublicacionModel::select(
        DB::raw(" titulo, CONCAT('".URL_MEDIA."',imagen_portada) as imagen ,CONCAT('".WEB_URL."publicacion/',slug) as url,anio as autor,id")
        )
        ->where('activo',1)
        ->orderby('titulo','ASC')
        ->get();
        return [ 'data' => $publicaciones , 'estado' => 'OK' ];
    }
    // --------------------------------------------
    public function cargar_publicacion(Request $request)
    {
        # vamos a cargar una publicacion
        $data = array();
        $data['autores'] = array();
        $data['galeria'] = array();
        $data['galeriaG'] = array();
        $data['relacionadas'] = array();
        # Capitulo
        $data['capitulo'] = array();

        if( $request['slug'] == '' ){
            # el home de publicaciones
            return redirect('/publicaciones');
        }
        $publicacion = PublicacionModel::where( 'slug' ,$request['slug'] )->first();

        if( $publicacion )
        {
            # Autores
            $data['autores'] = AutorModel::where('publicacion_id' , $publicacion->id )->get();
            # Galeria
            $data['galeria'] = galeriaPubModel::where([
                [ 'id_publicacion' , '=' , $publicacion->id ],
                [ 'tipo' ,'=', 1 ]
            ])->get();
            # Galeria General
            $data['galeriaG'] = galeriaPubModel::where([
                [ 'id_publicacion' , '=' , $publicacion->id ],
                [ 'tipo' ,'=', 3 ]
            ])->get();
            # Capitulo
            $data['capitulo'] = galeriaPubModel::where([
                [ 'id_publicacion' , '=' , $publicacion->id ],
                [ 'tipo' ,'=', 2 ]
            ])->get();
            # Publiaciones relacionadas
            $data['relacionadas'] = PublicacionModel::where([
                [ 'activo' , '=' , 1 ],
                [ 'id' , '<>' , $publicacion->id ]
            ])->get();

            $data['p'] = $publicacion;
            #return $publicacion;
            #return view( 'web.publicaciones.publicacion' , compact('data') );
            return view( 'web.publicaciones.new_publicacion' , compact('data') );
        }else{
            return "No podemos encontrar esta publicación.... >.< ";
        }
    }
    // --------------------------------------------
    public function publicaciones_(Request $request)
    {
        $data = array();
        $data['vista'] = 'home';
        
        # Destacados
        $destacadas = PublicacionModel::where([
            [ 'activo' , '=' , 1 ] , [ 'destacado' , '=' , 1 ]
        ])
        ->orderby('id','DESC')
        ->get();
        $data['destacadas'] = $destacadas;

        # Categorias
        $categorias = CategoriaModel::orderby('nombre','ASC')->get();
        $data['categorias'] = $categorias;
        # Colecciones
        $colecciones = ColeccionesModel::orderby('nombre','ASC')->get();
        $data['colecciones'] = $colecciones;
        # Fechas
        $anios = PublicacionModel::select('anio')
        ->where('activo' , 1)
        ->orderby('anio','ASC')
        ->groupby('anio')
        ->get();
        $data['anios'] = $anios;

        # Todas las publicaciones
        $publicaciones = PublicacionModel::select(DB::raw(' publicaciones.*, categorias.nombre AS categ '))
        ->where('activo',1)
        ->join('categorias', 'categorias.id', '=', 'publicaciones.categoria_id')
        ->orderby('id','DESC')
        ->get();
        $data['publicaciones'] = $publicaciones;

        return view( 'web.publicaciones.homePublicaciones' , compact('data') );
    }
    // --------------------------------------------
    public function fondo_editorial(Request $request)
    {
        # Fondo editorial
        $data = array();
        $data['vista'] = 'home';
        $data['hitos'] = array();

        $data['data'] = FondoEditorialModel::orderby( 'id' , 'DESC' )->first();

        if( $data['data'] )
        {
            $hitos = FondoEditorialHitoModel::where( 'id_fondo_editorial' , $data['data']->id )
            ->orderby('anio','ASC')
            ->get();
            $data['hitos'] = $hitos;
        }

        return view( 'web.fondo_editorial.homeFondoE' , compact('data') );
    }
    // --------------------------------------------
    public function cargar_noticias(Request $request)
    {
        # vamos a cargar una publicacion
        $data = array();
        $data['data'] = array();
        $data['noticias'] = array();

        if( $request['slug'] == '' ){
            # el home de publicaciones
            $data['noticias'] = NoticiaModel::orderby('id','DESC')->get();
            return view( 'web.noticias.homeNoti' , compact('data') );
        }
        $Noticia = NoticiaModel::where( 'slug' ,$request['slug'] )->first();

        if( $Noticia )
        {
            # Data
            $data['data'] = $Noticia;
            $notis = NoticiaModel::where( 'id' , '<>' , $Noticia->id )->orderby('id','DESC')->get();
            $data['noticias'] = $notis;
            
            return view( 'web.noticias.Noticia' , compact('data') );
        }else{
            return "No podemos encontrar esta publicación.... >.< ";
        }
    }
    // --------------------------------------------
    // --------------------------------------------
    // --------------------------------------------
    // --------------------------------------------
    // --------------------------------------------
}
