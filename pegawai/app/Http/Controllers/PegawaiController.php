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
        //funsginya sama seperti INSERT INTO
        DB::table('tbl_pegawai')->insert([
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
        //fungsinya sama seperti UPDATE tbl_pegawai SET ... WHERE id
        DB::table('tbl_pegawai')->where('id_pegawai',$request->id)->update([
            'nama' => $request->nama, //nama colom dari tabel dan request dari form edit (nama)
            'jabatan' => $request->jabatan,
            'umur' => $request->umur,
            'alamat' => $request->alamat,
        ]);
        return redirect('/pegawai'); //mengarahkan ke url pegawai (web.php)
    }

    public function destroy($id){
        //fungsinya sama seperti DELETE FROM tbl_pegawai WHERE id
        DB::table('tbl_pegawai')->where('id_pegawai',$id)->delete();
        return redirect('/pegawai'); //mengarahkan ke url pegawai (web.php)
    }
}
