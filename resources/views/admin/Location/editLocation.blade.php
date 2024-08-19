@extends('admin.layout.master')
@section('content')
    <div class="container cardContainer">
        <div class="card  categoryCard">
            <div class="card-header mt-3">
                <div class="navbar-brand-box" style="text-align: center">
                    <a href="index.html">
                        <span><img src="{{ asset('assets/admin/img/seeker.png') }}" alt="" width="80px"
                                height="40%"></span>
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{route('update.location',$data->id)}}"  method="post">
                        @csrf
                        @include('admin.Location.fields')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
