<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BannerModel extends Model
{
    protected $table = 'banners';
    protected $primaryKey = 'id';

    protected $fillable = [ 
        'uu_id','nombre','titulo','subtitulo','texto_boton','enlace',
        'nueva_ventana','imagen_desktop','imagen_movil','imagen_publicacion','orden'
        ,'activo'
    ];
}
