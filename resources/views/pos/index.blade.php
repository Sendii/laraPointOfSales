@extends('master')
@section('content')
<div class="container py-6">
	<!-- START MODAL -->
	<h3 class="text-center">Data POS Sementara</h3>
	<div id="d-tambahbahan" class="dialog" data-role="dialog">
		<div class="dialog-header">
			
		</div>
		<form action="{{route('bahan.save')}}" method="POST">
			<div class="dialog-content">
				<div class="dialog-body">
					@csrf
					<div class="dialog-body">
						<div class='p-2'>
							<div class='abc input'>
								<input type='text' data-role='input' data-prepend='Nama' placeholder='Nama Bahan' data-validate='minlength=3' class=' data-role-input='true' name='nama'>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="dialog-actions text-right">
				<a href="{{route('bahan.all')}}" class="button js-dialog-close alert"><span class="mif-cancel"></span>&nbsp;Batalkan</a>
				<button type="submit" class="button primary js-dialog-close info"><span class="mif-checkmark"></span>&nbsp;Tambahkan</button>
			</div>
		</form>
	</div>
</div>
<!-- END MODAL -->

<div class="py-2">
	<form action="{{route('pos.paymentsementara')}}" method="POST">
		@csrf
		<select data-role="select" name="nama">
			<option value="">Pilih Produk</option>
			@foreach($produks as $produk)
			<option value="{{$produk->nama}}">{{$produk->nama}} || Rp. {{$produk->hargajual}}</option>
			@endforeach
		</select>
		<button type="submit" class="button button-info float-right"><span class="mif mif-plus"></span>Tambahkan!</button><br>
	</form>
</div>
<table class="table hober table-bordered mt-4">
	<thead>
		<tr>
			<th class="sortable-column sort-asc text-center">Nama</th>
			<th class="sortable-column sort-asc text-center">Qty</th>
			<th class="sortable-column sort-asc text-center">Harga</th>
			<th class="sortable-column sort-asc text-center">Aksi</th>
		</tr>
	</thead>
	<tbody>
		@foreach($trans as $tran)
		<tr>
			<td>{{$tran->nama}}</td>
			<td>{{$tran->jumlah}} {{$tran->unit}}</td>
			<td>Rp. {{$tran->harga}}</td>
			<td>
				<center>
						<a class="button alert" href="{{route('pos.deletepaymentsementara', $tran->id)}}"><span class="mif-drop"></span> Delete</a>
					</center>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table><br>
	<form action="{{route('pos.transaksi')}}" method="POST">
		@csrf
		<div class="abc-input float-right">
			<table>
				<tr><td>Uang Pembeli</td><td><input type="text" name="num2" id="num2" /></td></tr>
				<tr><td>Total Belanja:</td><td><input type="text" name="num1" id="num1" value="{{$datatotal}}" readonly /></td></tr>
				<tr><td></td><td><input type="hidden" name="sum" id="sum" readonly /></td></tr>
				<tr><td>Total Kembalian Anda:</td><td><input type="text" name="subt" id="subt" readonly /></td></tr>
			</table>
			<!-- <h3>Total : Rp. {{$datatotal}}</h3>  -->
			<input type="hidden" value="{{$datatotal}}" name="hargatotal">
			<div class="py-2">
				<button type="submit" class="button button-info float-right pembayaran-sementara">
					<span class="mif-add-shopping-cart icon"></span>
				Pembayaran</button><br><br>
			</div>
		</div>
	</form>
</div>
@endsection