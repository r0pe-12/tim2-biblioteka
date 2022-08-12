<x-layout>
    @section('title')
        Arhivirane:
    @endsection
    <!-- Content -->
    <section class="w-screen h-screen pl-[80px] pb-2 text-gray-700">
        <!-- Heading of content -->
        <div class="heading">
            <div class="flex flex-row justify-between border-b-[1px] border-[#e4dfdf]">
                <div class="py-[10px] flex flex-row">
                    <div class="w-[77px] pl-[30px]">
                        <img src="img/tomsojer.jpg" alt="">
                    </div>
                    <div class="pl-[15px]  flex flex-col">
                        <div>
                            <h1>
                                Tom Sojer
                            </h1>
                        </div>
                        <div>
                            <nav class="w-full rounded">
                                <ol class="flex list-reset">
                                    <li>
                                        <a href="evidencijaKnjiga.php" class="text-[#2196f3] hover:text-blue-600">
                                            Evidencija knjiga
                                        </a>
                                    </li>
                                    <li>
                                        <span class="mx-2">/</span>
                                    </li>
                                    <li>
                                        <a href="knjigaOsnovniDetalji.php"
                                           class="text-[#2196f3] hover:text-blue-600">
                                            KNJIGA-467
                                        </a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="pt-[24px] mr-[30px]">
                    <a href="otpisiKnjigu.php" class="inline hover:text-blue-600">
                        <i class="fas fa-level-up-alt mr-[3px]"></i>
                        Otpisi knjigu
                    </a>
                    <a href="izdajKnjigu.php" class="inline hover:text-blue-600 ml-[20px] pr-[10px]">
                        <i class="far fa-hand-scissors mr-[3px]"></i>
                        Izdaj knjigu
                    </a>
                    <a href="vratiKnjigu.php" class="hover:text-blue-600 inline ml-[20px] pr-[10px]">
                        <i class="fas fa-redo-alt mr-[3px] "></i>
                        Vrati knjigu
                    </a>
                    <a href="rezervisiKnjigu.php" class="hover:text-blue-600 inline ml-[20px] pr-[10px]">
                        <i class="far fa-calendar-check mr-[3px] "></i>
                        Rezervisi knjigu
                    </a>
                    <p class="inline cursor-pointer text-[25px] py-[10px] pl-[30px] border-l-[1px] border-[#e4dfdf] dotsIznajmljivanjeArhiviraneRezervacije hover:text-[#606FC7]">
                        <i
                            class="fas fa-ellipsis-v"></i>
                    </p>
                    <div
                        class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-iznajmljivanje-arhivirane-rezervacije">
                        <div class="absolute right-0 w-56 mt-[7px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                             aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                            <div class="py-1">
                                <a href="editKnjiga.php" tabindex="0"
                                   class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                   role="menuitem">
                                    <i class="fas fa-edit mr-[1px] ml-[5px] py-1"></i>
                                    <span class="px-4 py-0">Izmijeni knjigu</span>
                                </a>
                                <a href="#" tabindex="0"
                                   class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                   role="menuitem">
                                    <i class="fa fa-trash mr-[5px] ml-[5px] py-1"></i>
                                    <span class="px-4 py-0">Izbrisi knjigu</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-row height-iznajmljivanje scroll">
            <div class="w-[80%]">
                <div class="border-b-[1px] border-[#e4dfdf] py-4  border-gray-300 pl-[30px]">
                    <a href="knjigaOsnovniDetalji.php" class="inline hover:text-blue-800">
                        Osnovni detalji
                    </a>
                    <a href="knjigaSpecifikacija.php" class="inline ml-[70px] hover:text-blue-800 ">
                        Specifikacija
                    </a>
                    <a href="iznajmljivanjeIzdate.php" class="inline ml-[70px] active-book-nav hover:text-blue-800">
                        Evidencija iznajmljivanja
                    </a>
                    <a href="evidencijaKnjigaMultimedija.php" class="inline ml-[70px] hover:text-blue-800">
                        Multimedija
                    </a>
                </div>
                <div class="py-4 pt-[20px] pl-[30px] text-[#2D3B48]">
                    <a href="IznajmljivanjeIzdate.php"
                       class="py-[15px] px-[20px] w-[268px] cursor-pointer hover:bg-[#EFF3F6] rounded-[10px] inline hover:text-[#576cdf]">
                        <i class="text-[20px] far fa-copy mr-[3px]"></i>
                        Izdate knjige
                    </a>
                    <a href="iznajmljivanjeVracene.php"
                       class="inline py-[15px] rounded-[10px] group px-[20px] w-[268px] hover:text-[#576cdf] hover:bg-[#EFF3F6] ml-[20px] pr-[10px]">
                        <i class="text-[20px]  group-hover:text-[#576cdf] fas fa-file mr-[3px]"></i>
                        Vracene knjige
                    </a>
                    <a href="iznajmljivanjePrekoracenje.php"
                       class="inline py-[15px] rounded-[10px] group px-[20px] w-[268px] hover:text-[#576cdf] hover:bg-[#EFF3F6] ml-[20px] pr-[10px]">
                        <i class="text-[20px] group-hover:text-[#576cdf] fas fa-exclamation-triangle mr-[3px]"></i>
                        Knjige u prekoracenju
                    </a>
                    <a href="iznajmljivanjeAktivne.php"
                       class="inline py-[15px] rounded-[10px] group px-[20px] w-[268px] hover:text-[#576cdf] hover:bg-[#EFF3F6] ml-[20px] pr-[10px]">
                        <i class="text-[20px] group-hover:text-[#576cdf] far fa-calendar-check mr-[3px]"></i>
                        Aktivne rezervacije
                    </a>
                    <a href="iznajmljivanjeArhivirane.php"
                       class="inline py-[15px] rounded-[10px] group px-[20px] w-[268px] bg-[#EFF3F6] text-[#576cdf] hover:text-[#576cdf] hover:bg-[#EFF3F6] ml-[20px] pr-[10px]">
                        <i
                            class="text-[20px] group-hover:text-[#576cdf] fas fa-calendar-alt  mr-[3px]"></i>
                        Arhivirane rezervacije
                    </a>
                </div>
                <!-- Space for content -->
                <div class="w-full mt-[10px] ml-2 px-4">
                    <table class="overflow-hidden shadow-lg rounded-xl w-full border-[1px] border-[#e4dfdf] rezervacije" id="myTable">
                        <thead class="bg-[#EFF3F6]">
                        <tr class="border-b-[1px] border-[#e4dfdf]">
                            <th class="px-4 py-3 leading-4 tracking-wider text-left text-blue-500">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" class="form-checkbox">
                                </label>
                            </th>
                            <th class="px-4 py-3 text-sm leading-4 tracking-wider text-left">Datum rezervacije
                            </th>
                            <th class="px-4 py-3 text-sm leading-4 tracking-wider text-left">Rezervacija istice
                            </th>
                            <th class="px-4 py-3 text-sm leading-4 tracking-wider text-left">Rezervaciju podnio
                            </th>
                            <th class="px-4 py-3 text-sm leading-4 tracking-wider text-left">Status</th>
                            <th class="px-4 py-3"> </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white">
                        <tr class="hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                            <td class="px-4 py-3 whitespace-no-wrap">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" class="form-checkbox">
                                </label>
                            </td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">31.04.2019</td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">10.05.2019</td>
                            <td class="flex flex-row items-center px-4 py-3">
                                <img class="object-cover w-8 h-8 rounded-full" src="img/profileStudent.jpg"
                                     alt="" />
                                <a href="ucenikProfile.php" class="ml-2 font-medium text-center">Pero
                                    Perovic</a>
                            </td>
                            <td class="px-4 py-3 text-sm leading-5 text-blue-900 whitespace-no-wrap">
                                <div
                                    class="inline-block px-[6px] py-[2px] font-medium bg-green-200 rounded-[10px]">
                                    <span class="text-xs text-green-800">Knjiga izdata</span>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                                <p
                                    class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsIznajmljivanjeArhiviraneRezervacijeTabela hover:text-[#606FC7]">
                                    <i class="fas fa-ellipsis-v"></i>
                                </p>
                                <div
                                    class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 iznajmljivanje-arhivirane-rezervacije">
                                    <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                         aria-labelledby="headlessui-menu-button-1"
                                         id="headlessui-menu-items-117" role="menu">
                                        <div class="py-1">
                                            <a href="izdajKnjigu.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="far fa-hand-scissors mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Izdaj knjigu</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                            <td class="px-4 py-3 whitespace-no-wrap">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" class="form-checkbox">
                                </label>
                            </td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">05.11.2020</td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">25.11.2020</td>
                            <td class="flex flex-row items-center px-4 py-3">
                                <img class="object-cover w-8 h-8 rounded-full" src="img/profileStudent.jpg"
                                     alt="" />
                                <a href="ucenikProfile.php" class="ml-2 font-medium text-center">Pero
                                    Perovic</a>
                            </td>
                            <td class="px-4 py-3 text-sm leading-5 text-blue-900 whitespace-no-wrap">
                                <div
                                    class="inline-block px-[6px] py-[2px] font-medium bg-red-200 rounded-[10px]">
                                    <span class="text-xs text-red-800">Rezervacija istekla</span>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                                <p
                                    class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsIznajmljivanjeArhiviraneRezervacijeTabela hover:text-[#606FC7]">
                                    <i class="fas fa-ellipsis-v"></i>
                                </p>
                                <div
                                    class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 iznajmljivanje-arhivirane-rezervacije">
                                    <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                         aria-labelledby="headlessui-menu-button-1"
                                         id="headlessui-menu-items-117" role="menu">
                                        <div class="py-1">
                                            <a href="izdajKnjigu.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="far fa-hand-scissors mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Izdaj knjigu</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                            <td class="px-4 py-3 whitespace-no-wrap">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" class="form-checkbox">
                                </label>
                            </td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">31.02.2021</td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">10.03.2021</td>
                            <td class="flex flex-row items-center px-4 py-3">
                                <img class="object-cover w-8 h-8 rounded-full" src="img/profileStudent.jpg"
                                     alt="" />
                                <a href="ucenikProfile.php" class="ml-2 font-medium text-center">Pero
                                    Perovic</a>
                            </td>
                            <td class="px-4 py-3 text-sm leading-5 text-blue-900 whitespace-no-wrap">
                                <div
                                    class="inline-block px-[6px] py-[2px] font-medium bg-red-200 rounded-[10px]">
                                    <span class="text-xs text-red-800">Rezervacija odbijena</span>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                                <p
                                    class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-[#e4dfdf] dotsIznajmljivanjeArhiviraneRezervacijeTabela hover:text-[#606FC7]">
                                    <i class="fas fa-ellipsis-v"></i>
                                </p>
                                <div
                                    class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 iznajmljivanje-arhivirane-rezervacije">
                                    <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                         aria-labelledby="headlessui-menu-button-1"
                                         id="headlessui-menu-items-117" role="menu">
                                        <div class="py-1">
                                            <a href="izdajKnjigu.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="far fa-hand-scissors mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Izdaj knjigu</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                            <td class="px-4 py-3 whitespace-no-wrap">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" class="form-checkbox">
                                </label>
                            </td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">31.04.2019</td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">10.05.2019</td>
                            <td class="flex flex-row items-center px-4 py-3">
                                <img class="object-cover w-8 h-8 rounded-full" src="img/profileStudent.jpg"
                                     alt="" />
                                <a href="ucenikProfile.php" class="ml-2 font-medium text-center">Pero
                                    Perovic</a>
                            </td>
                            <td class="px-4 py-3 text-sm leading-5 text-blue-900 whitespace-no-wrap">
                                <div
                                    class="inline-block px-[6px] py-[2px] font-medium bg-red-200 rounded-[10px]">
                                    <span class="text-xs text-red-800">Rezervacija otkazana</span>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                                <p
                                    class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsIznajmljivanjeArhiviraneRezervacijeTabela hover:text-[#606FC7]">
                                    <i class="fas fa-ellipsis-v"></i>
                                </p>
                                <div
                                    class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 iznajmljivanje-arhivirane-rezervacije">
                                    <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                         aria-labelledby="headlessui-menu-button-1"
                                         id="headlessui-menu-items-117" role="menu">
                                        <div class="py-1">
                                            <a href="izdajKnjigu.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="far fa-hand-scissors mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Izdaj knjigu</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                            <td class="px-4 py-3 whitespace-no-wrap">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" class="form-checkbox">
                                </label>
                            </td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">31.04.2019</td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">10.05.2019</td>
                            <td class="flex flex-row items-center px-4 py-3">
                                <img class="object-cover w-8 h-8 rounded-full" src="img/profileStudent.jpg"
                                     alt="" />
                                <a href="ucenikProfile.php" class="ml-2 font-medium text-center">Pero
                                    Perovic</a>
                            </td>
                            <td class="px-4 py-3 text-sm leading-5 text-blue-900 whitespace-no-wrap">
                                <div
                                    class="inline-block px-[6px] py-[2px] font-medium bg-green-200 rounded-[10px]">
                                    <span class="text-xs text-green-800">Knjiga izdata</span>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                                <p
                                    class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsIznajmljivanjeArhiviraneRezervacijeTabela hover:text-[#606FC7]">
                                    <i class="fas fa-ellipsis-v"></i>
                                </p>
                                <div
                                    class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 iznajmljivanje-arhivirane-rezervacije">
                                    <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                         aria-labelledby="headlessui-menu-button-1"
                                         id="headlessui-menu-items-117" role="menu">
                                        <div class="py-1">
                                            <a href="izdajKnjigu.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="far fa-hand-scissors mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Izdaj knjigu</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                            <td class="px-4 py-3 whitespace-no-wrap">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" class="form-checkbox">
                                </label>
                            </td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">05.11.2020</td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">25.11.2020</td>
                            <td class="flex flex-row items-center px-4 py-3">
                                <img class="object-cover w-8 h-8 rounded-full" src="img/profileStudent.jpg"
                                     alt="" />
                                <a href="ucenikProfile.php" class="ml-2 font-medium text-center">Pero
                                    Perovic</a>
                            </td>
                            <td class="px-4 py-3 text-sm leading-5 text-blue-900 whitespace-no-wrap">
                                <div
                                    class="inline-block px-[6px] py-[2px] font-medium bg-red-200 rounded-[10px]">
                                    <span class="text-xs text-red-800">Rezervacija istekla</span>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                                <p
                                    class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsIznajmljivanjeArhiviraneRezervacijeTabela hover:text-[#606FC7]">
                                    <i class="fas fa-ellipsis-v"></i>
                                </p>
                                <div
                                    class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 iznajmljivanje-arhivirane-rezervacije">
                                    <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                         aria-labelledby="headlessui-menu-button-1"
                                         id="headlessui-menu-items-117" role="menu">
                                        <div class="py-1">
                                            <a href="izdajKnjigu.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="far fa-hand-scissors mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Izdaj knjigu</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                            <td class="px-4 py-3 whitespace-no-wrap">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" class="form-checkbox">
                                </label>
                            </td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">31.02.2021</td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">10.03.2021</td>
                            <td class="flex flex-row items-center px-4 py-3">
                                <img class="object-cover w-8 h-8 rounded-full" src="img/profileStudent.jpg"
                                     alt="" />
                                <a href="ucenikProfile.php" class="ml-2 font-medium text-center">Pero
                                    Perovic</a>
                            </td>
                            <td class="px-4 py-3 text-sm leading-5 text-blue-900 whitespace-no-wrap">
                                <div
                                    class="inline-block px-[6px] py-[2px] font-medium bg-red-200 rounded-[10px]">
                                    <span class="text-xs text-red-800">Rezervacija odbijena</span>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                                <p
                                    class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-[#e4dfdf] dotsIznajmljivanjeArhiviraneRezervacijeTabela hover:text-[#606FC7]">
                                    <i class="fas fa-ellipsis-v"></i>
                                </p>
                                <div
                                    class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 iznajmljivanje-arhivirane-rezervacije">
                                    <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                         aria-labelledby="headlessui-menu-button-1"
                                         id="headlessui-menu-items-117" role="menu">
                                        <div class="py-1">
                                            <a href="izdajKnjigu.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="far fa-hand-scissors mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Izdaj knjigu</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                            <td class="px-4 py-3 whitespace-no-wrap">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" class="form-checkbox">
                                </label>
                            </td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">31.04.2019</td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">10.05.2019</td>
                            <td class="flex flex-row items-center px-4 py-3">
                                <img class="object-cover w-8 h-8 rounded-full" src="img/profileStudent.jpg"
                                     alt="" />
                                <a href="ucenikProfile.php" class="ml-2 font-medium text-center">Pero
                                    Perovic</a>
                            </td>
                            <td class="px-4 py-3 text-sm leading-5 text-blue-900 whitespace-no-wrap">
                                <div
                                    class="inline-block px-[6px] py-[2px] font-medium bg-red-200 rounded-[10px]">
                                    <span class="text-xs text-red-800">Rezervacija otkazana</span>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                                <p
                                    class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsIznajmljivanjeArhiviraneRezervacijeTabela hover:text-[#606FC7]">
                                    <i class="fas fa-ellipsis-v"></i>
                                </p>
                                <div
                                    class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 iznajmljivanje-arhivirane-rezervacije">
                                    <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                         aria-labelledby="headlessui-menu-button-1"
                                         id="headlessui-menu-items-117" role="menu">
                                        <div class="py-1">
                                            <a href="izdajKnjigu.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="far fa-hand-scissors mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Izdaj knjigu</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr class="border-b-[1px] border-[#e4dfdf]">
                            <th class="px-4 py-3 leading-4 tracking-wider text-left text-blue-500">
                            </th>
                            <th class="px-4 py-3 text-sm leading-4 tracking-wider text-left">Datum rezervacije
                            </th>
                            <th class="px-4 py-3 text-sm leading-4 tracking-wider text-left">Rezervacija istice
                            </th>
                            <th class="px-4 py-3 text-sm leading-4 tracking-wider text-left">Rezervaciju podnio
                            </th>
                            <th class="px-4 py-3 text-sm leading-4 tracking-wider text-left">Status</th>
                            <th class="px-4 py-3"> </th>
                        </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
            <div class="min-w-[20%] border-l-[1px] border-[#e4dfdf] ">
                <div class="border-b-[1px] border-[#e4dfdf]">
                    <div class="ml-[30px] mr-[70px] mt-[20px] flex flex-row justify-between">
                        <div class="text-gray-500 ">
                            <p>Na raspolaganju:</p>
                            <p class="mt-[20px]">Rezervisano:</p>
                            <p class="mt-[20px]">Izdato:</p>
                            <p class="mt-[20px]">U prekoracenju:</p>
                            <p class="mt-[20px]">Ukupna kolicina:</p>
                        </div>
                        <div class="text-center pb-[30px]">
                            <p class=" bg-green-200 text-green-700 rounded-[10px] px-[6px] py-[2px] text-[14px]">5
                                primjeraka</p>
                            <a href="iznajmljivanjeAktivne.php">
                                <p
                                    class=" mt-[16px] bg-yellow-200 text-yellow-700 rounded-[10px] px-[6px] py-[2px] text-[14px]">
                                    2 primjerka</p>
                            </a>
                            <a href="iznajmljivanjeIzdate.php">
                                <p
                                    class=" mt-[16px] bg-blue-200 text-blue-800 rounded-[10px] px-[6px] py-[2px] text-[14px]">
                                    102 primjerka</p>
                            </a>
                            <a href="iznajmljivanjePrekoracenje.php">
                                <p
                                    class=" mt-[16px] bg-red-200 text-red-800 rounded-[10px] px-[6px] py-[2px] text-[14px]">
                                    2 primjerka</p>
                            </a>
                            <p
                                class=" mt-[16px] border-[1px] border-green-700 text-green-700 rounded-[10px] px-[6px] py-[2px] text-[14px]">
                                15 primjeraka</p>
                        </div>
                    </div>
                </div>
                <div class="mt-[40px] mx-[30px]">
                    <div class="flex flex-col max-w-[304px]">
                        <div class="text-gray-500 ">
                            <p class="inline uppercase">
                                Izdavanja knjige
                            </p>
                            <span>
                                    - 4 days ago
                                </span>
                        </div>
                        <div>
                            <p>
                                <a href="bibliotekarProfile.php" class="text-[#2196f3] hover:text-blue-600">
                                    Valentina K.
                                </a>
                                je izdala knjigu
                                <a href="ucenikProfile.php" class="text-[#2196f3] hover:text-blue-600">
                                    Peru Perovicu
                                </a>
                                dana
                                <span class="font-medium">
                                        21.02.2021.
                                    </span>
                            </p>
                        </div>
                        <div>
                            <a href="izdavanjeDetalji.php" class="text-[#2196f3] hover:text-blue-600">
                                pogledaj detaljnije >>
                            </a>
                        </div>
                    </div>
                    <div class="mt-[40px] flex flex-col max-w-[304px]">
                        <div class="text-gray-500 ">
                            <p class="inline uppercase">
                                Izdavanja knjige
                            </p>
                            <span>
                                    - 4 days ago
                                </span>
                        </div>
                        <div>
                            <p>
                                <a href="bibliotekarProfile.php" class="text-[#2196f3] hover:text-blue-600">
                                    Valentina K.
                                </a>
                                je izdala knjigu
                                <a href="ucenikProfile.php" class="text-[#2196f3] hover:text-blue-600">
                                    Peru Perovicu
                                </a>
                                dana
                                <span class="font-medium">
                                        21.02.2021.
                                    </span>
                            </p>
                        </div>
                        <div>
                            <a href="izdavanjeDetalji.php" class="text-[#2196f3] hover:text-blue-600">
                                pogledaj detaljnije >>
                            </a>
                        </div>
                    </div>
                    <div class="mt-[40px] flex flex-col max-w-[304px]">
                        <div class="text-gray-500 ">
                            <p class="inline uppercase">
                                Izdavanja knjige
                            </p>
                            <span>
                                    - 4 days ago
                                </span>
                        </div>
                        <div>
                            <p>
                                <a href="bibliotekarProfile.php" class="text-[#2196f3] hover:text-blue-600">
                                    Valentina K.
                                </a>
                                je izdala knjigu
                                <a href="ucenikProfile.php" class="text-[#2196f3] hover:text-blue-600">
                                    Peru Perovicu
                                </a>
                                dana
                                <span class="font-medium">
                                        21.02.2021.
                                    </span>
                            </p>
                        </div>
                        <div>
                            <a href="izdavanjeDetalji.php" class="text-[#2196f3] hover:text-blue-600">
                                pogledaj detaljnije >>
                            </a>
                        </div>
                    </div>
                    <div class="mt-[40px]">
                        <a href="dashboardAktivnost.php?knjiga=Tom Sojer" class="text-[#2196f3] hover:text-blue-600">
                            <i class="fas fa-history"></i> Prikazi sve
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layout>
