@extends('admin.layout.master')
@section('content')
    <div class="container cardContainer">
        <div class="card  categoryCard">
            <div class="card-header">
                <div class="navbar-brand-box" style="text-align: center">
                    <a href="index.html">
                        <span><img src="{{ asset('assets/admin/img/seeker.png') }}" alt="" width="80px"
                                height="40%"></span>
                    </a>
                </div>
                <div class="card-body">
                    <form action="" method="">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="categoryName" class="form-label"> <b> Category Name</b></label>
                            <input type="text" class="form-control" id="categoryName" name="category_name" />

                        </div>
                        <div class="form-group mb-3">
                            <label for="categoryIcon" class="form-label"> <b> Category Icon </b></label>
                            <input type="file" class="form-control" id="categoryIcon" name="category_icon" />

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
