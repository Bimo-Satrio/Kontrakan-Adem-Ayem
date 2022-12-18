<?php

namespace App\Models;

use App\Models\Kontrakan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class penghuni extends Model
{
    use HasFactory;
    protected $table = 'penghuni';
    protected $guarded = [];
    protected $primaryKey = 'id_penghuni';

    protected $fillable = [
        'id_kontrakan', 'nama_penghuni', 'no_telefon', 'harga_total', 'status_pembayaran'
    ];


    // public function kontrakan()
    // {
    //     return $this->belongsTo(Kontrakan::class);
    // }
}
