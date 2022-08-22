<x-layout>
    @section('title')
        Prekoracene: {{ $book->title }}
    @endsection
        <!-- Return Book Modal -->
        <div class="modal fadeM" id="returnBookModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" action="">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Da li zelite vratiti knjigu: </h5>
                            <h5 class="modal-title">
                                <ul class="modalLabel"></ul>
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="text-red-800">
                                Ova akcija je nepovratna.
                            </p>
                        </div>
                        @csrf
                        @method('PUT')
                        <input type="hidden" class="ids" name="toReturn">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Otkazi</button>
                            <button type="submit" class="sure btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] text-white" style="background: red">
                                Potvrdi <i class="fas fa-check ml-[4px]"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- WriteOff Book Modal -->
        <div class="modal fadeM" id="writeoffBookModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" action="">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Da li zelite otpisati knjigu: </h5>
                            <h5 class="modal-title">
                                <ul class="modalLabel"></ul>
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="text-red-800">
                                Ova akcija je nepovratna.
                            </p>
                        </div>
                        @csrf
                        @method('PUT')
                        <input type="hidden" class="ids" name="toWriteoff">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Otkazi</button>
                            <button type="submit" class="sure btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] text-white" style="background: red">
                                Potvrdi <i class="fas fa-check ml-[4px]"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- Content -->
    <section class="w-screen h-screen pl-[80px] pb-2 text-gray-700">
        <!-- Heading of content -->
        <x-book-header :book="$book"/>

        <div class="flex flex-row height-iznajmljivanje scroll">
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
                       class="py-[15px] px-[20px] w-[268px] cursor-pointer hover:bg-[#EFF3F6] rounded-[10px] inline hover:text-[#576cdf]">
                        <i class="text-[20px] far fa-copy mr-[3px]"></i>
                        Izdate knjige
                    </a>
                    <a href="{{ route('vracene1', $book) }}"
                       class="inline py-[15px] rounded-[10px] group px-[20px] w-[268px] hover:text-[#576cdf] hover:bg-[#EFF3F6] ml-[20px] pr-[10px]">
                        <i class="text-[20px]  group-hover:text-[#576cdf] fas fa-file mr-[3px]"></i>
                        Vracene knjige
                    </a>
                    <a href="{{ route('prekoracene1', $book) }}"
                       class="inline py-[15px] rounded-[10px] group px-[20px] w-[268px] text-[#576cdf] bg-[#EFF3F6] hover:text-[#576cdf] hover:bg-[#EFF3F6] ml-[20px] pr-[10px]">
                        <i
                            class="text-[20px] group-hover:text-[#576cdf] fas fa-exclamation-triangle mr-[3px]"></i>
                        Knjige u prekoracenju
                    </a>
                    <a href="{{ route('aktivne-rezervacije1', $book) }}"
                       class="inline py-[15px] rounded-[10px] group px-[20px] w-[268px] hover:text-[#576cdf] hover:bg-[#EFF3F6] ml-[20px] pr-[10px]">
                        <i
                            class="text-[20px] text-[#707070] group-hover:text-[#576cdf] far fa-calendar-check mr-[3px]"></i>
                        Aktivne rezervacije
                    </a>
                    <a href="{{ route('arhivirane-rezervacije1', $book) }}"
                       class="inline py-[15px] rounded-[10px] group px-[20px] w-[268px] hover:text-[#576cdf] hover:bg-[#EFF3F6] ml-[20px] pr-[10px]">
                        <i
                            class="text-[20px] text-[#707070] group-hover:text-[#576cdf] fas fa-calendar-alt  mr-[3px]"></i>
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
                                <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Datum izdavanja
                                </th>
                                <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Izdato uceniku</th>
                                <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Prekoracenje u danima</th>
                                <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Trenutno zadrzavanje knjige</th>
                                <th class="px-4 py-4"> </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach($book->failed() as $prekoracena)
                                <tr class="h-[60px] hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                                    <td class="px-4 py-3 whitespace-no-wrap">
                                        <label class="inline-flex items-center">
                                        </label>
                                    </td>
                                    <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">{{ \Carbon\Carbon::parse($prekoracena->borrow_date)->format('d.m.Y') }}</td>
                                    <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">{{ $prekoracena->student->name }} {{ $prekoracena->student->surname }}</td>
                                    <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">
                                        <div
                                            class="inline-block px-[6px] py-[2px] font-medium bg-red-200 rounded-[10px]">
                                            <span class="text-xs text-red-800"><x-date-diff :zapis="$prekoracena" :failed="true"/></span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">
                                        <div>
                                            <span><x-date-diff :zapis="$prekoracena"/></span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                                        <p class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsIzdateKnjige hover:text-[#606FC7]">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </p>
                                        <div class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 izdate-knjige" style="display: none;">
                                            <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none" aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                                                <div class="py-1">
                                                    <a href="{{ route('izdate.show', [$prekoracena->book, $prekoracena]) }}" tabindex="0" class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600" role="menuitem">
                                                        <i class="far fa-file mr-[10px] ml-[5px] py-1"></i>
                                                        <span class="px-4 py-0">Pogledaj detalje</span>
                                                    </a>

                                                    <a id="otpisi" href="#" data-toggle="modal" tabindex="0" data-target="#writeoffBookModal" class="otpisi flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600" role="menuitem" data-action="/books/{{ $prekoracena->book->id }}/otpisi" data-name="null" data-id="{{ $prekoracena->id }}" data-book-name="{{ $prekoracena->book->title }}" data-student-name="{{ $prekoracena->student->name }} {{ $prekoracena->student->surname }}">
                                                        <i class="fas fa-level-up-alt mr-[14px] ml-[5px] py-1"></i>
                                                        <span class="px-4 py-0">Otpisi knjigu</span>
                                                    </a>

                                                    <a href="#" data-toggle="modal" data-target="#returnBookModal" tabindex="0" class="vrati flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600" role="menuitem" data-action="/books/{{ $prekoracena->book->id }}/vrati" data-name="null" data-id="{{ $prekoracena->id }}" data-book-name="{{ $prekoracena->book->title }}" data-student-name="{{ $prekoracena->student->name }} {{ $prekoracena->student->surname }}">
                                                        <i class="fas fa-redo-alt mr-[10px] ml-[5px] py-1"></i>
                                                        <span class="px-4 py-0">Vrati knjigu</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="border-b-[1px] border-[#e4dfdf]">
                                <th class="px-4 py-4 leading-4 tracking-wider text-left text-blue-500">
                                </th>
                                <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Datum izdavanja</th>
                                <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Izdato uceniku</th>
                                <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Prekoracenje u danima</th>
                                <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Trenutno zadrzavanje knjige</th>
                                <th class="px-4 py-4"> </th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
            <x-book-borrow-history :book="$book"/>
        </div>
    </section>
</x-layout>
