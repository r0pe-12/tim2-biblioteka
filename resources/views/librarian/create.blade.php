<x-layout>
    @section('title')
        Novi bibliotekar
    @endsection
        <!-- Content -->
        <section class="w-screen h-screen pl-[80px] pb-4 text-gray-700">
            <!-- Heading of content -->
            <div class="heading">
                <div class="flex border-b-[1px] border-[#e4dfdf]">
                    <div class="pl-[30px] py-[10px] flex flex-col">
                        <div>
                            <h1>
                                Novi bibliotekar
                            </h1>
                        </div>
                        <div>
                            <nav class="w-full rounded">
                                <ol class="flex list-reset">
                                    <li>
                                        <a href="{{ route('librarians.index') }}" class="text-[#2196f3] hover:text-blue-600">
                                            Svi bibliotekari
                                        </a>
                                    </li>
                                    <li>
                                        <span class="mx-2">/</span>
                                    </li>
                                    <li>
                                        <a href="#" class="text-gray-400 hover:text-blue-600">
                                            Novi bibliotekar
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
                <form method="POST" class="text-gray-700 text-[14px] forma" action="{{ route('librarians.store') }}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
{{--                    todo cudne stvari se odje desavaju naime: koristim prepare for validation funkciju jer su ova polja na srpskom a u bazi na end...., kad hocu greske da izbacim koristim ovo sto prodje validaciju, a kad hocu old() onda moram ovo na srpki da kucam--}}
{{--                    todo da li moramo imati ovu js validaciju na cliend side ako da onda se treba nekako staviti da to radi kako treba da ne submituje formu preko te validacije a ako ne treba onda mozemo ovaj .js sto su nam dali da zajebemo skroz al onda se javlja problem jer njihov templejt koristi taj js === NE ZNAM STA DA RADIM--}}
                    <div class="flex flex-row ml-[30px]">
                        <div class="w-[50%] mb-[100px]">
                            <div class="mt-[20px]">
                                <span>Ime<span class="text-red-500">*</span></span>
                                <input type="text" value="{{ old('imeBibliotekar') }}" name="imeBibliotekar" id="imeBibliotekar" class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" onkeydown="clearErrorsNameBibliotekar()"/>
                                <div id="validateNameBibliotekar"></div>
                                @error('name') <div class="text-red-500 text-xs mt-1"><sup>*</sup>{{ $message }}</div> @enderror
                            </div>

                            <div class="mt-[20px]">
                                <span>Prezime <span class="text-red-500">*</span></span>
                                <input type="text" value="{{ old('prezimeBibliotekar') }}" name="prezimeBibliotekar" id="prezimeBibliotekar" class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" onkeydown="clearErrorsSurnameBibliotekar()"/>
                                <div id="validateSurnameBibliotekar"></div>
                                @error('surname') <div class="text-red-500 text-xs mt-1"><sup>*</sup>{{ $message }}</div> @enderror
                            </div>

                            <div class="mt-[20px]">
                                <span>Tip korisnika</span>
                                <select class="flex w-[90%] mt-2 px-2 py-2 border bg-gray-300 border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]" name="tip_korisnika" disabled id="tip_korisnika">
                                    <option value="">
                                        Bibliotekar
                                    </option>
                                </select>
                            </div>

                            <div class="mt-[20px]">
                                <span>JMBG <span class="text-red-500">*</span></span>
                                <input type="text" name="jmbgBibliotekar" id="jmbgBibliotekar" class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" onkeydown="clearErrorsJmbgBibliotekar()"/>
                                <div id="validateJmbgBibliotekar"></div>
                                @error('JBMG') <div class="text-red-500 text-xs mt-1"><sup>*</sup>{{ $message }}</div> @enderror
                            </div>

                            <div class="mt-[20px]">
                                <span>E-mail <span class="text-red-500">*</span></span>
                                <input type="email" value="{{ old('emailBibliotekar') }}" name="emailBibliotekar" id="emailBibliotekar" class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" onkeydown="clearErrorsEmailBibliotekar()"/>
                                <div id="validateEmailBibliotekar"></div>
                                @error('email') <div class="text-red-500 text-xs mt-1"><sup>*</sup>{{ $message }}</div> @enderror
                            </div>

                            <div class="mt-[20px]">
                                <span>Korisničko ime <span class="text-red-500">*</span></span>
                                <input type="text" value="{{ old('usernameBibliotekar') }}" name="usernameBibliotekar" id="usernameBibliotekar" class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" onkeydown="clearErrorsUsernameBibliotekar()"/>
                                <div id="validateUsernameBibliotekar"></div>
                                @error('username') <div class="text-red-500 text-xs mt-1"><sup>*</sup>{{ $message }}</div> @enderror
                            </div>

                            <div class="mt-[20px]">
                                <span>Šifra <span class="text-red-500">*</span></span>
                                <input type="password" name="pwBibliotekar" id="pwBibliotekar" class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" onkeydown="clearErrorsPwBibliotekar()"/>
                                <div id="validatePwBibliotekar"></div>
                                @error('password') <div class="text-red-500 text-xs mt-1"><sup>*</sup>{{ $message }}</div> @enderror
                            </div>

                            <div class="mt-[20px]">
                                <span>Ponovi šifru <span class="text-red-500">*</span></span>
                                <input type="password" name="pw2Bibliotekar" id="pw2Bibliotekar" class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" onkeydown="clearErrorsPw2Bibliotekar()"/>
                                <div id="validatePw2Bibliotekar"></div>
                            </div>
                        </div>

                        <div class="mt-[50px]">
                            <label class="mt-6 cursor-pointer">
                                <div id="empty-cover-art" class="relative w-48 h-48 py-[48px] text-center border-2 border-gray-300 border-solid">
                                    <div class="py-4">
                                        <svg class="mx-auto feather feather-image mb-[15px]" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                            <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                            <polyline points="21 15 16 10 5 21"></polyline>
                                        </svg>
                                        <span class="px-4 py-2 mt-2 leading-normal">Add photo</span>
                                        <input type='file' class="hidden" :accept="accept" onchange="loadFileLibrarian(event)" name="photoPath" />
                                    </div>
                                    <img id="image-output-librarian" class="hidden absolute w-48 h-[188px] bottom-0" />
                                </div>
                            </label>
                            @error('photoPath') <div class="text-red-500 text-xs mt-1"><sup>*</sup>{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="absolute bottom-0 w-full">
                        <div class="flex flex-row">
                            <div class="inline-block w-full text-right py-[7px] mr-[100px] text-white">
                                <button type="button"
                                        class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                            Poništi <i class="fas fa-times ml-[4px]"></i>
                                </button>
                                <button id="sacuvajBibliotekara" type="submit"
                                        class="btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]" onclick="validacijaBibliotekar()">
                                            Sačuvaj <i class="fas fa-check ml-[4px]"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </section>
        <!-- End Content -->
</x-layout>>
