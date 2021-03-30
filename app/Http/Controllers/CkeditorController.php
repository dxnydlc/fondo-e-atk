<?php
  
namespace App\Http\Controllers;


use Str;

use App\User;

use DB;
use Validator;
use Redirect;
use Session;
use Auth;
use Exception;
use Storage;


use Illuminate\Http\Request;
  
class CkeditorController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ckeditor');
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function adjunar_archivo_ckEditor(Request $request)
    {
        # Vamos a adjuntar un archivo al home de consulta EMO
        $response           = array();
        $response['estado'] = 'OK';

        $extension  = $request->upload->getClientOriginalExtension();
        $extension  = strtolower( $extension );
        $fullURL    = public_path('assets/adjunto');

        $archivoNombre      = 'Img_CKEditor_'.rand(0,9999).'_'.Str::random( 32 ).'.'.$extension;
        $response['archivo']= $archivoNombre;
        $request->upload->move( $fullURL , $archivoNombre );

        $response['url']    = URL_HOME.'/assets/adjunto/'.$archivoNombre;
        $response['fisico'] = $fullURL.'/'.$archivoNombre;

        $response = '';
        $CKEditorFuncNum = $request->input('CKEditorFuncNum');
        $url =  URL_HOME.'/assets/adjunto/'.$archivoNombre;
        $msg = 'Imagen cargada'; 
        $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            
        @header('Content-type: text/html; charset=utf-8'); 
        echo $response;

        #return $response;
    }
}