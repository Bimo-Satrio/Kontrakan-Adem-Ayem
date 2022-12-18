<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{$kontrakan -> kontrakan}}</h4>
        </div>
        <div class="card-body">
            <div class="card-body">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">

                        <div class="carousel-item active ">
                            <img src="" />
                        </div>


                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">

                <p>{{$kontrakan -> deskripsi}}</p>


                <p> Lokasi Dicoba make maps API</p>
                <p> Stok nentuin ketersediaan, lebih baik di hidden</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="">
                    <input type="" value="{{$kontrakan->harga}}" id="harga" class="form-control" hidden>
                </div>

                <p> Rp. {{ number_format($kontrakan -> harga) }} / bulan </p>
                <div class="form-group mt-2">
                    <div>
                        <label for="tanggal_huni">Tanggal Huni</label>
                        <input type="date" class="form-control" id="tanggal_huni">
                    </div>
                </div>
                <div class="form-group mt-2">
                    <div>
                        <label for="lama_huni">Lama Huni</label>
                        <select class="form-control" id="lama_huni" name="lama_huni_id" onchange="calculateAmount(this.value)">
                            @foreach ($lama_huni as $ln)
                            <option value="{{ $ln->bulan }}">{{ $ln->lama_huni }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">

                    <input type="text" readonly class="form-control" name="tot_amount" id="tot_amount">
                </div>

                <div class="form-group mt-2">
                    <a href="{{ url('/booking/sewa',$kontrakan->id_kontrakan) }}">
                        <button class="btn btn-primary">Ajukan Sewa</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function calculateAmount(val) {
        var harga = document.getElementById("harga").value;
        var tot_price = val;
        var total = harga * tot_price;
        var divobj = document.getElementById('tot_amount').value = total;
    }
</script>