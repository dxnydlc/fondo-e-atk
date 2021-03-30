<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FondoEditorialHitoModel extends Model
{
    protected $table = 'fondo_editorial_hito';
    protected $primaryKey = 'id';

    protected $fillable = [ 
        'uu_id','id_fondo_editorial','anio','titulo','descripcion','imagen','token'
    ];

    /**
     * Fondo editorial al que pertenece este hito.
     *
     * @return BelongsTo
     */
    public function fondo(): BelongsTo
    {
        return $this->belongsTo(FondoEditorial::class);
    }
}
