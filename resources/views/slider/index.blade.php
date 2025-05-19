@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">Banner List</h2>
            <a href="{{ route('banner.create') }}"
               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 transition">
                ➕ Add Banner
            </a>
        </div>

        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100 text-gray-700 text-sm uppercase tracking-wider">
                <tr>
                    <th class="px-4 py-3 text-left">Slider ID</th>
                    <th class="px-4 py-3 text-left">Title</th>
                    <th class="px-4 py-3 text-left">Image</th>
                    <th class="px-4 py-3 text-left">Type</th>
                    <th class="px-4 py-3 text-left">Button</th>
                    <th class="px-4 py-3 text-left">Video</th>
                    <th class="px-4 py-3 text-left">Order</th>
                    <th class="px-4 py-3 text-left">Status</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 text-sm">
                @forelse($sliders as $slider)
                    <tr>
                        <td class="px-4 py-3">{{ $slider->slider_id }}</td>
                        <td class="px-4 py-3">{{ $slider->title }}</td>
                        <td class="px-4 py-3">
                            <img src="{{ $slider->image_link }}" class="h-16 w-auto rounded" alt="image">
                        </td>
                        <td class="px-4 py-3">{{ $slider->action_type }}</td>
                        <td class="px-4 py-3">{{ $slider->action_btn_text }}</td>
                        <td class="px-4 py-3">
                            @if($slider->video_link)
                                <a href="{{ $slider->video_link }}" target="_blank" class="text-blue-600 hover:underline">View</a>
                            @else
                                <span class="text-gray-500">N/A</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">{{ $slider->order }}</td>
                        <td class="px-4 py-3">
                            @if($slider->publication)
                                <span class="inline-flex items-center px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded">Published</span>
                            @else
                                <span class="inline-flex items-center px-2 py-1 text-xs font-medium bg-red-100 text-red-800 rounded">Unpublished</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-4 py-6 text-center text-gray-500">No sliders found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
