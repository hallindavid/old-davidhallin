<nav class="hidden lg:flex items-center justify-end text-lg">
    <a title="{{ $page->siteName }} About" href="/about"
        class="ml-6 text-gray-600 hover:text-gray-800 {{ $page->isActive('/about') ? 'active text-gray-800' : '' }}">
        About
    </a>
    <a title="Dave's Twitter" target="_blank()" class="ml-6 text-twitter-blue" href="https://twitter.com/david_hallin"><i class="fab fa-twitter"></i></a>
    <a title="Dave's GitHub" target="_blank()" class="ml-6 text-gray-800" href="https://github.com/hallindavid"><i class="fab fa-github"></i></a>
</nav>
