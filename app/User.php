<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use App\Role;

class User extends Authenticatable
{
   //use SoftDeletes ;
    use EntrustUserTrait ;
    use Notifiable;






    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'fio'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $softDelete = true;
    protected $dates = ['deleted_at'];



    //Связь с ролями один ко многим
    public function Role () {
        return $this->belongsToMany('App\Role', 'role_user');
    }
}
