<?php

use App\Models\Kontrakan;
use App\Http\Livewire\TransaksiUser;
use App\Http\Livewire\PaymentGateway;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SandboxController;
use App\Http\Livewire\Backend\Editkontrakan;
use App\Http\Controllers\KontrakanController;

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



// Route::get('/', function () {
//     return view('home');
// });




Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/blog', [BlogController::class, 'index']);
    Route::get('/blog/create', [BlogController::class, 'create']);
    Route::post('/blog/store', [BlogController::class, 'store']);
    Route::get('/blog/{id}/edit', [BlogController::class, 'edit']);
    Route::get('/blog/{id}/detail', [BlogController::class, 'detail']);

    Route::put('/blog/{id}', [BlogController::class, 'update']);
    Route::delete('/blog/{id}', [BlogController::class, 'destroy']);
});



Auth::routes(['verify' => true]);

//front end interaksi user
Route::get('/my-profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/', [KontrakanController::class, 'index'])->name('home');
Route::get('/single-post/{id_kontrakan}', [KontrakanController::class, 'detail'])->name('single-post');
Route::get('/{id_kontrakan}/cart', [RentController::class, 'rent'])->name('cart');
Route::get('/TransaksiUser', \App\Http\Livewire\TransaksiUser::class);
Route::get('/PaymentGateway/{id_transaksi}', PaymentGateway::class, 'PaymentGateway')->name('payment-gateway');
// Route::get('/ajukan/sewa/{id_kontrakan}', [KontrakanController::class, 'ajukan_sewa'])->where("id", "[0-9]+");
Route::get('/booking/hapus/{id_kontrakan}', [KontrakanController::class, 'hapus'])->where("id", "[0-9]+");
Route::get('/booking', [KontrakanController::class, 'booking']);
Route::get('/lanjutkan/tambah', [KontrakanController::class, 'tambah']);





//livewire
Route::get('/', \App\Http\Livewire\Home::class);
//front end
Route::get('/single-post/{id_kontrakan}', \App\Http\Livewire\SinglePost::class);
Route::get('/booking/sewa/{id_kontrakan}', [KontrakanController::class, 'booking_sewa'])->where("id", "[0-9]+");



//setelah ajukan sewa
Route::get('/payments/{id_transaksi}', \App\Http\Livewire\Payments::class);
Route::get('/receipt/{id_transaksi}', \App\Http\Livewire\Receipt::class);


//akhir front end






//backend

//livewire
Route::get('/backend/dashboard', \App\Http\Livewire\Backend\Dashboard::class);
Route::get('/backend/unitkontrakan', \App\Http\Livewire\Backend\Unitkontrakan::class);
Route::get('/backend/penghuni-kontrakan', \App\Http\Livewire\Backend\PenghuniKontrakan::class);

Route::get('/backend/bookingvalidation', \App\Http\Livewire\Backend\Bookingvalidation::class);

//crud stuff
//unnit kontrakan
Route::get('/backend/postkontrakan', \App\Http\Livewire\Backend\Postkontrakan::class);
Route::get('/backend/viewkontrakan/{id_kontrakan}', \App\Http\Livewire\Backend\Viewkontrakan::class);
Route::get('/backend/editkontrakan/{id_kontrakan}', Editkontrakan::class)->name('editkontrakan');



//penghuni




//akhir backend