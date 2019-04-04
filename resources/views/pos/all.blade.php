@extends('master')
@section('content')
<div class="container py-6">
	<!-- START MODAL -->
	<h3 class="text-center">Data POS</h3>
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
				<button type="submit" class="button primary js-dialog-close info" onclick="Metro.notify.create('This is a notify.', 'Title', {keepOpen: false});"><span class="mif-checkmark"></span>&nbsp;Tambahkan</button>
			</div>
		</form>
	</div>
</div>
<!-- END MODAL -->
<form method="POST" action="{{route('pembayaran.report')}}">
		@csrf
		<button type="submit" class="button button-info float-left mb-1">
			<span class="mif-file-pdf icon"></span>
		Laporan Transaksi</button><br>
	</form>
<table class="table striped table-border mt-4" id="example" data-role="table" data-pagination="true">
	<thead>
		<tr>
			<th class="sortable-column sort-asc text-center">Nama</th>
			<th class="sortable-column sort-asc text-center">Kode Transaksi</th>
			<th class="sortable-column sort-asc text-center">Qty</th>
			<th class="sortable-column sort-asc text-center">Harga</th>
		</tr>
	</thead>
	<tbody>
		@foreach($pos as $key)
		<tr>
			<td>{{$key->nama}}</td>
			<td>{{$key->kodetransaksi}}</td>
			<td>{{$key->jumlah}} {{$key->unit}}</td>
			<td>Rp. {{$key->harga}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
<form method="POST" action="{{route('pos.deletesemuapayment')}}">
	@csrf
	<div class="py-2">
		<button type="submit" class="button button-info float-right mt-1 pembayaran-sementara">
			<span class="mif-delete icon"></span>
		Hapus Semua Transaksi</button><br><br>
	</div>
</form>
</div>
@endsection