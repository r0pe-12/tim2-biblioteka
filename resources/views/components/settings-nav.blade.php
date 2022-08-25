<div class="py-4 text-gray-500 border-[#e4dfdf] pl-[30px]">
    <nav>
        <div {{ $attributes->class(['nav nav-tabs']) }}>
            <a href="{{ route('policy.index') }}" class="nav-link inline hover:text-blue-800 {{ request()->routeIs('policy.index') ? 'active' : ''}}">
                Polisa
            </a>
            <a href="{{ route('category.index') }}" class="nav-link inline ml-[21px] hover:text-blue-800 {{ request()->routeIs('category.index') ? 'active' : ''}}">
                Kategorije
            </a>
            <a href="{{ route('genre.index') }}" class="nav-link inline ml-[21px] hover:text-blue-800 {{ request()->routeIs('genre.index') ? 'active' : ''}}">
                Žanrovi
            </a>
            <a href="{{ route('publisher.index') }}" class="nav-link inline ml-[21px] hover:text-blue-800 {{ request()->routeIs('publisher.index') ? 'active' : ''}}">
                Izdavač
            </a>
            <a href="{{ route('bookbind.index') }}" class="nav-link inline ml-[21px] hover:text-blue-800 {{ request()->routeIs('bookbind.index') ? 'active' : ''}}">
                Povez
            </a>
            <a href="{{ route('format.index') }}" class="nav-link inline ml-[21px] hover:text-blue-800 {{ request()->routeIs('format.index') ? 'active' : ''}}">
                Format
            </a>
            <a href="{{ route('script.index') }}" class="nav-link inline ml-[21px] hover:text-blue-800 {{ request()->routeIs('script.index') ? 'active' : ''}}">
                Pismo
            </a>
            <a href="{{ route('language.index') }}" class="nav-link inline ml-[21px] hover:text-blue-800 {{ request()->routeIs('language.index') ? 'active' : ''}}">
                Jezik
            </a>
        </div>
    </nav>
</div>
