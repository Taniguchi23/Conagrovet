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
               'sexo' => 'M',
               'imagen'=>  'public/avatar/doctor_mujer.jpg',
               'tipo' => 'A',
           ],
           [
               'name' => 'Doctor Uno',
               'lastname' => 'Almenara',
               'email' => 'doctor1@mail.com',
               'password' => Hash::make('123'),
               'sexo' => 'M',
               'imagen'=>  'public/avatar/doctor_mujer.jpg',
               'dni' => '12345678',
               'tipo' => 'D',
           ],
           [
               'name' => 'Doctor Dos',
               'lastname' => 'Grau',
               'email' => 'doctor2@mail.com',
               'sexo' => 'H',
               'imagen'=>  'public/avatar/doctor_hombre.jpg',
               'password' => Hash::make('123'),
               'dni' => '12345678',
               'tipo' => 'D',
           ],
           [
               'name' => 'Cliente Uno',
               'lastname' => 'Juarez',
               'email' => 'cliente1@mail.com',
               'password' => Hash::make('123'),
               'sexo' => 'M',
               'imagen'=>  'public/avatar/cliente_mujer.jpg',
               'dni' => '12345678',
               'tipo' => 'C',
           ],
           [
               'name' => 'Cliente Dos',
               'lastname' => 'Fernandez',
               'email' => 'cliente2@mail.com',
               'sexo' => 'H',
               'imagen'=>  'public/avatar/cliente_hombre.jpg',
               'password' => Hash::make('123'),
               'dni' => '12345678',
               'tipo' => 'C',
           ],
           [
               'name' => 'Empleado Uno',
               'lastname' => 'Rojas',
               'imagen'=>  'public/avatar/doctor_mujer.jpg',
               'email' => 'empleado1@mail.com',
               'sexo' => 'M',
               'password' => Hash::make('123'),
               'dni' => '12345678',
               'tipo' => 'E',
           ],
       ];
       User::insert($users);
    }
}
