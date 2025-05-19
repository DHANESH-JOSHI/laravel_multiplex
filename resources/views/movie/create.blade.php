@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h4>Add New Movie</h4>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Movie Title -->
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" name="title" class="form-control" required placeholder="Enter movie title">
                        @error('title') <small class="text-red-500">{{ $message }}</small> @enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" class="form-control" required placeholder="Enter movie description"></textarea>
                        @error('description') <small class="text-red-500">{{ $message }}</small> @enderror
                    </div>

                    <!-- Release Date -->
                    <div class="mb-4">
                        <label for="release_date" class="block text-sm font-medium text-gray-700">Release Date</label>
                        <input type="date" name="release_date" class="form-control" required>
                        @error('release_date') <small class="text-red-500">{{ $message }}</small> @enderror
                    </div>

                    @php
                        $selectedGenres = old('genres', $selectedGenres ?? []);
                    @endphp


                    <div class="mb-4">
                        <label for="genres" class="block text-sm font-medium text-gray-700">Genres</label>

                        <!-- Genres (multiple selection) -->
                    <select name="genres[]" id="genres" class="form-control" multiple>
                        @foreach ([
                            'Action', 'Comedy', 'Crime', 'Family', 'Fantasy', 'History',
                            'Horror', 'Musical', 'Mystery', 'Thriller', 'War', 'Western',
                            'Romance', 'Adventure', 'Drama', 'Sci-Fi', 'Superhero', 'Spy'
                        ] as $genre)
                            <option value="{{ $genre }}" {{ in_array($genre, $selectedGenres) ? 'selected' : '' }}>
                                {{ $genre }}
                            </option>
                        @endforeach
                    </select>
                    </div>


                    <!-- Language -->
                    <div class="mb-4">
                        <label for="language" class="block text-sm font-medium text-gray-700">Language</label>
                        <input type="text" name="language" class="form-control" required placeholder="Enter movie language">
                        @error('language') <small class="text-red-500">{{ $message }}</small> @enderror
                    </div>

{{--                    <!-- Free/Paid -->--}}
                    <!-- Type Selection -->
                    <div class="mb-4">
                        <label for="type" class="block text-sm font-medium text-gray-700">Free/Paid</label>
                        <select id="typeSelector" name="type" class="form-control" required>
                            <option value="Free">Free</option>
                            <option value="Paid">Paid</option>
                        </select>
                        @error('type') <small class="text-red-500">{{ $message }}</small> @enderror
                    </div>

                    <!-- Price (Hidden by default for 'Free') -->
                    <div class="mb-4" id="priceField" style="display: none;">
                        <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                        <input type="number" name="price" class="form-control" placeholder="Enter price">
                        @error('price') <small class="text-red-500">{{ $message }}</small> @enderror
                    </div>



                    <!-- YouTube Trailer URL -->
                    <div class="mb-4">
                        <label for="youtube_trailer" class="block text-sm font-medium text-gray-700">YouTube Trailer URL</label>
                        <input type="url" name="youtube_trailer" class="form-control" required placeholder="Enter YouTube trailer URL">
                        @error('youtube_trailer') <small class="text-red-500">{{ $message }}</small> @enderror
                    </div>

                    <!-- Thumbnail Upload -->
                    <div class="mb-4">
                        <label for="thumbnail" class="block text-sm font-medium text-gray-700">Thumbnail</label>
                        <input type="file" name="thumbnail" class="form-control" required>
                        @error('thumbnail') <small class="text-red-500">{{ $message }}</small> @enderror
                    </div>

                    <!-- Poster Upload -->
                    <div class="mb-4">
                        <label for="poster" class="block text-sm font-medium text-gray-700">Poster</label>
                        <input type="file" name="poster" class="form-control" required>
                        @error('poster') <small class="text-red-500">{{ $message }}</small> @enderror
                    </div>

                    <!-- Publish/Unpublish -->
                    <div class="mb-4">
                        <label for="publish" class="block text-sm font-medium text-gray-700">Publish/Unpublish</label>
                        <select name="publish" class="form-control" required>
                            <option value="1">Publish</option>
                            <option value="0">Unpublish</option>
                        </select>
                        @error('publish') <small class="text-red-500">{{ $message }}</small> @enderror
                    </div>

                    <!-- Download Yes/No -->
                    <div class="mb-4">
                        <label for="download" class="block text-sm font-medium text-gray-700">Download</label>
                        <select name="download" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                        @error('download') <small class="text-red-500">{{ $message }}</small> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Add Movie</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new Choices('#genres', {
                removeItemButton: true,  // for tag-style removal
            });
        });
        document.addEventListener('DOMContentLoaded', function () {
            const typeSelector = document.getElementById('typeSelector');
            const priceField = document.getElementById('priceField');

            function togglePriceField() {
                if (typeSelector.value === 'paid') {
                    priceField.style.display = 'block';
                } else {
                    priceField.style.display = 'none';
                }
            }

            // Initial state check
            togglePriceField();

            // Event listener
            typeSelector.addEventListener('change', togglePriceField);
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const typeSelector = document.getElementById('typeSelector');
            const priceField = document.getElementById('priceField');

            function togglePriceField() {
                if (typeSelector.value === 'Paid') {
                    priceField.style.display = 'block';
                } else {
                    priceField.style.display = 'none';
                }
            }

            typeSelector.addEventListener('change', togglePriceField);
            togglePriceField(); // Initialize on page load
        });
    </script>
@endsection
