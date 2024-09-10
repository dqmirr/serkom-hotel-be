<?php

namespace App\Http\Controllers;

use App\Models\PemesananModel as Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PemesananController extends Controller
{
    private $valid;

    public function booking(){
        $tipe_kamar = '';
        $harga = 0;
        $tanggal_pesan = date('d/m/Y');
        $durasi = 0;
        $breakfast = false;
        $total = 0;

        return view('booking', compact('tipe_kamar', 'harga', 'tanggal_pesan', 'durasi', 'breakfast', 'total'));
    }
    public function hitung_bayar(Request $req){
        // $this->valid=$req->validate([
        //     'nama'=>'required',
        //     'jenis_kelamin'=>'required',
        //     'no_identitas'=>'required|numeric|min:16|max:16',
        //     'tipe_kamar'=>'required',
        //     'tanggal_pesan'=>'required',
        //     'durasi'=>'required|numeric',
        // ]
        // ,[
        //     'nama.required'=>'Nama wajib diisi',
        //     'jenis_kelamin.required'=>'Jenis Kelamin wajib diisi',
        //     'no_identitas.required'=>'Nomor Identitas wajib diisi',
        //     'no_identitas.numeric'=>'Nomor Identitas wajib diisi dengan angka',
        //     'no_identitas.min:16'=>'Nomor Identitas tidak boleh kurang dari 16 digit',
        //     'no_identitas.max:16'=>'Nomor Identitas tidak boleh lebih dari 16 digit',
        //     'tipe_kamar.required'=>'Tipe Kamar wajib diisi',
        //     'tanggal_pesan.required'=>'Tanggal wajib diisi',
        //     'durasi.required'=>'Durasi Penginapan wajib diisi',
        // ]);

        $tipe_kamar= $req->tipe_kamar;
        $harga = 0;
        $durasi = $req->durasi;
        $breakfast = $req->breakfast;
        $total = 0;

        if($tipe_kamar == 'Standar'){ 
            $harga=250000; 
        }elseif($tipe_kamar == 'Deluxe'){ 
            $harga=750000;
        }else{
            $harga=500000;
        }

        // $tipe_kamar = $req->tipe_kamar;
        // $harga = 0;
        // var_dump($tipe_kamar);

        return view('booking', compact('tipe_kamar', 'harga', 'durasi', 'breakfast', 'total'));

    //     return view('booking', ['tipe_kamar'=>$req->tipe_kamar,
    //     'harga'=>0
    // ]);
    }

    public function save(Request $req){
        $req->validate([
            'nama'=>'required',
            'jenis_kelamin'=>'required',
            'no_identitas'=>'required|numeric|min:16|max:16',
            'tipe_kamar'=>'required',
            'tanggal_pesan'=>'required',
            'durasi'=>'required|numeric',
        ]
        ,[
            'nama.required'=>'Nama wajib diisi',
            'jenis_kelamin.required'=>'Jenis Kelamin wajib diisi',
            'no_identitas.required'=>'Nomor Identitas wajib diisi',
            'no_identitas.numeric'=>'Nomor Identitas wajib diisi dengan angka',
            'no_identitas.min:16'=>'Nomor Identitas tidak boleh kurang dari 16 digit',
            'no_identitas.max:16'=>'Nomor Identitas tidak boleh lebih dari 16 digit',
            'tipe_kamar.required'=>'Tipe Kamar wajib diisi',
            'tanggal_pesan.required'=>'Tanggal wajib diisi',
            'durasi.required'=>'Durasi Penginapan wajib diisi',
        ]);

        DB::table('pemesanan')->insert([
        'nama'=>$req->nama, 
        'jenis_kelamin'=>$req->jenis_kelamin, 
        'no_identitas'=>$req->no_identitas, 
        'tipe_kamar'=>$req->tipe_kamar, 
        'durasi'=>$req->durasi, 
        'diskon' =>$req->diskon,
        'total'=>$req->total]);
        return response()->json(['message'=>'sucess
        fully add data'], 200);
    }
}
