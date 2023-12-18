<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Musica
 *
 * @property $id
 * @property $nombre
 * @property $album
 * @property $fecha
 * @property $duracion
 * @property $imagen
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Musica extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'album' => 'required',
		'fecha' => 'required',
		'duracion' => 'required',
		'imagen' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','album','fecha','duracion','imagen'];



}
