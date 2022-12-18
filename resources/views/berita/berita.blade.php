@extends('layouts.main')




@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    You don't seem to be an admin!
                </div>
            </div>
        </div>
    </div>
</div>



@foreach($news->articles as $berita)



<div class="contariner">
    <div class="row">
        <div class="card" style="width: 18rem;">
            <img src="{{ $berita->urlToImage }}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">{{ $berita->title }}</h5>
                <p class="card-text">{{ $berita->description }}</p>
                <a href="{{ $berita->url }}" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
</div>








@endforeach
@endsection