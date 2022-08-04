<x-layout>
    @section('title')
        Izdate: {{ $book->title }}
    @endsection
        <section class="w-screen h-screen pl-[80px] pb-2 text-gray-700">
            <!-- Heading of content -->
            <x-book-header :book="$book"/>

            <div class="flex flex-row height-iznajmljivanje">
                <div class="w-[80%]">
                    <div class="py-4 text-gray-500 border-[#e4dfdf] pl-[30px]">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-link" href="{{ route('books.show', $book) }}">Osnovni detalji</a>
                                <a class="nav-link" href="{{ route('books.show', $book) }}">Specifikacija</a>
                                <a class="nav-link active"  href="{{ route('izdate1', $book) }}" aria-selected='true'>Evidencija iznajmljivanja</a>
                                <a class="nav-link" href="{{ route('books.show', $book) }}">Multimedija</a>
                            </div>
                        </nav>
                    </div>
                    <div class="py-4 pt-[20px] pl-[30px] text-[#2D3B48]">
                        <a href="{{ route('izdate1', $book) }}"
                           class="py-[15px] px-[20px] w-[268px] text-[#576cdf] cursor-pointer bg-[#EFF3F6] rounded-[10px] inline hover:text-[#576cdf]">
                            <i class="text-[20px] far fa-copy mr-[3px]"></i>
                            Izdate knjige
                        </a>
                        <a href="{{ route('vracene1', $book) }}"
                           class="inline py-[15px] rounded-[10px] group px-[20px] w-[268px] hover:text-[#576cdf] hover:bg-[#EFF3F6] ml-[20px] pr-[10px]">
                            <i class="text-[20px] text-[#707070] group-hover:text-[#576cdf] fas fa-file mr-[3px]"></i>
                            Vracene knjige
                        </a>
                        <a href="{{route('prekoracene1', $book)}}"
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
                                @foreach($book->active() as $active)
                                    <tr class="hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                                        <td class="px-4 py-3 whitespace-no-wrap">
                                            <label class="inline-flex items-center">
                                                <input type="checkbox" class="form-checkbox">
                                            </label>
                                        </td>
                                        <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">{{ $active->student->name }} {{ $active->student->surname }}</td>
                                        <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">{{ \Carbon\Carbon::parse($active->borrow_date)->format('d.m.Y') }}</td>
                                        <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">
                                            <div>
                                                <span><x-date-diff :zapis="$active"/></span>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">{{ $active->librarian->name }} {{ $active->librarian->surname }}</td>
                                        <td>
                                            <ul class="navbar-nav px-4 py-4 text-sm leading-5 text-right whitespace-no-wrap">
                                                <li class="nav-bar">
                                                    <a id="navbarDropdown" class="link-dark inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsGenre hover:text-[#606FC7]" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                        <a href="{{ route('izdate.show', [$book, $active]) }}" tabindex="0"
                                                           class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                           role="menuitem">
                                                            <i class="far fa-file mr-[10px] ml-[5px] py-1"></i>
                                                            <span class="px-4 py-0">Pogledaj detalje</span>
                                                        </a>
                                                        <a href="{{ route('otpisi.create', $book) }}" tabindex="0"
                                                           class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                           role="menuitem">
                                                            <i class="fas fa-level-up-alt mr-[14px] ml-[5px] py-1"></i>
                                                            <span class="px-4 py-0">Otpiši knjigu</span>
                                                        </a>

                                                        <a href="{{ route('vrati.create', $book) }}" tabindex="0"
                                                           class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                           role="menuitem">
                                                            <i class="fas fa-redo-alt mr-[10px] ml-[5px] py-1"></i>
                                                            <span class="px-4 py-0">Vrati knjigu</span>
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                            <tr class="border-b-[1px] border-[#e4dfdf]">
                                <th class="px-4 py-4 leading-4 tracking-wider text-left text-blue-500">
                                </th>
                                <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Izdato uceniku</th>
                                <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Datum izdavanja
                                </th>
                                <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Trenutno
                                    zadrzavanje knjige</th>
                                <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Knjigu izdao</th>
                                <th class="px-4 py-4"> </th>
                            </tr>
                            </tfoot>
                        </table>


                    </div>
                </div>
                <div class="min-w-[20%] border-l-[1px] border-[#e4dfdf] ">
                    <div class="border-b-[1px] border-[#e4dfdf]">
                        <x-book-samples :available="$available" :book="$book"/>
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
