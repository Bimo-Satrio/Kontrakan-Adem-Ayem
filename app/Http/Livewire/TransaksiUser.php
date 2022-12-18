<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Kontrakan;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;

class TransaksiUser extends Component
{
    public $payment = [];
    public function mount()
    {

        if (!Auth::user()) {
            return redirect()->route('login');
        }
    }

    public function render()
    {
        if (Auth::user()) {
            $this->payment = Payment::where('id_user', Auth::user()->id)->get();
        }
        return view('livewire.transaksi-user')
            ->extends('layouts.app')->section('content');
    }
}
