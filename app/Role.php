<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zizaco\Entrust\EntrustRole;
use App\Permission;
use Illuminate\Database\Eloquent\Model;

class Role extends EntrustRole
{

    use SoftDeletes;

    protected $table = "roles";
    protected $primaryKey = "id";
    protected $fillable = [
        'name',
        'display_name',
        'description'
    ];

    protected $dates = ['deleted_at'];


    //Отношение многие ко многим
    public function Permission() {
        return $this->belongsToMany('App\Permission', 'permission_role');
    }

}
