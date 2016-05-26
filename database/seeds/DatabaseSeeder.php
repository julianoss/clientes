<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuario')->insert(
            [
                'login' => 'admin',
                'senha' => bcrypt('admin'),
            ]
        );

        DB::table('cliente')->insert(
            [
                'nome' => 'GM',
                'telefone' => '51 88779955',
                'email' => str_random(10).'@gmail.com',
            ]
        );

        DB::table('cliente')->insert(
            [
                'nome' => 'Fiat',
                'telefone' => '51 66223568',
                'email' => str_random(10).'@gmail.com',
            ]
        );

        DB::table('cliente')->insert(
            [
                'nome' => 'Renault',
                'telefone' => '51 41258874',
                'email' => str_random(10).'@gmail.com',
            ]
        );
    }
}
