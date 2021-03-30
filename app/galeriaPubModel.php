<?php

#namespace App;
namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use Carbon;
use Notification;
use Session;

class galeriaPubModel extends Model
{
    #use SoftDeletes;
    protected $table = 'publicacion_galeria';
    protected $primaryKey = 'id';

    protected $fillable = [ 
        'id_publicacion','titulo','descripcion','imagen','orden','activo',
        'token','tipo'
    ];

    #protected $dates = ['deleted_at'];

    #public $timestamps = false;
    /* -------------------------------------------------------- *
    public function getCreatedAtAttribute($valor)
    {
        if( $valor != '' )
        {
            list($fecha,$hora) = explode(' ', $valor );
            list($anio,$mes,$dia) = explode('-', $fecha );
            $fecha_out = $dia.'/'.$mes.'/'.$anio;
            return $fecha_out.' '.$hora;
        }
    }
    /* -------------------------------------------------------- */
    public function setUuidAttribute( $valor )
    {
        $this->attributes['uu_id'] = strtoupper( $valor );
    }
    /* -------------------------------------------------------- */
    /* -------------------------------------------------------- */
    /* -------------------------------------------------------- */
    /* -------------------------------------------------------- */
    /* -------------------------------------------------------- */
    /* -------------------------------------------------------- */
    /* -------------------------------------------------------- */
    /* -------------------------------------------------------- */
    /* -------------------------------------------------------- */
    /* -------------------------------------------------------- */
    /* -------------------------------------------------------- */
    /* -------------------------------------------------------- */
    /* -------------------------------------------------------- */
    /* -------------------------------------------------------- */
    /* -------------------------------------------------------- */
    /* -------------------------------------------------------- */
    /* -------------------------------------------------------- */
    /* -------------------------------------------------------- */
    /* -------------------------------------------------------- */
    /* -------------------------------------------------------- */
    /* -------------------------------------------------------- */
    /* -------------------------------------------------------- */
    /* -------------------------------------------------------- */
    /* -------------------------------------------------------- */
    /* -------------------------------------------------------- */
    /* -------------------------------------------------------- */
    /* -------------------------------------------------------- */
    /* -------------------------------------------------------- */
    /* -------------------------------------------------------- */
    /* -------------------------------------------------------- */
    /* -------------------------------------------------------- */
}
