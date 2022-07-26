<x-layout>
    @section('title')
        Edit: {{ $author->surname }}
    @endsection
    @section('scripts')
        <script>
            CKEDITOR.replace('opis_autor_edit', {
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
                                Izmijeni podatke
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
                                        <a href="#" class="text-gray-400 hover:text-blue-600">
                                            Izmijeni podatke
                                        </a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Space for content -->
            <div class="scroll height-content section-content">
                <form method="POST" class="text-gray-700 forma" action="{{ route('authors.update', $author) }}">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-row ml-[30px]">
                        <div class="w-[50%] mb-[150px]">

                            <div class="mt-[20px]">
                                <p>Ime <span class="text-red-500">*</span></p>
                                <input type="text" name="imeAutorEdit" id="imeAutorEdit" value="{{ $author->name }}" class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" onkeydown="clearErrorsImeAutorEdit()"/>
                                <div id="validateImeAutorEdit"></div>
                                @error('imeAutorEdit') <div class="text-red-500 text-xs mt-1"><sup>*</sup>{{ $message }}</div> @enderror
                            </div>

                            <div class="mt-[20px]">
                                <p>Prezime <span class="text-red-500">*</span></p>
                                <input type="text" name="prezimeAutorEdit" id="prezimeAutorEdit" value="{{ $author->surname }}" class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" onkeydown="clearErrorsPrezimeAutorEdit()"/>
                                <div id="validatePrezimeAutorEdit"></div>
                                @error('prezimeAutorEdit') <div class="text-red-500 text-xs mt-1"><sup>*</sup>{{ $message }}</div> @enderror
                            </div>

                            <div class="mt-[20px]">
                                <p class="inline-block mb-2">Opis</p>
                                <textarea name="opis_autor_edit"
                                    class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]">{{ $author->biography }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="absolute bottom-0 w-full">
                        <div class="flex flex-row">
                            <div class="inline-block w-full text-white text-right py-[7px] mr-[100px]">
                                <a href="{{ route('authors.index') }}">
                                    <button type="button"
                                            class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                        Poništi <i class="fas fa-times ml-[4px]"></i>
                                    </button>
                                </a>
                                <button id="sacuvajAutoraEdit" type="submit"
                                    class="btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]" onclick="validacijaAutorEdit(event)">
                                    Sačuvaj <i class="fas fa-check ml-[4px]"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- End Content -->
    </main>
    <!-- End Main content -->
</x-layout>
