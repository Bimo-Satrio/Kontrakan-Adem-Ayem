<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoKontrakan extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table = 'foto_kontrakan';
    protected $guarded = [];
    protected $primaryKey = 'id_foto_kontrakan';
}
