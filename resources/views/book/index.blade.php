<x-layout>
    @section('title')
        Knjige
    @endsection
        <!-- Delete One Book Modal -->
        <div class="modal fadeM" id="deleteOneModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" action="">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Da li želite obrisati knjigu: </h5>
                            <h5 class="modal-title modalLabel"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="text-red-800">
                                Ova akcija je nepovratna.
                            </p>
                        </div>
                        @csrf
                        @method('DELETE')
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Otkaži</button>
                            <button type="submit" class="sure btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] text-white" style="background: red">
                                Potvrdi <i class="fas fa-check ml-[4px]"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Delete Many Books Modal -->
        <div class="modal fadeM" id="deleteManyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" action="{{ route('book.bulk-delete') }}">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Da li želite obrisati sljedeće knjige: </h5>
                            <h5 class="modal-title">
                                <a data-bs-toggle="collapse" href="#showMore" role="button" class="showMorebtn" aria-expanded="false" aria-controls="collapseExample"></a>
                                <ul class="collapse modalLabel" id="showMore"></ul>
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="text-red-800">
                                Ova akcija je nepovratna.
                            </p>
                        </div>
                        @csrf
                        @method('DELETE')
                        <div class="modal-footer">
                            <input type="hidden" value="" name="ids" id="ids">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Otkaži</button>
                            <button type="submit" class="sure btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] text-white" style="background: red">
                                Potvrdi <i class="fas fa-check ml-[4px]"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
                    <a href="#" class="text-red-800 multiple" id="deleteMany" hidden data-toggle="modal" data-target="#deleteManyModal"><i class="fa fa-trash ml-4"></i> Izbrisi knjige</a>


                    <a class="text-blue-800 one" hidden id="detalji" href="#"><i class="far fa-copy"></i> Pogledaj detalje</a>
                    <a class="text-blue-800 one" hidden id="edit" href="#"><i class="far fa-edit"></i> Izmjeni knjigu</a>
                    <a class="text-blue-800 one" hidden id="otpisi" href="#"><i class="fas fa-level-up-alt ml-4"></i> Otpiši knjigu</a>
                    <a class="text-blue-800 one" hidden id="izdaj" href="#"><i class="far fa-hand-scissors"></i> Izdaj knjigu</a>
                    <a class="text-blue-800 one" hidden id="vrati" href="#"><i class="fas fa-redo-alt"></i> Vrati knjigu</a>
                    <a class="text-blue-800 one" hidden id="rezervisi" href="#"><i class="far fa-calendar-check"></i>  Rezerviši knjigu</a>

                    <a href="#" class="text-red-800 one deleteOne" id="deleteOne" hidden data-toggle="modal" data-target="#deleteOneModal"><i class="fa fa-trash ml-4"></i> Izbrisi knjigu</a>
                    <div></div>
                </div>
                <!-- Space for content -->
                <div class="px-[30px] pt-2 bg-white">
                    <div class="w-full mt-2">
                        <!-- Table -->
                        <table class="w-full overflow-hidden shadow-lg rounded-xl" id="myTable">
                            <!-- Table head-->
                            <thead class="bg-[#EFF3F6]">
                                <tr id="head" class="border-b-[1px] border-[#e4dfdf]">
                                    <th class="px-4 py-4 leading-4 tracking-wider text-left text-blue-500">
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" class="form-checkbox checkAll checkOthers">
                                        </label>
                                    </th>
                                    <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer">
                                        Naziv knjige
                                    </th>

                                    <!-- Autor + dropdown filter for autor -->
                                    <th id="autoriMenu"
                                        class="px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer">
                                        Autor
                                    </th>

                                    <!-- Kategorija + dropdown filter for kategorija -->
                                    <th id="kategorijeMenu" class="px-4 py-4 text-sm leading-4 tracking-wider text-left">
                                        Kategorija
                                    </th>
                                    <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Na raspolaganju
                                    </th>
                                    <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Rezervisano</th>
                                    <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Izdato</th>
                                    <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">U prekoračenju</th>
                                    <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Ukupna količina
                                    </th>
                                    <th class="px-4 py-4"> </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white" id="myTableBody">
                                @foreach($books as $book)
                                    <tr class="hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                                        <td class="px-4 py-4 whitespace-no-wrap">
                                            <label class="inline-flex items-center">
                                                <input type="checkbox" class="form-checkbox checkOthers" data-id="{{ $book->id }}" id="book-{{ $book->id }}" data-name="{{ $book->title }}">
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
                                        @if(($book->samples)-($book->borrowedSamples) == 0)
                                            <td class="px-4 py-4 text-sm text-red-800 leading-5 whitespace-no-wrap">
                                                    <b>{{ ($book->samples)-($book->borrowedSamples) }}</b>
                                            </td>
                                        @else
                                            <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">{{ ($book->samples)-($book->borrowedSamples) }}</td>
                                        @endif
                                        <td class="px-4 py-4 text-sm leading-5 text-blue-900 whitespace-no-wrap">
                                            <a href="{{ route('evidencija.aktivne-rezervacije1', $book) }}"><b>{{ $book->reservedSamples }}</b></a>
                                        </td>
                                        <td class="px-4 py-4 text-sm leading-5 text-blue-800 whitespace-no-wrap"><a
                                                href="{{ route('book.izdate1', $book) }}">{{ $book->borrowedSamples }}</a></td>
                                        <td class="px-4 py-4 text-sm leading-5 text-blue-800 whitespace-no-wrap"><a
                                                href="{{ route('book.prekoracene', $book) }}">{{ count($book->failed()) }}</a></td>
                                        <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">{{ $book->samples }}</td>
                                        <td class="px-6 py-4 text-sm leading-5 text-right whitespace-no-wrap">
                                            <p class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsKnjige hover:text-[#606FC7]">
                                                <i
                                                    class="fas fa-ellipsis-v"></i>
                                            </p>
                                            <div
                                                class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-knjige">
                                                <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                                     aria-labelledby="headlessui-menu-button-1"
                                                     id="headlessui-menu-items-117" role="menu">
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

                                                        <a href="{{route('book.otpisi.create', $book)}}" tabindex="0"
                                                           class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                           role="menuitem">
                                                            <i class="fas fa-level-up-alt mr-[14px] ml-[5px] py-1"></i>
                                                            <span class="px-4 py-0">Otpiši knjigu</span>
                                                        </a>

                                                        <a href="{{ route('book.izdaj.create', $book) }}" tabindex="0"
                                                           class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                           role="menuitem">
                                                            <i class="far fa-hand-scissors mr-[10px] ml-[5px] py-1"></i>
                                                            <span class="px-4 py-0">Izdaj knjigu</span>
                                                        </a>

                                                        <a href="{{ route('book.vrati.create', $book) }}" tabindex="0"
                                                           class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                           role="menuitem">
                                                            <i class="fas fa-redo-alt mr-[10px] ml-[5px] py-1"></i>
                                                            <span class="px-4 py-0">Vrati knjigu</span>
                                                        </a>

                                                        <a href="{{ route('book.reserve.create', $book) }}" tabindex="0"
                                                           class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                           role="menuitem">
                                                            <i class="far fa-calendar-check mr-[10px] ml-[5px] py-1"></i>
                                                            <span class="px-4 py-0">Rezerviši knjigu</span>
                                                        </a>
                                                        <a href="#"
                                                           class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600 deleteOne"
                                                           data-toggle="modal"
                                                           data-target="#deleteOneModal"
                                                           data-id="{{ $book->id }}"
                                                           data-name="{{ $book->title }}"
                                                           data-action="{{ route('books.destroy', $book) }}"
                                                        >
                                                            <i class="fa fa-trash mr-[10px] ml-[5px] py-1"></i>
                                                            <span class="px-4 py-0">Izbriši knjigu</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <!--<td>
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

                                                            <a href="{{route('book.otpisi.create', $book)}}" tabindex="0"
                                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                               role="menuitem">
                                                                <i class="fas fa-level-up-alt mr-[14px] ml-[5px] py-1"></i>
                                                                <span class="px-4 py-0">Otpisi knjigu</span>
                                                            </a>

                                                            <a href="{{ route('book.izdaj.create', $book) }}" tabindex="0"
                                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                               role="menuitem">
                                                                <i class="far fa-hand-scissors mr-[10px] ml-[5px] py-1"></i>
                                                                <span class="px-4 py-0">Izdaj knjigu</span>
                                                            </a>

                                                            <a href="{{ route('book.vrati.create', $book) }}" tabindex="0"
                                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                               role="menuitem">
                                                                <i class="fas fa-redo-alt mr-[10px] ml-[5px] py-1"></i>
                                                                <span class="px-4 py-0">Vrati knjigu</span>
                                                            </a>

                                                            <a href="rezervisiKnjigu.php" tabindex="0"
                                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                               role="menuitem">
                                                                <i class="far fa-calendar-check mr-[10px] ml-[5px] py-1"></i>
                                                                <span class="px-4 py-0">Rezerviši knjigu</span>
                                                            </a>
                                                            <a href="#"
                                                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600 deleteOne"
                                                               id="deleteOne"
                                                               data-toggle="modal"
                                                               data-target="#deleteOneModal"
                                                               data-id="{{ $book->id }}"
                                                               data-name="{{ $book->title }}"
                                                            >
                                                                <i class="fa fa-trash mr-[10px] ml-[5px] py-1"></i>
                                                                <span class="px-4 py-0">Izbriši knjigu</span>
                                                            </a>
{{--                                                            <form method="post" action="{{ route('books.destroy', $book) }}">--}}
{{--                                                                @csrf--}}
{{--                                                                @method('DELETE')--}}
{{--                                                                <button tabindex="0" type="submit"--}}
{{--                                                                        class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"--}}
{{--                                                                        role="menuitem">--}}
{{--                                                                    <i class="fa fa-trash mr-[10px] ml-[5px] py-1"></i>--}}
{{--                                                                    <span class="px-4 py-0">Izbriši knjigu</span>--}}
{{--                                                                </button>--}}
{{--                                                            </form>--}}
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </td> -->
                                    </tr>
                               @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="border-b-[1px] border-[#e4dfdf]">
                                    <th class="px-4 py-4 leading-4 tracking-wider text-left text-blue-500">
                                    </th>
                                    <th class="flex items-center px-4 py-4 leading-4 tracking-wider text-left">Naziv</th>

                                    <!-- Autor + dropdown filter for autor -->
                                    <th id="autoriMenu"
                                        class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer ">Autor</th>

                                    <!-- Kategorija + dropdown filter for kategorija -->
                                    <th id="kategorijeMenu" class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left">Kategorija</th>
                                    <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Na raspolaganju</th>
                                    <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Rezervisano</th>
                                    <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Izdato</th>
                                    <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">U prekoračenju</th>
                                    <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Ukupna količina
                                    </th>
                                    <th class="px-4 py-4"> </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

        </section>
</x-layout>
