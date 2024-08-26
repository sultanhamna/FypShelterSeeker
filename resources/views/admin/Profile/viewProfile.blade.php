@extends('admin.layout.master')
@section('content')
    <div class="container cardContainer">
        <div class="card  categoryCard">
            <div class="card-header  text-white text-center" style="background-color: #6A9C89">
                <h3>Admin Profile</h3>
            </div>
            <div class="card-body" style="background-color:#C1D8C3 ">
                <div class="row mb-3">
                    <div class="col-md-4 text-right ">
                        <b> <label style="color: #6A9C89"> Name: </label> </b>
                    </div>
                    <div class="col-md-8">
                        <b> <label style="color: #6A9C89"> {{ $admin->name }}</label> </b>

                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 text-right ">
                        <b> <label style="color: #6A9C89">Email:</label> </b>
                    </div>
                    <div class="col-md-8">
                        <b> <label style="color: #6A9C89"> {{ $admin->email }}</label> </b>

                    </div>
                </div>
                <br>
                <div class="text-center mb-3">
                    <a href="{{ route('admin.edit') }}" class="btn submitCategory  login-btn"> Edit Profile </a>
                </div>
            </div>

        </div>
    </div>
@endsection
