<div class="container">
    <section class="section">
        <div class="row" id="table-hover-row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                        <h4 class="card-title">Data Unit Kontrakan</h4>
                        @if (session()->has('message'))
                        <h5 class="alert alert-success">{{ session('message') }}</h5>
                        @endif
                    </div>



                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-12 mb-1">
                                <div class="input-group mb-3">

                                    <input wire:model="search" id="form1" class="form-control" placeholder="Ketik Pencarian Berdasarkan Unit Kontrakan..." aria-label="Search" />
                                    <!-- <button type="submit" data-bs-toggle="modal" data-bs-target="#storeModal" class="btn btn-primary">Tambahkan Unit Kontrakan</button> -->
                                    <a href="{{url('/backend/postkontrakan')}}"><button type="submit" class="btn btn-primary">Tambahkan Unit Kontrakan</button></a>
                                </div>
                            </div>
                        </div>



                        <!-- table hover -->
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Unit Kontrakan</th>
                                        <th>Foto</th>
                                        <th>Deskripsi</th>
                                        <th>Lokasi</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data_kontrakan as $k)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $k -> kontrakan }}</td>
                                        <td>
                                            @php

                                            $images = App\Models\FotoKontrakan::where('id_kontrakan'
                                            ,$k->id_kontrakan)->get();
                                            @endphp


                                            @foreach ($images as $foto)
                                            <img src="{{asset('uploads/all') }}/{{$foto->foto}}" class="rounded" height="200px" width="200px" ;>
                                            @endforeach


                                        </td>

                                        <td>{{ Illuminate\Support\Str::of($k->deskripsi)->words(15) }}</td>
                                        <td>{{ $k -> lokasi }}</td>
                                        <td>{{ $k -> harga }}</td>
                                        <td>{{ $k -> stok }}</td>

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
                                {{ $data_kontrakan->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>







</div>