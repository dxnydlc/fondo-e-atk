<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PublicacionModel extends Model
{
    protected $table = "publicaciones";

    protected $fillable = [ 
        'uu_id','categoria_id','coleccion_id','titulo','slug','resumen','anio','seo_keywords','seo_titulo',
        'seo_descripcion','destacado','issuu_embed','archivo_issuu','imagen_portada','imagen_detalle','activo','dedicatoria',
        'presentacion_quote','presentacion_imagen','presentacion_detalle','preambulo_detalle','preambulo_imagen_fondo',
        'capitulo_titulo','capitulo_descripcion','capitulo_cita','color_base','color_alterno','color_titulo_base',
        'color_titulo_alterno','color_imagen_titulo_base','color_imagen_titulo_alterno','color_subtitulo_base',
        'color_subtitulo_alterno','color_texto_base','color_text_alterno','color_icono_quote','color_hover_galeria'
    ];

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    /**
     * Colección a la que pertenece la publicación.
     *
     * @return BelongsTo
     */
    public function coleccion(): BelongsTo
    {
        return $this->belongsTo(Colecciones::class);
    }

    /**
     * Autor al que pertenece la publicación.
     *
     * @return HasMany
     */
    public function autores(): HasMany
    {
        return $this->hasMany(Autor::class);
    }
}
