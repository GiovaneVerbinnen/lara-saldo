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
        User::create([
            'name' => 'Giovane Oliveira',
            'email' => 'giovane.oliveira@funcionalconsultoria.com.br',
            'password' => bcrypt('240380'),
        ]);

        User::create([
            'name' => 'Teste',
            'email' => 'teste@funcionalconsultoria.com.br',
            'password' => bcrypt('123456'),
        ]);
    }
}
