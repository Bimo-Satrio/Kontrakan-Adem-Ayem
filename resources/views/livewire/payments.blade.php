<div class="container">
    <div class="row">

        @if ($payment->status_transaksi == 0)
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <div class="alert alert-warning">
                        <p class="text-center">
                            <b>Pengajuan Sewa Anda Sedang di Validasi Oleh Admin Silahkan Cek Secara Berkala</b>
                        </p>
                    </div>
                </div>
            </div>



            @elseif($payment->status_transaksi == 1)
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5>Rincian Penyewa</h5>
                        <p>Email : {{$payment-> email}} </p>
                        <p>Nama Lengkap : {{$payment-> name}} </p>
                        <p>Nomor Handphone : {{$payment-> password}} </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-center">Rincian Sewa Unit Kontrakan</h5>
                        <p class="text-center">Unit Kontrakan : {{$payment -> kontrakan}}</p>
                        <p class="text-center"> Carousel </p>
                        <p class="text-center"><b> Silahkan Melakukan Pembayaran Sebesar : {{ number_format ($payment -> harga_total) }}</b></p>

                        <div class="text-center">
                            <button id="pay-button" type='button' class='btn btn-primary'>Bayar</button>
                        </div>

                    </div>
                </div>
            </div>

            @elseif($payment->status_transaksi == 2)

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-primary">
                            <h4 class="alert-heading">Terima Kasih, Pembayaran Anda Telah Berhasil !</h4>
                            <p>Mohon Sertakan Bukti Pembayaran dan Nota Pada Saat Ke lokasi</p>
                        </div>
                        <a href="">
                            <p class="text-center">Nota</p>
                        </a>

                        <a href="{{url('/receipt',$payment-> id_transaksi)}}">

                            <p class="text-center">Bukti Pembayaran</p>
                        </a>

                        <a href="/">
                            <p class="text-center"> Kembali ke Beranda</p>
                        </a>
                        <p class="text-center"><b>Kontak Adem Ayem : 082213462168 (Whatsapp)</b></p>
                    </div>
                </div>
            </div>

            @endif



        </div>

    </div>



    <form id="payment-form" method="get" action="Payment">
        <input type="hidden" name="result_data" id="result-data" value="">
    </form>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-DKWVzHivdFzVpE5r"></script>


    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function() {


            var resultType = document.getElementById('result-type');
            var resultData = document.getElementById('result-data');

            function changeResult(type, data) {
                $("#result-type").val(type);
                $("#result-data").val(JSON.stringify(data));

            }

            snap.pay('<?= $snapToken ?>', {
                onSuccess: function(result) {
                    changeResult('success', result);
                    console.log(result.status_message);
                    console.log(result);
                    $("#payment-form").submit();
                },
                onPending: function(result) {
                    changeResult('pending', result);
                    console.log(result.status_message);
                    $("#payment-form").submit();

                },
                onError: function(result) {
                    changeResult('error', result);
                    console.log(result.status_message);
                    $("#payment-form").submit();

                }
            });


        };
    </script>