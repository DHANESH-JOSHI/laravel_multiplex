@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Create New Web Series</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Error!</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('webseries.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label>Upload Image</label>
                <input type="file" name="image_url" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Select Seasons</label>
                <select name="seasonsId[]" class="form-control" multiple required>
                    @foreach($seasons as $season)
                        <option value="{{ $season->_id }}">{{ $season->title ?? 'Season' }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
