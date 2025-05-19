@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Transaction Logs</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id="transaction-table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Transaction Type</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Created At</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function () {
            $('#transaction-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("tlogs.index") }}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'user', name: 'user'},
                    {data: 'transaction_type', name: 'transaction_type'},
                    {data: 'amount', name: 'amount'},
                    {data: 'status', name: 'status'},
                    {data: 'created_at', name: 'created_at'}
                ]
            });
        });
    </script>
@endpush
