<?php

namespace App\Repositories;

use App\Models\Empresa;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EmpresaRepository
 * @package App\Repositories
 * @version August 27, 2019, 2:37 pm UTC
 *
 * @method Empresa findWithoutFail($id, $columns = ['*'])
 * @method Empresa find($id, $columns = ['*'])
 * @method Empresa first($columns = ['*'])
*/
class EmpresaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'nit',
        'direccion',
        'telefono',
        'tipo_pago',
        'ciudad_id',
        'asesor_id',
        'gestor_id',
        'ics_numero',
        'estado_id',
        'regimen_id',
        'actividad_economica',
        'tipo_persona',
        'persona_contacto',
        'email',
        'cartera',
        'observaciones'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Empresa::class;
    }
}
