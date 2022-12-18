@extends('layouts.app')

@section('content')
@if(Auth::user())

<body>


    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Profile Saya</h4>



                <div class="avatar avatar-lg me-3">
                    <img src="{{asset('Mazer')}}/assets/images/faces/2.jpg" alt="" srcset="" />
                </div>

            </div>
            <div class="card-body">
                <p>Username : {{ Auth::user()->name }}</p>
                <p>Email : {{ Auth::user()->email }}</p>
                <p>Akun Didaftarkan Pada : {{ Auth::user()->created_at }}</p>
            </div>
        </div>
    </div>

</body>




@endif
@endsection