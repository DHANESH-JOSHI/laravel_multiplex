@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h4>Edit Movie</h4>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <form action="{{ route('movies.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" required value="{{ old('title', $movie->title) }}">
                    </div>

                    <div class="mb-4">
                        <label for="genre">Genre</label>
                        <select name="genre" class="form-control" required>
                            @foreach($genres as $genre)
                                <option value="{{ $genre->id }}" {{ $movie->genre_id == $genre->id ? 'selected' : '' }}>
                                    {{ $genre->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="language">Languages</label>
                        <select id="language-select" name="language[]" class="form-control select2" multiple="multiple" required>
                            <option value="all">All</option>
                            @foreach($languages as $language)
                                <option value="{{ $language['_id'] }}"
                                    {{ in_array($language['_id'], $movie->languages ?? []) ? 'selected' : '' }}>
                                    {{ $language['name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="country">Countries</label>
                        <select id="country-select" name="country[]" class="form-control select2" multiple="multiple" required>
                            <option value="all">All</option>
                            @foreach($countries as $country)
                                <option value="{{ $country['id'] }}"
                                    {{ in_array($country['id'], $movie->countries ?? []) ? 'selected' : '' }}>
                                    {{ $country['country'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="channel_id">Channel</label>
                        <select name="channel_id" class="form-control" required>
                            @foreach($channels as $channel)
                                <option value="{{ $channel['id'] }}" {{ $movie->channel_id == $channel['id'] ? 'selected' : '' }}>
                                    {{ $channel['channel_name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="release">Release Date</label>
                        <input type="date" name="release" class="form-control" value="{{ old('release', $movie->release) }}">
                    </div>

                    <div class="mb-4">
                        <label for="price">Price</label>
                        <input type="number" name="price" class="form-control" value="{{ old('price', $movie->price) }}">
                    </div>

                    <div class="mb-4">
                        <label for="is_paid">Is Paid</label>
                        <select name="is_paid" class="form-control">
                            <option value="1" {{ $movie->is_paid == '1' ? 'selected' : '' }}>Paid</option>
                            <option value="0" {{ $movie->is_paid == '0' ? 'selected' : '' }}>Free</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="publication">Publication</label>
                        <select name="publication" class="form-control">
                            <option value="1" {{ $movie->publication == '1' ? 'selected' : '' }}>Publish</option>
                            <option value="0" {{ $movie->publication == '0' ? 'selected' : '' }}>Unpublish</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="trailer_link">Trailer Link (YouTube)</label>
                        <input type="url" name="trailer_link" class="form-control" value="{{ old('trailer_link', $movie->trailer_link) }}">
                    </div>

                    <div class="mb-4">
                        <label for="thumbnail_image">🖼️ Thumbnail Image</label>
                        <input type="file" name="thumbnail" class="form-control" accept="image/*">
                        @if($movie->thumbnail)
                            <img src="{{ asset('storage/' . $movie->thumbnail) }}" class="img-fluid mt-2" style="max-height: 120px;">
                        @endif
                    </div>

                    <div class="mb-4">
                        <label for="poster_image">🎞️ Poster Image</label>
                        <input type="file" name="poster" class="form-control" accept="image/*">
                        @if($movie->poster)
                            <img src="{{ asset('storage/' . $movie->poster) }}" class="img-fluid mt-2" style="max-height: 120px;">
                        @endif
                    </div>

                    <div class="mb-4">
                        <label for="file">Replace Video File (Optional)</label>
                        <input type="file" name="file" class="form-control" accept="video/*">
                    </div>

                    <div class="mb-4">
                        <label for="enable_download">Enable Download</label>
                        <select name="enable_download" class="form-control">
                            <option value="1" {{ $movie->enable_download == '1' ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ $movie->enable_download == '0' ? 'selected' : '' }}>No</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Update Movie</button>
                    <a href="{{ route('movies.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function () {
            $('.select2').select2({
                placeholder: "Select options",
                allowClear: true,
                closeOnSelect: false
            });

            $('#language-select, #country-select').on('change', function () {
                const allValue = 'all';
                const selected = $(this).val();

                if (selected.includes(allValue)) {
                    $(this).find('option').prop('selected', true);
                    $(this).find('option[value="all"]').prop('selected', false);
                    $(this).trigger('change');
                }
            });
        });
    </script>
@endsection
