<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Like extends Model
{
    protected $fillable = [
        'user_id', 'like', 'cancione_id',
    ];

    public function user(){

        return $this->belongsTo('App\User');
    }

    public function post(){
        return $this->belongsTo('App\Post');
    }




}
