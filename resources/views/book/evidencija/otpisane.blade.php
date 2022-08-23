<x-layout>
    @section('title')
        Otpisane: Ime Knjige
    @endsection
    <section class="w-screen h-screen pl-[80px] pb-2 text-gray-700">
        <!-- Heading of content -->
        {{--<x-book-header :book="$book"/>--}}
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
                    <p class="inline cursor-pointer text-[25px] py-[10px] pl-[30px] border-l-[1px] border-[#e4dfdf] dotsIznajmljivanjeVracene hover:text-[#606FC7]">
                        <i
                            class="fas fa-ellipsis-v"></i>
                    </p>
                    <div
                        class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-iznajmljivanje-vracene">
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
                <div class="py-4 text-gray-500 border-[#e4dfdf] pl-[30px]">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-link" href="napravitiRutu">Osnovni detalji</a>
                            <a class="nav-link" href="napravitiRutu">Specifikacija</a>
                            <a class="nav-link active"  href="napravitiRutu" aria-selected='true'>Evidencija iznajmljivanja</a>
                            <a class="nav-link" href="napravitiRutu">Multimedija</a>
                        </div>
                    </nav>
                </div>
                <div class="py-4 pt-[20px] pl-[30px] text-[#2D3B48]">
                    <a href="napravitiRutu"
                       class="py-[15px] px-[20px] w-[268px] cursor-pointer hover:bg-[#EFF3F6] rounded-[10px] inline hover:text-[#576cdf]">
                        <i class="text-[20px] far fa-copy mr-[3px]"></i>
                        Izdate knjige
                    </a>
                    <a href="napravitiRutu"
                       class="inline py-[15px] rounded-[10px] group px-[20px] w-[268px] text-[#576cdf] bg-[#EFF3F6] hover:text-[#576cdf] hover:bg-[#EFF3F6] ml-[20px] pr-[10px]">
                        <i class="text-[20px]  group-hover:text-[#576cdf] fas fa-file mr-[3px]"></i>
                        Vracene knjige
                    </a>
                    <a href="napravitiRutu"
                       class="inline py-[15px] rounded-[10px] group px-[20px] w-[268px] hover:text-[#576cdf] hover:bg-[#EFF3F6] ml-[20px] pr-[10px]">
                        <i class="text-[20px] text-[#707070] group-hover:text-[#576cdf] fas fa-level-up-alt mr-[3px]"></i>
                        Otpisane knjige
                    </a>
                    <a href="napravitiRutu"
                       class="inline py-[15px] rounded-[10px] group px-[20px] w-[268px] hover:text-[#576cdf] hover:bg-[#EFF3F6] ml-[20px] pr-[10px]">
                        <i class="text-[20px] text-[#707070] group-hover:text-[#576cdf] fas fa-exclamation-triangle mr-[3px]"></i>
                        Knjige u prekoracenju
                    </a>
                    <a href="napravitiRutu"
                       class="inline py-[15px] rounded-[10px] group px-[20px] w-[268px] hover:text-[#576cdf] hover:bg-[#EFF3F6] ml-[20px] pr-[10px]">
                        <i class="text-[20px] text-[#707070] group-hover:text-[#576cdf] far fa-calendar-check mr-[3px]"></i>
                        Aktivne rezervacije
                    </a>
                    <a href="napravitiRutu"
                       class="inline py-[15px] rounded-[10px] group px-[20px] w-[268px] hover:text-[#576cdf] hover:bg-[#EFF3F6] ml-[20px] pr-[10px]">
                        <i class="text-[20px] text-[#707070] group-hover:text-[#576cdf] fas fa-calendar-alt  mr-[3px]"></i>
                        Arhivirane rezervacije
                    </a>
                </div>
                <!-- Space for content -->
                <div class="w-full mt-[10px] ml-2 px-4">
                    <table class="overflow-hidden shadow-lg rounded-xl w-full border-[1px] border-[#e4dfdf]" id="myTable">
                        <thead class="bg-[#EFF3F6]">
                        <tr class="border-b-[1px] border-[#e4dfdf]">
                            <th class="px-4 py-4 leading-4 tracking-wider text-left text-blue-500">
                                <label class="inline-flex items-center">
                                </label>
                            </th>
                            <th class="px-4 py-4 leading-4 tracking-wider text-left">Naziv knjige</th>
                            <th class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer uceniciDrop-toggle">Izdato uceniku</th>
                            <th class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer datumDrop-toggle">Datum izdavanja</th>
                            <th class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer vracanjeDrop-toggle">Datum otpisivanja</th>
                            <th class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer bibliotekariDrop-toggle">Knjigu otpisao</th>
                            <th class="px-4 py-4"> </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white">
                        <tr class="hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                            <td class="px-4 py-3 whitespace-no-wrap">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" class="form-checkbox">
                                </label>
                            </td>
                            <td class="flex flex-row items-center px-4 py-3">
                                <img class="object-cover w-8 mr-2 h-11" src="img/tomsojer.jpg" alt="" />
                                <a href="knjigaOsnovniDetalji.php">
                                    <span class="font-medium text-center">Geografija Crne Gore</span>
                                </a>
                            </td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">Pero Perovic</td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">21.02.2021</td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">29.02.2021</td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">Valentina Kascelan</td>
                            <td class="px-6 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                                <p class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsIznajmljivanjeVraceneKnjige hover:text-[#606FC7]">
                                    <i
                                        class="fas fa-ellipsis-v"></i>
                                </p>
                                <div
                                    class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 iznajmljivanje-vracene-knjige">
                                    <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                         aria-labelledby="headlessui-menu-button-1"
                                         id="headlessui-menu-items-117" role="menu">
                                        <div class="py-1">
                                            <a href="izdavanjeDetalji.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="far fa-file mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Pogledaj detalje</span>
                                            </a>

                                            <a href="izdajKnjigu.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="far fa-hand-scissors mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Izdaj knjigu</span>
                                            </a>

                                            <a href="vratiKnjigu.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="fas fa-redo-alt mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Vrati knjigu</span>
                                            </a>

                                            <a href="rezervisiKnjigu.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="far fa-calendar-check mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Rezervisi knjigu</span>
                                            </a>

                                            <a href="otpisiKnjigu.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="fas fa-level-up-alt mr-[14px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Otpisi knjigu</span>
                                            </a>

                                            <a href="#" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="fa fa-trash mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Izbrisi knjigu</span>
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
                            <td class="flex flex-row items-center px-4 py-3">
                                <img class="object-cover w-8 mr-2 h-11" src="img/tomsojer.jpg" alt="" />
                                <a href="knjigaOsnovniDetalji.php">
                                    <span class="font-medium text-center">Geografija Crne Gore</span>
                                </a>
                            </td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">Nina Bulatovic</td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">15.05.2020</td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">15.05.2020</td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">Valentina Kascelan</td>
                            <td class="px-6 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                                <p class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsIznajmljivanjeVraceneKnjige hover:text-[#606FC7]">
                                    <i
                                        class="fas fa-ellipsis-v"></i>
                                </p>
                                <div
                                    class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 iznajmljivanje-vracene-knjige">
                                    <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                         aria-labelledby="headlessui-menu-button-1"
                                         id="headlessui-menu-items-117" role="menu">
                                        <div class="py-1">
                                            <a href="izdavanjeDetalji.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="far fa-file mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Pogledaj detalje</span>
                                            </a>

                                            <a href="izdajKnjigu.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="far fa-hand-scissors mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Izdaj knjigu</span>
                                            </a>

                                            <a href="vratiKnjigu.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="fas fa-redo-alt mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Vrati knjigu</span>
                                            </a>

                                            <a href="rezervisiKnjigu.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="far fa-calendar-check mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Rezervisi knjigu</span>
                                            </a>

                                            <a href="otpisiKnjigu.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="fas fa-level-up-alt mr-[14px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Otpisi knjigu</span>
                                            </a>

                                            <a href="#" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="fa fa-trash mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Izbrisi knjigu</span>
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
                            <td class="flex flex-row items-center px-4 py-3">
                                <img class="object-cover w-8 mr-2 h-11" src="img/tomsojer.jpg" alt="" />
                                <a href="knjigaOsnovniDetalji.php">
                                    <span class="font-medium text-center">Geografija Crne Gore</span>
                                </a>
                            </td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">Milos Milosevic</td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">12.05.2020</td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">12.05.2020</td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">Valentina Kascelan</td>
                            <td class="px-6 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                                <p class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsIznajmljivanjeVraceneKnjige hover:text-[#606FC7]">
                                    <i
                                        class="fas fa-ellipsis-v"></i>
                                </p>
                                <div
                                    class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 iznajmljivanje-vracene-knjige">
                                    <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                         aria-labelledby="headlessui-menu-button-1"
                                         id="headlessui-menu-items-117" role="menu">
                                        <div class="py-1">
                                            <a href="izdavanjeDetalji.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="far fa-file mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Pogledaj detalje</span>
                                            </a>

                                            <a href="izdajKnjigu.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="far fa-hand-scissors mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Izdaj knjigu</span>
                                            </a>

                                            <a href="vratiKnjigu.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="fas fa-redo-alt mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Vrati knjigu</span>
                                            </a>

                                            <a href="rezervisiKnjigu.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="far fa-calendar-check mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Rezervisi knjigu</span>
                                            </a>

                                            <a href="otpisiKnjigu.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="fas fa-level-up-alt mr-[14px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Otpisi knjigu</span>
                                            </a>

                                            <a href="#" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="fa fa-trash mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Izbrisi knjigu</span>
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
                            <td class="flex flex-row items-center px-4 py-3">
                                <img class="object-cover w-8 mr-2 h-11" src="img/tomsojer.jpg" alt="" />
                                <a href="knjigaOsnovniDetalji.php">
                                    <span class="font-medium text-center">Geografija Crne Gore</span>
                                </a>
                            </td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">Sanja Gardasevic</td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">09.04.2020</td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">09.04.2020</td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">Valentina Kascelan</td>
                            <td class="px-6 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                                <p class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsIznajmljivanjeVraceneKnjige hover:text-[#606FC7]">
                                    <i
                                        class="fas fa-ellipsis-v"></i>
                                </p>
                                <div
                                    class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 iznajmljivanje-vracene-knjige">
                                    <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                         aria-labelledby="headlessui-menu-button-1"
                                         id="headlessui-menu-items-117" role="menu">
                                        <div class="py-1">
                                            <a href="izdavanjeDetalji.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="far fa-file mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Pogledaj detalje</span>
                                            </a>

                                            <a href="izdajKnjigu.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="far fa-hand-scissors mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Izdaj knjigu</span>
                                            </a>

                                            <a href="vratiKnjigu.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="fas fa-redo-alt mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Vrati knjigu</span>
                                            </a>

                                            <a href="rezervisiKnjigu.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="far fa-calendar-check mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Rezervisi knjigu</span>
                                            </a>

                                            <a href="otpisiKnjigu.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="fas fa-level-up-alt mr-[14px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Otpisi knjigu</span>
                                            </a>

                                            <a href="#" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="fa fa-trash mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Izbrisi knjigu</span>
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
                            <td class="flex flex-row items-center px-4 py-3">
                                <img class="object-cover w-8 mr-2 h-11" src="img/tomsojer.jpg" alt="" />
                                <a href="knjigaOsnovniDetalji.php">
                                    <span class="font-medium text-center">Geografija Crne Gore</span>
                                </a>
                            </td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">Pero Perovic</td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">21.02.2021</td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">21.02.2021</td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">Valentina Kascelan</td>
                            <td class="px-6 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                                <p class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsIznajmljivanjeVraceneKnjige hover:text-[#606FC7]">
                                    <i
                                        class="fas fa-ellipsis-v"></i>
                                </p>
                                <div
                                    class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 iznajmljivanje-vracene-knjige">
                                    <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                         aria-labelledby="headlessui-menu-button-1"
                                         id="headlessui-menu-items-117" role="menu">
                                        <div class="py-1">
                                            <a href="izdavanjeDetalji.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="far fa-file mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Pogledaj detalje</span>
                                            </a>

                                            <a href="izdajKnjigu.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="far fa-hand-scissors mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Izdaj knjigu</span>
                                            </a>

                                            <a href="vratiKnjigu.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="fas fa-redo-alt mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Vrati knjigu</span>
                                            </a>

                                            <a href="rezervisiKnjigu.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="far fa-calendar-check mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Rezervisi knjigu</span>
                                            </a>

                                            <a href="otpisiKnjigu.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="fas fa-level-up-alt mr-[14px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Otpisi knjigu</span>
                                            </a>

                                            <a href="#" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="fa fa-trash mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Izbrisi knjigu</span>
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
                            <td class="flex flex-row items-center px-4 py-3">
                                <img class="object-cover w-8 mr-2 h-11" src="img/tomsojer.jpg" alt="" />
                                <a href="knjigaOsnovniDetalji.php">
                                    <span class="font-medium text-center">Geografija Crne Gore</span>
                                </a>
                            </td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">Nina Bulatovic</td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">15.05.2020</td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">15.05.2020</td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">Valentina Kascelan</td>
                            <td class="px-6 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                                <p class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsIznajmljivanjeVraceneKnjige hover:text-[#606FC7]">
                                    <i
                                        class="fas fa-ellipsis-v"></i>
                                </p>
                                <div
                                    class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 iznajmljivanje-vracene-knjige">
                                    <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                         aria-labelledby="headlessui-menu-button-1"
                                         id="headlessui-menu-items-117" role="menu">
                                        <div class="py-1">
                                            <a href="izdavanjeDetalji.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="far fa-file mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Pogledaj detalje</span>
                                            </a>

                                            <a href="izdajKnjigu.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="far fa-hand-scissors mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Izdaj knjigu</span>
                                            </a>

                                            <a href="vratiKnjigu.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="fas fa-redo-alt mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Vrati knjigu</span>
                                            </a>

                                            <a href="rezervisiKnjigu.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="far fa-calendar-check mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Rezervisi knjigu</span>
                                            </a>

                                            <a href="otpisiKnjigu.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="fas fa-level-up-alt mr-[14px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Otpisi knjigu</span>
                                            </a>

                                            <a href="#" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="fa fa-trash mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Izbrisi knjigu</span>
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
                            <td class="flex flex-row items-center px-4 py-3">
                                <img class="object-cover w-8 mr-2 h-11" src="img/tomsojer.jpg" alt="" />
                                <a href="knjigaOsnovniDetalji.php">
                                    <span class="font-medium text-center">Geografija Crne Gore</span>
                                </a>
                            </td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">Milos Milosevic</td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">12.05.2020</td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">12.05.2020</td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">Valentina Kascelan</td>
                            <td class="px-6 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                                <p class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsIznajmljivanjeVraceneKnjige hover:text-[#606FC7]">
                                    <i
                                        class="fas fa-ellipsis-v"></i>
                                </p>
                                <div
                                    class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 iznajmljivanje-vracene-knjige">
                                    <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                         aria-labelledby="headlessui-menu-button-1"
                                         id="headlessui-menu-items-117" role="menu">
                                        <div class="py-1">
                                            <a href="izdavanjeDetalji.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="far fa-file mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Pogledaj detalje</span>
                                            </a>

                                            <a href="izdajKnjigu.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="far fa-hand-scissors mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Izdaj knjigu</span>
                                            </a>

                                            <a href="vratiKnjigu.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="fas fa-redo-alt mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Vrati knjigu</span>
                                            </a>

                                            <a href="rezervisiKnjigu.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="far fa-calendar-check mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Rezervisi knjigu</span>
                                            </a>

                                            <a href="otpisiKnjigu.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="fas fa-level-up-alt mr-[14px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Otpisi knjigu</span>
                                            </a>

                                            <a href="#" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="fa fa-trash mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Izbrisi knjigu</span>
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
                            <td class="flex flex-row items-center px-4 py-3">
                                <img class="object-cover w-8 mr-2 h-11" src="img/tomsojer.jpg" alt="" />
                                <a href="knjigaOsnovniDetalji.php">
                                    <span class="font-medium text-center">Geografija Crne Gore</span>
                                </a>
                            </td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">Sanja Gardasevic</td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">09.04.2020</td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">09.04.2020</td>
                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">Valentina Kascelan</td>
                            <td class="px-6 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                                <p class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsIznajmljivanjeVraceneKnjige hover:text-[#606FC7]">
                                    <i
                                        class="fas fa-ellipsis-v"></i>
                                </p>
                                <div
                                    class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 iznajmljivanje-vracene-knjige">
                                    <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                         aria-labelledby="headlessui-menu-button-1"
                                         id="headlessui-menu-items-117" role="menu">
                                        <div class="py-1">
                                            <a href="izdavanjeDetalji.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="far fa-file mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Pogledaj detalje</span>
                                            </a>

                                            <a href="izdajKnjigu.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="far fa-hand-scissors mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Izdaj knjigu</span>
                                            </a>

                                            <a href="vratiKnjigu.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="fas fa-redo-alt mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Vrati knjigu</span>
                                            </a>

                                            <a href="rezervisiKnjigu.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="far fa-calendar-check mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Rezervisi knjigu</span>
                                            </a>

                                            <a href="otpisiKnjigu.php" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="fas fa-level-up-alt mr-[14px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Otpisi knjigu</span>
                                            </a>

                                            <a href="#" tabindex="0"
                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                               role="menuitem">
                                                <i class="fa fa-trash mr-[10px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Izbrisi knjigu</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr class="border-b-[1px] border-[#e4dfdf]">
                            <th class="px-4 py-4 leading-4 tracking-wider text-left text-blue-500">
                                <label class="inline-flex items-center">
                                </label>
                            </th>
                            <th class="px-4 py-4 leading-4 tracking-wider text-left">Naziv knjige</th>
                            <th class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer uceniciDrop-toggle">Izdato uceniku</th>
                            <th class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer datumDrop-toggle">Datum izdavanja</th>
                            <th class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer vracanjeDrop-toggle">Datum otpisivanja</th>
                            <th class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer bibliotekariDrop-toggle">Knjigu otpisao</th>
                            <th class="px-4 py-4"> </th>
                        </tr>
                        </tfoot>
                    </table>


                </div>
            </div>
            {{--<x-book-borrow-history :book="$book"/>--}}
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
