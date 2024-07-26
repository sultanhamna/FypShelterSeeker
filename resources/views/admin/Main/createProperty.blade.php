@extends('admin.layout.master')
@section('content')
    <div class="container productContainer">
        <div class="card   productCard">
            <div class="card-header mt-3">
                <div class="navbar-brand-box" style="text-align: center">
                    <a href="index.html">
                        <span><img src="{{ asset('assets/admin/img/seeker.png') }}" alt="" width="80px"
                                height="40%"></span>
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('store.Property') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        @include('admin/Main/fields')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
