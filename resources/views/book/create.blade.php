<x-layout>
    @section('title')
        Nova Knjiga
    @endsection
    @section('scripts')
        <script>
            CKEDITOR.replace('kratki_sadrzaj', {
                width: "90%",
                height: "150px"
            });
        </script>
    @endsection
        <!-- Content -->
        <section class="w-screen h-screen pl-[80px] pb-4 text-gray-700">
            <!-- Heading of content -->
            <div class="heading">
                <div class="flex border-b-[1px] border-[#e4dfdf]">
                    <div class="pl-[30px] py-[10px] flex flex-col">
                        <div>
                            <h1>
                                Nova knjiga
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
                                        <a href="#" class="text-[#2196f3] hover:text-blue-600">
                                            Nova knjiga
                                        </a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <form method="POST" class="text-gray-700" action="{{ route('books.store') }}">
                @csrf
                <!-- navbar -->
                <div class="py-4 text-gray-500 border-[#e4dfdf] pl-[30px]">
                    <nav>
                        <div class="nav nav-pills" id="nav-tab" role="tablist">
                            <a class="nav-link active" id="osnovniDetalji" data-bs-toggle="tab" href="#osnovniDetalji-tab"  role="tab" aria-controls="osnovniDetalji" aria-selected="true">Osnovni detalji</a>
                            <a class="nav-link" id="specifikacije" data-bs-toggle="tab" href="#specifikacije-tab"  role="tab" aria-controls="specifikacije" aria-selected="false">Specifikacije</a>
                            <a class="nav-link disabled" id="multimedija" data-bs-toggle="tab" href="#multimedija-tab"  role="tab" aria-controls="nav-contact" aria-selected="false" aria-disabled="true">Multimedija</a>

{{--                            <div class="text-white text-right flex flex-row" style="margin-right: 5.6%; margin-left: auto">--}}
{{--                                <a href="{{ route('books.index') }}">--}}
{{--                                    <button type="button"--}}
{{--                                            class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">--}}
{{--                                        Poništi <i class="fas fa-times ml-[4px]"></i>--}}
{{--                                    </button>--}}
{{--                                </a>--}}
{{--                                <button id="sacuvajKnjigu" type="submit"--}}
{{--                                        class="btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]" onclick="validacijaKnjiga(event)">--}}
{{--                                    Sačuvaj <i class="fas fa-check ml-[4px]"></i>--}}
{{--                                </button>--}}
{{--                            </div>--}}

                        </div>
                    </nav>
                </div>

                <!-- content -->
                <div class="tab-content" id="nav-tabContent">

                    <!--OSNOVNI DETALjI-->
                    <div class="tab-pane fade show active" id="osnovniDetalji-tab" role="tabpanel" aria-labelledby="osnovniDetalji">
                        <div class="scroll height-content section-content">
                            <div class="flex flex-row ml-[30px] mb-[150px]">
                                <div class="w-[50%]">
                                    <div class="mt-[20px]">
                                        <p>Naziv knjige <span class="text-red-500">*</span></p>
                                        <input autocomplete="off"
                                            type="text" name="nazivKnjiga" id="nazivKnjiga"
                                               class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" onkeydown="clearErrorsNazivKnjiga()">
                                        <div id="validateNazivKnjiga"></div>
                                    </div>

                                    <div class="mt-[20px]">
                                        <p class="inline-block mb-2">Kratki sadrzaj</p>
                                        <textarea name="kratki_sadrzaj"
                                                  class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"></textarea>
                                    </div>

                                    <div class="mt-[20px]">
                                        <div class="flex flex-col w-[90%]">
                                            <p class="mb-2">Izaberite kategorije <span class="text-red-500">*</span></p>
                                            <div class="relative inline-block w-[100%]">
                                                <div class="relative flex flex-col items-center">
                                                    <div class="w-full svelte-1l8159u">
                                                        <select onchange="clearErrorsKategorija()"
                                                                id="kategorijaInput" name="categories[]"
                                                                class="w-full select2 flex p-1 my-2 bg-white border border-gray-300 shadow-sm focus-within:ring-2 focus-within:ring-[#576cdf]"
                                                                multiple="multiple">
                                                           @foreach($categories as $category)
                                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                           @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="validateKategorija"></div>
                                    </div>

                                    <div class="mt-[20px]">
                                        <div class="flex flex-col w-[90%]">
                                            <p class="mb-2">Izaberite zanrove <span class="text-red-500">*</span></p>
                                            <div class="relative inline-block w-[100%]">
                                                <div class="relative flex flex-col items-center">
                                                    <div class="w-full svelte-1l8159u">
                                                        <select onchange="clearErrorsZanr()"
                                                                id="zanroviInput" name="genres[]"
                                                                class="w-full select2 flex p-1 my-2 bg-white border border-gray-300 shadow-sm focus-within:ring-2 focus-within:ring-[#576cdf]"
                                                                multiple="multiple">
                                                            @foreach($genres as $genre)
                                                                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="validateZanr"></div>
                                    </div>
                                </div>

                                <div class="w-[50%]">
                                    <div class="mt-[20px]">
                                        <div class="flex flex-col w-[90%]">
                                            <p class="mb-2">Izaberite autore <span class="text-red-500">*</span></p>
                                            <div class="relative inline-block w-[100%]">
                                                <div class="relative flex flex-col items-center">
                                                    <div class="w-full svelte-1l8159u">
                                                        <select onchange="clearErrorsAutori()"
                                                                id="autoriInput" name="authors[]"
                                                                class="w-full select2 flex p-1 my-2 bg-white border border-gray-300 shadow-sm focus-within:ring-2 focus-within:ring-[#576cdf]"
                                                                multiple="multiple">
                                                            @foreach($authors as $author)
                                                                <option value="{{ $author->id }}">{{ $author->name }} {{ $author->surname }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="validateAutori"></div>
                                    </div>

                                    <div class="mt-[20px]">
                                        <p class="mb-2">Izdavac <span class="text-red-500">*</span></p>
                                        <select class="select2 flex w-[45%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]" name="izdavac" id="izdavac" onchange="clearErrorsIzdavac()">
                                            <option selected hidden disabled></option>
                                            @foreach($publishers as $publisher)
                                                <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                                            @endforeach
                                        </select>
                                        <div id="validateIzdavac"></div>
                                    </div>

                                    <div class="mt-[20px]">
                                        <p class="mb-2">Godina izdavanja <span class="text-red-500">*</span></p>
                                        <select class="select2 flex w-[45%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]" name="godinaIzdavanja" id="godinaIzdavanja" onchange="clearErrorsGodinaIzdavanja()">
                                            <option disabled="" selected=""></option>
                                            @for($i=1950;$i<=2050;$i++)
                                                <option value="{{$i}}">
                                                    Godina izdavanja - {{$i}}
                                                </option>
                                            @endfor
                                        </select>
                                        <div id="validateGodinaIzdavanja"></div>
                                    </div>

                                    <div class="mt-[20px]">
                                        <p>Kolicina <span class="text-red-500">*</span></p>
                                        <input autocomplete="off"
                                            type="number" name="knjigaKolicina" id="knjigaKolicina"
                                            class="flex w-[45%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" onkeydown="clearErrorsKnjigaKolicina()">
                                        <div id="validateKnjigaKolicina"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- kraj Osnovni Detalji -->

                    <!-- SPECIFIKACIJE -->
                    <div class="tab-pane fade" id="specifikacije-tab" role="tabpanel" aria-labelledby="specifikacije">
                        <div class="scroll height-content section-content">
                            <div class="flex flex-row ml-[30px]">
                                <div class="w-[50%] mb-[150px]">
                                    <div class="mt-[20px]">
                                        <p>Broj strana <span class="text-red-500">*</span></p>
                                        <input type="number" name="brStrana" id="brStrana" class="flex w-[45%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" onkeydown="clearErrorsBrStrana()">
                                        <div id="validateBrStrana"></div>
                                    </div>

                                    <div class="mt-[20px]">
                                        <p class="mb-2">Pismo <span class="text-red-500">*</span></p>
                                        <select style="width: 45%"
                                            class="select2 flex w-[45%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]" name="pismo" id="pismo" onchange="clearErrorsPismo()">
                                            <option disabled="" selected=""></option>
                                            @foreach($scripts as $script)
                                                <option value="{{ $script->id }}">{{ $script->name }}</option>
                                            @endforeach
                                        </select>
                                        <div id="validatePismo"></div>
                                    </div>
                                    <div class="mt-[20px]">
                                        <p class="mb-2">Jezik <span class="text-red-500">*</span></p>
                                        <select style="width: 45%"
                                            class="select2 flex w-[45%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]" name="jezik" id="jezik" onchange="clearErrorsJezik()">
                                            <option disabled="" selected=""></option>
                                            @foreach($languages as $lang)
                                                <option value="{{ $lang->id }}">{{ $lang->name }}</option>
                                            @endforeach
                                        </select>
                                        <div id="validateJezik"></div>
                                    </div>

                                    <div class="mt-[20px]">
                                        <p class="mb-2">Povez <span class="text-red-500">*</span></p>
                                        <select style="width: 45%"
                                            class="select2 flex w-[45%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]" name="povez" id="povez" onchange="clearErrorsPovez()">
                                            <option disabled="" selected=""></option>
                                            @foreach($bookbinds as $bookbind)
                                                <option value="{{ $bookbind->id }}">{{ $bookbind->name }}</option>
                                            @endforeach
                                        </select>
                                        <div id="validatePovez"></div>
                                    </div>

                                    <div class="mt-[20px]">
                                        <p class="mb-2">Format <span class="text-red-500">*</span></p>
                                        <select style="width: 45%"
                                                class="select2 flex w-[45%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]" name="format" id="format" onchange="clearErrorsFormat()">
                                            <option disabled="" selected=""></option>
                                            @foreach($formats as $format)
                                                <option value="{{ $format->id }}">{{ $format->name }}</option>
                                            @endforeach
                                        </select>
                                        <div id="validateFormat"></div>
                                    </div>

                                    <div class="mt-[20px]">
                                        <p>International Standard Book Num <span class="text-red-500">*</span></p>
                                        <input autocomplete="off"
                                            type="text" name="isbn" id="isbn" class="flex w-[45%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" onkeydown="clearErrorsIsbn()">
                                        <div id="validateIsbn"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- kraj Specifikacije -->

                    <!-- kraj tab-content -->
                </div>

                <div class="absolute bottom-0 w-full">
                    <div class="flex flex-row">
                        <div class="inline-block w-full text-white text-right py-[7px] mr-[100px]">
                            <a href="{{ route('books.index') }}">
                                <button type="button"
                                        class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                    Poništi <i class="fas fa-times ml-[4px]"></i>
                                </button>
                            </a>
                            <button id="sacuvajKnjigu" type="submit"
                                    class="btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]" onclick="validacijaKnjiga(event)">
                                Sačuvaj <i class="fas fa-check ml-[4px]"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Space for content -->
        </section>
</x-layout>
