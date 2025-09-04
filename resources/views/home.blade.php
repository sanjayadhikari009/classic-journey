@extends('layouts.app')

@section('title', "Travelstride - The new way to explore the world's wonders")

@section('content')
<!-- poster="/videos/heroimage.jpg" -->
<!-- Hero Section with single background video and overlay -->
<section class="relative h-[100vh] flex items-center justify-center overflow-hidden">
    <video autoplay loop muted playsinline class="absolute inset-0 top-0 left-0 right-0 bottom-0 w-full h-full object-cover z-0 transition-all
        duration-700">
        <source src="/videos/vid-vid.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="absolute inset-0 bg-black/50 z-10"></div>

    <div
        class="relative z-20 max-w-7xl px-2 sm:px-6 md:px-8 py-20 mx-auto flex flex-col items-center justify-end h-full">

        <h1 class="text-3xl md:text-5xl  uppercase text-white text-center mb-2 drop-shadow-lg">Classic
            Journeys<span class="block  text-2xl">walk into
                extraordinary</span></h1> <button class="btn-primary mt-4">Find a
            tour</button>

    </div>
</section>

<!-- How we do section -->
<section class="py-[70px]">
    <div class="container flex justify-center">
        <div class="w-2/3 flex flex-col items-center">
            <h2 class="text-center text-2xl md:text-[34px] lg:text-[44px] font-mencken">We create the most culturally
                rich</br>
                & authentic walking tours in the world.</h2>
            <a href="/" class="btn-outline mt-4">Read how we do it</a>
        </div>
    </div>
</section>

<section class="py-8 bg-primary">
    <div class="container flex justify-center">
        <div class="w-2/3 flex flex-col items-center justify-center gap-4 ">
            <h3 class="font-bold uppercase text-2xl md:text-3xl lg:text-4xl text-white">Travel + </br> Leisure</h3>
            <h3 class="font-bold uppercase text-3xl lg:text-4xl text-white text-center">World Best tour operator</h3>
            <h3 class="font-bold uppercase lg:text-xl text-white text-center">Multi-Time No. 1 & Hall of Fame</h3>

        </div>
    </div>
</section>

<section class="bg-black  py-[70px]">
    <div class=" container">
        <h4 class="section-subheading text-white">
            Choose your travel style
        </h4>
        <h2 class="text-white section-heading">
            What’s Your Passion?
        </h2>
    </div>

    <div class="swiper-container relative  overflow-hidden">
        <div class="swiper-wrapper">
            <div class="swiper-slide  slider-custom   bg-cover bg-center bg-no-repeat " data-swiper-slide-index="0"
                style="background-image:url('https://www.classicjourneys.com/wp-content/uploads/2024/06/Top-10-Most-Popular-Tours.jpg');">
                <div class="flex flex-col items-center justify-end h-full p-[35px]">
                    <h3 class="text-white text-3xl font-mencken text-center leading-8">Top 10 Most Popular Tours</h3>
                    <a href="/" class="btn-outline-white mt-2">see top 10</a>
                </div>
            </div>
            <div class="swiper-slide  slider-custom   bg-cover bg-center bg-no-repeat " data-swiper-slide-index="1"
                style="background-image:url('https://www.classicjourneys.com/wp-content/uploads/2024/06/Top-10-Walks.png');">
                <div class="flex flex-col items-center justify-end h-full p-[35px]">
                    <h3 class="text-white text-3xl font-mencken text-center leading-8">Top 10 Tours with Iconic Walks
                    </h3>
                    <a href="/" class="btn-outline-white mt-2">see top 10</a>
                </div>
            </div>
            <div class="swiper-slide  slider-custom   bg-cover bg-center bg-no-repeat " data-swiper-slide-index="2"
                style="background-image:url('https://www.classicjourneys.com/wp-content/uploads/2024/06/Top-10-Wildlife.png');">
                <div class="flex flex-col items-center justify-end h-full p-[35px]">
                    <h3 class="text-white text-3xl font-mencken text-center leading-8">Top 10 Wildlife Tours
                    </h3>
                    <a href="/" class="btn-outline-white mt-2">see top 10</a>
                </div>
            </div>
            <div class="swiper-slide  slider-custom   bg-cover bg-center bg-no-repeat " data-swiper-slide-index="3"
                style="background-image:url('https://www.classicjourneys.com/wp-content/uploads/2024/06/Top-10-Foodie-Tours.jpg');">
                <div class="flex flex-col items-center justify-end h-full p-[35px]">
                    <h3 class="text-white text-3xl font-mencken text-center leading-8">Top 10 Foodie Tours
                    </h3>
                    <a href="/" class="btn-outline-white mt-2">see top 10</a>
                </div>
            </div>
            <div class="swiper-slide  slider-custom   bg-cover bg-center bg-no-repeat " data-swiper-slide-index="4"
                style="background-image:url('https://www.classicjourneys.com/wp-content/uploads/2024/06/Top-10-Wine-Lovers.png');">
                <div class="flex flex-col items-center justify-end h-full p-[35px]">
                    <h3 class="text-white text-3xl font-mencken text-center leading-8">Top 10 Tours for Wine Lovers
                    </h3>
                    <a href="/" class="btn-outline-white mt-2">see top 10</a>
                </div>
            </div>
            <div class="swiper-slide  slider-custom   bg-cover bg-center bg-no-repeat " data-swiper-slide-index="5"
                style="background-image:url('https://www.classicjourneys.com/wp-content/uploads/2024/06/Top-10-History-Buffs.png');">
                <div class="flex flex-col items-center justify-end h-full p-[35px]">
                    <h3 class="text-white text-3xl font-mencken text-center leading-8">Top 10 Tours for History Buffs
                    </h3>
                    <a href="/" class="btn-outline-white mt-2">see top 10</a>
                </div>
            </div>
            <div class="swiper-slide  slider-custom   bg-cover bg-center bg-no-repeat " data-swiper-slide-index="6"
                style="background-image:url('https://www.classicjourneys.com/wp-content/uploads/2024/06/Top-10-Multi-Destination.png');">
                <div class="flex flex-col items-center justify-end h-full p-[35px]">
                    <h3 class="text-white text-3xl font-mencken text-center leading-8">Top 10 Multidestination Tours
                    </h3>
                    <a href="/" class="btn-outline-white mt-2">see top 10</a>
                </div>
            </div>
            <div class="swiper-slide  slider-custom   bg-cover bg-center bg-no-repeat " data-swiper-slide-index="7"
                style="background-image:url('https://www.classicjourneys.com/wp-content/uploads/2024/06/Top-10-Family.png');">
                <div class="flex flex-col items-center justify-end h-full p-[35px]">
                    <h3 class="text-white text-3xl font-mencken text-center leading-8">Top 10 Family Tours
                    </h3>
                    <a href="/" class="btn-outline-white mt-2">see top 10</a>
                </div>
            </div>
            <div class="swiper-slide  slider-custom   bg-cover bg-center bg-no-repeat " data-swiper-slide-index="8"
                style="background-image:url('https://www.classicjourneys.com/wp-content/uploads/2024/06/Top-10-Island-Tours-1.jpg');">
                <div class="flex flex-col items-center justify-end h-full p-[35px]">
                    <h3 class="text-white text-3xl font-mencken text-center leading-8">Top 10 Island Tours
                    </h3>
                    <a href="/" class="btn-outline-white mt-2">see top 10</a>
                </div>
            </div>
        </div>
        <button
            class="button-prev rounded-full bg-white swiper-button top-1/2 left-10 w-[50px] h-[50px] z-20 hidden md:flex items-center justify-center  cursor-pointer  visible absolute"
            title="Previous Slide" type="button" data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
            data-gtm-action="Position 01 engagement" data-gtm-label="Trip Type Carousel / Arrow &lt;">
            <i class="fa-solid fa-chevron-left"></i>
        </button>
        <button
            class="button-next rounded-full  bg-white swiper-button top-1/2 right-10 w-[50px] h-[50px] z-20 hidden md:flex items-center justify-center rotate-180  cursor-pointer  visible absolute"
            title="Next Slide" type="button" data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
            data-gtm-action="Position 01 engagement" data-gtm-label="Trip Type Carousel / Arrow &gt;">
            <i class="fa-solid fa-chevron-left"></i>
        </button>

</section>

<section class="py-[70px] bg-cover bg-center bg-no-repeat"
    style="background-image:url('https://www.classicjourneys.com/wp-content/uploads/2021/06/cta_cards.jpg;">

    <div class="container">
        <h4 class=" section-subheading">
            go with whomever, whenever
        </h4>
        <h2 class=" section-heading">
            Two Ways to Go
        </h2>
        <div class="flex justify-center">
            <div class="grid lg:grid-cols-2 lg:w-2/3 gap-6">
                <div class="bg-white/80 backdrop-blur-sm p-12  shadow-xl h-[496px] flex items-center justify-center">
                    <div class="space-y-6">
                        <h3 class="text-2xl font-medium text-center font-sans">Scheduled Small Group Trips</h3>
                        <p class="text-xl text-center leading-8 font-sans">Small group departures ready for you to book
                        </p>
                        <div class="w-full flex justify-center">
                            <div class="h-10 w-[2px] bg-primary"></div>
                        </div>
                        <div class="w-full flex justify-center">
                            <a href="/" class="text-center text-primary ffont-medium">View All Destinations <i
                                    class="fa-solid fa-caret-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="bg-white/80 backdrop-blur-sm p-12  shadow-xl h-[496px] flex items-center justify-center">
                    <div class="space-y-6">
                        <h3 class="text-2xl font-medium text-center font-sans">Make it Private
                        </h3>
                        <p class="text-xl text-center leading-8 font-sans">Your people. Your dates.</p>
                        <div class="w-full flex justify-center">
                            <div class="h-10 w-[2px] bg-primary"></div>
                        </div>
                        <div class="w-full flex justify-center">
                            <a href="/" class="text-center text-primary font-medium">Plan your private trip <i
                                    class=" fa-solid fa-caret-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-[70px] bg-cover bg-center bg-no-repeat h-[800px] md:h-[1200px] lg:h-[1600px] relative"
    style="background-image:url('https://www.classicjourneys.com/wp-content/uploads/2024/06/Fuel-Your-Soul-Photo-375x358.jpg')">
    <div class="absolute top-0 left-0 right-0 bottom-0 bg-gradient-to-b from-white to-transparent ">
    </div>
    <div class="container relative">
        <h2 class="section-heading">
            Fuel your soul. One step at a time.
        </h2>
        <p class="text-center lg:text-xl md:px-8 lg:px-15">We believe that travel—and in particular connecting with
            other people
            and
            cultures
            when
            you travel—fuels your soul in a way that very few things do. So, through our relationships with
            well-connected local guides, we introduce you to the most memorable experiences and interesting
            people—artisans, winemakers, hoteliers, chefs, naturalists, and more. And, with this extended family, we
            handcraft Cultural Walking Adventures that empower you to see the world, on foot and at eye level. Want to
            join us?</p>
    </div>
</section>

<section class="py-[70px]">
    <div class="container">
        <div class="pb-[45px] flex flex-wrap gap-2 justify-between items-end">
            <h2 class="text-2xl md:text-3xl lg:text-5xl  font-mencken lg:leading-12">
                Explore Classic Journeys Blog
            </h2>

            <a href="/" class="text-center text-primary ffont-medium">View All Destinations <i
                    class="fa-solid fa-caret-right"></i></a>

        </div>
        <div class="grid lg:grid-cols-2 gap-8">
            <div class="flex flex-col">
                <img src="https://www.classicjourneys.com/wp-content/uploads/2019/09/Iceland-Image-couple-260x146.jpg"
                    alt="blogs" class="h-full w-full object-cover flex-1" />
                <div class="py-4">
                    <p class="text-sm font-sans">
                        Travel Tips
                    </p>
                    <h3 class="text-2xl font-medium font-sans leading-8">
                        The Group Trip for People Who Hate Group Trips
                    </h3>
                </div>
            </div>
            <div class="pl-8">
                <div class="py-8 border-t">
                    <a href="">
                        <p class="text-sm font-sans">
                            Travel Tips
                        </p>
                        <h3 class="text-2xl font-medium font-sans leading-8">
                            Experience Stonehenge the Classic Journeys Way
                        </h3>
                    </a>
                </div>
                <div class="py-8 border-t">
                    <a href="">
                        <p class="text-sm font-sans">
                            Travel Tips
                        </p>
                        <h3 class="text-2xl font-medium font-sans leading-8">
                            The Best Hikes in Zion National Park, Bryce Canyon, & The Grand Canyon
                        </h3>
                    </a>
                </div>
                <div class="py-8 border-t">
                    <a href="">
                        <p class="text-sm font-sans">
                            Travel Tips
                        </p>
                        <h3 class="text-2xl font-medium font-sans">
                            Top 5 Things To See, Eat, and Drink while in Reykjavik, Iceland
                        </h3>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-[70px]">
    <div class="container">
        <div class="pb-[45px] flex flex-wrap gap-2 justify-between items-end">
            <h2 class="text-2xl md:text-3xl lg:text-5xl  font-mencken lg:leading-12">
                Share Your Travels

            </h2>
            <a href="/" class="text-center text-primary ffont-medium uppercase">View Our Instagram <i
                    class="fa-solid fa-caret-right"></i></a>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-8">
            <div>
                <img src="https://www.classicjourneys.com/wp-content/uploads/2021/06/instagram_1-150x150.jpg"
                    alt="blogs" class="h-[120px] w-full object-cover" />
            </div>
            <div>
                <img src="https://www.classicjourneys.com/wp-content/uploads/2021/06/instagram_2-184x184.jpg"
                    alt="blogs" class="h-[120px] w-full object-cover" />
            </div>
            <div>
                <img src="https://www.classicjourneys.com/wp-content/uploads/2021/06/instagram_3-150x150.jpg"
                    alt="blogs" class="h-[120px] w-full object-cover" />
            </div>
            <div>
                <img src="https://www.classicjourneys.com/wp-content/uploads/2021/06/instagram_4-150x150.jpg"
                    alt="blogs" class="h-[120px] w-full object-cover" />
            </div>
            <div>
                <img src="https://www.classicjourneys.com/wp-content/uploads/2021/06/instagram_5-150x150.jpg"
                    alt="blogs" class="h-[120px] w-full object-cover" />
            </div>
            <div>
                <img src="https://www.classicjourneys.com/wp-content/uploads/2021/06/instagram_6-150x150.jpg"
                    alt="blogs" class="h-[120px] w-full object-cover" />
            </div>
            <div>
                <img src="https://www.classicjourneys.com/wp-content/uploads/2021/06/instagram_7-150x150.jpg"
                    alt="blogs" class="h-[120px] w-full object-cover" />
            </div>
            <div>
                <img src="https://www.classicjourneys.com/wp-content/uploads/2021/07/dancing-home-300x298.jpg"
                    alt="blogs" class="h-[120px] w-full object-cover" />
            </div>
        </div>
    </div>

</section>
@endsection