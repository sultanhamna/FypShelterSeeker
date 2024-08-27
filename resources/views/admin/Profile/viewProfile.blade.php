@extends('admin.layout.master')
@section('content')
    <div class="container cardContainer" style="max-width: 900px; ">
        <div class="card  categoryCard">
            <div class="card-header  text-white text-center" style="background-color: #6A9C89">
                <h3>Admin Profile</h3>
            </div>
            <div class="card-body" style="background-color:#C1D8C3 ">
                 <!-- Profile Image Section -->
                 <div class="text-center mb-4">
                    <img src="{{ asset('assets/admin/img/profile.jpg') }}" alt="Profile Photo"
                         class="rounded-circle"
                         style="width: 150px; height: 150px;  border: 3px solid #6A9C89;">
                </div>
                <div class="row mb-3">
                    <div class="col-md-4  ">
                        <b> <label style="color: #6A9C89"> Name: </label> </b>
                    </div>
                    <div class="col-md-8">
                        <b> <label style="color: #6A9C89"> {{ $admin->name }}</label> </b>

                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 ">
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
