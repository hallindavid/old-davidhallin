---
pagination:
    collection: projects
    perPage: 10
---
@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="{{ $page->siteName }} Blog"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="The list of blog posts for {{ $page->siteName }}"/>
@endpush

@section('body')

    <h1 class="font-mono text-yellow-400 flex justify-start items-center">
        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-10 h-10 mr-2">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
        </svg>
        projects
    </h1>

    <hr class="border-b-2 border-yellow-400 my-6">

    <p class="text-gray-500 text-sm font-mono">
        projects that i'm working on, or have worked on
    </p>

    @foreach ($pagination->items as $project)
        <div class="flex flex-col mb-4">
            <h2 class="text-3xl mt-0">
                <a
                        href="{{ $project->getUrl() }}"
                        title="View Project - {{ $project->title }}"
                        class="text-gray-900 font-extrabold"
                >{{ $project->title }}</a>
            </h2>

            <p class="mb-4 mt-1">{!! $project->getExcerpt(200) !!}</p>

            <a
                    href="{{ $project->getUrl() }}"
                    title="View Project - {{ $project->title }}"
                    class="uppercase font-semibold tracking-wide mb-2"
            >View Project</a>
        </div>
        @if ($project != $pagination->items->last())
            <hr class="border-b-2 border-gray-400 my-6">
        @endif
    @endforeach

    @if ($pagination->pages->count() > 1)
        <nav class="flex text-base my-8">
            @if ($previous = $pagination->previous)
                <a
                        href="{{ $previous }}"
                        title="Previous Page"
                        class="bg-gray-200 hover:bg-gray-400 rounded mr-3 px-5 py-3"
                >&LeftArrow;</a>
            @endif

            @foreach ($pagination->pages as $pageNumber => $path)
                <a
                        href="{{ $path }}"
                        title="Go to Page {{ $pageNumber }}"
                        class="bg-gray-200 hover:bg-gray-400 text-blue-700 rounded mr-3 px-5 py-3 {{ $pagination->currentPage == $pageNumber ? 'text-blue-600' : '' }}"
                >{{ $pageNumber }}</a>
            @endforeach

            @if ($next = $pagination->next)
                <a
                        href="{{ $next }}"
                        title="Next Page"
                        class="bg-gray-200 hover:bg-gray-400 rounded mr-3 px-5 py-3"
                >&RightArrow;</a>
            @endif
        </nav>
    @endif
@stop
