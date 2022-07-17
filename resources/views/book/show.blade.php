<x-layout>
    @section('title')
        Knjiga: {{ $book->title }}
    @endsection
    @section('styles')
        <style>
            .grid {
                display: grid;
                grid-template-columns: 1fr 1fr 1fr;
                grid-gap: 20px;
                align-items: stretch;
                justify-items: center;
            }
            .grid img {
                border: 1px solid #ccc;
                box-shadow: 2px 2px 6px 0px  rgba(0,0,0,0.3);
                max-width: 100%;
            }
        </style>
    @endsection
        <!-- Content -->
        <section class="w-screen h-screen pl-[80px] pb-2 text-gray-700">
            <!-- Heading of content -->
            <div class="heading">
                <div class="flex flex-row justify-between border-b-[1px] border-[#e4dfdf]">
                    <div class="py-[10px] flex flex-row">
                        <div class="w-[77px] pl-[30px]">
                            <img src="{{ $book->cover() }}" alt="">
                        </div>
                        <div class="pl-[15px]  flex flex-col">
                            <div>
                                <h1>
                                    {{ $book->title }}
                                </h1>
                            </div>
                            <div>
                                <nav class="w-full rounded">
                                    <ol class="flex list-reset">
                                        <li>
                                            <a href="{{ route('books.index') }}" class="text-[#2196f3] hover:text-blue-600">
                                                Evidencija knjiga
                                            </a>
                                        </li>
                                        <li>
                                            <span class="mx-2">/</span>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="text-[#2196f3] hover:text-blue-600">
                                                KNJIGA-{{ $book->id }}
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
                        <p class="inline cursor-pointer text-[25px] py-[10px] pl-[30px] border-l-[1px] border-[#e4dfdf] dotsKnjigaOsnovniDetalji hover:text-[#606FC7]">
                            <i
                                class="fas fa-ellipsis-v"></i>
                        </p>
                        <div
                            class="z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-knjiga-osnovni-detalji">
                            <div class="absolute right-0 w-56 mt-[7px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                                <div class="py-1">
                                    <a href="{{ route('books.edit', $book) }}" tabindex="0"
                                        class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                        role="menuitem">
                                        <i class="fas fa-edit mr-[1px] ml-[5px] py-1"></i>
                                        <span class="px-4 py-0">Izmijeni knjigu</span>
                                    </a>
                                    <form method="POST" action="{{ route('books.destroy', $book) }}" enctype="multipart/form-data" tabindex="0"
                                          class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                          role="menuitem">
                                        @csrf
                                        @method('DELETE')
                                        <i class="fa fa-trash mr-[5px] ml-[5px] py-1"></i>
                                        <button type="submit"><span class="px-4 py-0">Izbriši knjigu</span></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-row overflow-auto height-osnovniDetalji">
                <div class="w-[80%]">
                    <div class="py-4 text-gray-500 border-[#e4dfdf] pl-[30px]">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-link active" id="osnovniDetalji" data-bs-toggle="tab" href="#osnovniDetalji-tab"  role="tab" aria-controls="osnovniDetalji" aria-selected="true">Osnovni detalji</a>
                                <a class="nav-link" id="specifikacije" data-bs-toggle="tab" href="#specifikacije-tab"  role="tab" aria-controls="specifikacije" aria-selected="false">Specifikacija</a>
                                <a class="nav-link" id="evidencijaIznajmljivanja" data-bs-toggle="tab" href="#evidencijaIznajmljivanja-tab"  role="tab" aria-controls="nav-contact" aria-selected="false">Evidencija iznajmljivanja</a>
                                <a class="nav-link" id="multimedija" data-bs-toggle="tab" href="#multimedija-tab"  role="tab" aria-controls="nav-contact" aria-selected="false" aria-disabled="true">Multimedija</a>
                            </div>
                        </nav>
                    </div>
                    <div class="tab-content" id="nav-tabContent">
                        <!-- OSNOVNI DETALjI -->
                        <div class="tab-pane fade show active" id="osnovniDetalji-tab" role="tabpanel" aria-labelledby="osnovniDetalji">
                            <div class="scroll height-content section-content">
                                <!-- Space for content -->
                                <div class="pl-[30px] section- mt-[20px]">
                                        <div class="flex flex-row justify-between">
                                            <div class="mr-[30px]">
                                                <div class="mt-[20px]">
                                                    <span class="text-gray-500 text-[14px]">Naziv knjige</span>
                                                    <p class="font-medium">{{ $book->title }}</p>
                                                </div>
                                                <div class="mt-[40px]">
                                                    <span class="text-gray-500 text-[14px]">Kategorija/je</span>
                                                    <p class="font-medium">
                                                        @foreach($book->categories as $category)
                                                            <a href="#">{{ $category->name }}</a>{!! $loop->remaining >= 1 ? ',&nbsp;&nbsp;&nbsp;' : ''!!}
                                                        @endforeach
                                                    </p>
                                                </div>
                                                <div class="mt-[40px]">
                                                    <span class="text-gray-500 text-[14px]">Zanr</span>
                                                    <p class="font-medium">
                                                        @foreach($book->genres as $genre)
                                                            <a href="#">{{ $genre->name }}</a>{!! $loop->remaining >= 1 ? ',&nbsp;&nbsp;&nbsp;' : ''!!}
                                                        @endforeach
                                                    </p>
                                                </div>
                                                <div class="mt-[40px]">
                                                    <span class="text-gray-500 text-[14px]">Autor/ri</span>
                                                    <p class="font-medium">
                                                        @foreach($book->authors as $author)
                                                            <a href="{{ route('authors.show', $author) }}">{{ $author->name }}</a>{!! $loop->remaining >= 1 ? ',&nbsp;&nbsp;&nbsp;' : ''!!}
                                                        @endforeach
                                                    </p>
                                                </div>
                                                <div class="mt-[40px]">
                                                    <span class="text-gray-500 text-[14px]">Izdavac</span>
                                                    <p class="font-medium"><a href="#">{{ $book->publisher->name }}</a></p>
                                                </div>
                                                <div class="mt-[40px]">
                                                    <span class="text-gray-500 text-[14px]">Godina izdavanja</span>
                                                    <p class="font-medium">{{ $book->publishDate }}</p>
                                                </div>
                                            </div>
                                            <div class="mr-[70px] mt-[20px] flex flex-col max-w-[600px]">
                                                    <h4 class="text-gray-500 ">
                                                        Storyline (Kratki sadrzaj)
                                                    </h4>
                                                <div class="scroll" style="max-height: 511px">
                                                    <p class=" my-[10px]">
                                                        {!! $book->description !!}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <!-- kraj OSNOVNI DETALJI -->

                        <!-- SPECIFIKACIJE -->
                        <div class="tab-pane fade" id="specifikacije-tab" role="tabpanel" aria-labelledby="specifikacije">
                            <div class="scroll height-content section-content">
                                <!-- Space for content -->
                                <div class="pl-[30px] section- mt-[20px]">
                                    <div class="flex flex-row justify-between">
                                        <div class="mr-[30px]">
                                            <div class="mt-[20px]">
                                                <span class="text-gray-500 text-[14px]">Broj strana</span>
                                                <p class="font-medium">{{ $book->pageNum }}</p>
                                            </div>
                                            <div class="mt-[40px]">
                                                <span class="text-gray-500 text-[14px]">Pismo</span>
                                                <p class="font-medium"><a href="#">{{ $book->script->name }}</a></p>
                                            </div>
                                            <div class="mt-[40px]">
                                                <span class="text-gray-500 text-[14px]">Jezik</span>
{{--                                                todo--}}
                                                <p class="font-medium">OVO NEMA U BAZI</p>
                                            </div>
                                            <div class="mt-[40px]">
                                                <span class="text-gray-500 text-[14px]">Povez</span>
                                                <p class="font-medium"><a href="#">{{ $book->bookBind->name }}</a></p>
                                            </div>
                                            <div class="mt-[40px]">
                                                <span class="text-gray-500 text-[14px]">Format</span>
                                                <p class="font-medium"><a href="#">{{ $book->format->name }}</a></p>
                                            </div>
                                            <div class="mt-[40px]">
                                                <span class="text-gray-500 text-[14px]">International Standard Book Number
                                                    (ISBN)</span>
                                                <p class="font-medium">{{ $book->isbn }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- kraj SPECIFIKACIJE -->

                        <!-- EVIDENCIJA IZNAJMLjIVANjA -->
                        <div class="tab-pane fade" id="evidencijaIznajmljivanja-tab" role="tabpanel" aria-labelledby="evidencijaIznajmljivanja">
                            <div class="py-4 pt-[20px] pl-[30px] text-[#2D3B48]">
                                <a href="IznajmljivanjeIzdate.php"
                                   class="py-[15px] px-[20px] w-[268px] text-[#576cdf] cursor-pointer bg-[#EFF3F6] rounded-[10px] inline hover:text-[#576cdf]">
                                    <i class="text-[20px] far fa-copy mr-[3px]"></i>
                                    Izdate knjige
                                </a>
                                <a href="iznajmljivanjeVracene.php"
                                   class="inline py-[15px] rounded-[10px] group px-[20px] w-[268px] hover:text-[#576cdf] hover:bg-[#EFF3F6] ml-[20px] pr-[10px]">
                                    <i class="text-[20px] text-[#707070] group-hover:text-[#576cdf] fas fa-file mr-[3px]"></i>
                                    Vracene knjige
                                </a>
                                <a href="iznajmljivanjePrekoracenje.php"
                                   class="inline py-[15px] rounded-[10px] group px-[20px] w-[268px] hover:text-[#576cdf] hover:bg-[#EFF3F6] ml-[20px] pr-[10px]">
                                    <i class="text-[20px] text-[#707070] group-hover:text-[#576cdf] fas fa-exclamation-triangle mr-[3px]"></i>
                                    Knjige u prekoracenju
                                </a>
                                <a href="iznajmljivanjeAktivne.php"
                                   class="inline py-[15px] rounded-[10px] group px-[20px] w-[268px] hover:text-[#576cdf] hover:bg-[#EFF3F6] ml-[20px] pr-[10px]">
                                    <i class="text-[20px] text-[#707070] group-hover:text-[#576cdf] far fa-calendar-check mr-[3px]"></i>
                                    Aktivne rezervacije
                                </a>
                                <a href="iznajmljivanjeArhivirane.php"
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
                                                <input type="checkbox" class="form-checkbox">
                                            </label>
                                        </th>
                                        <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Izdato uceniku</th>
                                        <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Datum izdavanja
                                        </th>
                                        <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Trenutno
                                            zadrzavanje knjige</th>
                                        <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Knjigu izdao</th>
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
                                        <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">Pero Perovic</td>
                                        <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">21.02.2021</td>
                                        <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">
                                            <div>
                                                <span>2 nedelje i 3 dana</span>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">Valentina Kascelan</td>
                                        <td class="px-6 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                                            <p class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsIznajmljivanjeIzdateKnjige hover:text-[#606FC7]">
                                                <i
                                                    class="fas fa-ellipsis-v"></i>
                                            </p>
                                            <div
                                                class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 iznajmljivanje-izdate-knjige">
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

                                                        <a href="otpisiKnjigu.php" tabindex="0"
                                                           class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                           role="menuitem">
                                                            <i class="fas fa-level-up-alt mr-[14px] ml-[5px] py-1"></i>
                                                            <span class="px-4 py-0">Otpisi knjigu</span>
                                                        </a>

                                                        <a href="vratiKnjigu.php" tabindex="0"
                                                           class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                           role="menuitem">
                                                            <i class="fas fa-redo-alt mr-[10px] ml-[5px] py-1"></i>
                                                            <span class="px-4 py-0">Vrati knjigu</span>
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
                                        <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">Nina Bulatovic</td>
                                        <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">15.05.2020</td>
                                        <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">
                                            <div>
                                                <span>5 dana</span>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">Valentina Kascelan</td>
                                        <td class="px-6 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                                            <p class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsIznajmljivanjeIzdateKnjige hover:text-[#606FC7]">
                                                <i
                                                    class="fas fa-ellipsis-v"></i>
                                            </p>
                                            <div
                                                class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 iznajmljivanje-izdate-knjige">
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

                                                        <a href="otpisiKnjigu.php" tabindex="0"
                                                           class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                           role="menuitem">
                                                            <i class="fas fa-level-up-alt mr-[14px] ml-[5px] py-1"></i>
                                                            <span class="px-4 py-0">Otpisi knjigu</span>
                                                        </a>

                                                        <a href="vratiKnjigu.php" tabindex="0"
                                                           class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                           role="menuitem">
                                                            <i class="fas fa-redo-alt mr-[10px] ml-[5px] py-1"></i>
                                                            <span class="px-4 py-0">Vrati knjigu</span>
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
                                        <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">Milos Milosevic</td>
                                        <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">12.05.2020</td>
                                        <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">
                                            <div>
                                                <span>1 nedelja i 4 dana</span>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">Valentina Kascelan</td>
                                        <td class="px-6 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                                            <p class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsIznajmljivanjeIzdateKnjige hover:text-[#606FC7]">
                                                <i
                                                    class="fas fa-ellipsis-v"></i>
                                            </p>
                                            <div
                                                class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 iznajmljivanje-izdate-knjige">
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

                                                        <a href="otpisiKnjigu.php" tabindex="0"
                                                           class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                           role="menuitem">
                                                            <i class="fas fa-level-up-alt mr-[14px] ml-[5px] py-1"></i>
                                                            <span class="px-4 py-0">Otpisi knjigu</span>
                                                        </a>

                                                        <a href="vratiKnjigu.php" tabindex="0"
                                                           class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                           role="menuitem">
                                                            <i class="fas fa-redo-alt mr-[10px] ml-[5px] py-1"></i>
                                                            <span class="px-4 py-0">Vrati knjigu</span>
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
                                        <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">Sanja Gardasevic</td>
                                        <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">09.04.2020</td>
                                        <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">
                                            <div
                                                class="inline-block px-[6px] py-[2px] font-medium bg-red-200 rounded-[10px]">
                                                <span class="text-xs text-red-800">1 mjesec i 3 dana</span>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">Valentina Kascelan</td>
                                        <td class="px-6 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                                            <p class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsIznajmljivanjeIzdateKnjige hover:text-[#606FC7]">
                                                <i
                                                    class="fas fa-ellipsis-v"></i>
                                            </p>
                                            <div
                                                class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 iznajmljivanje-izdate-knjige">
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

                                                        <a href="otpisiKnjigu.php" tabindex="0"
                                                           class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                           role="menuitem">
                                                            <i class="fas fa-level-up-alt mr-[14px] ml-[5px] py-1"></i>
                                                            <span class="px-4 py-0">Otpisi knjigu</span>
                                                        </a>

                                                        <a href="vratiKnjigu.php" tabindex="0"
                                                           class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                           role="menuitem">
                                                            <i class="fas fa-redo-alt mr-[10px] ml-[5px] py-1"></i>
                                                            <span class="px-4 py-0">Vrati knjigu</span>
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
                                        <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">Pero Perovic</td>
                                        <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">21.02.2021</td>
                                        <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">
                                            <div
                                                class="inline-block px-[6px] py-[2px] font-medium bg-red-200 rounded-[10px]">
                                                <span class="text-xs text-red-800">3 mjeseca i 2 nedelje</span>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">Valentina Kascelan</td>
                                        <td class="px-6 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                                            <p class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsIznajmljivanjeIzdateKnjige hover:text-[#606FC7]">
                                                <i
                                                    class="fas fa-ellipsis-v"></i>
                                            </p>
                                            <div
                                                class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 iznajmljivanje-izdate-knjige">
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

                                                        <a href="otpisiKnjigu.php" tabindex="0"
                                                           class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                           role="menuitem">
                                                            <i class="fas fa-level-up-alt mr-[14px] ml-[5px] py-1"></i>
                                                            <span class="px-4 py-0">Otpisi knjigu</span>
                                                        </a>

                                                        <a href="vratiKnjigu.php" tabindex="0"
                                                           class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                           role="menuitem">
                                                            <i class="fas fa-redo-alt mr-[10px] ml-[5px] py-1"></i>
                                                            <span class="px-4 py-0">Vrati knjigu</span>
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
                                        <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">Nina Bulatovic</td>
                                        <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">15.05.2020</td>
                                        <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">
                                            <div>
                                                <span>5 dana</span>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">Valentina Kascelan</td>
                                        <td class="px-6 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                                            <p class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsIznajmljivanjeIzdateKnjige hover:text-[#606FC7]">
                                                <i
                                                    class="fas fa-ellipsis-v"></i>
                                            </p>
                                            <div
                                                class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 iznajmljivanje-izdate-knjige">
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

                                                        <a href="otpisiKnjigu.php" tabindex="0"
                                                           class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                           role="menuitem">
                                                            <i class="fas fa-level-up-alt mr-[14px] ml-[5px] py-1"></i>
                                                            <span class="px-4 py-0">Otpisi knjigu</span>
                                                        </a>

                                                        <a href="vratiKnjigu.php" tabindex="0"
                                                           class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                           role="menuitem">
                                                            <i class="fas fa-redo-alt mr-[10px] ml-[5px] py-1"></i>
                                                            <span class="px-4 py-0">Vrati knjigu</span>
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
                                        <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">Milos Milosevic</td>
                                        <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">12.05.2020</td>
                                        <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">
                                            <div>
                                                <span>1 nedelja i 4 dana</span>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">Valentina Kascelan</td>
                                        <td class="px-6 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                                            <p class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsIznajmljivanjeIzdateKnjige hover:text-[#606FC7]">
                                                <i
                                                    class="fas fa-ellipsis-v"></i>
                                            </p>
                                            <div
                                                class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 iznajmljivanje-izdate-knjige">
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

                                                        <a href="otpisiKnjigu.php" tabindex="0"
                                                           class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                           role="menuitem">
                                                            <i class="fas fa-level-up-alt mr-[14px] ml-[5px] py-1"></i>
                                                            <span class="px-4 py-0">Otpisi knjigu</span>
                                                        </a>

                                                        <a href="vratiKnjigu.php" tabindex="0"
                                                           class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                           role="menuitem">
                                                            <i class="fas fa-redo-alt mr-[10px] ml-[5px] py-1"></i>
                                                            <span class="px-4 py-0">Vrati knjigu</span>
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
                                        <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">Sanja Gardasevic</td>
                                        <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">09.04.2020</td>
                                        <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">
                                            <div>
                                                <span>3 nedelje i 6 dana</span>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">Valentina Kascelan</td>
                                        <td class="px-6 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                                            <p class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsIznajmljivanjeIzdateKnjige hover:text-[#606FC7]">
                                                <i
                                                    class="fas fa-ellipsis-v"></i>
                                            </p>
                                            <div
                                                class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 iznajmljivanje-izdate-knjige">
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

                                                        <a href="otpisiKnjigu.php" tabindex="0"
                                                           class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                           role="menuitem">
                                                            <i class="fas fa-level-up-alt mr-[14px] ml-[5px] py-1"></i>
                                                            <span class="px-4 py-0">Otpisi knjigu</span>
                                                        </a>

                                                        <a href="vratiKnjigu.php" tabindex="0"
                                                           class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                           role="menuitem">
                                                            <i class="fas fa-redo-alt mr-[10px] ml-[5px] py-1"></i>
                                                            <span class="px-4 py-0">Vrati knjigu</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                                <div class="flex flex-row items-center justify-end my-2">
                                    <div>
                                        <p class="inline text-md">
                                            Rows per page:
                                        </p>
                                        <select
                                            class=" text-gray-700 bg-white rounded-md w-[46px] focus:outline-none focus:ring-primary-500 focus:border-primary-500 text-md"
                                            name="ucenici">
                                            <option value="">
                                                20
                                            </option>
                                            <option value="">
                                                Option1
                                            </option>
                                            <option value="">
                                                Option2
                                            </option>
                                            <option value="">
                                                Option3
                                            </option>
                                            <option value="">
                                                Option4
                                            </option>
                                        </select>
                                    </div>

                                    <div>
                                        <nav class="relative z-0 inline-flex">
                                            <div>
                                                <a href="#"
                                                   class="relative inline-flex items-center px-4 py-2 -ml-px font-medium leading-5 transition duration-150 ease-in-out bg-white text-md focus:z-10 focus:outline-none">
                                                    1 of 1
                                                </a>
                                            </div>
                                            <div>
                                                <a href="#"
                                                   class="relative inline-flex items-center px-2 py-2 font-medium leading-5 text-gray-500 transition duration-150 ease-in-out bg-white text-md rounded-l-md hover:text-gray-400 focus:z-10 focus:outline-none"
                                                   aria-label="Previous"
                                                   v-on:click.prevent="changePage(pagination.current_page - 1)">
                                                    <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                              d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                              clip-rule="evenodd" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div v-if="pagination.current_page < pagination.last_page">
                                                <a href="#"
                                                   class="relative inline-flex items-center px-2 py-2 -ml-px font-medium leading-5 text-gray-500 transition duration-150 ease-in-out bg-white text-md rounded-r-md hover:text-gray-400 focus:z-10 focus:outline-none"
                                                   aria-label="Next">
                                                    <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                              d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                              clip-rule="evenodd" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </nav>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- kraj EVIDENCIJA IZNAJMLjIVANjA -->

                        <!-- MULTIMEDIJA -->
                        <div class="tab-pane fade" id="multimedija-tab" role="tabpanel" aria-labelledby="multimedija">
                            <div class="scroll grid p-[10px]" style="max-height: 700px">
                                @foreach($book->photos as $photo)
                                    <img src="{{ $photo->path }}" alt="">
                                @endforeach
                            </div>
                        </div>
                        <!-- kraj MULTIMEDIJA -->
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
                                <a href="iznajmljivanjeAktivne.php"><p
                                    class=" mt-[16px] bg-yellow-200 text-yellow-700 rounded-[10px] px-[6px] py-[2px] text-[14px]">
                                    2 primjerka</p></a>
                                    <a href="iznajmljivanjeIzdate.php"><p
                                    class=" mt-[16px] bg-blue-200 text-blue-800 rounded-[10px] px-[6px] py-[2px] text-[14px]">
                                    102 primjerka</p></a>
                                    <a href="iznajmljivanjePrekoracenje.php">  <p
                                    class=" mt-[16px] bg-red-200 text-red-800 rounded-[10px] px-[6px] py-[2px] text-[14px]">
                                    2 primjerka</p></a>
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
        <!-- End Content -->
</x-layout>>
