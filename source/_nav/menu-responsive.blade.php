<nav id="js-nav-menu" class="nav-menu hidden lg:hidden">
    <ul class="my-0 list-none">
        <li class="text-center"><a
                title="{{ $page->siteName }} Blog"
                href="/blog"
                class="nav-menu__item hover:text-blue-500 {{ $page->isActive('/blog') ? 'active text-blue' : '' }}"
            >Posts</a>
        </li>
        <li class="text-center"><a
                title="{{ $page->siteName }} About"
                href="/about"
                class="nav-menu__item hover:text-blue-500 {{ $page->isActive('/about') ? 'active text-blue' : '' }}"
            >About Dave</a>
        </li>
        <li class="text-center">
            <a  title="Dave's Twitter"
                target="_blank()" 
                class="nav-menu__item hover:text-blue-500 {{ $page->isActive('/contact') ? 'active text-blue' : '' }}" 
                href="https://twitter.com/hallindavid"
            ><i class="fab fa-twitter mr-2"></i> Twitter
            </a>
        </li>
        <li class="text-center">
            <a  title="Dave's GitHub"
                target="_blank()" 
                class="nav-menu__item hover:text-blue-500 {{ $page->isActive('/contact') ? 'active text-blue' : '' }}" 
                href="https://github.com/hallindavid">
            <i class="fab fa-github mr-2"></i> GitHub</a>
        </li>
    </ul>
</nav>
