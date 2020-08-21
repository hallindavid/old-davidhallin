@extends('_layouts.master')

@section('body')
    @foreach ($posts->take(20) as $post)
        <div class="w-full mb-6">
            <div class="flex flex-wrap justify-between w-full">
                <div class="w-full md:w-2/3">
                <h2 class="text-3xl mt-0">
                    <a href="{{ $post->getUrl() }}" title="Read {{ $post->title }}" class="text-gray-900 font-extrabold">
                        {{ $post->title }}
                    </a>
                </h2>
                </div>
                <div class="w-full md:w-1/3 text-right">
                    <span class="text-gray-700 font-medium my-2">
                        {{ $post->getDate()->format('F j, Y') }}
                    </span>
                </div>
            </div>

            <p class="mt-0 mb-4">{!! $post->getExcerpt() !!}</p>

            <a href="{{ $post->getUrl() }}" title="Read - {{ $post->title }}" class="uppercase tracking-wide mb-4">
                Read
            </a>
        </div>

        @if (! $loop->last)
            <hr class="border-b my-6">
        @endif
    @endforeach

@stop
