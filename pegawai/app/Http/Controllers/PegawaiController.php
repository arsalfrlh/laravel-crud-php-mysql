<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    public function index(){
        //fungsinya sama seperti SELECT * FROM tbl_pegawai
        $pegawai = DB::table('tbl_pegawai')->get();
        //lokasi folder "pegawai" dan nama file "index.blade.php" dan memasukan data pegawai ke dalam array dan di simpan ke $pegawai
        return view('pegawai.index',['tampil' => $pegawai]);
    }

    public function tambah(){
        //lokasi folder "pegawai" dan nama file "tambah.blade.php"
        return view('pegawai.tambah');
    }

    public function store(Request $request){
        //untuk cek apakah form tambah yang tadi di isi atau tidak
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', //cek arraykey gambar harus diisi|harus berupa gambar|harus ber-type png,jpg,jpeg,gif|max file hanya 2mb
            'nama' => 'required', //cek nama dari from tadi harus diisi|arraykey nama
            'jabatan' => 'required',
            'umur' => 'required',
            'alamat' => 'required',
        ]);

        if($request->hasFile('gambar')){
            $gambar = $request->file('gambar'); //$gambar menyimpan data file yang bernama/arraykey gambar
            $nama_gambar = time() . '_' . $gambar->getClientOriginalName(); //$nama_gambar menyimpan data nama gambar dan mengubahnya jadi waktu dibuat|menambahkan tanda "_"|dan nama gambar|contoh 1728870721_namagambar
            $gambar->move(public_path('images'),$nama_gambar); //memindahkan file tadi ke folder "public/images"
        }else{
            $nama_gambar = null; //jika filenya tidak di isi maka akan di isi null pada database
        }
        
        //funsginya sama seperti INSERT INTO
        DB::table('tbl_pegawai')->insert([
            'gambar' => $nama_gambar, //nama colom dari database|$nama_gambar yang tadi
            'nama' => $request->nama, //nama colom dari tabel dan request dari form tambah (nama)
            'jabatan' => $request->jabatan,
            'umur' => $request->umur,
            'alamat' => $request->alamat,
        ]);
        return redirect('/pegawai'); //mengarahkan ke url pegawai (web.php)
    }

    public function edit($id){
        //fungsinya sama seperti SELECT * FROM tbl_pegawai WHERE id
        $pegawai = DB::table('tbl_pegawai')->where('id_pegawai',$id)->get();
        //lokasi folder "pegawai" dan nama file "edit.blade.php" dan memasukan data pegawai ke dalam array dan di simpan ke $pegawai
        return view('pegawai.edit',['edit' => $pegawai]);
    }

    public function update(Request $request){
        //untuk cek apakah form tambah yang tadi di isi atau tidak
        $request->validate([
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', //harus berupa gambar|harus ber-type png,jpg,jpeg,gif|max file hanya 2mb
            'nama' => 'required', //cek nama dari from tadi harus diisi|arraykey nama
            'jabatan' => 'required',
            'umur' => 'required',
            'alamat' => 'required',
        ]);

        $pegawai = DB::table('tbl_pegawai')->where('id_pegawai',$request->id)->first(); //fungsinya sama seperti UPDATE tbl_pegawai SET ... WHERE id|first untuk mengambil satu baris data(pegawai) dari hasil query
        if($request->hasFile('gambar')){ //untuk memerikasa apakah user mengunggah gambar baru melalui form
            if($pegawai->gambar && file_exists(public_path('images/'.$pegawai->gambar))){
                unlink(public_path('images/'.$pegawai->gambar)); //jika gambar baru ada yg di unggah maka gambar lama akan dihapus oleh unlink|lokasi folder "public/images/"|namagambar pada database
            }

            $gambar = $request->file('gambar'); //$gambar menyimpan data file yang bernama/arraykey gambar
            $nama_gambar = time() . '_' . $gambar->getClientOriginalName(); //$nama_gambar menyimpan data nama gambar dan mengubahnya jadi waktu dibuat|menambahkan tanda "_"|dan nama gambar|contoh 1728870721_namagambar
            $gambar->move(public_path('images'),$nama_gambar); //memindahkan file tadi ke folder "public/images"
        }else{
            $nama_gambar = $pegawai->gambar; //jika filenya tidak di isi maka nama gambar pada database tidak hilang|namagambar pada database
        }

        //fungsinya sama seperti UPDATE tbl_pegawai SET ... WHERE id
        DB::table('tbl_pegawai')->where('id_pegawai',$request->id)->update([
            'gambar' => $nama_gambar, //nama colom dari database|$nama_gambar yang tadi
            'nama' => $request->nama, //nama colom dari tabel dan request dari form edit (nama)
            'jabatan' => $request->jabatan,
            'umur' => $request->umur,
            'alamat' => $request->alamat,
        ]);
        return redirect('/pegawai'); //mengarahkan ke url pegawai (web.php)
    }

    public function destroy($id){
        $pegawai = DB::table('tbl_pegawai')->where('id_pegawai',$id)->first(); //fungsinya sama seperti UPDATE tbl_pegawai SET ... WHERE id|first untuk mengambil satu baris data(pegawai) dari hasil query
        if($pegawai->gambar && file_exists(public_path('images/'.$pegawai->gambar))){
            unlink(public_path('images/'.$pegawai->gambar)); //gambar akan dihapus oleh unlink|lokasi folder "public/images/"|namagambar pada database
        }

        //fungsinya sama seperti DELETE FROM tbl_pegawai WHERE id
        DB::table('tbl_pegawai')->where('id_pegawai',$id)->delete();
        return redirect('/pegawai'); //mengarahkan ke url pegawai (web.php)
    }
}
