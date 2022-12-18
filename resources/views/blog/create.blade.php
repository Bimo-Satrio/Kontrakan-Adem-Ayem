@extends('layouts.main')

@section('content')

<form action="/blog/store" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="container">
        <div class="form-group">
            <label for="exampleInputEmail1">Judul</label>
            <input type="text" class="form-control" name="judul">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Thumbnail</label>
            <input type="file" class="form-control" name="thumbnail">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">isi</label>
            <textarea name="isi" id="text" cols="30" rows="10"></textarea>
        </div>





        <div class="form-group">
            <label for="exampleInputEmail1">tanggal</label>
            <input type="date" class="form-control" name="tanggal">
        </div>

        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
    </div>

</form>


<script src="https://cdn.ckeditor.com/ckeditor5/35.3.0/classic/ckeditor.js"></script>

<!-- CK Editor -->

@endsection



@section ('scripts')

<script>
    ClassicEditor
        .create(document.querySelector('#text'))
        .catch(error => {
            console.error(error);
        });
</script>

@endsection