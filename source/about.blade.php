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

    <hr>

    <h2>My Stack</h2>

    <div class="flex flex-wrap">
        <div class="w-full md:w-1/2 border-l px-2">
            <strong class="uppercase text-black font-bold">Backend</strong>
            <ul class="pl-8">
                <li>Laravel</li>
                <li>GoLang</li>
                <li>Codeigniter</li>
                <li>SQL (MySQL, PostgreSQL, MSSQL)</li>
                <li>NoSQL (DynamoDB, Firestore, MongoDB)</li>
                <li>HTTP Server (Apache, Nginx)</li>
            </ul>
        </div>

        <div class="w-full md:w-1/2 border-l px-2">
            <strong class="uppercase text-black font-bold">Integrations</strong>
            <ul class="pl-8">
                <li>Slack (usually for notifications)</li>
                <li>SMS (Twilio, Nexmo)</li>
                <li>Email (Sendgrid, Mailgun)</li>
                <li>Payments & subscriptions through Stripe</li>
                <li>Mapping (Mapbox, Mapquest, Google)</li>
                <li>Support Tools (Intercom, Helpscout, Zendesk)</li>
                <li>Cloudflare</li>
            </ul>
        </div>


        <div class="w-full md:w-1/2 border-l px-2">
            <strong class="uppercase text-black font-bold">Frontend</strong>
            <ul class="pl-8">
                <li>Vue.js</li>
                <li>Jigsaw (static, generated by Laravel code)</li>
                <li>Vanilla JS</li>
                <li>jQuery</li>
                <li>Tailwind CSS/Tailwind UI</li>
                <li>Saas</li>
                <li>Bootstrap</li>
            </ul>
        </div>

        <div class="w-full md:w-1/2 border-l px-2">
            <strong class="uppercase text-black font-bold">Hosting</strong>
            <ul class="pl-8">
                <li>Digital Ocean (droplets provisioned by Laravel Forge)</li>
                <li>Aptum/Peer1 (manual provisioned VMs)</li>
                <li>Azure (Functions, VMs, or App Service)</li>
                <li>Amazon Web Services (Lambdas, S3, )</li>
                <li>Google (Firebase, Cloud Functions, App Engine)</li>
                <li>Github Pages (static web page hosting)</li>
                <li>Netlify (Static Hosting + Netlify Functions)</li>
            </ul>
        </div>


        <div class="w-full md:w-1/2 border-l px-2">
            <strong class="uppercase text-black font-bold">CI/CD</strong>
            <ul class="pl-8">
                <li>Testing (PHP Unit, PestPHP) </li>
                <li>Code Style through StyleCI</li>
                <li>Automated Testing for Laravel through ChipperCI </li>
                <li>Others through CircleCI</li>

            </ul>
        </div>

    </div>

@endsection
