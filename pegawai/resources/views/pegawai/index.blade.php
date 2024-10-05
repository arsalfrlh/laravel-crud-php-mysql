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
    <a href="/pegawai/tambah">Tambah Data</a> <!-- mengarahkan ke url /pegawai/tambah di file (web.php) -->
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Umur</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        @foreach ($tampil as $pegawai) <!-- memanggil data yg di simpan ke array tadi dari controller -->
        <tr>
            <td>{{ $pegawai->nama }}</td>
            <td>{{ $pegawai->jabatan }}</td>
            <td>{{ $pegawai->umur }}</td>
            <td>{{ $pegawai->alamat }}</td>
            <td>
                <a href="/pegawai/edit/{{ $pegawai->id_pegawai }}">Edit</a> <!-- mengarhkan ke url /pegawai/edit/{id_pegawai} -->
                <form onsubmit="return confirm('Anda yakin untuk menghapus data ini?')" action="/pegawai/hapus/{{ $pegawai->id_pegawai }}" method="post">  <!-- mengarhkan ke url /pegawai/destroy/{id_pegawai} -->
                    @csrf <!-- token keamanan laravel -->
                    @method('DELETE') <!-- method untuk hapus data -->
                    <button type="submit" name="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>