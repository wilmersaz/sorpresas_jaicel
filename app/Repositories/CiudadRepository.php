<?php

namespace App\Repositories;

use App\Models\Ciudad;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CiudadRepository
 * @package App\Repositories
 * @version August 7, 2019, 5:55 pm UTC
 *
 * @method Ciudad findWithoutFail($id, $columns = ['*'])
 * @method Ciudad find($id, $columns = ['*'])
 * @method Ciudad first($columns = ['*'])
*/
class CiudadRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Ciudad::class;
    }
}
