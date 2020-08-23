@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="{{ $page->siteName }} likes, tools, shoutouts etc."/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="tools, repos, services that dave likes"/>
@endpush

@section('body')
    <div x-data="{ currentView: 'awesome'}" class="w-full">
        <div class="flex flex-row justify-between">
            <h1 class="font-mono text-orange-300 flex justify-start items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mr-2" viewBox="0 0 512 512" fill="currentColor">
                    <g>
                        <g>
                            <path d="M490.042,384.371c-45.824-45.824-42.819-42.921-44.109-43.873l-121.297-89.556l47.055-47.051
                            c37.832,13.481,80.665,4.161,109.492-24.666c31.406-31.406,39.65-79.421,20.514-119.478c-4.46-9.333-16.829-11.447-24.134-4.14
                            l-38.791,38.791c-5.846,5.846-15.357,5.847-21.207,0c-5.861-5.861-5.861-15.345,0-21.206L456.357,34.4
                            c7.314-7.313,5.187-19.679-4.14-24.133C412.16-8.869,364.146-0.625,332.739,30.78c-28.834,28.834-38.143,71.669-24.666,109.491
                            l-54.268,54.263c-11.049-8.594,3.531,6.085-100.534-104.261l10.909-10.909c6.9-6.899,5.462-18.451-2.888-23.461L80.978,7.714
                            c-21.053-12.632-47.88-9.33-65.241,8.031c-17.36,17.36-20.663,44.189-8.031,65.241l48.189,80.315
                            c5.018,8.366,16.575,9.774,23.461,2.888l10.288-10.288c103.526,109.775,89.9,94.864,98.084,105.387
                            c0.194,0.249,0.41,0.469,0.616,0.703l-48.121,48.117c-37.82-13.477-80.658-4.168-109.49,24.666
                            c-31.406,31.406-39.65,79.42-20.513,119.478c4.461,9.334,16.827,11.446,24.134,4.14L73.145,417.6
                            c5.849-5.847,15.36-5.845,21.207,0c5.861,5.861,5.861,15.345,0,21.206l-38.793,38.792c-7.314,7.313-5.186,19.679,4.14,24.134
                            c14.398,6.878,29.82,10.219,45.134,10.219c27.29-0.001,54.226-10.615,74.344-30.732c28.834-28.834,38.143-71.669,24.666-109.492
                            l41.096-41.093l95.684,116.28c0.728,0.882-1.674-1.576,41.121,41.219c15.579,15.579,36.291,23.655,56.658,23.655
                            c14.944,0,29.703-4.352,42.1-13.279C518.333,471.262,522.793,417.119,490.042,384.371z M100.869,122.092
                            c-5.813-6.163-15.558-6.271-21.513-0.315l-7.627,7.626L33.422,65.556c-5.538-9.23-4.091-20.993,3.521-28.605
                            c7.612-7.613,19.375-9.059,28.604-3.521l63.847,38.308l-7.627,7.625c-5.735,5.735-5.871,14.991-0.306,20.891
                            c119.572,126.789,100.763,107.71,110.971,115.65l-22.757,22.755C201.81,228.545,220.072,248.49,100.869,122.092z M175.556,357.6
                            c-4.494,4.494-5.667,11.332-2.927,17.067c13.669,28.612,7.777,62.909-14.658,85.344c-14.374,14.374-33.614,21.958-53.112,21.956
                            c-3.507,0-7.021-0.245-10.518-0.741l21.216-21.216c17.581-17.58,17.584-46.037,0-63.619c-17.539-17.54-46.08-17.539-63.619,0
                            l-21.216,21.216c-3.248-22.935,4.258-46.67,21.216-63.628c22.436-22.437,56.732-28.326,85.344-14.659
                            c5.734,2.739,12.571,1.568,17.067-2.927l182.01-181.997c4.494-4.494,5.667-11.332,2.928-17.067
                            c-13.669-28.611-7.777-62.909,14.658-85.344c16.961-16.96,40.694-24.465,63.628-21.216l-21.216,21.216
                            c-8.497,8.496-13.177,19.794-13.177,31.81s4.68,23.312,13.177,31.81c17.539,17.54,46.08,17.539,63.619,0l21.216-21.216
                            c3.248,22.935-4.258,46.67-21.216,63.628c-22.436,22.436-56.733,28.327-85.345,14.659c-5.732-2.739-12.571-1.567-17.066,2.927
                            L175.556,357.6z M266.182,309.392l37.009-37.006l37.719,27.848l-45.065,45.065C265.205,308.065,267.117,310.309,266.182,309.392z
                             M462.974,474.174c-17.49,12.596-43.296,9.483-60.026-7.247l-39.631-39.63l-48.328-58.731l50.318-50.318l61.91,45.709
                            l41.618,41.619C487.858,424.599,486.636,457.132,462.974,474.174z"/>
                        </g>
                    </g>
                    <g>
                        <g>
                            <path d="M447.371,424.2l-59.981-59.981c-5.855-5.856-15.35-5.856-21.206,0c-5.856,5.856-5.856,15.35,0,21.206l59.981,59.981
                            c5.855,5.855,15.35,5.856,21.206,0C453.227,439.55,453.227,430.056,447.371,424.2z"/>
                        </g>
                    </g>
                </svg>
                tool-belt
            </h1>
            <div>
                <nav class="flex space-x-8">
                    <button @click="currentView = 'awesome'" class="group inline-flex items-center py-4 px-1 font-medium text-sm leading-5 focus:outline-none"
                            x-bind:class="{ 'text-orange-300 focus:text-orange-500':currentView == 'awesome', 'text-gray-500 hover:text-gray-700  focus:text-gray-700' : currentView != 'awesome' }">
                        <svg x-bind:class="{ 'text-orange-300' : currentView == 'awesome', 'text-gray-400': currentView != 'awesome'}" viewBox="0 0 20 20" fill="currentColor" class="-ml-0.5 mr-2 h-5 w-5 group-hover:text-gray-500 group-focus:text-gray-600">
                            <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V5zm3.293 1.293a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 01-1.414-1.414L7.586 10 5.293 7.707a1 1 0 010-1.414zM11 12a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path>
                        </svg>
                        <span>Awesome View</span>
                    </button>
                    <button @click="currentView = 'boring'" class="group inline-flex items-center py-4 px-1 font-medium text-sm leading-5 focus:outline-none"
                            x-bind:class="{ 'text-orange-300 focus:text-orange-500':currentView == 'boring', 'text-gray-500 hover:text-gray-700  focus:text-gray-700' : currentView != 'boring' }">
                        <svg x-bind:class="{ 'text-orange-300' : currentView == 'boring', 'text-gray-400': currentView != 'boring'}" viewBox="0 0 20 20" fill="currentColor" class="-ml-0.5 mr-2 h-5 w-5 group-hover:text-gray-500 group-focus:text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z" clip-rule="evenodd"></path>
                        </svg>
                        <span>Boring View</span>
                    </button>
                </nav>
            </div>
        </div>


        <hr class="border-b-2 border-orange-300 mt-0 mb-2">

        <p class="text-gray-500 text-sm font-mono">
            tools, stacks, repos, projects that i like
        </p>


        <!-- component -->
        <div class="w-full" x-show="currentView == 'awesome'">
            <div class="coding inverse-toggle px-5 pt-4 shadow-lg text-gray-100 text-sm font-mono subpixel-antialiased
              bg-gray-800  pb-6 pt-4 rounded-lg leading-normal w-full">
                <div class="top mb-2 flex">
                    <div class="h-3 w-3 bg-red-500 rounded-full"></div>
                    <div class="ml-2 h-3 w-3 bg-orange-300 rounded-full"></div>
                    <div class="ml-2 h-3 w-3 bg-green-500 rounded-full"></div>
                </div>

                @php
                    $lang_cols = [
                        ['heading'=>'language', 'width'=>15],
                        ['heading'=>'comfort', 'width'=>10],
                        ['heading'=>'note', 'width'=>95]
                    ];

                    $lang_items = [
                          ['PHP', 'HIGH', "most of professional career is here"],
                          ['', '', "* created & maintained multiple production grade apps"],
                          ['', '', "* published a few open source packages in php ( & will do more )"],
                          ['', '', "* work extensively with Laravel (jan 2019-present) and Codeigniter (pre-2019)"],
                          ['', '', "* love working with the TALL stack (tailwind, alpine, laravel, livewire)"],
                          ['', '', ""],
                          ['GoLang', 'HIGH', "use golang primarily to build APIs"],
                          ['', '', "* usually deploy golang APIs using a FaaS solution"],
                          ['', '', "* not fond of front-end in golang, but can do it"],
                          ['', '', "* created & maintained many math-intensive APIs"],
                          ['', '', "* created many data-processing apps"],
                          ['', '', "* work extensively with Lambda & Google Cloud Functions"],
                          ['', '', "* worked with frameworks: Fiber, & Buffalo"],
                          ['', '', ""],
                          ['SQL', 'HIGH', '* my first (coding) love'],
                          ['', '', "* comfy with most flavors of relational database systems"],
                          ['', '', "* lots of experience optimizing queries with complex relationships"],
                          ['', '', ""],
                          ['CSS', 'MED', 'developer, more than a designer'],
                          ['', '', "* using TailwindCSS for basically everything these days"],
                          ['', '', "* loads of experience with Bootstrap (before tailwindcss entered my life)"],
                          ['', '', "* a bit rough at writing my own, but i can get by"],
                          ['', '', "* also comfy with bulma, material and a few others"],
                          ['', '', ""],
                          ['Javascript', 'MED', '* used frequently but repeatedly in the same way eg. show/hide'],
                          ['', '', "   elements, refresh data through ajax calls"],
                          ['', '', "* for small progressive pieces, i use alpine.js"],
                          ['', '', "* for deep interactive apps, i use vue.js"],
                          ['', '', "* used jQuery extensively over the past 10 years"],
                          ['', '', "* not my passion, but sometimes enjoyable"],
                          ['', '', ""],
                          ['bash', 'MED', 'lots of server management scripts written with bash over the years'],
                          ['NOSQL', 'MED', 'limited Experience'],
                          ['', '', "* have used for things like logs, audit trails etc."],
                          ['', '', "* comfy using, not comfy designing the structure quite yet"],
                          ['', '', "* experience has been limited to DynamoDB & Firestore"],
                          ['C#', 'MED', 'mostly data-exporters/importers from excel to/from a db'],
                      ];
                    $lang_query = "Select language, comfort, note from languages where user like 'dave';";
                @endphp

                @include('_components.query_view', ['cols'=>$lang_cols, 'data_items'=>$lang_items, 'query'=>$lang_query])


                @php
                    $framework_cols = [
                        ['heading'=>'item', 'width'=>15],
                        ['heading'=>'category', 'width'=>30],
                        ['heading'=>'note', 'width'=>75]
                    ];

                    $framework_items = [
                          ['Apache/Nginx', 'HTTP Server', "not a passion of mine, but i can get by"],
                          ['Digital Ocean', 'Hosting', "quick and easy way to get hosting up and running"],
                          ['Github Pages', 'Hosting', "static sites (like this) can have free hosting!"],
                          ['Netlify', 'Hosting', "static hosting, but with functions"],
                          ['FaaS', 'Hosting', "have functions on netlify, GCFs, AWS Lambda, and Azure"],
                          ['Laravel Vapor', 'Provisioning', "host a laravel app on an AWS Lambda"],
                          ['Laravel Forge', 'Provisioning', "setup servers quickly and easily"],
                          ['TailwindCSS', 'Front End Framework', "changed my life - so awesome"],
                          ['BootstrapVue', 'Front End Framework', "fantastic package for making Vue.js apps"],
                          ['Jigsaw', 'Static Site Generator', "generate a static site using laravel (like this website)"],
                          ['Laravel', 'Package/Framework', "my preferred framework for all apps these days"],
                          ['Livewire', 'Package/Framework', "allows you to do a lot of fancy js stuff, easily with PHP"],
                          ['Tenancy', 'Package/Framework', "allows multiple databases, for one laravel app"],
                          ['promptui', 'Package/Framework', "a golang package by manifoldco makes CLI apps beautiful"],
                          ['Cloudflare', 'domain services & ssl', "everybody knows who these guys are"],
                          ['Font Awesome', 'icon package', "lots of great icons"],
                          ['Heroicons', 'icon package', "my default choice these days"],
                          ['System UIcons', 'icon package', "another great svg icon package"],
                          ['Twilio', 'integration', "send SMS via an API"],
                          ['Mailgun', 'integration', "send emails via an API"],
                          ['Slack', 'integration', "lots of slack webhooks & a few bot integrations"],
                          ['Stripe', 'integration', "online payment & subscription management"],
                          ['', '', " (usually paired with Laravel Cashier)"],
                          ['Various', 'Natural Language Processing', "Have used MS Luis & Google Dialog Flow"],
                          ['OpenCV', 'Image Analysis/Manipulation', "nothing production grade (yet :P )"],
                          ['PestPHP', 'CI/CD', "pretty neat PHPUnit abstraction layer"],
                          ['ChipperCI', 'CI/CD', "automated testing for laravel"],
                          ['TravisCI', 'CI/CD', "few projects on this"],
                          ['CircleCI', 'CI/CD', "few projects on this"],
                          ['StyleCI', 'Code Styling/Formatting', "my code looks so much better since this came around"],
                          ['Clubhouse.io', 'Task Management', "fantastic task management solution, free until you are big"],
                      ];

                    $framework_query = "Select item, category, note from likes where user like 'dave';";
                @endphp

                @include('_components.query_view', ['cols'=>$framework_cols, 'data_items'=>$framework_items, 'query'=>$framework_query])


            </div>
        </div>

        <div class="w-full" x-show="currentView == 'boring'">
            <div class=" flex flex-wrap">
                <div class="w-full md:w-1/2 px-2">
                    <strong class="lowercase text-gray-800 font-bold">Backend</strong>
                    <ul class="pl-8">
                        <li>Laravel</li>
                        <li>GoLang</li>
                        <li>Codeigniter</li>
                        <li>SQL (MySQL, PostgreSQL, MSSQL)</li>
                        <li>NoSQL (DynamoDB, Firestore, MongoDB)</li>
                        <li>HTTP Server (Apache, Nginx)</li>
                    </ul>
                </div>

                <div class="w-full md:w-1/2 px-2">
                    <strong class="lowercase text-gray-800 font-bold">Integrations</strong>
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


                <div class="w-full md:w-1/2 px-2">
                    <strong class="lowercase text-gray-800 font-bold">Frontend</strong>
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

                <div class="w-full md:w-1/2 px-2">
                    <strong class="lowercase text-gray-800 font-bold">Hosting</strong>
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


                <div class="w-full md:w-1/2 px-2">
                    <strong class="lowercase text-gray-800 font-bold">CI/CD</strong>
                    <ul class="pl-8">
                        <li>Testing (PHP Unit, PestPHP)</li>
                        <li>Code Style through StyleCI</li>
                        <li>Automated Testing for Laravel through ChipperCI</li>
                        <li>Others through CircleCI</li>

                    </ul>
                </div>
            </div>
        </div>


    </div>
@stop
