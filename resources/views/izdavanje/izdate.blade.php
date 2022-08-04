<x-layout>
    @section('title')
        Izdate Knjige
    @endsection
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
                        <div class="relative text-gray-600 focus-within:text-gray-400">
                        </div>
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
                                                class="py-[15px] px-[20px] w-[268px] cursor-pointer bg-[#EFF3F6] rounded-[10px]">
                                                <a href="izdateKnjige.php" aria-label="Sve knjige"
                                                   class="flex items-center">
                                                    <i
                                                        class="transition duration-300 ease-in group-hover:text-[#576cdf] text-[#576cdf] far fa-copy text-[20px]"></i>
                                                    <div>
                                                        <p
                                                            class="transition duration-300 ease-in group-hover:text-[#576cdf] text-[#576cdf] text-[15px] ml-[18px]">
                                                            Izdate knjige</p>
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
                                                <a href="{{ route('vracene') }}" aria-label="Izdate knjige"
                                                   class="flex items-center">
                                                    <i
                                                        class="text-[#707070] text-[20px] fas fa-file transition duration-300 ease-in group-hover:text-[#576cdf]"></i>
                                                    <div>
                                                        <p
                                                            class="text-[15px] ml-[21px] transition duration-300 ease-in group-hover:text-[#576cdf]">
                                                            Vracene knjige</p>
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
                                                <a href="aktivneRezervacije.php" aria-label="Rezervacije"
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
                                                <a href="arhiviraneRezervacije.php" aria-label="Rezervacije"
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
                                <tr class="border-b-[1px] border-[#e4dfdf]">
                                    <th class="px-4 py-4 leading-4 tracking-wider text-left text-blue-500">
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" class="form-checkbox">
                                        </label>
                                    </th>
                                    <th class="px-4 py-4 leading-4 tracking-wider text-left">
                                        Naziv knjige
                                        <a href="#"><i class="ml-2 fa-lg fas fa-long-arrow-alt-down"
                                                       onclick="sortTable()"></i>
                                        </a>
                                    </th>
                                    <!-- Izdato uceniku + dropdown filter for ucenik -->
                                    <th
                                        class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer uceniciDrop-toggle">
                                        Izdato uceniku
                                    </th>

                                    <!-- Datum izdavanja + dropdown filter for datum -->
                                    <th
                                        class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer datumDrop-toggle">
                                        Datum izdavanja
                                    </th>

                                    <!-- Trenutno zadrzavanje + dropdown filter for zadrzavanje -->
                                    <th
                                        class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer zadrzavanjeDrop-toggle">
                                        Trenutno zadrzavanje knjige
                                    </th>
                                    <!-- Knjigu izdao + dropdown filter for bibliotekar -->
                                    <th
                                        class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer bibliotekariDrop-toggle">
                                        Knjigu izdao
                                    </th>
                                    <th class="px-4 py-4"> </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white">
                                    @foreach($izdate as $zapis)
                                        <tr class="hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                                            <td class="px-4 py-3 whitespace-no-wrap">
                                                <label class="inline-flex items-center">
                                                    <input type="checkbox" class="form-checkbox">
                                                </label>
                                            </td>
                                            <td class="flex flex-row items-center px-4 py-3">
                                                <img class="object-cover w-8 mr-2 h-11" src="{{ $zapis->book->cover() }}" alt="" />
                                                <a href="{{ route('books.show', $zapis->book) }}">
                                                    <span class="font-medium text-center">{{ $zapis->book->title }}</span>
                                                </a>
                                            </td>
                                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">{{ $zapis->student->name }} {{ $zapis->student->surname }}</td>
                                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">{{ \Carbon\Carbon::parse($zapis->borrow_date)->format('d.m.Y') }}</td>
                                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">
                                                <div>
                                                    <span><x-date-diff :zapis="$zapis"/></span>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">{{ $zapis->librarian->name }} {{ $zapis->librarian->surname }}</td>
                                            <td>
                                                <ul class="navbar-nav px-4 py-4 text-sm leading-5 text-right whitespace-no-wrap">
                                                    <li class="nav-bar">
                                                        <a id="navbarDropdown" class="link-dark inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsGenre hover:text-[#606FC7]" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                            <a href="{{ route('izdate.show', [$zapis->book, $zapis]) }}" tabindex="0"
                                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                               role="menuitem">
                                                                <i class="far fa-file mr-[10px] ml-[5px] py-1"></i>
                                                                <span class="px-4 py-0">Pogledaj detalje</span>
                                                            </a>

                                                            <a href="{{ route('otpisi.create', $zapis->book) }}" tabindex="0"
                                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                               role="menuitem">
                                                                <i class="fas fa-level-up-alt mr-[14px] ml-[5px] py-1"></i>
                                                                <span class="px-4 py-0">Otpisi knjigu</span>
                                                            </a>

                                                            <a href="{{ route('vrati.create', $zapis->book) }}" tabindex="0"
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
                                        <th class="px-4 py-4 leading-4 tracking-wider text-left">
                                            Naziv knjige
                                            <a href="#"><i class="ml-2 fa-lg fas fa-long-arrow-alt-down"
                                                           onclick="sortTable()"></i>
                                            </a>
                                        </th>
                                        <!-- Izdato uceniku + dropdown filter for ucenik -->
                                        <th
                                            class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer uceniciDrop-toggle">
                                            Izdato uceniku
                                        </th>

                                        <!-- Datum izdavanja + dropdown filter for datum -->
                                        <th
                                            class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer datumDrop-toggle">
                                            Datum izdavanja
                                        </th>

                                        <!-- Trenutno zadrzavanje + dropdown filter for zadrzavanje -->
                                        <th
                                            class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer zadrzavanjeDrop-toggle">
                                            Trenutno zadrzavanje knjige
                                        </th>
                                        <!-- Knjigu izdao + dropdown filter for bibliotekar -->
                                        <th
                                            class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer bibliotekariDrop-toggle">
                                            Knjigu izdao
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
