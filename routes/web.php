<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\RazaController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\VacunaController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\BotmanController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PerroController;

Route::controller(WebController::class)->group(function (){
    Route::get('/','index')->name('web.index');
    Route::get('/quienes','quienes')->name('web.quienes');
    Route::get('contacto','contactos')->name('web.contactos');
    Route::get('/servicio','servicios')->name('web.servicios');
    Route::get('/nosotros','familia')->name('web.nosotros');
    Route::get('/login','autentificacions');
    Route::post('/consultas','consultas');
//    Route::post('/contacto','contactos');
});
//Route::get('/chat',[WebController::class,'bot']);
Route::match(['get','post'],'/botman',[BotManController::class,'handle']);

Auth::routes();

Route::group(['middleware' => 'auth'], function (){
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::controller(DoctorController::class)->group(function (){
        Route::get('/citas','index')->name('citas.index');
        Route::get('/citas/atender','atender')->name('citas.atender');
    });

    Route::controller(PerroController::class)->group(function (){
        Route::get('/perros','index')->name('perros.index');

    });


    Route::group(['middleware' => 'isAdmin'], function (){

        Route::controller(AdminController::class)->group(function (){
            Route::get('/admin/consultas','consultas')->name('admin.consultas');
            Route::get('/admin/consultas/edit/{id}','consultasEdit');
            Route::post('/admin/consultas/update/{id}','consultasUpdate')->name('admin.consultas.update');
            Route::get('/admin/consultas/cambio/{id}','cambio')->name('admin.consultas.cambio');
        });

        Route::controller(UserController::class)->group(function (){
            Route::get('/usuarios/tipo/{val}','index')->name('usuarios.index');
            Route::post('/usuarios/store','store')->name('usuarios.store');
            Route::get('/usuarios/edit/{id}','edit')->name('usuarios.edit');
            Route::post('/usuarios/update/{id}','update')->name('usuarios.update');
            Route::get('/usuarios/delete/{id}','delete')->name('usuarios.delete');
        });

        Route::controller(MarcaController::class)->group(function (){
            Route::get('/marcas','index')->name('marcas.index');
            Route::post('/marcas/store','store')->name('marcas.store');
            Route::get('/marcas/edit/{id}','edit')->name('marcas.edit');
            Route::post('/marcas/update/{id}','update')->name('marcas.update');
            Route::get('/marcas/delete/{id}','delete')->name('marcas.delete');
        });

        Route::controller(ProductoController::class)->group(function (){
            Route::get('/productos','index')->name('productos.index');
            Route::post('/productos/store','store')->name('productos.store');
            Route::get('/productos/edit/{id}','edit')->name('productos.edit');
            Route::post('/productos/update/{id}','update')->name('productos.update');
            Route::get('/productos/delete/{id}','delete')->name('productos.delete');
        });

        Route::controller(AnimalController::class)->group(function (){
            Route::get('/animales','index')->name('animales.index');
            Route::post('/animales/store','store')->name('animales.store');
            Route::get('/animales/edit/{id}','edit')->name('animales.edit');
            Route::post('/animales/update/{id}','update')->name('animales.update');
            Route::get('/animales/delete/{id}','delete')->name('animales.delete');
            Route::get('/animales/lista/{id}','lista');
        });

        Route::controller(RazaController::class)->group(function (){
            Route::get('/razas','index')->name('razas.index');
            Route::post('/razas/store','store')->name('razas.store');
            Route::get('/razas/edit/{id}','edit')->name('razas.edit');
            Route::post('/razas/update/{id}','update')->name('razas.update');
            Route::get('/razas/delete/{id}','delete')->name('razas.delete');
        });

        Route::controller(VacunaController::class)->group(function (){
            Route::get('/vacunas','index')->name('vacunas.index');
            Route::post('/vacunas/store','store')->name('vacunas.store');
            Route::get('/vacunas/edit/{id}','edit')->name('vacunas.edit');
            Route::post('/vacunas/update/{id}','update')->name('vacunas.update');
            Route::get('/vacunas/delete/{id}','delete')->name('vacunas.delete');
        });

        Route::controller(AnimalController::class)->group(function (){
           Route::get('/animales','index')->name('animales.index');
        });
    });

    Route::group(['middleware' => 'isDoctor'], function (){

    });

    Route::group(['middleware' => 'isCliente'], function (){

    });
});


Route::get('/storage-link',function (){
    Artisan::call('storage:link');
    return 'storage:link activado';
});
