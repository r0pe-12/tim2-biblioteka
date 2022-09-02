<header id="siteHeader"
    class="z-20 small:hidden  flex items-center text-white justify-between justify-content-around w-full h-[71px] pr-[30px] mx-auto bg-[#4558BE]">
    <!-- logo -->
    <div class="logo-font inline-flex py-[18px] px-[30px]">
        <a class="_o6689fn" href="#">
            <div class="block">
                <a href="/" class="text-[20px] font-medium">
                    <div class="flex">
                        <img src='{{ asset('img/logo.svg') }}' alt="" width="35px" height="35px">
                        <p class="text-[20px] mt-[5px]">&nbsp;&nbsp;Online Biblioteka</p>
                    </div>

                </a>
            </div>
        </a>
    </div>
    <!-- end logo -->
    <!-- live search -->
    <div id="searchWrapper" class="inline-flex" style="margin-right: auto;font-size: 20px;">
        <span id="searchIcon" style="cursor: pointer">
            <i class="fas fa-magnifying-glass pt-[10px] pr-[10px]"></i>
        </span>

        <form onsubmit="event.preventDefault()" id="searchForm" hidden>
            @csrf
            <input id="searchBar" autofocus autocomplete="off" name="searchWord" type="search" placeholder="Search" class="w-[500px] flex-1 w-full px-4 py-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-[1px]  border-[#e4dfdf]  rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
            <a id="filterDropdown" style="padding-left: 10px" href="#">Filteri <i class="fas fa-caret-down"></i></a>
        </form>

        <div id="info" style="top: 75px;position: absolute;margin-left: 30px;z-index: 999" hidden class="scrolly w-[500px] flex-1 w-full px-4 py-2  text-gray-700 placeholder-gray-400 bg-white border-[1px]  border-[#e4dfdf]  rounded-lg shadow-sm appearance-none">
            <ul>
            </ul>
        </div>

        <div id="resultWrapper" style="top: 75px;position: absolute;margin-left: 30px;z-index: 999;height: 300px; background-color: #eff3f6 " hidden class="scrolly w-[500px] flex-1 w-full px-4 py-2  text-gray-700 placeholder-gray-400 bg-white border-[1px]  border-[#e4dfdf]  rounded-lg shadow-sm appearance-none">
            <div id="knjigaWrapper">
                Knjige
                <ul id="knjige" class="search">
                </ul>
            </div>

            <div id="ucenikWrapper" class="search">
                Učenici
                <ul id="učenici">
                </ul>
            </div>

            <div id="bibliotekarWrapper" class="search">
                Bibliotekari
                <ul id="bibliotekari">
                </ul>
            </div>
        </div>

        <div id="searchFilter" hidden style="top: 75px;position: absolute;margin-left: 540px;z-index: 999;background-color: #eff3f6" class="max-w-[304px] flex-1 w-full px-4 py-2  text-gray-700 placeholder-gray-400 bg-white border-[1px]  border-[#e4dfdf]  rounded-lg shadow-sm appearance-none">
            <ul>
                <li onclick="this.querySelector('input').click()" style="cursor: pointer">
                    <input type="checkbox" id="knjigeFilter" checked> Knjige
                </li>
                <li style="padding-top: 5px;cursor: pointer" onclick="this.querySelector('input').click()">
                    <input type="checkbox" id="ucenikFilter" checked> Učenici
                </li>
                <li style="padding-top: 5px;cursor: pointer" onclick="this.querySelector('input').click()">
                    <input type="checkbox" id="bibliotekarFilter" checked> Bibliotekari
                </li>
            </ul>
        </div>
    </div>
    <!-- end live search -->

    <!-- login -->
    <div class="flex-initial">
        <div class="relative flex items-center justify-end">
            <div class="flex items-center">
                <!-- Notification Icon -->
                <div class="relative block">
                    <a href="/activity" class="relative inline-block px-3 py-2 focus:outline-none"
                        aria-label="Notification">
                        <div class="flex items-center h-5">
                            <div class="_xpkakx">
                                <span
                                    class="transition duration-300 ease-in bg-[#606FC7] text-[25px] rounded-full px-[11px] py-[7px] ">
                                    <i class="far fa-bell"></i>
                                </span>
                            </div>
                        </div>
                    </a>
                    <span
                        class="absolute bg-[#EF4F4C] text-[11px] font-medium text-white right-[10px] top-[-10px] pl-[4px] pr-[5px] pt-[1px] text-center">12</span>
                </div>
                <!-- Add Icon -->
                <a class="inline-block border-l-[1px] border-gray-300 px-3" href="#" aria-label="Add something" id="dropdownCreate">
                    <span
                        class="transition duration-300 ease-in bg-[#606FC7] text-[25px] rounded-full px-[11px] py-[7px]  ">
                        <i class="fas fa-plus"></i>
                    </span>
                </a>

                <div
                    class="z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-create">
                    <div class="absolute right-[12px] w-56 mt-[35px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                        aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                        <div class="py-1">
                            <a href="{{ route('librarians.create') }}" tabindex="0"
                                class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                role="menuitem">
                                <i class="far fa-address-book mr-[8px] ml-[5px] py-1"></i>
                                <span class="px-4 py-0">Novi bibliotekar</span>
                            </a>
                            <a href="{{route('students.create')}}" tabindex="0"
                                class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                role="menuitem">
                                <i class="fas fa-users mr-[5px] ml-[3px] py-1"></i>
                                <span class="px-4 py-0">Novi učenik</span>
                            </a>
                            <a href="{{ route('books.create') }}" tabindex="0"
                                class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                role="menuitem">
                                <i class="far fa-copy mr-[10px] ml-[5px] py-1"></i>
                                <span class="px-4 py-0">Nova knjiga</span>
                            </a>
                            <a href="{{ route('authors.create') }}" tabindex="0"
                                class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                role="menuitem">
                                <i class="far fa-address-book mr-[10px] ml-[5px] py-1"></i>
                                <span class="px-4 py-0">Novi autor</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- User Profile Icon -->
                <div class="ml-[10px] relative block">
                    <a href="#" class="relative inline-block px-3 py-2 focus:outline-none" id="dropdownProfile"
                        aria-label="User profile">
                        <div class="flex items-center h-5">
                            <div class="w-[40px] h-[40px] mt-[15px]">
                                <img class="rounded-full" src="{{ auth()->user()->photoPath }}" alt="">
                            </div>
                        </div>
                    </a>
                </div>
                <div
                    class="z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-profile">
                    <div class="absolute right-[12px] w-56 mt-[35px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                        aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                        <div class="py-1">
                            <a href="{{ route('librarians.show', auth()->user()->username) }}" tabindex="0"
                                class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                role="menuitem">
                                <i class="fas fa-file mr-[8px] ml-[5px] py-1"></i>
                                <span class="px-4 py-0">Profile</span>
                            </a>
                            <form method="POST" action="{{ route('logout') }}" enctype="multipart/form-data" tabindex="0"
                                  class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                  role="menuitem">
                                @csrf
                                <i class="fas fa-sign-out-alt mr-[5px] ml-[5px] py-1"></i>
                                <button type="submit"><span class="px-4 py-0">Logout</span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end login -->
</header>
