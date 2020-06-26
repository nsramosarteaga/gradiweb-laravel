<?php

use App\User;
use App\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Usuario Administrador
        $admin_correo = 'admin@gradiweb.com';

        $user_admin = User::where('email',$admin_correo)->first();

        if($user_admin){
            $user_admin->delete();
        }

        $user_admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gradiweb.com',
            'password' => Hash::make('admin'),
        ]);

        //Definir la cantidad de productos a crear
        $cantidadProductos= 10;
        
        //Ejecutar factori para crear los productos random
        factory(Product::class, $cantidadProductos)->create();

    }
}
