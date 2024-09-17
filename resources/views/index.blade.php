<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Data Pegawai</h1>
    <a href="{{ url('pegawai/tambah') }}">Tambah data</a>
    @csrf
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Umur</th>
            <th>Alamat</th>
            <th>Opsi</th>
        </tr>
        @foreach ($tampil as $pegawai)
        <tr>
            <td>{{ $pegawai->nama }}</td>
            <td>{{ $pegawai->jabatan }}</td>
            <td>{{ $pegawai->umur }}</td>
            <td>{{ $pegawai->alamat }}</td>
            <td></td>
        </tr>
        @endforeach
    </table>
</body>
</html>