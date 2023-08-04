<div>


    <main>
        <div class="relative isolate overflow-hidden">
            <svg viewBox="0 0 1108 632" aria-hidden="true" class="absolute top-10 left-[calc(50%-4rem)] -z-10 w-[69.25rem] max-w-none transform-gpu blur-3xl sm:left-[calc(50%-18rem)] lg:left-48 lg:top-[calc(50%-30rem)] xl:left-[calc(50%-24rem)]">
                <path fill="url(#175c433f-44f6-4d59-93f0-c5c51ad5566d)" fill-opacity=".2" d="M235.233 402.609 57.541 321.573.83 631.05l234.404-228.441 320.018 145.945c-65.036-115.261-134.286-322.756 109.01-230.655C968.382 433.026 1031 651.247 1092.23 459.36c48.98-153.51-34.51-321.107-82.37-385.717L810.952 324.222 648.261.088 235.233 402.609Z" />
                <defs>
                    <linearGradient id="175c433f-44f6-4d59-93f0-c5c51ad5566d" x1="1220.59" x2="-85.053" y1="432.766" y2="638.714" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#4F46E5"></stop>
                        <stop offset="1" stop-color="#80CAFF"></stop>
                    </linearGradient>
                </defs>
            </svg>
            <div class="mx-auto max-w-7xl px-6 pb-10 sm:pb-32 lg:flex lg:py-40 lg:px-8">
                @foreach ($blogs as $blog)
                    <div class="mx-auto max-w-2xl flex-shrink-0 lg:mx-0 lg:max-w-xl lg:pt-8 pt-16">
                        <a href="{!! route('blog.detail',$blog->slug) !!}" class="max-w-3xl sm:max-w-5xl lg:max-w-none">
                            <div class="max-w-full min-w-full lg:w-[35rem] aspect-w-4 aspect-h-[2.7] mb-4 overflow-hidden rounded-lg bg-gray-300 dark:bg-gray-700 animate-popup-in" wire:loading.remove>
                                <img class="w-full object-cover object-center" src="{!! asset($blog->_image()) !!}" alt="{{ $blog->title }}">
                            </div>
                            <div class="max-w-full min-w-full lg:w-[35rem] aspect-w-4 aspect-h-[2.7] mb-4 overflow-hidden rounded-lg bg-gray-300 dark:bg-gray-700 animate-pulse" wire:loading></div>
                        </a>
                    </div>
                    <div class="mx-auto max-w-2xl sm:ml-10 lg:mr-0">
                        <a href="{!! route('blog.detail',$blog->slug) !!}">
                            <h1 class="mt-10 font-bold tracking-tight leading-[1.1] text-slate-900 dark:text-white lg:text-3xl text-2xl transition-all animate-fade-in-left-bounce">{{ $blog->title }}</h1>
                        </a>
                        <p class="mt-1 lg:mt-6 leading-8 text-slate-600 dark:text-slate-300 transition-all animate-fade-in-left-bounce-2">{{ $blog->meta_description }}</p>
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
                                    </svg>Published on {{ $blog->created_at->format('d F') }}
                                </div>
                                <div class="flex items-center mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                        <path d="M13.5 6.5l4 4"></path>
                                    </svg>Ditulis oleh {{ $blog->_author->name }}
                                </div>
                                <div class="flex items-center mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M7.859 6h-2.834a2.025 2.025 0 0 0 -2.025 2.025v2.834c0 .537 .213 1.052 .593 1.432l6.116 6.116a2.025 2.025 0 0 0 2.864 0l2.834 -2.834a2.025 2.025 0 0 0 0 -2.864l-6.117 -6.116a2.025 2.025 0 0 0 -1.431 -.593z"></path>
                                        <path d="M17.573 18.407l2.834 -2.834a2.025 2.025 0 0 0 0 -2.864l-7.117 -7.116"></path>
                                        <path d="M6 9h-.01"></path>
                                    </svg>Fill in
                                    @foreach ($blog->_tags() as $tag)
                                        <button type="button" wire:click='setTags("{{$tag->slug}}")' class="bg-slate-200 hover:bg-slate-300 dark:text-slate-100 text-slate-800 dark:bg-slate-700 dark:hover:bg-slate-600 px-2.5 font-medium py-1 text-xs rounded-full ml-2">{{ $tag->title }}</button>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @break
                @endforeach
            </div>
        </div>

        {{-- <div class="border-b border-t relative dark:bg-slate-950 dark:border-slate-800/50 bg-white py-3 md:py-4 text-sm dark:text-slate-50 text-slate-800">
            <div class="grid grid-cols-12 max-w-screen-2xl mx-auto">
                <section class="col-span-10 col-start-2">
                    <div class="flex items-center gap-x-2">
                        <a href="{!! route('main') !!}" class="font-semibold text-invert whitespace-nowrap gap-x-2 items-center sm:flex hidden" href="{!! route('main') !!}">
                            <svg class="w-3.5 h-3.5 inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M9.293 2.293a1 1 0 011.414 0l7 7A1 1 0 0117 11h-1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-3a1 1 0 00-1-1H9a1 1 0 00-1 1v3a1 1 0 01-1 1H5a1 1 0 01-1-1v-6H3a1 1 0 01-.707-1.707l7-7z" clip-rule="evenodd" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-3.5 h-3.5 inline">
                                <path d="M9 6l6 6l-6 6"></path>
                            </svg>
                        </a>
                        <button type="button" wire:click="resetFilter" data-click="top" class="font-semibold inline-flex text-invert whitespace-nowrap gap-x-2 items-center" href="{!! route('blog') !!}">Blog
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-3.5 h-3.5 inline">
                                <path d="M9 6l6 6l-6 6"></path>
                            </svg>
                        </button>
                        <span class="line-clamp-1 font-semibold text-slate-500 dark:text-slate-400">{{ $navbar_active }}</span>
                    </div>
                </section>
            </div>
        </div> --}}

        <div class="relative px-6 pb-20 lg:px-10 lg:pb-28">
            <div class="relative mx-auto max-w-7xl">
                <div class="mx-auto mt-12 grid gap-7 lg:grid-cols-3 md:grid-cols-2">
                    @foreach ($blogs as $index => $blog)
                        @if ($index == 0)
                            @continue
                        @endif
                        {{-- lazy load --}}
                        <section class="flex flex-col overflow-hidden rounded-xl transform transition-all animate-pulse" wire:loading>
                            <div class="flex flex-col justify-between">
                                <div class="aspect-w-4 aspect-h-[2.7] mb-4 overflow-hidden rounded-lg bg-gray-300 dark:bg-gray-700"></div>
                                <div class="px-2 pb-5">
                                    <div class="flex-1">
                                        <div class="mt-4 block">
                                            <p class="h-2 w-[80%] bg-gray-400 dark:bg-gray-800 rounded"></p>
                                            <p class="h-2 mt-5 bg-gray-300 dark:bg-gray-700 rounded"></p>
                                            <p class="h-2 mt-3 bg-gray-300 dark:bg-gray-700 rounded"></p>
                                        </div>
                                    </div>
                                    <div class="mt-3 flex items-center">
                                        <div class="flex-shrink-0">
                                            <a href="#">
                                                <span class="sr-only">Ilsya</span>
                                                <div class="rounded-full bg-gray-300 dark:bg-gray-700 h-7 w-7"></div>
                                            </a>
                                        </div>
                                        <div class="ml-3">
                                            <div class="h-2 w-20 bg-gray-300 dark:bg-gray-700 rounded"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        {{-- lazy load --}}
                        <section class="flex flex-col overflow-hidden rounded-xl transform transition-all animate-popup-in" wire:loading.remove>
                            <div class="flex flex-1 flex-col justify-between">
                                <a href="{!! route('blog.detail', $blog->slug) !!}" class="aspect-w-4 aspect-h-[2.7] mb-4 overflow-hidden rounded-lg bg-gray-300 dark:bg-gray-700">
                                    <img src="{!! asset($blog->_image()) !!}" alt="{{ $blog->title }}" class="object-cover object-center hover:scale-105 w-full h-full transition-transform duration-300">
                                </a>
                                <div class="px-2 pb-5">
                                    <div class="flex-1">
                                        <div class="flex items-center gap-x-2 text-xs">
                                            <time class="text-slate-400">{{ $blog->created_at->diffForHumans() }}</time>
                                            @foreach ($blog->_tags() as $index => $tag)
                                                @if ($index <= 1)
                                                    <button type="button" wire:click='setTags("{{$tag->slug}}")' class="click-top bg-slate-100 hover:bg-slate-300 dark:text-slate-100 text-slate-800 dark:bg-slate-700 dark:hover:bg-slate-600 px-2.5 font-medium py-1 text-xs rounded-full">
                                                        {{ $tag->title }}
                                                    </button>
                                                @else
                                                    <div class="bg-slate-100 dark:text-slate-100 text-slate-800 dark:bg-slate-700 px-2.5 font-medium py-1 text-xs rounded-full">
                                                        ...
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <a href="{!! route('blog.detail', $blog->slug) !!}" class="mt-2 block">
                                            <p class="font-semibold text-gray-900 dark:text-gray-200 overflow-hidden line-clamp-1">{{ $blog->title }}</p>
                                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400 overflow-hidden line-clamp-2">{{ $blog->meta_description }}</p>
                                        </a>
                                    </div>
                                    <div class="mt-3 flex items-center">
                                        <div class="flex-shrink-0">
                                            <a href="{!! route('profile',$blog->_author->username) !!}">
                                                <span class="sr-only">{{ $blog->_author->name }}</span>
                                                <img class="h-7 w-7 rounded-full" src="{{ $blog->_author->_avatar() }}" alt="">
                                            </a>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                                <a href="{!! route('profile',$blog->_author->username) !!}">{{ $blog->_author->name }}</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </section>
                    @endforeach
                </div>

                {!! $blogs->links('layouts.landing.wire-pagination') !!}

            </div>
        </div>
    </main>

    <script>
        document.addEventListener('livewire:load', function () {
            Livewire.on('scrollToTop', function () {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
    </script>
</div>

