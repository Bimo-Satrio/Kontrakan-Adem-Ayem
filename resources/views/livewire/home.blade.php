<div class="container">

    <div class="form-group">
        <input wire:model="search" id="form1" class="form-control" placeholder="Ketik Pencarian Berdasarkan Unit Kontrakan Atau Deskripsi..." aria-label="Search" />
    </div>

    <div class="row justify-content-center mt-4">
        @forelse ($kontrakan as $k)
        <div class="col-lg-2">
            <div class="card">
                <a href=""></a>
                <img class="card-img-top" src="{{Storage::url($k -> foto) }}">
                <div class="large"><a href=""></a></div>
                <div class="card-body">
                    <h5 class="card-title">{{ $k -> kontrakan }}</h5>
                    {{ $k ->  id_kontrakan }}
                    <p class="card-text"></p>
                </div>
                <button class="btn btn-primary stretched-link" wire:click="singlepost({{$k -> id_kontrakan}})">Buka</button>
            </div>
        </div>

        @empty
        <h4>Pencarian Tidak Ditemukan</h4>
        @endforelse

    </div>
</div>