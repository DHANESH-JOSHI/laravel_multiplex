@extends('layouts.app') {{-- Adjust to your layout --}}

@section('content')
    <div class="container">
        <h2 class="mb-4">Users List</h2>

        <div class="table-responsive">
            <table class="table table-bordered" id="users-table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("users.index") }}',
                columns: [

                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                ]
            });
        });
    </script>
@endsection




