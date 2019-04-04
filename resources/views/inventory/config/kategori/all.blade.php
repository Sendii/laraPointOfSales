@extends('master')
@section('content')
<div class="container py-6">
	<!-- START MODAL -->
	<h3 class="text-center">Data Kategori</h3>
	<div id="d-tambahKategori" class="dialog" data-role="dialog">
		<div class="dialog-header">
			<div class="dialog-title text-center">Tambah Kategori</div>
		</div>
		<form action="{{route('kategori.save')}}" method="POST">
			<div class="dialog-content">
				<div class="dialog-body">
					@csrf
					<div class="dialog-body">
						<div class='p-2'>
							<div class='abc input'>
								<input type='text' data-role='input' data-prepend='Nama' placeholder='Nama' data-validate='minlength=3' class=' data-role-input='true' name='nama'>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="dialog-actions text-right">
				<a href="{{route('kategori.all')}}" class="button js-dialog-close alert"><span class="mif-cancel"></span>&nbsp;Batalkan</a>
				<button type="submit" class="button primary js-dialog-close info" onclick="Metro.notify.create('This is a notify.', 'Title', {keepOpen: false});"><span class="mif-checkmark"></span>&nbsp;Tambahkan</button>
			</div>
		</form>
	</div>
</div>
<!-- END MODAL -->

<div class="py-2">
	<button type="button" class="button button-info float-right mb-1" onclick="Metro.dialog.open('#d-tambahKategori') ">
		<span class="mif-plus icon"></span>
	Tambah Kategori</button><br>
</div>
<table class="table striped table-border mt-4" id="example" data-role="table" data-pagination="true">
	<thead>
		<tr>
			<th class="sortable-column sort-asc text-center">Nama</th>
			<th class="text-center">Aksi</th>
		</tr>
	</thead>
	<tbody>
		@foreach($kategoris as $kategori)
		<?php $no = 1; ?>
		<tr>
			<td>{{ $kategori->nama }}</td>
			<td class="text-center">
				<center>
					<a class="button info" href="{{route('kategori.edit', $kategori->id)}}">
					<span class="mif-pencil"></span> Edit</a>
				<a class="button alert" href="{{route('kategori.delete', $kategori->id)}}"><span class="mif-bin"></span> Delete</a>
				</center>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
</div>
@endsection