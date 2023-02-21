<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/dashboard');
});
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard'); {
};
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('logout', function () {
    Auth::logout();
    return redirect('login');
});

//CRUD USER
Route::get('/master-user', [App\Http\Controllers\MasterUserController::class, 'index'])->name('master-user'); {
};

Route::post('addUser', [App\Http\Controllers\MasterUserController::class, 'create']); {
};
Route::post('updateUser', [App\Http\Controllers\MasterUserController::class, 'updateUserData']); {
};
Route::get('/getUser/{id}', [App\Http\Controllers\MasterUserController::class, 'getUserById']); {
};
Route::get('/deleteUserData/{id}', [App\Http\Controllers\MasterUserController::class, 'deleteUserData']); {
};

//CRUD PRODUK
Route::get('/master-produk', [App\Http\Controllers\MasterProdukController::class, 'index'])->name('master-produk'); {
};
Route::post('addProduk', [App\Http\Controllers\MasterProdukController::class, 'create']); {
};
Route::post('updateProduk', [App\Http\Controllers\MasterProdukController::class, 'updateProdukData']); {
};
Route::get('/deleteProdukData/{id}', [App\Http\Controllers\MasterProdukController::class, 'deleteProdukData']); {
};

//CRUD OUTLET
Route::get('/master-outlet', [App\Http\Controllers\MasterOutletController::class, 'index'])->name('master-outlet'); {
};
Route::post('addOutlet', [App\Http\Controllers\MasterOutletController::class, 'create']); {
};
Route::get('/deleteOutletData/{id}', [App\Http\Controllers\MasterOutletController::class, 'deleteOutletData']); {
};
Route::post('updateOutlet', [App\Http\Controllers\MasterOutletController::class, 'updateOutletData']); {
};

//CRUD PELANGGAN
Route::get('/master-pelanggan', [App\Http\Controllers\MasterPelangganController::class, 'index'])->name('master-pelanggan'); {
};
Route::post('addPelanggan', [App\Http\Controllers\MasterPelangganController::class, 'create']); {
};
Route::get('/deletePelangganData/{id}', [App\Http\Controllers\MasterPelangganController::class, 'deletePelangganData']); {
};
Route::post('updatePelanggan', [App\Http\Controllers\MasterPelangganController::class, 'updatePelangganData']); {
};

//CRUD TRANSAKSI
Route::get('/master-transaksi', [App\Http\Controllers\MasterTransaksilController::class, 'index'])->name('master-transaksi'); {
};
