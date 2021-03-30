<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class FondoEditorialModel extends Model
{

    protected $table = 'fondo_editorial';
    protected $primaryKey = 'id';

    protected $fillable = [ 
        'uu_id','titulo','slug','resumen','contenido','imagen','seo_titulo','seo_descripcion'
    ];


    public function hitos(): HasMany
    {
        return $this->hasMany(FondoEditorialHito::class);
    }
}
