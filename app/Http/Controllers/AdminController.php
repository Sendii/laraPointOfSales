<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use DB;
use App\Toko as T;
use App\User as U;
use App\Produk as P;
use App\Kategori as K;
use App\Unit as Un;
use App\Bahan as B;
use App\TransaksiSementara as Ts;
use App\TransaksiBeneran as Tb;
use PDF;

class AdminController extends Controller
{

	function pembayaran(){
		$data['produk'] = Tb::all();
		$pdf = PDF::loadView('pos.pembayaran', $data);
		return $pdf->download('pembayaran.pdf');
	}

	function mainmenu() {
		$data['totalinventory'] = K::count() + Un::count() + B::count() + P::count();
		$data['totalpos'] = Tb::count();
		$data['totallaporan'] = Tb::count();
		$data['totalmaster'] = T::count() + U::count();
		return view('mainmenu', $data);
	}
	function alltoko(){
		$data['tokos'] = T::all();
		return view('master/toko.all', $data);
	}

	function savetoko(Request $r){
		$new = new T;
		$new->namainstansi = $r->input('nama');
		$new->telp = $r->input('telepon');
		$new->kodepos = $r->input('kodepos');
		$new->deskripsi = $r->input('deskripsi');
		$new->alamat = $r->input('alamat');

		$new->save();
		return redirect()->route('toko.all');
	}

	function deletetoko($id){
		$toko = T::find($id);
		if (isset($toko)) {
			$toko->delete();
		}else{
			echo "ada kesalahan !";
		}
		return redirect()->route('toko.all');
	}

	function indexinventory(){
		$totalkategori = K::count();
		$totalunit = Un::count();
		$totalbahan = B::count();
		$data['totalproduk'] = P::count();

		$data['total'] = $totalbahan + $totalunit + $totalkategori;
		return view('inventory.index', $data);
	}

	function indexpaymentsementara() {
		$data['produks'] = P::where('jumlah', '>=', '1')->get();
		$data['trans'] = Ts::all();
		$a = Ts::all();
		$sum = 0;
		foreach ($a as $key => $value) {
			$sum = $sum + ($value->harga * $value->jumlah);
		}
		$data['datatotal'] = $sum;
		return view('pos.index', $data);
	}

	function paymentsementarapos(Request $r){
		$new = new Ts;
		if (Ts::where('nama', $r->input('nama'))->exists()) {
			$a = Ts::where('nama', $r->input('nama'))->first();
			$a->jumlah = $a->jumlah + 1;
			$a->save();
			return back();
		}
		$harga = P::where('nama', $r->input('nama'))->value('hargajual');
		$unit = P::where('nama', $r->input('nama'))->value('unit');
		$kode = P::where('nama', $r->input('nama'))->value('unit');
		$new->kodetransaksi = "Prd-".str_random(7);
		$new->nama = $r->input('nama');
		$new->harga = $harga;
		$new->unit = $unit;
		$new->jumlah = "1";

		$new->save();
		return back();
	}

	function transaksi(Request $r){
		$transaksi = Ts::all();
		$transaksib['pos'] = Ts::all();
		$kodetransaksi = uniqid(10);
		foreach ($transaksi as $key => $value) {
			$barang = P::where('nama', $value->nama)->first();
			$barang->jumlah = "".$barang->jumlah - $value->jumlah."";
			$transaksibeneran = new Tb;
			$transaksibeneran->kodetransaksi = "Pos-".$kodetransaksi;
			$transaksibeneran->nama = $value->nama;
			$transaksibeneran->jumlah = $value->jumlah;
			$transaksibeneran->unit = $value->unit;
			$transaksibeneran->harga = $value->harga;
			$transaksibeneran->hargatotal = $r->input('hargatotal');
			
			$barang->save();
			$transaksibeneran->save();
			Ts::truncate();
		}

		$pdf = PDF::loadView('pos.pdf', $transaksib);
		return $pdf->download('transaksi.pdf');
	}

	function deletepaymentsementarapos($id){
		$transsaksisementara = Ts::find($id);
		if (isset($transsaksisementara)) {
			$transsaksisementara->delete();
		}else{
			echo "ada kesalahan !";
		}
		return back();
	}

	function deletepaymentpos($id){
		$transaksibeneran = Tb::find($id);
		if (isset($transaksibeneran)) {
			$transaksibeneran->delete();
		}else{
			echo "ada kesalahan !";
		}
		return back();
	}

	function deletesemuapaymentpos(){
		Tb::truncate();
		return back();
	}

	function indexpos(){
		$data['pos'] = Tb::all();
		return view('pos.all', $data);
	}

	function barangmasuk(){
		$data['produks'] = P::all();
		return view('laporan.barangmasuk', $data);
	}

	function barangkeluar(){
		$data['produks'] = Tb::all();
		return view('laporan.barangkeluar', $data);
	}
}
