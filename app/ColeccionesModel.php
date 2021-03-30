<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class ColeccionesModel extends Model
{


    protected $table = 'colecciones';
    protected $primaryKey = 'id';

    protected $fillable = [ 
        'uu_id','nombre','slug'
    ];

    public function publicaciones(): HasMany
    {
        return $this->hasMany(Publicacion::class);
    }
}
