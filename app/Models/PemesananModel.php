<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemesananModel extends Model
{
    use HasFactory;

    protected $table='pemesanan';

    protected $primaryKey= 'id'; 

    protected $fillable= [
        'nama',
        'jenis_kelamin',
        'no_identitas',
        'tipe_kamar',
        'tanggal_pesan',
        'durasi',
        'breakfast',
        'total',
    ];

    protected $dates = ['tanggal_pesan'];
}
