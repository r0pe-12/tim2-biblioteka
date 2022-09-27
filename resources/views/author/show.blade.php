<x-layout>
    @section('title')
        Autor : {{ $author->surname }}
    @endsection
        <!-- Content -->
        <section class="w-screen h-screen pl-[80px] pb-4 text-gray-700">
            <!-- Heading of content -->
            <div class="heading">
                <div class="flex justify-between border-b-[1px] border-[#e4dfdf]">
                    <div class="pl-[30px] py-[10px] flex flex-col">
                        <div>
                            <h1>
                                {{ $author->name }} {{ $author->surname }}
                            </h1>
                        </div>
                        <div>
                            <nav class="w-full rounded">
                                <ol class="flex list-reset">
                                    <li>
                                        <a href="{{ route('authors.index') }}" class="text-[#2196f3] hover:text-blue-600">
                                            Evidencija autora
                                        </a>
                                    </li>
                                    <li>
                                        <span class="mx-2">/</span>
                                    </li>
                                    <li>
                                        <a href="{{ route('authors.show', $author) }}" class="text-gray-400 hover:text-blue-600">
                                            AUTOR-{{ $author->id }}
                                        </a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="pt-[24px] pr-[30px]">
                        <p class="inline cursor-pointer text-[25px] py-[10px] pl-[30px] border-l-[1px] border-gray-300 dotsAutor hover:text-[#606FC7]">
                            <i
                                class="fas fa-ellipsis-v"></i>
                        </p>
                        <div
                            class="z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-autor">
                            <div class="absolute right-0 w-56 mt-[2px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                                <div class="py-1">
                                    <a href="{{ route('authors.edit', $author) }}" tabindex="0"
                                        class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                        role="menuitem">
                                        <i class="fas fa-edit mr-[1px] ml-[5px] py-1"></i>
                                        <span class="px-4 py-0">Izmijeni autora</span>
                                    </a>
                                    <form method="POST" action="{{ route('authors.destroy', $author) }}" enctype="multipart/form-data" tabindex="0"
                                          class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                          role="menuitem">
                                        @csrf
                                        @method('DELETE')
                                        <i class="fa fa-trash mr-[5px] ml-[5px] py-1"></i>
                                        <button type="submit"><span class="px-4 py-0">Izbriši autora</span></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Space for content -->
            <div class="py-4 text-gray-500 border-[#e4dfdf] pl-[30px]">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-link active" id="osnovniDetalji" data-bs-toggle="tab" href="#osnovniDetalji-tab"  role="tab" aria-controls="osnovniDetalji" aria-selected="true">Osnovni detalji</a>
                        <a class="nav-link" id="knjige" data-bs-toggle="tab" href="#knjige-tab"  role="tab" aria-controls="knjige" aria-selected="false">Knjige ovog autora</a>
                    </div>
                </nav>
            </div>

            <div class="pl-[30px] height-profile pb-[30px] scroll mt-[20px]">
                <div class="tab-content" id="nav-tabContent">
                    <!-- OSNOVNI DETALjI -->
                    <div class="tab-pane fade show active" id="osnovniDetalji-tab" role="tabpanel" aria-labelledby="osnovniDetalji">
                        <div class="flex flex-row">
                            <div class="mr-[30px]">
                                <div class="mt-[20px]">
                                    <span class="text-gray-500">Ime</span>
                                    <p class="font-medium">{{ $author->name }}</p>
                                </div>
                                <div class="mt-[40px]">
                                    <span class="text-gray-500">Prezime</span>
                                    <p class="font-medium">{{ $author->surname }}</p>
                                </div>
                                <div class="mr-[70px] mt-[20px] flex flex-col max-w-[600px]">
                                    <h4 class="text-gray-500 ">
                                        Storyline (Kratki sadržaj)
                                    </h4>
                                    <div class="scroll" style="max-height: 511px">
                                        <p class=" my-[10px]">
                                            {!! $author->biography !!}
                                        </p>
                                    </div>
                                </div>

                            </div>
                            <div class="ml-[100px]  mt-[20px]">
                                <img class="p-2 border-2 border-gray-300" width="300px" src="{{ $author->image }}" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- kraj OSNOVNI DETALJI -->

                    <!-- KNjIGE OVOG AUTORA -->
                    <div class="tab-pane fade" id="knjige-tab" role="tabpanel" aria-labelledby="knjige">
                        <div class="pt-2 bg-white pr-[10px]">
                            <div class="w-full mt-2">
                                <!-- Table -->
                                <table class="w-full overflow-hidden shadow-lg rounded-xl" id="myTable">
                                    <!-- Table head-->
                                    <thead class="bg-[#EFF3F6]">
                                    <tr id="head" class="border-b-[1px] border-[#e4dfdf]">
                                        <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer">
                                            Naziv knjige
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
                                    @foreach($author->books as $book)
                                        <tr class="hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                                            <td class="flex flex-row items-center px-4 py-4">
                                                <img class="object-cover w-8 mr-2 h-11" src="{{ $book->cover() }}" alt="" />
                                                <a href="{{ route('books.show', $book) }}">
                                                    <span class="font-medium text-center">{{ $book->title }}</span>
                                                </a>
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
                                            <!-- todo ovo makni ako se dogovorite -->
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
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- kraj KNjIGE OVOG AUTORA -->
                </div>
            </div>
        </section>
        <!-- End Content -->
    </main>
    <!-- End Main content -->
</x-layout>>
