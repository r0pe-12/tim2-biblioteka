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

            <div class="py-4 text-gray-500 border-[#e4dfdf] pl-[30px]">
                <nav>
                    <div class="nav nav-pills" id="nav-tab" role="tablist">
                        <a class="nav-link active" id="osnovniDetalji" data-bs-toggle="tab" href="#osnovniDetalji-tab"  role="tab" aria-controls="osnovniDetalji" aria-selected="true">Osnovni detalji</a>
                        <a class="nav-link" id="specifikacije" data-bs-toggle="tab" href="#specifikacije-tab"  role="tab" aria-controls="specifikacije" aria-selected="false">Specifikacije</a>
                        <a class="nav-link disabled" id="multimedija" data-bs-toggle="tab" href="#multimedija-tab"  role="tab" aria-controls="nav-contact" aria-selected="false" aria-disabled="true">Multimedija</a>
                    </div>
                </nav>
            </div>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="osnovniDetalji-tab" role="tabpanel" aria-labelledby="osnovniDetalji">
                    <div class="scroll height-content section-content">
                        <form method="POST" class="text-gray-700 forma" action="{{ route('books.store') }}">
                            @csrf
                            <div class="flex flex-row ml-[30px] mb-[150px]">
                                <div class="w-[50%]">
                                    <div class="mt-[20px]">
                                        <p>Naziv knjige <span class="text-red-500">*</span></p>
                                        <input type="text" name="nazivKnjiga" id="nazivKnjiga" value="{{ old('nazivKnjiga') }}"
                                               class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                                               onkeydown="clearErrorsNazivKnjiga()" />
                                        <div id="validateNazivKnjiga"></div>
                                        @error('title') <div class="text-red-500 text-xs mt-1"><sup>*</sup>{{ $message }}</div> @enderror
                                    </div>

                                    <div class="mt-[20px]">
                                        <p class="inline-block mb-2">Kratki sadrzaj</p>
                                        <textarea name="kratki_sadrzaj"
                                                  class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]">{{ old('kratki_sadrzaj') }}</textarea>
                                        @error('description') <div class="text-red-500 text-xs mt-1"><sup>*</sup>{{ $message }}</div> @enderror
                                    </div>
{{--    todo kako dodati old() value u ove select tagove ima ih tri multiselect i ovi ostali single select--}}
                                    <div class="mt-[20px]">
                                        <p>Izaberite kategorije <span class="text-red-500">*</span></p>
                                        <select x-cloak id="kategorija">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>

                                        <div x-data="dropdown()" x-init="loadOptions()" class="flex flex-col w-[90%]">
                                            <input name="categories" id="kategorijaInput" type="hidden"
                                                   x-bind:value="selectedValues()">
                                            <div class="relative inline-block w-[100%]">
                                                <div class="relative flex flex-col items-center">
                                                    <div x-on:click="open" class="w-full svelte-1l8159u">
                                                        <div class="flex p-1 my-2 bg-white border border-gray-300 shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf]"
                                                             onclick="clearErrorsKategorija()">
                                                            <div class="flex flex-wrap flex-auto">
                                                                <template x-for="(option,index) in selected"
                                                                          :key="options[option].value">
                                                                    <div
                                                                        class="flex items-center justify-center px-[6px] py-[2px] m-1 text-blue-800 bg-blue-200 rounded-[10px] ">
                                                                        <div class="text-xs font-normal leading-none max-w-full flex-initial x-model="
                                                                             options[option] x-text="options[option].text">
                                                                        </div>
                                                                        <div class="flex flex-row-reverse flex-auto">
                                                                            <div x-on:click="remove(index,option)">
                                                                                <svg class="w-6 h-6 fill-current " role="button"
                                                                                     viewBox="0 0 20 20">
                                                                                    <path
                                                                                        d="M14.348,14.849c-0.469,0.469-1.229,0.469-1.697,0L10,11.819l-2.651,3.029c-0.469,0.469-1.229,0.469-1.697,0
                                                                                                c-0.469-0.469-0.469-1.229,0-1.697l2.758-3.15L5.651,6.849c-0.469-0.469-0.469-1.228,0-1.697s1.228-0.469,1.697,0L10,8.183
                                                                                                l2.651-3.031c0.469-0.469,1.228-0.469,1.697,0s0.469,1.229,0,1.697l-2.758,3.152l2.758,3.15
                                                                                                C14.817,13.62,14.817,14.38,14.348,14.849z" />
                                                                                </svg>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                            </template>
                                                            <div x-show="selected.length    == 0" class="flex-1">
                                                                <input
                                                                    class="w-full h-full p-1 px-2 text-gray-800 bg-transparent outline-none appearance-none"
                                                                    x-bind:value="selectedValues()">
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="flex items-center w-8 py-1 pl-2 pr-1 text-gray-300 svelte-1l8159u">
                                                            <button type="button" x-show="isOpen() === true" x-on:click="open"
                                                                    class="w-6 h-6 text-gray-600 outline-none cursor-pointer focus:outline-none">
                                                                <svg version="1.1" class="w-[10px] h-[9px] ml-[15px]"
                                                                     viewBox="0 0 20 20" stroke="#374151" stroke-width="3">
                                                                    <path d="M17.418,6.109c0.272-0.268,0.709-0.268,0.979,0s0.271,0.701,0,0.969l-7.908,7.83
                                                                                c-0.27,0.268-0.707,0.268-0.979,0l-7.908-7.83c-0.27-0.268-0.27-0.701,0-0.969c0.271-0.268,0.709-0.268,0.979,0L10,13.25
                                                                                L17.418,6.109z" />
                                                                </svg>
                                                            </button>
                                                            <button type="button" x-show="isOpen() === false" @click="close"
                                                                    class="w-6 h-6 text-gray-600 outline-none cursor-pointer focus:outline-none">
                                                                <svg version="1.1" class="w-[10px] h-[9px] ml-[15px]"
                                                                     viewBox="0 0 20 20" stroke="#374151" stroke-width="3">
                                                                    <path d="M17.418,6.109c0.272-0.268,0.709-0.268,0.979,0s0.271,0.701,0,0.969l-7.908,7.83
                                                                                c-0.27,0.268-0.707,0.268-0.979,0l-7.908-7.83c-0.27-0.268-0.27-0.701,0-0.969c0.271-0.268,0.709-0.268,0.979,0L10,13.25
                                                                                L17.418,6.109z" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="w-full">
                                                    <div x-show.transition.origin.top="isOpen()"
                                                         class="z-40 w-full overflow-y-auto bg-white rounded shadow max-h-select svelte-5uyqqj"
                                                         x-on:click.away="close">
                                                        <div class="flex flex-col w-full">
                                                            <template x-for="(option,index) in options" :key="option">
                                                                <div>
                                                                    <div class="w-full border-b border-gray-100 rounded-t cursor-pointer hover:bg-teal-100"
                                                                         @click="select(index,$event)">
                                                                        <div x-bind:class="option.selected ? 'border-teal-600' : ''"
                                                                             class="relative flex items-center w-full p-2 pl-2 border-l-2 border-transparent">
                                                                            <div class="flex items-center w-full">
                                                                                <div class="mx-2 leading-6" x-model="option"
                                                                                     x-text="option.text"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </template>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="validateKategorija"></div>
                                    @error('categories') <div class="text-red-500 text-xs mt-1"><sup>*</sup>{{ $message }}</div> @enderror
                                </div>

                                <div class="mt-[20px]">
                                    <p>Izaberite zanrove <span class="text-red-500">*</span></p>
                                    <select x-cloak id="zanr">
                                        @foreach($genres as $genre)
                                            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                                        @endforeach
                                    </select>

                                    <div x-data="dropdown()" x-init="loadOptionsZanrovi()" class="flex flex-col w-[90%]">
                                        <input name="genres" id="zanroviInput" type="hidden" x-bind:value="selectedValues()">
                                        <div class="relative inline-block w-[100%]">
                                            <div class="relative flex flex-col items-center">
                                                <div x-on:click="open" class="w-full svelte-1l8159u">
                                                    <div class="flex p-1 my-2 bg-white border border-gray-300 shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf]"
                                                         onclick="clearErrorsZanr()">
                                                        <div class="flex flex-wrap flex-auto">
                                                            <template x-for="(option,index) in selected"
                                                                      :key="options[option].value">
                                                                <div
                                                                    class="flex items-center justify-center px-[6px] py-[2px] m-1 text-blue-800 bg-blue-200 rounded-[10px] ">
                                                                    <div class="text-xs font-normal leading-none max-w-full flex-initial x-model="
                                                                         options[option] x-text="options[option].text"></div>
                                                                    <div class="flex flex-row-reverse flex-auto">
                                                                        <div x-on:click="remove(index,option)">
                                                                            <svg class="w-6 h-6 fill-current " role="button"
                                                                                 viewBox="0 0 20 20">
                                                                                <path
                                                                                    d="M14.348,14.849c-0.469,0.469-1.229,0.469-1.697,0L10,11.819l-2.651,3.029c-0.469,0.469-1.229,0.469-1.697,0
                                                                                                c-0.469-0.469-0.469-1.229,0-1.697l2.758-3.15L5.651,6.849c-0.469-0.469-0.469-1.228,0-1.697s1.228-0.469,1.697,0L10,8.183
                                                                                                l2.651-3.031c0.469-0.469,1.228-0.469,1.697,0s0.469,1.229,0,1.697l-2.758,3.152l2.758,3.15
                                                                                                C14.817,13.62,14.817,14.38,14.348,14.849z" />
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        </template>
                                                        <div x-show="selected.length    == 0" class="flex-1">
                                                            <input
                                                                class="w-full h-full p-1 px-2 text-gray-800 bg-transparent outline-none appearance-none"
                                                                x-bind:value="selectedValues()">
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="flex items-center w-8 py-1 pl-2 pr-1 text-gray-300 svelte-1l8159u">
                                                        <button type="button" x-show="isOpen() === true" x-on:click="open"
                                                                class="w-6 h-6 text-gray-600 outline-none cursor-pointer focus:outline-none">
                                                            <svg version="1.1" class="w-[10px] h-[9px] ml-[15px]"
                                                                 viewBox="0 0 20 20" stroke="#374151" stroke-width="3">
                                                                <path d="M17.418,6.109c0.272-0.268,0.709-0.268,0.979,0s0.271,0.701,0,0.969l-7.908,7.83
                                                                                c-0.27,0.268-0.707,0.268-0.979,0l-7.908-7.83c-0.27-0.268-0.27-0.701,0-0.969c0.271-0.268,0.709-0.268,0.979,0L10,13.25
                                                                                L17.418,6.109z" />
                                                            </svg>
                                                        </button>
                                                        <button type="button" x-show="isOpen() === false" @click="close"
                                                                class="w-6 h-6 text-gray-600 outline-none cursor-pointer focus:outline-none">
                                                            <svg version="1.1" class="w-[10px] h-[9px] ml-[15px]"
                                                                 viewBox="0 0 20 20" stroke="#374151" stroke-width="3">
                                                                <path d="M17.418,6.109c0.272-0.268,0.709-0.268,0.979,0s0.271,0.701,0,0.969l-7.908,7.83
                                                                                c-0.27,0.268-0.707,0.268-0.979,0l-7.908-7.83c-0.27-0.268-0.27-0.701,0-0.969c0.271-0.268,0.709-0.268,0.979,0L10,13.25
                                                                                L17.418,6.109z" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="w-full">
                                                <div x-show.transition.origin.top="isOpen()"
                                                     class="z-40 w-full overflow-y-auto bg-white rounded shadow max-h-select svelte-5uyqqj"
                                                     x-on:click.away="close">
                                                    <div class="flex flex-col w-full">
                                                        <template x-for="(option,index) in options" :key="option">
                                                            <div>
                                                                <div class="w-full border-b border-gray-100 rounded-t cursor-pointer hover:bg-teal-100"
                                                                     @click="select(index,$event)">
                                                                    <div x-bind:class="option.selected ? 'border-teal-600' : ''"
                                                                         class="relative flex items-center w-full p-2 pl-2 border-l-2 border-transparent">
                                                                        <div class="flex items-center w-full">
                                                                            <div class="mx-2 leading-6" x-model="option"
                                                                                 x-text="option.text"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </template>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="validateZanr"></div>
                                @error('genres') <div class="text-red-500 text-xs mt-1"><sup>*</sup>{{ $message }}</div> @enderror
                            </div>
                    </div>

                    <div class="w-[50%]">
                        <div class="mt-[20px]">
                            <p>Izaberite autore <span class="text-red-500">*</span></p>
                            <select x-cloak id="autori">
                                @foreach($authors as $author)
                                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                                @endforeach
                            </select>

                            <div x-data="dropdown()" x-init="loadOptionsAutori()" class="flex flex-col w-[90%]">
                                <input name="authors" id="autoriInput" type="hidden" x-bind:value="selectedValues()">
                                <div class="relative inline-block w-[100%]">
                                    <div class="relative flex flex-col items-center">
                                        <div x-on:click="open" class="w-full svelte-1l8159u">
                                            <div class="flex p-1 my-2 bg-white border border-gray-300 shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf]"
                                                 onclick="clearErrorsAutori()">
                                                <div class="flex flex-wrap flex-auto">
                                                    <template x-for="(option,index) in selected" :key="options[option].value">
                                                        <div
                                                            class="flex items-center justify-center px-[6px] py-[2px] m-1 text-blue-800 bg-blue-200 rounded-[10px] ">
                                                            <div class="text-xs font-normal leading-none max-w-full flex-initial x-model="
                                                                 options[option] x-text="options[option].text"></div>
                                                            <div class="flex flex-row-reverse flex-auto">
                                                                <div x-on:click="remove(index,option)">
                                                                    <svg class="w-6 h-6 fill-current " role="button"
                                                                         viewBox="0 0 20 20">
                                                                        <path
                                                                            d="M14.348,14.849c-0.469,0.469-1.229,0.469-1.697,0L10,11.819l-2.651,3.029c-0.469,0.469-1.229,0.469-1.697,0
                                                                                                c-0.469-0.469-0.469-1.229,0-1.697l2.758-3.15L5.651,6.849c-0.469-0.469-0.469-1.228,0-1.697s1.228-0.469,1.697,0L10,8.183
                                                                                                l2.651-3.031c0.469-0.469,1.228-0.469,1.697,0s0.469,1.229,0,1.697l-2.758,3.152l2.758,3.15
                                                                                                C14.817,13.62,14.817,14.38,14.348,14.849z" />
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                                </template>
                                                <div x-show="selected.length    == 0" class="flex-1">
                                                    <input
                                                        class="w-full h-full p-1 px-2 text-gray-800 bg-transparent outline-none appearance-none"
                                                        x-bind:value="selectedValues()">
                                                </div>
                                            </div>
                                            <div class="flex items-center w-8 py-1 pl-2 pr-1 text-gray-300 svelte-1l8159u">
                                                <button type="button" x-show="isOpen() === true" x-on:click="open"
                                                        class="w-6 h-6 text-gray-600 outline-none cursor-pointer focus:outline-none">
                                                    <svg version="1.1" class="w-[10px] h-[9px] ml-[15px]" viewBox="0 0 20 20"
                                                         stroke="#374151" stroke-width="3">
                                                        <path d="M17.418,6.109c0.272-0.268,0.709-0.268,0.979,0s0.271,0.701,0,0.969l-7.908,7.83
                                                                                c-0.27,0.268-0.707,0.268-0.979,0l-7.908-7.83c-0.27-0.268-0.27-0.701,0-0.969c0.271-0.268,0.709-0.268,0.979,0L10,13.25
                                                                                L17.418,6.109z" />
                                                    </svg>
                                                </button>
                                                <button type="button" x-show="isOpen() === false" @click="close"
                                                        class="w-6 h-6 text-gray-600 outline-none cursor-pointer focus:outline-none">
                                                    <svg version="1.1" class="w-[10px] h-[9px] ml-[15px]" viewBox="0 0 20 20"
                                                         stroke="#374151" stroke-width="3">
                                                        <path d="M17.418,6.109c0.272-0.268,0.709-0.268,0.979,0s0.271,0.701,0,0.969l-7.908,7.83
                                                                                c-0.27,0.268-0.707,0.268-0.979,0l-7.908-7.83c-0.27-0.268-0.27-0.701,0-0.969c0.271-0.268,0.709-0.268,0.979,0L10,13.25
                                                                                L17.418,6.109z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full">
                                        <div x-show.transition.origin.top="isOpen()"
                                             class="z-40 w-full overflow-y-auto bg-white rounded shadow max-h-select svelte-5uyqqj"
                                             x-on:click.away="close">
                                            <div class="flex flex-col w-full">
                                                <template x-for="(option,index) in options" :key="option">
                                                    <div>
                                                        <div class="w-full border-b border-gray-100 rounded-t cursor-pointer hover:bg-teal-100"
                                                             @click="select(index,$event)">
                                                            <div x-bind:class="option.selected ? 'border-teal-600' : ''"
                                                                 class="relative flex items-center w-full p-2 pl-2 border-l-2 border-transparent">
                                                                <div class="flex items-center w-full">
                                                                    <div class="mx-2 leading-6" x-model="option"
                                                                         x-text="option.text"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </template>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="validateAutori"></div>
                        @error('authors') <div class="text-red-500 text-xs mt-1"><sup>*</sup>{{ $message }}</div> @enderror
                    </div>

                    <div class="mt-[20px]">
                        <p>Izdavac <span class="text-red-500">*</span></p>
                        <select
                            class="flex w-[45%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                            name="izdavac" id="izdavac" onclick="clearErrorsIzdavac()">
                            <option disabled selected></option>
                            @foreach($publishers as $publisher)
                                <option value="{{ $publisher->id }}" {{ old('izdavac') == $publisher->id ? 'selected' : '' }}>{{ $publisher->name }}</option>
                            @endforeach
                        </select>
                        <div id="validateIzdavac"></div>
                        @error('publisher_id') <div class="text-red-500 text-xs mt-1"><sup>*</sup>{{ $message }}</div> @enderror
                    </div>

                    <div class="mt-[20px]">
                        <p>Godina izdavanja <span class="text-red-500">*</span></p>
                        <input type="number" value="{{ old('godinaIzdavanja') }}"
                            class="flex w-[45%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                            name="godinaIzdavanja" id="godinaIzdavanja" onclick="clearErrorsGodinaIzdavanja()">
                        <div id="validateGodinaIzdavanja"></div>
                        @error('publishDate') <div class="text-red-500 text-xs mt-1"><sup>*</sup>{{ $message }}</div> @enderror
                    </div>

                    <div class="mt-[20px]">
                        <p>Kolicina <span class="text-red-500">*</span></p>
                        <input type="number" name="knjigaKolicina" id="knjigaKolicina" value="{{ old('knjigaKolicina') }}"
                               class="flex w-[45%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                               onkeydown="clearErrorsKnjigaKolicina()" />
                        <div id="validateKnjigaKolicina"></div>
                        @error('samples') <div class="text-red-500 text-xs mt-1"><sup>*</sup>{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>

            </div>
            </div>
            <div class="tab-pane fade" id="specifikacije-tab" role="tabpanel" aria-labelledby="specifikacije">
                <div class="scroll height-content section-content">
                        <div class="flex flex-row ml-[30px]">
                            <div class="w-[50%] mb-[150px]">
                                <div class="mt-[20px]">
                                    <p>Broj strana <span class="text-red-500">*</span></p>
                                    <input type="number" value="{{ old('brStrana') }}" name="brStrana" id="brStrana" class="flex w-[45%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" onkeydown="clearErrorsBrStrana()"/>
                                    <div id="validateBrStrana"></div>
                                    @error('pageNum') <div class="text-red-500 text-xs mt-1"><sup>*</sup>{{ $message }}</div> @enderror
                                </div>

                                <div class="mt-[20px]">
                                    <p>Pismo <span class="text-red-500">*</span></p>
                                    <select class="flex w-[45%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]" name="pismo" id="pismo" onclick="clearErrorsPismo()">
                                        <option disabled selected></option>
                                        @foreach($scripts as $script)
                                            <option value="{{ $script->id }}" {{ old('pismo') == $script->id ? 'selected' : '' }}>{{ $script->name }}</option>
                                        @endforeach
                                    </select>
                                    <div id="validatePismo"></div>
                                    @error('script_id') <div class="text-red-500 text-xs mt-1"><sup>*</sup>{{ $message }}</div> @enderror
                                </div>

                                <div class="mt-[20px]">
                                    <p>Povez <span class="text-red-500">*</span></p>
                                    <select class="flex w-[45%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]" name="povez" id="povez" onclick="clearErrorsPovez()">
                                        <option disabled selected></option>
                                        @foreach($bookbinds as $bookbind)
                                            <option value="{{ $bookbind->id }}" {{ old('povez') == $bookbind->id ? 'selected' : '' }}>{{ $bookbind->name }}</option>
                                        @endforeach
                                    </select>
                                    <div id="validatePovez"></div>
                                    @error('bookbind_id') <div class="text-red-500 text-xs mt-1"><sup>*</sup>{{ $message }}</div> @enderror
                                </div>

                                <div class="mt-[20px]">
                                    <p>Format <span class="text-red-500">*</span></p>
                                    <select class="flex w-[45%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]" name="format" id="format" onclick="clearErrorsFormat()">
                                        <option disabled selected></option>
                                        @foreach($formats as $format)
                                            <option value="{{ $format->id }}" {{ old('format') == $format->id ? 'selected' : '' }}>{{ $format->name }}</option>
                                        @endforeach
                                    </select>
                                    <div id="validateFormat"></div>
                                    @error('format_id') <div class="text-red-500 text-xs mt-1"><sup>*</sup>{{ $message }}</div> @enderror
                                </div>

                                <div class="mt-[20px]">
                                    <p>International Standard Book Number <span class="text-red-500">*</span></p>
                                    <input type="text" value="{{ old('isbn') }}" name="isbn" id="isbn" class="flex w-[45%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" onkeydown="clearErrorsIsbn()"/>
                                    <div id="validateIsbn"></div>
                                    @error('isbn') <div class="text-red-500 text-xs mt-1"><sup>*</sup>{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="absolute bottom-0 w-full" style="position: relative">
                            <div class="flex flex-row">
                                <div class="inline-block w-full text-white text-right py-[7px] mr-[100px]">
                                    <a href="{{ route('books.index') }}">
                                        <button type="button"
                                                class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                            Poništi <i class="fas fa-times ml-[4px]"></i>
                                        </button>
                                    </a>
                                    <button id="sacuvajKnjigu" type="submit"
                                            class="btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]">
                                        Sačuvaj <i class="fas fa-check ml-[4px]"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            </div>
            <!-- Space for content -->

        </section>
</x-layout>
