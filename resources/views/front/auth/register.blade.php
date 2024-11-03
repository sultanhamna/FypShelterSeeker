<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Login Page</title>
    @include('admin/partial.style')

    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            /* Full viewport height */
        }

        .card {
            width: 450px;
            background: 0;
            backdrop-filter: blur(50px)
        }

        body {

            background-image: url('{{ asset('assets/admin/img/login.jpg') }}');
            background-repeat: no-repeat;
            background-size: cover;
        }

        .btn {
            border: 2px;
        }

        .navbar-brand-box {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="navbar-brand-box" style="text-align: center">
                    <a href="index.html">
                        <span><img src="{{ asset('assets/admin/img/seeker.png') }}" alt="" width="80px"
                                height="40%"></span>
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{route('user.store')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label" style="color: #6A9C89"> <b> Enter Name</b></label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name') }}" />
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label" style="color: #6A9C89"> <b> Enter Email</b></label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ old('email') }}" />
                            <span class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label" style="color: #6A9C89"> <b> Enter Password </b></label>
                            <input type="password" class="form-control" id="password" name="password"/>
                            <span class="text-danger">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label" style="color: #6A9C89"> <b> Confirm Password </b></label>
                            <input type="password" class="form-control" id="password" name="password_confirmation" />
                            <span class="text-danger">
                                @error('password_confirmation')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-2 text-center">
                            <button type="submit" class="btn  login-btn btn-block " style="color: #6A9C89"><b>Submit</b></button>
                        </div>
                    </form>
                    <div class="row">
                        <div class=" col-sm-12 text-center">
                            <p class="mb-0"> Already have an account? <a href="{{route('login.page')}}" style="color: #6A9C89"> <b>Login</b></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.partial.script')
</body>
<script>
    @if(session('error'))
        toastr.error('{{ session('error') }}');
    @endif
</script>
</html>
