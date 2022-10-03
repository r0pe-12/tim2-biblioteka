<x-layout>
    @section('title')
        Edit: {{ $book->title }}
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
    <section class="w-screen h-screen pl-[80px] pb-4 text-gray-700 scroll">
        <!-- Heading of content -->
        <div class="heading">
            <div class="flex border-b-[1px] border-[#e4dfdf]">
                <div class="pl-[30px] py-[10px] flex flex-col">
                    <div>
                        <h1>
                            Izmijeni knjigu: {{ $book->title }}
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
                                    <a href="{{ route('books.show', $book) }}"
                                       class="text-[#2196f3] hover:text-blue-600">
                                        KNJIGA-{{ $book->id }}
                                    </a>
                                </li>
                                <li>
                                    <span class="mx-2">/</span>
                                </li>
                                <li>
                                    <a href="#"
                                       class="text-gray-400 hover:text-blue-600">
                                        Izmijeni knjigu
                                    </a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <form method="POST" class="text-gray-700" action="{{ route('books.update', $book) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- navbar -->
            <div class="py-4 text-gray-500 border-[#e4dfdf] pl-[30px]">
                <nav>
                    <div class="nav nav-pills" id="nav-tab" role="tablist">
                        <a class="nav-link active" id="osnovniDetalji" data-bs-toggle="tab" disabled href="#osnovniDetalji-tab"  role="tab" aria-controls="osnovniDetalji" aria-selected="true">Osnovni detalji</a>
                        <a class="nav-link" id="specifikacije" data-bs-toggle="tab" disabled href="#specifikacije-tab"  role="tab" aria-controls="specifikacije" aria-selected="false">Specifikacije</a>
                        <a class="nav-link" id="multimedija" data-bs-toggle="tab" disabled href="#multimedija-tab"  role="tab" aria-controls="multimedija" aria-selected="false">Multimedija</a>

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
                                    <input autocomplete="off" value="{{ $book->title }}"
                                           type="text" name="nazivKnjiga" id="nazivKnjiga"
                                           class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" onkeydown="clearErrorsNazivKnjiga()">
                                    <div id="validateNazivKnjiga"></div>
                                </div>

                                <div class="mt-[20px]">
                                    <p class="inline-block mb-2">Kratki sadržaj</p>
                                    <textarea name="kratki_sadrzaj"
                                              class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]">{{ $book->description }}</textarea>
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
                                                            <option value="{{ $category->id }}" {{ $book->categories->contains($category->id) ? 'selected' : ''}}>{{ $category->name }}</option>
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
                                        <p class="mb-2">Izaberite žanrove <span class="text-red-500">*</span></p>
                                        <div class="relative inline-block w-[100%]">
                                            <div class="relative flex flex-col items-center">
                                                <div class="w-full svelte-1l8159u">
                                                    <select onchange="clearErrorsZanr()"
                                                            id="zanroviInput" name="genres[]"
                                                            class="w-full select2 flex p-1 my-2 bg-white border border-gray-300 shadow-sm focus-within:ring-2 focus-within:ring-[#576cdf]"
                                                            multiple="multiple">
                                                        @foreach($genres as $genre)
                                                            <option value="{{ $genre->id }}" {{ $book->genres->contains($genre->id) ? 'selected' : '' }}>{{ $genre->name }}</option>
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
                                                            <option value="{{ $author->id }}" {{ $book->authors->contains($author->id) ? 'selected' : '' }}>{{ $author->name }} {{ $author->surname }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="validateAutori"></div>
                                </div>

                                <div class="mt-[20px]">
                                    <p class="mb-2">Izdavač <span class="text-red-500">*</span></p>
                                    <select class="select2 flex w-[45%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]" name="izdavac" id="izdavac" onchange="clearErrorsIzdavac()">
                                        <option selected hidden disabled></option>
                                        @foreach($publishers as $publisher)
                                            <option value="{{ $publisher->id }}" {{ $publisher->id == $book->publisher_id ? 'selected' : '' }}>{{ $publisher->name }}</option>
                                        @endforeach
                                    </select>
                                    <div id="validateIzdavac"></div>
                                </div>

                                <div class="mt-[20px]">
                                    <p class="mb-2">Godina izdavanja <span class="text-red-500">*</span></p>
                                    <select class="select2 flex w-[45%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]" name="godinaIzdavanja" id="godinaIzdavanja" onchange="clearErrorsGodinaIzdavanja()">
                                        <option disabled="" selected=""></option>
                                        @for($i=1950;$i<=2050;$i++)
                                            <option value="{{$i}}" {{ $i == $book->publishDate ? 'selected' : '' }}>
                                                Godina izdavanja - {{$i}}
                                            </option>
                                        @endfor
                                    </select>
                                    <div id="validateGodinaIzdavanja"></div>
                                </div>

                                <div class="mt-[20px]">
                                    <p>Količina <span class="text-red-500">*</span></p>
                                    <input autocomplete="off" value="{{ $book->samples }}"
                                           type="number" name="knjigaKolicina" id="knjigaKolicina" min="0"
                                           class="flex w-[45%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" onkeydown="clearErrorsKnjigaKolicina()">
                                    <div id="validateKnjigaKolicina"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="absolute bottom-0 w-full">
                        <div class="flex flex-row">
                            <div class="inline-block w-full text-white text-right py-[7px] mr-[100px]">
                                <button id="sacuvajKnjigu" type="submit"
                                        class="btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]" onclick="validacijaKnjiga(event)">
                                    Sačuvaj <i class="fas fa-check ml-[4px]"></i>
                                </button>
                                <a href="{{ route('books.show', $book) }}">
                                    <button type="button"
                                            class="btn-animation shadow-lg ml-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                        Poništi <i class="fas fa-times ml-[4px]"></i>
                                    </button>
                                </a>
                                <button type="button"
                                        class="btn-animation ml-[15px] shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]" onclick="validacijaKnjigaOD(event, 'specifikacije-tab')">
                                    Sledeća <i class="fas fa-arrow-right ml-[4px]"></i>
                                </button>
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
                                    <input type="number" name="brStrana" id="brStrana" min="0" value="{{ $book->pageNum }}"
                                           class="flex w-[45%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" onkeydown="clearErrorsBrStrana()">
                                    <div id="validateBrStrana"></div>
                                </div>

                                <div class="mt-[20px]">
                                    <p class="mb-2">Pismo <span class="text-red-500">*</span></p>
                                    <select style="width: 45%"
                                            class="select2 flex w-[45%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]" name="pismo" id="pismo" onchange="clearErrorsPismo()">
                                        <option disabled="" selected=""></option>
                                        @foreach($scripts as $script)
                                            <option value="{{ $script->id }}" {{ $script->id == $book->script_id ? 'selected' : '' }}>{{ $script->name }}</option>
                                        @endforeach
                                    </select>
                                    <div id="validatePismo"></div>
                                </div>

                                <div class="mt-[20px]">
                                    <p class="mb-2">Jezik <span class="text-red-500">*</span></p>
                                    <select style="width: 45%"
                                            class="select2 flex w-[45%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]" name="jezik" id="jezik" onchange="clearErrorsPismo()">
                                        <option disabled="" selected=""></option>
                                        @foreach($languages as $lang)
                                            <option value="{{ $lang->id }}" {{ $lang->id == $book->language_id ? 'selected' : '' }}>{{ $lang->name }}</option>
                                        @endforeach
                                    </select>
                                    <div id="validatePismo"></div>
                                </div>

                                <div class="mt-[20px]">
                                    <p class="mb-2">Povez <span class="text-red-500">*</span></p>
                                    <select style="width: 45%"
                                            class="select2 flex w-[45%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]" name="povez" id="povez" onchange="clearErrorsPovez()">
                                        <option disabled="" selected=""></option>
                                        @foreach($bookbinds as $bookbind)
                                            <option value="{{ $bookbind->id }}" {{ $bookbind->id == $book->bookbind_id ? 'selected' : '' }}>{{ $bookbind->name }}</option>
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
                                            <option value="{{ $format->id }}" {{ $format->id == $book->format_id ? 'selected' : '' }}>{{ $format->name }}</option>
                                        @endforeach
                                    </select>
                                    <div id="validateFormat"></div>
                                </div>

                                <div class="mt-[20px]">
                                    <p id="isbnLabel">International Standard Book Num <span class="text-red-500">*</span></p>
                                    <input autocomplete="off" value="{{ $book->isbn }}" onkeyup="isbnCheck()" maxlength="13"
                                           type="text" name="isbn" id="isbn" class="flex w-[45%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" onkeydown="clearErrorsIsbn()">
                                    <div id="validateIsbn"></div>
                                </div>
                                <div class="mt-[20px]">
                                    <p id="isbnLabel">PDF verzija knjige</p>
                                    <label style="cursor:pointer; overflow: hidden" id="pdfLabel"
                                           class="flex w-[45%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                                           for="pdfdif">{{ is_null($book->pdf) ? 'Izaberi PDF' : $book->getAttributes()['pdf'] }}
                                        <span id="delPdf" style="margin-left: auto; padding-left: 12px"><i class="fa fa-xmark-circle"></i></span>
                                    </label>
                                    <input type="number" class="hidden" name="deletePdfs" id="delPdfInput" value="0">
                                    <input autocomplete="off"
                                           type="file" accept="application/pdf" name="pdf" id="pdf" class="hidden flex w-[45%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]">
                                    @if($book->pdf)
                                        <a href="{{ $book->pdf }}" target="_blank">Pogledaj PDF</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="absolute bottom-0 w-full">
                        <div class="flex flex-row">
                            <div class="inline-block w-full text-white text-right py-[7px] mr-[100px]">
                                <a href="{{ route('books.show', $book) }}">
                                    <button type="button"
                                            class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                        Poništi <i class="fas fa-times ml-[4px]"></i>
                                    </button>
                                </a>
                                <button id="sacuvajKnjigu" type="submit"
                                        class="btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]" onclick="validacijaKnjiga(event)">
                                    Sačuvaj <i class="fas fa-check ml-[4px]"></i>
                                </button>
                                <button type="button"
                                        class="btn-animation ml-[15px] shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]" onclick="tab('osnovniDetalji-tab')" style="background: #325EA8">
                                    Prethodna <i class="fas fa-arrow-left ml-[4px]"></i>
                                </button>
                                <button type="button"
                                        class="btn-animation ml-[15px] shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]" onclick="validacijaKnjigaSpec(event, 'multimedija-tab')">
                                    Sledeća <i class="fas fa-arrow-right ml-[4px]"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- kraj Specifikacije -->

                <!-- MULTIMEDIJA -->
                <div class="tab-pane fade" id="multimedija-tab" role="tabpanel" aria-labelledby="multimedija">
                    <div class="scroll height-content section-content">
                        <div class="w-9/12 mx-auto bg-white rounded p7 mt-[40px] mb-[150px]">
                            <div x-data="dataFileDnD()"
                                 class="relative flex flex-col p-4 text-gray-400 border border-gray-200 rounded">
                                <div x-ref="dnd"
                                     class="relative flex flex-col text-gray-400 border border-gray-200 border-dashed rounded cursor-pointer">
                                    <input accept="*" type="file" multiple name="pictures[]" id="multimediaInput"
                                           class="absolute inset-0 z-50 w-full h-full p-0 m-0 outline-none opacity-0 cursor-pointer"
                                           @change="addFiles($event)"
                                           @dragover="$refs.dnd.classList.add('border-blue-400'); $refs.dnd.classList.add('ring-4'); $refs.dnd.classList.add('ring-inset');"
                                           @dragleave="$refs.dnd.classList.remove('border-blue-400'); $refs.dnd.classList.remove('ring-4'); $refs.dnd.classList.remove('ring-inset');"
                                           @drop="$refs.dnd.classList.remove('border-blue-400'); $refs.dnd.classList.remove('ring-4'); $refs.dnd.classList.remove('ring-inset');"
                                           title="" />

                                    <div class="flex flex-col items-center justify-center py-10 text-center">
                                        <svg class="w-6 h-6 mr-1 text-current-50" xmlns="http://www.w3.org/2000/svg"
                                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <p class="m-0">Drag your files here or click in this area.</p>
                                    </div>
                                </div>

{{--                                <template x-if="files.length > 0">--}}
                                        <div id="parent" class="grid grid-cols-4 gap-4 mt-4" @drop.prevent="drop($event)"
                                             @dragover.prevent="$event.dataTransfer.dropEffect = 'move'">

                                             <!-- Image 1 -->
                                            @if(count($photos = $book->photos))
                                                @foreach($photos as $photo)
                                                <div class="relative flex flex-col text-xs bg-white bg-opacity-50" id="photo-{{$photo->id}}">
                                                    <input type="hidden" name="present[]" value="{{ $photo->id }}">
                                                    <img src="{{ $photo->path }}" alt="" class="h-[322px]">
                                                    <!-- Checkbox -->
                                                    <input
                                                        class="absolute top-[10px] right-[10px] z-50 p-1 bg-white rounded-bl focus:outline-none"
                                                        type="radio" name="cover" {{ $photo->cover ? 'checked' : '' }} value="{{ $photo->id }}" />
                                                    <!-- End checkbox -->
                                                    <button onclick="deletePhoto({{ $photo->id }})"
                                                        class="absolute bottom-0 right-0 z-50 p-1 bg-white rounded-bl focus:outline-none"
                                                        type="button">
                                                        <svg class="w-[25px] h-[25px] text-gray-700"
                                                             xmlns="http://www.w3.org/2000/svg" fill="none"
                                                             nviewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                  stroke-width="2"
                                                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                    <div
                                                        class="absolute bottom-0 left-0 right-0 flex flex-col p-2 text-xs text-center bg-white bg-opacity-50">
                                                                <span
                                                                    class="w-full font-bold text-gray-900 truncate">{{ preg_replace('/[0-9]{4}_[0-9]{2}_[0-9]{2}_[0-9]{2}_[0-9]{2}_[0-9]{2}_/', '', $photo->getAttributes()['path']) }}</span>
{{--                                                        <span class="text-xs text-gray-900">89kB</span>--}}
                                                    </div>
                                                </div>
                                                @endforeach
                                            @endif
                                            <!-- end Image 1 -->
                                            <template x-for="(_, index) in Array.from({ length: files.length })">
                                                <div class="relative flex flex-col items-center overflow-hidden text-center bg-gray-100 border rounded cursor-move select-none"
                                                     style="padding-top: 100%;" @dragstart="dragstart($event)"
                                                     @dragend="fileDragging = null"
                                                     :class="{'border-blue-600': fileDragging == index}" draggable="true"
                                                     :data-index="index">
                                                    <!-- Checkbox -->
                                                    <input
                                                        class="absolute top-0 right-0 z-50 p-1 bg-white rounded-bl focus:outline-none"
                                                        type="radio" x-bind:value="files[index].name" name="cover" />
                                                    <!-- End checkbox -->
                                                    <button
                                                        class="absolute bottom-0 right-0 z-50 p-1 bg-white rounded-bl focus:outline-none"
                                                        type="button" @click="remove(index)">
                                                        <svg class="w-[25px] h-[25px] text-gray-700"
                                                             xmlns="http://www.w3.org/2000/svg" fill="none" nviewBox="0 0 24 24"
                                                             stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                  stroke-width="2"
                                                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                    <template x-if="files[index].type.includes('audio/')">
                                                        <svg class="absolute w-12 h-12 text-gray-400 transform top-1/2 -translate-y-2/3"
                                                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                             stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                  stroke-width="2"
                                                                  d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                                                        </svg>
                                                    </template>
                                                    <template
                                                        x-if="files[index].type.includes('application/') || files[index].type === ''">
                                                        <svg class="absolute w-12 h-12 text-gray-400 transform top-1/2 -translate-y-2/3"
                                                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                             stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                  stroke-width="2"
                                                                  d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                                        </svg>
                                                    </template>
                                                    <template x-if="files[index].type.includes('image/')">
                                                        <img class="absolute inset-0 z-0 object-cover w-full h-full border-4 border-white preview"
                                                             x-bind:src="loadFile(files[index])" />
                                                    </template>
                                                    <template x-if="files[index].type.includes('video/')">
                                                        <video
                                                            class="absolute inset-0 object-cover w-full h-full border-4 border-white pointer-events-none preview">
                                                            <fileDragging x-bind:src="loadFile(files[index])" type="video/mp4">
                                                        </video>
                                                    </template>

                                                    <div
                                                        class="absolute bottom-0 left-0 right-0 flex flex-col p-2 text-xs bg-white bg-opacity-50">
                                                <span class="w-full font-bold text-gray-900 truncate"
                                                      x-text="files[index].name">Loading</span>
                                                        <span class="text-xs text-gray-900"
                                                              x-text="humanFileSize(files[index].size)">...</span>
                                                    </div>

                                                    <div class="absolute inset-0 z-40 transition-colors duration-300"
                                                         @dragenter="dragenter($event)" @dragleave="fileDropping = null"
                                                         :class="{'bg-blue-200 bg-opacity-80': fileDropping == index && fileDragging != index}">
                                                    </div>
                                                </div>
                                            </template>
                                        </div>
{{--                                </template>--}}
                            </div>
                        </div>
                    </div>
                    <div class="absolute bottom-0 w-full">
                        <div class="flex flex-row">
                            <div class="inline-block w-full text-white text-right py-[7px] mr-[100px]">
                                <a href="{{ route('books.show', $book) }}">
                                    <button type="button"
                                            class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                        Poništi <i class="fas fa-times ml-[4px]"></i>
                                    </button>
                                </a>
                                <button type="button"
                                        class="btn-animation mr-[15px] shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]" onclick="tab('specifikacije-tab')" style="background: #325EA8">
                                    Prethodna <i class="fas fa-arrow-left ml-[4px]"></i>
                                </button>
                                <button id="sacuvajKnjigu" type="submit"
                                        class="btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]" onclick="validacijaKnjiga(event)">
                                    Sačuvaj <i class="fas fa-check ml-[4px]"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- kraj MULTIMEDIJA -->
                <!-- kraj tab-content -->
            </div>
        </form>
        <!-- Space for content -->
    </section>
</x-layout>
