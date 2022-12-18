<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_transaksi';
    protected $table = 'transaksi';

    protected $fillable = [
        'id_user',
        'id_kontrakan',
        'harga_total',
        'status_transaksi'

    ];

    static function tambah_transaksi($id_user, $id_kontrakan, $harga_total, $status_transaksi)

    {
        Payment::create([
            "id_user" => $id_user,
            "id_kontrakan" => $id_kontrakan,
            "harga_total" => $harga_total,
            "status_transaksi" => $status_transaksi,
        ]);
    }
}
