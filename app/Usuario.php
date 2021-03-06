<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;
class Usuario extends Model implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable, CanResetPassword, SoftDeletes;

    protected $table = 'usuarios';
    protected $primaryKey = 'id';

    protected $fillable = [

        'nombre',
        'apellido_p',
        'apellido_m',
        'email',
        'password',
        'url_avatar'
    ];

    protected $dates = ['deleted_at'];

}
