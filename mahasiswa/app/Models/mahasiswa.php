<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use HasFactory;
    //fungsinya sama seperti INSERT INTO
    protected $fillable = ['nim','nama','jurusan'];
    protected $table = 'tbl_mahasiswa';
    //tidak menggunakan id dan timestamp karena kita menghapusnya di migrations
    public $timestamps = false;
}
