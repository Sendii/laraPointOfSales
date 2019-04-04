@extends('master')
@section('content')
<div class="container py-6">
	<!-- START MODAL -->
	<h3 class="text-center">Data Toko</h3>
	<div id="d-tambahToko" class="dialog" data-role="dialog">
		<div class="dialog-header">
			<div class="dialog-title text-center">Tambah Toko</div>
		</div>
		<form action="{{route('toko.save')}}" method="POST">
			<div class="dialog-content">
				<div class="dialog-body">
					@csrf
					<div class="dialog-body">
						<div class='p-2'>
							<div class='abc input'>
								<input type='text' data-role='input' data-prepend='Nama' placeholder='Nama Instansi' data-validate='minlength=3' class=' data-role-input='true' name='nama'>
							</div>
							<div class='abc input'>
								<input type='number' data-role='input' data-prepend='Telepon' placeholder='Telepon' data-validate='minlength=6' class=' data-role-input='true' name='telepon'>
							</div>
							<div class='abc input'>
								<input type='text' data-role='input' data-prepend='Kode Pos' placeholder='Kode Pos' data-validate='minlength=4' class=' data-role-input='true' name='kodepos'>
							</div>
							<div class='abc input'>
								<input type='text' data-role='input' data-prepend='Deskripsi' placeholder='Deskripsi' data-validate='minlength=5' class=' data-role-input='true' name='deskripsi'>
							</div>
							<div class='abc input'>
								<input type='text' data-role='input' data-prepend='Alamat' placeholder='Alamat' data-validate='minlength=5' class=' data-role-input='true' name='alamat'>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="dialog-actions text-right">
				<a href="{{route('toko.all')}}" class="button js-dialog-close alert"><span class="mif-cancel"></span>&nbsp;Batalkan</a>
				<button type="submit" class="button primary js-dialog-close info" onclick="Metro.notify.create('This is a notify.', 'Title', {keepOpen: false});"><span class="mif-checkmark"></span>&nbsp;Tambahkan</button>
			</div>
		</form>
	</div>
	<!-- START EDIT TOKO -->
	<div id="d-editToko" class="dialog" data-role="dialog">
		<div class="dialog-header">
			<div class="dialog-title text-center">Edit Toko</div>
		</div>
		<form action="{{route('toko.save')}}" method="POST">
			<div class="dialog-content">
				<div class="dialog-body">
					@csrf
					<div class="dialog-body">
						<div class='p-2'>
							<div class='abc input'>
								<input type='text' data-role='input' data-prepend='Nama' placeholder='Nama Instansi' data-validate='minlength=3' class=' data-role-input='true' name='nama' id='nama'>
							</div>
							<div class='abc input'>
								<input type='number' data-role='input' data-prepend='Telepon' placeholder='Telepon' data-validate='minlength=6' class=' data-role-input='true' name='telepon'>
							</div>
							<div class='abc input'>
								<input type='text' data-role='input' data-prepend='Kode Pos' placeholder='Kode Pos' data-validate='minlength=4' class=' data-role-input='true' name='kodepos'>
							</div>
							<div class='abc input'>
								<input type='text' data-role='input' data-prepend='Deskripsi' placeholder='Deskripsi' data-validate='minlength=5' class=' data-role-input='true' name='deskripsi'>
							</div>
							<div class='abc input'>
								<input type='text' data-role='input' data-prepend='Alamat' placeholder='Alamat' data-validate='minlength=5' class=' data-role-input='true' name='alamat'>
							</div>
							<div class='abc input'>
								<input type='text' data-role='input' data-prepend='Logo' placeholder='Logo' data-validate='minlength=5' class=' data-role-input='true' name='logo'>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="dialog-actions text-right">
				<button class="button js-dialog-close"><span class="mif-cancel"></span>&nbsp;Batalkan</button>
				<button type="submit" class="button primary js-dialog-close" onclick="Metro.notify.create('This is a notify.', 'Title', {keepOpen: false});"><span class="mif-checkmark"></span>&nbsp;Tambahkan</button>
			</div>
		</form>
	</div>
	<!-- END EDIT TOKO -->
</div>
<!-- END MODAL -->

<div class="py-2">
	<button type="button" class="button button-info float-right mb-1" onclick="Metro.dialog.open('#d-tambahToko') ">
		<span class="mif-plus icon"></span>
	Tambah Toko</button><br>
</div>
<table class="table striped table-border mt-4" id="example" data-role="table" data-pagination="true">
	<thead>
		<tr>
			<th class="sortable-column sort-asc text-center">Nama</th>
			<th class="sortable-column sort-desc text-center">Telepon</th>
			<th class="sortable-column text-center">Kode Pos</th>
			<th class="sortable-column text-center" data-format="number">Deskripsi</th>
			<th class="sortable-column text-center" data-format="date">Alamat</th>
			<th class="text-center">Aksi</th>
		</tr>
	</thead>
	<tbody>
		@foreach($tokos as $toko)
		<tr>
			<td>{{ $toko->namainstansi }}</td>
			<td>{{ $toko->telp }}</td>
			<td>{{ $toko->kodepos }}</td>
			<td>{{ $toko->deskripsi }}</td>
			<td>{{ $toko->alamat }}</td>
			<td class="text-center">
				<center>
					<a class="button alert disabled" href="{{route('toko.delete', $toko->id)}}"><span class="mif-bin"></span> Delete</a>
				</center>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
</div>
@endsection