@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="About {{ $page->siteName }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="A little bit about {{ $page->siteName }}" />
@endpush

@section('body')

    <h1 data-tooltip-text="tooltip">About</h1>
    
    <div class="flex mx-auto md:float-right my-6 md:ml-10"
        data-tooltip-text="Admittedly, due to social-distancing, this beard is a bit bigger, and Dave is likely going to look more like a red sasquatch if you saw him now">
        <img src="/assets/img/davidhallin.png"
            alt="David Hallin"
            class="rounded-full h-64 w-64 bg-contain">
    </div>

    <p class="mb-6">I live in Peterborough, Ontario, Canada with my wife and kids</p>

    <p class="mb-6">I started as a database administrator and worked in the public sector (both healthcare & education) for a long time.</p>

    <p class="mb-6">In 2010 I started an app development company with my wife <a target="_blank()" href="https://twitter.com/RachelleHallin">@Rachelle</a>.  We joined up with a few other people and in 2014 we started developing apps for the pharmacy space under <a target="_blank()" href="https://www.iapotheca.com">iApotheca Healthcare</a></p>

    <p class="mb-6">Now I build apps mostly using <a target="_blank()" href="https://laravel.com">Laravel</a>, <a target="_blank()" href="https://vuejs.org/">Vue.js</a>, and <a target="_blank()" href="https://golang.org">Go Lang</a></p>

    <p class="mb-6">The development industry is moving so fast these days with new technology coming out all the time and I'm learning learning a tonne.  This dev blog is hopefully a way of giving back, and hopefully further commiting said learnings to my own memory.</p>
    
@endsection
