@extends('layouts.front')

@section('title', 'Home')

@section('content')
<section class="h-[90vh] md:h-screen pt-16 relative">
    <div class="swiper hero-swiper h-full">
        <div class="swiper-wrapper">
            <div class="swiper-slide h-full bg-cover bg-center" style="background-image: url('{{ asset('assets/img/Container.jpg') }}')">
                <div class="bg-black bg-opacity-60 h-full flex items-center justify-center">
                    <div class="text-center px-4">
                        <h2 class="text-3xl md:text-6xl font-extrabold text-white mb-4 md:mb-6">Unlimited Entertainment</h2>
                        <p class="text-base md:text-lg text-gray-300 mb-4 md:mb-6">Binge-watch your favorite movies & shows. Cancel anytime.</p>
                        <a href="{{ route('user-login') }}" class="bg-brand text-white px-6 py-2 md:px-8 md:py-3 font-bold rounded-full hover:bg-orange-600 transition-all text-sm md:text-base">Watch Now</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>

<section class="py-10 px-4 md:px-6">
    <h2 class="text-2xl md:text-3xl font-bold text-center text-black hover:text-brand transition mb-6">Latest Movies</h2>
    <div class="swiper latest-movies-swiper">
        <div class="swiper-wrapper">
            <!-- Slide 1 -->
            <div class="swiper-slide flex justify-center">
                <div class="w-64 md:w-72 h-40 md:h-44 bg-gray-200 rounded-lg overflow-hidden shadow-md">
                    <img src="https://multiplexplay.com/office/uploads/sliders/slider-19.jpg" alt="Web Series 1" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" loading="lazy" />
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="swiper-slide flex justify-center">
                <div class="w-64 md:w-72 h-40 md:h-44 bg-gray-200 rounded-lg overflow-hidden shadow-md">
                    <img src="https://multiplexplay.com/office/uploads/sliders/slider-20.jpg" alt="Web Series 2" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" loading="lazy" />
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="swiper-slide flex justify-center">
                <div class="w-64 md:w-72 h-40 md:h-44 bg-gray-200 rounded-lg overflow-hidden shadow-md">
                    <img src="https://multiplexplay.com/office/uploads/sliders/slider-21.jpg" alt="Web Series 3" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" loading="lazy" />
                </div>
            </div>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</section>

<section class="py-10 px-4 md:px-6 bg-gray-50">
    <h2 class="text-2xl md:text-3xl font-bold text-center text-black hover:text-brand mb-6">Latest Web Series</h2>
    <div class="swiper latest-webseries-swiper">
            <div class="swiper-wrapper">
                <!-- Slide 1 -->
                <div class="swiper-slide flex justify-center">
                    <div class="w-64 md:w-72 h-40 md:h-44 bg-gray-200 rounded-lg overflow-hidden shadow-md">
                        <img src="https://multiplexplay.com/office/uploads/sliders/slider-19.jpg" alt="Web Series 1" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" loading="lazy" />
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="swiper-slide flex justify-center">
                    <div class="w-64 md:w-72 h-40 md:h-44 bg-gray-200 rounded-lg overflow-hidden shadow-md">
                        <img src="https://multiplexplay.com/office/uploads/sliders/slider-20.jpg" alt="Web Series 2" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" loading="lazy" />
                    </div>
                </div>
                <div class="swiper-slide flex justify-center">
                    <div class="w-64 md:w-72 h-40 md:h-44 bg-gray-200 rounded-lg overflow-hidden shadow-md">
                        <img src="https://multiplexplay.com/office/uploads/sliders/slider-22.jpg" alt="Web Series 2" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" loading="lazy" />
                    </div>
                </div>
                <div class="swiper-slide flex justify-center">
                    <div class="w-64 md:w-72 h-40 md:h-44 bg-gray-200 rounded-lg overflow-hidden shadow-md">
                        <img src="https://multiplexplay.com/office/uploads/sliders/slider-24.jpg" alt="Web Series 2" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" loading="lazy" />
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="swiper-slide flex justify-center">
                    <div class="w-64 md:w-72 h-40 md:h-44 bg-gray-200 rounded-lg overflow-hidden shadow-md">
                        <img src="https://multiplexplay.com/office/uploads/sliders/slider-21.jpg" alt="Web Series 3" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" loading="lazy" />
                    </div>
                </div>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
</section>

<section class="text-gray-800 py-16 px-4 md:px-6" id="about-us">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 items-center gap-10">
        <div data-aos="fade-right">
            <h3 class="text-3xl md:text-4xl font-bold mb-4 text-[#fea500]">About Us</h3>
            <p class="text-base md:text-lg mb-6 leading-relaxed">
                <strong>Multiplex Play</strong> is India’s new platform for <span class="text-[#fea500] font-semibold">Unlimited Entertainment</span> featuring exclusive content and a mix of free and premium videos.
            </p>
            <ul class="space-y-2 md:space-y-3 text-gray-700 text-sm md:text-base">
                <li class="flex items-start gap-2"><span class="text-[#fea500]">✔️</span> Download from Play Store easily.</li>
                <li class="flex items-start gap-2"><span class="text-[#fea500]">✔️</span> New users can sign up and enjoy instantly.</li>
                <li class="flex items-start gap-2"><span class="text-[#fea500]">✔️</span> Tons of free and premium content.</li>
                <li class="flex items-start gap-2"><span class="text-[#fea500]">✔️</span> Lowest cost for top-tier streaming.</li>
                <li class="flex items-start gap-2"><span class="text-[#fea500]">✔️</span> All genres: Thriller, Action, Romance & more.</li>
            </ul>
            <a href="{{ route('contact')  }}" class="mt-6 inline-block bg-[#fea500] text-white px-5 py-2 rounded-full font-semibold hover:bg-orange-500 transition text-sm md:text-base">Contact Us</a>
        </div>
        <div data-aos="fade-left">
            <img src="https://multiplexplay.com/img/logo1.png" alt="Entertainment" class="rounded-xl w-full max-w-xs md:max-w-md mx-auto drop-shadow-md" loading="lazy" />
        </div>
    </div>
</section>
@endsection
