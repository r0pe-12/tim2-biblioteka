<x-layout>
 @section('title')
     Otpisane knjige
 @endsection
    <!-- Content -->
    <section class="w-screen h-screen pl-[80px] py-4 text-gray-700">
        <!-- Heading of content -->
        <div class="heading mt-[7px]">
            <h1 class="pl-[30px] pb-[21px] border-b-[1px] border-[#e4dfdf] ">
                Izdavanje knjiga
            </h1>
        </div>
        <!-- Space for content -->
        <div class="scroll height-dashboard">
            <div class="flex items-center px-6 py-4 space-x-3 rounded-lg ml-[292px]">
                <div class="flex items-center">
                </div>
            </div>
            <div>
                <!-- Space for content -->
                <div class="flex justify-start pt-3 bg-white">
                    <div class="mt-[10px]">
                        <ul class="text-[#2D3B48]">
                            <li class="mb-[4px]">
                                <div class="w-[300px] pl-[32px]">
                                        <span
                                            class=" whitespace-nowrap w-full text-[25px]  flex justify-between fill-current">
                                            <div
                                                class="py-[15px] px-[20px] w-[268px] cursor-pointer group hover:bg-[#EFF3F6] rounded-[10px]">
                                                <a href="{{route('izdate')}}" aria-label="Sve knjige"
                                                   class="flex items-center">
                                                    <i
                                                        class="text-[#707070] transition duration-300 ease-in group-hover:text-[#576cdf] far fa-copy text-[20px]"></i>
                                                    <div>
                                                        <p
                                                            class="transition duration-300 ease-in group-hover:text-[#576cdf]  text-[15px] ml-[18px]">
                                                            Izdate knjige
                                                        </p>
                                                    </div>
                                                </a>
                                            </div>
                                        </span>
                                </div>
                            </li>
                            <li class="mb-[4px]">
                                <div class="w-[300px] pl-[32px]">
                                        <span
                                            class=" whitespace-nowrap w-full text-[25px] flex justify-between fill-current">
                                            <div
                                                class="group bg-[#EFF3F6] hover:bg-[#EFF3F6] py-[15px] px-[20px] w-[268px] rounded-[10px] cursor-pointer">
                                                <a href="{{route('vracene')}}" aria-label="Vracene knjige"
                                                   class="flex items-center">
                                                    <i
                                                        class="transition duration-300 ease-in  text-[#707070] text-[20px] fas fa-file text-[#576cdf]"></i>
                                                    <div>
                                                        <p
                                                            class="transition duration-300 ease-in  text-[15px] ml-[21px] text-[#576cdf]">
                                                            Vracene knjige
                                                        </p>
                                                    </div>
                                                </a>
                                            </div>
                                        </span>
                                </div>
                            </li>
                            <li class="mb-[4px]">
                                <div class="w-[300px] pl-[32px]">
                                        <span
                                            class=" whitespace-nowrap w-full text-[25px] flex justify-between fill-current">
                                            <div
                                                class="group hover:bg-[#EFF3F6] py-[15px] px-[20px] w-[268px] rounded-[10px] cursor-pointer">
                                                <a href="napravitiRutu" aria-label="Otpisane knjige"
                                                   class="flex items-center">
                                                    <i
                                                        class="text-[#707070] text-[20px] fas fa-level-up-alt transition duration-300 ease-in group-hover:text-[#576cdf]"></i>
                                                    <div>
                                                        <p
                                                            class="text-[15px] ml-[19px] transition duration-300 ease-in group-hover:text-[#576cdf]">
                                                            Otpisane knjige</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </span>
                                </div>
                            </li>
                            <li class="mb-[4px]">
                                <div class="w-[300px] pl-[28px]">
                                        <span
                                            class=" whitespace-nowrap w-full text-[25px] flex justify-between fill-current">
                                            <div
                                                class="group hover:bg-[#EFF3F6] py-[15px] px-[20px] w-[268px] rounded-[10px] cursor-pointer">
                                                <a href="{{route('prekoracene')}}" aria-label="Knjige na raspolaganju"
                                                   class="flex items-center">
                                                    <i
                                                        class="text-[#707070] text-[20px] fas fa-exclamation-triangle transition duration-300 ease-in group-hover:text-[#576cdf]"></i>
                                                    <div>
                                                        <p
                                                            class="text-[15px] ml-[17px] transition duration-300 ease-in group-hover:text-[#576cdf]">
                                                            Knjige u prekoracenju</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </span>
                                </div>
                            </li>
                            <li class="mb-[4px]">
                                <div class="w-[300px] pl-[32px]">
                                        <span
                                            class=" whitespace-nowrap w-full text-[25px] flex justify-between fill-current">
                                            <div
                                                class="group hover:bg-[#EFF3F6] py-[15px] px-[20px] w-[268px] rounded-[10px] cursor-pointer">
                                                <a href="{{route('aktivne-rezervacije')}}" aria-label="Rezervacije"
                                                   class="flex items-center">
                                                    <i
                                                        class="text-[#707070] text-[20px] far fa-calendar-check transition duration-300 ease-in group-hover:text-[#576cdf]"></i>
                                                    <div>
                                                        <p
                                                            class="text-[15px] ml-[19px] transition duration-300 ease-in group-hover:text-[#576cdf]">
                                                            Aktivne rezervacije</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </span>
                                </div>
                            </li>
                            <li class="mb-[4px]">
                                <div class="w-[300px] pl-[32px]">
                                        <span
                                            class=" whitespace-nowrap w-full text-[25px] flex justify-between fill-current">
                                            <div
                                                class="group hover:bg-[#EFF3F6] py-[15px] px-[20px] w-[268px] rounded-[10px] cursor-pointer">
                                                <a href="{{route('arhivirane-rezervacije')}}" aria-label="Rezervacije"
                                                   class="flex items-center">
                                                    <i
                                                        class="text-[#707070] text-[20px] fas fa-calendar-alt transition duration-300 ease-in group-hover:text-[#576cdf]"></i>
                                                    <div>
                                                        <p
                                                            class="text-[15px] ml-[19px] transition duration-300 ease-in group-hover:text-[#576cdf]">
                                                            Arhivirane rezervacije</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </span>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="w-full mt-[10px] ml-2 px-2">
                        <table class="overflow-hidden shadow-lg rounded-xl w-full border-[1px] border-[#e4dfdf]" id="myTable">
                            <thead class="bg-[#EFF3F6]">
                            <tr id="head" class="border-b-[1px] border-[#e4dfdf]">
                                <th class="px-4 py-4 leading-4 tracking-wider text-left text-blue-500">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" class="form-checkbox checkAll checkOthers">
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
                                <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">Valentina Kascelan
                                </td>
                                <td class="px-6 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                                    <p
                                        class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsVraceneKnjige hover:text-[#606FC7]">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </p>
                                    <div
                                        class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 vracene-knjige">
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
                                                    <i
                                                        class="far fa-calendar-check mr-[10px] ml-[5px] py-1"></i>
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
                                                <span class="font-medium text-center">Muzicka kultura I Razred
                                                    Gi...</span>
                                    </a>
                                </td>
                                <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">Nina Bulatovic</td>
                                <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">15.05.2020</td>
                                <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">15.05.2020</td>
                                <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">Valentina Kascelan
                                </td>
                                <td class="px-6 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                                    <p
                                        class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsVraceneKnjige hover:text-[#606FC7]">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </p>
                                    <div
                                        class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 vracene-knjige">
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
                                                    <i
                                                        class="far fa-calendar-check mr-[10px] ml-[5px] py-1"></i>
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
                                        <span class="font-medium text-center">Tom Sojer</span>
                                    </a>
                                </td>
                                <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">Milos Milosevic</td>
                                <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">12.05.2020</td>
                                <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">12.05.2020</td>
                                <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">Valentina Kascelan
                                </td>
                                <td class="px-6 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                                    <p
                                        class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsVraceneKnjige hover:text-[#606FC7]">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </p>
                                    <div
                                        class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 vracene-knjige">
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
                                                    <i
                                                        class="far fa-calendar-check mr-[10px] ml-[5px] py-1"></i>
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
                                        <span class="font-medium text-center">Robinson Kruso</span>
                                    </a>
                                </td>
                                <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">Sanja Gardasevic</td>
                                <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">09.04.2020</td>
                                <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">09.04.2020</td>
                                <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">Valentina Kascelan
                                </td>
                                <td class="px-6 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                                    <p
                                        class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsVraceneKnjige hover:text-[#606FC7]">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </p>
                                    <div
                                        class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 vracene-knjige">
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
                                                    <i
                                                        class="far fa-calendar-check mr-[10px] ml-[5px] py-1"></i>
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
                                <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">Valentina Kascelan
                                </td>
                                <td class="px-6 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                                    <p
                                        class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsVraceneKnjige hover:text-[#606FC7]">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </p>
                                    <div
                                        class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 vracene-knjige">
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
                                                    <i
                                                        class="far fa-calendar-check mr-[10px] ml-[5px] py-1"></i>
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
                                        <span class="font-medium text-center">Muzicka kultura I Raz</span>
                                    </a>
                                </td>
                                <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">Nina Bulatovic</td>
                                <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">15.05.2020</td>
                                <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">15.05.2020</td>
                                <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">Valentina Kascelan
                                </td>
                                <td class="px-6 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                                    <p
                                        class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsVraceneKnjige hover:text-[#606FC7]">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </p>
                                    <div
                                        class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 vracene-knjige">
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
                                                    <i
                                                        class="far fa-calendar-check mr-[10px] ml-[5px] py-1"></i>
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
                                        <span class="font-medium text-center">Tom Sojer</span>
                                    </a>
                                </td>
                                <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">Milos Milosevic</td>
                                <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">12.05.2020</td>
                                <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">12.05.2020</td>

                                <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">Valentina Kascelan
                                </td>
                                <td class="px-6 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                                    <p
                                        class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsVraceneKnjige hover:text-[#606FC7]">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </p>
                                    <div
                                        class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 vracene-knjige">
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
                                                    <i
                                                        class="far fa-calendar-check mr-[10px] ml-[5px] py-1"></i>
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
                                        <span class="font-medium text-center">Robinson Kruso</span>
                                    </a>
                                </td>
                                <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">Sanja Gardasevic</td>
                                <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">09.04.2020</td>
                                <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">09.04.2020</td>
                                <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">Valentina Kascelan
                                </td>
                                <td class="px-6 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                                    <p
                                        class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsVraceneKnjige hover:text-[#606FC7]">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </p>
                                    <div
                                        class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 vracene-knjige">
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
                                                    <i
                                                        class="far fa-calendar-check mr-[10px] ml-[5px] py-1"></i>
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
                                </th>
                                <th class="px-4 py-4 leading-4 tracking-wider text-left">Naziv knjige</th>
                                <th class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer uceniciDrop-toggle">Izdato uceniku</th>
                                <th class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer datumDrop-toggle">Datum izdavanja</th>
                                <th class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer vracanjeDrop-toggle">Datum otpisivanja</th>
                                <th class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer bibliotekariDrop-toggle">Knjigu otpisao
                                </th>
                                <th class="px-4 py-4"> </th>
                            </tr>
                            </tfoot>
                        </table>


                    </div>
                </div>
            </div>
        </div>

    </section>
 </x-layout>
