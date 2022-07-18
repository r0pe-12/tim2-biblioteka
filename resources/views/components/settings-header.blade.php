<div {{ $attributes->class(['heading']) }}>
    <div class="flex border-b-[1px] border-[#e4dfdf]">
        <div class="pl-[30px] py-[10px] flex flex-col">
            <div>
                <h1>
                    @yield('title')
                </h1>
            </div>
            <div>
                <nav class="w-full rounded">
                    <ol class="flex list-reset">
                        <li>
                            <a href="{{ route('policy.index') }}" class="text-[#2196f3] hover:text-blue-600">
                                Settings
                            </a>
                        </li>
                        <li>
                            <span class="mx-2">/</span>
                        </li>
                        @if(request()->routeIs('script.*'))
                                <li>
                                    <a href="{{ route('script.index') }}" class="text-[#2196f3] hover:text-blue-600">
                                        Pisma
                                    </a>
                                </li>
                            @elseif(request()->routeIs('format.*'))
                                <li>
                                    <a href="{{ route('format.index') }}" class="text-[#2196f3] hover:text-blue-600">
                                        Formati
                                    </a>
                                </li>
                            @elseif(request()->routeIs('bookbind.*'))
                                <li>
                                    <a href="{{ route('bookbind.index') }}" class="text-[#2196f3] hover:text-blue-600">
                                        Povezi
                                    </a>
                                </li>
                            @elseif(request()->routeIs('publisher.*'))
                                <li>
                                    <a href="{{ route('publisher.index') }}" class="text-[#2196f3] hover:text-blue-600">
                                        Izdavači
                                    </a>
                                </li>
                            @elseif(request()->routeIs('genre.*'))
                                <li>
                                    <a href="{{ route('genre.index') }}" class="text-[#2196f3] hover:text-blue-600">
                                        Žanrovi
                                    </a>
                                </li>
                            @elseif(request()->routeIs('category.*'))
                                <li>
                                    <a href="{{ route('category.index') }}" class="text-[#2196f3] hover:text-blue-600">
                                        Kategorije
                                    </a>
                                </li>
                            @elseif(request()->routeIs('language.*'))
                                <li>
                                    <a href="{{ route('language.index') }}" class="text-[#2196f3] hover:text-blue-600">
                                        Jezici
                                    </a>
                                </li>
                        @endif
                        <li>
                            <span class="mx-2">/</span>
                        </li>
                        <li>
                            <a href="#" class="text-gray-400 hover:text-blue-600">
                                @yield('title')
                            </a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
