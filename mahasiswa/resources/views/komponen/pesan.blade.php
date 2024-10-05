@if (Session::has('success')) <!-- Menampilkan pesan berhasil setelah input data -->
    <div class="pt-3">
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    </div>
@endif

@if ($errors->any()) <!-- Menampilkan pesan ketika input pada form tidak valid -->
<div class="pt-3">
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif