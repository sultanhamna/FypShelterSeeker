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
                                                <a class="btn  btn-lg  " href="{{ route('create.category') }}"><b>ADD
                                                        CATEGORY</b></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mt-3">
                                    <div class="card-body">
                                        <table class="table table-bordered " id="category_table">
                                            <thead>
                                                <tr>
                                                    <th style="color: #6A9C89";>Category &nbsp; Name</th>
                                                    <th style="color: #6A9C89">Category &nbsp; Icon</th>
                                                    <th style="color: #6A9C89" >Action</th>
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
            var category_table = $('#category_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('index.category') }}",
                columns: [


                    {
                        data: 'category_name',
                        name: 'category_name'
                    },
                    {
                        data: 'category_icon',
                        name: 'category_icon'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
            $(document).on('click', 'button.delete_cat_button', function() {
                swal({
                    title: 'Sure',
                    text: 'Confirm Delete Catagory',
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        var href = $(this).data('href');
                        var data = {
                            _token: '{{ csrf_token() }}' // Ensure the CSRF token is included
                        };

                        $.ajax({
                            method: "DELETE",
                            url: href,
                            dataType: "json",
                            data: data,
                            success: function(result) {
                                if (result.success) {
                                    toastr.success(result.success);
                                    category_table.ajax.reload();
                                } else {
                                    toastr.error(result.error);
                                }
                            },
                            error: function(result) {
                                toastr.error(
                                    'An error occurred while deleting the Catagory.');
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
