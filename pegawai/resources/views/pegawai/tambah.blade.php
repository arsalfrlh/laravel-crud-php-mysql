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
    <form action="/pegawai/store" method="post"> <!-- mengarahkan ke url /pegawai/store di file (web.php) -->
        @csrf <!-- token keamanan laravel -->
    <table>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama" required></td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td><input type="text" name="jabatan" required></td>
        </tr>
        <tr>
            <td>Umur</td>
            <td><input type="number" name="umur" required></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><input type="text" name="alamat" required></td>
        </tr>
        <tr>
            <td><a href="/pegawai">Kembali</a></td>
            <td><input type="submit" value="Simpan"></td>
        </tr>
    </table>
    </form>
</body>
</html>