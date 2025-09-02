<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Travelstride - The new way to explore the world\'s wonders')</title>
    <meta name="description"
        content="@yield('description', 'Find wonderful travel, your way. Search and compare 50,000+ expert-planned trips from 1,000+ companies.')">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
    body {
        font-family: 'Inter', sans-serif;
    }

    .nav-blur {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(8px);
    }

    .side-index {
        z-index: 100;
    }
    </style>
</head>

<body class="overflow-x-hidden">
    <div class=" transition-all duration-300" id="layout-wrapper">

        <!-- Sidebar -->

        <aside id="user-side"
            class="fixed top-0 left-0 h-full w-[350px] bg-white flex flex-col shadow-lg side-index transform -translate-x-full transition-transform duration-300 rounded-r-lg p-2 invisible">

            <button id="close-side-button" class="absolute top-2 right-2 z-20">
                <i class="fas fa-times"></i>
            </button>
            <div>
                <a aria-label="Travelstride Logo" href="/" class="block px-4 py-2 ">
                    <img alt="Travelstride Logo" class="h-[40px] w-full object-contain"
                        src="/images/travel_stride.svg" /></a>
            </div>

            @auth
            <div class="flex flex-col items-center mt-4 mb-8">
                <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="User"
                    class="w-20 h-20 rounded-full border-4 border-white shadow">
                <span class="mt-4 text-2xl font-bold text-gray-900">{{ auth()->user()->name }}</span>
                <span class="text-sm text-gray-500">Referral Code: <span
                        class="font-mono">{{ auth()->user()->referral_code ?? 'N/A' }}</span></span>
            </div>


            <div class="flex gap-4 w-full justify-center mt-2">
                <div class="bg-white px-4 py-2 rounded-lg text-center shadow-md min-w-[110px] border">
                    <div class="text-xs text-purple-700 font-semibold">Account Balance</div>
                    <div class="font-bold text-2xl text-gray-900">
                        ${{ number_format((float)(auth()->user()->balance ?? 0), 2) }}</div>
                </div>
                <div class="bg-white px-4 py-2 rounded-lg text-center shadow-md min-w-[110px] border">
                    <div class="text-xs text-blue-700 font-semibold">Commission</div>
                    <div class="font-bold text-2xl text-gray-900">
                        ${{ number_format((float)(auth()->user()->reviews()->whereNotNull('product_id')->where('status', 'approved')->sum('commission_earned')), 2) }}
                    </div>
                </div>
            </div>
            @endauth
            <div class=" flex-1 py-6 overflow-y-auto">
                @auth
                <!-- <a href="{{ route('user.dashboard') }}"
                    class="flex items-center px-6 py-3 rounded-lg hover:bg-purple-50 font-medium"><i
                        class="fas fa-tachometer-alt text-purple-700"></i> <span
                        class="ml-3 hidden md:inline group-hover:inline">Dashboard</span></a> -->
                <a href="{{ route('user.rate_trip') }}"
                    class="flex items-center px-6 py-3 rounded-lg hover:bg-purple-50 font-medium"><i
                        class="fas fa-credit-card text-purple-700"></i> <span
                        class="ml-3 inline group-hover:inline">Rate a Trip</span></a>

                <a href="{{ route('user.team') }}"
                    class="flex items-center px-6 py-3 rounded-lg hover:bg-purple-50 font-medium"><i
                        class="fas fa-users text-purple-700"></i> <span
                        class="ml-3 inline group-hover:inline">Team</span></a>

                <!-- <a href="{{ route('user.customer.customer_recharge') }}"
                    class="flex items-center px-6 py-3 rounded-lg hover:bg-purple-50 font-medium"><i
                        class="fas fa-credit-card text-purple-700"></i> <span
                        class="ml-3 inline group-hover:inline">Recharge</span></a> -->

                <a href="{{ route('user.customer.history') }}"
                    class="flex items-center px-6 py-3 rounded-lg hover:bg-purple-50 font-medium"><i
                        class="fas fa-history text-purple-700"></i> <span
                        class="ml-3 inline group-hover:inline">History</span></a>
                <!-- <a href="{{ route('user.customer.withdrawl') }}"
                    class="flex items-center px-6 py-3 rounded-lg hover:bg-purple-50 font-medium"><i
                        class="fas fa-wallet text-purple-700"></i> <span
                        class="ml-3 inline group-hover:inline">Withdrawal</span></a> -->
                <a href="{{ route('user.password.change') }}"
                    class="flex items-center px-6 py-3 rounded-lg hover:bg-purple-50 font-medium"><i
                        class="fas fa-key text-purple-700"></i> <span class="ml-3 inline group-hover:inline">Change
                        Password</span></a>
                @endauth
                <a href="{{ route('user.terms') }}"
                    class="flex items-center px-6 py-3 rounded-lg hover:bg-purple-50 font-medium"><i
                        class="fas fa-file-alt text-purple-700"></i> <span
                        class="ml-3 inline group-hover:inline">T&amp;C</span></a>
                <a href="{{ route('user.faq') }}"
                    class="flex items-center px-6 py-3 rounded-lg hover:bg-purple-50 font-medium"><i
                        class="fas fa-question-circle text-purple-700"></i> <span
                        class="ml-3 inline group-hover:inline">FAQs</span></a>
                <a href="{{ route('user.about') }}"
                    class="flex items-center px-6 py-3 rounded-lg hover:bg-purple-50 font-medium"><i
                        class="fas fa-info-circle text-purple-700"></i> <span
                        class="ml-3 inline group-hover:inline">About Us</span></a>
            </div>




            @auth
            <div class="border-t border-gray-200 my-1"></div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">
                    <i class="fas fa-sign-out-alt mr-2"></i> Sign Out
                </button>
            </form>
            @endauth

        </aside>

        <!-- Navigation (transparent, overlays hero) -->
        <div id="main-content" class="transition-all duration-300">
            <header class="fixed w-full z-50 top-0 transition-transform transform-gpu duration-300">
                <nav class="mx-auto px-4 sm:px-6 lg:px-8 py-2 flex items-center justify-between relative">
                    <div class="absolute top-0 left-0 right-0 bottom-0 radial-fade"></div>
                    <div class="flex items-center gap-6 relative w-1/3">

                        <button id="user-side-button"
                            class="flex items-center space-x-2 text-white hover:text-green-200 transition-colors">

                            <i class="fa-solid fa-bars"></i>

                        </button>

                    </div>

                    <!-- Logo -->
                    <div class="relative flex justify-center space-x-2 ">
                        <a href="/" class="flex items-center">
                            <img src="https://client.travelstride.com/app/_next/static/media/travel_stride_logo.a7a9b6f8.svg"
                                alt="Travelstride Logo" class="h-10 w-full">
                        </a>
                    </div>

                    <!-- Right side -->
                    <div class="relative flex justify-end items-center gap-6  w-1/3">

                        @auth
                        <div class="relative">
                            <button id="user-menu-button"
                                class="flex items-center space-x-2 text-white hover:text-green-200 transition-colors">
                                <div
                                    class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center font-semibold">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                                <span class="hidden md:block">{{ Auth::user()->name }}</span>
                                <i class="fas fa-chevron-down text-sm"></i>
                            </button>

                            <!-- Dropdown menu -->
                            <div id="user-dropdown"
                                class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">
                                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                        @else
                        <a id="sign-in-btn" href="{{ route('login') }}" class="btn-outline-white ">Sign In</a>
                        @endauth
                    </div>


                </nav>
            </header>
            <main>
                @yield('content')
            </main>
            <footer class="py-[65px]">
                <div class="max-w-7xl px-2 sm:px-6 md:px-8 mx-auto">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <div class="md:col-span-2">
                            <div class="Footer_title-wrapper__wDbt1">
                                <div class="flex items-center justify-between mb-8">
                                    <a aria-label="Travelstride Logo" href="/">
                                        <img alt="Travelstride Logo" class="h-[60px] w-auto object-contain"
                                            src="/images/travel_stride.svg" /></a>
                                    <svg class="h-[50px] w-[50px] " viewBox="0 0 80 80" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="Footer_logo-circle__wcOhf">
                                        <g clip-path="url(#clip0_16_40381)">
                                            <circle cx="40" cy="40" r="40" fill="#177A68"></circle>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M40 80C62.0914 80 80 62.0914 80 40C80 25.0114 71.756 11.9483 59.5551 5.0977C54.7237 6.2726 50.4097 7.53048 48.286 8.27483C44.3442 9.68456 36.1265 13.1082 36.9951 18.4786C37.4365 21.2035 40.2593 22.732 42.5412 23.9676C42.6766 24.0409 42.8102 24.1132 42.9412 24.1847C44.915 25.2755 46.9617 26.1465 49.0005 27.0142C49.7221 27.3214 50.4428 27.6281 51.1589 27.944C53.23 28.8838 55.3012 29.8908 57.3055 31.3005C60.9801 33.8514 64.1201 37.4093 65.5232 41.7728C67.3271 47.6131 65.6568 54.259 62.2495 59.2267C58.8421 64.1943 53.8981 67.8193 48.7537 70.7059C42.9967 73.9701 36.1006 77.158 31.6487 79.1269C34.3422 79.699 37.136 80 40 80ZM9.46203 65.836C12.966 65.7056 23.8304 65.1709 30.6481 63.3887C31.1994 63.2429 31.7651 63.0965 32.3416 62.9472C39.7287 61.0343 48.8861 58.6629 52.2947 51.4395C53.8981 48.083 53.965 44.0552 52.0274 40.833C49.8895 37.2751 46.0145 35.194 42.4067 33.3815C41.4233 32.8875 40.4227 32.415 39.4191 31.9412C36.468 30.5478 33.4908 29.1422 30.8485 27.1384C27.3075 24.3861 24.4347 19.8212 27.2407 15.2564C28.1761 13.7124 29.5791 12.504 31.0489 11.43C37.7968 6.52945 46.1481 4.11276 54.0986 2.63589C54.1465 2.6271 54.1942 2.61836 54.2418 2.60968C49.8174 0.923467 45.0165 0 40 0C17.9086 0 0 17.9086 0 40C0 49.8488 3.55942 58.8662 9.46203 65.836Z"
                                                fill="#177A68"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M59.5559 5.0977C54.7246 6.27259 50.4106 7.53047 48.287 8.27481C44.3451 9.68455 36.1274 13.1082 36.996 18.4786C37.4374 21.2035 40.2602 22.732 42.5421 23.9675C42.6775 24.0409 42.8111 24.1132 42.9421 24.1847C44.9159 25.2755 46.9626 26.1465 49.0014 27.0142C49.723 27.3214 50.4437 27.6281 51.1598 27.944C53.2309 28.8838 55.3021 29.8907 57.3064 31.3005C60.981 33.8514 64.1211 37.4093 65.5241 41.7728C67.328 47.6131 65.6577 54.259 62.2504 59.2266C58.843 64.1943 53.8991 67.8193 48.7546 70.7059C42.9975 73.9701 36.1014 77.158 31.6495 79.1269C22.8293 77.2535 15.0837 72.4731 9.46289 65.836C12.9668 65.7056 23.8313 65.1709 30.649 63.3887C31.2003 63.2429 31.766 63.0964 32.3425 62.9472C39.7296 61.0342 48.887 58.6629 52.2956 51.4395C53.899 48.083 53.9659 44.0552 52.0284 40.833C49.8904 37.2751 46.0154 35.194 42.4076 33.3815C41.4242 32.8875 40.4236 32.415 39.42 31.9412C36.4689 30.5478 33.4917 29.1422 30.8494 27.1384C27.3084 24.3861 24.4356 19.8212 27.2416 15.2564C28.177 13.7124 29.58 12.504 31.0498 11.4299C37.7977 6.52943 46.149 4.11274 54.0995 2.63587C54.1474 2.62709 54.1951 2.61835 54.2426 2.60968C56.0827 3.31095 57.8576 4.14414 59.5559 5.0977Z"
                                                fill="white"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M28.5094 40.1735L24.6246 30.5555L21.2847 40.3774L11.666 44.2663L21.4868 47.6034L25.3741 57.2222L28.714 47.4003L38.3327 43.5142L28.5094 40.1735ZM24.9994 46.3716C26.2316 46.3716 27.2306 45.2599 27.2306 43.8886C27.2306 42.5173 26.2316 41.4056 24.9994 41.4056C23.7672 41.4056 22.7681 42.5173 22.7681 43.8886C22.7681 45.2599 23.7672 46.3716 24.9994 46.3716Z"
                                                fill="#FFCA00"></path>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_16_40381">
                                                <rect width="80" height="80" fill="white"></rect>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                                <p class="title-one mb-8">
                                    Find wonderful travel, your way
                                </p>
                            </div>
                            <p class="text-slate-400">
                                Travelstride helps you search and compare 50,000+ expert-planned
                                trips from 1,000+ companies. Get the real picture with both
                                traveler and expert reviews to ensure the trip you book is the
                                right one for you.
                            </p>
                        </div>
                        <div class="Footer_links___b_Qj">
                            <p class="title-one mb-4 capitalize">
                                travelstride
                            </p>
                            <div class="flex flex-col gap-4">
                                <a class="text-slate-400 hover:text-primary" data-gtm-category="FooterLinkClick"
                                    data-gtm-trigger="click" data-gtm-action="FooterLinkClick -&gt; travelstride"
                                    data-gtm-label="FooterLinkClick -&gt; travelstride -&gt; About Travelstride-&gt; /about"
                                    href="/about">About Travelstride</a><a class="text-slate-400 hover:text-primary"
                                    data-gtm-category="FooterLinkClick" data-gtm-trigger="click"
                                    data-gtm-action="FooterLinkClick -&gt; travelstride"
                                    data-gtm-label="FooterLinkClick -&gt; travelstride -&gt; Why Travelstride-&gt; /blog/why-stride"
                                    href="/blog/why-stride">Why Travelstride</a><a
                                    class="text-slate-400 hover:text-primary" data-gtm-category="FooterLinkClick"
                                    data-gtm-trigger="click" data-gtm-action="FooterLinkClick -&gt; travelstride"
                                    data-gtm-label="FooterLinkClick -&gt; travelstride -&gt; Member Benefits-&gt; /member-savings"
                                    href="/member-savings">Member Benefits</a><a
                                    class="text-slate-400 hover:text-primary" data-gtm-category="FooterLinkClick"
                                    data-gtm-trigger="click" data-gtm-action="FooterLinkClick -&gt; travelstride"
                                    data-gtm-label="FooterLinkClick -&gt; travelstride -&gt; Press-&gt; /press-news"
                                    href="/press-news">Press</a><a class="text-slate-400 hover:text-primary"
                                    data-gtm-category="FooterLinkClick" data-gtm-trigger="click"
                                    data-gtm-action="FooterLinkClick -&gt; travelstride"
                                    data-gtm-label="FooterLinkClick -&gt; travelstride -&gt; Travel Expert-&gt; /travel-experts"
                                    href="/travel-experts">Travel Expert</a><a class="text-slate-400 hover:text-primary"
                                    data-gtm-category="FooterLinkClick" data-gtm-trigger="click"
                                    data-gtm-action="FooterLinkClick -&gt; travelstride"
                                    data-gtm-label="FooterLinkClick -&gt; travelstride -&gt; Blog-&gt; /blog"
                                    href="/blog">Blog</a><a class="text-slate-400 hover:text-primary"
                                    data-gtm-category="FooterLinkClick" data-gtm-trigger="click"
                                    data-gtm-action="FooterLinkClick -&gt; travelstride"
                                    data-gtm-label="FooterLinkClick -&gt; travelstride -&gt; Why Group Tours-&gt; /blog/top-ten-reasons-to-take-a-guided-trip"
                                    href="/blog/top-ten-reasons-to-take-a-guided-trip">Why Group Tours</a>
                            </div>
                        </div>
                        <div class="Footer_links___b_Qj">
                            <p class="title-one mb-4 capitalize">
                                connect
                            </p>
                            <div class="flex flex-col gap-4">
                                <a class="text-slate-400 hover:text-primary" data-gtm-category="FooterLinkClick"
                                    data-gtm-trigger="click" data-gtm-action="FooterLinkClick -&gt; connect"
                                    data-gtm-label="FooterLinkClick -&gt; connect -&gt; Join the Community-&gt; /join-d"
                                    href="/join-d">Join the Community</a><a class="text-slate-400 hover:text-primary"
                                    data-gtm-category="FooterLinkClick" data-gtm-trigger="click"
                                    data-gtm-action="FooterLinkClick -&gt; connect"
                                    data-gtm-label="FooterLinkClick -&gt; connect -&gt; Write a Review-&gt; /write-a-review"
                                    href="/write-a-review">Write a Review</a><a
                                    class="text-slate-400 hover:text-primary" data-gtm-category="FooterLinkClick"
                                    data-gtm-trigger="click" data-gtm-action="FooterLinkClick -&gt; connect"
                                    data-gtm-label="FooterLinkClick -&gt; connect -&gt; Tour Operators-&gt; /partners"
                                    href="/partners">Tour Operators</a><a class="text-slate-400 hover:text-primary"
                                    data-gtm-category="FooterLinkClick" data-gtm-trigger="click"
                                    data-gtm-action="FooterLinkClick -&gt; connect"
                                    data-gtm-label="FooterLinkClick -&gt; connect -&gt; Careers-&gt; /careers"
                                    href="/careers">Careers</a><a class="text-slate-400 hover:text-primary"
                                    data-gtm-category="FooterLinkClick" data-gtm-trigger="click"
                                    data-gtm-action="FooterLinkClick -&gt; connect"
                                    data-gtm-label="FooterLinkClick -&gt; connect -&gt; FAQs &amp; Help-&gt; /help-faq"
                                    href="/help-faq">FAQs &amp; Help</a><a class="text-slate-400 hover:text-primary"
                                    data-gtm-category="FooterLinkClick" data-gtm-trigger="click"
                                    data-gtm-action="FooterLinkClick -&gt; connect"
                                    data-gtm-label="FooterLinkClick -&gt; connect -&gt; Blog-&gt; /blog"
                                    href="/blog">Blog</a><a class="text-slate-400 hover:text-primary"
                                    data-gtm-category="FooterLinkClick" data-gtm-trigger="click"
                                    data-gtm-action="FooterLinkClick -&gt; connect"
                                    data-gtm-label="FooterLinkClick -&gt; connect -&gt; Contact-&gt; /contact"
                                    href="/contact">Contact</a><a class="text-slate-400 hover:text-primary"
                                    data-gtm-category="FooterLinkClick" data-gtm-trigger="click"
                                    data-gtm-action="FooterLinkClick -&gt; connect"
                                    data-gtm-label="FooterLinkClick -&gt; connect -&gt; Affiliate Program-&gt; /affiliate"
                                    href="/affiliate">Affiliate Program</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="py-[65px]">
                    <div class=" max-w-7xl px-2 sm:px-6 md:px-8 mx-auto flex items-center justify-between gap-6">
                        <p class="text-slate-400 text-[10px] w-[180px]">
                            Tours &amp; Operators on Travelstride Awarded and Featured by:
                        </p>
                        <a aria-label="Logos of organizations that awarded Travelstride trips"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 02 engagement" data-gtm-label="Why Travelstride / Press logos"
                            href="/press">
                            <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                class="h-[55px] w-auto object-contain"
                                src="https://client.travelstride.com/app/_next/static/images/desktop-awards-logos-11044cd8df731757db98cd6067d10a16.png" /></a>
                    </div>
                </div>

                <p class="text-center text-slate-400">
                    ©
                    <!-- -->2025

                    Travelstride. All rights reserved.
                </p>
                 
                <p class="flex gap-2 justify-center text-slate-400">
                    <a class="UILink_root__hOYWg UILink_secondary__l3bZs Footer_copyright-link__Pqw5o"
                        href="/stride-sitemap">Site Map</a> | <a
                        class="UILink_root__hOYWg UILink_secondary__l3bZs Footer_copyright-link__Pqw5o"
                        href="/global-sitemap">Global Site Map</a> | <a
                        class="UILink_root__hOYWg UILink_secondary__l3bZs Footer_copyright-link__Pqw5o"
                        href="/terms-of-use">Terms of Use</a> | <a
                        class="UILink_root__hOYWg UILink_secondary__l3bZs Footer_copyright-link__Pqw5o"
                        href="/privacy-policy">Privacy Policy</a>
                </p>
            </footer>
        </div>
    </div>
    <!-- Footer -->

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const swiper = new Swiper('.swiper-container', {
            slidesPerView: 'auto',
            spaceBetween: 20,
            loop: true,
            navigation: {
                nextEl: '.button-next',
                prevEl: '.button-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
                1280: {
                    slidesPerView: 4,
                }
            }
        });
    });
    </script>
    <script>
    let lastScrollTop = 0;
    const header = document.querySelector("header");
    const contactbar = document.getElementById("cnt");
    const sidebtn = document.getElementById("user-side-button");
    const textcustom = document.querySelectorAll(".nav-txt");
    const signinbtn = document.getElementById("sign-in-btn");
    const lgnusesr = document.getElementById("user-menu-button");

    window.addEventListener("scroll", function() {
        const scrollTop = window.scrollY || document.documentElement.scrollTop;

        if (scrollTop > lastScrollTop) {
            header.classList.add("bg-white");

            if (sidebtn) {
                sidebtn.classList.remove("text-white");
                sidebtn.classList.add("text-black");
            }

            if (lgnusesr) {
                lgnusesr.classList.remove("text-white");
                lgnusesr.classList.add("text-black");
            }

            if (signinbtn) {
                signinbtn.classList.remove("btn-outline-white");
                signinbtn.classList.add("btn-outline-primary");
            }

            textcustom.forEach(el => {
                el.classList.remove("text-white");
                el.classList.add("text-black");
            });

        } else if (scrollTop === 0) {
            header.classList.remove("bg-white");

            if (sidebtn) {
                sidebtn.classList.add("text-white");
                sidebtn.classList.remove("text-black");
            }

            if (lgnusesr) {
                lgnusesr.classList.add("text-white");
                lgnusesr.classList.remove("text-black");
            }

            if (signinbtn) {
                signinbtn.classList.add("btn-outline-white");
                signinbtn.classList.remove("btn-outline-primary");
            }

            textcustom.forEach(el => {
                el.classList.remove("text-black");
                el.classList.add("text-white");
            });
        }

        lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
    });
    </script>
    <script>
    document.addEventListener("DOMContentLoaded", () => {
        // Select all toggle buttons, card-cus, and card-button elements
        const toggleButtons = document.querySelectorAll(".toggle-btn");
        const hideButtons = document.querySelectorAll(".hide-btn");

        // Iterate over each toggle button and its corresponding elements
        toggleButtons.forEach((toggleBtn) => {
            const cardCus = toggleBtn.closest(".flex-col").querySelector(".card-cus");
            const cardButton = toggleBtn.closest(".flex-col").querySelector(".card-button");

            toggleBtn.addEventListener("click", () => {
                cardButton.style.display = "none";
                cardCus.style.display = "block";
            });
        });

        // Iterate over each hide button and its corresponding elements
        hideButtons.forEach((hideBtn) => {
            const cardCus = hideBtn.closest(".flex-col").querySelector(".card-cus");
            const cardButton = hideBtn.closest(".flex-col").querySelector(".card-button");

            hideBtn.addEventListener("click", () => {
                cardCus.style.display = "none";
                cardButton.style.display = "block";
            });
        });
    });
    </script>


    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuButton = document.getElementById('user-side-button');
        const closeButton = document.getElementById('close-side-button');
        const userSide = document.getElementById('user-side');
        const mainContent = document.getElementById('main-content');
        const layoutWrapper = document.getElementById('layout-wrapper');

        menuButton?.addEventListener('click', function(e) {
            e.stopPropagation();
            userSide.classList.remove('invisible', '-translate-x-full');
            userSide.classList.add('translate-x-0');
            // Add overflow-hidden to prevent horizontal scrolling
            document.body.classList.add('overflow-x-hidden');
        });

        closeButton?.addEventListener('click', function(e) {
            e.stopPropagation();
            userSide.classList.add('-translate-x-full');
            userSide.classList.remove('translate-x-0');
            // Remove overflow restriction
            document.body.classList.remove('overflow-x-hidden');
            // Hide completely after animation
            setTimeout(() => {
                userSide.classList.add('invisible');
            }, 300);
        });

        document.addEventListener('click', function(e) {
            if (userSide && !userSide.contains(e.target) && !menuButton.contains(e.target)) {
                userSide.classList.add('-translate-x-full');
                userSide.classList.remove('translate-x-0');
                document.body.classList.remove('overflow-x-hidden');
                // Hide completely after animation
                setTimeout(() => {
                    userSide.classList.add('invisible');
                }, 300);
            }
        });

        // User dropdown functionality
        const userMenuButton = document.getElementById('user-menu-button');
        const userDropdown = document.getElementById('user-dropdown');

        if (userMenuButton && userDropdown) {
            userMenuButton.addEventListener('click', function(e) {
                e.stopPropagation();
                userDropdown.classList.toggle('hidden');
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function(e) {
                if (!userMenuButton.contains(e.target) && !userDropdown.contains(e.target)) {
                    userDropdown.classList.add('hidden');
                }
            });
        }
    });
    </script>
    <script type="text/javascript">
    var Tawk_API = Tawk_API || {},
        Tawk_LoadStart = new Date();
    (function() {
        var s1 = document.createElement("script"),
            s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/68749a0056c776190f2ca358/1j03nj53h';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
    </script>
</body>

</html>