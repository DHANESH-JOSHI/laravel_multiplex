@extends('layouts.app')

@section('content')


    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h4>Add New Movie</h4>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" required placeholder="Enter movie title" value="{{ old('title') }}">
                    </div>

                    <div class="mb-4">
                        <label for="genre">Genre</label>
                        <select name="genre" class="form-control" required>
                            <option value="" disabled selected>Select Genre</option>
                            @foreach($genres as $genre)
                                <option value="{{ $genre->id }}" {{ old('genre') == $genre->id ? 'selected' : '' }}>
                                    {{ $genre->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

{{--                    <div class="mb-4">--}}
{{--                        <label for="language">Languages</label>--}}
{{--                        <select name="language[]" class="form-control select2" multiple="multiple" required>--}}
{{--                            @foreach($languages as $language)--}}
{{--                                <option value="{{ $language['_id'] }}"--}}
{{--                                    {{ collect(old('language'))->contains($language['_id']) ? 'selected' : '' }}>--}}
{{--                                    {{ $language['name'] }}--}}
{{--                                </option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
                    <div class="mb-4">
                        <label for="language">Languages</label>
                        <select id="language-select" name="language[]" class="form-control select2" multiple="multiple" required>
                            <option value="all">All</option>
                            @foreach($languages as $language)
                                <option value="{{ $language['_id'] }}"
                                    {{ collect(old('language'))->contains($language['_id']) ? 'selected' : '' }}>
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
                                    {{ collect(old('country'))->contains($country['id']) ? 'selected' : '' }}>
                                    {{ $country['country'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>





{{--                    @if(auth()->user())--}}

                    <div class="mb-4">
                        <label for="channel_id">Channel</label>
                        <select name="channel_id" class="form-control" required>
                            <option value="" disabled selected>Select Channel</option>
                            @foreach($channels as $channel)
                                <option value="{{ $channel['id'] }}" {{ old('channel_id') == $channel['id'] ? 'selected' : '' }}>
                                    {{ $channel['channel_name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="mb-4">
                        <label for="release">Release Date</label>
                        <input type="date" name="release" class="form-control" value="{{ old('release') }}">
                    </div>

                    <div class="mb-4">
                        <label for="price">Price</label>
                        <input type="number" name="price" class="form-control" placeholder="Enter price" value="{{ old('price') }}">
                    </div>

                    <div class="mb-4">
                        <label for="is_paid">Is Paid</label>
                        <select name="is_paid" class="form-control">
                            <option value="1" {{ old('is_paid') == '1' ? 'selected' : '' }}>Paid</option>
                            <option value="0" {{ old('is_paid') == '0' ? 'selected' : '' }}>Free</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="publication">Publication</label>
                        <select name="publication" class="form-control">
                            <option value="1" {{ old('publication') == '1' ? 'selected' : '' }}>Publish</option>
                            <option value="0" {{ old('publication') == '0' ? 'selected' : '' }}>Unpublish</option>
                        </select>
                    </div>

{{--                    <div class="mb-4">--}}
{{--                        <label for="trailer">Trailer File (Optional)</label>--}}
{{--                        <input type="file" name="trailer" class="form-control" accept="video/*">--}}
{{--                    </div>--}}

                    <div class="mb-4">
                        <label for="trailer_link">Trailer Link (YouTube) <span class="text-muted">(Optional)</span></label>
                        <input type="url" name="trailer_link" class="form-control" placeholder="Enter trailer video link" value="{{ old('trailer_link') }}">
                    </div>


                    <div class="row mb-4">
                        <div class="col-md-6 text-center">
                            <label for="thumbnail_image" class="fw-bold">🖼️ Thumbnail (Horizontal)</label>
                            <div class="border rounded mb-2 p-2" style="height: 200px; display: flex; justify-content: center; align-items: center;">
                                <img id="thumbnail_preview" src="{{ asset('path/to/default-thumbnail.png') }}" style="max-height: 180px; max-width: 100%;" alt="Thumbnail Preview">
                            </div>
                            <input type="file" name="thumbnail" id="thumbnail_image" class="form-control" accept="image/*">
                            <small class="text-muted d-block mt-1">Recommended: 16:9 (e.g., 1280x720)</small>
                        </div>

                        <div class="col-md-6 text-center">
                            <label for="poster_image" class="fw-bold">🎞️ Poster (Vertical)</label>
                            <div class="border rounded mb-2 p-2" style="height: 200px; display: flex; justify-content: center; align-items: center;">
                                <img id="poster_preview" src="{{ asset('path/to/default-poster.png') }}" style="max-height: 180px; max-width: 100%;" alt="Poster Preview">
                            </div>
                            <input type="file" name="poster" id="poster_image" class="form-control" accept="image/*">
                            <small class="text-muted d-block mt-1">Recommended: 2:3 (e.g., 1080x1620)</small>
                        </div>
                    </div>



                    <div class="mb-4">
                        <label for="file">Video File <span class="text-danger">*</span></label>
                        <input type="file" name="file" class="form-control" accept="video/*">
                    </div>

                    <div class="mb-4">
                        <label for="enable_download">Enable Download</label>
                        <select name="enable_download" class="form-control">
                            <option value="1" {{ old('enable_download') == '1' ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ old('enable_download') == '0' ? 'selected' : '' }}>No</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Add Movie</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function () {
            $('.select2').select2({
                placeholder: "Select an option",
                allowClear: true,
                tags: false, // If you want to allow only pre-defined options
                closeOnSelect: false  // This keeps dropdown open after selecting an item
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#country-select').on('change', function () {
                const allValue = 'all';
                const selected = $(this).val();

                if (selected.includes(allValue)) {
                    // Select all options except "All"
                    $(this).find('option').prop('selected', true);
                    $(this).find('option[value="all"]').prop('selected', false); // optionally keep All unselected
                    $(this).trigger('change');
                }
            });

            $('#language-select').on('change', function () {
                const allValue = 'all';
                const selected = $(this).val();

                if (selected.includes(allValue)) {
                    // Select all options except "All"
                    $(this).find('option').prop('selected', true);
                    $(this).find('option[value="all"]').prop('selected', false); // optionally keep All unselected
                    $(this).trigger('change');
                }
            });
        });
    </script>
@endsection

