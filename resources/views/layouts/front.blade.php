<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MultiplexPlay</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: '#fea500',
                        dark: '#0f0f0f',
                    },
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
</head>

<body class="bg-[#F7F7F7] text-black font-sans">
<header class="bg-white shadow-md fixed top-0 w-full z-50 position-absolute">
    <div class="max-w-7xl mx-auto flex justify-between items-center px-4 py-4">
        <h1 class="text-xl md:text-2xl font-bold text-brand">MultiplexPlay</h1>

        <!-- Mobile Hamburger Icon -->
        <button id="menu-toggle" class="md:hidden focus:outline-none text-gray-700">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>

        <!-- Desktop Navigation -->
        <nav class="hidden md:flex space-x-4 md:space-x-6">
            <a href="{{ route('home')  }}" class="hover:text-brand transition text-sm md:text-base">Home</a>
            <a href="{{ route('about')  }}" class="hover:text-brand transition text-sm md:text-base">About Us</a>
            <a href="{{ route('tc')  }}" class="hover:text-brand transition text-sm md:text-base">Terms and Conditions</a>
            <a href="{{ route('policy')  }}" class="hover:text-brand transition text-sm md:text-base">Policy</a>
            <a href="{{ route('help')  }}" class="hover:text-brand transition text-sm md:text-base">Help</a>
            <a href="{{ route('contact')  }}" class="hover:text-brand transition text-sm md:text-base">Contact</a>
{{--            <a href="{{ route('')  }}" class="hover:text-brand transition text-sm md:text-base">DeleteUserData</a>--}}
            <a href="{{ route('login')  }}" class="hover:text-brand transition text-sm md:text-base">Channel Login</a>
            <a href="{{ route('register')  }}" class="hover:text-brand transition text-sm md:text-base">SignUp</a>
            <a href="{{ route('user-login')  }}" class="hover:text-brand transition text-sm md:text-base">UserLogin</a>
        </nav>
    </div>

    <!-- Mobile Navigation -->
    <div id="mobile-menu" class="absolute top-full left-0 w-full md:hidden hidden bg-white shadow z-50">
        <a href="{{ route('home')  }}" class="block py-2 px-4 text-sm hover:text-brand">Home</a>
        <a href="{{ route('about')  }}" class="block py-2 px-4 text-sm hover:text-brand">About Us</a>
        <a href="{{ route('tc')  }}" class="block py-2 px-4 text-sm hover:text-brand">Terms and Conditions</a>
        <a href="{{ route('policy')  }}" class="block py-2 px-4 text-sm hover:text-brand">Policy</a>
        <a href="{{ route('help')  }}" class="block py-2 px-4 text-sm hover:text-brand">Help</a>
        <a href="{{ route('contact')  }}" class="block py-2 px-4 text-sm hover:text-brand">Contact</a>
{{--        <a href="{{ route('')  }}" class="block py-2 px-4 text-sm hover:text-brand">DeleteUserData</a>--}}
        <a href="{{ route('login')  }}" class="block py-2 px-4 text-sm hover:text-brand">Channel Login</a>
        <a href="{{ route('register')  }}" class="block py-2 px-4 text-sm hover:text-brand">SignUp</a>
        <a href="{{ route('user-login')  }}" class="hover:text-brand transition text-sm md:text-base">UserLogin</a>
    </div>

</header>

<main >
    @yield('content')
</main>



<footer class="fixed bottom-0 left-0 w-full bg-black text-white py-6 text-center text-xs md:text-sm z-50">
    &copy; 2025 MultiplexPlay. All Rights Reserved.
</footer>


<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({ duration: 1000, once: true });

    new Swiper('.hero-swiper', {
        loop: true,
        autoplay: { delay: 5000 },
        pagination: { el: '.swiper-pagination', clickable: true },
    });

    new Swiper('.latest-movies-swiper', {
        slidesPerView: 1,
        spaceBetween: 20,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            768: { slidesPerView: 2 },
            1024: { slidesPerView: 3 },
        },
    });

    new Swiper('.latest-webseries-swiper', {
        slidesPerView: 1,
        spaceBetween: 20,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            768: { slidesPerView: 2 },
            1024: { slidesPerView: 3 },
        },
    });
    const swiper = new Swiper('.mySwiper', {
        slidesPerView: 1,
        spaceBetween: 10,
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 15,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 25,
            },
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });

</script>
<script>
    const toggleButton = document.getElementById("menu-toggle");
    const mobileMenu = document.getElementById("mobile-menu");

    toggleButton.addEventListener("click", () => {
        mobileMenu.classList.toggle("hidden");
    });
</script>

</body>

</html>
