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
                                <th>Movies</th>
{{--                                <th>Genre</th>--}}
                                <th>Movies</th>
{{--                                <th>Release Date</th>--}}
{{--                                <th>Status</th>--}}
                                <th>Countries</th>
                                <th>Download</th>
                                {{--                                <th>Type</th>--}}
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($movies as $index => $movie)
                                <tr>

                                    <td>{{ $index + 1  }}</td>
{{--                                    <td>--}}
{{--                                        <img src="{{ asset('storage/' . $movie->thumbnail) }}" width="60" height="60" class="rounded" />--}}
{{--                                    </td>--}}

                                    <td>{{ $movie['title'] }}</td>
{{--                                    <td>--}}
{{--                                        @foreach ($movie['genre'] as $genre)--}}
{{--                                            <span class="badge bg-secondary">{{ $genre }}</span>--}}
{{--                                        @endforeach--}}
{{--                                    </td>--}}

                                    <td>
                                        @foreach ($movie['language'] as $language)
                                            <span class="badge bg-secondary">{{ $language }}</span>
                                        @endforeach
                                    </td>
{{--                                    <td>{{ \Carbon\Carbon::parse($movie->release_date)->format('d M Y') }}</td>--}}
{{--                                    <td>--}}
{{--                                        @dd($movie);--}}
{{--                                        @if($movie['publuish'])--}}
{{--                                            <span class="badge bg-success">Published</span>--}}
{{--                                        @else--}}
{{--                                            <span class="badge bg-danger">Unpublished</span>--}}
{{--                                        @endif--}}
{{--                                    </td>--}}
                                    <td>
                                        @foreach ($movie['country'] as $country)
                                            <span class="badge bg-primary">{{ $country }}</span>
                                        @endforeach
                                    </td>
                                    <td>{{ $movie['enable_download'] ? 'Yes' : 'No' }}</td>


                                    <td>
{{--                                        <a href="{{ route('movies.show', $movie['id']) }}" class="btn btn-info btn-sm" title="View"><i class="fas fa-eye"></i></a>--}}
                                        <a href="{{ route('movies.edit', $movie['id']) }}" class="btn btn-warning btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('movies.destroy', $movie['id']) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-3">
                        {{ $movies->links() }}
                    </div>
                @else
                    <p class="text-muted">No movies available.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
