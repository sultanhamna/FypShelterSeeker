@extends('admin.layout.master')
@section('content')
    <div class="container">
        <div class="card">
            <h1 class="mt-4 text-center" style="color: #6A9C89;">Users Table</h1>
            <div class="card-body">
                <table class="table table-bordered data-table" id="data-table">
                    <thead>
                        <tr>
                            <th style="color: #6A9C89">Name</th>
                            <th style="color: #6A9C89">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
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
                ajax: "{{ route('user.data') }}",
                columns: [

                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },

                ]
            });

        });
    </script>
@endsection
