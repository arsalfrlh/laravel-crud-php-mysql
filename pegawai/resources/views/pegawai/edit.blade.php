<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Tambah Pegawai</h1>
    <form action="/pegawai/update" method="post" enctype="multipart/form-data">
        @csrf <!-- Token keamanan laravel-->
        @method('PUT') <!-- method untuk update data -->
        @foreach ($edit as $pegawai)
    <table>
        <tr>
            <td>
                @if ($pegawai->gambar)
                <img src="{{ asset('images/'.$pegawai->gambar) }}" width="80px"> <!-- menampilkan gambar dari folder "public/images/"|nama gambar dari database -->
                @else
                <img src="{{ asset('images/img.jpeg') }}" width="80px"> <!-- menampilkan gambar dari folder "public/images/img.jpeg" -->
                @endif
            </td>
            <td><input type="file" name="gambar"></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><input type="hidden" name="id" value="{{ $pegawai->id_pegawai }}"><input type="text" name="nama" value="{{ $pegawai->nama }}" required></td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td><input type="text" name="jabatan" value="{{ $pegawai->jabatan }}" required></td>
        </tr>
        <tr>
            <td>Umur</td>
            <td><input type="number" name="umur" value="{{ $pegawai->umur }}" required></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><input type="text" name="alamat" value="{{ $pegawai->alamat }}" required></td>
        </tr>
        <tr>
            <td><a href="/pegawai">Kembali</a></td>
            <td><input type="submit" value="Simpan"></td>
        </tr>
    </table>
    @endforeach
    </form>
</body>
</html>