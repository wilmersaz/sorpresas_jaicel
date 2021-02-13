<?php

use App\Models\PermissionRole;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$permissionsRole = [
    		[
    			'permission_id' => 1,
    			'role_id' => 1 ,
    		],
    		[
    			'permission_id' => 2,
    			'role_id' => 1,
    		],
    		[
    			'permission_id' => 3,
    			'role_id' => 1,
    		],
    		[
    			'permission_id' => 4,
    			'role_id' => 1,
    		],
    		[
    			'permission_id' => 5,
    			'role_id' => 1,
    		],
    		[
    			'permission_id' => 6,
    			'role_id' => 1,
    		],
    		[
    			'permission_id' => 7,
    			'role_id' => 1,
    		],
    		[
    			'permission_id' => 8,
    			'role_id' => 1,
    		]
    	];

    	foreach ($permissionsRole as $key => $value) {
    		PermissionRole::create($value);
    	}
    }
}
