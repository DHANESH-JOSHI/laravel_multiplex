@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h5>Create New Plan</h5>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('plan.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="plan_id" class="form-label">Plan ID</label>
                        <input type="text" name="plan_id" id="plan_id" class="form-control" value="{{ old('plan_id') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Plan Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="country" class="form-label">Country</label>
                        <select name="country" id="country" class="form-control select2-single" required>
                            <option value="" disabled selected>Select Country</option>
                            @foreach($countries as $country)

                                <option value="{{ $country['country'] }}" {{ old('country') == $country['country'] ? 'selected' : '' }}>
                                    {{ $country['country'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="mb-3">
                        <label for="currency" class="form-label">Currency</label>
                        <select name="currency" id="currency" class="form-control select2-single" required>
                            <option value="" disabled selected>Select Currency</option>
                            @foreach($countries as $currency)
                                <option value="{{ $currency['currency'] }}" {{ old('currency') == $currency['currency'] ? 'selected' : '' }}>
                                    {{ $currency['currency'] }} - {{ $currency['symbol'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="mb-3">
                        <label for="day" class="form-label">Day(s)</label>
                        <input type="number" name="day" id="day" class="form-control" value="{{ old('day') }}" min="1" placeholder=" (30 = 1 Months, 60 = 2 Months)" required>
                    </div>

{{--                    <div class="mb-3">--}}
{{--                        <label for="screens" class="form-label">Screens</label>--}}
{{--                        <input type="number" name="screens" id="screens" class="form-control" value="{{ old('screens') }}" min="1" required>--}}
{{--                    </div>--}}

                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" name="price" id="price" class="form-control" value="{{ old('price') }}" min="0" step="0.01" required>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select" required>
                            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Create Plan</button>
                    <a href="{{ route('plan.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Simulate getting the latest ID from somewhere (e.g., localStorage, or use a fixed number)
            let lastId = localStorage.getItem('lastPlanId') || 0;

            // Increment the ID
            let nextId = parseInt(lastId) + 1;

            // Format it with a static prefix like "01"
            let formattedId =  String(nextId).padStart(2, '0');

            // Set it in the input
            document.getElementById('plan_id').value = formattedId;

            // Optional: update localStorage so it remembers the last ID
            localStorage.setItem('lastPlanId', nextId);
        });
    </script>
@endsection
