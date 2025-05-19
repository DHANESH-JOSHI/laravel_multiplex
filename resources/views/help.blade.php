@extends('layouts.front')

@section('title', 'Multiplex Play')

@section('content')
    <div class="min-h-screen bg-gray-50 py-12 mt-10 px-6 sm:px-16">

        <!-- Hero Section -->
        <div class="text-center mb-12">
            <h1 class="text-5xl font-extrabold text-gray-900 mb-4">Multiplex Play</h1>
            <p class="text-lg text-gray-700 mb-6">India’s new platform for unlimited entertainment with more fresh and exciting content.</p>
            <a href="#" class="inline-block bg-blue-600 text-white text-lg py-3 px-8 rounded-lg hover:bg-blue-700 transition ease-in-out duration-300">Download the App</a>
        </div>

        <!-- App Features Section -->
        <section class="mt-16">
            <h2 class="text-3xl font-semibold text-gray-900 mb-8 text-center">App Features</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col items-center transition transform hover:scale-105 hover:shadow-xl">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">1. Easy Download</h3>
                    <p class="text-gray-600 text-center">Download the app from Play Store, App Store, or visit <a href="http://www.multiplexplay.com" class="text-blue-500">multiplexplay.com</a>.</p>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col items-center transition transform hover:scale-105 hover:shadow-xl">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">2. Simple Sign-Up</h3>
                    <p class="text-gray-600 text-center">New users can sign up easily and start enjoying the content.</p>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col items-center transition transform hover:scale-105 hover:shadow-xl">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">3. Free Videos</h3>
                    <p class="text-gray-600 text-center">Multiplex Play offers a large collection of free videos for all users.</p>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col items-center transition transform hover:scale-105 hover:shadow-xl">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">4. Affordable Premium Videos</h3>
                    <p class="text-gray-600 text-center">Purchase premium videos at an affordable price to access the best collection.</p>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col items-center transition transform hover:scale-105 hover:shadow-xl">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">5. Original Web Series</h3>
                    <p class="text-gray-600 text-center">Watch exclusive, original web series on Multiplex Play.</p>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col items-center transition transform hover:scale-105 hover:shadow-xl">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">6. Search & Watch</h3>
                    <p class="text-gray-600 text-center">Easily search for your favorite movies and shows in various genres.</p>
                </div>
            </div>
        </section>

        <!-- Content Categories -->
        <section class="mt-16">
            <h2 class="text-3xl font-semibold text-gray-900 mb-8 text-center">Content Categories</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6">
                <div class="text-center bg-blue-100 p-6 rounded-lg shadow-md transition transform hover:scale-105">
                    <span class="block text-4xl mb-4 text-blue-500">🎬</span>
                    <p class="text-lg font-medium text-gray-800">Thriller</p>
                </div>
                <div class="text-center bg-blue-100 p-6 rounded-lg shadow-md transition transform hover:scale-105">
                    <span class="block text-4xl mb-4 text-blue-500">💥</span>
                    <p class="text-lg font-medium text-gray-800">Action</p>
                </div>
                <div class="text-center bg-blue-100 p-6 rounded-lg shadow-md transition transform hover:scale-105">
                    <span class="block text-4xl mb-4 text-blue-500">🎭</span>
                    <p class="text-lg font-medium text-gray-800">Drama</p>
                </div>
                <div class="text-center bg-blue-100 p-6 rounded-lg shadow-md transition transform hover:scale-105">
                    <span class="block text-4xl mb-4 text-blue-500">❤️</span>
                    <p class="text-lg font-medium text-gray-800">Romance</p>
                </div>
                <div class="text-center bg-blue-100 p-6 rounded-lg shadow-md transition transform hover:scale-105">
                    <span class="block text-4xl mb-4 text-blue-500">🌍</span>
                    <p class="text-lg font-medium text-gray-800">Hollywood</p>
                </div>
                <div class="text-center bg-blue-100 p-6 rounded-lg shadow-md transition transform hover:scale-105">
                    <span class="block text-4xl mb-4 text-blue-500">🎥</span>
                    <p class="text-lg font-medium text-gray-800">Bollywood</p>
                </div>
                <div class="text-center bg-blue-100 p-6 rounded-lg shadow-md transition transform hover:scale-105">
                    <span class="block text-4xl mb-4 text-blue-500">😂</span>
                    <p class="text-lg font-medium text-gray-800">Comedy</p>
                </div>
            </div>
        </section>

        <!-- MCN Agreement Section -->
        <section class="mt-16 mb-16">
            <h2 class="text-3xl font-semibold text-gray-900 mb-8 text-center">MCN Partnership Agreement</h2>
            <div class="bg-white p-6 rounded-lg shadow-xl">
                <h3 class="text-2xl font-semibold text-gray-800 mb-4">Important Legal Information</h3>
                <p class="text-lg text-gray-700 mb-4">By entering into the Multiplex Play partnership, you agree to the following terms:</p>
                <ul class="list-disc pl-6 space-y-4 text-gray-700">
                    <li>Multiplex Play supports partner videos through ad formats, monetizing on your behalf.</li>
                    <li>You retain full copyright and control over your content, while granting MCN non-exclusive rights for distribution and promotion.</li>
                    <li>Revenue share: You will receive 50% of the earnings generated by your channel.</li>
                    <li>Payments are made directly to your bank account once earnings meet the agreed threshold.</li>
                    <li>You are responsible for paying local taxes related to your earnings.</li>
                </ul>
            </div>
        </section>

    </div>
@endsection
