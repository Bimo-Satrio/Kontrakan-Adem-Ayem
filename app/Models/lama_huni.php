<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lama_huni extends Model
{
    use HasFactory;
    protected $table = 'lama_huni';
    protected $guarded = [];
    protected $primaryKey = 'id_lama_huni';
}
