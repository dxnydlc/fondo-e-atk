<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class NoticiaModel extends Model
{

    protected $table = 'noticias';

    protected $fillable = [ 
        'uu_id','titular','slug','bajada','contenido','publicacion', 'destacado', 'seo_keywords', 'seo_titulo'
        , 'seo_descripcion', 'imagen_portada', 'imagen_detalle', 'categoria', 'activo'
    ];

}
