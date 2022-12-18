<div class="container">


    <form wire:submit.prevent="editStore">

        <div class="card">
            <div class="card-body">
                <div class="mt-4">
                    <div class="form-group">
                        <h6>Unit Kontrakan</h6>
                        <div class="form-group position-relative has-icon-left">
                            <input type="text" class="form-control" wire:model="kontrakan" />
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('kontrakan') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                </div>


                <div class="mt-4">
                    <div class="form-group">
                        <label for="utama">Foto</label>
                        <input type="file" multiple wire:model="images" id="utama" class="form-control multiple-files-filepond">
                        @error('images') <span class="text-danger">{{ $message }}</span> @enderror

                        @foreach ($FotoKontrakan as $pimage)
                        <img src="{{asset('uploads/all') }}/{{$pimage->foto}}" class="rounded" height="200px" width="200px">
                        <a href="" wire:click.prevent='deletefoto({{$pimage->id_foto_kontrakan}})'><button class="btn btn-primary sm" type="submit">Hapus</button></a>
                        @endforeach
                    </div>
                </div>

                <div class="mt-4">
                    <div class="form-group">
                        <h6>Deskripsi</h6>
                        <div class="form-group position-relative has-icon-left">
                            <input type="text" class="form-control" wire:model="deskripsi" />
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('deskripsi') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>


                <div class="mt-4">
                    <div class="form-group">
                        <h6>Lokasi</h6>
                        <div class="form-group position-relative has-icon-left">
                            <input type="text" class="form-control" wire:model="lokasi" />
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('lokasi') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <div class="form-group">
                        <h6>Harga</h6>
                        <div class="form-group position-relative has-icon-left">
                            <input type="text" class="form-control" wire:model="harga" />
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('harga') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>


                <div class="mt-4">
                    <div class="form-group">
                        <h6>Stok</h6>
                        <div class="form-group position-relative has-icon-left">
                            <input type="text" class="form-control" wire:model="stok" />
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('stok') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-4">

                    <button class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </form>
</div>