@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">

            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if($movies)
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle text-center">
                            <thead class="table-light">
                            <tr>
                                <th>#</th>
                                {{--                                <th>Thumbnail</th>--}}
                                <th>Title</th>
                                <th>Genres</th>
                                <th>Language</th>
                                {{--                                <th>Release Date</th>--}}
                                {{--                                <th>Status</th>--}}
                                <th>Download</th>
                                {{--                                <th>Type</th>--}}
                                <th>Actions</th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-3">
{{--                        {{ $movies->links() }}--}}
                    </div>
                @else
                    <p class="text-muted">No Plans available.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
