<div class="container">
    <section class="section">
        <div class="row" id="table-hover-row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Hoverable rows</h4>

                        @if (session()->has('message'))
                        <h5 class="alert alert-success">{{ session('message') }}</h5>
                        @endif
                    </div>


                    <div class="card-content">
                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-12 mb-1">
                                    <div class="input-group mb-3">

                                        <input wire:model="search" id="form1" class="form-control" placeholder="Ketik Pencarian Berdasarkan Nama Penghuni Atau Unit Kontrakan..." aria-label="Search" />
                                        <button type="submit" data-bs-toggle="modal" data-bs-target="#studentModal" class="btn btn-primary">Tambahkan Penghuni</button>

                                    </div>
                                </div>
                            </div>


                            </button>
                        </div>

                        <!-- table hover -->
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Nama Penghuni</th>
                                        <th>ID Kontrakan</th>
                                        <th>Kontrakan</th>
                                        <th>ID Lama Huni</th>
                                        <th>Lama Huni</th>
                                        <th>No Telefon</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data_penghuni as $dp)
                                    <tr>
                                        <th scope="row">{{ $loop -> iteration }}</th>

                                        <td>{{ $dp -> nama_penghuni}}</td>
                                        <td>{{ $dp -> id_kontrakan }}</td>

                                        <td>{{ $dp -> kontrakan }}</td>
                                        <td>{{ $dp -> id_lama_huni }}</td>
                                        <td>{{ $dp -> lama_huni }}</td>
                                        <td>{{ $dp -> nomor_telefon}}</td>
                                        <td>
                                            <button type="submit" data-bs-toggle="modal" data-bs-target="#updateStudentModal" class="btn btn-primary" wire:click="editStudent({{$dp->id_penghuni}})">Ubah</button>
                                            <button type="submit" data-bs-toggle="modal" class="btn btn-primary" data-bs-target="#deleteStudentModal" wire:click="deleteStudent({{$dp->id_penghuni}})">Hapus</button>
                                        </td>

                                    </tr>
                                    @empty
                                    <tr>
                                        <td>
                                            <h5>Pencarian Tidak Ditemukan</h5>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="mt-4">

                                {{ $data_penghuni->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <div wire:ignore.self class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="studentModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="closeModal"></button>
                </div>
                <form wire:submit.prevent="saveStudent">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Unit Kontrakan</label>
                            <input type="text" wire:model="unit_kontrakan" class="form-control">
                            @error('unit_kontrakan') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Harga</label>
                            <input type="text" wire:model="harga" class="form-control">
                            @error('harga') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Nama Penghuni</label>
                            <input type="text" wire:model="nama_penghuni" class="form-control">
                            @error('nama_penghuni') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Nomor Telefon</label>
                            <input type="text" wire:model="nomor_telefon" class="form-control">
                            @error('nomor_telefon') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="updateStudentModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateStudentModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="closeModal"></button>
                </div>
                <form wire:submit.prevent="updateStudent">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Unit Kontrakan</label>
                            <input type="text" wire:model="unit_kontrakan" class="form-control">
                            @error('unit_kontrakan') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Harga</label>
                            <input type="text" wire:model="harga" class="form-control">
                            @error('harga') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Nama Penghuni</label>
                            <input type="text" wire:model="nama_penghuni" class="form-control">
                            @error('nama_penghuni') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Nomor Telefon</label>
                            <input type="text" wire:model="nomor_telefon" class="form-control">
                            @error('nomor_telefon') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="deleteStudentModal" tabindex="-1" aria-labelledby="deleteStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteStudentModalLabel">Delete Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="destroyStudent">
                    <div class="modal-body">
                        <h4>Are you sure you want to delete this data ?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Yes! Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>