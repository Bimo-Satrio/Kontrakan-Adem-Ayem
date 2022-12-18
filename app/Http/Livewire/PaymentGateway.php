<?php

namespace App\Http\Livewire;

use App\Models\Payment;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class PaymentGateway extends Component
{
    public $snapToken;
    public $payment;
    public $va_number, $gross_amount, $bank, $transaction_status, $transaction_time, $deadline;

    public function mount($id_transaksi)
    {

        if (!Auth::user()) {
            return redirect()->route('login');
        }
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-oquwoVmaFNRraTTAxzMCbu3p';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;


        if (isset($_GET['result_data'])) {
            $current_status = json_decode($_GET['result_data'], true);

            $order_id = $current_status["order_id"];


            $this->payment = Payment::where('id_transaksi', $order_id)->first();
            $this->payment->status_transaksi = 2;
            $this->payment->update();
        } else {
            $this->payment = Payment::find($id_transaksi);
        }


        if (!empty($this->payment)) {
            if ($this->payment->status_transaksi == 1) {
                $params = array(
                    'transaction_details' => array(
                        'order_id' => $this->payment->id_transaksi,
                        'gross_amount' => $this->payment->harga_total,
                    ),
                    'customer_details' => array(
                        'first_name' => Auth::user()->name,
                        'last_name' => 'pratama',
                        'email' => Auth::user()->email,
                        'phone' => '08111222333',
                    ),
                );
                $this->snapToken = \Midtrans\Snap::getSnapToken($params);
            } else if ($this->payment->status == 2) {
                $status =  \Midtrans\Transaction::status($this->payment->id_transaksi);
                $status = json_decode(json_encode($status), true);

                $this->va_number = $status['va_numbers'][0]['va_number'];
                $this->gross_amount = $status['gross_amount'];
                $this->bank = $status['va_numbers'][0]['bank'];
                $this->transaction_status = $status['transaction_status'];
                $transaction_time = $status['transaction_time'];
                $this->deadline = date('Y-m-d H:i:s', strtotime('+1 day', strtotime($transaction_time)));
            }
        }
    }

    public function render()
    {

        return view('livewire.payment-gateway')
            ->extends('layouts.app')->section('content');
    }
}
