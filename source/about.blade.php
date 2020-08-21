@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="About {{ $page->siteName }}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="A little bit about {{ $page->siteName }}"/>
@endpush

@section('body')

    <h1 class="font-mono text-blue-400 flex justify-start items-center">
        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-10 h-10 mr-2">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        about
    </h1>

    <hr class="border-b-2 border-blue-400 my-6">

    <!-- component -->
    <div class="w-full">
        <div class="coding inverse-toggle px-5 pt-4 shadow-lg text-gray-100 text-sm font-mono subpixel-antialiased
              bg-gray-800  pb-6 pt-4 rounded-lg leading-normal overflow-hidden">
            <div class="top mb-2 flex">
                <div class="h-3 w-3 bg-red-500 rounded-full"></div>
                <div class="ml-2 h-3 w-3 bg-orange-300 rounded-full"></div>
                <div class="ml-2 h-3 w-3 bg-green-500 rounded-full"></div>
            </div>

            @php
                $about_cols = [
                    ['heading'=>'attribute', 'width'=>20],
                    ['heading'=>'value', 'width'=>80]
                ];

                $about_items = [
                      ['lives_in', 'Peterborough, Ontario'],
                      ['works_at', 'iApotheca Healthcare'],
                      ['twitter', '@david_hallin'],
                      ['github', 'hallindavid'],
                      ['codes_in', 'PHP (Laravel), GoLang, Javascript (Vue.js or Alpine.js)'],
                      ['favorite_stack', 'TALL (TailwindCSS, AlpineJS, Laravel, Livewire)'],
                      ['sense_of_humour', 'according to his kids, it\'s awesome :P'],
                      ['experience', '~ 12 yrs, (~5 as a DBA, ~6 as full-stack-ish web dev)'],
                  ];

                $about_query = "Select attribute, value from user_demographics where name like 'dave';";
            @endphp

            @include('_components.query_view', ['cols'=>$about_cols, 'data_items'=>$about_items, 'query'=>$about_query])

        </div>
    </div>

    <div class="flex flex-col lg:flex-row space-x-10 items-center">
        <div>
            <p class="mb-6 text-base leading-6 text-gray-600">Hi, I'm Dave,</p>
            <p class="mb-6 text-base leading-6 text-gray-600">I started out as a database analyst/admin kind of thing, and spent a long time focusing on relational databases in healthcare, and then in education before starting a development company with my wife (<a target="_blank()"
                                                                                                                                                                                                                                                                          href="https://twitter.com/RachelleHallin">Rachelle</a>)
            </p>
            <p class="mb-6 text-base leading-6 text-gray-600">We enjoyed doing tonnes of work for very little money for a few years before teaming up with a few entrepreneurial friends and starting <a href="https://iapotheca.com" target="_blank()">iApotheca Healthcare</a></p>
            <p class="mb-6 text-base leading-6 text-gray-600">These days when I'm not working on iApotheca projects, I enjoy doing side projects (usually to try different stacks/technologies in low-risk settings) and spending time with my family</p>
            <p class="mb-6 text-base leading-6 text-gray-600">Check out my <a href="/tool-belt">tool-belt</a> page to see what i build my projects with</p>
        </div>
        <div class="my-6 max-w-xs w-full" data-tooltip-text="Admittedly, due to social-distancing, this beard is a bit bigger, and Dave is likely going to look more like a red sasquatch if you saw him now">
            <img src="/assets/img/davidhallin.png" alt="David Hallin" class="rounded-full w-full bg-contain">
        </div>
    </div>


@endsection
