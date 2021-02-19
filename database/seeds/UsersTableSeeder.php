<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                $users = [
            [
                'name' => 'Wilmer Sanchez',
                'username' => 'wilmer.sanchez',
                'mail' => 'wasanchez@serdan.com.co',
                'password' => '$2y$10$5KE1dLqv7KmnAaTvB2oNfOuWTFIBNYzMudBqrlifVchrWEC2Tq.zm',
                'cargo' => 'Desarrollador I',
                'estado' => 1,
                'empresa_id' => 1,
                'remember_token' => 'Lfy69r9aTJNVWF5DZah1aAaymREG6n4OSt3YiWp205Su8rjoaUx8aTqVSku0',
                'created_at' => '2019-06-20 00:08:20',
                'updated_at' => '2019-06-20 00:08:20'
            ]
        ];

        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
