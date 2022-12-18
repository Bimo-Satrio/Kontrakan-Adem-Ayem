@extends('layouts.main')

@section('content')


<div class="container">
    <h5> {{$blog->judul}} </h5>
    <h5> {{$blog->isi}} </h5>
    <h5> {{$blog->tanggal}} </h5>
    <img src="{{'asset'('foto/'.$blog->thumbnail)}}" style="width: 200px; height:200px;" class="rounded">
</div>


@endsection