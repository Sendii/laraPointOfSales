@extends('master')

@section('content')
<div style="margin-left: 10px;">
	<h2>Edit Nama {{$edit->nama}}</h2>
</div>
<form action="{{route('user.update')}}" method="POST">
	@csrf
	<div class="cell-md-8">
       <div class="panel float-center" id="57aa5589-e2af-4940-aa99-f8206debe8c8">
          <div data-role="panel" data-title-icon="<span class='mif-apps'></span>" data-title-caption="Panel title" data-collapsible="true" class="panel-content" data-role-panel="true" style="">
            <input type='text' data-role='input' data-prepend='Nama' placeholder='Nama' class=' data-role-input='true' name='nama' value="{{$edit->name}}" required><br>
            <input type='email' data-role='input' data-prepend='Email' placeholder='Email' class=' data-role-input='true' name='email' value="{{$edit->email}}" required><br>
            <select data-role="select" name="akses" data-prepend='Akses' style="margin-top: 5px;">
                @if($edit->akses == "Kasir")
                <option value="Kasir" selected>Kasir</option>
                <option value="Admin">Admin</option>
                <option value="SuperAdmin">SuperAdmin</option>
                @elseif($edit->akses == "Admin")
                <option value="Admin" selected>Admin</option>
                <option value="Kasir">Kasir</option>
                <option value="SuperAdmin">SuperAdmin</option>
                @elseif($edit->akses == "SuperAdmin")
                <option value="SuperAdmin" selected>SuperAdmin</option>
                <option value="Kasir">Kasir</option>
                <option value="Admin">Admin</option>
                @else
                <option value="SuperAdmin">SuperAdmin</option>
                <option value="Kasir">Kasir</option>
                <option value="Admin">Admin</option>
                @endif
            </select>
            <input type="hidden" name="iduser" value="{{$edit->id}}">

            <button type="submit" class="button success float-right" style="margin-top: 5px;">Edit Data</button>
        </div>
        <div class="panel-title">
          <span class="caption">Panel title</span>
          <span class="mif-apps icon"></span>
      </div>
  </form>
</div>
@endsection