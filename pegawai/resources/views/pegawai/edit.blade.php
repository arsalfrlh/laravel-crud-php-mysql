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
    <form action="/pegawai/update" method="post">
        @csrf <!-- Token keamanan laravel-->
        @method('PUT') <!-- method untuk update data -->
        @foreach ($edit as $pegawai)
    <table>
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