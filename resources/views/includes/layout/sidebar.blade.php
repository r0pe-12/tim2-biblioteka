<nav id="sidebar"
    class="fixed z-10 flex flex-col justify-between overflow-x-hidden overflow-y-auto bg-[#EFF3F6] sidebar nav-height">
    <div class="">
        <!-- Hamburger Icon -->
        <div
            class="cursor-pointer text-[#707070] pl-[28px] pt-[28px] pb-[27px] text-[25px] border-b-[1px] border-[#e4dfdf] ">
            <i id="hamburger" class="hamburger-btn fas fa-bars"></i>
        </div>
        <div class="mt-[30px]">
            <ul class="text-[#2D3B48] sidebar-nav">

                <!-- Dashboard Icon -->
                @if(request()->routeIs('dashboard.*'))
                    <li class="pt-[18px] pb-[14px] mb-[4px] group hover:bg-[#EAEAEA]">
                        <div class="ml-[25px]">
                            <span class="flex justify-between w-full fill-current whitespace-nowrap">
                                <div class="transition duration-300 ease-in group-hover:text-[#576cdf]">
                                    <a href="/" aria-label="Dashboard">
                                        <i class="text-[25px] text-[#707070] fas fa-tachometer-alt transition duration-300 ease-in text-[#576cdf]"></i>
                                        <div class="hidden sidebar-item">
                                            <p class=" inline text-[15px] ml-[20px] transition duration-300 ease-in text-[#576cdf]">
                                                Dashboard
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </span>
                        </div>
                    </li>
                @else
                    <li class="pt-[18px] pb-[14px] mb-[4px] group hover:bg-[#EAEAEA]">
                        <div class="ml-[25px]">
                            <span class="flex justify-between w-full fill-current whitespace-nowrap">
                                <div class="transition duration-300 ease-in group-hover:text-[#576cdf]">
                                    <a href="/" aria-label="Dashboard">
                                        <i class="text-[25px] text-[#707070] fas fa-tachometer-alt transition duration-300 ease-in group-hover:text-[#576cdf]"></i>
                                        <div class="hidden sidebar-item">
                                            <p class=" inline text-[15px] ml-[20px] transition duration-300 ease-in group-hover:text-[#576cdf]">
                                                Dashboard
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </span>
                        </div>
                    </li>
                @endif

                <!-- Bibliotekari Icon -->
                @if(request()->routeIs('librarians.*'))
                    <li class="pt-[18px] pb-[14px] mb-[4px] group hover:bg-[#EAEAEA] h-[60px]">
                        <div class="ml-[25px]">
                            <span class="flex justify-between w-full whitespace-nowrap">
                                <div>
                                    <a href="{{ route('librarians.index') }}" aria-label="Bibliotekari">
                                        <i class="text-[25px] text-[#707070] far fa-address-book transition duration-300 ease-in text-[#576cdf]"></i>
                                        <div class="hidden sidebar-item">
                                            <p class=" inline text-[15px] ml-[20px] transition duration-300 ease-in text-[#576cdf]">
                                                Bibliotekari
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </span>
                        </div>
                    </li>
                @else
                    <li class="pt-[18px] pb-[14px] mb-[4px] group hover:bg-[#EAEAEA] h-[60px]">
                        <div class="ml-[25px]">
                            <span class="flex justify-between w-full whitespace-nowrap">
                                <div>
                                    <a href="{{ route('librarians.index') }}" aria-label="Bibliotekari">
                                        <i class="text-[25px] text-[#707070] far fa-address-book transition duration-300 ease-in group-hover:text-[#576cdf]"></i>
                                        <div class="hidden sidebar-item">
                                            <p class=" inline text-[15px] ml-[20px] transition duration-300 ease-in group-hover:text-[#576cdf]">
                                                Bibliotekari
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </span>
                        </div>
                    </li>
                @endif

                <!-- Ucenici Icon -->
                @if(request()->routeIs('students.*', 'ucenik.*'))
                    <li class="pt-[18px] pb-[14px] mb-[4px] group hover:bg-[#EAEAEA] h-[60px]">
                        <div class="ml-[25px]">
                            <span class="flex justify-between w-full whitespace-nowrap">
                                <div>
                                    <a href="{{route('students.index')}}" aria-label="Ucenici">
                                        <i class="text-[18px] transition duration-300 ease-in text-[#576cdf] text-[#707070] fas fa-users"></i>
                                        <div class="hidden sidebar-item">
                                            <p class="transition duration-300 ease-in text-[#576cdf] inline text-[15px] ml-[20px]">
                                                Ucenici
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </span>
                        </div>
                    </li>
                @else
                    <li class="pt-[18px] pb-[14px] mb-[4px] group hover:bg-[#EAEAEA] h-[60px]">
                        <div class="ml-[25px]">
                            <span class="flex justify-between w-full whitespace-nowrap">
                                <div>
                                    <a href="{{route('students.index')}}" aria-label="Ucenici">
                                        <i class="text-[18px] transition duration-300 ease-in group-hover:text-[#576cdf] text-[#707070] fas fa-users"></i>
                                        <div class="hidden sidebar-item">
                                            <p class="transition duration-300 ease-in group-hover:text-[#576cdf] inline text-[15px] ml-[20px]">
                                                Ucenici
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </span>
                        </div>
                    </li>
                @endif

                <!-- Knjige Icon -->
                @if(request()->routeIs('books.*', 'book.*'))
                    <li class="pt-[18px] pb-[14px] mb-[4px] group hover:bg-[#EAEAEA] h-[60px]">
                        <div class="ml-[25px]">
                            <span class="flex justify-between w-full whitespace-nowrap">
                                <div>
                                    <a href="{{ route('books.index') }}" aria-label="Knjige">
                                        <i class="text-[25px] transition duration-300 ease-in text-[#576cdf] text-[#707070] fas fa-book"></i>
                                        <div class="hidden sidebar-item">
                                            <p class="transition duration-300 ease-in text-[#576cdf] inline text-[15px] ml-[20px]">
                                                Knjige
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </span>
                        </div>
                    </li>
                @else
                    <li class="pt-[18px] pb-[14px] mb-[4px] group hover:bg-[#EAEAEA] h-[60px]">
                        <div class="ml-[25px]">
                            <span class="flex justify-between w-full whitespace-nowrap">
                                <div>
                                    <a href="{{ route('books.index') }}" aria-label="Knjige">
                                        <i class="text-[25px] transition duration-300 ease-in group-hover:text-[#576cdf] text-[#707070] fas fa-book"></i>
                                        <div class="hidden sidebar-item">
                                            <p class="transition duration-300 ease-in group-hover:text-[#576cdf] inline text-[15px] ml-[20px]">
                                                Knjige
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </span>
                        </div>
                    </li>
                @endif

                <!-- Autori Icon -->
                @if(request()->routeIs('authors.*'))
                    <li class="pt-[18px] pb-[14px] mb-[4px] group hover:bg-[#EAEAEA] h-[60px]">
                        <div class="ml-[25px]">
                            <span class="flex justify-between w-full whitespace-nowrap">
                                <div>
                                    <a href="{{ route('authors.index') }}" aria-label="Knjige">
                                        <i class="text-[25px] transition duration-300 ease-in text-[#576cdf] text-[#707070] fas fa-user-graduate"></i>
                                        <div class="hidden sidebar-item">
                                            <p class="transition duration-300 ease-in text-[#576cdf] inline text-[15px] ml-[20px]">
                                                Autori
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </span>
                        </div>
                    </li>
                @else
                    <li class="pt-[18px] pb-[14px] mb-[4px] group hover:bg-[#EAEAEA] h-[60px]">
                        <div class="ml-[25px]">
                            <span class="flex justify-between w-full whitespace-nowrap">
                                <div>
                                    <a href="{{ route('authors.index') }}" aria-label="Knjige">
                                        <i class="text-[25px] transition duration-300 ease-in group-hover:text-[#576cdf] text-[#707070] fas fa-user-graduate"></i>
                                        <div class="hidden sidebar-item">
                                            <p class="transition duration-300 ease-in group-hover:text-[#576cdf] inline text-[15px] ml-[20px]">
                                                Autori
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </span>
                        </div>
                    </li>
                @endif

                <!-- Izdavanje Icon -->
                @if(request()->routeIs('evidencija.*'))
                    <li class="pt-[18px] pb-[14px] mb-[4px] group hover:bg-[#EAEAEA] h-[60px]">
                        <div class="ml-[25px]">
                            <span class="flex justify-between w-full whitespace-nowrap">
                                <div>
                                    <a href="{{ route('evidencija.izdate') }}" aria-label="Knjige">
                                        <i class="text-[22px] transition duration-300 ease-in text-[#576cdf] text-[#707070] fas fa-exchange-alt"></i>
                                        <div class="hidden sidebar-item">
                                            <p class="transition duration-300 ease-in text-[#576cdf] inline text-[15px] ml-[20px]">
                                                Izdavanje Knjiga
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </span>
                        </div>
                    </li>
                @else
                    <li class="pt-[18px] pb-[14px] mb-[4px] group hover:bg-[#EAEAEA] h-[60px]">
                        <div class="ml-[25px]">
                            <span class="flex justify-between w-full whitespace-nowrap">
                                <div>
                                    <a href="{{ route('evidencija.izdate') }}" aria-label="Knjige">
                                        <i class="text-[22px] transition duration-300 ease-in group-hover:text-[#576cdf] text-[#707070] fas fa-exchange-alt"></i>
                                        <div class="hidden sidebar-item">
                                            <p class="transition duration-300 ease-in group-hover:text-[#576cdf] inline text-[15px] ml-[20px]">
                                                Izdavanje Knjiga
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </span>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </div>
    <div class="sidebar-nav py-[10px] border-t-[1px] border-[#e4dfdf] pt-[23px] pb-[29px]  group hover:bg-[#EFF3F6]">
        <!-- Settings Icon -->
        @if(request()->routeIs('policy.*', 'category.*', 'genre.*', 'publisher.*', 'bookbind.*', 'format.*', 'script.*', 'language.*'))
            <a href="{{ route('policy.index') }}" aria-label="Settngs" class="ml-[25px]">
                <span class="whitespace-nowrap">
                    <i
                        class="transition duration-300 ease-in text-[#576cdf] text-[22px] text-[#707070] fas fa-cog"></i>
                    <div class="hidden sidebar-item">
                        <p class="transition duration-300 ease-in text-[#576cdf] inline text-[15px] ml-[20px]">
                            Settings</p>
                    </div>
                </span>
            </a>
        @else
            <a href="{{ route('policy.index') }}" aria-label="Settngs" class="ml-[25px]">
                <span class="whitespace-nowrap">
                    <i
                        class="transition duration-300 ease-in group-hover:text-[#576cdf] text-[22px] text-[#707070] fas fa-cog"></i>
                    <div class="hidden sidebar-item">
                        <p class="transition duration-300 ease-in group-hover:text-[#576cdf] inline text-[15px] ml-[20px]">
                            Settings</p>
                    </div>
                </span>
            </a>
        @endif
    </div>
</nav>
