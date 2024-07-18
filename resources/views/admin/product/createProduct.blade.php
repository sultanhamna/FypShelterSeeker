@extends('admin.layout.master')
@section('content')
    <div class="container productContainer ">
        <div class="card  productCard ">
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
                    <form action="{{route('store.Product')}}" enctype="multipart/form-data"  method="post">
                        @csrf
                        <div class="form-group ">
                            <label for="productTitle" class="form-label"> <b>  Product Title</b></label>
                            <input type="text" class="form-control" id="productTitle" name="product_type" />
                        </div>
                        <div class="form-group ">
                            <label for="productAddress" class="form-label"> <b> Product Address  </b></label>
                            <input type="text" class="form-control" id="productAddress" name="product_address" />
                        </div>
                        <div class="form-group ">
                            <label for="productPrice" class="form-label"> <b>  Product Price </b></label>
                            <input type="text" class="form-control" id="productPrice" name="product_price" />
                        </div>
                        <div class="form-group ">
                            <label for="productSize" class="form-label"> <b> Product Size </b></label>
                            <input type="text" class="form-control" id="productSize" name="product_size" />

                        </div>
                        <div class="form-group ">
                            <label for="productStatus" class="form-label"> <b> Product Status </b></label>
                            <input type="text" class="form-control" id="productStatus" name="product_status" />

                        </div>
                        <div class="form-group ">
                            <label for="ProductYearBuilt" class="form-label"> <b> Product Year Built </b></label>
                            <input type="text" class="form-control" id="ProductYearBuilt" name="product_year_built" />

                        </div>

                        <div class="form-group ">
                            <label for="productDiscription" class="form-label"> <b> Discription </b></label>
                            <input type="text" class="form-control" id="productDiscription" name="product_discription" />

                        </div>

                        <div class="form-group mb-3">
                            <label for="productImages" class="form-label"> <b> Product Image </b></label>
                            <input type="file" class="form-control" id="productImages" name="product_images" />
                        </div>

                        <div class="form-group mb-3">
                            <label for="category_id" class="form-label"><b> Select category</b></label>
                            <select class="form-control" id="category_id" name="category_id">
                                <option>Select any category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </br>
                    <div class="mb-3 text-center ">
                        <button type="submit" class="btn  login-btn submitCategory "><b>Submit Product</b></button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection
