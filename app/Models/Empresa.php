<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empresa extends Model
{
    public $table = 'empresas';

    public $fillable = [
        'nombre',
        'nit',
        'direccion',
        'sede',
        'ciudad_id',
        'estado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'nit' => 'string',
        'direccion' => 'string',
        'sede' => 'string',
        'ciudad_id' => 'string',
        'estado' => 'integer'
    ];
    
    public static $rules = [

    ];
    public function ciudad(){
        return $this->hasOne('App\Models\Ciudad','id','ciudad_id');
    }
}