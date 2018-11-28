<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zizaco\Entrust\EntrustPermission;

use Illuminate\Database\Eloquent\Model;

class Permission extends EntrustPermission
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'display_name',
        'description'
    ];

    protected $dates = ['deleted_at'];

}
