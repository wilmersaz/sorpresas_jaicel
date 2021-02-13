<?php


use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'name' => 'crear_usuario',
                'display_name' => 'Crear Usuario',
                'description' => 'Crear Usuario'
            ],
            [
                'name' => 'editar_usuario',
                'display_name' => 'Editar Usuario',
                'description' => 'Editar Usuario'
            ],
            [
                'name' => 'mostrar_usuario',
                'display_name' => 'Mostrar Usuario',
                'description' => 'Mostrar Usuario'
            ],
            [
                'name' => 'bloquear_usuario',
                'display_name' => 'Bloquear Usuario',
                'description' => 'Bloquear Usuario'
            ],
            [
                'name' => 'crear_rol',
                'display_name' => 'Crear Rol',
                'description' => 'Crear Rol'
            ],
            [
                'name' => 'editar_rol',
                'display_name' => 'Editar Rol',
                'description' => 'Editar Rol'
            ],
            [
                'name' => 'mostrar_rol',
                'display_name' => 'Mostrar Rol',
                'description' => 'Mostrar Rol'
            ],
            [
                'name' => 'eliminar_rol',
                'display_name' => 'Eliminar Rol',
                'description' => 'Eliminar Rol'
            ]
        ];

        foreach ($permissions as $key => $value) {
            Permission::create($value);
        }

    }
}