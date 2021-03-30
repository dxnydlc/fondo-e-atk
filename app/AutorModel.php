<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class AutorModel extends Model
{


    protected $table = 'autores';
    protected $primaryKey = 'id';

    protected $fillable = [ 
        'uu_id','nombre','slug','biografia','imagen','publicacion_id'
    ];

    public function publicacion(): BelongsTo
    {
        return $this->belongsTo(Publicacion::class);
    }
}
