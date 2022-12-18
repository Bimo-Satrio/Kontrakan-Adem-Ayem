<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Kontrakan;
use App\Models\lama_huni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class KontrakanController extends Controller
{

    public $tot_amount;

    public function index()
    {
        $kontrakan  = Kontrakan::all();
        return view('home', compact(['kontrakan']));
    }

    public function detail($id_kontrakan)
    {
        $kontrakan = Kontrakan::find($id_kontrakan);
        return view('single-post', compact(['kontrakan']));
    }

    public function booking_sewa($id_kontrakan)
    {
        $booking = session("booking");
        $huni = lama_huni::all();
        $ambil = Kontrakan::detail($id_kontrakan);


        $booking[$id_kontrakan] = [

            "id_user" => Auth::user()->id,
            "id_kontrakan" => $ambil->id_kontrakan,
            "kontrakan" => $ambil->kontrakan,
            "harga_total" => $ambil->harga,
            "stok" => $ambil->stok,
            "status"  => 0,
        ];


        session(["booking" => $booking]);

        return redirect("/booking");
    }

    public function booking()
    {
        $booking = session("booking");
        return view("booking")->with("booking", $booking);
    }

    public function hapus($id_kontrakan)
    {
        $booking = session("booking");
        unset($booking[$id_kontrakan]);


        session(["booking" => $booking]);

        return redirect("/booking");
    }

    public function tambah()
    {
        $booking = session("booking");
        foreach ($booking as $ajk => $val) {
            $id_user = $val["id_user"];
            $id_kontrakan = $val["id_kontrakan"];
            $harga_total = $val["harga_total"];
            $status_transaksi = $val["status"];
            Payment::tambah_transaksi($id_user, $id_kontrakan, $harga_total, $status_transaksi);
        }
        session()->forget("booking");

        return redirect("/payments");
    }
}
