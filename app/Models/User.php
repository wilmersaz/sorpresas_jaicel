<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable,EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','username', 'estado', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
    ];

    public function roles(){
        return $this->belongsToMany(\App\Models\Role::class, 'role_user');
    }
    public function roles_id(){
        return $this->hasMany('App\Models\RoleUser','user_id','id');
    }    
    public function empresas(){
       return $this->hasOne('App\Models\Empresa','id','empresa_id');
    }
}
