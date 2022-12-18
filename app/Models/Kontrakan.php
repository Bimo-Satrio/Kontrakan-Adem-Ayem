<?php

namespace App\Models;

use App\Models\Payment;
use App\Models\penghuni;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kontrakan extends Model
{
    use HasFactory;
    protected $table = 'kontrakan';
    protected $guarded = [];
    protected $primaryKey = 'id_kontrakan';



    // public function penghuni()
    // {
    //     return $this->hasMany(penghuni::class, 'id_kontrakan', 'id_penghuni');
    // }

    protected $fillable = ['kontrakan', 'foto', 'deskripsi', 'lokasi', 'harga', 'stok'];


    static function detail($id_kontrakan)
    {
        $ambil = Kontrakan::where("id_kontrakan", $id_kontrakan)->first();

        return $ambil;
    }

    static function tambah($id_kontrakan, $harga)
    {
        Payment::create(
            [
                'id_user' => Auth::user()->id,
                'id_kontrakan' => $id_kontrakan,
                'harga_total' => $harga,
                'status'  => 0
            ]
        );
    }
}
