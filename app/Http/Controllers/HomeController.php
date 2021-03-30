<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


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



use Validator;

class HomeController extends Controller
{
    // --------------------------------------------
    public function __construct()
    {
        $this->middleware('auth');
    }
    // --------------------------------------------
    public function index()
    {
        return view('home');
    }
    // --------------------------------------------
    public function configuracion(Request $request)
    {
        return view('cambiarClave');
    }
    // --------------------------------------------
    public function banners(Request $request)
    {
        $data = array();
        $data['vista'] = 'banners';
        return view( 'banners.homeBanners' , compact('data') );
    }
    // --------------------------------------------
    public function publicaciones(Request $request)
    {
        $data = array();
        $data['vista'] = 'publicaciones';
        return view( 'publicaciones.homePubs' , compact('data') );
    }
    // --------------------------------------------
    // --------------------------------------------
    // --------------------------------------------
    // --------------------------------------------
    // --------------------------------------------
    // --------------------------------------------
    // --------------------------------------------
    // --------------------------------------------
    // --------------------------------------------
    // --------------------------------------------
    public function cambiar_clave(Request $request)
    {
        # Cambiamos la clave del root

        try {
            #
            $clave = Hash::make($request->clave);
            User::where('id',1)->update([ 'password' => $clave ]);

            return [ 'estado' => 'OK' ];
            #
        } catch (Exception $e) {
            return [ 'estado' => 'ERROR' , 'error' => $e->getMessage() ];
        }
    }
    // --------------------------------------------
    public function guardar_banner(Request $request)
    {
        #
        $response = array();
        $response['estado'] = 'OK';

        $validator  = Validator::make($request->all(), [ 
            'nombre'         => 'required' , 
            'titulo'         => 'required' , 
            'titulo'         => 'required' , 
            'orden'          => 'required' ,
            'texto_boton'    => 'required' ,
            'enlace'         => 'required',
            'imagen_desktop' => 'required',
            'imagen_movil'   => 'required',
            'imagen_publicacion' => 'required'
        ]);
        if ($validator->fails())
        {
            $response['estado'] = 'ERROR';
            $response['errores'] = $validator->errors();
        }else{
            #
            $dataInsert       = BannerModel::create( $request->all() );
            $response['data'] = $dataInsert;
            #
        }

        return $response;
    }
    // --------------------------------------------
    public function todos_banner(Request $request)
    {
        #
        $response = array();
        $response['estado'] = 'OK';
        $sData = BannerModel::orderby('id','DESC')->get();
        $response['data'] = $sData;
        return $response;
    }
    // --------------------------------------------
    public function cargar_banner(Request $request)
    {
        #
        $response = array();
        $response['estado'] = 'OK';
        $sData = BannerModel::where( 'uu_id', $request['uuid'] )->first();
        #
        $response['data'] = $sData;
        return $response;
    }
    // --------------------------------------------
    public function actualizar_banner(Request $request)
    {
        $response = array();
        $response['estado'] = 'OK';
        unset( $request['_token'] );
        BannerModel::where( 'uu_id', $request['uuid'] )->update( $request->all() );
        #
        $sData = BannerModel::where( 'uu_id', $request['uuid'] )->first();
        #
        $response['data'] = $sData;
        return $response;
    }
    // --------------------------------------------
    // --------------------------------------------
    #                AUTORES             #
    // --------------------------------------------
    // --------------------------------------------
    public function guardar_autores(Request $request)
    {
        #
        $response = array();
        $response['estado'] = 'OK';

        $validator  = Validator::make($request->all(), [ 
            'nombre'    => 'required' , 
            'biografia' => 'required' , 
            'imagen'    => 'required' 
        ]);
        if ($validator->fails())
        {
            $response['estado'] = 'ERROR';
            $response['errores'] = $validator->errors();
        }else{
            #
            if( $request['id'] == 0 ){
                $dataInsert = AutorModel::create( $request->all() );
            }else{
                unset( $request['_token'] );
                $dataInsert = AutorModel::where('id',$request['id'])->update( $request->all() );
            }

            if( $request['publicacion_id'] == 0 ){
                $response['data'] = AutorModel::where('slug',$request['slug'])->get();
            }else{
                $response['data'] = AutorModel::where('publicacion_id',$request['publicacion_id'])->get();
            }
            #
        }

        return $response;
    }
    // --------------------------------------------
    public function cargar_autor(Request $request)
    {
        #
        $response = array();
        $response['estado'] = 'OK';
        $sData = AutorModel::where( 'id', $request['id'] )->first();
        #
        $response['data'] = $sData;
        return $response;
    }
    // --------------------------------------------
    public function borrar_autor(Request $request)
    {
        #
        $response = array();
        $response['estado'] = 'OK';

        $validator  = Validator::make($request->all(), [ 
            'uuid' => 'required' 
        ]);
        if ($validator->fails())
        {
            $response['estado'] = 'ERROR';
            $response['errores'] = $validator->errors();
        }else{
            #
            AutorModel::where( 'id' , $request['uuid'] )->delete();
            if( $request['publicacion_id'] == 0 ){
                $response['data'] = AutorModel::where('slug',$request['slug'])->get();
            }else{
                $response['data'] = AutorModel::where('id',$request['publicacion_id'])->get();
            }
            #
        }

        return $response;
    }
    // --------------------------------------------
    public function guardar_galeria_pub(Request $request)
    {
        #
        $response = array();
        $response['estado'] = 'OK';

        $validator  = Validator::make($request->all(), [ 
            'titulo'    => 'required' , 
            'descripcion' => 'required' , 
            'imagen'    => 'required',
            'orden'    => 'required',
        ]);
        if ($validator->fails())
        {
            $response['estado'] = 'ERROR';
            $response['errores'] = $validator->errors();
        }else{
            #
            if( $request['id'] == 0 ){
                $dataInsert = galeriaPubModel::create( $request->all() );
            }else{
                unset( $request['_token'] );
                $dataInsert = galeriaPubModel::where( 'id' , $request['id'] )->update( $request->all() );
            }
            if( $request['publicacion_id'] == 0 ){
                $response['data'] = galeriaPubModel::where([
                    [ 'token',$request['token'] ],
                    [ 'tipo','=',$request['tipo'] ]
                ])->get();
            }else{
                $response['data'] = galeriaPubModel::where([
                    [ 'id',$request['publicacion_id'] ],
                    [ 'tipo','=',$request['tipo'] ]
                ])->get();
            }
            #
        }

        return $response;
    }
    // --------------------------------------------
    public function borrar_galeria(Request $request)
    {
        #
        $response = array();
        $response['estado'] = 'OK';

        $validator  = Validator::make($request->all(), [ 
            'uuid' => 'required' 
        ]);
        if ($validator->fails())
        {
            $response['estado'] = 'ERROR';
            $response['errores'] = $validator->errors();
        }else{
            #
            galeriaPubModel::where( 'id' , $request['uuid'] )->delete();
            if( $request['publicacion_id'] == 0 ){
                $response['data'] = galeriaPubModel::where([
                    [ 'token','=',$request['token'] ],
                    [ 'tipo','=',$request['tipo'] ]
                ])->get();
            }else{
                $response['data'] = galeriaPubModel::where([
                    [ 'id_publicacion', '=' ,$request['publicacion_id'] ],
                    [ 'tipo','=',$request['tipo'] ]
                ])->get();
                $response['o'] = 'PUBLICACION';
            }
            #
        }

        return $response;
    }
    // --------------------------------------------
    #                PUBLICACIONES             #
    // --------------------------------------------
    public function guardar_publicacion(Request $request)
    {
        #
        $response = array();
        $response['estado'] = 'OK';

        $validator  = Validator::make($request->all(), [ 
            'categoria_id'  => 'required' , 
            'titulo'        => 'required' , 
            'resumen'       => 'required',
            'anio'          => 'required',
            'dedicatoria'   => 'required',
        ]);
        if ($validator->fails())
        {
            $response['estado'] = 'ERROR';
            $response['errores'] = $validator->errors();
        }else{
            #
            $slug            = urlencode( $request['titulo'] );
            $request['slug'] = $slug;
            if(! isset($request['destacado']) ){
                $request['destacado'] = 0;
            }
            if(! isset($request['activo']) ){
                $request['activo'] = 0;
            }
            $dataInsert = PublicacionModel::create( $request->all() );
            $IdpUB = $dataInsert->id;
            # Unir galeria
            galeriaPubModel::where('token',$request['uu_id'])->update([ 'id_publicacion' => $IdpUB ]);
            # Unir autores
            AutorModel::where('slug',$request['uu_id'])->update([ 'publicacion_id' => $IdpUB ]);
            
            $response['data'] = $dataInsert;
            #
        }

        return $response;
    }
    // --------------------------------------------
    public function cargar_publicacion(Request $request)
    {
        #
        $response = array();
        $response['estado'] = 'OK';
        
        $response['galeria']    = array();
        $response['capitulos']  = array();
        $response['autores']    = array();
        #
        $sData = PublicacionModel::where( 'uu_id', $request['uuid'] )->first();
        #
        if( $sData )
        {
            // Galeria
            $response['galeria'] = galeriaPubModel::where([
                [ 'id_publicacion','=',$sData->id ],
                [ 'tipo' ,'=', 1 ]
            ])->get();
            // Capitulos
            $response['capitulos'] = galeriaPubModel::where([
                [ 'id_publicacion','=',$sData->id ],
                [ 'tipo' ,'=', 2 ]
            ])->get();
            // Autores
            $response['autores'] = AutorModel::where('publicacion_id',$sData->id)->get();
        }
        #
        $response['data'] = $sData;
        return $response;
    }
    // --------------------------------------------
    public function listar_publicacion(Request $request)
    {
        $response = array();
        $response['estado']     = 'OK';

        $sData = PublicacionModel::orderby('id','DESC')->get();
        $response['data'] = $sData;

        return $response;
    }
    // --------------------------------------------
    public function actualizar_publicacion(Request $request)
    {
        $response = array();
        $response['estado'] = 'OK';
        unset( $request['_token'] );
        unset( $request['tblGaleria_length'] );
        unset( $request['tblAutores_length'] );
        unset( $request['tblCapitulo_length'] );

        if(! isset($request['destacado']) ){
            $request['destacado'] = 0;
        }
        if(! isset($request['activo']) ){
            $request['activo'] = 0;
        }
        unset($request['id']);
        $slug = $this->slugify( $request['titulo'] );
        $request['slug'] = $slug;
        PublicacionModel::where( 'uu_id', $request['uuid'] )->update( $request->all() );
        #
        $sData = PublicacionModel::where( 'uu_id', $request['uuid'] )->first();
        #
        $response['data'] = $sData;
        return $response;
    }
    // --------------------------------------------
    public function cargar_galeria(Request $request)
    {
        #
        $response = array();
        $response['estado'] = 'OK';
        $sData = galeriaPubModel::where( 'id', $request['id'] )->first();
        #
        $response['data'] = $sData;
        return $response;
    }
    // --------------------------------------------
    #                FONDO EDITORIAL             #
    public function fondo_editorial(Request $request)
    {
        #
        $data = array();
        $data['vista'] = 'noticias';
        return view( 'fondo_editorial.homeFE' , compact('data') );
    }
    // --------------------------------------------
    public function listar_fondo_editorial(Request $request)
    {
        $response = array();
        $response['estado'] = 'OK';
        $sData = FondoEditorialModel::orderby('id','DESC')->first();
        $response['data'] = $sData;
        return $response;
    }
    // --------------------------------------------
    public function cargar_fondo_editorial(Request $request)
    {
        #
        $response = array();
        $response['estado'] = 'OK';
        $sData = FondoEditorialModel::where( 'uu_id', $request['uuid'] )->first();
        $response['data'] = $request['uuid'];
        #
        $response['data'] = $sData;
        return $response;
    }
    // --------------------------------------------
    public function guardar_fondo_editorial(Request $request)
    {
        #
        $response = array();
        $response['estado'] = 'OK';
        #
        $validator  = Validator::make($request->all(), [ 
            'titulo' => 'required' ,
            'imagen' => 'required' 
        ]);
        #
        unset($request['tblHitos_length']);
        $slug            = urlencode( $request['titulo'] );
        $request['slug'] = $slug;
        #
        if ($validator->fails())
        {
            $response['estado'] = 'ERROR';
            $response['errores'] = $validator->errors();
        }else{
            #
            $id = $request['id'];
            unset( $request['_token'] );
            if( $request['id'] == 0 ){
                $dataInsert = FondoEditorialModel::create( $request->all() );
            }else{
                unset( $request['id'] );
                $dataInsert = FondoEditorialModel::where( 'id' , $id )->first();
                if( $dataInsert ){
                    FondoEditorialModel::where( 'id' , $id )->update( $request->all() );
                }
            }
            $response['data'] = FondoEditorialModel::where( 'id' , $dataInsert->id )->first();
            #
        }
        return $response;
    }
    // --------------------------------------------
    public function borrar_fondo_editorial(Request $request)
    {
        #
        $response = array();
        $response['estado'] = 'OK';
        
        $response['data'] = FondoEditorialModel::where( 'uu_id' , $request['uuid'] )->get();
        FondoEditorialModel::where( 'uu_id' , $request['uuid'] )->delete();

        return $response;
    }
    // --------------------------------------------
    #           HITOS FONDO EDITORIAL             #
    // --------------------------------------------
    public function listar_hitos(Request $request)
    {
        $response = array();
        $response['estado'] = 'OK';
        $IdFE = $request['id_fondo_editorial'];
        if( $IdFE == 0 ){
            $sData = FondoEditorialHitoModel::where( 'token' , $request['uu_id'] )->orderby('id','DESC')->get();
            
        }else{
            $sData = FondoEditorialHitoModel::where( 'id_fondo_editorial' , $request['id_fondo_editorial'] )->orderby('id','DESC')->get();
        }

        $response['data'] = $sData;
        return $response;
    }
    // --------------------------------------------
    public function cargar_hitos(Request $request)
    {
        #
        $response = array();
        $response['estado'] = 'OK';
        $sData = FondoEditorialHitoModel::where( 'uu_id', $request['uuid'] )->first();
        $response['uuid'] = $request['uuid'];
        #
        $response['data'] = $sData;
        return $response;
    }
    // --------------------------------------------
    public function guardar_hitos(Request $request)
    {
        #
        $response = array();
        $response['estado'] = 'OK';
        #
        $validator  = Validator::make($request->all(), [ 
            'titulo' => 'required' ,
            'imagen' => 'required' 
        ]);
        #
        #$slug            = urlencode( $request['titulo'] );
        #$request['slug'] = $slug;
        #
        if ($validator->fails())
        {
            $response['estado'] = 'ERROR';
            $response['errores'] = $validator->errors();
        }else{
            #
            $id = $request['id'];
            unset( $request['_token'] );
            if( $request['id'] == 0 ){
                $dataInsert = FondoEditorialHitoModel::create( $request->all() );
            }else{
                unset( $request['id'] );
                $dataInsert = FondoEditorialHitoModel::where( 'id' , $id )->first();
                if( $dataInsert ){
                    FondoEditorialHitoModel::where( 'id' , $id )->update( $request->all() );
                }
            }
            $response['data'] = FondoEditorialHitoModel::where( 'id' , $dataInsert->id )->first();
            #
        }
        return $response;
    }
    // --------------------------------------------
    public function borrar_hitos(Request $request)
    {
        #
        $response = array();
        $response['estado'] = 'OK';
        
        $response['data'] = FondoEditorialHitoModel::where( 'uu_id' , $request['uuid'] )->get();
        FondoEditorialHitoModel::where( 'uu_id' , $request['uuid'] )->delete();

        return $response;
    }
    // --------------------------------------------
    #           NOTICIAS             #
    // --------------------------------------------
    public function noticias(Request $request)
    {
        $data = array();
        $data['vista'] = 'noticias';
        return view( 'noticias.homeNoti' , compact('data') );
    }
    // --------------------------------------------
    public function get_noticia(Request $request)
    {
        #
        $response = array();
        $response['estado'] = 'OK';
        $sData = NoticiaModel::where( 'id', $request['id'] )->first();
        #
        $response['data'] = $sData;
        return $response;
    }
    // --------------------------------------------
    public function listar_noticias(Request $request)
    {
        $response = array();
        $response['estado']     = 'OK';

        $sData = NoticiaModel::orderby('id','DESC')->get();
        $response['data'] = $sData;

        return $response;
    }
    // --------------------------------------------
    public function cargar_noticia(Request $request)
    {
        #
        $response = array();
        $response['estado'] = 'OK';
        $sData = NoticiaModel::where( 'uu_id', $request['uuid'] )->first();
        $response['data'] = $request['uuid'];
        #
        $response['data'] = $sData;
        return $response;
    }
    // --------------------------------------------
    public function guardar_noticia(Request $request)
    {
        #
        $response = array();
        $response['estado'] = 'OK';
        #
        $validator  = Validator::make($request->all(), [ 
            'titular'        => 'required',
            'imagen_portada' => 'required',
            'imagen_detalle' => 'required',
            'categoria'      => 'required'
        ]);
        #
        if ($validator->fails())
        {
            $response['estado'] = 'ERROR';
            $response['errores'] = $validator->errors();
        }else{
            #
            $id = $request['id'];
            unset( $request['_token'] );
            $slug = $this->slugify( $request['titular'] );
            $request['slug'] = $slug;
            if(! isset($request['destacado']) ){
                $request['destacado'] = 0;
            }
            #
            if( $request['id'] == 0 ){
                $dataInsert = NoticiaModel::create( $request->all() );
            }else{
                unset( $request['id'] );
                $dataInsert = NoticiaModel::where( 'id' , $id )->first();
                if( $dataInsert ){
                    NoticiaModel::where( 'id' , $id )->update( $request->all() );
                }
            }
            $response['data'] = NoticiaModel::where( 'id' , $dataInsert->id )->first();
            #
        }
        return $response;
    }
    // --------------------------------------------
    #           COLECCIONES             #
    // --------------------------------------------
    public function colecciones(Request $request)
    {
        #
        $data = array();
        $data['vista'] = 'noticias';
        return view( 'colecciones.homeColec' , compact('data') );
    }
    // --------------------------------------------
    public function listar_colecciones(Request $request)
    {
        $response = array();
        $response['estado'] = 'OK';
        $sData = ColeccionesModel::orderby('nombre','ASC')->get();
        $response['data'] = $sData;
        return $response;
    }
    // --------------------------------------------
    public function cargar_colecciones(Request $request)
    {
        #
        $response = array();
        $response['estado'] = 'OK';
        $sData = ColeccionesModel::where( 'uu_id', $request['uuid'] )->first();
        $response['data'] = $request['uuid'];
        #
        $response['data'] = $sData;
        return $response;
    }
    // --------------------------------------------
    public function guardar_colecciones(Request $request)
    {
        #
        $response = array();
        $response['estado'] = 'OK';
        #
        $validator  = Validator::make($request->all(), [ 
            'nombre' => 'required' 
        ]);
        #
        $slug            = urlencode( $request['nombre'] );
        $request['slug'] = $slug;
        #
        if ($validator->fails())
        {
            $response['estado'] = 'ERROR';
            $response['errores'] = $validator->errors();
        }else{
            #
            $id = $request['id'];
            unset( $request['_token'] );
            if( $request['id'] == 0 ){
                $dataInsert = ColeccionesModel::create( $request->all() );
            }else{
                unset( $request['id'] );
                $dataInsert = ColeccionesModel::where( 'id' , $id )->first();
                if( $dataInsert ){
                    ColeccionesModel::where( 'id' , $id )->update( $request->all() );
                }
            }
            $response['data'] = ColeccionesModel::where( 'id' , $dataInsert->id )->first();
            #
        }
        return $response;
    }
    // --------------------------------------------
    public function borrar_colecciones(Request $request)
    {
        #
        $response = array();
        $response['estado'] = 'OK';
        
        $response['data'] = ColeccionesModel::where( 'uu_id' , $request['uuid'] )->get();
        ColeccionesModel::where( 'uu_id' , $request['uuid'] )->delete();

        return $response;
    }
    // --------------------------------------------
    #           CATEGORIAS              #
    // --------------------------------------------
    public function categoria(Request $request)
    {
        #
        $data = array();
        $data['vista'] = 'noticias';
        return view( 'categoria.homeCateg' , compact('data') );
    }
    // --------------------------------------------
    public function listar_categorias(Request $request)
    {
        $response = array();
        $response['estado'] = 'OK';
        $sData = CategoriaModel::orderby('nombre','ASC')->get();
        $response['data'] = $sData;
        return $response;
    }
    // --------------------------------------------
    public function cargar_categorias(Request $request)
    {
        #
        $response = array();
        $response['estado'] = 'OK';
        $sData = CategoriaModel::where( 'uu_id', $request['uuid'] )->first();
        $response['data'] = $request['uuid'];
        #
        $response['data'] = $sData;
        return $response;
    }
    // --------------------------------------------
    public function guardar_categorias(Request $request)
    {
        #
        $response = array();
        $response['estado'] = 'OK';
        #
        $validator  = Validator::make($request->all(), [ 
            'nombre' => 'required' 
        ]);
        #
        $slug            = urlencode( $request['nombre'] );
        $request['slug'] = $slug;
        #
        if ($validator->fails())
        {
            $response['estado'] = 'ERROR';
            $response['errores'] = $validator->errors();
        }else{
            #
            $id = $request['id'];
            unset( $request['_token'] );
            if( $request['id'] == 0 ){
                $dataInsert = CategoriaModel::create( $request->all() );
            }else{
                unset( $request['id'] );
                $dataInsert = CategoriaModel::where( 'id' , $id )->first();
                if( $dataInsert ){
                    CategoriaModel::where( 'id' , $id )->update( $request->all() );
                }
            }
            $response['data'] = CategoriaModel::where( 'id' , $dataInsert->id )->first();
            #
        }
        return $response;
    }
    // --------------------------------------------
    public function borrar_categorias(Request $request)
    {
        #
        $response = array();
        $response['estado'] = 'OK';
        
        $response['data'] = CategoriaModel::where( 'uu_id' , $request['uuid'] )->get();
        CategoriaModel::where( 'uu_id' , $request['uuid'] )->delete();

        return $response;
    }
    // --------------------------------------------
    public function buscar_categorias(Request $request)
    {
        #
        $response = array();
        $response['estado'] = 'OK';
        
        $response['data'] = CategoriaModel::where( 'uu_id' , $request['uuid'] )->get();

        return $response;
    }
    // --------------------------------------------
    // --------------------------------------------
    // --------------------------------------------
    // --------------------------------------------
    // --------------------------------------------
    // --------------------------------------------
    // --------------------------------------------
    // --------------------------------------------
    // --------------------------------------------
    // --------------------------------------------
    // --------------------------------------------
    // --------------------------------------------
    // --------------------------------------------
    // --------------------------------------------
    public static function slugify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
    // --------------------------------------------
}
