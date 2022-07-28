<x-layout>
    @section('title')
        Knjige
    @endsection
        <!-- Content -->
        <section class="w-screen h-screen pl-[80px] py-4 text-gray-700">
            <!-- Heading of content -->
            <div class="heading mt-[7px]">
                <h1 class="pl-[30px] pb-[21px] border-b-[1px] border-[#e4dfdf] ">
                    Knjige
                </h1>
            </div>
            <!-- Space for content -->
            <div class="scroll height-evidencija">
                <x-flash-msg/>
                <div class="flex items-center justify-between px-[30px] py-4 space-x-3 rounded-lg">
                    <a href="{{ route('books.create') }}"
                        class="btn-animation inline-flex items-center text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] tracking-wider text-white bg-[#3f51b5] rounded hover:bg-[#4558BE]">
                        <i class="fas fa-plus mr-[15px]"></i> Nova knjiga
                    </a>
                    <div class="flex items-center">
                        <div class="relative text-gray-600 focus-within:text-gray-400">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                                <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6">
                                        <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </button>
                            </span>
                            <input type="search" name="q"
                                class="py-2 pl-10 text-sm text-white bg-white rounded-md focus:outline-none focus:bg-white focus:text-gray-900"
                                placeholder="Search..." autocomplete="off">
                        </div>
                    </div>
                </div>
                <!-- Space for content -->
                <div class="px-[30px] pt-2 bg-white">
                    <div class="w-full mt-2">
                        <!-- Table -->
                        <table class="w-full overflow-hidden shadow-lg rounded-xl" id="myTable">
                            <!-- Table head-->
                            <thead class="bg-[#EFF3F6]">
                                <tr class="border-b-[1px] border-[#e4dfdf]">
                                    <th class="px-4 py-4 leading-4 tracking-wider text-left text-blue-500">
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" class="form-checkbox checkAll">
                                        </label>
                                    </th>
                                    <th class="flex items-center px-4 py-4 leading-4 tracking-wider text-left">
                                        Naziv knjige
                                        <a href="#"><i class="ml-2 fa-lg fas fa-long-arrow-alt-down"
                                                onclick="sortTable()"></i>
                                        </a>
                                    </th>

                                    <!-- Autor + dropdown filter for autor -->
                                    <th id="autoriMenu"
                                        class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer ">
                                        Autor
                                    </th>

                                    <!-- Kategorija + dropdown filter for kategorija -->
                                    <th id="kategorijeMenu" class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left">
                                        Kategorija
                                    </th>
                                    <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Na raspolaganju
                                    </th>
                                    <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Rezervisano</th>
                                    <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Izdato</th>
                                    <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">U prekoracenju</th>
                                    <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Ukupna kolicina
                                    </th>
                                    <th class="px-4 py-4"> </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @foreach($books as $book)
                                    <tr class="hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                                        <td class="px-4 py-4 whitespace-no-wrap">
                                            <label class="inline-flex items-center">
                                                <input type="checkbox" class="form-checkbox checkOthers">
                                            </label>
                                        </td>
                                        <td class="flex flex-row items-center px-4 py-4">
                                            <img class="object-cover w-8 mr-2 h-11" src="{{ $book->cover() }}" alt="" />
                                            <a href="{{ route('books.show', $book) }}">
                                                <span class="font-medium text-center">{{ $book->title }}</span>
                                            </a>
                                        </td>
                                        <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">
                                            @foreach($book->authors as $author)
                                                {{ $author->name }} {{ $author->surname }}{!! $loop->remaining >= 1 ? ',&nbsp' : ''!!}
                                            @endforeach
                                        </td>
                                        <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">
                                            @foreach($book->categories as $category)
                                                {{ $category->name }} {!! $loop->remaining >= 1 ? ',&nbsp' : ''!!}
                                            @endforeach
                                        </td>
                                        <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">{{ ($book->samples)-($book->borrowedSaples) }}</td>
                                        <td class="px-4 py-4 text-sm leading-5 text-blue-800 whitespace-no-wrap"><a
                                                href="aktivneRezervacije.php">{{ $book->reservedSamples }}</a></td>
                                        <td class="px-4 py-4 text-sm leading-5 text-blue-800 whitespace-no-wrap"><a
                                                href="{{ route('izdate1', $book) }}">{{ $book->borrowedSaples }}</a></td>
                                        <td class="px-4 py-4 text-sm leading-5 text-blue-800 whitespace-no-wrap"><a
                                                href="knjigePrekoracenje.php">U PREKORACENjU</a></td>
                                        <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">{{ $book->samples }}</td>
                                        <td>
                                            <ul class="navbar-nav px-4 py-4 text-sm leading-5 text-right whitespace-no-wrap">
                                                <li class="nav-bar">
                                                    <a id="navbarDropdown" class="link-dark inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsGenre hover:text-[#606FC7]" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                        <div class="py-1">
                                                            <a href="{{ route('books.show', $book) }}" tabindex="0"
                                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                               role="menuitem">
                                                                <i class="far fa-file mr-[10px] ml-[5px] py-1"></i>
                                                                <span class="px-4 py-0">Pogledaj detalje</span>
                                                            </a>

                                                            <a href="{{ route('books.edit', $book) }}" tabindex="0"
                                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                               role="menuitem">
                                                                <i class="fas fa-edit mr-[6px] ml-[5px] py-1"></i>
                                                                <span class="px-4 py-0">Izmijeni knjigu</span>
                                                            </a>

                                                            <a href="{{route('otpisi.create', $book)}}" tabindex="0"
                                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                               role="menuitem">
                                                                <i class="fas fa-level-up-alt mr-[14px] ml-[5px] py-1"></i>
                                                                <span class="px-4 py-0">Otpisi knjigu</span>
                                                            </a>

                                                            <a href="{{ route('izdaj.create', $book) }}" tabindex="0"
                                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                               role="menuitem">
                                                                <i class="far fa-hand-scissors mr-[10px] ml-[5px] py-1"></i>
                                                                <span class="px-4 py-0">Izdaj knjigu</span>
                                                            </a>

                                                            <a href="{{ route('vrati.create', $book) }}" tabindex="0"
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
                                                            <form method="post" action="{{ route('books.destroy', $book) }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button tabindex="0"
                                                                        class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                                        role="menuitem">
                                                                    <i class="fa fa-trash mr-[10px] ml-[5px] py-1"></i>
                                                                    <span class="px-4 py-0">Izbrisi knjigu</span>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                               @endforeach
                            </tbody>
                        </table>

                        <div class="flex flex-row items-center justify-end my-3">
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
            </div>

        </section>
</x-layout>
