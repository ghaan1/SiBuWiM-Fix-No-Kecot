<?php

use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProdukController as AdminProdukController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AlamatPengirimanController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\HalteController;
use App\Http\Controllers\KomplainController;
use App\Http\Controllers\KomplainUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartDetailController;
use App\Http\Controllers\ArmadaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('data-profil', [BerandaController::class, 'profil'])->name('beranda.profil');
Route::put('data-profil/{id}', [BerandaController::class, 'updateProfil'])->name('beranda.updateprofil');
Route::get('produk/list', [BerandaController::class, 'listProduk'])->name('beranda.listproduk');
Route::get('produk/list/{id}', [BerandaController::class, 'listProdukKategori'])->name('beranda.listprodukkategori');
Route::get('produk/detail/{id}', [BerandaController::class, 'detailProduk'])->name('beranda.detailproduk');
Route::get('cari-produk', [BerandaController::class, 'cariProduk'])->name('beranda.cariProduk');

Auth::routes(['verify' => true]);
Route::get('forget-password', [AuthController::class, 'indexForgetPassword']);
Route::post('forget-password/store', [AuthController::class, 'storeForgetPassword']);

Route::middleware(['verified'])->group(function () {
    Route::get('edit-alamat-produk/{id}', [CartDetailController::class, 'editAlamat'])->name('editalamatproduk');
    Route::put('update-alamat-produk/{id}', [CartDetailController::class, 'updateAlamat'])->name('updatealamatproduk');
    Route::put('kosongkan-keranjang/{id}', [CartController::class, 'kosongkan']);
    Route::get('api/get-count-cart', [CartController::class, 'getCount']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::resource('cart', CartController::class);
    Route::get('upload-bukti/{id}', [OrderController::class, 'showUpload'])->name('showupload');
    Route::post('upload-bukti', [OrderController::class, 'uploadBukti'])->name('uploadBukti');
    Route::resource('order', OrderController::class);
    Route::get('order/cetak/{id}', [OrderController::class, 'cetak'])->name('order.cetak');
    Route::resource('detail-cart', CartDetailController::class);
    Route::resource('alamat-pengiriman', AlamatPengirimanController::class);
    Route::resource('komplain-user', KomplainUserController::class);

    Route::group(['middleware' => ['admin']], function () {
        Route::get('/profil', [UserController::class, 'profil'])->name('user.profil');
        Route::get('transaksi/cetak', [AdminOrderController::class, 'cetak'])->name('transaksi.cetak');
        Route::get('komplain/done/{id}', [KomplainController::class, 'done'])->name('komplain.done');
        Route::get('komplain/undone/{id}', [KomplainController::class, 'undone'])->name('komplain.undone');
        Route::resource('dashboard', DashboardController::class)->only(['index']);
        Route::resource('transaksi', AdminOrderController::class);
        Route::resource('halte', HalteController::class);
        Route::resource('komplain', KomplainController::class);
        Route::resource('user', UserController::class);
        Route::get('userfilter/{role}', [UserController::class, 'getUserFilter'])->name('user.filter');
        Route::resource('produk', AdminProdukController::class);
        Route::resource('kategori', KategoriController::class);
        Route::resource('armada', ArmadaController::class);
    });
});