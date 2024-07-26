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
                @if (session('error'))
                    <div class="alert alert-success">
                        {{ session('error') }}
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('Calculator.store') }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <b>
                            {!! Form::label('price', 'Price of the property:', ['class' => 'form-label'])!!}
                        </b>
                        &nbsp;
                        {!! Form::number('price', null, [
                             'class' => 'form-control',
                             'id' => 'price',

                         ])
                       !!}
                        <span class="text-danger">
                            @error('price')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="form-group mb-3">
                        <b>
                            {!! Form::label('salary', 'Salary:', ['class' => 'form-label'])!!}
                        </b>
                        &nbsp;
                        {!! Form::number('salary', null, [
                             'class' => 'form-control',
                             'id' => 'salary',

                         ])
                       !!}
                        <span class="text-danger">
                            @error('salary')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="form-group mb-3">
                        <b>
                            {!! Form::label('installment_per_month', 'Installment per month:', ['class' => 'form-label'])!!}
                        </b>
                        &nbsp;
                        {!! Form::number('installment_per_month', null, [
                             'class' => 'form-control',
                             'id' => 'installment_per_month',

                         ])
                       !!}
                        <span class="text-danger">
                            @error('installment_per_month')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3 text-center">
                        <button class="btn  submitCategory  login-btn" type="submit"> <b> Calculate </b></button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
