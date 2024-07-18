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
                                                <a class="btn  btn-lg  " href="{{ route('create.Type') }}"><b>ADD
                                                        TYPE</b></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mt-3">
                                    <div class="card-body">
                                        <table class="table table-bordered " id="type-table">
                                            <thead>
                                                <tr>

                                                    <th>Property &nbsp; Type</th>
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
            var table = $('#type-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('index.Type') }}",
                columns: [


                    {
                        data: 'property_type',
                        name: 'property_type'
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
