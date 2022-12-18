@extends('layouts.main_1')


@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">


                <div class="card-body">

                    <form action="/blog" method="GET">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pencarian</label>
                            <input type="search" class="form-control" name="search">
                        </div>
                    </form>



                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Thumbnail</th>
                                <th scope="col">ISI</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($blog as $b)
                            <tr>

                                <td>{{ $b->id }}</td>
                                <td>{{ $b->judul }}</td>
                                <td><img src="{{'asset'('foto/'.$b->thumbnail)}}" style="width: 200px; height:200px;" class="rounded"></td>
                                <td>{!! $b->isi !!}</td>
                                <td>{{ $b->tanggal }}</td>
                                <td><a href="/blog/{{$b->id}}/edit" class="btn btn-primary">Edit</a></td>
                                <td><a href="/blog/{{$b->id}}/detail" class="btn btn-primary">Detail</a></td>
                                <td>
                                    <form method="POST" action="/blog/{{$b->id}}">
                                        @csrf
                                        @method('delete')
                                        <input class="btn btn-primary" type="submit" value="Delete">
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $blog->links() }}


                    <a href="/blog/create">
                        <input class="btn btn-primary" type="button" value="Input">

                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">


</div>
@endsection