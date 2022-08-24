<x-layout>
    @section('title')
        Arhivirane rezervacije: {{ $book->title }}
    @endsection
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
                       class="inline py-[15px] rounded-[10px] group px-[20px] w-[268px] hover:text-[#576cdf] hover:bg-[#EFF3F6] ml-[20px] pr-[10px]">
                        <i class="text-[20px] group-hover:text-[#576cdf] fas fa-exclamation-triangle mr-[3px]"></i>
                        Knjige u prekoracenju
                    </a>
                    <a href="{{ route('aktivne-rezervacije1', $book) }}"
                       class="inline py-[15px] rounded-[10px] group px-[20px] w-[268px] hover:text-[#576cdf] hover:bg-[#EFF3F6] ml-[20px] pr-[10px]">
                        <i class="text-[20px] group-hover:text-[#576cdf] far fa-calendar-check mr-[3px]"></i>
                        Aktivne rezervacije
                    </a>
                    <a href="{{ route('arhivirane-rezervacije1', $book) }}"
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
                                    </label>
                                </th>
                                <th class="px-4 py-3 text-sm leading-4 tracking-wider text-left">Datum rezervacije</th>
                                <th class="px-4 py-3 text-sm leading-4 tracking-wider text-left">Rezervacija zatvorena</th>
                                <th class="px-4 py-3 text-sm leading-4 tracking-wider text-left">Rezervaciju podnio</th>
                                <th class="px-4 py-3 text-sm leading-4 tracking-wider text-left">Status</th>
                                <th class="px-4 py-3"> </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach($reservations as $reservation)
                                <tr class="hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                                    <td class="px-4 py-3 whitespace-no-wrap">
                                        <label class="inline-flex items-center">
                                        </label>
                                    </td>
                                    <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">{{ \Carbon\Carbon::parse($reservation->submttingDate)->format('d.m.Y') }}</td>
                                    <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">{{ \Carbon\Carbon::parse($reservation->closingDate)->format('d.m.Y') }}</td>
                                    <td class="flex flex-row items-center px-4 py-3">
                                        <img class="object-cover w-8 h-8 rounded-full" src="{{ $reservation->student->photoPath }}"
                                             alt=""/>
                                        <a href="{{ route('students.show', $reservation->student->username) }}" class="ml-2 font-medium text-center">{{ $reservation->student->name }} {{ $reservation->student->surname }}</a>
                                    </td>
                                    <td class="px-4 py-3 text-sm leading-5 text-blue-900 whitespace-no-wrap">
                                        <div class="inline-block px-[6px] py-[2px] font-medium {{ $reservation->closingReason_id == \App\Models\ClosingReason::BOOK_BORROWED ? 'bg-green-200' : 'bg-red-200' }} rounded-[10px]">
                                            <span class="text-xs {{ $reservation->closingReason_id == \App\Models\ClosingReason::BOOK_BORROWED ? 'text-green-800' : 'text-red-800' }}">{{ $reservation->cReason }}</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                                        <p
                                            class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsAktivneRezervacije hover:text-[#606FC7]">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </p>
                                        <div
                                            class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 aktivne-rezervacije">
                                            <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                                 aria-labelledby="headlessui-menu-button-1"
                                                 id="headlessui-menu-items-117" role="menu">
                                                <!-- todo ne vidim potrebu da odje ista stoji u dropdown -->
                                                <div class="py-1">
                                                    <a href="{{ route('izdaj.create',[$reservation->book, 'ucenik' => $reservation->student->id]) }}" tabindex="0"
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
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="border-b-[1px] border-[#e4dfdf]">
                                <th class="px-4 py-3 leading-4 tracking-wider text-left text-blue-500">
                                </th>
                                <th class="px-4 py-3 text-sm leading-4 tracking-wider text-left">Datum rezervacije</th>
                                <th class="px-4 py-3 text-sm leading-4 tracking-wider text-left">Rezervacija zatvorena</th>
                                <th class="px-4 py-3 text-sm leading-4 tracking-wider text-left">Rezervaciju podnio</th>
                                <th class="px-4 py-3 text-sm leading-4 tracking-wider text-left">Status</th>
                                <th class="px-4 py-3"> </th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
            <x-book-borrow-history :book="$book"/>
        </div>
    </section>

</x-layout>
