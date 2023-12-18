<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cancione
 *
 * @property $id
 * @property $nombre
 * @property $album
 * @property $fecha
 * @property $duracion
 * @property $imagen
 * @property $archivo
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cancione extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'album' => 'required',
		'fecha' => 'required',
		'duracion' => 'required',
		'imagen' => 'required',
		'archivo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','album','fecha','duracion','imagen','archivo'];

    public function likes()
    {
        return $this->hasMany(Like::class, 'cancione_id');
    }

}
