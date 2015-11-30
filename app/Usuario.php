<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model {

    protected $table = 'usuarios';
    protected $primaryKey = 'id';

    protected $fillable = [

        'nombre',
        'apellido_p',
        'apellido_m',
        'email'
    ];

}
