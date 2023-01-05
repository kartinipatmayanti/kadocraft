<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Siswa_controller extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function yajra(){
        $siswas = M_siswa::select(['id','nama','alamat','kelas_id','status']);
        return DataTables::of($siswas)->make();
    }
}
