@extends('admin.layout.master')
@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-xl-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between mt-3">
                                    <h4 class="mb-0 font-size-18"></h4>
                                    <div class="row">
                                        <div class="col-md-12 ">
                                            <div class="categoryBtn">
                                                <a class="btn  btn-lg  " href="{{ route('create.Product') }}"><b>ADD
                                                        PROPERTY</b></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mt-3">
                                    <div class="card-body">
                                        <table class="table table-bordered data-table" id="data-table">
                                            <thead>
                                                <tr>

                                                    <th> Type</th>
                                                    <th> Address</th>
                                                    <th> Price</th>
                                                    <th>  Size </th>
                                                    <th>  Status</th>
                                                    <th>  Build</th>
                                                    <th> Discription</th>
                                                    <th>Images</th>
                                                    <th> Category Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

    <script type="text/javascript">
        $(function() {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('index.Product') }}",
                columns: [


                    {
                        data: 'product_type',
                        name: 'product_type'
                    },
                    {
                        data: 'product_address',
                        name: 'product_address'
                    },
                    {
                        data: 'product_price',
                        name: 'product_price'
                    },
                    {
                        data: 'product_size',
                        name: 'product_size'
                    },
                    {
                        data: 'product_status',
                        name: 'product_status'
                    },
                    {
                        data: 'product_year_built',
                        name: 'product_year_built'
                    },
                    {
                        data: 'product_discription',
                        name: 'product_discription'
                    },
                    {
                        data: 'images',
                        name: 'images'

                    },
                    {
                        data: 'category_name',
                        name: 'category_name'

                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

        });
    </script>
@endsection
