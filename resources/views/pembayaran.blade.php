@extends('layouts.app')
@section('content')


@foreach($payment as $k)


{{ $k -> harga_total }}

@if($k->status == 0)


<a href="{{url('PaymentGateway/'.$k->id_transaksi)}}">
    <button class="btn btn-danger">Bayar</button>
</a>

@endif

@if($k->status == 1)
<a href="{{url('PaymentGateway/'.$k->id_transaksi)}}">
    <button class="btn btn-danger">Bayar</button>
</a>
@endif


@endforeach



@endsection