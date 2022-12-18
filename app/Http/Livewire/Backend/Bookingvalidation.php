<?php

namespace App\Http\Livewire\Backend;

use App\Models\Payment;
use Livewire\Component;
use App\Models\Kontrakan;
use Illuminate\Support\Facades\DB;

class Bookingvalidation extends Component
{

    public $search = '';
    public function render()
    {

        $search = '%' . $this->search . '%';


        $transaksi = DB::table('transaksi')
            ->join('kontrakan', 'kontrakan.id_kontrakan', '=', 'transaksi.id_kontrakan')
            ->join('users', 'users.id', '=', 'transaksi.id_user')
            ->where('name', 'like',  $search)
            ->orWhere('kontrakan', 'like',  $search)->paginate(5);

        return view('livewire.backend.bookingvalidation', ['transaksi' => $transaksi])
            ->extends('layouts.main')->section('content');
    }
}
