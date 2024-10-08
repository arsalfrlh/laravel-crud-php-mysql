@extends('layout.template')
<!-- START DATA -->
@section('konten')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <!-- FORM PENCARIAN -->
        <div class="pb-3">
            <form class="d-flex" action="{{ url('mahasiswa') }}" method="get">
                <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                <button class="btn btn-secondary" type="submit">Cari</button>
            </form>
        </div>
        
        <!-- TOMBOL TAMBAH DATA -->
        <div class="pb-3">
            <a href='{{ url('mahasiswa/create') }}' class="btn btn-primary">+ Tambah Data</a>
        </div>
    
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-3">NIM</th>
                    <th class="col-md-4">Nama</th>
                    <th class="col-md-2">Jurusan</th>
                    <th class="col-md-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ?>
                @foreach ($tampil as $item)<!-- mengambil data dari controller dan menyimpannya ke dalam $tampil -->
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td>{{ $item->nim }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->jurusan }}</td>
                    <td>
                        <a href='{{ url('mahasiswa/'.$item->nim.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                        <form onsubmit="return confirm('Anda yakin untuk menghapus data?')" class="d-inline" action="{{ url('mahasiswa/'.$item->nim) }}" method="post">
                            @csrf <!-- Token untuk mengakses dan mengarahkannya ke url yg di tuju -->
                            @method('DELETE') <!-- method untuk delete -->
                            <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $tampil->links() }}
    </div>
@endsection
    <!-- AKHIR DATA -->
    