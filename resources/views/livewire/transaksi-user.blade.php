<div class="container">

    <table class="table">
        <thead>
            <tr>

                <th scope="col">Harga</th>
                <th scope="col">Last</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($payment as $k)
            <tr>

                <td>{{ $k -> harga_total }}</td>

                @if($k->status == 0)

                <td>
                    <a href="{{url('PaymentGateway/'.$k->id_transaksi)}}">
                        <button class="btn btn-danger">Bayar</button>
                    </a>
                </td>
                @endif

                @if($k->status == 1)
                <td> <a href="{{url('PaymentGateway/'.$k->id_transaksi)}}">
                        <button class="btn btn-danger">Bayar</button>
                    </a></td>
                @endif


                <td>
                    <button class="btn btn-danger" wire:click="destroy({{$k->id_transaksi}})"></button>
                </td>

                @empty
            <tr>empty</tr>

            </tr>
            @endforelse
        </tbody>
    </table>

</div>