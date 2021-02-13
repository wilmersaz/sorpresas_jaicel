<?php

namespace App\Models;

use Eloquent as Model;
use Zizaco\Entrust\EntrustPermission;

/**
 * Class Permission
 * @package App\Models
 * @version October 25, 2018, 3:58 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection modulos
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property \Illuminate\Database\Eloquent\Collection tarifas
 * @property string name
 * @property string display_name
 * @property string description
 */
class Permission extends EntrustPermission{

    public $table = 'permissions';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'name',
        'display_name',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'display_name' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function roles(){
        return $this->belongsToMany(\App\Models\Role::class, 'permission_role');
    }
}
