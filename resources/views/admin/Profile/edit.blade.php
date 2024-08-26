@extends('admin.layout.master')
@section('content')
    <div class="container productContainer" style="max-width: 700px;">
        <div class="card   productCard">
            <div class="card-header mt-3">
                <div class="navbar-brand-box" style="text-align: center">
                    <a href="index.html">
                        <span><img src="{{ asset('assets/admin/img/seeker.png') }}" alt="" width="80px"
                                height="40%"></span>
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.update')}}"  method="post">
                        @csrf
                        <div class="form-group mb-3" style="color: #6A9C89">
                            <b>{!! Form::label('name', 'Enter Name',['class' => 'form-label']) !!}</b>
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

                        <div class="form-group mb-3" style="color: #6A9C89">
                            <b>{!! Form::label('email', 'Enter Email',['class' => 'form-label']) !!}</b>
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

                        <div class="form-group mb-3" style="color: #6A9C89">
                            <b>{!! Form::label('password', 'Enter Password (if you want to update)',['class' => 'form-label']) !!}</b>
                            {!! Form::password('password', [
                                'class' => 'form-control',
                                'id' => 'password',
                               // 'placeholder' => 'Enter new password',
                            ]) !!}
                            <span class="text-danger">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group mb-3" style="color: #6A9C89">
                            <b>{!! Form::label('password_confirmation', 'Confirm Password',['class' => 'form-label']) !!}</b>
                            {!! Form::password('password_confirmation', [
                                'class' => 'form-control',
                                'id' => 'password_confirmation',
                               // 'placeholder' => 'Confirm new password',
                            ]) !!}
                            <span class="text-danger">
                                @error('password_confirmation')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-2 text-center">
                            <button type="submit" class="btn  login-btn submitCategory "><b>Update Profile</b></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
