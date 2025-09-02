@extends('layouts.app')

@section('title', "Travelstride - The new way to explore the world's wonders")

@section('content')
<!-- Hero Section with single background video and overlay -->
<section class="relative h-[100vh] flex items-center justify-center overflow-hidden">
    <!-- Background Video -->
    <video autoplay loop muted playsinline poster="/videos/heroimage.jpg"
        class="absolute inset-0 top-0 left-0 right-0 bottom-0 w-full h-full object-cover z-0 transition-all duration-700">
        <source src="/videos/hero.webm" type="video/webm">
        Your browser does not support the video tag.
    </video>
    <div class="absolute inset-0 bg-black/50 z-10"></div>
    <!-- Search Bar at Top Left -->
    <!-- <div class="absolute top-8 left-8 z-20">
        
    </div> -->
    <!-- Centered Content -->
    <div class="relative z-20 max-w-7xl px-2 sm:px-6 md:px-8 mx-auto flex flex-col items-center justify-center h-full">
        <!-- Design my trip button -->
        <button class="btn-primary text-lg px-8 py-4 mb-8 shadow-lg">Design my trip</button>
        <!-- Headline -->
        <h1 class="text-3xl md:text-5xl font-bold text-white text-center mb-2 drop-shadow-lg">The new way to explore the
            world's <span class="block">wonders</span></h1>
    </div>
</section>
<section class="bg-black  ">
    <div class="pt-[1rem] max-w-7xl px-2 sm:px-6 md:px-8 mx-auto">
        <h3 class="text-white text-center text-2xl font-bold pb-[45px]">
            Choose your travel style
        </h3>
        <div class="-mb-[118px] relative">
            <div class="swiper-container  overflow-hidden">
                <div class="swiper-wrapper">
                    <div class="swiper-slide relative slider-custom mr-[20px] px-[10px] py-[20px] group cursor-pointer "
                        data-swiper-slide-index="0">
                        <a aria-label="Guided Group" class="px-[10px] py-[20px] block absolute top-0 left-0 right-0 "
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 01 engagement"
                            data-gtm-label="Trip Type Carousel / Card Click / Guided Group"
                            href="/trip-list/guided-group">
                            <p class="text-lg font-bold text-white uppercase">
                                Guided Group
                            </p>
                            <div class="-z-1 rounded-sm overflow-hidden block absolute top-0 left-0 right-0">
                                <img alt="" loading="lazy" class="w-[270px] h-[388px] object-cover transition-transform
                                    transform-gpu duration-300 group-hover:scale-105" decoding="async" data-nimg="1"
                                    src="/images/home/style-1.jpg" />
                                <div class="absolute left-0 right-0 bottom-0  text-center p-4"
                                    style="background-color: #ff7e8c">
                                    <div class="max-h-[45px]  flex justify-center">
                                        <img
                                            src="https://static.travelstride.com/store/home_page_top_category_card_icon/5404088/attachment/b227ce0d135193b04e12e5ebf789bb8d.png" />
                                    </div>
                                    <div class="text-base text-white h-0 group-hover:h-auto overflow-hidden">
                                        Groups of 25-60 provide flexibility, savings up to
                                        40%, and often include meals and optional
                                        activities.
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide relative slider-custom mr-[20px] px-[10px] py-[20px] group cursor-pointer"
                        data-swiper-slide-index="1">
                        <a aria-label="Custom" class="px-[10px] py-[20px] block absolute top-0 left-0 right-0 "
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 01 engagement"
                            data-gtm-label="Trip Type Carousel / Card Click / Custom" href="/trip-list/custom">
                            <p class="text-lg font-bold text-white uppercase">
                                Custom
                            </p>
                            <div class="-z-1 rounded-sm overflow-hidden block absolute top-0 left-0 right-0">
                                <img alt="" loading="lazy" class="w-[270px] h-[388px] object-cover transition-transform
                                    transform-gpu duration-300 group-hover:scale-105" decoding="async" data-nimg="1"
                                    src="/images/home/style-2.jpg" />
                                <div class="absolute left-0 right-0 bottom-0  text-center p-4"
                                    style="background-color: #ffca00">
                                    <div class="max-h-[45px] flex justify-center">
                                        <img
                                            src="https://static.travelstride.com/store/home_page_top_category_card_icon/5404094/attachment/39700d7f571d050cd47c0ac6ef29011c.svg" />
                                    </div>
                                    <div class="text-base text-white h-0 group-hover:h-auto overflow-hidden">
                                        Craft your ideal journey with tailored Custom
                                        Trips, designed to your preferences.
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide relative slider-custom mr-[20px] px-[10px] py-[20px] group cursor-pointer"
                        data-swiper-slide-index="2">
                        <a aria-label="Small Ship &amp; Expedition Cruises"
                            class="px-[10px] py-[20px] block absolute top-0 left-0 right-0 "
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 01 engagement"
                            data-gtm-label="Trip Type Carousel / Card Click / Small Ship &amp; Expedition Cruises"
                            href="/trip-list/small-ship-expedition-cruises">
                            <p class="text-lg font-bold text-white uppercase">
                                Small Ship &amp; Expedition Cruises
                            </p>
                            <div class="-z-1 rounded-sm overflow-hidden block absolute top-0 left-0 right-0">
                                <img alt="" loading="lazy" class="w-[270px] h-[388px] object-cover transition-transform
                                    transform-gpu duration-300 group-hover:scale-105" decoding="async" data-nimg="1"
                                    src="/images/home/style-3.jpg" />
                                <div class="absolute left-0 right-0 bottom-0  text-center p-4"
                                    style="background-color: #094d92">
                                    <div class="max-h-[45px] flex justify-center">
                                        <img
                                            src="https://static.travelstride.com/store/home_page_top_category_card_icon/5404097/attachment/1870fc47efd55d7b72eea9f1dd08d3f8.svg" />
                                    </div>
                                    <div class="text-base text-white h-0 group-hover:h-auto overflow-hidden">
                                        Intimate, experience-focused small ship cruises
                                        offer diverse options from budget to luxury.
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide relative slider-custom mr-[20px] px-[10px] py-[20px] group cursor-pointer"
                        data-swiper-slide-index="3">
                        <a aria-label="Adventure" class="px-[10px] py-[20px] block absolute top-0 left-0 right-0 "
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 01 engagement"
                            data-gtm-label="Trip Type Carousel / Card Click / Adventure" href="/trip-list/adventure">
                            <p class="text-lg font-bold text-white uppercase">
                                Adventure
                            </p>
                            <div class="-z-1 rounded-sm overflow-hidden block absolute top-0 left-0 right-0">
                                <img alt="" loading="lazy" class="w-[270px] h-[388px] object-cover transition-transform
                                    transform-gpu duration-300 group-hover:scale-105" decoding="async" data-nimg="1"
                                    src="/images/home/style-4.jpg" />
                                <div class="absolute left-0 right-0 bottom-0  text-center p-4"
                                    style="background-color: #986e00">
                                    <div class="max-h-[45px] flex justify-center">
                                        <img
                                            src="https://static.travelstride.com/store/home_page_top_category_card_icon/5404139/attachment/fde6d677c44f4abe44c3af29023b01f0.svg" />
                                    </div>
                                    <div class="text-base text-white h-0 group-hover:h-auto overflow-hidden">
                                        Adventure trips cater to active travelers seeking
                                        thrilling experiences and exploration.
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide relative slider-custom mr-[20px] px-[10px] py-[20px] group cursor-pointer"
                        data-swiper-slide-index="4">
                        <a aria-label="Self-Guided &amp; Independent"
                            class="px-[10px] py-[20px] block absolute top-0 left-0 right-0 "
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 01 engagement"
                            data-gtm-label="Trip Type Carousel / Card Click / Self-Guided &amp; Independent"
                            href="/trip-list/self-guided-independent">
                            <p class="text-lg font-bold text-white uppercase">
                                Self-Guided &amp; Independent
                            </p>
                            <div class="-z-1 rounded-sm overflow-hidden block absolute top-0 left-0 right-0">
                                <img alt="" loading="lazy" class="w-[270px] h-[388px] object-cover transition-transform
                                    transform-gpu duration-300 group-hover:scale-105" decoding="async" data-nimg="1"
                                    src="/images/home/style-5.jpg" />
                                <div class="absolute left-0 right-0 bottom-0  text-center p-4"
                                    style="background-color: #7a28cb">
                                    <div class="max-h-[45px] flex justify-center">
                                        <img
                                            src="https://static.travelstride.com/store/home_page_top_category_card_icon/5404141/attachment/e4ccae67e69c87b3a0f38a24cbed96d4.svg" />
                                    </div>
                                    <div class="text-base text-white h-0 group-hover:h-auto overflow-hidden">
                                        A travel company plans your itinerary, logistics,
                                        lodging, and activities, providing 90% of a guided
                                        tour&#x27;s benefits without the guide.
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide relative slider-custom mr-[20px] px-[10px] py-[20px] group cursor-pointer"
                        data-swiper-slide-index="5">
                        <a aria-label="Small Group" class="px-[10px] py-[20px] block absolute top-0 left-0 right-0 "
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 01 engagement"
                            data-gtm-label="Trip Type Carousel / Card Click / Small Group"
                            href="/trip-list/small-group">
                            <p class="text-lg font-bold text-white uppercase">
                                Small Group
                            </p>
                            <div class="-z-1 rounded-sm overflow-hidden block absolute top-0 left-0 right-0">
                                <img alt="" loading="lazy" class="w-[270px] h-[388px] object-cover transition-transform
                                    transform-gpu duration-300 group-hover:scale-105" decoding="async" data-nimg="1"
                                    src="/images/home/style-6.jpg" />
                                <div class="absolute left-0 right-0 bottom-0  text-center p-4"
                                    style="background-color: #d84555">
                                    <div class="max-h-[45px] flex justify-center">
                                        <img
                                            src="https://static.travelstride.com/store/home_page_top_category_card_icon/5404143/attachment/59123ee3b47c7814fd2067524eea74ab.svg" />
                                    </div>
                                    <div class="text-base text-white h-0 group-hover:h-auto overflow-hidden">
                                        Choose intimate small-group travel (10-24) for
                                        personalized experiences and service.
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide relative slider-custom mr-[20px] px-[10px] py-[20px] group  cursor-pointer"
                        data-swiper-slide-index="6">
                        <a aria-label="River Cruises" class="px-[10px] py-[20px] block absolute top-0 left-0 right-0"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 01 engagement"
                            data-gtm-label="Trip Type Carousel / Card Click / River Cruises"
                            href="/trip-list/river-cruises">
                            <p class="text-lg font-bold text-white uppercase">
                                River Cruises
                            </p>
                            <div class="-z-1 rounded-sm overflow-hidden block absolute top-0 left-0 right-0">
                                <img alt="" loading="lazy" class="w-[270px] h-[388px] object-cover transition-transform
                                    transform-gpu duration-300 group-hover:scale-105" decoding="async" data-nimg="1"
                                    src="/images/home/style-7.jpg" />
                                <div class="absolute left-0 right-0 bottom-0  text-center p-4"
                                    style="background-color: #57c4e5">
                                    <div class="max-h-[45px] flex justify-center">
                                        <img
                                            src="https://static.travelstride.com/store/home_page_top_category_card_icon/5404145/attachment/d46ef2bf4b27352740d5b283ac9a2409.svg" />
                                    </div>
                                    <div class="text-base text-white h-0 group-hover:h-auto overflow-hidden">
                                        Unpack once and explore cities on scenic river
                                        cruises, ranging from budget-friendly to luxurious
                                        experiences.
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide relative slider-custom mr-[20px] px-[10px] py-[20px] group cursor-pointer "
                        data-swiper-slide-index="7">
                        <a aria-label="Private Guided" class="px-[10px] py-[20px] block absolute top-0 left-0 right-0"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 01 engagement"
                            data-gtm-label="Trip Type Carousel / Card Click / Private Guided"
                            href="/trip-list/private-guided">
                            <p class="text-lg font-bold text-white uppercase">
                                Private Guided
                            </p>
                            <div class="-z-1 rounded-sm overflow-hidden block absolute top-0 left-0 right-0">
                                <img alt="" loading="lazy" class="w-[270px] h-[388px] object-cover transition-transform
                                    transform-gpu duration-300 group-hover:scale-105" decoding="async" data-nimg="1"
                                    src="/images/home/style-8.jpg" />
                                <div class="absolute left-0 right-0 bottom-0  text-center p-4"
                                    style="background-color: #ff6f59">
                                    <div class="max-h-[45px] flex justify-center">
                                        <img
                                            src="https://static.travelstride.com/store/home_page_top_category_card_icon/5404147/attachment/d57a151c5dffd339537db122c8b5f946.svg" />
                                    </div>
                                    <div class="text-base text-white h-0 group-hover:h-auto overflow-hidden">
                                        Private tours offer exclusive guide attention,
                                        special access, and unique experiences, ideal for
                                        families or small groups, albeit at a higher cost.
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide relative slider-custom mr-[20px] px-[10px] py-[20px] group cursor-pointer"
                        data-swiper-slide-index="0">
                        <a aria-label="Guided Group" class="px-[10px] py-[20px] block absolute top-0 left-0 right-0 "
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 01 engagement"
                            data-gtm-label="Trip Type Carousel / Card Click / Guided Group"
                            href="/trip-list/guided-group">
                            <p class="text-lg font-bold text-white uppercase">
                                Guided Group
                            </p>
                            <div class="-z-1 rounded-sm overflow-hidden block absolute top-0 left-0 right-0">
                                <img alt="" loading="lazy" class="w-[270px] h-[388px] object-cover transition-transform
                                    transform-gpu duration-300 group-hover:scale-105" decoding="async" data-nimg="1"
                                    src="/images/home/style-1.jpg" />
                                <div class="absolute left-0 right-0 bottom-0  text-center p-4"
                                    style="background-color: #ff7e8c">
                                    <div class="max-h-[45px] flex justify-center">
                                        <img
                                            src="https://static.travelstride.com/store/home_page_top_category_card_icon/5404088/attachment/b227ce0d135193b04e12e5ebf789bb8d.png" />
                                    </div>
                                    <div class="text-base text-white h-0 group-hover:h-auto overflow-hidden">
                                        Groups of 25-60 provide flexibility, savings up to
                                        40%, and often include meals and optional
                                        activities.
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide relative slider-custom mr-[20px] px-[10px] py-[20px] group cursor-pointer"
                        data-swiper-slide-index="1">
                        <a aria-label="Custom" class="px-[10px] py-[20px] block absolute top-0 left-0 right-0 "
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 01 engagement"
                            data-gtm-label="Trip Type Carousel / Card Click / Custom" href="/trip-list/custom">
                            <p class="text-lg font-bold text-white uppercase">
                                Custom
                            </p>
                            <div class="-z-1 rounded-sm overflow-hidden block absolute top-0 left-0 right-0">
                                <img alt="" loading="lazy" class="w-[270px] h-[388px] object-cover transition-transform
                                    transform-gpu duration-300 group-hover:scale-105" decoding="async" data-nimg="1"
                                    src="/images/home/style-2.jpg" />
                                <div class="absolute left-0 right-0 bottom-0  text-center p-4"
                                    style="background-color: #ffca00">
                                    <div class="max-h-[45px] flex justify-center">
                                        <img
                                            src="https://static.travelstride.com/store/home_page_top_category_card_icon/5404094/attachment/39700d7f571d050cd47c0ac6ef29011c.svg" />
                                    </div>
                                    <div class="text-base text-white h-0 group-hover:h-auto overflow-hidden">
                                        Craft your ideal journey with tailored Custom
                                        Trips, designed to your preferences.
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide relative slider-custom mr-[20px] px-[10px] py-[20px] group cursor-pointer"
                        data-swiper-slide-index="2">
                        <a aria-label="Small Ship &amp; Expedition Cruises"
                            class="px-[10px] py-[20px] block absolute top-0 left-0 right-0 "
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 01 engagement"
                            data-gtm-label="Trip Type Carousel / Card Click / Small Ship &amp; Expedition Cruises"
                            href="/trip-list/small-ship-expedition-cruises">
                            <p class="text-lg font-bold text-white uppercase">
                                Small Ship &amp; Expedition Cruises
                            </p>
                            <div class="-z-1 rounded-sm overflow-hidden block absolute top-0 left-0 right-0">
                                <img alt="" loading="lazy" class="w-[270px] h-[388px] object-cover transition-transform
                                    transform-gpu duration-300 group-hover:scale-105" decoding="async" data-nimg="1"
                                    src="/images/home/style-3.jpg" />
                                <div class="absolute left-0 right-0 bottom-0  text-center p-4"
                                    style="background-color: #094d92">
                                    <div class="max-h-[45px] flex justify-center">
                                        <img
                                            src="https://static.travelstride.com/store/home_page_top_category_card_icon/5404097/attachment/1870fc47efd55d7b72eea9f1dd08d3f8.svg" />
                                    </div>
                                    <div class="text-base text-white h-0 group-hover:h-auto overflow-hidden">
                                        Intimate, experience-focused small ship cruises
                                        offer diverse options from budget to luxury.
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide relative slider-custom mr-[20px] px-[10px] py-[20px] group cursor-pointer"
                        data-swiper-slide-index="3">
                        <a aria-label="Adventure" class="px-[10px] py-[20px] block absolute top-0 left-0 right-0 "
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 01 engagement"
                            data-gtm-label="Trip Type Carousel / Card Click / Adventure" href="/trip-list/adventure">
                            <p class="text-lg font-bold text-white uppercase">
                                Adventure
                            </p>
                            <div class="-z-1 rounded-sm overflow-hidden block absolute top-0 left-0 right-0">
                                <img alt="" loading="lazy" class="w-[270px] h-[388px] object-cover transition-transform
                                transform-gpu duration-300 group-hover:scale-105" decoding="async" data-nimg="1"
                                    src="/images/home/style-4.jpg" />
                                <div class="absolute left-0 right-0 bottom-0  text-center p-4"
                                    style="background-color: #986e00">
                                    <div class="max-h-[45px] flex justify-center">
                                        <img
                                            src="https://static.travelstride.com/store/home_page_top_category_card_icon/5404139/attachment/fde6d677c44f4abe44c3af29023b01f0.svg" />
                                    </div>
                                    <div class="text-base text-white h-0 group-hover:h-auto overflow-hidden">
                                        Adventure trips cater to active travelers seeking
                                        thrilling experiences and exploration.
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide relative slider-custom mr-[20px] px-[10px] py-[20px] group cursor-pointer"
                        data-swiper-slide-index="4">
                        <a aria-label="Self-Guided &amp; Independent"
                            class="px-[10px] py-[20px] block absolute top-0 left-0 right-0 "
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 01 engagement"
                            data-gtm-label="Trip Type Carousel / Card Click / Self-Guided &amp; Independent"
                            href="/trip-list/self-guided-independent">
                            <p class="text-lg font-bold text-white uppercase">
                                Self-Guided &amp; Independent
                            </p>
                            <div class="-z-1 rounded-sm overflow-hidden block absolute top-0 left-0 right-0">
                                <img alt="" loading="lazy" class="w-[270px] h-[388px] object-cover transition-transform
                                    transform-gpu duration-300 group-hover:scale-105" decoding="async" data-nimg="1"
                                    src="/images/home/style-5.jpg" />
                                <div class="absolute left-0 right-0 bottom-0  text-center p-4"
                                    style="background-color: #7a28cb">
                                    <div class="max-h-[45px] flex justify-center">
                                        <img
                                            src="https://static.travelstride.com/store/home_page_top_category_card_icon/5404141/attachment/e4ccae67e69c87b3a0f38a24cbed96d4.svg" />
                                    </div>
                                    <div class="text-base text-white h-0 group-hover:h-auto overflow-hidden">
                                        A travel company plans your itinerary, logistics,
                                        lodging, and activities, providing 90% of a guided
                                        tour&#x27;s benefits without the guide.
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide relative slider-custom mr-[20px] px-[10px] py-[20px] group cursor-pointer"
                        data-swiper-slide-index="5">
                        <a aria-label="Small Group" class="px-[10px] py-[20px] block absolute top-0 left-0 right-0 "
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 01 engagement"
                            data-gtm-label="Trip Type Carousel / Card Click / Small Group"
                            href="/trip-list/small-group">
                            <p class="text-lg font-bold text-white uppercase">
                                Small Group
                            </p>
                            <div class="-z-1 rounded-sm overflow-hidden block absolute top-0 left-0 right-0">
                                <img alt="" loading="lazy"
                                    class="w-[270px] h-[388px] object-cover transition-transform transform-gpu duration-300 group-hover:scale-105"
                                    decoding="async" data-nimg="1" src="/images/home/style-6.jpg" />
                                <div class="absolute left-0 right-0 bottom-0  text-center p-4"
                                    style="background-color: #d84555">
                                    <div class="max-h-[45px] flex justify-center">
                                        <img
                                            src="https://static.travelstride.com/store/home_page_top_category_card_icon/5404143/attachment/59123ee3b47c7814fd2067524eea74ab.svg" />
                                    </div>
                                    <div class="text-base text-white h-0 group-hover:h-auto overflow-hidden">
                                        Choose intimate small-group travel (10-24) for
                                        personalized experiences and service.
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide relative slider-custom mr-[20px] px-[10px] py-[20px] group cursor-pointer"
                        data-swiper-slide-index="6">
                        <a aria-label="River Cruises" class="px-[10px] py-[20px] block absolute top-0 left-0 right-0 "
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 01 engagement"
                            data-gtm-label="Trip Type Carousel / Card Click / River Cruises"
                            href="/trip-list/river-cruises">
                            <p class="text-lg font-bold text-white uppercase">
                                River Cruises
                            </p>
                            <div class="-z-1 rounded-sm overflow-hidden block absolute top-0 left-0 right-0">
                                <img alt="" loading="lazy" class="w-[270px] h-[388px] object-cover transition-transform
                                    transform-gpu duration-300 group-hover:scale-105" decoding="async" data-nimg="1"
                                    src="/images/home/style-7.jpg" />
                                <div class="absolute left-0 right-0 bottom-0  text-center p-4"
                                    style="background-color: #57c4e5">
                                    <div class="max-h-[45px] flex justify-center">
                                        <img
                                            src="https://static.travelstride.com/store/home_page_top_category_card_icon/5404145/attachment/d46ef2bf4b27352740d5b283ac9a2409.svg" />
                                    </div>
                                    <div class="text-base text-white h-0 group-hover:h-auto overflow-hidden">
                                        Unpack once and explore cities on scenic river
                                        cruises, ranging from budget-friendly to luxurious
                                        experiences.
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide relative slider-custom mr-[20px] px-[10px] py-[20px] group cursor-pointer"
                        data-swiper-slide-index="7">
                        <a aria-label="Private Guided" class="px-[10px] py-[20px] block absolute top-0 left-0 right-0"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 01 engagement"
                            data-gtm-label="Trip Type Carousel / Card Click / Private Guided"
                            href="/trip-list/private-guided">
                            <p class="text-lg font-bold text-white uppercase">
                                Private Guided
                            </p>
                            <div class="-z-1 rounded-sm overflow-hidden block absolute top-0 left-0 right-0">
                                <img alt="" loading="lazy" class="w-[270px] h-[388px] object-cover transition-transform
                                    transform-gpu duration-300 group-hover:scale-105" decoding="async" data-nimg="1"
                                    src="/images/home/style-8.jpg" />
                                <div class="absolute left-0 right-0 bottom-0  text-center p-4"
                                    style="background-color: #ff6f59">
                                    <div class="max-h-[45px] flex justify-center">
                                        <img
                                            src="https://static.travelstride.com/store/home_page_top_category_card_icon/5404147/attachment/d57a151c5dffd339537db122c8b5f946.svg" />
                                    </div>
                                    <div class="text-base text-white h-0 group-hover:h-auto overflow-hidden">
                                        Private tours offer exclusive guide attention,
                                        special access, and unique experiences, ideal for
                                        families or small groups, albeit at a higher cost.
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide relative slider-custom mr-[20px] px-[10px] py-[20px] group cursor-pointer"
                        data-swiper-slide-index="0">
                        <a aria-label="Guided Group" class="px-[10px] py-[20px] block absolute top-0 left-0 right-0 "
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 01 engagement"
                            data-gtm-label="Trip Type Carousel / Card Click / Guided Group"
                            href="/trip-list/guided-group">
                            <p class="text-lg font-bold text-white uppercase">
                                Guided Group
                            </p>
                            <div class="-z-1 rounded-sm overflow-hidden block absolute top-0 left-0 right-0">
                                <img alt="" loading="lazy" class="w-[270px] h-[388px] object-cover transition-transform
                                    transform-gpu duration-300 group-hover:scale-105" decoding="async" data-nimg="1"
                                    src="/images/home/style-1.jpg" />
                                <div class="absolute left-0 right-0 bottom-0  text-center p-4"
                                    style="background-color: #ff7e8c">
                                    <div class="max-h-[45px] flex justify-center">
                                        <img
                                            src="https://static.travelstride.com/store/home_page_top_category_card_icon/5404088/attachment/b227ce0d135193b04e12e5ebf789bb8d.png" />
                                    </div>
                                    <div class="text-base text-white h-0 group-hover:h-auto overflow-hidden">
                                        Groups of 25-60 provide flexibility, savings up to
                                        40%, and often include meals and optional
                                        activities.
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide relative slider-custom mr-[20px] px-[10px] py-[20px] group  cursor-pointer"
                        data-swiper-slide-index="1">
                        <a aria-label="Custom" class="px-[10px] py-[20px] block absolute top-0 left-0 right-0"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 01 engagement"
                            data-gtm-label="Trip Type Carousel / Card Click / Custom" href="/trip-list/custom">
                            <p class="text-lg font-bold text-white uppercase">
                                Custom
                            </p>
                            <div class="-z-1 rounded-sm overflow-hidden block absolute top-0 left-0 right-0">
                                <img alt="" loading="lazy" class="w-[270px] h-[388px] object-cover transition-transform
                                    transform-gpu duration-300 group-hover:scale-105" decoding="async" data-nimg="1"
                                    src="/images/home/style-2.jpg" />
                                <div class="absolute left-0 right-0 bottom-0  text-center p-4"
                                    style="background-color: #ffca00">
                                    <div class="max-h-[45px] flex justify-center">
                                        <img
                                            src="https://static.travelstride.com/store/home_page_top_category_card_icon/5404094/attachment/39700d7f571d050cd47c0ac6ef29011c.svg" />
                                    </div>
                                    <div class="text-base text-white h-0 group-hover:h-auto overflow-hidden">
                                        Craft your ideal journey with tailored Custom
                                        Trips, designed to your preferences.
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide relative slider-custom mr-[20px] px-[10px] py-[20px] group cursor-pointer"
                        data-swiper-slide-index="2">
                        <a aria-label="Small Ship &amp; Expedition Cruises"
                            class="px-[10px] py-[20px] block absolute top-0 left-0 right-0 "
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 01 engagement"
                            data-gtm-label="Trip Type Carousel / Card Click / Small Ship &amp; Expedition Cruises"
                            href="/trip-list/small-ship-expedition-cruises">
                            <p class="text-lg font-bold text-white uppercase">
                                Small Ship &amp; Expedition Cruises
                            </p>
                            <div class="-z-1 rounded-sm overflow-hidden block absolute top-0 left-0 right-0">
                                <img alt="" loading="lazy" class="w-[270px] h-[388px] object-cover transition-transform
                                    transform-gpu duration-300 group-hover:scale-105" decoding="async" data-nimg="1"
                                    src="/images/home/style-3.jpg" />
                                <div class="absolute left-0 right-0 bottom-0  text-center p-4"
                                    style="background-color: #094d92">
                                    <div class="max-h-[45px] flex justify-center">
                                        <img
                                            src="https://static.travelstride.com/store/home_page_top_category_card_icon/5404097/attachment/1870fc47efd55d7b72eea9f1dd08d3f8.svg" />
                                    </div>
                                    <div class="text-base text-white h-0 group-hover:h-auto overflow-hidden">
                                        Intimate, experience-focused small ship cruises
                                        offer diverse options from budget to luxury.
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide relative slider-custom mr-[20px] px-[10px] py-[20px] group cursor-pointer"
                        data-swiper-slide-index="3">
                        <a aria-label="Adventure" class="px-[10px] py-[20px] block absolute top-0 left-0 right-0 "
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 01 engagement"
                            data-gtm-label="Trip Type Carousel / Card Click / Adventure" href="/trip-list/adventure">
                            <p class="text-lg font-bold text-white uppercase">
                                Adventure
                            </p>
                            <div class="-z-1 rounded-sm overflow-hidden block absolute top-0 left-0 right-0">
                                <img alt="" loading="lazy" class="w-[270px] h-[388px] object-cover transition-transform
                                    transform-gpu duration-300 group-hover:scale-105" decoding="async" data-nimg="1"
                                    loading=" lazy" class="w-[270px] h-[388px] object-cover transition-transform
                                    transform-gpu duration-300 group-hover:scale-105" decoding="async" data-nimg="1"
                                    src="/images/home/style-4.jpg" />" />
                                <div class="absolute left-0 right-0 bottom-0  text-center p-4"
                                    style="background-color: #986e00">
                                    <div class="max-h-[45px] flex justify-center">
                                        <img
                                            src="https://static.travelstride.com/store/home_page_top_category_card_icon/5404139/attachment/fde6d677c44f4abe44c3af29023b01f0.svg" />
                                    </div>
                                    <div class="text-base text-white h-0 group-hover:h-auto overflow-hidden">
                                        Adventure trips cater to active travelers seeking
                                        thrilling experiences and exploration.
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide relative slider-custom mr-[20px] px-[10px] py-[20px] group cursor-pointer"
                        data-swiper-slide-index="4">
                        <a aria-label="Self-Guided &amp; Independent"
                            class="px-[10px] py-[20px] block absolute top-0 left-0 right-0 "
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 01 engagement"
                            data-gtm-label="Trip Type Carousel / Card Click / Self-Guided &amp; Independent"
                            href="/trip-list/self-guided-independent">
                            <p class="text-lg font-bold text-white uppercase">
                                Self-Guided &amp; Independent
                            </p>
                            <div class="-z-1 rounded-sm overflow-hidden block absolute top-0 left-0 right-0">
                                <img alt="" loading="lazy" class="w-[270px] h-[388px] object-cover transition-transform
                                    transform-gpu duration-300 group-hover:scale-105" decoding="async" data-nimg="1"
                                    loading=" lazy" class="w-[270px] h-[388px] object-cover transition-transform
                                    transform-gpu duration-300 group-hover:scale-105" decoding="async" data-nimg="1"
                                    src="/images/home/style-5.jpg" />" />
                                <div class="absolute left-0 right-0 bottom-0  text-center p-4"
                                    style="background-color: #7a28cb">
                                    <div class="max-h-[45px] flex justify-center">
                                        <img
                                            src="https://static.travelstride.com/store/home_page_top_category_card_icon/5404141/attachment/e4ccae67e69c87b3a0f38a24cbed96d4.svg" />
                                    </div>
                                    <div class="text-base text-white h-0 group-hover:h-auto overflow-hidden">
                                        A travel company plans your itinerary, logistics,
                                        lodging, and activities, providing 90% of a guided
                                        tour&#x27;s benefits without the guide.
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide relative slider-custom mr-[20px] px-[10px] py-[20px] group  cursor-pointer"
                        data-swiper-slide-index="5">
                        <a aria-label="Small Group" class="px-[10px] py-[20px] block absolute top-0 left-0 right-0"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 01 engagement"
                            data-gtm-label="Trip Type Carousel / Card Click / Small Group"
                            href="/trip-list/small-group">
                            <p class="text-lg font-bold text-white uppercase">
                                Small Group
                            </p>
                            <div class="-z-1 rounded-sm overflow-hidden block absolute top-0 left-0 right-0">
                                <img alt="" loading="lazy" class="w-[270px] h-[388px] object-cover transition-transform
                                    transform-gpu duration-300 group-hover:scale-105" decoding="async" data-nimg="1"
                                    src="/images/home/style-6.jpg" />
                                <div class="absolute left-0 right-0 bottom-0  text-center p-4"
                                    style="background-color: #d84555">
                                    <div class="max-h-[45px] flex justify-center">
                                        <img
                                            src="https://static.travelstride.com/store/home_page_top_category_card_icon/5404143/attachment/59123ee3b47c7814fd2067524eea74ab.svg" />
                                    </div>
                                    <div class="text-base text-white h-0 group-hover:h-auto overflow-hidden">
                                        Choose intimate small-group travel (10-24) for
                                        personalized experiences and service.
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide relative slider-custom mr-[20px] px-[10px] py-[20px] group cursor-pointer"
                        data-swiper-slide-index="6">
                        <a aria-label="River Cruises" class="px-[10px] py-[20px] block absolute top-0 left-0 right-0 "
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 01 engagement"
                            data-gtm-label="Trip Type Carousel / Card Click / River Cruises"
                            href="/trip-list/river-cruises">
                            <p class="text-lg font-bold text-white uppercase">
                                River Cruises
                            </p>
                            <div class="-z-1 rounded-sm overflow-hidden block absolute top-0 left-0 right-0">
                                <img alt="" loading="lazy" class="w-[270px] h-[388px] object-cover transition-transform
                                    transform-gpu duration-300 group-hover:scale-105" decoding="async" data-nimg="1"
                                    src="/images/home/style-7.jpg" />
                                <div class="absolute left-0 right-0 bottom-0  text-center p-4"
                                    style="background-color: #57c4e5">
                                    <div class="max-h-[45px] flex justify-center">
                                        <img
                                            src="https://static.travelstride.com/store/home_page_top_category_card_icon/5404145/attachment/d46ef2bf4b27352740d5b283ac9a2409.svg" />
                                    </div>
                                    <div class="text-base text-white h-0 group-hover:h-auto overflow-hidden">
                                        Unpack once and explore cities on scenic river
                                        cruises, ranging from budget-friendly to luxurious
                                        experiences.
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide relative slider-custom mr-[20px] px-[10px] py-[20px] group cursor-pointer"
                        data-swiper-slide-index="7">
                        <a aria-label="Private Guided" class="px-[10px] py-[20px] block absolute top-0 left-0 right-0 "
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 01 engagement"
                            data-gtm-label="Trip Type Carousel / Card Click / Private Guided"
                            href="/trip-list/private-guided">
                            <p class="text-lg font-bold text-white uppercase">
                                Private Guided
                            </p>
                            <div class="-z-1 rounded-sm overflow-hidden block absolute top-0 left-0 right-0">
                                <img alt="" loading="lazy" class="w-[270px] h-[388px] object-cover transition-transform
                                    transform-gpu duration-300 group-hover:scale-105" decoding="async" data-nimg="1"
                                    src="/images/home/style-8.jpg" />
                                <div class="absolute left-0 right-0 bottom-0  text-center p-4"
                                    style="background-color: #ff6f59">
                                    <div class="max-h-[45px] flex justify-center">
                                        <img
                                            src="https://static.travelstride.com/store/home_page_top_category_card_icon/5404147/attachment/d57a151c5dffd339537db122c8b5f946.svg" />
                                    </div>
                                    <div class="text-base text-white h-0 group-hover:h-auto overflow-hidden">
                                        Private tours offer exclusive guide attention,
                                        special access, and unique experiences, ideal for
                                        families or small groups, albeit at a higher cost.
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <button
                class="button-prev swiper-button top-1/2 -left-15 w-[44px] h-[44px] z-10 hidden md:flex items-center justify-center bg-transparent cursor-pointer  visible absolute"
                title="Previous Slide" type="button" data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                data-gtm-action="Position 01 engagement" data-gtm-label="Trip Type Carousel / Arrow &lt;"><svg
                    viewBox="0 0 10 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.5 2.08008L1.5 20.8089L8.5 39.0801" stroke="#DADADA" stroke-width="3"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </button>
            <button
                class="button-next swiper-button top-1/2 -right-15 w-[44px] h-[44px] z-10 hidden md:flex items-center justify-center rotate-180 bg-transparent cursor-pointer  visible absolute"
                title="Next Slide" type="button" data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                data-gtm-action="Position 01 engagement" data-gtm-label="Trip Type Carousel / Arrow &gt;"><svg
                    viewBox="0 0 10 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.5 2.08008L1.5 20.8089L8.5 39.0801" stroke="#DADADA" stroke-width="3"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                </svg></button>
        </div>
    </div>
</section>
<section class="pt-[118px] bg-white">
    <div
        class="py-[65px] max-w-7xl px-2 sm:px-6 md:px-8 mx-auto flex flex-col md:flex-row items-center justify-between gap-6">
        <p class="text-slate-400 text-[10px] w-[90px]">
            Trips awarded <br class="AwardLogos_br__3f6F1" />
            and featured by:
        </p>
        <a aria-label="Logos of organizations that awarded Travelstride trips" data-gtm-category="Home Page Engagement"
            data-gtm-trigger="click" data-gtm-action="Position 02 engagement"
            data-gtm-label="Why Travelstride / Press logos" href="/press">
            <img alt="" loading="lazy" decoding="async" data-nimg="fill" class="h-[55px] w-auto object-contain"
                src="https://client.travelstride.com/app/_next/static/images/desktop-awards-logos-11044cd8df731757db98cd6067d10a16.png" /></a>
    </div>
</section>

<section class="py-[65px] bg-slate-100">
    <div class="max-w-7xl px-2 sm:px-6 md:px-8 mx-auto ">

        <h3 class="title-one text-center mb-[45px]">
            Why use Travelstride?
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="WhyUs_card__XWctn">
                <div><svg width="65" height="65" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" class="WhyUs_icon__PN1od">
                        <rect width="65" height="65" fill="url(#tap)"></rect>
                        <defs>
                            <pattern id="tap" patternContentUnits="objectBoundingBox" width="1" height="1">
                                <use xlink:href="#image0_174_19635" transform="scale(0.00195312)"></use>
                            </pattern>
                            <image id="image0_174_19635" width="512" height="512"
                                xlink:href="data:image/png;base64,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oor8rE4dlMAErD1z5l9/4BQcgsP166KO2C+aNWsW86tH89AxUVGqj5eIiIhINQ4A6F9Zc7p56anNExNjf/QsH567Y0dZU3cX0+vUwXgkoWt09Ctf2ftRDEDh+/dxS0xEyaVLRaLIIfPWrBlbxnN26OOePefM7dptztzkZNXHSUTvTmwr9/jwbgcPJsRlDcu9qEKFp4OAb79FAxEsg/bte9VgUS5Gkhx+4sTTbUKDgsz97TfY5y1ZMqayx5HQSxs2qD4+IiIiImthpzqAMpfUV/QAIM7T08szcpmXp4NDcgn7s1m3fPihtlRvkxKXNy9Wo7mcfutW/qk3+2S/eenSnN+fXegXUH0ERKSKZaCIiQAwZQoAoOSUKS1aRPzo45Mnj11be7MwFS5s90DbaLC3s9PPaCVk9r//jsvi3i887Pr11A/ES34iIiKi/4oDAHqnLI8KPP3ZmTMA+qHOmTOonPpbuqluTAt2hbUUuyNC6Ilw0AurriHKXOLjfX0XL75zB/EAcOcOAMByXxD3uiAiIiJ6bXwEgIiIiIiIiMgGcABAlJl4iXjR4e0XYSQiIiIiosyLAwAiIiIiIiIiG8ABAFEa0Atrl/WjQqjuICIiIiIiehkOAIiIiIiIiIhsAAcARERERERERDaAAwCizKSZXAYuAkhERERERP8FBwBEaUCvmlJUv8M1AIiIiIiIyHpxAEBERERERERkAzgAICIiIiIiIrIBHAAQERERERER2QAOAIjSgN0x7S/DDK4BQERERERE1osDAKLMxIil8OQuAERERERE9CIOAIiIiIiIiIhsAAcARERERERERDaAAwCiNKDX0nboZq4BQERERERE1osDACIiIiIiIiIbwAEAUWZiFGvQkYsAEhERERHRizgAICIiIiIiIrIBHAAQpQG9ZUqgoSvXACAiIiIiIuvFAQARERERERGRDeAAgIiIiIiIiMgGcABAREREREREZAM4ACBKA3aztN9kNitYA6CJXIpO3AWAiIiIiIhexAEAERERERERkQ3gAICIiIiIiIjIBnAAQERERERERGQDOAAgSgO6pxalF7GCNQCIiIiIiIheggMAoszEG0vgzkUAiYiIiIjoRRwAEBEREREREdkADgCIiIiIiIiIbAAHAERpQHZOmWn4lGsAEBERERGR9eIAgIiIiIiIiMgGcABAREREREREZAM4ACDKTNqItejMXQCIiIiIiOhFHAAQpQFDOy1cL881AIiIiIiIyHpxAEBERERERERkAzgAICIiIiIiIrIBHAAQERERERER2QAOAIjSgOwhpul1rWANgC/lEunKRQCJiIiIiOhFHAAQERERERER2QAOAIiIiIiIiIhsAAcARERERERERDaAAwCiNKAPMu8wZLOCNQCIiIiIiIheggMAIiIiIiIiIhvAAQBRZtIGEaIzdwEgIiIiIqIXcQBAREREREREZAM4ACBKA3Kc9rNswjUAiIiIiIjIenEAQERERERERGQDOAAgIiIiIiIisgEcABBlJm3FBnThIoBERERERPQiDgCI0oChrAjSvbkGABERERERWS8OAIiIiIiIiIhsAAcARERERERERDaAAwAiIiIiIiIiG8ABAFEa0CeZHxoucQ0AIiIiIiKyXhwAEGUisqFcLFtzFwAiIiIiInoRBwBERERERERENoADACIiIiIiIiIbwAEAURqQc7UBejuuAUBERERERNaLAwAiIiIiIiIiG8ABAFEmItoiXHThIoBERERERPQiDgCIiIiIiIiIbAAHAERpwKCLHoatXAOAiIiIiIisFwcARERERERERDaAAwAiIiIiIiIiG8ABABEREREREZEN4ACAKA3IReYP9K+tYA0AH4SjK3cBICIiIiKiF3EAQERERERERGQDOAAgIiIiIiIisgEcABARERERERHZAA4AiNKAHqV1lf2sYA0AIiIiIiKil+AAgCgTkfWxCS25CCAREREREb2IAwAiIiIiIiIiG8ABABEREREREZEN4ACAKA0YTggfLZxrABARERERkfXiAICIiIiIiIjIBnAAQERERERERGQDOAAgykSED8LQjbsAEBERERHRizgAIEoDMs7cQA7lGgBERERERGS9OAAgIiIiIiIisgEcABARERERERHZAA4AiIiIiIiIiGwABwBEaUBfL7z08VawBoAvwvA1FwEkIiIiIqIXcQBAREREREREZAPsVAcQURqKgD9mCgFgsOoUoldpVnL1qZ6rHR21Mnf23ArPmlVbkOM7GefgYH8tuaBwzZYt9Tf2w3iRLykp0ZBwR9569Cj/qiQf+4gnT0JEexEiEhJUHwcRERFRRsEBAFFmYnkEYDOA4apjyNa4Ho8tE+CaL5/mrF+XvWrU0AfgG7T5+GP0ltFy/ccf4yzm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">
                            </image>
                        </defs>
                    </svg></div>
                <h4 class="font-bold text-xl">
                    One click trips

                </h4>
                <p class="text-slate-500">
                    Experience the fun parts of travel without the
                    hassle of planning logistics and booking different
                    components from multiple sites
                </p>
            </div>
            <div class="WhyUs_card__XWctn">
                <div><svg width="65" height="65" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" class="WhyUs_icon__PN1od">
                        <rect width="65" height="65" fill="url(#review)"></rect>
                        <defs>
                            <pattern id="review" patternContentUnits="objectBoundingBox" width="1" height="1">
                                <use xlink:href="#image0_174_19638" transform="scale(0.00195312)"></use>
                            </pattern>
                            <image id="image0_174_19638" width="512" height="512"
                                xlink:href="data:image/png;base64,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">
                            </image>
                        </defs>
                    </svg></div>
                <h4 class="font-bold text-xl">
                    Reviewed itineraries

                </h4>
                <p class="text-slate-500">

                    Learn from real traveler reviews on expert-planned
                    trips visiting multiple destinations
                </p>
            </div>
            <div class="WhyUs_card__XWctn">
                <div><svg width="65" height="65" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" class="WhyUs_icon__PN1od">
                        <rect width="65" height="65" fill="url(#benchmarking)"></rect>
                        <defs>
                            <pattern id="benchmarking" patternContentUnits="objectBoundingBox" width="1" height="1">
                                <use xlink:href="#image0_174_19636" transform="scale(0.00195312)"></use>
                            </pattern>
                            <image id="image0_174_19636" width="512" height="512"
                                xlink:href="data:image/png;base64,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M5k0X8yUIbdvy82iuay1d29MbvdH4WFHj6qOR0S2J66mZ+Gwu+vWAVJi7fr1rq5GY0BA1aqihDZN31SvnuwiDKJunjzIh6c4YjCozkv0d4is+kl5PSFBh+YFr6tX5V6735Ovb9261t/lyur9v/8OYLDqjETvCwsAlC6tre+yb3WX339P/d3y5QAEhOpURP/CDQBADWQFUgtcRETWIHVmQGwsEBJy5EjqvztyBFMBxKrORvSP/fk5MVJ1JKIPg0sAiIiIiIiIiGwACwBERERERERENoAFACIiIiIiIiIbwAIAERERERERkQ1gAYCIiIiIiIjIBrAAQERERERERGQDWAAgIiIiIiIisgEsABARERERERHZABYAiIiIiIiIiGwACwBERERERERENoAFACIiIiIiIiIbwAIAERERERERkQ1gAYCIiIiIiIjIBrAAQERERERERGQDWAAgIiIiIiIisgEsABARERERERHZABYAiIiIiIiIiGwACwBERERERERENoAFACIiIiIiIiIbwAIAERERERERkQ1gAYCIiIiIiIjIBrAAQERERERERGQDWAAgIiIiIiIisgEsABARERERERHZABYAiIiIiIiIiGwACwBERERERERENoAFACIiIiIiIiIbwAIAERERERERkQ1gAYCIiIiIiIjIBrAAQERERERERGQDWAAgIiIiIiIisgEsABARERERERHZABYAiIiIiIiIiGyAneoA9Pe0mR0R4edctKhWS6sFlC+vFZVhMkeePLKbthrrNRZyiNKjibKFNjAxUXMWi2Xf27dNObSHWqOff44TbiJEPH6sOh4RUatWK1Z07Jg9u2OoU29D15o19buyq5iVNy+GiU36VEdH1fmI6P0Ti/T2aK3r+hXhJx7euaP/rP8MnDq1ro+3d9jdK1dU56P/jQUAK+UiIw/7HnZ1FfvxWHQfNUoE4zHKVqmCHTiU+idEaQFACBmEMarTEtEHMRyQmQEJWQvLADFHz6J/nZzsdi9yid+yDRu0PsighX77bdRqz44hO0+fVh2XiNI/l/CINT72FSpovxj6aNm/+072Rw+catlSdpXLsMzeXiD1vgUhawk+nxClT4ECqAFoSB2XaEh9GelWLtLTr9XRozgre8Ft7NgY3evzMMe4ONVx6b/xzbGVaFFi44U+Gx0d3fJEufodCwnR3HFVzIyJeTPw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">
                            </image>
                        </defs>
                    </svg></div>
                <h4 class="font-bold text-xl">
                    Compare 1,000+ brands

                </h4>
                <p class="text-slate-500">

                    Find the best trip for you, and the best prices,
                    when you search and compare all the operators and trip
                    designers in one place
                </p>
            </div>
            <div class="WhyUs_card__XWctn">
                <div><svg width="65" height="65" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" class="WhyUs_icon__PN1od">
                        <rect width="65" height="65" fill="url(#refund)"></rect>
                        <defs>
                            <pattern id="refund" patternContentUnits="objectBoundingBox" width="1" height="1">
                                <use xlink:href="#image0_174_19637" transform="scale(0.00195312)"></use>
                            </pattern>
                            <image id="image0_174_19637" width="512" height="512"
                                xlink:href="data:image/png;base64,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">
                            </image>
                        </defs>
                    </svg></div>
                <h4 class="font-bold text-xl">
                    Get up to $700 cash back

                </h4>
                <p class="text-slate-500">
                    Get a rebate up to 15% of your trip price after you
                    share your review
                </p>
            </div>
        </div>
    </div>
</section>

<section class="py-[65px] ">
    <div class="max-w-7xl px-2 sm:px-6 md:px-8 mx-auto">
        <div class=" flex flex-wrap items-center gap-2 mb-[45px]">
            <h3 class="title-one">
                Find trips that move you
            </h3>
            <a class="text-sm text-slate-400 hover:text-slate-600" href="/all-trips">See all
                <!-- -->8
                <!-- -->
                <!-- -->
                <!-- -->trips
            </a>
        </div>
        <div class="relative h-full w-full">
            <div class="swiper-container overflow-hidden">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="flex flex-col bg-white rounded-lg border border-transparent shadow-lg">
                            <div class="relative max-w-[340px]">
                                <div class=" border-tl-sm border-tr-sm w-full">
                                    <div>
                                        <a href="/trips/alma-italia-travel-the-italy-grand-tour">
                                            <img alt="The Italy Grand Tour" loading="lazy" decoding="async"
                                                data-nimg="fill" class="h-[350px] w-full object-cover"
                                                src="https://static.travelstride.com/store/main_image/3446042/attachment/a627ed27bbc846efc65eb50052367735.jpg" /></a>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex h-11 mb-2">
                                    <a class="text-black decoration-0 cursor-pointer"
                                        href="/trips/alma-italia-travel-the-italy-grand-tour">
                                        <h3 class="font-bold text-lg">
                                            The Italy Grand Tour
                                        </h3>
                                    </a>
                                </div>

                                <div class="TripCard_rates__oGXsW"></div>
                                <div class="flex text-sm mt-2 items-start">
                                    <div class="mt-0 h-4 w-4 mr-2" style="background-color: #ff6f59"></div>
                                    <span>Private Guided</span>
                                    <div class="InfoTooltip_root__HQVIN TripType_toolTipIcon__Otjfv">
                                        <div></div>
                                    </div>
                                </div>
                                <div class="min-h-auto flex flex-col mt-4 justify-between text-xl">
                                    <div class="flex items-center justify-between TripCard_alignRight__aH3m1">
                                        <span class="TripCard_old-price__mNhLN"></span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span
                                            class="typography_title-tertiary__1fatt TripCard_custom-font-size__bLYRR">13
                                            <!-- -->
                                            days
                                        </span><span class="typography_title-tertiary__1fatt TripCard_price-div__LG1gd">
                                            <span class="TripCard_from__0tcMi">From</span>$6,950</span>
                                    </div>
                                </div>
                            </div>
                            <div class="py-2 px-4 border-t border-slate-400 card-button">
                                <div class="">
                                    <button
                                        class="border-0 w-full flex items-center justify-center relative cursor-pointer text-base rounded-sm toggle-btn"><svg
                                            width="24" height="24" viewBox="0 0 24 24" fill="none" class="rotate-90"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_3130_3881)">
                                                <path
                                                    d="M12 3C10.9 3 10 3.9 10 5C10 6.1 10.9 7 12 7C13.1 7 14 6.1 14 5C14 3.9 13.1 3 12 3ZM12 17C10.9 17 10 17.9 10 19C10 20.1 10.9 21 12 21C13.1 21 14 20.1 14 19C14 17.9 13.1 17 12 17ZM12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10Z"
                                                    fill="black"></path>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_3130_3881">
                                                    <rect width="24" height="24" fill="white"></rect>
                                                </clipPath>
                                            </defs>
                                        </svg></button>
                                </div>
                            </div>
                            <div class="py-2 px-4 border-t border-slate-400 card-cus hide-btn" style="display: none;">
                                <div class=" space-y-2">
                                    <div class="flex flex-wrap justify-between items-center gap-4">
                                        <p class="text-slate-400">By Alma Italia</p>
                                        <span class="text-sm text-white bg-black py-1 px-2 rounded-sm">local
                                            Expert</span>
                                    </div>
                                    <div class="flex flex-wrap justify-between items-center gap-4">
                                        <p class="text-black">5<span class="text-slate-400 text-sm">/5</span> Excelent
                                        </p>
                                        <p class="text-sm text-slate-400 ">26 review</p>
                                        <button class="text-sm ">Hide</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="flex flex-col bg-white rounded-lg border border-transparent shadow-lg">
                            <div class="relative max-w-[340px]">
                                <div class=" border-tl-sm border-tr-sm w-full">
                                    <div>
                                        <a c href="/trips/intrepid-travel-explore-croatia">
                                            <img alt="Explore Croatia" loading="lazy" decoding="async" data-nimg="fill"
                                                class="h-[350px] w-full object-cover"
                                                src="https://static.travelstride.com/store/home_page_top_trip_image/4594997/attachment/2b9e23a8acbc0940ccdcb19568c373f9.webp" /></a>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex h-11 mb-2">
                                    <a class="text-black decoration-0 cursor-pointer"
                                        href="/trips/intrepid-travel-explore-croatia">
                                        <h3 class="font-bold text-lg">
                                            Explore Croatia
                                        </h3>
                                    </a>
                                </div>

                                <div class="TripCard_rates__oGXsW"></div>
                                <div class="flex text-sm mt-2 items-start">
                                    <div class="mt-0 h-4 w-4 mr-2" style="background-color: #d84555"></div>
                                    <span>Small Group Tour</span>
                                    <div class="InfoTooltip_root__HQVIN TripType_toolTipIcon__Otjfv">
                                        <div></div>
                                    </div>
                                </div>
                                <div class="min-h-auto flex flex-col mt-4 justify-between text-xl">
                                    <div class="flex items-center justify-between TripCard_alignRight__aH3m1">
                                        <span class="TripCard_old-price__mNhLN"></span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span
                                            class="typography_title-tertiary__1fatt TripCard_custom-font-size__bLYRR">8
                                            <!-- -->
                                            days
                                        </span><span class="typography_title-tertiary__1fatt TripCard_price-div__LG1gd">
                                            <span class="TripCard_from__0tcMi">From</span>$2,075</span>
                                    </div>
                                </div>
                            </div>
                            <div class="py-2 px-4 border-t border-slate-400 card-button">
                                <div class="">
                                    <button
                                        class="border-0 w-full flex items-center justify-center relative cursor-pointer text-base rounded-sm toggle-btn"><svg
                                            width="24" height="24" viewBox="0 0 24 24" fill="none" class="rotate-90"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_3130_3881)">
                                                <path
                                                    d="M12 3C10.9 3 10 3.9 10 5C10 6.1 10.9 7 12 7C13.1 7 14 6.1 14 5C14 3.9 13.1 3 12 3ZM12 17C10.9 17 10 17.9 10 19C10 20.1 10.9 21 12 21C13.1 21 14 20.1 14 19C14 17.9 13.1 17 12 17ZM12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10Z"
                                                    fill="black"></path>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_3130_3881">
                                                    <rect width="24" height="24" fill="white"></rect>
                                                </clipPath>
                                            </defs>
                                        </svg></button>
                                </div>
                            </div>
                            <div class="py-2 px-4 border-t border-slate-400 card-cus hide-btn" style="display: none;">
                                <div class=" space-y-2">
                                    <div class="flex flex-wrap justify-between items-center gap-4">
                                        <p class="text-slate-400">By Alma Italia</p>
                                        <span class="text-sm text-white bg-black py-1 px-2 rounded-sm">local
                                            Expert</span>
                                    </div>
                                    <div class="flex flex-wrap justify-between items-center gap-4">
                                        <p class="text-black">5<span class="text-slate-400 text-sm">/5</span> Excelent
                                        </p>
                                        <p class="text-sm text-slate-400 ">26 review</p>
                                        <button class="text-sm ">Hide</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="flex flex-col bg-white rounded-lg border border-transparent shadow-lg">
                            <div class="relative max-w-[340px]">
                                <div class=" border-tl-sm border-tr-sm w-full">
                                    <div>
                                        <a c href="/trips/exodus-travels-central-europe-castles-culture-capitals"><img
                                                alt="Central Europe: Castles, Culture &amp; Capitals" loading="lazy"
                                                decoding="async" data-nimg="fill" class="h-[350px] w-full object-cover"
                                                src="https://static.travelstride.com/store/main_image/1115240/attachment/39b69d163c6d0f96f8b455f567a80c4b.jpg" /></a>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex h-11 mb-2">
                                    <a class="text-black decoration-0 cursor-pointer"
                                        href="/trips/exodus-travels-central-europe-castles-culture-capitals">
                                        <h3 class="font-bold text-lg">
                                            Central Europe: Castles, Culture &amp; Capitals
                                        </h3>
                                    </a>
                                </div>

                                <div class="TripCard_rates__oGXsW"></div>
                                <div class="flex text-sm mt-2 items-start">
                                    <div class="mt-0 h-4 w-4 mr-2" style="background-color: #d84555"></div>
                                    <span>Small Group Tour</span>
                                    <div class="InfoTooltip_root__HQVIN TripType_toolTipIcon__Otjfv">
                                        <div></div>
                                    </div>
                                </div>
                                <div class="min-h-auto flex flex-col mt-4 justify-between text-xl">
                                    <div class="flex items-center justify-between TripCard_alignRight__aH3m1">
                                        <span class="TripCard_old-price__mNhLN"></span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span
                                            class="typography_title-tertiary__1fatt TripCard_custom-font-size__bLYRR">8
                                            <!-- -->
                                            days
                                        </span><span class="typography_title-tertiary__1fatt TripCard_price-div__LG1gd">
                                            <span class="TripCard_from__0tcMi">From</span>$3,000</span>
                                    </div>
                                </div>
                            </div>
                            <div class="py-2 px-4 border-t border-slate-400 card-button">
                                <div class="">
                                    <button
                                        class="border-0 w-full flex items-center justify-center relative cursor-pointer text-base rounded-sm toggle-btn"><svg
                                            width="24" height="24" viewBox="0 0 24 24" fill="none" class="rotate-90"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_3130_3881)">
                                                <path
                                                    d="M12 3C10.9 3 10 3.9 10 5C10 6.1 10.9 7 12 7C13.1 7 14 6.1 14 5C14 3.9 13.1 3 12 3ZM12 17C10.9 17 10 17.9 10 19C10 20.1 10.9 21 12 21C13.1 21 14 20.1 14 19C14 17.9 13.1 17 12 17ZM12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10Z"
                                                    fill="black"></path>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_3130_3881">
                                                    <rect width="24" height="24" fill="white"></rect>
                                                </clipPath>
                                            </defs>
                                        </svg></button>
                                </div>
                            </div>
                            <div class="py-2 px-4 border-t border-slate-400 card-cus hide-btn" style="display: none;">
                                <div class=" space-y-2">
                                    <div class="flex flex-wrap justify-between items-center gap-4">
                                        <p class="text-slate-400">By Alma Italia</p>
                                        <span class="text-sm text-white bg-black py-1 px-2 rounded-sm">local
                                            Expert</span>
                                    </div>
                                    <div class="flex flex-wrap justify-between items-center gap-4">
                                        <p class="text-black">5<span class="text-slate-400 text-sm">/5</span> Excelent
                                        </p>
                                        <p class="text-sm text-slate-400 ">26 review</p>
                                        <button class="text-sm ">Hide</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="flex flex-col bg-white rounded-lg border border-transparent shadow-lg">
                            <div class="relative max-w-[340px]">
                                <div class=" border-tl-sm border-tr-sm w-full">
                                    <div>
                                        <a c href="/trips/safari-365-botswana-tour"><img alt="Botswana Tour"
                                                loading="lazy" decoding="async" data-nimg="fill"
                                                class="h-[350px] w-full object-cover"
                                                src="https://static.travelstride.com/store/main_image/5348624/attachment/cfc1827743b526ed41d77ea373d18b3d.jpg" /></a>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex h-11 mb-2">
                                    <a class="text-black decoration-0 cursor-pointer"
                                        href="/trips/safari-365-botswana-tour">
                                        <h3 class="font-bold text-lg">
                                            Botswana Tour
                                        </h3>
                                    </a>
                                </div>

                                <div class="TripCard_rates__oGXsW"></div>
                                <div class="flex text-sm mt-2 items-start">
                                    <div class="mt-0 h-4 w-4 mr-2" style="background-color: #7a28cb"></div>
                                    <span>Self-Guided / Independent Tour</span>
                                    <div class="InfoTooltip_root__HQVIN TripType_toolTipIcon__Otjfv">
                                        <div></div>
                                    </div>
                                </div>
                                <div class="min-h-auto flex flex-col mt-4 justify-between text-xl">
                                    <div class="flex items-center justify-between TripCard_alignRight__aH3m1">
                                        <span class="TripCard_old-price__mNhLN"></span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span
                                            class="typography_title-tertiary__1fatt TripCard_custom-font-size__bLYRR">8
                                            <!-- -->
                                            days
                                        </span><span class="typography_title-tertiary__1fatt TripCard_price-div__LG1gd">
                                            <span class="TripCard_from__0tcMi">From</span>$3,413</span>
                                    </div>
                                </div>
                            </div>
                            <div class="py-2 px-4 border-t border-slate-400 card-button">
                                <div class="">
                                    <button
                                        class="border-0 w-full flex items-center justify-center relative cursor-pointer text-base rounded-sm toggle-btn"><svg
                                            width="24" height="24" viewBox="0 0 24 24" fill="none" class="rotate-90"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_3130_3881)">
                                                <path
                                                    d="M12 3C10.9 3 10 3.9 10 5C10 6.1 10.9 7 12 7C13.1 7 14 6.1 14 5C14 3.9 13.1 3 12 3ZM12 17C10.9 17 10 17.9 10 19C10 20.1 10.9 21 12 21C13.1 21 14 20.1 14 19C14 17.9 13.1 17 12 17ZM12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10Z"
                                                    fill="black"></path>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_3130_3881">
                                                    <rect width="24" height="24" fill="white"></rect>
                                                </clipPath>
                                            </defs>
                                        </svg></button>
                                </div>
                            </div>
                            <div class="py-2 px-4 border-t border-slate-400 card-cus hide-btn" style="display: none;">
                                <div class=" space-y-2">
                                    <div class="flex flex-wrap justify-between items-center gap-4">
                                        <p class="text-slate-400">By Alma Italia</p>
                                        <span class="text-sm text-white bg-black py-1 px-2 rounded-sm">local
                                            Expert</span>
                                    </div>
                                    <div class="flex flex-wrap justify-between items-center gap-4">
                                        <p class="text-black">5<span class="text-slate-400 text-sm">/5</span> Excelent
                                        </p>
                                        <p class="text-sm text-slate-400 ">26 review</p>
                                        <button class="text-sm ">Hide</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="flex flex-col bg-white rounded-lg border border-transparent shadow-lg">
                            <div class="relative max-w-[340px]">
                                <div class=" border-tl-sm border-tr-sm w-full">
                                    <div>
                                        <a c href="/trips/exodus-travels-treasures-of-northern-thailand"><img
                                                alt="Treasures of Northern Thailand" loading="lazy" decoding="async"
                                                data-nimg="fill" class="h-[350px] w-full object-cover"
                                                src="https://static.travelstride.com/store/home_page_top_trip_image/4595005/attachment/db56d5e773539ac59403da6cb9d4cffe.webp" /></a>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex h-11 mb-2">
                                    <a class="text-black decoration-0 cursor-pointer"
                                        href="/trips/exodus-travels-treasures-of-northern-thailand">
                                        <h3 class="font-bold text-lg">
                                            Treasures of Northern Thailand
                                        </h3>
                                    </a>
                                </div>

                                <div class="TripCard_rates__oGXsW"></div>
                                <div class="flex text-sm mt-2 items-start">
                                    <div class="mt-0 h-4 w-4 mr-2" style="background-color: #d84555"></div>
                                    <span>Small Group Tour</span>
                                    <div class="InfoTooltip_root__HQVIN TripType_toolTipIcon__Otjfv">
                                        <div></div>
                                    </div>
                                </div>
                                <div class="min-h-auto flex flex-col mt-4 justify-between text-xl">
                                    <div class="flex items-center justify-between TripCard_alignRight__aH3m1">
                                        <span class="TripCard_old-price__mNhLN"></span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span
                                            class="typography_title-tertiary__1fatt TripCard_custom-font-size__bLYRR">10
                                            <!-- -->
                                            days
                                        </span><span class="typography_title-tertiary__1fatt TripCard_price-div__LG1gd">
                                            <span class="TripCard_from__0tcMi">From</span>$2,625</span>
                                    </div>
                                </div>
                            </div>
                            <div class="py-2 px-4 border-t border-slate-400 card-button">
                                <div class="">
                                    <button
                                        class="border-0 w-full flex items-center justify-center relative cursor-pointer text-base rounded-sm toggle-btn"><svg
                                            width="24" height="24" viewBox="0 0 24 24" fill="none" class="rotate-90"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_3130_3881)">
                                                <path
                                                    d="M12 3C10.9 3 10 3.9 10 5C10 6.1 10.9 7 12 7C13.1 7 14 6.1 14 5C14 3.9 13.1 3 12 3ZM12 17C10.9 17 10 17.9 10 19C10 20.1 10.9 21 12 21C13.1 21 14 20.1 14 19C14 17.9 13.1 17 12 17ZM12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10Z"
                                                    fill="black"></path>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_3130_3881">
                                                    <rect width="24" height="24" fill="white"></rect>
                                                </clipPath>
                                            </defs>
                                        </svg></button>
                                </div>
                            </div>
                            <div class="py-2 px-4 border-t border-slate-400 card-cus hide-btn" style="display: none;">
                                <div class=" space-y-2">
                                    <div class="flex flex-wrap justify-between items-center gap-4">
                                        <p class="text-slate-400">By Alma Italia</p>
                                        <span class="text-sm text-white bg-black py-1 px-2 rounded-sm">local
                                            Expert</span>
                                    </div>
                                    <div class="flex flex-wrap justify-between items-center gap-4">
                                        <p class="text-black">5<span class="text-slate-400 text-sm">/5</span> Excelent
                                        </p>
                                        <p class="text-sm text-slate-400 ">26 review</p>
                                        <button class="text-sm ">Hide</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="flex flex-col bg-white rounded-lg border border-transparent shadow-lg">
                            <div class="relative max-w-[340px]">
                                <div class=" border-tl-sm border-tr-sm w-full">
                                    <div>
                                        <a c href="/trips/trafalgar-treasures-of-spain-and-portugal-barcelona-86976"><img
                                                alt="Treasures of Spain and Portugal (Barcelona)" loading="lazy"
                                                decoding="async" data-nimg="fill" class="h-[350px] w-full object-cover"
                                                src="https://static.travelstride.com/store/main_image/5268695/attachment/caeec1e7fecfc10048c1b7f372c700a7.jpg" /></a>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex h-11 mb-2">
                                    <a class="text-black decoration-0 cursor-pointer"
                                        href="/trips/trafalgar-treasures-of-spain-and-portugal-barcelona-86976">
                                        <h3 class="font-bold text-lg">
                                            Treasures of Spain and Portugal (Barcelona)
                                        </h3>
                                    </a>
                                </div>

                                <div class="TripCard_rates__oGXsW"></div>
                                <div class="flex text-sm mt-2 items-start">
                                    <div class="mt-0 h-4 w-4 mr-2" style="background-color: #ff7e8c"></div>
                                    <span>Group Tour</span>
                                    <div class="InfoTooltip_root__HQVIN TripType_toolTipIcon__Otjfv">
                                        <div></div>
                                    </div>
                                </div>
                                <div class="min-h-auto flex flex-col mt-4 justify-between text-xl">
                                    <div class="flex items-center justify-between TripCard_alignRight__aH3m1">
                                        <span class="TripCard_old-price__mNhLN"></span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span
                                            class="typography_title-tertiary__1fatt TripCard_custom-font-size__bLYRR">14
                                            <!-- -->
                                            days
                                        </span><span class="typography_title-tertiary__1fatt TripCard_price-div__LG1gd">
                                            <span class="TripCard_from__0tcMi">From</span>$4,495</span>
                                    </div>
                                </div>
                            </div>
                            <div class="py-2 px-4 border-t border-slate-400 card-button">
                                <div class="">
                                    <button
                                        class="border-0 w-full flex items-center justify-center relative cursor-pointer text-base rounded-sm toggle-btn"><svg
                                            width="24" height="24" viewBox="0 0 24 24" fill="none" class="rotate-90"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_3130_3881)">
                                                <path
                                                    d="M12 3C10.9 3 10 3.9 10 5C10 6.1 10.9 7 12 7C13.1 7 14 6.1 14 5C14 3.9 13.1 3 12 3ZM12 17C10.9 17 10 17.9 10 19C10 20.1 10.9 21 12 21C13.1 21 14 20.1 14 19C14 17.9 13.1 17 12 17ZM12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10Z"
                                                    fill="black"></path>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_3130_3881">
                                                    <rect width="24" height="24" fill="white"></rect>
                                                </clipPath>
                                            </defs>
                                        </svg></button>
                                </div>
                            </div>
                            <div class="py-2 px-4 border-t border-slate-400 card-cus hide-btn" style="display: none;">
                                <div class=" space-y-2">
                                    <div class="flex flex-wrap justify-between items-center gap-4">
                                        <p class="text-slate-400">By Alma Italia</p>
                                        <span class="text-sm text-white bg-black py-1 px-2 rounded-sm">local
                                            Expert</span>
                                    </div>
                                    <div class="flex flex-wrap justify-between items-center gap-4">
                                        <p class="text-black">5<span class="text-slate-400 text-sm">/5</span> Excelent
                                        </p>
                                        <p class="text-sm text-slate-400 ">26 review</p>
                                        <button class="text-sm ">Hide</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="flex flex-col bg-white rounded-lg border border-transparent shadow-lg">
                            <div class="relative max-w-[340px]">
                                <div class=" border-tl-sm border-tr-sm w-full">
                                    <div>
                                        <a c href="/trips/explore-best-of-the-american-west-76413"><img
                                                alt="Best of the American West" loading="lazy" decoding="async"
                                                data-nimg="fill" class="h-[350px] w-full object-cover"
                                                src="https://static.travelstride.com/store/home_page_top_trip_image/4595010/attachment/bff8031710be6981d7c1c71ff9438906.webp" /></a>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex h-11 mb-2">
                                    <a class="text-black decoration-0 cursor-pointer"
                                        href="/trips/explore-best-of-the-american-west-76413">
                                        <h3 class="font-bold text-lg">
                                            Best of the American West
                                        </h3>
                                    </a>
                                </div>

                                <div class="TripCard_rates__oGXsW"></div>
                                <div class="flex text-sm mt-2 items-start">
                                    <div class="mt-0 h-4 w-4 mr-2" style="background-color: #d84555"></div>
                                    <span>Small Group Tour</span>
                                    <div class="InfoTooltip_root__HQVIN TripType_toolTipIcon__Otjfv">
                                        <div></div>
                                    </div>
                                </div>
                                <div class="min-h-auto flex flex-col mt-4 justify-between text-xl">
                                    <div class="flex items-center justify-between TripCard_alignRight__aH3m1">
                                        <span class="TripCard_old-price__mNhLN"></span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span
                                            class="typography_title-tertiary__1fatt TripCard_custom-font-size__bLYRR">9
                                            <!-- -->
                                            days
                                        </span><span class="typography_title-tertiary__1fatt TripCard_price-div__LG1gd">
                                            <span class="TripCard_from__0tcMi">From</span>$2,990</span>
                                    </div>
                                </div>
                            </div>
                            <div class="py-2 px-4 border-t border-slate-400 card-button">
                                <div class="">
                                    <button
                                        class="border-0 w-full flex items-center justify-center relative cursor-pointer text-base rounded-sm toggle-btn"><svg
                                            width="24" height="24" viewBox="0 0 24 24" fill="none" class="rotate-90"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_3130_3881)">
                                                <path
                                                    d="M12 3C10.9 3 10 3.9 10 5C10 6.1 10.9 7 12 7C13.1 7 14 6.1 14 5C14 3.9 13.1 3 12 3ZM12 17C10.9 17 10 17.9 10 19C10 20.1 10.9 21 12 21C13.1 21 14 20.1 14 19C14 17.9 13.1 17 12 17ZM12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10Z"
                                                    fill="black"></path>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_3130_3881">
                                                    <rect width="24" height="24" fill="white"></rect>
                                                </clipPath>
                                            </defs>
                                        </svg></button>
                                </div>
                            </div>
                            <div class="py-2 px-4 border-t border-slate-400 card-cus hide-btn" style="display: none;">
                                <div class=" space-y-2">
                                    <div class="flex flex-wrap justify-between items-center gap-4">
                                        <p class="text-slate-400">By Alma Italia</p>
                                        <span class="text-sm text-white bg-black py-1 px-2 rounded-sm">local
                                            Expert</span>
                                    </div>
                                    <div class="flex flex-wrap justify-between items-center gap-4">
                                        <p class="text-black">5<span class="text-slate-400 text-sm">/5</span> Excelent
                                        </p>
                                        <p class="text-sm text-slate-400 ">26 review</p>
                                        <button class="text-sm ">Hide</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="flex flex-col bg-white rounded-lg border border-transparent shadow-lg">
                            <div class="relative max-w-[340px]">
                                <div class=" border-tl-sm border-tr-sm w-full">
                                    <div>
                                        <a c href="/trips/topdeck-get-social-big-southeast-asia-2024-25"><img
                                                alt="Get Social: Big Southeast Asia 2024-25" loading="lazy"
                                                decoding="async" data-nimg="fill" class="h-[350px] w-full object-cover"
                                                src="https://static.travelstride.com/store/main_image/5296062/attachment/fd158f741e550be5e2f4b4fa4c96effd.jpg" /></a>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex h-11 mb-2">
                                    <a class="text-black decoration-0 cursor-pointer"
                                        href="/trips/topdeck-get-social-big-southeast-asia-2024-25">
                                        <h3 class="font-bold text-lg">
                                            Get Social: Big Southeast Asia 2024-25
                                        </h3>
                                    </a>
                                </div>

                                <div class="TripCard_rates__oGXsW"></div>
                                <div class="flex text-sm mt-2 items-start">
                                    <div class="mt-0 h-4 w-4 mr-2" style="background-color: #ff7e8c"></div>
                                    <span>Group Tour</span>
                                    <div class="InfoTooltip_root__HQVIN TripType_toolTipIcon__Otjfv">
                                        <div></div>
                                    </div>
                                </div>
                                <div class="min-h-auto flex flex-col mt-4 justify-between text-xl">
                                    <div class="flex items-center justify-between TripCard_alignRight__aH3m1">
                                        <span class="TripCard_old-price__mNhLN"></span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span
                                            class="typography_title-tertiary__1fatt TripCard_custom-font-size__bLYRR">28
                                            <!-- -->
                                            days
                                        </span><span class="typography_title-tertiary__1fatt TripCard_price-div__LG1gd">
                                            <span class="TripCard_from__0tcMi">From</span>$2,677</span>
                                    </div>
                                </div>
                            </div>
                            <div class="py-2 px-4 border-t border-slate-400 card-button">
                                <div class="">
                                    <button
                                        class="border-0 w-full flex items-center justify-center relative cursor-pointer text-base rounded-sm toggle-btn"><svg
                                            width="24" height="24" viewBox="0 0 24 24" fill="none" class="rotate-90"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_3130_3881)">
                                                <path
                                                    d="M12 3C10.9 3 10 3.9 10 5C10 6.1 10.9 7 12 7C13.1 7 14 6.1 14 5C14 3.9 13.1 3 12 3ZM12 17C10.9 17 10 17.9 10 19C10 20.1 10.9 21 12 21C13.1 21 14 20.1 14 19C14 17.9 13.1 17 12 17ZM12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10Z"
                                                    fill="black"></path>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_3130_3881">
                                                    <rect width="24" height="24" fill="white"></rect>
                                                </clipPath>
                                            </defs>
                                        </svg></button>
                                </div>
                            </div>
                            <div class="py-2 px-4 border-t border-slate-400 card-cus hide-btn" style="display: none;">
                                <div class=" space-y-2">
                                    <div class="flex flex-wrap justify-between items-center gap-4">
                                        <p class="text-slate-400">By Alma Italia</p>
                                        <span class="text-sm text-white bg-black py-1 px-2 rounded-sm">local
                                            Expert</span>
                                    </div>
                                    <div class="flex flex-wrap justify-between items-center gap-4">
                                        <p class="text-black">5<span class="text-slate-400 text-sm">/5</span> Excelent
                                        </p>
                                        <p class="text-sm text-slate-400 ">26 review</p>
                                        <button class="text-sm ">Hide</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="swiper-button Carousel_prev-button__mtmY0 hidden md:flex" title="Previous Slide"
                type="button"></button><button class="swiper-button Carousel_next-button__qdyIp hidden md:flex"
                title="Next Slide" type="button"></button>
        </div>
    </div>
</section>



<section class="py-[65px] bg-slate-100">
    <div class="max-w-7xl px-2 sm:px-6 md:px-8 mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div>
                <div class="text-3xl font-bold">
                    Travelstride<span class="block text-7xl">Gift Card</span>
                </div>
                <div class="text-3xl py-8 font-bold text-slate-400">
                    Give an experience they will cherish and remember
                </div>
                <div class="flex items-center flex-wrap gap-6">
                    <a class="bg-[#177A68] w-[250px] py-2 text-white text-center rounded-md"
                        data-gtm-category="GiftCard CTAClick" data-gtm-trigger="click"
                        data-gtm-action="GiftCard CTAClick -&gt; Homepage"
                        data-gtm-label="GiftCard CTAClick -&gt; Homepage -&gt; Give a gift card"
                        href="/travel-gifts-card">Give a gift card</a>
                    <a class="underline text-slate-400 hover:text-600" href="/trip-list/gift-cards"
                        data-gtm-category="GiftCard CTAClick" data-gtm-trigger="click"
                        data-gtm-action="GiftCard CTAClick -&gt; Homepage"
                        data-gtm-label="GiftCard CTAClick -&gt; Homepage -&gt; Explore fantastic trips"><span>Explore
                            <span class="font-bold">fantastic trips</span> </span>
                    </a>
                </div>
            </div>
            <div>
                <img alt="Gift Card" loading="lazy" width="514" height="382" decoding="async" data-nimg="1"
                    style="color: transparent; max-width: 100%; height: auto"
                    src="https://client.travelstride.com/app/_next/static/images/gift-card-9d5ba00a2a945b1958adcc65e998b8b8.png" />
            </div>
        </div>
    </div>
</section>


<section class="overflow-hidden">
    <div class="relative">
        <video class="100vw mb-4" autoplay="" loop="" muted="" playsinline="" data-gtm-category="Home Page Engagement"
            data-gtm-trigger="click" data-gtm-action="Position 07 engagement" data-gtm-label="Video Click">
            <source src="/videos/bucket-list-video.webm" />
        </video>
        <div class="absolute bottom-20 left-20">
            <a class="btn-primary" data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                data-gtm-action="Position 07 engagement"
                data-gtm-label="Bucket List / CTA click / Create your bucket list" href="/join-d">Create your bucket
                list</a>
        </div>
    </div>
</section>

<section class="py-[65px]">
    <div class="max-w-7xl px-2 sm:px-6 md:px-8 mx-auto">
        <h3 class="title-one mb-[45px]">
            <a class="UILink_root__hOYWg UILink_secondary__l3bZs ExtraCategories_title__p8H9l"
                data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                data-gtm-action="Position 04 engagement" data-gtm-label="Find yourself far away / H1 click"
                href="https://www.travelstride.com/trip-destinationss">Find yourself far away</a>
        </h3>
        <div class="relative mb-8">
            <div class="swiper-container overflow-hidden">
                <div class="swiper-wrapper">
                    <div class="swiper-slide ExtraCategories_card__t5vXP Home_carousel-card__jejZv swiper-slide-duplicate"
                        data-swiper-slide-index="0">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs ExtraCategories_card-wrapper__jnrZQ group"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 04 engagement"
                            data-gtm-label="Find yourself far away / Card Click / Italy" href="/guide/italy-tours">
                            <div class="h-[350px] overflow-hidden">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-full group-hover:scale-105 transition-transform transform-gpu duration-300 object-cover"
                                    src="https://static.travelstride.com/store/hero_image/579860/attachment/76ce255b80ec120c5d8678a956a084be.jpg" />
                            </div>
                            <p class="text-2xl font-semibold group-hover:text-[#177A68]">
                                Italy
                            </p>
                            <p class="text-lg">
                                2073
                                <!-- -->
                                trips
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide ExtraCategories_card__t5vXP Home_carousel-card__jejZv swiper-slide-duplicate"
                        data-swiper-slide-index="1">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs ExtraCategories_card-wrapper__jnrZQ group"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 04 engagement"
                            data-gtm-label="Find yourself far away / Card Click / Vietnam" href="/guide/vietnam-tours">
                            <div class="h-[350px] overflow-hidden">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-full group-hover:scale-105 transition-transform transform-gpu duration-300 object-cover"
                                    src="https://static.travelstride.com/store/hero_image/818216/attachment/235feca8bb9cc59dcb671f25d37b8a7d.jpg" />
                            </div>
                            <p class="text-2xl font-semibold group-hover:text-[#177A68]">
                                Vietnam
                            </p>
                            <p class="text-lg group-hover:text-[#177A68]">
                                637
                                <!-- -->
                                trips
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide ExtraCategories_card__t5vXP Home_carousel-card__jejZv swiper-slide-duplicate"
                        data-swiper-slide-index="2">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs ExtraCategories_card-wrapper__jnrZQ group"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 04 engagement"
                            data-gtm-label="Find yourself far away / Card Click / Costa Rica"
                            href="/guide/costa-rica-tours">
                            <div class="h-[350px] overflow-hidden">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class=" w-full h-full group-hover:scale-105 transition-transform transform-gpu duration-300 object-cover"
                                    src="https://static.travelstride.com/store/trip_category_home_page_image/381205/attachment/1d83c266710988f1b9d79c23b76944c3.jpg" />
                            </div>
                            <p class="text-2xl font-semibold group-hover:text-[#177A68]">
                                Costa Rica
                            </p>
                            <p class="text-lg">
                                266
                                <!-- -->
                                trips
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide ExtraCategories_card__t5vXP Home_carousel-card__jejZv swiper-slide-duplicate"
                        data-swiper-slide-index="3">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs ExtraCategories_card-wrapper__jnrZQ group"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 04 engagement"
                            data-gtm-label="Find yourself far away / Card Click / Croatia" href="/guide/croatia-tours">
                            <div class="h-[350px] overflow-hidden">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-full group-hover:scale-105 transition-transform transform-gpu duration-300 object-cover"
                                    src="https://static.travelstride.com/store/trip_category_home_page_image/381204/attachment/2689d9214743b3fbf0a6cfaecee70424.jpg" />
                            </div>
                            <p class="text-2xl font-semibold group-hover:text-[#177A68]">
                                Croatia
                            </p>
                            <p class="text-lg">
                                492
                                <!-- -->
                                trips
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide ExtraCategories_card__t5vXP Home_carousel-card__jejZv swiper-slide-duplicate"
                        data-swiper-slide-index="4">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs ExtraCategories_card-wrapper__jnrZQ group"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 04 engagement"
                            data-gtm-label="Find yourself far away / Card Click / Canada" href="/guide/canada-tours">
                            <div class="h-[350px] overflow-hidden">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-full group-hover:scale-105 transition-transform transform-gpu duration-300 object-cover"
                                    src="https://static.travelstride.com/store/hero_image/579885/attachment/9d913c1f9ef0552939d4acbcc5f21b50.jpg" />
                            </div>
                            <p class="text-2xl font-semibold group-hover:text-[#177A68]">
                                Canada
                            </p>
                            <p class="text-lg">
                                717
                                <!-- -->
                                trips
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide ExtraCategories_card__t5vXP Home_carousel-card__jejZv swiper-slide-duplicate"
                        data-swiper-slide-index="5">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs ExtraCategories_card-wrapper__jnrZQ group"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 04 engagement"
                            data-gtm-label="Find yourself far away / Card Click / Tanzania"
                            href="/guide/tanzania-tours">
                            <div class="h-[350px] overflow-hidden">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-full group-hover:scale-105 transition-transform transform-gpu duration-300 object-cover"
                                    src="https://static.travelstride.com/store/hero_image/579835/attachment/69d652a2a080287cdfe11ed9c79a8dc0.jpg" />
                            </div>
                            <p class="text-2xl font-semibold group-hover:text-[#177A68]">
                                Tanzania
                            </p>
                            <p class="text-lg">
                                603
                                <!-- -->
                                trips
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide ExtraCategories_card__t5vXP Home_carousel-card__jejZv swiper-slide-duplicate"
                        data-swiper-slide-index="6">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs ExtraCategories_card-wrapper__jnrZQ group"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 04 engagement"
                            data-gtm-label="Find yourself far away / Card Click / Argentina"
                            href="/guide/argentina-tours">
                            <div class="h-[350px] overflow-hidden">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-full group-hover:scale-105 transition-transform transform-gpu duration-300 object-cover"
                                    src="https://static.travelstride.com/store/hero_image/579904/attachment/ca75c2843b58f661629fc5fb7d01d3bf.jpg" />
                            </div>
                            <p class="text-2xl font-semibold group-hover:text-[#177A68]">
                                Argentina
                            </p>
                            <p class="text-lg">
                                628
                                <!-- -->
                                trips
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide ExtraCategories_card__t5vXP Home_carousel-card__jejZv swiper-slide-duplicate"
                        data-swiper-slide-index="7">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs ExtraCategories_card-wrapper__jnrZQ group"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 04 engagement"
                            data-gtm-label="Find yourself far away / Card Click / France" href="/guide/france-tours">
                            <div class="h-[350px] overflow-hidden">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-full group-hover:scale-105 transition-transform transform-gpu duration-300 object-cover"
                                    src="https://static.travelstride.com/store/hero_image/579862/attachment/e85ee2e56f4bfa8bd383fbdb7ee13097.jpg" />
                            </div>
                            <p class="text-2xl font-semibold group-hover:text-[#177A68]">
                                France
                            </p>
                            <p class="text-lg">
                                1745
                                <!-- -->
                                trips
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide ExtraCategories_card__t5vXP Home_carousel-card__jejZv swiper-slide-duplicate"
                        data-swiper-slide-index="8">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs ExtraCategories_card-wrapper__jnrZQ group"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 04 engagement"
                            data-gtm-label="Find yourself far away / Card Click / Japan" href="/guide/japan-tours">
                            <div class="h-[350px] overflow-hidden">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-full group-hover:scale-105 transition-transform transform-gpu duration-300 object-cover"
                                    src="https://static.travelstride.com/store/hero_image/579968/attachment/2f5b1d9a2be5bc11cadb47258ee370fd.jpg" />
                            </div>
                            <p class="text-2xl font-semibold group-hover:text-[#177A68]">
                                Japan
                            </p>
                            <p class="text-lg">
                                814
                                <!-- -->
                                trips
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide ExtraCategories_card__t5vXP Home_carousel-card__jejZv swiper-slide-duplicate"
                        data-swiper-slide-index="9">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs ExtraCategories_card-wrapper__jnrZQ group"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 04 engagement"
                            data-gtm-label="Find yourself far away / Card Click / Iceland" href="/guide/iceland-tours">
                            <div class="h-[350px] overflow-hidden">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-full group-hover:scale-105 transition-transform transform-gpu duration-300 object-cover"
                                    src="https://static.travelstride.com/store/trip_category_home_page_image/381203/attachment/16d4ecd4c194a43679bd054929ca4d84.jpg" />
                            </div>
                            <p class="text-2xl font-semibold group-hover:text-[#177A68]">
                                Iceland
                            </p>
                            <p class="text-lg">
                                401
                                <!-- -->
                                trips
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide ExtraCategories_card__t5vXP Home_carousel-card__jejZv swiper-slide-duplicate"
                        data-swiper-slide-index="10">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs ExtraCategories_card-wrapper__jnrZQ group"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 04 engagement"
                            data-gtm-label="Find yourself far away / Card Click / Namibia" href="/guide/namibia-tours">
                            <div class="h-[350px] overflow-hidden">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-full group-hover:scale-105 transition-transform transform-gpu duration-300 object-cover"
                                    src="https://static.travelstride.com/store/trip_category_home_page_image/381210/attachment/a94092651d01d77a398fb8402979d8c1.jpg" />
                            </div>
                            <p class="text-2xl font-semibold group-hover:text-[#177A68]">
                                Namibia
                            </p>
                            <p class="text-lg">
                                186
                                <!-- -->
                                trips
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide ExtraCategories_card__t5vXP Home_carousel-card__jejZv"
                        data-swiper-slide-index="0">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs ExtraCategories_card-wrapper__jnrZQ group"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 04 engagement"
                            data-gtm-label="Find yourself far away / Card Click / Italy" href="/guide/italy-tours">
                            <div class="h-[350px] overflow-hidden">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-full group-hover:scale-105 transition-transform transform-gpu duration-300 object-cover"
                                    src="https://static.travelstride.com/store/hero_image/579860/attachment/76ce255b80ec120c5d8678a956a084be.jpg" />
                            </div>
                            <p class="text-2xl font-semibold group-hover:text-[#177A68]">
                                Italy
                            </p>
                            <p class="text-lg">
                                2073
                                <!-- -->
                                trips
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide ExtraCategories_card__t5vXP Home_carousel-card__jejZv"
                        data-swiper-slide-index="1">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs ExtraCategories_card-wrapper__jnrZQ group"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 04 engagement"
                            data-gtm-label="Find yourself far away / Card Click / Vietnam" href="/guide/vietnam-tours">
                            <div class="h-[350px] overflow-hidden">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-full group-hover:scale-105 transition-transform transform-gpu duration-300 object-cover"
                                    src="https://static.travelstride.com/store/hero_image/818216/attachment/235feca8bb9cc59dcb671f25d37b8a7d.jpg" />
                            </div>
                            <p class="text-2xl font-semibold group-hover:text-[#177A68]">
                                Vietnam
                            </p>
                            <p class="text-lg">
                                637
                                <!-- -->
                                trips
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide ExtraCategories_card__t5vXP Home_carousel-card__jejZv"
                        data-swiper-slide-index="2">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs ExtraCategories_card-wrapper__jnrZQ group"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 04 engagement"
                            data-gtm-label="Find yourself far away / Card Click / Costa Rica"
                            href="/guide/costa-rica-tours">
                            <div class="h-[350px] overflow-hidden">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-full group-hover:scale-105 transition-transform transform-gpu duration-300 object-cover"
                                    src="https://static.travelstride.com/store/trip_category_home_page_image/381205/attachment/1d83c266710988f1b9d79c23b76944c3.jpg" />
                            </div>
                            <p class="text-2xl font-semibold group-hover:text-[#177A68]">
                                Costa Rica
                            </p>
                            <p class="text-lg">
                                266
                                <!-- -->
                                trips
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide ExtraCategories_card__t5vXP Home_carousel-card__jejZv"
                        data-swiper-slide-index="3">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs ExtraCategories_card-wrapper__jnrZQ group"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 04 engagement"
                            data-gtm-label="Find yourself far away / Card Click / Croatia" href="/guide/croatia-tours">
                            <div class="h-[350px] overflow-hidden">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-full group-hover:scale-105 transition-transform transform-gpu duration-300 object-cover"
                                    src="https://static.travelstride.com/store/trip_category_home_page_image/381204/attachment/2689d9214743b3fbf0a6cfaecee70424.jpg" />
                            </div>
                            <p class="text-2xl font-semibold group-hover:text-[#177A68]">
                                Croatia
                            </p>
                            <p class="text-lg">
                                492
                                <!-- -->
                                trips
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide ExtraCategories_card__t5vXP Home_carousel-card__jejZv"
                        data-swiper-slide-index="4">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs ExtraCategories_card-wrapper__jnrZQ group"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 04 engagement"
                            data-gtm-label="Find yourself far away / Card Click / Canada" href="/guide/canada-tours">
                            <div class="h-[350px] overflow-hidden">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-full group-hover:scale-105 transition-transform transform-gpu duration-300 object-cover"
                                    src="https://static.travelstride.com/store/hero_image/579885/attachment/9d913c1f9ef0552939d4acbcc5f21b50.jpg" />
                            </div>
                            <p class="text-2xl font-semibold group-hover:text-[#177A68]">
                                Canada
                            </p>
                            <p class="text-lg">
                                717
                                <!-- -->
                                trips
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide ExtraCategories_card__t5vXP Home_carousel-card__jejZv"
                        data-swiper-slide-index="5">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs ExtraCategories_card-wrapper__jnrZQ group"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 04 engagement"
                            data-gtm-label="Find yourself far away / Card Click / Tanzania"
                            href="/guide/tanzania-tours">
                            <div class="h-[350px] overflow-hidden">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-full group-hover:scale-105 transition-transform transform-gpu duration-300 object-cover"
                                    src="https://static.travelstride.com/store/hero_image/579835/attachment/69d652a2a080287cdfe11ed9c79a8dc0.jpg" />
                            </div>
                            <p class="text-2xl font-semibold group-hover:text-[#177A68]">
                                Tanzania
                            </p>
                            <p class="text-lg">
                                603
                                <!-- -->
                                trips
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide ExtraCategories_card__t5vXP Home_carousel-card__jejZv"
                        data-swiper-slide-index="6">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs ExtraCategories_card-wrapper__jnrZQ group"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 04 engagement"
                            data-gtm-label="Find yourself far away / Card Click / Argentina"
                            href="/guide/argentina-tours">
                            <div class="h-[350px] overflow-hidden">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-full group-hover:scale-105 transition-transform transform-gpu duration-300 object-cover"
                                    src="https://static.travelstride.com/store/hero_image/579904/attachment/ca75c2843b58f661629fc5fb7d01d3bf.jpg" />
                            </div>
                            <p class="text-2xl font-semibold group-hover:text-[#177A68]">
                                Argentina
                            </p>
                            <p class="text-lg">
                                628
                                <!-- -->
                                trips
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide ExtraCategories_card__t5vXP Home_carousel-card__jejZv"
                        data-swiper-slide-index="7">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs ExtraCategories_card-wrapper__jnrZQ group"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 04 engagement"
                            data-gtm-label="Find yourself far away / Card Click / France" href="/guide/france-tours">
                            <div class="h-[350px] overflow-hidden">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-full group-hover:scale-105 transition-transform transform-gpu duration-300 object-cover"
                                    src="https://static.travelstride.com/store/hero_image/579862/attachment/e85ee2e56f4bfa8bd383fbdb7ee13097.jpg" />
                            </div>
                            <p class="text-2xl font-semibold group-hover:text-[#177A68]">
                                France
                            </p>
                            <p class="text-lg">
                                1745
                                <!-- -->
                                trips
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide ExtraCategories_card__t5vXP Home_carousel-card__jejZv"
                        data-swiper-slide-index="8">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs ExtraCategories_card-wrapper__jnrZQ group"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 04 engagement"
                            data-gtm-label="Find yourself far away / Card Click / Japan" href="/guide/japan-tours">
                            <div class="h-[350px] overflow-hidden">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-full group-hover:scale-105 transition-transform transform-gpu duration-300 object-cover"
                                    src="https://static.travelstride.com/store/hero_image/579968/attachment/2f5b1d9a2be5bc11cadb47258ee370fd.jpg" />
                            </div>
                            <p class="text-2xl font-semibold group-hover:text-[#177A68]">
                                Japan
                            </p>
                            <p class="text-lg">
                                814
                                <!-- -->
                                trips
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide ExtraCategories_card__t5vXP Home_carousel-card__jejZv"
                        data-swiper-slide-index="9">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs ExtraCategories_card-wrapper__jnrZQ group"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 04 engagement"
                            data-gtm-label="Find yourself far away / Card Click / Iceland" href="/guide/iceland-tours">
                            <div class="h-[350px] overflow-hidden">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-full group-hover:scale-105 transition-transform transform-gpu duration-300 object-cover"
                                    src="https://static.travelstride.com/store/trip_category_home_page_image/381203/attachment/16d4ecd4c194a43679bd054929ca4d84.jpg" />
                            </div>
                            <p class="text-2xl font-semibold group-hover:text-[#177A68]">
                                Iceland
                            </p>
                            <p class="text-lg">
                                401
                                <!-- -->
                                trips
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide ExtraCategories_card__t5vXP Home_carousel-card__jejZv"
                        data-swiper-slide-index="10">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs ExtraCategories_card-wrapper__jnrZQ group"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 04 engagement"
                            data-gtm-label="Find yourself far away / Card Click / Namibia" href="/guide/namibia-tours">
                            <div class="h-[350px] overflow-hidden">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-full group-hover:scale-105 transition-transform transform-gpu duration-300 object-cover"
                                    src="https://static.travelstride.com/store/trip_category_home_page_image/381210/attachment/a94092651d01d77a398fb8402979d8c1.jpg" />
                            </div>
                            <p class="text-2xl font-semibold group-hover:text-[#177A68]">
                                Namibia
                            </p>
                            <p class="text-lg">
                                186
                                <!-- -->
                                trips
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide ExtraCategories_card__t5vXP Home_carousel-card__jejZv swiper-slide-duplicate"
                        data-swiper-slide-index="0">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs ExtraCategories_card-wrapper__jnrZQ group"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 04 engagement"
                            data-gtm-label="Find yourself far away / Card Click / Italy" href="/guide/italy-tours">
                            <div class="h-[350px] overflow-hidden">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-full group-hover:scale-105 transition-transform transform-gpu duration-300 object-cover"
                                    src="https://static.travelstride.com/store/hero_image/579860/attachment/76ce255b80ec120c5d8678a956a084be.jpg" />
                            </div>
                            <p class="text-2xl font-semibold group-hover:text-[#177A68]">
                                Italy
                            </p>
                            <p class="text-lg">
                                2073
                                <!-- -->
                                trips
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide ExtraCategories_card__t5vXP Home_carousel-card__jejZv swiper-slide-duplicate"
                        data-swiper-slide-index="1">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs ExtraCategories_card-wrapper__jnrZQ group"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 04 engagement"
                            data-gtm-label="Find yourself far away / Card Click / Vietnam" href="/guide/vietnam-tours">
                            <div class="h-[350px] overflow-hidden">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-full group-hover:scale-105 transition-transform transform-gpu duration-300 object-cover"
                                    src="https://static.travelstride.com/store/hero_image/818216/attachment/235feca8bb9cc59dcb671f25d37b8a7d.jpg" />
                            </div>
                            <p class="text-2xl font-semibold group-hover:text-[#177A68]">
                                Vietnam
                            </p>
                            <p class="text-lg">
                                637
                                <!-- -->
                                trips
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide ExtraCategories_card__t5vXP Home_carousel-card__jejZv swiper-slide-duplicate"
                        data-swiper-slide-index="2">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs ExtraCategories_card-wrapper__jnrZQ group"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 04 engagement"
                            data-gtm-label="Find yourself far away / Card Click / Costa Rica"
                            href="/guide/costa-rica-tours">
                            <div class="h-[350px] overflow-hidden">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-full group-hover:scale-105 transition-transform transform-gpu duration-300 object-cover"
                                    src="https://static.travelstride.com/store/trip_category_home_page_image/381205/attachment/1d83c266710988f1b9d79c23b76944c3.jpg" />
                            </div>
                            <p class="text-2xl font-semibold group-hover:text-[#177A68]">
                                Costa Rica
                            </p>
                            <p class="text-lg">
                                266
                                <!-- -->
                                trips
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide ExtraCategories_card__t5vXP Home_carousel-card__jejZv swiper-slide-duplicate"
                        data-swiper-slide-index="3">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs ExtraCategories_card-wrapper__jnrZQ group"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 04 engagement"
                            data-gtm-label="Find yourself far away / Card Click / Croatia" href="/guide/croatia-tours">
                            <div class="h-[350px] overflow-hidden">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-full group-hover:scale-105 transition-transform transform-gpu duration-300 object-cover"
                                    src="https://static.travelstride.com/store/trip_category_home_page_image/381204/attachment/2689d9214743b3fbf0a6cfaecee70424.jpg" />
                            </div>
                            <p class="text-2xl font-semibold group-hover:text-[#177A68]">
                                Croatia
                            </p>
                            <p class="text-lg">
                                492
                                <!-- -->
                                trips
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide ExtraCategories_card__t5vXP Home_carousel-card__jejZv swiper-slide-duplicate"
                        data-swiper-slide-index="4">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs ExtraCategories_card-wrapper__jnrZQ group"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 04 engagement"
                            data-gtm-label="Find yourself far away / Card Click / Canada" href="/guide/canada-tours">
                            <div class="h-[350px] overflow-hidden">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-full group-hover:scale-105 transition-transform transform-gpu duration-300 object-cover"
                                    src="https://static.travelstride.com/store/hero_image/579885/attachment/9d913c1f9ef0552939d4acbcc5f21b50.jpg" />
                            </div>
                            <p class="text-2xl font-semibold group-hover:text-[#177A68]">
                                Canada
                            </p>
                            <p class="text-lg">
                                717
                                <!-- -->
                                trips
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide ExtraCategories_card__t5vXP Home_carousel-card__jejZv swiper-slide-duplicate"
                        data-swiper-slide-index="5">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs ExtraCategories_card-wrapper__jnrZQ group"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 04 engagement"
                            data-gtm-label="Find yourself far away / Card Click / Tanzania"
                            href="/guide/tanzania-tours">
                            <div class="h-[350px] overflow-hidden">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-full group-hover:scale-105 transition-transform transform-gpu duration-300 object-cover"
                                    src="https://static.travelstride.com/store/hero_image/579835/attachment/69d652a2a080287cdfe11ed9c79a8dc0.jpg" />
                            </div>
                            <p class="text-2xl font-semibold group-hover:text-[#177A68]">
                                Tanzania
                            </p>
                            <p class="text-lg">
                                603
                                <!-- -->
                                trips
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide ExtraCategories_card__t5vXP Home_carousel-card__jejZv swiper-slide-duplicate"
                        data-swiper-slide-index="6">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs ExtraCategories_card-wrapper__jnrZQ group"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 04 engagement"
                            data-gtm-label="Find yourself far away / Card Click / Argentina"
                            href="/guide/argentina-tours">
                            <div class="h-[350px] overflow-hidden">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-full group-hover:scale-105 transition-transform transform-gpu duration-300 object-cover"
                                    src="https://static.travelstride.com/store/hero_image/579904/attachment/ca75c2843b58f661629fc5fb7d01d3bf.jpg" />
                            </div>
                            <p class="text-2xl font-semibold group-hover:text-[#177A68]">
                                Argentina
                            </p>
                            <p class="text-lg">
                                628
                                <!-- -->
                                trips
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide ExtraCategories_card__t5vXP Home_carousel-card__jejZv swiper-slide-duplicate"
                        data-swiper-slide-index="7">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs ExtraCategories_card-wrapper__jnrZQ group"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 04 engagement"
                            data-gtm-label="Find yourself far away / Card Click / France" href="/guide/france-tours">
                            <div class="h-[350px] overflow-hidden">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-full group-hover:scale-105 transition-transform transform-gpu duration-300 object-cover"
                                    src="https://static.travelstride.com/store/hero_image/579862/attachment/e85ee2e56f4bfa8bd383fbdb7ee13097.jpg" />
                            </div>
                            <p class="text-2xl font-semibold group-hover:text-[#177A68]">
                                France
                            </p>
                            <p class="text-lg">
                                1745
                                <!-- -->
                                trips
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide ExtraCategories_card__t5vXP Home_carousel-card__jejZv swiper-slide-duplicate"
                        data-swiper-slide-index="8">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs ExtraCategories_card-wrapper__jnrZQ group"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 04 engagement"
                            data-gtm-label="Find yourself far away / Card Click / Japan" href="/guide/japan-tours">
                            <div class="h-[350px] overflow-hidden">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill" s
                                    class="w-full h-full group-hover:scale-105 transition-transform transform-gpu duration-300 object-cover"
                                    src="https://static.travelstride.com/store/hero_image/579968/attachment/2f5b1d9a2be5bc11cadb47258ee370fd.jpg" />
                            </div>
                            <p class="text-2xl font-semibold group-hover:text-[#177A68]">
                                Japan
                            </p>
                            <p class="text-lg">
                                814
                                <!-- -->
                                trips
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide ExtraCategories_card__t5vXP Home_carousel-card__jejZv swiper-slide-duplicate"
                        data-swiper-slide-index="9">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs ExtraCategories_card-wrapper__jnrZQ group"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 04 engagement"
                            data-gtm-label="Find yourself far away / Card Click / Iceland" href="/guide/iceland-tours">
                            <div class="h-[350px] overflow-hidden">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-full group-hover:scale-105 transition-transform transform-gpu duration-300 object-cover"
                                    src="https://static.travelstride.com/store/trip_category_home_page_image/381203/attachment/16d4ecd4c194a43679bd054929ca4d84.jpg" />
                            </div>
                            <p class="text-2xl font-semibold group-hover:text-[#177A68]">
                                Iceland
                            </p>
                            <p class="text-lg">
                                401
                                <!-- -->
                                trips
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide ExtraCategories_card__t5vXP Home_carousel-card__jejZv swiper-slide-duplicate"
                        data-swiper-slide-index="10">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs ExtraCategories_card-wrapper__jnrZQ group"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 04 engagement"
                            data-gtm-label="Find yourself far away / Card Click / Namibia" href="/guide/namibia-tours">
                            <div class="h-[350px] overflow-hidden">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-full group-hover:scale-105 transition-transform transform-gpu duration-300 object-cover"
                                    src="https://static.travelstride.com/store/trip_category_home_page_image/381210/attachment/a94092651d01d77a398fb8402979d8c1.jpg" />
                            </div>
                            <p class="text-2xl font-semibold group-hover:text-[#177A68]">
                                Namibia
                            </p>
                            <p class="text-lg">
                                186
                                <!-- -->
                                trips
                            </p>
                        </a>
                    </div>
                </div>
            </div>
            <button
                class="button-prev swiper-button top-1/2 -left-15 w-[20px] h-[20px] z-10 hidden md:flex items-center justify-center bg-transparent cursor-pointer  visible absolute"
                title="Previous Slide" type="button" data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                data-gtm-action="Position 01 engagement" data-gtm-label="Trip Type Carousel / Arrow &lt;"><svg
                    viewBox="0 0 10 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.5 2.08008L1.5 20.8089L8.5 39.0801" stroke="#DADADA" stroke-width="3"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </button>
            <button
                class="button-next swiper-button top-1/2 -right-15 w-[20px] h-[20px] z-10 hidden md:flex items-center justify-center rotate-180 bg-transparent cursor-pointer  visible absolute"
                title="Next Slide" type="button" data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                data-gtm-action="Position 01 engagement" data-gtm-label="Trip Type Carousel / Arrow &gt;"><svg
                    viewBox="0 0 10 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.5 2.08008L1.5 20.8089L8.5 39.0801" stroke="#DADADA" stroke-width="3"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                </svg></button>
        </div>
        <a class="btn-primary" data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
            data-gtm-action="Position 04 engagement"
            data-gtm-label="Find yourself far away / CTA click / Explore all destinations"
            href="https://www.travelstride.com/trip-destinationss">Explore all destinations</a>
    </div>
</section>

<section class="py-[65px]">
    <div class="max-w-7xl px-2 sm:px-6 md:px-8 mx-auto">
        <h3 class="text-4xl text-center font-bold text-slate-500 mb-[45px]">
            Widest Selection
        </h3>
        <h4 class="text-center text-2xl text-slate-400 font-semibold">
            Many sites show only companies that pay them. <br />Not us, we aim
            to show every option.
        </h4>
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 py-[100px]">
            <a class="UILink_root__hOYWg UILink_secondary__l3bZs" data-gtm-category="Home Page Engagement"
                data-gtm-trigger="click" data-gtm-action="Position 08 engagement"
                data-gtm-label="Tour Operators / Brand Click / Intrepid Travel" href="/tour-operators/intrepid-travel">
                <div class="flex gap-6 items-center">
                    <div class="basis-1/3">
                        <img alt="Intrepid Travel" loading="lazy" decoding="async" data-nimg="fill"
                            class="h-[80px] w-full object-contain"
                            src="https://static.travelstride.com/store/top_operator_image/417488/attachment/f0e5229c3f6a8e5f5a37f84c48044cec.png" />
                    </div>
                    <div class="basis-2/3">
                        <b>Intrepid Travel</b>
                        <div>
                            <div class="styles_root__YVCdg styles_tiny__6JB2K">
                                <div class="styles_icons__w0eKa"></div>
                                <div class="styles_base__IQTuE"></div>
                                <div class="styles_active__ez7bG" style="width: 90%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </a><a class="UILink_root__hOYWg UILink_secondary__l3bZs" data-gtm-category="Home Page Engagement"
                data-gtm-trigger="click" data-gtm-action="Position 08 engagement"
                data-gtm-label="Tour Operators / Brand Click / Audley Travel" href="/tour-operators/audley-travel">
                <div class="flex gap-6 items-center">
                    <div class="basis-1/3">
                        <img alt="Audley Travel" loading="lazy" decoding="async" data-nimg="fill"
                            class="h-[80px] w-full object-contain"
                            src="https://static.travelstride.com/store/top_operator_image/417790/attachment/aeef394c380222c0574befcc77d0eb56.png" />
                    </div>
                    <div class="basis-2/3">
                        <b>Audley Travel</b>
                        <div>
                            <div class="styles_root__YVCdg styles_tiny__6JB2K">
                                <div class="styles_icons__w0eKa"></div>
                                <div class="styles_base__IQTuE"></div>
                                <div class="styles_active__ez7bG" style="width: 98.00000000000001%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </a><a class="UILink_root__hOYWg UILink_secondary__l3bZs" data-gtm-category="Home Page Engagement"
                data-gtm-trigger="click" data-gtm-action="Position 08 engagement"
                data-gtm-label="Tour Operators / Brand Click / Exodus Adventure Travels"
                href="/tour-operators/exodus-travels">
                <div class="flex gap-6 items-center">
                    <div class="basis-1/3">
                        <img alt="Exodus Adventure Travels" loading="lazy" decoding="async" data-nimg="fill"
                            class="h-[80px] w-full object-contain"
                            src="https://static.travelstride.com/store/top_operator_image/418477/attachment/fef1ff3acd7764f06fcb687713ed0d8c.png" />
                    </div>
                    <div class="basis-2/3">
                        <b>Exodus Adventure Travels</b>
                        <div>
                            <div class="styles_root__YVCdg styles_tiny__6JB2K">
                                <div class="styles_icons__w0eKa"></div>
                                <div class="styles_base__IQTuE"></div>
                                <div class="styles_active__ez7bG" style="width: 94%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </a><a class="UILink_root__hOYWg UILink_secondary__l3bZs" data-gtm-category="Home Page Engagement"
                data-gtm-trigger="click" data-gtm-action="Position 08 engagement"
                data-gtm-label="Tour Operators / Brand Click / Road Scholar" href="/tour-operators/road-scholar">
                <div class="flex gap-6 items-center">
                    <div class="basis-1/3">
                        <img alt="Road Scholar" loading="lazy" decoding="async" data-nimg="fill"
                            class="h-[80px] w-full object-contain"
                            src="https://static.travelstride.com/store/top_operator_image/418488/attachment/f37d71e954967cea3c0e7558fac0ca31.png" />
                    </div>
                    <div class="basis-2/3">
                        <b>Road Scholar</b>
                        <div>
                            <div class="styles_root__YVCdg styles_tiny__6JB2K">
                                <div class="styles_icons__w0eKa"></div>
                                <div class="styles_base__IQTuE"></div>
                                <div class="styles_active__ez7bG" style="width: 84%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </a><a class="UILink_root__hOYWg UILink_secondary__l3bZs" data-gtm-category="Home Page Engagement"
                data-gtm-trigger="click" data-gtm-action="Position 08 engagement"
                data-gtm-label="Tour Operators / Brand Click / National Geographic Expeditions"
                href="/tour-operators/national-geographic-expeditions">
                <div class="flex gap-6 items-center">
                    <div class="basis-1/3">
                        <img alt="National Geographic Expeditions" loading="lazy" decoding="async" data-nimg="fill"
                            class="h-[80px] w-full object-contain"
                            src="https://static.travelstride.com/store/top_operator_image/461643/attachment/7c95dd862d81012fe98d22042eb5b14a.png" />
                    </div>
                    <div class="basis-2/3">
                        <b>National Geographic Expeditions</b>
                        <div>
                            <div class="styles_root__YVCdg styles_tiny__6JB2K">
                                <div class="styles_icons__w0eKa"></div>
                                <div class="styles_base__IQTuE"></div>
                                <div class="styles_active__ez7bG" style="width: 70%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </a><a class="UILink_root__hOYWg UILink_secondary__l3bZs" data-gtm-category="Home Page Engagement"
                data-gtm-trigger="click" data-gtm-action="Position 08 engagement"
                data-gtm-label="Tour Operators / Brand Click / Collette" href="/tour-operators/collette">
                <div class="flex gap-6 items-center">
                    <div class="basis-1/3">
                        <img alt="Collette" loading="lazy" decoding="async" data-nimg="fill"
                            class="h-[80px] w-full object-contain"
                            src="https://static.travelstride.com/store/top_operator_image/461647/attachment/b0e8a6adc7a320defe6869d73b64c645.jpeg" />
                    </div>
                    <div class="basis-2/3">
                        <b>Collette</b>
                        <div>
                            <div class="styles_root__YVCdg styles_tiny__6JB2K">
                                <div class="styles_icons__w0eKa"></div>
                                <div class="styles_base__IQTuE"></div>
                                <div class="styles_active__ez7bG" style="width: 90%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </a><a class="UILink_root__hOYWg UILink_secondary__l3bZs" data-gtm-category="Home Page Engagement"
                data-gtm-trigger="click" data-gtm-action="Position 08 engagement"
                data-gtm-label="Tour Operators / Brand Click / Tauck" href="/tour-operators/tauck">
                <div class="flex gap-6 items-center">
                    <div class="basis-1/3">
                        <img alt="Tauck" loading="lazy" decoding="async" data-nimg="fill"
                            class="h-[80px] w-full object-contain"
                            src="https://static.travelstride.com/store/top_operator_image/435301/attachment/ae9fe359a404133cef0165cda30fe467.png" />
                    </div>
                    <div class="basis-2/3">
                        <b>Tauck</b>
                        <div>
                            <div class="styles_root__YVCdg styles_tiny__6JB2K">
                                <div class="styles_icons__w0eKa"></div>
                                <div class="styles_base__IQTuE"></div>
                                <div class="styles_active__ez7bG" style="width: 88.00000000000001%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </a><a class="UILink_root__hOYWg UILink_secondary__l3bZs" data-gtm-category="Home Page Engagement"
                data-gtm-trigger="click" data-gtm-action="Position 08 engagement"
                data-gtm-label="Tour Operators / Brand Click / Contiki" href="/tour-operators/contiki">
                <div class="flex gap-6 items-center">
                    <div class="basis-1/3">
                        <img alt="Contiki" loading="lazy" decoding="async" data-nimg="fill"
                            class="h-[80px] w-full object-contain"
                            src="https://static.travelstride.com/store/top_operator_image/381226/attachment/df22cb4545ae693bac73dfb5b25d6385.png" />
                    </div>
                    <div class="basis-2/3">
                        <b>Contiki</b>
                        <div>
                            <div class="styles_root__YVCdg styles_tiny__6JB2K">
                                <div class="styles_icons__w0eKa"></div>
                                <div class="styles_base__IQTuE"></div>
                                <div class="styles_active__ez7bG" style="width: 94%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </a><a class="UILink_root__hOYWg UILink_secondary__l3bZs" data-gtm-category="Home Page Engagement"
                data-gtm-trigger="click" data-gtm-action="Position 08 engagement"
                data-gtm-label="Tour Operators / Brand Click / Viking River Cruises"
                href="/tour-operators/viking-river-cruises">
                <div class="flex gap-6 items-center">
                    <div class="basis-1/3">
                        <img alt="Viking River Cruises" loading="lazy" decoding="async" data-nimg="fill"
                            class="h-[80px] w-full object-contain"
                            src="https://static.travelstride.com/store/top_operator_image/433782/attachment/92a8e6b3713c68b85bfbfc18440754ba.png" />
                    </div>
                    <div class="basis-2/3">
                        <b>Viking River Cruises</b>
                        <div>
                            <div class="styles_root__YVCdg styles_tiny__6JB2K">
                                <div class="styles_icons__w0eKa"></div>
                                <div class="styles_base__IQTuE"></div>
                                <div class="styles_active__ez7bG" style="width: 94%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </a><a class="UILink_root__hOYWg UILink_secondary__l3bZs" data-gtm-category="Home Page Engagement"
                data-gtm-trigger="click" data-gtm-action="Position 08 engagement"
                data-gtm-label="Tour Operators / Brand Click / World Expeditions"
                href="/tour-operators/worldexpeditions">
                <div class="flex gap-6 items-center">
                    <div class="basis-1/3">
                        <img alt="World Expeditions" loading="lazy" decoding="async" data-nimg="fill"
                            class="h-[80px] w-full object-contain"
                            src="https://static.travelstride.com/store/top_operator_image/381228/attachment/b95a0f7f40d2828283af0f2609eb5d17.png" />
                    </div>
                    <div class="basis-2/3">
                        <b>World Expeditions</b>
                        <div>
                            <div class="styles_root__YVCdg styles_tiny__6JB2K">
                                <div class="styles_icons__w0eKa"></div>
                                <div class="styles_base__IQTuE"></div>
                                <div class="styles_active__ez7bG" style="width: 98.00000000000001%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </a><a class="UILink_root__hOYWg UILink_secondary__l3bZs" data-gtm-category="Home Page Engagement"
                data-gtm-trigger="click" data-gtm-action="Position 08 engagement"
                data-gtm-label="Tour Operators / Brand Click / ROW Adventures" href="/tour-operators/row-adventures">
                <div class="flex gap-6 items-center">
                    <div class="basis-1/3">
                        <img alt="ROW Adventures" loading="lazy" decoding="async" data-nimg="fill"
                            class="h-[80px] w-full object-contain"
                            src="https://static.travelstride.com/store/top_operator_image/461646/attachment/1b9933e9f20aef32d6e1dc764e8e2822.png" />
                    </div>
                    <div class="basis-2/3">
                        <b>ROW Adventures</b>
                        <div>
                            <div class="styles_root__YVCdg styles_tiny__6JB2K">
                                <div class="styles_icons__w0eKa"></div>
                                <div class="styles_base__IQTuE"></div>
                                <div class="styles_active__ez7bG" style="width: 100%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </a><a class="UILink_root__hOYWg UILink_secondary__l3bZs" data-gtm-category="Home Page Engagement"
                data-gtm-trigger="click" data-gtm-action="Position 08 engagement"
                data-gtm-label="Tour Operators / Brand Click / Explore!" href="/tour-operators/explore">
                <div class="flex gap-6 items-center">
                    <div class="basis-1/3">
                        <img alt="Explore!" loading="lazy" decoding="async" data-nimg="fill"
                            class="h-[80px] w-full object-contain"
                            src="https://static.travelstride.com/store/top_operator_image/461648/attachment/1e770f868f4925212a33db4d7ab592bb.png" />
                    </div>
                    <div class="basis-2/3">
                        <b>Explore!</b>
                        <div>
                            <div class="styles_root__YVCdg styles_tiny__6JB2K">
                                <div class="styles_icons__w0eKa"></div>
                                <div class="styles_base__IQTuE"></div>
                                <div class="styles_active__ez7bG" style="width: 94%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </a><a class="UILink_root__hOYWg UILink_secondary__l3bZs" data-gtm-category="Home Page Engagement"
                data-gtm-trigger="click" data-gtm-action="Position 08 engagement"
                data-gtm-label="Tour Operators / Brand Click / Topdeck" href="/tour-operators/topdeck">
                <div class="flex gap-6 items-center">
                    <div class="basis-1/3">
                        <img alt="Topdeck" loading="lazy" decoding="async" data-nimg="fill"
                            class="h-[80px] w-full object-contain"
                            src="https://static.travelstride.com/store/top_operator_image/381231/attachment/72d7b0ea202c03e840e740b5b9420562.png" />
                    </div>
                    <div class="basis-2/3">
                        <b>Topdeck</b>
                        <div>
                            <div class="styles_root__YVCdg styles_tiny__6JB2K">
                                <div class="styles_icons__w0eKa"></div>
                                <div class="styles_base__IQTuE"></div>
                                <div class="styles_active__ez7bG" style="width: 88.00000000000001%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </a><a class="UILink_root__hOYWg UILink_secondary__l3bZs" data-gtm-category="Home Page Engagement"
                data-gtm-trigger="click" data-gtm-action="Position 08 engagement"
                data-gtm-label="Tour Operators / Brand Click / Globus" href="/tour-operators/globus">
                <div class="flex gap-6 items-center">
                    <div class="basis-1/3">
                        <img alt="Globus" loading="lazy" decoding="async" data-nimg="fill"
                            class="h-[80px] w-full object-contain"
                            src="https://static.travelstride.com/store/top_operator_image/461644/attachment/7c1f13f5f0e359cfae748b6b244e0421.jpeg" />
                    </div>
                    <div class="basis-2/3">
                        <b>Globus</b>
                        <div>
                            <div class="styles_root__YVCdg styles_tiny__6JB2K">
                                <div class="styles_icons__w0eKa"></div>
                                <div class="styles_base__IQTuE"></div>
                                <div class="styles_active__ez7bG" style="width: 94%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </a><a class="UILink_root__hOYWg UILink_secondary__l3bZs" data-gtm-category="Home Page Engagement"
                data-gtm-trigger="click" data-gtm-action="Position 08 engagement"
                data-gtm-label="Tour Operators / Brand Click / Trafalgar" href="/tour-operators/trafalgar">
                <div class="flex gap-6 items-center ">
                    <div class="basis-1/3">
                        <img alt="Trafalgar" loading="lazy" decoding="async" data-nimg="fill"
                            class="h-[80px] w-full object-contain"
                            src="https://static.travelstride.com/store/top_operator_image/461645/attachment/38d6332a1301984ff88d026ae1ba27cd.jpeg" />
                    </div>
                    <div class="basis-2/3">
                        <b>Trafalgar</b>
                        <div>
                            <div class="styles_root__YVCdg styles_tiny__6JB2K">
                                <div class="styles_icons__w0eKa"></div>
                                <div class="styles_base__IQTuE"></div>
                                <div class="styles_active__ez7bG" style="width: 91.99999999999999%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </a><a class="UILink_root__hOYWg UILink_secondary__l3bZs" data-gtm-category="Home Page Engagement"
                data-gtm-trigger="click" data-gtm-action="Position 08 engagement"
                data-gtm-label="Tour Operators / Brand Click / G Adventures" href="/tour-operators/g-adventures">
                <div class="flex gap-6 items-center ">
                    <div class="basis-1/3">
                        <img alt="G Adventures" loading="lazy" decoding="async" data-nimg="fill"
                            class="h-[80px] w-full object-contain"
                            src="https://static.travelstride.com/store/top_operator_image/418501/attachment/5e3c970fd1e2412e7709b91970616221.png" />
                    </div>
                    <div class="basis-2/3">
                        <b>G Adventures</b>
                        <div>
                            <div class="styles_root__YVCdg styles_tiny__6JB2K">
                                <div class="styles_icons__w0eKa"></div>
                                <div class="styles_base__IQTuE"></div>
                                <div class="styles_active__ez7bG" style="width: 96%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <a class="underline flex justify-center text-slate-400 hover:text-slate-600"
            data-gtm-category="Home Page Engagement" data-gtm-trigger="click" data-gtm-action="Position 08 engagement"
            data-gtm-label="Tour Operators / CTA Click / All 1,629 global and local travel brands"
            href="/tour-operator-reviews">All 1,629 global and local travel brands</a>
    </div>
</section>


<section class="py-[65px] bg-slate-100">
    <div class="max-w-7xl px-2 sm:px-6 md:px-8 mx-auto ">
        <h3 class="title-one pb-[45px]">Travel Guides and Tips</h3>
        <div class="Carousel_container__NZ4GO BlogPostsCarousel_carousel-wrapper__GFcIY relative mb-8">
            <div class="swiper-container overflow-hidden">
                <div class="swiper-wrapper">
                    <div class="swiper-slide Home_carousel-card__jejZv swiper-slide-duplicate"
                        data-swiper-slide-index="0">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs BlogPostsCarousel_card-title__cj1Nz"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 09 engagement"
                            data-gtm-label="Travel Guide and Tips / Card Click / 15 Top Bucket List Destinations"
                            href="/blog/15-top-bucket-list-destinations">
                            <div class="Home_carousel-card-image__Fx4dM">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-[400px] object-cover rounded-2xl"
                                    src="https://static.travelstride.com/store/hero_image/529532/attachment/fafe56f32a61ae227efe99dc3671bad4.jpg" />
                            </div>
                            <p class="pt-2 text-2xl text-custom font-bold line-clamp-2 ">
                                15 Top Bucket List Destinations
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide Home_carousel-card__jejZv swiper-slide-duplicate"
                        data-swiper-slide-index="1">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs BlogPostsCarousel_card-title__cj1Nz"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 09 engagement"
                            data-gtm-label="Travel Guide and Tips / Card Click / Best Tours &amp; Trips to Ecuador &amp; Galapagos Islands 2023"
                            href="/blog/trips-to-Ecuador-and-Galapagos-islands">
                            <div class="Home_carousel-card-image__Fx4dM">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-[400px] object-cover rounded-2xl"
                                    src="https://static.travelstride.com/store/hero_image/3766297/attachment/4a4ccafede2ce3946812a3ae77e1bee9.jpg" />
                            </div>
                            <p class="pt-2 text-2xl text-custom font-bold line-clamp-2 ">
                                Best Tours &amp; Trips to Ecuador &amp; Galapagos
                                Islands 2023
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide Home_carousel-card__jejZv swiper-slide-duplicate"
                        data-swiper-slide-index="2">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs BlogPostsCarousel_card-title__cj1Nz"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 09 engagement"
                            data-gtm-label="Travel Guide and Tips / Card Click / Top Tips for Planning a Trip to Machu Picchu"
                            href="/blog/planning-a-trip-to-machu-picchu">
                            <div class="Home_carousel-card-image__Fx4dM">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-[400px] object-cover rounded-2xl"
                                    src="https://static.travelstride.com/store/hero_image/529617/attachment/fdef3620812facb40255598df173a724.jpg" />
                            </div>
                            <p class="pt-2 text-2xl text-custom font-bold line-clamp-2 ">
                                Top Tips for Planning a Trip to Machu Picchu
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide Home_carousel-card__jejZv swiper-slide-duplicate"
                        data-swiper-slide-index="3">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs BlogPostsCarousel_card-title__cj1Nz"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 09 engagement"
                            data-gtm-label="Travel Guide and Tips / Card Click / Italy vs France: Which Travel Destination is Right For You?"
                            href="/blog/italy-vs-france-which-travel-destination-is-right-for-you">
                            <div class="Home_carousel-card-image__Fx4dM">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-[400px] object-cover rounded-2xl"
                                    src="https://static.travelstride.com/store/hero_image/529800/attachment/777e2ba19aef77745140fbaa26feb8eb.jpg" />
                            </div>
                            <p class="pt-2 text-2xl text-custom font-bold line-clamp-2">
                                Italy vs France: Which Travel Destination is Right For
                                You?
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide Home_carousel-card__jejZv swiper-slide-duplicate"
                        data-swiper-slide-index="4">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs BlogPostsCarousel_card-title__cj1Nz"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 09 engagement"
                            data-gtm-label="Travel Guide and Tips / Card Click / Best Castles in Japan"
                            href="/blog/best-castles-in-japan">
                            <div class="Home_carousel-card-image__Fx4dM">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-[400px] object-cover rounded-2xl"
                                    src="https://static.travelstride.com/store/hero_image/529833/attachment/6786234a8016e2018c8b07bc3da36b4f.jpg" />
                            </div>
                            <p class="pt-2 text-2xl text-custom font-bold line-clamp-2">
                                Best Castles in Japan
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide Home_carousel-card__jejZv swiper-slide-duplicate"
                        data-swiper-slide-index="5">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs BlogPostsCarousel_card-title__cj1Nz"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 09 engagement"
                            data-gtm-label="Travel Guide and Tips / Card Click / Top 5 US Cities for Winter Camping Trips"
                            href="/blog/top-5-us-cities-for-winter-camping">
                            <div class="Home_carousel-card-image__Fx4dM">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-[400px] object-cover rounded-2xl"
                                    src="https://static.travelstride.com/store/hero_image/529723/attachment/2fdb41f0c247d14771915e2c915fc341.jpg" />
                            </div>
                            <p class="pt-2 text-2xl text-custom font-bold line-clamp-2">
                                Top 5 US Cities for Winter Camping Trips
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide Home_carousel-card__jejZv" data-swiper-slide-index="0">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs BlogPostsCarousel_card-title__cj1Nz"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 09 engagement"
                            data-gtm-label="Travel Guide and Tips / Card Click / 15 Top Bucket List Destinations"
                            href="/blog/15-top-bucket-list-destinations">
                            <div class="Home_carousel-card-image__Fx4dM">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-[400px] object-cover rounded-2xl"
                                    src="https://static.travelstride.com/store/hero_image/529532/attachment/fafe56f32a61ae227efe99dc3671bad4.jpg" />
                            </div>
                            <p class="pt-2 text-2xl text-custom font-bold line-clamp-2">
                                15 Top Bucket List Destinations
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide Home_carousel-card__jejZv" data-swiper-slide-index="1">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs BlogPostsCarousel_card-title__cj1Nz"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 09 engagement"
                            data-gtm-label="Travel Guide and Tips / Card Click / Best Tours &amp; Trips to Ecuador &amp; Galapagos Islands 2023"
                            href="/blog/trips-to-Ecuador-and-Galapagos-islands">
                            <div class="Home_carousel-card-image__Fx4dM">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-[400px] object-cover rounded-2xl"
                                    src="https://static.travelstride.com/store/hero_image/3766297/attachment/4a4ccafede2ce3946812a3ae77e1bee9.jpg" />
                            </div>
                            <p class="pt-2 text-2xl text-custom font-bold line-clamp-2">
                                Best Tours &amp; Trips to Ecuador &amp; Galapagos
                                Islands 2023
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide Home_carousel-card__jejZv" data-swiper-slide-index="2">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs BlogPostsCarousel_card-title__cj1Nz"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 09 engagement"
                            data-gtm-label="Travel Guide and Tips / Card Click / Top Tips for Planning a Trip to Machu Picchu"
                            href="/blog/planning-a-trip-to-machu-picchu">
                            <div class="Home_carousel-card-image__Fx4dM">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-[400px] object-cover rounded-2xl"
                                    src="https://static.travelstride.com/store/hero_image/529617/attachment/fdef3620812facb40255598df173a724.jpg" />
                            </div>
                            <p class="pt-2 text-2xl text-custom font-bold line-clamp-2">
                                Top Tips for Planning a Trip to Machu Picchu
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide Home_carousel-card__jejZv" data-swiper-slide-index="3">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs BlogPostsCarousel_card-title__cj1Nz"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 09 engagement"
                            data-gtm-label="Travel Guide and Tips / Card Click / Italy vs France: Which Travel Destination is Right For You?"
                            href="/blog/italy-vs-france-which-travel-destination-is-right-for-you">
                            <div class="Home_carousel-card-image__Fx4dM">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-[400px] object-cover rounded-2xl"
                                    src="https://static.travelstride.com/store/hero_image/529800/attachment/777e2ba19aef77745140fbaa26feb8eb.jpg" />
                            </div>
                            <p class="pt-2 text-2xl text-custom font-bold line-clamp-2">
                                Italy vs France: Which Travel Destination is Right For
                                You?
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide Home_carousel-card__jejZv" data-swiper-slide-index="4">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs BlogPostsCarousel_card-title__cj1Nz"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 09 engagement"
                            data-gtm-label="Travel Guide and Tips / Card Click / Best Castles in Japan"
                            href="/blog/best-castles-in-japan">
                            <div class="Home_carousel-card-image__Fx4dM">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-[400px] object-cover rounded-2xl"
                                    src="https://static.travelstride.com/store/hero_image/529833/attachment/6786234a8016e2018c8b07bc3da36b4f.jpg" />
                            </div>
                            <p class="pt-2 text-2xl text-custom font-bold line-clamp-2">
                                Best Castles in Japan
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide Home_carousel-card__jejZv" data-swiper-slide-index="5">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs BlogPostsCarousel_card-title__cj1Nz"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 09 engagement"
                            data-gtm-label="Travel Guide and Tips / Card Click / Top 5 US Cities for Winter Camping Trips"
                            href="/blog/top-5-us-cities-for-winter-camping">
                            <div class="Home_carousel-card-image__Fx4dM">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-[400px] object-cover rounded-2xl"
                                    src="https://static.travelstride.com/store/hero_image/529723/attachment/2fdb41f0c247d14771915e2c915fc341.jpg" />
                            </div>
                            <p class="pt-2 text-2xl text-custom font-bold line-clamp-2">
                                Top 5 US Cities for Winter Camping Trips
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide Home_carousel-card__jejZv swiper-slide-duplicate"
                        data-swiper-slide-index="0">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs BlogPostsCarousel_card-title__cj1Nz"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 09 engagement"
                            data-gtm-label="Travel Guide and Tips / Card Click / 15 Top Bucket List Destinations"
                            href="/blog/15-top-bucket-list-destinations">
                            <div class="Home_carousel-card-image__Fx4dM">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-[400px] object-cover rounded-2xl"
                                    src="https://static.travelstride.com/store/hero_image/529532/attachment/fafe56f32a61ae227efe99dc3671bad4.jpg" />
                            </div>
                            <p class="pt-2 text-2xl text-custom font-bold line-clamp-2">
                                15 Top Bucket List Destinations
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide Home_carousel-card__jejZv swiper-slide-duplicate"
                        data-swiper-slide-index="1">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs BlogPostsCarousel_card-title__cj1Nz"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 09 engagement"
                            data-gtm-label="Travel Guide and Tips / Card Click / Best Tours &amp; Trips to Ecuador &amp; Galapagos Islands 2023"
                            href="/blog/trips-to-Ecuador-and-Galapagos-islands">
                            <div class="Home_carousel-card-image__Fx4dM">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-[400px] object-cover rounded-2xl"
                                    src="https://static.travelstride.com/store/hero_image/3766297/attachment/4a4ccafede2ce3946812a3ae77e1bee9.jpg" />
                            </div>
                            <p class="pt-2 text-2xl text-custom font-bold line-clamp-2">
                                Best Tours &amp; Trips to Ecuador &amp; Galapagos
                                Islands 2023
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide Home_carousel-card__jejZv swiper-slide-duplicate"
                        data-swiper-slide-index="2">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs BlogPostsCarousel_card-title__cj1Nz"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 09 engagement"
                            data-gtm-label="Travel Guide and Tips / Card Click / Top Tips for Planning a Trip to Machu Picchu"
                            href="/blog/planning-a-trip-to-machu-picchu">
                            <div class="Home_carousel-card-image__Fx4dM">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-[400px] object-cover rounded-2xl"
                                    src="https://static.travelstride.com/store/hero_image/529617/attachment/fdef3620812facb40255598df173a724.jpg" />
                            </div>
                            <p class="pt-2 text-2xl text-custom font-bold line-clamp-2">
                                Top Tips for Planning a Trip to Machu Picchu
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide Home_carousel-card__jejZv swiper-slide-duplicate"
                        data-swiper-slide-index="3">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs BlogPostsCarousel_card-title__cj1Nz"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 09 engagement"
                            data-gtm-label="Travel Guide and Tips / Card Click / Italy vs France: Which Travel Destination is Right For You?"
                            href="/blog/italy-vs-france-which-travel-destination-is-right-for-you">
                            <div class="Home_carousel-card-image__Fx4dM">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-[400px] object-cover rounded-2xl"
                                    src="https://static.travelstride.com/store/hero_image/529800/attachment/777e2ba19aef77745140fbaa26feb8eb.jpg" />
                            </div>
                            <p class="pt-2 text-2xl text-custom font-bold line-clamp-2">
                                Italy vs France: Which Travel Destination is Right For
                                You?
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide Home_carousel-card__jejZv swiper-slide-duplicate"
                        data-swiper-slide-index="4">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs BlogPostsCarousel_card-title__cj1Nz"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 09 engagement"
                            data-gtm-label="Travel Guide and Tips / Card Click / Best Castles in Japan"
                            href="/blog/best-castles-in-japan">
                            <div class="Home_carousel-card-image__Fx4dM">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-[400px] object-cover rounded-2xl"
                                    src="https://static.travelstride.com/store/hero_image/529833/attachment/6786234a8016e2018c8b07bc3da36b4f.jpg" />
                            </div>
                            <p class="pt-2 text-2xl text-custom font-bold line-clamp-2">
                                Best Castles in Japan
                            </p>
                        </a>
                    </div>
                    <div class="swiper-slide Home_carousel-card__jejZv swiper-slide-duplicate"
                        data-swiper-slide-index="5">
                        <a class="UILink_root__hOYWg UILink_secondary__l3bZs BlogPostsCarousel_card-title__cj1Nz"
                            data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                            data-gtm-action="Position 09 engagement"
                            data-gtm-label="Travel Guide and Tips / Card Click / Top 5 US Cities for Winter Camping Trips"
                            href="/blog/top-5-us-cities-for-winter-camping">
                            <div class="Home_carousel-card-image__Fx4dM">
                                <img alt="" loading="lazy" decoding="async" data-nimg="fill"
                                    class="w-full h-[400px] object-cover rounded-2xl"
                                    src="https://static.travelstride.com/store/hero_image/529723/attachment/2fdb41f0c247d14771915e2c915fc341.jpg" />
                            </div>
                            <p class="pt-2 text-2xl text-custom font-bold line-clamp-2">
                                Top 5 US Cities for Winter Camping Trips
                            </p>
                        </a>
                    </div>
                </div>
            </div>
            <button
                class="button-prev swiper-button top-1/2 -left-15 w-[20px] h-[20px] z-10 hidden md:flex items-center justify-center bg-transparent cursor-pointer  visible absolute"
                title="Previous Slide" type="button" data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                data-gtm-action="Position 01 engagement" data-gtm-label="Trip Type Carousel / Arrow &lt;"><svg
                    viewBox="0 0 10 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.5 2.08008L1.5 20.8089L8.5 39.0801" stroke="#DADADA" stroke-width="3"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </button>
            <button
                class="button-next swiper-button top-1/2 -right-15 w-[20px] h-[20px] z-10 hidden md:flex items-center justify-center rotate-180 bg-transparent cursor-pointer  visible absolute"
                title="Next Slide" type="button" data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
                data-gtm-action="Position 01 engagement" data-gtm-label="Trip Type Carousel / Arrow &gt;"><svg
                    viewBox="0 0 10 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.5 2.08008L1.5 20.8089L8.5 39.0801" stroke="#DADADA" stroke-width="3"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                </svg></button>
        </div>
        <a class="btn-primary " data-gtm-category="Home Page Engagement" data-gtm-trigger="click"
            data-gtm-action="Position 09 engagement" data-gtm-label="Travel Guide and Tips / CTA Click / Explore All"
            href="/blog">Explore All</a>
    </div>
</section>


<!-- Featured Destinations -->
<!-- <section class="pt-[65px] bg-white">
    <div class="max-w-7xl px-2 sm:px-6 md:px-8 mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Popular Destinations</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="card group cursor-pointer">
                <div class="relative overflow-hidden">
                    <img src="/images/italy-placeholder.jpg" alt="Italy"
                        class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                    <div class="absolute inset-0 bg-black/30"></div>
                    <div class="absolute bottom-4 left-4 text-white">
                        <h3 class="text-xl font-semibold">Italy</h3>
                        <p class="text-sm opacity-90">1,200+ trips</p>
                    </div>
                </div>
            </div>

            <div class="card group cursor-pointer">
                <div class="relative overflow-hidden">
                    <img src="/images/japan-placeholder.jpg" alt="Japan"
                        class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                    <div class="absolute inset-0 bg-black/30"></div>
                    <div class="absolute bottom-4 left-4 text-white">
                        <h3 class="text-xl font-semibold">Japan</h3>
                        <p class="text-sm opacity-90">800+ trips</p>
                    </div>
                </div>
            </div>

            <div class="card group cursor-pointer">
                <div class="relative overflow-hidden">
                    <img src="/images/peru-placeholder.jpg" alt="Peru"
                        class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                    <div class="absolute inset-0 bg-black/30"></div>
                    <div class="absolute bottom-4 left-4 text-white">
                        <h3 class="text-xl font-semibold">Peru</h3>
                        <p class="text-sm opacity-90">600+ trips</p>
                    </div>
                </div>
            </div>

            <div class="card group cursor-pointer">
                <div class="relative overflow-hidden">
                    <img src="/images/iceland-placeholder.jpg" alt="Iceland"
                        class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                    <div class="absolute inset-0 bg-black/30"></div>
                    <div class="absolute bottom-4 left-4 text-white">
                        <h3 class="text-xl font-semibold">Iceland</h3>
                        <p class="text-sm opacity-90">400+ trips</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<!-- Trip Categories -->
<!-- <section class="py-16 bg-gray-50">
    <div class="max-w-7xl px-2 sm:px-6 md:px-8 mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Find Your Perfect Trip Style</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="card p-6 text-center group cursor-pointer">
                <div class="gradient-card-1 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-users text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Small Group Tours</h3>
                <p class="text-gray-600 mb-4">Intimate experiences with 10-24 travelers</p>
                <a href="#" class="text-green-600 hover:text-green-700 font-medium">Explore Tours →</a>
            </div>

            <div class="card p-6 text-center group cursor-pointer">
                <div class="gradient-card-2 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-mountain text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Adventure Travel</h3>
                <p class="text-gray-600 mb-4">Active experiences for thrill-seekers</p>
                <a href="#" class="text-green-600 hover:text-green-700 font-medium">Explore Tours →</a>
            </div>

            <div class="card p-6 text-center group cursor-pointer">
                <div class="gradient-card-3 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-utensils text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Food & Wine Tours</h3>
                <p class="text-gray-600 mb-4">Culinary adventures around the world</p>
                <a href="#" class="text-green-600 hover:text-green-700 font-medium">Explore Tours →</a>
            </div>

            <div class="card p-6 text-center group cursor-pointer">
                <div class="gradient-card-4 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-crown text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Luxury Tours</h3>
                <p class="text-gray-600 mb-4">Premium experiences with top-tier service</p>
                <a href="#" class="text-green-600 hover:text-green-700 font-medium">Explore Tours →</a>
            </div>

            <div class="card p-6 text-center group cursor-pointer">
                <div class="gradient-card-1 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-landmark text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Cultural Tours</h3>
                <p class="text-gray-600 mb-4">Immerse yourself in local traditions</p>
                <a href="#" class="text-green-600 hover:text-green-700 font-medium">Explore Tours →</a>
            </div>

            <div class="card p-6 text-center group cursor-pointer">
                <div class="gradient-card-2 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-leaf text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Nature & Wildlife</h3>
                <p class="text-gray-600 mb-4">Explore the world's natural wonders</p>
                <a href="#" class="text-green-600 hover:text-green-700 font-medium">Explore Tours →</a>
            </div>
        </div>
    </div>
</section> -->

<!-- Featured Trips -->
<!-- <section class="py-16 bg-white">
    <div class="max-w-7xl px-2 sm:px-6 md:px-8 mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Featured Trips</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="card group cursor-pointer">
                <div class="relative">
                    <img src="/images/trip-1-placeholder.jpg" alt="Italian Adventure" class="w-full h-48 object-cover">
                    <div class="absolute top-3 left-3">
                        <span class="badge-featured">Featured</span>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Italian Adventure: Rome to Venice</h3>
                    <p class="text-gray-600 text-sm mb-4">Experience the best of Italy on this comprehensive tour from
                        Rome to Venice.</p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="rating-stars mr-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="text-sm text-gray-600">4.9 (127 reviews)</span>
                        </div>
                        <div class="price-display">From $2,499</div>
                    </div>
                </div>
            </div>

            <div class="card group cursor-pointer">
                <div class="relative">
                    <img src="/images/trip-2-placeholder.jpg" alt="Japanese Culture" class="w-full h-48 object-cover">
                    <div class="absolute top-3 left-3">
                        <span class="badge-popular">Popular</span>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Japanese Culture & Tradition</h3>
                    <p class="text-gray-600 text-sm mb-4">Discover the rich culture and traditions of Japan on this
                        immersive journey.</p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="rating-stars mr-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="text-sm text-gray-600">4.8 (89 reviews)</span>
                        </div>
                        <div class="price-display">From $3,299</div>
                    </div>
                </div>
            </div>

            <div class="card group cursor-pointer">
                <div class="relative">
                    <img src="/images/trip-3-placeholder.jpg" alt="Peru Adventure" class="w-full h-48 object-cover">
                    <div class="absolute top-3 left-3">
                        <span class="badge-new">New</span>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Peru: Machu Picchu & Sacred Valley</h3>
                    <p class="text-gray-600 text-sm mb-4">Explore the ancient wonders of Peru including the iconic Machu
                        Picchu.</p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="rating-stars mr-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="text-sm text-gray-600">4.7 (156 reviews)</span>
                        </div>
                        <div class="price-display">From $1,899</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('trips.index') }}" class="btn-primary">
                View All Trips
            </a>
        </div>
    </div>
</section> -->

<!-- Why Choose Travelstride -->
<!-- <section class="py-16 bg-gray-50">
    <div class="max-w-7xl px-2 sm:px-6 md:px-8 mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Why Choose Travelstride?</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="bg-green-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-search text-green-600 text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Widest Selection</h3>
                <p class="text-gray-600">Many sites show only companies that pay them. Not us, we aim to show every
                    option.</p>
            </div>

            <div class="text-center">
                <div class="bg-blue-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-star text-blue-600 text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Real Reviews</h3>
                <p class="text-gray-600">Learn from real traveler reviews on expert-planned trips visiting multiple
                    destinations.</p>
            </div>

            <div class="text-center">
                <div class="bg-orange-500 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-dollar-sign text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Member Benefits</h3>
                <p class="text-gray-600">Get a rebate up to 15% of your trip price after you share your review.</p>
            </div>
        </div>
    </div>
</section> -->

<!-- Call to Action -->
<!-- <section class="py-16 bg-blue-700">
    <div class="max-w-7xl px-2 sm:px-6 md:px-8 mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-white mb-4">Ready to start your journey?</h2>
        <p class="text-xl text-blue-100 mb-8">Join thousands of travelers who trust Travelstride for their adventures
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('trips.index') }}" class="btn-secondary">
                Browse Trips
            </a>
            <a href="{{ route('design-trip') }}"
                class="btn-outline border-white text-white hover:bg-white hover:text-blue-700">
                Design My Trip
            </a>
        </div>
    </div>
</section> -->
@endsection