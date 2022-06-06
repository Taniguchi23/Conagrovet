<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{

    public function run()
    {
       $users = [
           [
               'name' => 'Reyna Miriam',
               'lastname' => 'Condori Garcia',
               'email' => 'admin@mail.com',
               'password' => Hash::make('123'),
               'dni' => '12345678',
               'tipo' => 'A',
           ],
           [
               'name' => 'Doctor Uno',
               'lastname' => 'Almenara',
               'email' => 'doctor1@mail.com',
               'password' => Hash::make('123'),
               'dni' => '12345678',
               'tipo' => 'D',
           ],
           [
               'name' => 'Doctor Dos',
               'lastname' => 'Grau',
               'email' => 'doctor2@mail.com',
               'password' => Hash::make('123'),
               'dni' => '12345678',
               'tipo' => 'D',
           ],
           [
               'name' => 'Cliente Uno',
               'lastname' => 'Juarez',
               'email' => 'cliente1@mail.com',
               'password' => Hash::make('123'),
               'dni' => '12345678',
               'tipo' => 'C',
           ],
           [
               'name' => 'Cliente Dos',
               'lastname' => 'Fernandez',
               'email' => 'cliente2@mail.com',
               'password' => Hash::make('123'),
               'dni' => '12345678',
               'tipo' => 'C',
           ],
           [
               'name' => 'Empleado Uno',
               'lastname' => 'Rojas',
               'email' => 'empleado1@mail.com',
               'password' => Hash::make('123'),
               'dni' => '12345678',
               'tipo' => 'E',
           ],
       ];
       User::insert($users);
    }
}
