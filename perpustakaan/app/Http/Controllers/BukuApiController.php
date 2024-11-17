<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuApiController extends Controller
{
    public function index(){
        $buku = Buku::all();
        return response()->json(['pesan' => 'berhasil menampilkan data buku', 'data' => $buku]);
    }

    public function create_buku(Request $request){
        $buku = Buku::create([
            'gambar' => $request->gambar,
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'stok' => $request->stok,
        ]);

        return response()->json(['pesan' => 'berhasil menambahkan data buku', 'data' => $buku]);
    }

    public function edit_buku($id){
        $buku = Buku::where('id',$id)->get();
        return response()->json(['pesan' => 'berhasil menampilkan data buku yang dipilih', 'data' => $buku]);
    }

    public function update_buku(Request $request,$id){
        $buku = Buku::where('id',$id)->update([
            'gambar' => $request->gambar,
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'stok' => $request->stok,
        ]);

        return response()->json(['pesan' => 'Berhasil mengupdate data buku', 'data' => $buku]);
    }

    public function hapus_buku($id){
        $buku = Buku::where('id',$id)->delete();
        return response()->json(['pesan' => 'berhasil menghapus data buku', 'data' => $buku]);
    }
}
