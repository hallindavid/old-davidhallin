@php($active = 'text-gray-900 focus:bg-gray-200 font-mono group pr-3 pl-5 py-2 text-sm leading-5 font-medium rounded-md hover:text-gray-900 focus:outline-none transition ease-in-out duration-150')
@php($inactive = 'text-gray-600 focus:text-gray-900 focus:bg-gray-50 px-3 font-mono group px-3 py-2 text-sm leading-5 font-medium rounded-md hover:text-gray-900 focus:outline-none transition ease-in-out duration-150')

<nav class="hidden lg:block pr-10 border-r-2 border-gray-100">
    <a href="/" @if($page->isActive('/') || $page->isActive('/blog*')) class="{{ $active }} text-gray-400" aria-current="page" @else class="{{ $inactive }} hover:text-gray-400" @endif >
        <div class="flex flex-row justify-start items-center">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
            </svg>
            home
        </div>
    </a>

    <a href="/about" @if($page->isActive('/about')) class="mt-1 {{ $active }} text-blue-400" aria-current="page" @else class="{{ $inactive }} hover:text-blue-400" @endif >
        <div class="flex flex-row justify-start items-center">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            about
        </div>
    </a>

    <a href="/projects" @if($page->isActive('/projects*')) class="mt-1 {{ $active }} text-yellow-400" aria-current="page" @else class="mt-1 {{ $inactive }} hover:text-yellow-400" @endif >
        <div class="flex flex-row justify-start items-center">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
            </svg>
            projects
        </div>
    </a>

    <a href="/tool-belt" @if($page->isActive('/tool-belt')) class="mt-1 {{ $active }} text-orange-400" aria-current="page" @else class="mt-1 {{ $inactive }} hover:text-orange-300" @endif >
        <div class="flex flex-row justify-start items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" viewBox="0 0 512 512" fill="currentColor">
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
            <span class="whitespace-no-wrap">tool-belt</span>
        </div>
    </a>

    <a href="https://twitter.com/david_hallin" target="_blank()" class="{{ $inactive }} hover:text-twitter-blue">
        <div class="flex flex-row justify-start items-center">
        <span class="w-5 h-5 mr-2 text-center">
          <i class="fab fa-twitter"></i>
        </span>
            twitter
        </div>
    </a>

    <a href="https://github.com/hallindavid" target="_blank()" class="{{ $inactive }} hover:text-black">
        <div class="flex flex-row justify-start items-center">
        <span class="w-5 h-5 mr-2 text-center">
          <i class="fab fa-github"></i>
        </span>
            github
        </div>
    </a>
</nav>


