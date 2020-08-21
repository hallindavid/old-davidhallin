@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="{{ $page->title }}"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="{{ $page->description }}"/>
@endpush

@section('body')
    <div class="border-b border-gray-300 mb-4 pb-4" v-pre>
        @yield('content')
    </div>

    <div class="border-b border-gray-300 pb-4 mb-10" v-pre>
        <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
            <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
            <a class="a2a_button_facebook"></a>
            <a class="a2a_button_twitter"></a>
            <a class="a2a_button_email"></a>
            <a class="a2a_button_reddit"></a>
            <a class="a2a_button_pocket"></a>
            <a class="a2a_button_print"></a>
        </div>
        <script async src="https://static.addtoany.com/menu/page.js"></script>
    </div>

@endsection
