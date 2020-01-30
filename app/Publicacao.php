<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Publicacao extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'publicacao';
    protected $fillable = [
        'name', 'idioma', 'congregacao', 'quant','status'
    ];

    public function saveInDB($request)
    {
        $this->name = $request->name;
        $this->idioma = $request->idioma;
        $this->congregacao = $request->congregacao;
        $this->quant = $request->quant;
        $this->save();
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
}
