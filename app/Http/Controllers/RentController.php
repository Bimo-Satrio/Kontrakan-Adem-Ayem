<?php

namespace App\Http\Controllers;


use App\Models\Kontrakan;
use App\Models\Payment;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;

class RentController extends Controller
{
    public function rent($id_kontrakan)
    {
        if (!Auth::user()) {
            return Redirect()->route('login');
        }

        $kontrakan = Kontrakan::find($id_kontrakan);

        Payment::create(
            [
                'id_user' => Auth::user()->id,
                'id_kontrakan' => $kontrakan->id_kontrakan,
                'harga_total' => $kontrakan->harga,
                'status'  => 0
            ]


        );
    }
}
