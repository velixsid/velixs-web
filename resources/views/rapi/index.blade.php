@extends('layouts.landing.main')

@section('content')
<div class="relative isolate overflow-hidden bg-white dark:bg-slate-950 shadow-sm">
    <svg viewBox="0 0 1108 632" aria-hidden="true" class="absolute top-10 left-[calc(50%-4rem)] -z-10 w-[69.25rem] max-w-none transform-gpu blur-3xl sm:left-[calc(50%-18rem)] lg:left-48 lg:top-[calc(50%-30rem)] xl:left-[calc(50%-24rem)]">
        <path fill="url(#175c433f-44f6-4d59-93f0-c5c51ad5566d)" fill-opacity=".2" d="M235.233 402.609 57.541 321.573.83 631.05l234.404-228.441 320.018 145.945c-65.036-115.261-134.286-322.756 109.01-230.655C968.382 433.026 1031 651.247 1092.23 459.36c48.98-153.51-34.51-321.107-82.37-385.717L810.952 324.222 648.261.088 235.233 402.609Z" />
        <defs>
            <linearGradient id="175c433f-44f6-4d59-93f0-c5c51ad5566d" x1="1220.59" x2="-85.053" y1="432.766" y2="638.714" gradientUnits="userSpaceOnUse">
                <stop stop-color="#4F46E5"></stop>
                <stop offset="1" stop-color="#80CAFF"></stop>
            </linearGradient>
        </defs>
    </svg>
    <div class="max-w-7xl px-6 lg:flex lg:gap-x-10 lg:px-8">
        <div class="mx-auto max-w-2xl lg:flex-auto md:my-20 my-16">
            <h1 class="mt-10 animate-fade-in-left-bounce text-4xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-5xl ">
                Welcome to the<span class="text-outline"> API Hub</span>
            </h1>
            <p class="mt-6 leading-8 animate-fade-in-left-bounce-2 text-slate-600 dark:text-slate-300">
                Browse Public <span class="text-slate-800 dark:text-slate-300 font-semibold">Rest APIs</span> in the Velixs API Hub - API directory. <span class="text-slate-800 dark:text-slate-300 font-semibold">Register today Free!</span>
            </p>
        </div>
    </div>
    <div class="absolute left-[5rem] bottom-0 flex h-8 items-end overflow-hidden">
        <div class="flex -mb-px h-[2px] w-[29rem] -scale-x-100">
            <div class="w-full flex-none blur-sm [background-image:linear-gradient(90deg,rgba(56,189,248,0)_0%,#0EA5E9_32.29%,rgba(236,72,153,0.3)_67.19%,rgba(236,72,153,0)_100%)]"></div>
            <div class="-ml-[100%] w-full flex-none blur-[1px] [background-image:linear-gradient(90deg,rgba(56,189,248,0)_0%,#0EA5E9_32.29%,rgba(236,72,153,0.3)_67.19%,rgba(236,72,153,0)_100%)]"></div>
        </div>
    </div>
</div>
<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 mt-6 ">
    <div class="flex justify-between items-end text-slate-700 dark:text-slate-400">
        <div class="mb-2">
            <p class="font-semibold">Popular APIs</p>
            <span class="text-xs hidden md:block">APIs that are popular and frequently used on VelixsAPI</span>
        </div>
        <div class="slider-top-action">
            <button>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M13 15l-3 -3l3 -3"></path>
                    <path d="M21 12a9 9 0 1 0 -18 0a9 9 0 0 0 18 0z"></path>
                </svg>
            </button>
            <button>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M11 9l3 3l-3 3"></path>
                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0z"></path>
                </svg>
            </button>
        </div>
    </div>
    <div class="grid-cols-1 gap-5 sm:grid-cols-2 gap-y-6 lg:grid-cols-4 slider-top p-1">
        <a href="" class="relative transform transition-all animate-popup-in">
            <div class="bg-white shadow dark:bg-gray-900 p-3 rounded-xl overflow-hidden min-h-[9rem]">
                <div class="flex items-center justify-between">
                    <div class="flex h-8 w-8 lg:w-9 lg:h-9 flex-shrink-0 overflow-hidden mr-2 rounded-full shadow-xl">
                        <img alt="" class="object-cover w-full h-full" src="{!! asset('storage/apis/1.png') !!}">
                    </div>
                    <div class="text-base font-medium text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="dark:text-slate-500 text-slate-500" width="19" height="19" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path>
                        </svg>
                    </div>
                </div>
                <div class="mt-2 dark:text-white line-clamp-1">
                    Google Translate sdsadas das asdas dasd asd as
                </div>
                <div class="mt-1 text-xs text-slate-600 dark:text-slate-400 line-clamp-3">
                    Translate text to 100+ languages ​. Fast processing, cost saving. Free up to 100,000 characters per month
                </div>
            </div>
        </a>
        <a href="" class="relative transform transition-all animate-popup-in">
            <div class="bg-white shadow dark:bg-gray-900 p-3 rounded-xl overflow-hidden min-h-[9rem]">
                <div class="flex items-center justify-between">
                    <div class="flex h-8 w-8 lg:w-9 lg:h-9 flex-shrink-0 overflow-hidden mr-2 rounded-full shadow-xl">
                        <img alt="" class="object-cover w-full h-full" src="{!! asset('storage/apis/1.png') !!}">
                    </div>
                    <div class="text-base font-medium text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="dark:text-slate-500 text-slate-500" width="19" height="19" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path>
                        </svg>
                    </div>
                </div>
                <div class="mt-2 dark:text-white line-clamp-1">
                    Google Translate
                </div>
                <div class="mt-1 text-xs text-slate-600 dark:text-slate-400 line-clamp-3">
                    Translate text to 100+ languages ​.
                </div>
            </div>
        </a>
        <a href="" class="relative transform transition-all animate-popup-in">
            <div class="bg-white shadow dark:bg-gray-900 p-3 rounded-xl overflow-hidden min-h-[9rem]">
                <div class="flex items-center justify-between">
                    <div class="flex h-8 w-8 lg:w-9 lg:h-9 flex-shrink-0 overflow-hidden mr-2 rounded-full shadow-xl">
                        <img alt="" class="object-cover w-full h-full" src="{!! asset('storage/apis/1.png') !!}">
                    </div>
                    <div class="text-base font-medium text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="dark:text-slate-500 text-slate-500" width="19" height="19" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path>
                        </svg>
                    </div>
                </div>
                <div class="mt-2 dark:text-white line-clamp-1">
                    Google Translate sdsadas das asdas dasd asd as
                </div>
                <div class="mt-1 text-xs text-slate-600 dark:text-slate-400 line-clamp-3">
                    Translate text to 100+ languages ​. Fast processing, cost saving. Free up to 100,000 characters per month
                </div>
            </div>
        </a>
        <a href="" class="relative transform transition-all animate-popup-in">
            <div class="bg-white shadow dark:bg-gray-900 p-3 rounded-xl overflow-hidden min-h-[9rem]">
                <div class="flex items-center justify-between">
                    <div class="flex h-8 w-8 lg:w-9 lg:h-9 flex-shrink-0 overflow-hidden mr-2 rounded-full shadow-xl">
                        <img alt="" class="object-cover w-full h-full" src="{!! asset('storage/apis/1.png') !!}">
                    </div>
                    <div class="text-base font-medium text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="dark:text-slate-500 text-slate-500" width="19" height="19" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path>
                        </svg>
                    </div>
                </div>
                <div class="mt-2 dark:text-white line-clamp-1">
                    Google Translate
                </div>
                <div class="mt-1 text-xs text-slate-600 dark:text-slate-400 line-clamp-3">
                    Translate text to 100+ languages ​. Fast processing, cost saving. Free up to 100,000 characters per month
                </div>
            </div>
        </a>
        <a href="" class="relative transform transition-all animate-popup-in">
            <div class="bg-white shadow dark:bg-gray-900 p-3 rounded-xl overflow-hidden min-h-[9rem]">
                <div class="flex items-center justify-between">
                    <div class="flex h-8 w-8 lg:w-9 lg:h-9 flex-shrink-0 overflow-hidden mr-2 rounded-full shadow-xl">
                        <img alt="" class="object-cover w-full h-full" src="{!! asset('storage/apis/1.png') !!}">
                    </div>
                    <div class="text-base font-medium text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="dark:text-slate-500 text-slate-500" width="19" height="19" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path>
                        </svg>
                    </div>
                </div>
                <div class="mt-2 dark:text-white line-clamp-1">
                    Google Translate sdsadas das asdas dasd asd as
                </div>
                <div class="mt-1 text-xs text-slate-600 dark:text-slate-400 line-clamp-3">
                    Translate text to 100+ languages ​. Fast processing, cost saving. Free up to 100,000 characters per month
                </div>
            </div>
        </a>
        <a href="" class="relative transform transition-all animate-popup-in">
            <div class="bg-white shadow dark:bg-gray-900 p-3 rounded-xl overflow-hidden min-h-[9rem]">
                <div class="flex items-center justify-between">
                    <div class="flex h-8 w-8 lg:w-9 lg:h-9 flex-shrink-0 overflow-hidden mr-2 rounded-full shadow-xl">
                        <img alt="" class="object-cover w-full h-full" src="{!! asset('storage/apis/1.png') !!}">
                    </div>
                    <div class="text-base font-medium text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="dark:text-slate-500 text-slate-500" width="19" height="19" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path>
                        </svg>
                    </div>
                </div>
                <div class="mt-2 dark:text-white line-clamp-1">
                    Google Translate sdsadas das asdas dasd asd as
                </div>
                <div class="mt-1 text-xs text-slate-600 dark:text-slate-400 line-clamp-3">
                    Translate text to 100+ languages ​. Fast processing, cost saving. Free up to 100,000 characters per month
                </div>
            </div>
        </a>
    </div>
</div>
<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 mt-6 ">
    <div class="mb-2 text-slate-700 dark:text-slate-400">
        <p class="font-semibold">Latest APIs</p>
        <span class="text-xs">More APIs ready to use.</span>
    </div>
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 gap-y-6 lg:grid-cols-4">
        <a href="" class="relative transform transition-all animate-popup-in">
            <div class="bg-white shadow dark:bg-gray-900 p-3 rounded-xl overflow-hidden min-h-[9rem]">
                <div class="flex items-center justify-between">
                    <div class="flex h-8 w-8 lg:w-9 lg:h-9 flex-shrink-0 overflow-hidden mr-2 rounded-full shadow-xl">
                        <img alt="" class="object-cover w-full h-full" src="{!! asset('storage/apis/1.png') !!}">
                    </div>
                    <div class="text-base font-medium text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="dark:text-slate-500 text-slate-500" width="19" height="19" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path>
                        </svg>
                    </div>
                </div>
                <div class="mt-2 dark:text-white line-clamp-1">
                    Google Translate sdsadas das asdas dasd asd as
                </div>
                <div class="mt-1 text-xs text-slate-600 dark:text-slate-400 line-clamp-3">
                    Translate text to 100+ languages ​. Fast processing, cost saving. Free up to 100,000 characters per month
                </div>
            </div>
        </a>
    </div>
</div>
@endsection

@push('css')
<link rel="stylesheet" href="{!! asset('assets/tiny-slider.css') !!}">
@endpush

@push('js')
<script src="{!! asset('assets/tiny-slider.js') !!}"></script><script> tns({ container: '.slider-top', items: 4, fixedWidth: 280, gutter: 20, nav: false, autoplay: true, autoplayButtonOutput: false, controlsContainer: '.slider-top-action', }); </script>
@endpush
