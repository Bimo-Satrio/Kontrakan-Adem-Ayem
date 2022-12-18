<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

            @if($payment->status_transaksi == 1)
            <div class="row">
                <div class="col-md-12">
                    <button id="pay-button" type='button' class='btn btn-primary center-block'>pay!</button>
                </div>
            </div>

            @elseif($payment->status_transaksi == 2)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>{{ $va_number }}</td>
                        <td>{{ $gross_amount }}</td>
                        <td>{{ $bank }}</td>
                    </tr>
            </table>
            @endif
        </div>
    </div>
</div>


<form id="payment-form" method="get" action="Payment">
    <input type="hidden" name="result_data" id="result-data" value=""></div>
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