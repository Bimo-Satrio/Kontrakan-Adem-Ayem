@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">


                    <h5>Rincian Penyewa</h5>
                    <p>Email : {{ Auth::user()->email }}</p>
                    <p>Nama Lengkap : {{ Auth::user()->email }}</p>
                    <p>Nomor Handphone : {{ Auth::user()->email }}</p>
                    <p class="text-danger">Terdapat Kesalahan Pada Rincian Penyewa ? Sillahkan Lakukan Perubahan Pada Halaman Berikut <a href="">Link</a></p>



                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5>Rincian Unit Kontrakan</h5>
                    @if(empty($booking))
                    <div class="text-danger">
                        NULL
                    </div>

                    @else

                    @foreach ($booking as $ajk => $val)
                    <div class="">
                        <p>Kontrakan : {{ $val ["kontrakan"] }}</p>
                        <p>Harga :{{ $val ["harga_total"] }}</p>
                        <p>Stok : {{ $val ["stok"] }}</p>
                    </div>
                    @endforeach
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Setuju Dengan <a href="" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Syarat dan Ketentuan</a> Adem Ayem
                        </label>
                    </div>
                    <div class="mt-2">
                        <a href="{{url('/lanjutkan/tambah/')}}">
                            <button type="submit" class="btn btn-primary">Booking Sewa</button>
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5>Upload Dokumen</h5>
                    <label>Kartu Tanda Penduduk</label>
                    <input type="file" class="basic-filepond" />
                    <label>Foto Dengan Kartu Tanda Penduduk</label>
                    <input type="file" class="multiple-files-filepond" />
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Vertically Centered modal Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">
                    Vertically Centered
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <p>1. Mengupload foto ktp saat melakukan pembayaran </p>
                <p>2. Membayar kewajiban uang kontrakan tepat pada saat sudah jatuh tempo</p>
                <p>3. Apabila ada kerusakan fasilitas unit sanggup mengganti atau memperbaiki</p>
                <p>4. Urunan sesama penghuni kontrakan untuk menyedot tampungan wc apabila sudah penuh</p>
                <p>5. Menjaga kebersihan dan kerukunan sesama penghuni kontrakan atau tetangga</p>
                <p>6. Apabila ada kerusakan mesin air sanggup memperbaiki</p>
                <p>7. Tidak mencoret-coret tembok</p>
                <p> 8. Apabila sudah tidak diperpanjang karena sesuatu, maka unit yang dikosongkan dalam keadaan : Bersih & rapi,
                    Semua fasilitas dapat berfungsi seperti semula serta menyerahkan kunci
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Tutup</span>
                </button>

            </div>
        </div>
    </div>
</div>



@endsection