@extends('layouts.landing.main')

@section('content')

<main>
    <div class="relative lg:border-t dark:border-slate-900 isolate overflow-hidden bg-white dark:bg-slate-950">
        <svg class="inline dark:hidden absolute inset-0 -z-10 h-full w-full stroke-slate-200 [mask-image:radial-gradient(100%_100%_at_top_right,white,transparent)]" aria-hidden="true">
            <defs>
                <pattern id="0787a7c5-978c-4f66-83c7-11c213f99cb7" width="200" height="200" x="50%" y="-1" patternUnits="userSpaceOnUse">
                    <path d="M.5 200V.5H200" fill="none"></path>
                </pattern>
            </defs>
            <rect width="100%" height="100%" stroke-width="0" fill="url(#0787a7c5-978c-4f66-83c7-11c213f99cb7)"></rect>
        </svg>
        <svg class="dark:inline hidden absolute inset-0 -z-10 h-full w-full stroke-white/10 [mask-image:radial-gradient(100%_100%_at_top_right,white,transparent)]" aria-hidden="true">
            <defs>
                <pattern id="983e3e4c-de6d-4c3f-8d64-b9761d1534cc" width="200" height="200" x="50%" y="-1" patternUnits="userSpaceOnUse">
                    <path d="M.5 200V.5H200" fill="none"></path>
                </pattern>
            </defs>
            <svg x="50%" y="-1" class="overflow-visible dark:inline hidden fill-slate-800/20">
                <path d="M-200 0h201v201h-201Z M600 0h201v201h-201Z M-400 600h201v201h-201Z M200 800h201v201h-201Z" stroke-width="0"></path>
            </svg>
            <rect width="100%" height="100%" stroke-width="0" fill="url(#983e3e4c-de6d-4c3f-8d64-b9761d1534cc)"></rect>
        </svg>
        <svg viewBox="0 0 1108 632" aria-hidden="true" class="dark:inline hidden absolute top-10 left-[calc(50%-4rem)] -z-10 w-[69.25rem] max-w-none transform-gpu blur-3xl sm:left-[calc(50%-18rem)] lg:left-48 lg:top-[calc(50%-30rem)] xl:left-[calc(50%-24rem)]">
            <path fill="url(#175c433f-44f6-4d59-93f0-c5c51ad5566d)" fill-opacity=".2" d="M235.233 402.609 57.541 321.573.83 631.05l234.404-228.441 320.018 145.945c-65.036-115.261-134.286-322.756 109.01-230.655C968.382 433.026 1031 651.247 1092.23 459.36c48.98-153.51-34.51-321.107-82.37-385.717L810.952 324.222 648.261.088 235.233 402.609Z"></path>
            <defs>
                <linearGradient id="175c433f-44f6-4d59-93f0-c5c51ad5566d" x1="1220.59" x2="-85.053" y1="432.766" y2="638.714" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#4F46E5"></stop>
                    <stop offset="1" stop-color="#80CAFF"></stop>
                </linearGradient>
            </defs>
        </svg>
        <div class="mx-auto max-w-7xl px-6 pb-10 sm:pb-32 lg:flex lg:py-40 lg:px-8">
            <div class="mx-auto max-w-2xl flex-shrink-0 lg:mx-0 lg:max-w-xl lg:pt-8 pt-16">
                <div class="max-w-full min-w-full lg:w-[35rem] aspect-w-4 aspect-h-[2.7] mb-4 overflow-hidden rounded-lg bg-gray-300 dark:bg-gray-700 animate-popup-in" wire:loading.remove>
                    <img class="w-full object-cover object-center rounded-lg sm:max-w-full h-full lg:h-96 transform transition-all duration-150" src="{!! $row->_image() !!}" alt="{{ $row->title }}">
                </div>
            </div>
            <div class="mx-auto max-w-2xl sm:ml-10 lg:mr-0">
                <h1 class="mt-10 font-bold tracking-tight leading-[1.1] text-slate-900 dark:text-white lg:text-3xl text-2xl transition-all animate-fade-in-left-bounce">{{ $row->title }}</h1>
                <p class="mt-1 lg:mt-6 leading-8 text-slate-600 dark:text-slate-300 transition-all animate-fade-in-left-bounce-2">{{ $row->meta_description }}</p>
                <div class="font-mono tracking-tighter text-xs sm:text-sm mt-4">
                    <span class="h-px mt-6 mb-5 w-full hidden md:inline-block bg-gradient-to-r from-slate-300 dark:from-slate-700 via-transparent to-transparent"></span>
                    <div class="text-slate-500 dark:text-slate-400">
                        {{-- <div class="flex items-center mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="22" height="22" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                <path d="M12 12h3.5"></path>
                                <path d="M12 7v5"></path>
                            </svg>
                            1 min read
                        </div> --}}
                        <div class="flex items-center mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z"></path>
                                <path d="M16 3v4"></path>
                                <path d="M8 3v4"></path>
                                <path d="M4 11h16"></path>
                                <path d="M11 15h1"></path>
                                <path d="M12 15v3"></path>
                            </svg>Published on {{ $row->created_at->format('d M, Y') }}
                        </div>
                        <div class="flex items-center mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                <path d="M13.5 6.5l4 4"></path>
                            </svg>Ditulis oleh <a class="ml-1.5 font-semibold" href="{!! route('profile',$row->_author->username) !!}">{{ $row->_author->name }}</a>
                        </div>
                        <div class="flex items-center mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M7.859 6h-2.834a2.025 2.025 0 0 0 -2.025 2.025v2.834c0 .537 .213 1.052 .593 1.432l6.116 6.116a2.025 2.025 0 0 0 2.864 0l2.834 -2.834a2.025 2.025 0 0 0 0 -2.864l-6.117 -6.116a2.025 2.025 0 0 0 -1.431 -.593z"></path>
                                <path d="M17.573 18.407l2.834 -2.834a2.025 2.025 0 0 0 0 -2.864l-7.117 -7.116"></path>
                                <path d="M6 9h-.01"></path>
                            </svg><span class="mr-1">Fill</span>in
                            <div class="ml-3 flex flex-wrap">
                                @foreach ($row->_tags() as $tag)
                                    <a href="{!! route('blog', ['tags'=> $tag->slug]) !!}" class="badge-fillin mb-1 mr-1" href="">{{$tag->title}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="border-b border-t relative dark:bg-slate-950 dark:border-slate-800/50 bg-white py-3 md:py-4 text-sm dark:text-slate-50 text-slate-800">
        <div class="grid grid-cols-12 max-w-screen-2xl mx-auto">
            <section class="col-span-10 col-start-2">
                <div class="flex items-center gap-x-2">
                    <a href="{!! route('main') !!}" class="font-semibold text-invert whitespace-nowrap gap-x-2 items-center sm:flex hidden" href="#">
                        <svg class="w-3.5 h-3.5 inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M9.293 2.293a1 1 0 011.414 0l7 7A1 1 0 0117 11h-1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-3a1 1 0 00-1-1H9a1 1 0 00-1 1v3a1 1 0 01-1 1H5a1 1 0 01-1-1v-6H3a1 1 0 01-.707-1.707l7-7z" clip-rule="evenodd" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-3.5 h-3.5 inline">
                            <path d="M9 6l6 6l-6 6"></path>
                        </svg>
                    </a>
                    <a href="{!! route('blog') !!}" class="font-semibold inline-flex text-invert whitespace-nowrap gap-x-2 items-center" href="#">Blog
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-3.5 h-3.5 inline">
                            <path d="M9 6l6 6l-6 6"></path>
                        </svg>
                    </a>
                    <span class="line-clamp-1 font-semibold text-slate-500 dark:text-slate-400">{{ $row->title }}</span>
                </div>
            </section>
        </div>
    </div>

    <div class="text-slate-950 dark:text-slate-300 bg-slate-50 dark:bg-slate-900">
        <div class="grid grid-cols-12 max-w-screen-2xl mx-auto">
            <section class="col-span-10 col-start-2">
                <div class="sm:grid sm:grid-cols-12">
                    <section class="sm:col-span-12 sm:col-start-2">
                        <div class="grid grid-cols-1 gap-12 lg:grid-cols-12">
                            <div class="hidden lg:col-span-1 lg:block">
                                <section class="sticky top-10 mt-0 py-12 print:hidden">
                                    <div class="flex flex-col items-center">
                                    </div>
                                </section>
                            </div>
                            <div class="lg:col-span-9">
                                <div class="lg:bg-white dark:lg:bg-black/20 lg:border-l lg:border-r dark:border-slate-800/40 lg:p-20 py-12">
                                    <article class="prose dark:prose-invert prose-img:rounded-xl prose-pre:p-0 prose-pre:m-0 prose-pre:bg-transparent prose-pre:rounded-none">
                                        {!! $row->content !!}
                                    </article>

                                    <!-- card react statistic -->
                                    <div x-data x-bind:class="$store.navbarMobile ? 'duration-300 translate-y-0' : 'duration-500 lg:translate-y-0 translate-y-12'" class="sticky bottom-20 transition-transform transform z-10 mt-16 lg:bottom-8 lg:mt-24">

                                        <div class="min-w-0 flex-1">
                                            <div class="mx-auto max-w-[360px] px-4 sm:max-w-[420px] sm:px-0">

                                                <div class="pointer-events-auto relative flex items-center justify-between rounded-xl border p-4 border-slate-200 dark:border-slate-800">
                                                    <div class="absolute inset-0 rounded-xl bg-white/70 backdrop-blur lg:dark:bg-slate-900/80 dark:bg-slate-950/50"></div>

                                                    <!-- emot react -->
                                                    <div class="flex items-center gap-4">
                                                        <div class="flex flex-col items-center gap-2" x-data="{ imgSrc: '{!! asset('assets/img/emojis/clapping-hands.png') !!}' }">
                                                            <button class="btn-react relative cursor-pointer select-none group" x-on:mouseenter="imgSrc = '{!! asset('assets/img/emojis/clapping-hands-animated.png') !!}'" x-on:mouseleave="imgSrc = '{!! asset('assets/img/emojis/clapping-hands.png') !!}'">
                                                                <div data-react="clap" class="h-10 w-10 group-hover:scale-125 transition-transform duration-200 ease-in-out">
                                                                    <img alt="Clap" x-bind:src="imgSrc" class="pointer-events-none h-full w-full">
                                                                </div>
                                                            </button>
                                                            <div class="relative flex h-6 items-center rounded-full bg-slate-200 py-1 px-2 dark:bg-[#1d263a]">
                                                                <span class="flex text-sm font-bold text-slate-600 dark:text-slate-300 h-5 items-center" id="count-clap">{{ $react_count['clap'] ?? 0 }}</span>
                                                            </div>
                                                        </div>

                                                        <div class="flex flex-col items-center gap-2" x-data="{ imgSrc: '{!! asset('assets/img/emojis/astonished-face.png') !!}' }">
                                                            <button class="btn-react relative cursor-pointer select-none group" x-on:mouseenter="imgSrc = '{!! asset('assets/img/emojis/astonished-face-animated.png') !!}'" x-on:mouseleave="imgSrc = '{!! asset('assets/img/emojis/astonished-face.png') !!}'">
                                                                <div data-react="wow" class="h-10 w-10 group-hover:scale-125 transition-transform duration-200 ease-in-out">
                                                                    <img alt="Wow" x-bind:src="imgSrc" class="pointer-events-none h-full w-full">
                                                                </div>
                                                            </button>
                                                            <div class="relative flex h-6 items-center rounded-full bg-slate-200 py-1 px-2 dark:bg-[#1d263a]">
                                                                <span class="flex text-sm font-bold text-slate-600 dark:text-slate-300 h-5 items-center" id="count-wow">{{ $react_count['wow'] ?? 0 }}</span>
                                                            </div>
                                                        </div>

                                                        <div class="flex flex-col items-center gap-2" x-data="{ imgSrc: '{!! asset('assets/img/emojis/face-with-monocle.png') !!}' }">
                                                            <button class="btn-react relative cursor-pointer select-none group" x-on:mouseenter="imgSrc = '{!! asset('assets/img/emojis/face-with-monocle-animated.png') !!}'" x-on:mouseleave="imgSrc = '{!! asset('assets/img/emojis/face-with-monocle.png') !!}'">
                                                                <div data-react="hmm" class="h-10 w-10 group-hover:scale-125 transition-transform duration-200 ease-in-out">
                                                                    <img alt="Hmm" x-bind:src="imgSrc" class="pointer-events-none h-full w-full">
                                                                </div>
                                                            </button>
                                                            <div class="relative flex h-6 items-center rounded-full bg-slate-200 py-1 px-2 dark:bg-[#1d263a]">
                                                                <span class="flex text-sm font-bold text-slate-600 dark:text-slate-300 h-5 items-center" id="count-hmm">{{ $react_count['hmm'] ?? 0 }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- emot react -->

                                                    <!-- share and statistic -->
                                                    <div class="flex items-start gap-2">

                                                        <div class="flex flex-col items-center gap-2">
                                                            <div x-data="{ modal : false }">
                                                                <div x-show="modal" x-on:click.away="modal = false" x-transition class="absolute inset-x-2 bottom-24 z-[902] flex flex-col overflow-hidden rounded-2xl border bg-white/70 pb-2 pt-1 backdrop-blur dark:bg-slate-900/80 dark:border-slate-800 border-slate-200" tabindex="-1" data-headlessui-state="open" style="opacity: 1; transform: none;" id="headlessui-popover-panel-:r9:">
                                                                    <div class="flex justify-evenly py-2 text-sm">
                                                                        <div class="flex flex-col items-center gap-1">
                                                                            <div class="">~ Views ~</div>
                                                                            <div class="text-lg">{{ $row->countView() }}</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <button x-on:click="modal =! modal" class="relative z-10 flex h-10 w-10 items-center justify-center rounded-full hover:bg-slate-200 hover:dark:bg-[#1d263a]" type="button" aria-expanded="false" data-headlessui-state="" id="headlessui-popover-button-:r4:">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke="currentColor" fill="none" class="h-5 w-5">
                                                                        <line x1="18" y1="20" x2="18" y2="10"></line>
                                                                        <line x1="12" y1="20" x2="12" y2="4"></line>
                                                                        <line x1="6" y1="20" x2="6" y2="14"></line>
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </div>

                                                        <!-- btn share start-->
                                                        <div class="flex flex-col items-center gap-2">
                                                            <div x-data="{ modal: false }">

                                                                <!-- modal share start-->
                                                                <div x-show="modal" x-on:click.away="modal = false" x-transition class="absolute bottom-24 right-2 z-[902] flex w-56 flex-col overflow-hidden rounded-2xl border bg-white/70 pb-2 pt-1 backdrop-blur dark:border-slate-800 dark:bg-slate-900/80">
                                                                    <div class="py-3 px-4 text-center text-[13px] text-lg font-bold" role="none">Share this on</div>
                                                                    <a href="https://www.facebook.com/sharer/sharer.php?u={!! url()->current() !!}" target="_blank" rel="noreferrer nofollow" class="flex w-full items-center gap-3 px-4 py-2 text-[13px] hover:bg-slate-100 hover:dark:bg-[#1d263a]" role="none">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                            <path d="M12 10.174c1.766 -2.784 3.315 -4.174 4.648 -4.174c2 0 3.263 2.213 4 5.217c.704 2.869 .5 6.783 -2 6.783c-1.114 0 -2.648 -1.565 -4.148 -3.652a27.627 27.627 0 0 1 -2.5 -4.174z"></path>
                                                                            <path d="M12 10.174c-1.766 -2.784 -3.315 -4.174 -4.648 -4.174c-2 0 -3.263 2.213 -4 5.217c-.704 2.869 -.5 6.783 2 6.783c1.114 0 2.648 -1.565 4.148 -3.652c1 -1.391 1.833 -2.783 2.5 -4.174z"></path>
                                                                         </svg>
                                                                        <span class="flex items-center gap-2" role="none">
                                                                            Facebook
                                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-3 w-3" role="none">
                                                                                <path fill-rule="evenodd" d="M4.25 5.5a.75.75 0 00-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 00.75-.75v-4a.75.75 0 011.5 0v4A2.25 2.25 0 0112.75 17h-8.5A2.25 2.25 0 012 14.75v-8.5A2.25 2.25 0 014.25 4h5a.75.75 0 010 1.5h-5z" clip-rule="evenodd" role="none"></path>
                                                                                <path fill-rule="evenodd" d="M6.194 12.753a.75.75 0 001.06.053L16.5 4.44v2.81a.75.75 0 001.5 0v-4.5a.75.75 0 00-.75-.75h-4.5a.75.75 0 000 1.5h2.553l-9.056 8.194a.75.75 0 00-.053 1.06z" clip-rule="evenodd" role="none"></path>
                                                                            </svg>
                                                                        </span>
                                                                    </a>
                                                                    <a href="https://twitter.com/intent/tweet?via=ilsya&amp;url={!! url()->current() !!}" target="_blank" rel="noreferrer nofollow" class="flex w-full items-center gap-3 px-4 py-2 text-[13px] hover:bg-slate-100 hover:dark:bg-[#1d263a]" role="none">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" role="img" fill="currentColor" class="h-4 w-4">
                                                                            <title role="none">Twitter Icon</title>
                                                                            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" role="none"></path>
                                                                        </svg>
                                                                        <span class="flex items-center gap-2" role="none">
                                                                            Twitter
                                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-3 w-3" role="none">
                                                                                <path fill-rule="evenodd" d="M4.25 5.5a.75.75 0 00-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 00.75-.75v-4a.75.75 0 011.5 0v4A2.25 2.25 0 0112.75 17h-8.5A2.25 2.25 0 012 14.75v-8.5A2.25 2.25 0 014.25 4h5a.75.75 0 010 1.5h-5z" clip-rule="evenodd" role="none"></path>
                                                                                <path fill-rule="evenodd" d="M6.194 12.753a.75.75 0 001.06.053L16.5 4.44v2.81a.75.75 0 001.5 0v-4.5a.75.75 0 00-.75-.75h-4.5a.75.75 0 000 1.5h2.553l-9.056 8.194a.75.75 0 00-.053 1.06z" clip-rule="evenodd" role="none"></path>
                                                                            </svg>
                                                                        </span>
                                                                    </a>
                                                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={!! url()->current() !!}" target="_blank" rel="noreferrer nofollow" class="flex w-full items-center gap-3 px-4 py-2 text-[13px] hover:bg-slate-100 hover:dark:bg-[#1d263a]" role="none">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                            <path d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path>
                                                                            <path d="M8 11l0 5"></path>
                                                                            <path d="M8 8l0 .01"></path>
                                                                            <path d="M12 16l0 -5"></path>
                                                                            <path d="M16 16v-3a2 2 0 0 0 -4 0"></path>
                                                                         </svg>
                                                                        <span class="flex items-center gap-2" role="none">
                                                                            Linkedin
                                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-3 w-3" role="none">
                                                                                <path fill-rule="evenodd" d="M4.25 5.5a.75.75 0 00-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 00.75-.75v-4a.75.75 0 011.5 0v4A2.25 2.25 0 0112.75 17h-8.5A2.25 2.25 0 012 14.75v-8.5A2.25 2.25 0 014.25 4h5a.75.75 0 010 1.5h-5z" clip-rule="evenodd" role="none"></path>
                                                                                <path fill-rule="evenodd" d="M6.194 12.753a.75.75 0 001.06.053L16.5 4.44v2.81a.75.75 0 001.5 0v-4.5a.75.75 0 00-.75-.75h-4.5a.75.75 0 000 1.5h2.553l-9.056 8.194a.75.75 0 00-.053 1.06z" clip-rule="evenodd" role="none"></path>
                                                                            </svg>
                                                                        </span>
                                                                    </a>
                                                                    <a href="whatsapp://send?text={!! url()->current() !!}" target="_blank" rel="noreferrer nofollow" class="flex w-full items-center gap-3 px-4 py-2 text-[13px] hover:bg-slate-100 hover:dark:bg-[#1d263a]" role="none">
                                                                         <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                            <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9"></path>
                                                                            <path d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1"></path>
                                                                         </svg>
                                                                        <span class="flex items-center gap-2" role="none">
                                                                            Whatsapp
                                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-3 w-3" role="none">
                                                                                <path fill-rule="evenodd" d="M4.25 5.5a.75.75 0 00-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 00.75-.75v-4a.75.75 0 011.5 0v4A2.25 2.25 0 0112.75 17h-8.5A2.25 2.25 0 012 14.75v-8.5A2.25 2.25 0 014.25 4h5a.75.75 0 010 1.5h-5z" clip-rule="evenodd" role="none"></path>
                                                                                <path fill-rule="evenodd" d="M6.194 12.753a.75.75 0 001.06.053L16.5 4.44v2.81a.75.75 0 001.5 0v-4.5a.75.75 0 00-.75-.75h-4.5a.75.75 0 000 1.5h2.553l-9.056 8.194a.75.75 0 00-.053 1.06z" clip-rule="evenodd" role="none"></path>
                                                                            </svg>
                                                                        </span>
                                                                    </a>
                                                                    <div class="border-t dark:border-slate-800" role="none"></div>
                                                                    <button type="button" data-clipboard-text="{!! url()->current() !!}" class="copy-link flex w-full items-center gap-3 px-4 py-2 text-[13px] hover:bg-slate-100 hover:dark:bg-[#1d263a]" role="none">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-4 w-4" role="none">
                                                                            <path fill-rule="evenodd" d="M18.97 3.659a2.25 2.25 0 00-3.182 0l-10.94 10.94a3.75 3.75 0 105.304 5.303l7.693-7.693a.75.75 0 011.06 1.06l-7.693 7.693a5.25 5.25 0 11-7.424-7.424l10.939-10.94a3.75 3.75 0 115.303 5.304L9.097 18.835l-.008.008-.007.007-.002.002-.003.002A2.25 2.25 0 015.91 15.66l7.81-7.81a.75.75 0 011.061 1.06l-7.81 7.81a.75.75 0 001.054 1.068L18.97 6.84a2.25 2.25 0 000-3.182z" clip-rule="evenodd" role="none"></path>
                                                                        </svg>Copy link
                                                                    </button>
                                                                </div>
                                                                <!-- modal share end -->

                                                                <button x-on:click="modal =! modal" class="relative z-10 flex h-10 w-10 items-center justify-center rounded-full bg-slate-200 dark:bg-[#1d263a]" type="button">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                                                                        <path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"></path>
                                                                        <polyline points="16 6 12 2 8 6"></polyline>
                                                                        <line x1="12" y1="2" x2="12" y2="15"></line>
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- share and statistic end-->

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </section>
        </div>
    </div>

</main>

@include('layouts.landing.footer')
@endsection

@push('js')
    <script src="{!! asset('assets/clipboard.min.js') !!}"></script>
    <script src="{{ asset('assets/highlight/highlight.min.js?v=1') }}"></script>
    <script>
        var clipboard = new ClipboardJS('.copy-link');
        clipboard.on('success', function(e) {
            toast.toast({
                style: `<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-sky-400" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.8 10.946a1 1 0 0 0 -1.414 .014a2.5 2.5 0 0 1 -3.572 0a1 1 0 0 0 -1.428 1.4a4.5 4.5 0 0 0 6.428 0a1 1 0 0 0 -.014 -1.414zm-6.19 -5.286l-.127 .007a1 1 0 0 0 .117 1.993l.127 -.007a1 1 0 0 0 -.117 -1.993zm6 0l-.127 .007a1 1 0 0 0 .117 1.993l.127 -.007a1 1 0 0 0 -.117 -1.993z" stroke-width="0" fill="currentColor"></path></svg>`,
                title: 'Link Copied.',
                msg: 'Link copied to clipboard. You can paste it anywhere now.',
            })
        });
        clipboard.on('error', function(e) {
            console.log(e);
        });

        var toasterror = 0;
        document.querySelectorAll('.btn-react').forEach(btn => {
            btn.addEventListener('click', (react) => {
                let reactType = react.target.dataset.react;
                axios.post("{!! route('blog.react.axios') !!}", {
                    react: reactType,
                    blog_id: "{!! $row->id !!}",
                }).then((res) => {
                    let count = document.querySelector(`#count-${reactType}`);
                    count.innerHTML = parseInt(count.innerHTML) + 1;
                }).catch((err) => {
                    if(err.response.data.type=='limit'){
                        if(toasterror >= 2) return;
                        toasterror++;
                        toast.toast({
                            style: `info`,
                            title: 'Limit Reached.',
                            msg: 'You have reached the maximum limit of reactions for this article.',
                        })
                    }
                })
            })
        })

        hljs.highlightAll();
        document.querySelectorAll('pre').forEach((preElement) => {
            const firstDivElement = document.createElement('div');
            firstDivElement.className = 'overflow-hidden rounded-md shadow-2xl mb-3 border dark:border-none';
            preElement.parentElement.insertBefore(firstDivElement, preElement);
            const additionalCodeDiv = document.createElement('div');
            additionalCodeDiv.className = 'bg-slate-100 dark:bg-slate-700 flex items-center py-3 px-3 gap-x-1';
            additionalCodeDiv.innerHTML = '<div class="p-[5px] bg-red-600 inline-block rounded-full"></div><div class="p-[5px] bg-yellow-600 inline-block rounded-full"></div><div class="p-[5px] bg-green-600 inline-block rounded-full"></div>';
            firstDivElement.appendChild(additionalCodeDiv);
            firstDivElement.appendChild(preElement);
        });
    </script>
@endpush

@push('css')
<link rel="stylesheet" href="{{ asset('assets/highlight/tokyo-night-dark.min.css?v=1') }}">
@endpush
