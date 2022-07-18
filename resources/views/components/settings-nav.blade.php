<div {{ $attributes->class(['py-4 text-gray-500 border-b-[1px] border-[#e4dfdf] pl-[30px]']) }}>
    <a href="{{ route('policy.index') }}" class="inline hover:text-blue-800 {{ request()->routeIs('policy.index') ? 'active-book-nav' : ''}}">
        Polisa
    </a>
    <a href="{{ route('category.index') }}" class="inline ml-[70px] hover:text-blue-800 {{ request()->routeIs('category.index') ? 'active-book-nav' : ''}}">
        Kategorije
    </a>
    <a href="{{ route('genre.index') }}" class="inline ml-[70px] hover:text-blue-800 {{ request()->routeIs('genre.index') ? 'active-book-nav' : ''}}">
        Žanrovi
    </a>
    <a href="{{ route('publisher.index') }}" class="inline ml-[70px] hover:text-blue-800 {{ request()->routeIs('publisher.index') ? 'active-book-nav' : ''}}">
        Izdavač
    </a>
    <a href="{{ route('bookbind.index') }}" class="inline ml-[70px] hover:text-blue-800 {{ request()->routeIs('bookbind.index') ? 'active-book-nav' : ''}}">
        Povez
    </a>
    <a href="{{ route('format.index') }}" class="inline ml-[70px] hover:text-blue-800 {{ request()->routeIs('format.index') ? 'active-book-nav' : ''}}">
        Format
    </a>
    <a href="{{ route('script.index') }}" class="inline ml-[70px] hover:text-blue-800 {{ request()->routeIs('script.index') ? 'active-book-nav' : ''}}">
        Pismo
    </a>
    <a href="{{ route('language.index') }}" class="inline ml-[70px] hover:text-blue-800 {{ request()->routeIs('language.index') ? 'active-book-nav' : ''}}">
        Jezik
    </a>
</div>
