<x-layout>
    @section('title')
        Arhivirane rezervacije ucenika: {{ $student->username }}
    @endsection
    <section class="w-screen h-screen pl-[80px] pb-4 text-gray-700">
        <!-- Heading of content -->
        <x-student-header :student="$student"/>
        <div class="py-4 text-gray-500 border-[#e4dfdf] pl-[30px]">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-link"  href="{{ route('students.show', $student->username) }}" aria-selected="false">Osnovni detalji</a>
                    <a class="nav-link active"  href="{{ route('ucenik.izdate', $student->username) }}" aria-selected="true">Evidencija iznajmljivanja</a>
                </div>
            </nav>
        </div>
        <!-- Space for content -->
        <div class="flex justify-start pt-3 bg-white height-ucenikIzdate scroll">
            <div class="mt-[10px]">
                <ul class="text-[#2D3B48]">
                    <li class="mb-[4px]">
                        <div class="w-[300px] pl-[32px]">
                            <span class=" whitespace-nowrap w-full text-[25px]  flex justify-between fill-current">
                                <div
                                    class="py-[15px] px-[20px] w-[268px] cursor-pointer group hover:bg-[#EFF3F6] rounded-[10px]">
                                    <a href="{{ route('ucenik.izdate', $student) }}" aria-label="Sve knjige" class="flex items-center">
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
                            <span class=" whitespace-nowrap w-full text-[25px] flex justify-between fill-current">
                                <div
                                    class="group hover:bg-[#EFF3F6] py-[15px] px-[20px] w-[268px] rounded-[10px] cursor-pointer">
                                    <a href="{{ route('ucenik.vracene', $student) }}" aria-label="Vracene knjige"
                                       class="flex items-center">
                                        <i
                                            class="transition duration-300 ease-in  text-[#707070] text-[20px] fas fa-file group-hover:text-[#576cdf]"></i>
                                        <div>
                                            <p
                                                class="transition duration-300 ease-in  text-[15px] ml-[21px] group-hover:text-[#576cdf]">
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
                                        <a href="{{ route('ucenik.otpisane', $student->username) }}" aria-label="Izdate knjige"
                                           class="flex items-center">
                                            <i
                                                class="text-[#707070] text-[20px] fas fa-level-up-alt transition duration-300 ease-in group-hover:text-[#576cdf]"></i>
                                            <div>
                                                <p
                                                    class="text-[15px] ml-[21px] transition duration-300 ease-in group-hover:text-[#576cdf]">
                                                    Otpisane knjige</p>
                                            </div>
                                        </a>
                                    </div>
                                </span>
                        </div>
                    </li>
                    <li class="mb-[4px]">
                        <div class="w-[300px] pl-[28px]">
                            <span class=" whitespace-nowrap w-full text-[25px] flex justify-between fill-current">
                                <div
                                    class="group hover:bg-[#EFF3F6] py-[15px] px-[20px] w-[268px] rounded-[10px] cursor-pointer">
                                    <a href="{{ route('ucenik.prekoracene', $student) }}" aria-label="Knjige na raspolaganju"
                                       class="flex items-center">
                                        <i
                                            class="group-hover:text-[#576cdf] text-[#707070] text-[20px] fas fa-exclamation-triangle transition duration-300 ease-in "></i>
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
                            <span class=" whitespace-nowrap w-full text-[25px] flex justify-between fill-current">
                                <div
                                    class="group hover:bg-[#EFF3F6] py-[15px] px-[20px] w-[268px] rounded-[10px] cursor-pointer">
                                    <a href="{{ route('ucenik.aktivne', $student) }}" aria-label="Rezervacije"
                                       class="flex items-center">
                                        <i
                                            class="text-[#707070] group-hover:text-[#576cdf] text-[20px] far fa-calendar-check transition duration-300 ease-in"></i>
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
                            <span class=" whitespace-nowrap w-full text-[25px] flex justify-between fill-current">
                                <div
                                    class="group bg-[#EFF3F6] hover:bg-[#EFF3F6] py-[15px] px-[20px] w-[268px] rounded-[10px] cursor-pointer">
                                    <a href="{{ route('ucenik.arhivirane', $student) }}" aria-label="Rezervacije"
                                       class="flex items-center">
                                        <i
                                            class="text-[#707070] text-[20px] fas fa-calendar-alt transition duration-300 ease-in text-[#576cdf]"></i>
                                        <div>
                                            <p
                                                class="text-[15px] ml-[19px] transition duration-300 ease-in text-[#576cdf]">
                                                Arhivirane rezervacije</p>
                                        </div>
                                    </a>
                                </div>
                            </span>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="w-full px-[30px] pt-2 bg-white">
                <table class="overflow-hidden shadow-lg rounded-xl w-full border-[1px] border-[#e4dfdf] rezervacije" id="myTable">
                    <thead class="bg-[#EFF3F6]">
                        <tr class="border-b-[1px] border-[#e4dfdf]">
                            <th class="px-4 py-3 leading-4 tracking-wider text-left text-blue-500">
                                <label class="inline-flex items-center">
                                </label>
                            </th>
                            <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Naziv knjige</th>
                            <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Datum rezervacije</th>
                            <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Rezervacija zatvorena</th>
                            <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Rezervaciju podnio</th>
                            <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Status</th>
                            <th class="px-4 py-4"> </th>
                        </tr>
                    </thead>
                    <tbody id="myTableBody" class="bg-white">
                        @foreach($reservations as $reservation)
                            <tr class="hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                                <td class="px-4 py-3 whitespace-no-wrap">
                                    <label class="inline-flex items-center">
                                    </label>
                                </td>
                                <td class="flex flex-row items-center px-4 py-3">
                                    <img class="object-cover w-8 mr-2 h-11" src="{{ $reservation->book->cover() }}" alt="" />
                                    <a href="{{ route('books.show', $reservation->book) }}">
                                        <span class="font-medium text-center">{{ $reservation->book->title }}</span>
                                    </a>
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
                                        <span class="text-xs {{ $reservation->closingReason_id == \App\Models\ClosingReason::BOOK_BORROWED ? 'text-green-800' : 'text-red-800' }}">{{ $reservation->cReason}}</span>
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
                                                <a href="{{ route('book.rezervisane.show', [$reservation->book, $reservation]) }}" tabindex="0" class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600" role="menuitem">
                                                    <i class="far fa-file mr-[10px] ml-[5px] py-1"></i>
                                                    <span class="px-4 py-0">Pogledaj detalje</span>
                                                </a>
                                                <a href="{{ route('book.izdaj.create',[$reservation->book, 'ucenik' => $reservation->student->id]) }}" tabindex="0"
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
                            <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Naziv knjige</th>
                            <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Datum rezervacije</th>
                            <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Rezervacija zatvorena</th>
                            <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Rezervaciju podnio</th>
                            <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Status</th>
                            <th class="px-4 py-4"> </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

    </section>

</x-layout>
