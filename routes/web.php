<?php

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
	return view('welcome');
});
Route::view('master', 'master');
Route::view('login2', 'login2');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('mainmenu', 'AdminController@mainmenu')->name('mainmenu');
// Route::get('master', function() {
// 	return view('master/toko.all');
// });
Route::view('a', 'modals');
Route::middleware(['admin'] || ['superadmin'])->group(function() {
	Route::prefix('master')->group(function() {
		Route::prefix('toko')->group(function() {
			Route::get('/', 'AdminController@alltoko')->name('toko.all');
			Route::post('save', 'AdminController@savetoko')->name('toko.save');
			Route::get('edit/{id?}', function($id) {
				$a = \App\Toko::find($id);

				return Response::json($a);
			});
			Route::get('delete/{id}', 'AdminController@deletetoko')->name('toko.delete');
		});
		Route::prefix('user')->group(function() {
			Route::get('/', 'UserController@alluser')->name('user.all');
			Route::get('edit/{id}', 'UserController@edituser')->name('user.edit');
				Route::post('update', 'UserController@updateuser')->name('user.update');
			Route::post('save', 'UserController@saveuser')->name('user.save');
			Route::get('delete/{id}', 'UserController@deleteuser')->name('user.delete');
		});
	});
});
Route::middleware(['admin'] || [ 'superadmin'])->group(function() {
	Route::prefix('inventory')->group(function() {
		Route::get('/', 'AdminController@indexinventory')->name('inventory.index');
		Route::prefix('produk')->group(function() {
			Route::get('/tersedia', 'ProdukController@allproduk')->name('produk.all');
			Route::post('/tersedia/pdf', 'ProdukController@pdfproduk')->name('produk.pdf');
			Route::get('edit/{id}', 'ProdukController@editproduk')->name('produk.edit');
				Route::post('update', 'ProdukController@updateproduk')->name('produk.update');
			Route::get('/habis', 'ProdukController@allproduk')->name('produk.habis');
			Route::post('save', 'ProdukController@saveproduk')->name('produk.save');
			Route::get('delete/{id}', 'ProdukController@deleteproduk')->name('produk.delete');
		});
		Route::prefix('config')->group(function() {
			Route::prefix('kategori')->group(function() {
				Route::get('/', 'KategoriController@allkategori')->name('kategori.all');
				Route::get('edit/{id}', 'KategoriController@editkategori')->name('kategori.edit');
				Route::post('update', 'KategoriController@updatekategori')->name('kategori.update');
				Route::post('save', 'KategoriController@savekategori')->name('kategori.save');
				Route::get('delete/{id}', 'KategoriController@deletekategori')->name('kategori.delete');
			});
			Route::prefix('unit')->group(function() {
				Route::get('/', 'UnitController@allunit')->name('unit.all');
				Route::get('edit/{id}', 'UnitController@editunit')->name('unit.edit');
				Route::post('update', 'UnitController@updateunit')->name('unit.update');
				Route::post('save', 'UnitController@saveunit')->name('unit.save');
				Route::get('delete/{id}', 'UnitController@deleteunit')->name('unit.delete');
			});
			Route::prefix('bahan')->group(function() {
				Route::get('/', 'BahanController@allbahan')->name('bahan.all');
				Route::get('edit/{id}', 'BahanController@editbahan')->name('bahan.edit');
				Route::post('update', 'BahanController@updatebahan')->name('bahan.update');
				Route::post('save', 'BahanController@savebahan')->name('bahan.save');
				Route::get('delete/{id}', 'BahanController@deletebahan')->name('bahan.delete');
			});
		});
	});
});
Route::middleware(['kasir'] || ['superadmin'])->group(function() {
	Route::prefix('pos')->group(function(){
		Route::get('/index', 'AdminController@indexpos')->name('pos.index');
		Route::post('/index/report', 'AdminController@pembayaran')->name('pembayaran.report');
		Route::get('/indexsementara', 'AdminController@indexpaymentsementara')->name('pos.paymentsementara-index');
		Route::post('pembayaran', 'AdminController@transaksi')->name('pos.transaksi');
		Route::post('/paymentsementara', 'AdminController@paymentsementarapos')->name('pos.paymentsementara');
		Route::get('/paymentsementara/delete/{id}', 'AdminController@deletepaymentsementarapos')->name('pos.deletepaymentsementara');
		Route::get('/payment/delete/{id}', 'AdminController@deletepaymentpos')->name('pos.deletepayment');
		Route::post('/payment/deletesemua', 'AdminController@deletesemuapaymentpos')->name('pos.deletesemuapayment');
	});
	Route::prefix('laporan')->group(function(){
		Route::get('/barangmasuk', 'AdminController@barangmasuk')->name('barangmasuk.all');
		Route::get('/barangkeluar', 'AdminController@barangkeluar')->name('barangkeluar.all');
	});
});

// KEY BINDINGS SUBLIME
