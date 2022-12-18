<div class="container">
    <section class="section">
        <div class="row" id="table-hover-row">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 mb-1">
                                    <div class="input-group mb-3">
                                        <input wire:model="search" id="form1" class="form-control" placeholder="Ketik Pencarian Berdasarkan Unit Kontrakan..." aria-label="Search" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- table hover -->
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Nama Penyewa</th>
                                    <th>Unit Kontrakan</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transaksi as $k)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{$k -> name}}</td>
                                    <td>{{ $k -> kontrakan }}</td>
                                    <td>{{ $k -> harga }}</td>
                                    <td>
                                        <a href="{{ url('/backend/viewkontrakan', ['id_kontrakan' => $k->id_kontrakan]) }}"><button type="button" class="btn btn-primary" wire:click="view($k -> id_kontrakan }})">Buka</button></a>
                                        <a href="{{ route('editkontrakan', ['id_kontrakan' => $k->id_kontrakan]) }}"><button type="submit" class="btn btn-primary" wire:click="edit($k -> id_kontrakan }})">Ubah</button></a>
                                        <button type="button" class="btn btn-primary" wire:click="confirmationdelete({{$k -> id_kontrakan}})">Hapus</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-4">
                            {{ $transaksi->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>