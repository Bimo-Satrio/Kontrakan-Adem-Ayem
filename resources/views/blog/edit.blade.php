@extends('layouts.main')

@section('content')

<form action="/blog/{{$blog->id}}" method="POST">
    @method('put')
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Judul</label>
        <input type="text" class="form-control" name="judul" value="{{$blog->judul}}">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">isi</label>
        <input type="text" class="form-control" name="isi" value="{{$blog->isi}}">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">tanggal</label>
        <input type="date" class="form-control" name="tanggal" value="{{$blog->tanggal}}">
    </div>

    <input type="submit" name="submit" value="Submit" class="btn btn-primary">


</form>

@endsection