@extends('admin.layout.master')
@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-xl-12 col-md-12">
                <div class="card">
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
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between mt-3">
                                    <h4 class="mb-0 font-size-18"></h4>
                                    <div class="row">
                                        <div class="col-md-12 ">
                                            <div class="categoryBtn">
                                                <a class="btn  btn-lg  " href="{{ route('create.Property') }}"><b>ADD
                                                        Property</b></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mt-3">
                                    <div class="card-body">
                                        <table class="table table-bordered " id="main-table">
                                            <thead>
                                                <tr>
                                                    <th>Property Type</th>
                                                    <th>Property Location</th>
                                                    <th>Property  Status</th>
                                                    <th>Property  Size</th>
                                                    <th>Property  Post</th>
                                                    <th>Category   Name</th>
                                                    <th>Property  Image</th>
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
            var table = $('#main-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('index.Property') }}",
                columns: [
                    {
                        data: 'property_type',
                        name: 'property_type'
                    },
                    {
                        data: 'property_location',
                        name: 'property_location'
                    },
                    {
                        data: 'property_status',
                        name: 'property_status'
                    },
                    {
                        data: 'property_size',
                        name: 'property_size'
                    },
                    {
                        data: 'property_post',
                        name: 'property_post'
                    },
                    {
                        data: 'category_name',
                        name: 'category_name'
                    },
                    {
                        data: 'property_images',
                        name: 'property_images'
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
