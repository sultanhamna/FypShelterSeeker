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
                                                <a class="btn  btn-lg  " href="{{ route('create.Property') }}"><b>Add
                                                        Property</b></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mt-3">
                                    <div class="card-body">
                                        <table class="table table-bordered " id="main_table">
                                            <thead>
                                                <tr>
                                                    <th style="color: #6A9C89"> Type</th>
                                                    <th style="color: #6A9C89"> Location</th>
                                                    <th style="color: #6A9C89">  Status</th>
                                                    <th style="color: #6A9C89">  Size</th>
                                                    <th style="color: #6A9C89"> Post</th>
                                                    <th style="color: #6A9C89">   Name</th>
                                                    <th style="color: #6A9C89">  Image</th>
                                                    <th style="color: #6A9C89"> Price</th>
                                                    <th style="color: #6A9C89">Action</th>
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
<script>
    @if(session('success'))
        toastr.success('{{ session('success') }}');
    @endif
    @if(session('error'))
        toastr.error('{{ session('error') }}');
    @endif
</script>
    <script type="text/javascript">
        $(function() {
            var main_table = $('#main_table').DataTable({
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
                        data: 'price',
                        name: 'price'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
            $(document).on('click', 'button.delete_main_button', function() {
                swal({
                    title: 'Sure',
                    text: 'Confirm Delete Main Table',
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        var href = $(this).data('href');
                        var data = {
                            _token: '{{ csrf_token() }}'
                        };

                        $.ajax({
                            method: "DELETE",
                            url: href,
                            dataType: "json",
                            data: data,
                            success: function(result) {
                                if (result.success) {
                                    toastr.success(result.success);
                                    main_table.ajax.reload();
                                } else {
                                    toastr.error(result.error);
                                }
                            },
                            error: function(result) {
                                toastr.error(
                                    'An error occurred while deleting the Main Table.');
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
