@extends('layout.template')
<!-- START FORM -->
@section('konten')
<a href="{{ url('mahasiswa') }}" class="btn btn-secondary">Kembali</a> <!-- untuk mengarahkan ke url mahasiswa bukan nama folder mahasiswa -->
<form action='{{ url('mahasiswa') }}' method='post'>
@csrf <!-- Token untuk mengakses dan mengarahkannya ke url yg di tuju -->
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <div class="mb-3 row">
        <label for="nim" class="col-sm-2 col-form-label">NIM</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" value="{{ Session::get('nim') }}" name='nim' id="nim">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value="{{ Session::get('nama') }}" name='nama' id="nama">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value="{{ Session::get('jurusan') }}" name='jurusan' id="jurusan">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="jurusan" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
    </div>
</div>
</form>
@endsection
<!-- AKHIR FORM -->