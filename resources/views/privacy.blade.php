@extends('layouts.front')

@section('title', 'Privacy Policy')

@section('content')
    <div class="min-h-screen flex items-start justify-center py-12 sm:py-20 bg-white">
        <div class="w-full max-w-5xl px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold text-gray-900 mb-6">Privacy Policy</h1>

            <p class="text-lg text-gray-700 mb-8">
                This Privacy Policy outlines how we collect, use, and protect your personal information when you use our services.
            </p>

            <div class="space-y-10 text-gray-800">
                <!-- Section 1 -->
                <section>
                    <h2 class="text-2xl font-semibold mb-4">1. Information We Collect</h2>
                    <ul class="list-disc list-inside space-y-2">
                        <li>Your name, email address, and contact information.</li>
                        <li>Usage data such as pages visited, time spent, and interactions.</li>
                        <li>Cookies and similar tracking technologies.</li>
                    </ul>
                </section>

                <!-- Section 2 -->
                <section>
                    <h2 class="text-2xl font-semibold mb-4">2. How We Use Your Information</h2>
                    <p>We use your information to:</p>
                    <ul class="list-disc list-inside mt-2 space-y-2">
                        <li>Provide and maintain our services.</li>
                        <li>Improve user experience and optimize performance.</li>
                        <li>Communicate with you, including promotional emails.</li>
                        <li>Ensure compliance with legal obligations.</li>
                    </ul>
                </section>

                <!-- Section 3 -->
                <section>
                    <h2 class="text-2xl font-semibold mb-4">3. Data Sharing</h2>
                    <p>We do not sell your personal data. We may share information with:</p>
                    <ul class="list-disc list-inside mt-2 space-y-2">
                        <li>Service providers who assist in our operations.</li>
                        <li>Legal authorities when required by law.</li>
                    </ul>
                </section>

                <!-- Section 4 -->
                <section>
                    <h2 class="text-2xl font-semibold mb-4">4. Security</h2>
                    <p>We implement appropriate technical and organizational measures to protect your data. However, no system is completely secure.</p>
                </section>

                <!-- Section 5 -->
                <section>
                    <h2 class="text-2xl font-semibold mb-4">5. Your Rights</h2>
                    <p>You have the right to:</p>
                    <ul class="list-disc list-inside mt-2 space-y-2">
                        <li>Access the personal information we hold about you.</li>
                        <li>Request correction or deletion of your data.</li>
                        <li>Withdraw consent or object to data processing.</li>
                    </ul>
                </section>

                <!-- Section 6 -->
                <section>
                    <h2 class="text-2xl font-semibold mb-4">6. Changes to This Policy</h2>
                    <p>We may update this policy periodically. Changes will be posted on this page with a revised date.</p>
                </section>
            </div>
        </div>
    </div>
@endsection
