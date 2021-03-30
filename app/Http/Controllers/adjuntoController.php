<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Str;

use App\User;

use DB;
use Validator;
use Redirect;
use Session;
use Auth;
use Exception;
use Storage;


class adjuntoController extends Controller
{
    /* ----------------------------------------------------------------- */
    public function __construct()
    {
        $session_token = session('session_token');
        if( $session_token == '' )
        {
            session()->put('session_token', Str::random( 64 ) );
        }
        $this->middleware('auth');
    }
    /* ----------------------------------------------------------------- */
    public function adjunar_archivo_banner(Request $request)
    {
        # Vamos a adjuntar un archivo al home de consulta EMO
        $response           = array();
        $response['estado'] = 'OK';

        $extension  = $request->formData->getClientOriginalExtension();
        $extension  = strtolower( $extension );
        $fullURL    = public_path('assets/adjunto');

        $archivoNombre      = 'Banner_'.rand(0,9999).'_'.Str::random( 32 ).'.'.$extension;
        $response['archivo']= $archivoNombre;
        $request->formData->move( $fullURL , $archivoNombre );

        $response['url']    = URL_MEDIA.$archivoNombre;
        $response['fisico'] = $fullURL.'/'.$archivoNombre;

        return $response;
    }
    /* ----------------------------------------------------------------- */
    public function adjuntar_archivo_pdf(Request $request)
    {
        # Vamos a adjuntar un archivo al home de consulta EMO
        $response           = array();
        $response['estado'] = 'OK';

        $extension  = $request->formData->getClientOriginalExtension();
        $extension  = strtolower( $extension );
        $fullURL    = public_path('assets/adjunto');

        $archivoNombre      = 'ISSUU_'.rand(0,9999).'_'.Str::random( 32 ).'.'.$extension;
        $response['archivo']= $archivoNombre;
        $request->formData->move( $fullURL , $archivoNombre );

        $response['url']    = URL_MEDIA.$archivoNombre;
        $response['fisico'] = $fullURL.'/'.$archivoNombre;

        return $response;
    }
    /* ----------------------------------------------------------------- */
    public function adjunar_archivo_publicacion(Request $request)
    {
        # Vamos a adjuntar un archivo al home de consulta EMO
        $response           = array();
        $response['estado'] = 'OK';

        $extension  = $request->formData->getClientOriginalExtension();
        $extension  = strtolower( $extension );
        $fullURL    = public_path('assets/adjunto');

        $archivoNombre      = 'Publicacion_'.rand(0,9999).'_'.Str::random( 32 ).'.'.$extension;
        $response['archivo']= $archivoNombre;
        $request->formData->move( $fullURL , $archivoNombre );

        $response['url']    = URL_MEDIA.$archivoNombre;
        $response['fisico'] = $fullURL.'/'.$archivoNombre;

        return $response;
    }
    /* ----------------------------------------------------------------- */
    public function adjuntar_archivo_noticias(Request $request)
    {
        # Vamos a adjuntar un archivo al home de consulta EMO
        $response           = array();
        $response['estado'] = 'OK';

        $extension  = $request->formData->getClientOriginalExtension();
        $extension  = strtolower( $extension );
        $fullURL    = public_path('assets/adjunto');

        $archivoNombre      = 'Noticias_'.rand(0,9999).'_'.Str::random( 32 ).'.'.$extension;
        $response['archivo']= $archivoNombre;
        $request->formData->move( $fullURL , $archivoNombre );

        $response['url']    = URL_MEDIA.$archivoNombre;
        $response['fisico'] = $fullURL.'/'.$archivoNombre;

        return $response;
    }
    /* ----------------------------------------------------------------- */
    public function adjuntar_fondo_editorial(Request $request)
    {
        # Vamos a adjuntar un archivo al home de consulta EMO
        $response           = array();
        $response['estado'] = 'OK';

        $extension  = $request->formData->getClientOriginalExtension();
        $extension  = strtolower( $extension );
        $fullURL    = public_path('assets/adjunto');

        $archivoNombre      = 'Fondo-editorial_'.rand(0,9999).'_'.Str::random( 32 ).'.'.$extension;
        $response['archivo']= $archivoNombre;
        $request->formData->move( $fullURL , $archivoNombre );

        $response['url']    = URL_MEDIA.$archivoNombre;
        $response['fisico'] = $fullURL.'/'.$archivoNombre;

        return $response;
    }
    /* ----------------------------------------------------------------- */
    /* ----------------------------------------------------------------- */
    /* ----------------------------------------------------------------- */
    /* ----------------------------------------------------------------- */
    /* ----------------------------------------------------------------- */
    public function adjunar_archivo_ckEditor(Request $request)
    {
        # Vamos a adjuntar un archivo al home de consulta EMO
        $response           = array();
        $response['estado'] = 'OK';

        $extension  = $request->formData->getClientOriginalExtension();
        $extension  = strtolower( $extension );
        $fullURL    = public_path('assets/adjunto');

        $archivoNombre      = 'Img_CKEditor_'.rand(0,9999).'_'.Str::random( 32 ).'.'.$extension;
        $response['archivo']= $archivoNombre;
        $request->formData->move( $fullURL , $archivoNombre );

        $response['url']    = URL_MEDIA.$archivoNombre;
        $response['fisico'] = $fullURL.'/'.$archivoNombre;

        return $response;
    }
    /* ----------------------------------------------------------------- */
    /* ----------------------------------------------------------------- */
    /* ----------------------------------------------------------------- */
    /* ----------------------------------------------------------------- */
    /* ----------------------------------------------------------------- */
    /* ----------------------------------------------------------------- */
    /* ----------------------------------------------------------------- */
    /* ----------------------------------------------------------------- */
}
