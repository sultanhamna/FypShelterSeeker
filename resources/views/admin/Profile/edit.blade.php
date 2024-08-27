@extends('admin.layout.master')
@section('content')
    <div class="container cardContainer" >
        <div class="card categoryCard">
            <div class="card-header text-white text-center" style="background-color: #6A9C89">
                <h3>Edit Profile</h3>
            </div>
            <div class="card-body">
                  <!-- Profile Image Section -->
                  <div class="text-center mb-4">
                    <img src="{{ asset('assets/admin/img/profile.jpg') }}" alt="Profile Photo"
                         class="rounded-circle"
                         style="width: 150px; height: 150px;  border: 3px solid #6A9C89;">
                </div>
                <form action="{{ route('admin.update') }}" method="post">
                    @csrf

                    <!-- Row for Name and Email -->
                    <div class="row mb-3">
                        <!-- Name Field -->
                        <div class="col-md-6 form-group" style="color: #6A9C89">
                            <b>{!! Form::label('name', 'Enter Name', ['class' => 'form-label']) !!}</b>
                            {!! Form::text('name', $admin->name, [
                                'class' => 'form-control',
                                'id' => 'name',
                            ]) !!}
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <!-- Email Field -->
                        <div class="col-md-6 form-group" style="color: #6A9C89">
                            <b>{!! Form::label('email', 'Enter Email', ['class' => 'form-label']) !!}</b>
                            {!! Form::text('email', $admin->email, [
                                'class' => 'form-control',
                                'id' => 'email',
                            ]) !!}
                            <span class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <!-- Row for Password and Password Confirmation -->
                    <div class="row mb-3">
                        <!-- Password Field -->
                        <div class="col-md-6 form-group" style="color: #6A9C89">
                            <b>{!! Form::label('password', 'Enter Password (if you want to update)', ['class' => 'form-label']) !!}</b>
                            {!! Form::password('password', [
                                'class' => 'form-control',
                                'id' => 'password',
                            ]) !!}
                            <span class="text-danger">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <!-- Password Confirmation Field -->
                        <div class="col-md-6 form-group" style="color: #6A9C89">
                            <b>{!! Form::label('password_confirmation', 'Confirm Password', ['class' => 'form-label']) !!}</b>
                            {!! Form::password('password_confirmation', [
                                'class' => 'form-control',
                                'id' => 'password_confirmation',
                            ]) !!}
                            <span class="text-danger">
                                @error('password_confirmation')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="mb-2 text-center">
                        <button type="submit" class="btn login-btn submitCategory"><b>Update Profile</b></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
