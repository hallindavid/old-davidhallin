<nav class="hidden lg:flex items-center justify-end text-lg">
    <a title="{{ $page->siteName }} Blog" href="/blog"
        class="ml-6 text-gray-700 hover:text-blue-600 {{ $page->isActive('/blog') ? 'active text-blue-600' : '' }}">
        Blog
    </a>

    <a title="{{ $page->siteName }} About" href="/about"
        class="ml-6 text-gray-700 hover:text-blue-600 {{ $page->isActive('/about') ? 'active text-blue-600' : '' }}">
        About
    </a>

    <a title="Dave's Twitter" target="_blank()" class="ml-6 text-gray-700 hover:text-blue-600" href="https://twitter.com/hallindavid"><i class="fab fa-twitter"></i></a>
    <a title="Dave's GitHub" target="_blank()" class="ml-6 text-gray-700 hover:text-blue-600" href="https://github.com/hallindavid"><i class="fab fa-github"></i></a>
    <a title="Dave's StackShare" target="_blank()" class="ml-6 items-center" href="https://stackshare.io/hallindavid/ihaveused"><img src="/assets/img/stackshare.png" class="h-4 w-4 hover:opacity-75"></a>
</nav>
