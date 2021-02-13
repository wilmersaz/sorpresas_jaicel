<?php
use App\Models\RoleUser;
use Illuminate\Database\Seeder;

class RoleUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $roleUsers = [
            [
                'user_id' => '1',
                'role_id' => '1'
            ]
        ];

        foreach ($roleUsers as $key => $value) {
            RoleUser::create($value);
        }
    }
}
