<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa; //fungsinya sama seperti include untuk menghubungkan model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session; //untuk menggunakan session

class mahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cari = $request->katakunci;
        $jumlahbaris = 4;
        if(strlen($cari)){
            $data = mahasiswa::where('nim','like',"%$cari%")->orWhere('nama','like',"%$cari%")->orWhere('jurusan','like',"%$cari%")->paginate($jumlahbaris);
        }else{
            //mengabil data dari model mahasiswa dan mengurutkannya dari terbaru-terlama menggunakan orderby
            $data = mahasiswa::orderBy('nim','desc')->paginate(2);//mengambil 2 data dan menampilkan data lain di halaman selanjutnya
        }
        //lokasi folder "mahasiswa" dan nama file "index.blade.php"||mengambil data dari model
        return view('mahasiswa.index')->with('tampil',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //lokasi folder "mahasiswa" dan nama file "create.blade.php"
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //saat mengisi data dan tidak valid maka isi di input tidak hilang
        Session::flash('nim',$request->nim);
        Session::flash('nama',$request->nama);
        Session::flash('jurusan',$request->jurusan);
        $request->validate([
            //cek apakah form input sudah di isi apa belum
            'nim'=>'required|numeric|unique:tbl_mahasiswa,nim',
            'nama'=>'required',
            'jurusan'=>'required',
        ],[
            //pesan ketika form input tidak di isi
            'nim.required'=>'Nim wajid diisi',
            'nim.numeric'=>'Nim harus berupa angka',
            'nim.unique'=>'Nim tidak boleh sama',
            'nama.required'=>'Nama wajid diisi',
            'jurusan.required'=>'Jurusan wajid diisi',
        ]);
        $data = [
            //kolom nim pada database||name nim pada input form
            'nim'=>$request->nim,
            'nama'=>$request->nama,
            'jurusan'=>$request->jurusan,
        ];
        mahasiswa::create($data);
        //mengarahkan ke url mahasiswa dan menampilkan pesan
        return redirect()->to('mahasiswa')->with('success','Berhasil Menambahkan data'); //mengarahkan ke url mahasiswa dan menampilkan pesan
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = mahasiswa::where('nim',$id)->first();
        return view('mahasiswa.edit')->with('edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            //cek apakah form input sudah di isi apa belum
            'nama'=>'required',
            'jurusan'=>'required',
        ],[
            //pesan ketika form input tidak di isi
            'nama.required'=>'Nama wajid diisi',
            'jurusan.required'=>'Jurusan wajid diisi',
        ]);
        $data = [
            //kolom nim pada database||name nim pada input form
            'nama'=>$request->nama,
            'jurusan'=>$request->jurusan,
        ];
        mahasiswa::where('nim',$id)->update($data); //mengakses model mahasiswa dan mengubah data sesuai nim
        //mengarahkan ke url mahasiswa dan menampilkan pesan
        return redirect()->to('mahasiswa')->with('success','Berhasil Melakukan update data'); //mengarahkan ke url mahasiswa dan menampilkan pesan
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        mahasiswa::where('nim',$id)->delete();
        return redirect()->to('mahasiswa')->with('success','Berhasil Mengahapus data');
    }
}
