<x-layout>
    @section('title')
        Edit : {{ $librarian->username }}
    @endsection
        <!-- Content -->
        <section class="w-screen h-screen pl-[80px] pb-4 text-gray-700">
            <!-- Heading of content -->
            <div class="heading">
                <div class="flex border-b-[1px] border-[#e4dfdf]">
                    <div class="pl-[30px] py-[10px] flex flex-col">
                        <div>
                            <h1 class="">
                                Izmijeni podatke
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
                                        <a href="{{ route('librarians.show', $librarian->username) }}" class="text-[#2196f3] hover:text-blue-600">
                                            {{ $librarian->username }}
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
                <form id="form" method="POST" class="text-gray-700 text-[14px] forma" action="{{ route('librarians.update', $librarian) }}" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="{{ $librarian->id }}">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-row ml-[30px]">
                        <div class="w-[50%] mb-[100px]">
                            <div class="mt-[20px]">
                                <span>Ime <span class="text-red-500">*</span></span>
                                <input type="text" name="firstname" id="imeBibliotekarEdit" value="{{ $librarian->name }}" class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" onkeydown="clearErrorsNameBibliotekarEdit()"/>
                                <div id="validateNameBibliotekarEdit"></div>
                                @error('name') <div class="flash text-red-500 text-xs mt-1"><sup>*</sup>{{ $message }}</div> @enderror
                            </div>
                            <div class="mt-[20px]">
                                <span>Prezime <span class="text-red-500">*</span></span>
                                <input type="text" name="lastname" id="prezimeBibliotekarEdit" value="{{ $librarian->surname }}" class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" onkeydown="clearErrorsSurnameBibliotekarEdit()"/>
                                <div id="validateSurnameBibliotekarEdit"></div>
                                @error('surname') <div class="flash text-red-500 text-xs mt-1"><sup>*</sup>{{ $message }}</div> @enderror
                            </div>

                            <div class="mt-[20px]">
                                <span>Tip korisnika</span>
                                <select class="flex w-[90%] mt-2 px-2 py-2 border bg-gray-300 border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]" name="tip_korisnika" disabled>
                                    <option value="">
                                        Bibliotekar
                                    </option>
                                </select>
                            </div>

                            <div class="mt-[20px]">
                                <span>JMBG <span class="text-red-500">*</span></span>
                                <input type="text" name="jmbgBibliotekarEdit" id="jmbgBibliotekarEdit" value="{{ $librarian->jmbg }}" class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" onkeydown="clearErrorsJmbgBibliotekarEdit()"/>
                                <div id="validateJmbgBibliotekarEdit"></div>
                                @error('jmbg') <div class="flash text-red-500 text-xs mt-1"><sup>*</sup>{{ $message }}</div> @enderror
                            </div>

                            <div class="mt-[20px]">
                                <span>E-mail <span class="text-red-500">*</span></span>
                                <input type="email" name="emailBibliotekarEdit" id="emailBibliotekarEdit" value="{{ $librarian->email }}" class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" onkeydown="clearErrorsEmailBibliotekarEdit()"/>
                                <div id="validateEmailBibliotekarEdit"></div>
                                @error('email') <div class="flash text-red-500 text-xs mt-1"><sup>*</sup>{{ $message }}</div> @enderror
                            </div>

                            <div class="mt-[20px]">
                                <span>Korisnicko ime <span class="text-red-500">*</span></span>
                                <input type="text" name="usernameBibliotekarEdit" id="usernameBibliotekarEdit" value="{{ $librarian->username }}" class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" onkeydown="clearErrorsUsernameBibliotekarEdit()"/>
                                <div id="validateUsernameBibliotekarEdit"></div>
                                @error('username') <div class="flash text-red-500 text-xs mt-1"><sup>*</sup>{{ $message }}</div> @enderror
                            </div>

                            <div class="mt-[20px]">
                                <span>Šifra <span class="text-red-500">*</span></span>
                                <input type="password" name="pwBibliotekarEdit" id="pwBibliotekarEdit" class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"/>
                                <div id="validatePwBibliotekarEdit"></div>
                                @error('password') <div class="flash text-red-500 text-xs mt-1"><sup>*</sup>{{ $message }}</div> @enderror
                            </div>

                            <div class="mt-[20px]">
                                <span>Ponovi šifru <span class="text-red-500">*</span></span>
                                <input type="password" name="pw2BibliotekarEdit" id="pw2BibliotekarEdit" class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"/>
                                <div id="validatePw2BibliotekarEdit"></div>
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
                                    <input onchange="cropperFunction(event)" id="upload-picture" value="" name="picture-raw" type="file" class="hidden" :accept="accept">
                                </div>
                                <img id="image-output" class="absolute w-48 h-[188px] bottom-0" src="{{ $librarian->photoPath }}">
                            </div>
                        </label>
                            @error('photoPath') <div class="flash text-red-500 text-xs mt-1"><sup>*</sup>{{ $message }}</div> @enderror
                        </div>
                    </div>




                    <div class="absolute bottom-0 w-full">
                        <div class="flex flex-row">
                            <div class="inline-block w-full text-right py-[7px] mr-[100px] text-white">
                                <a href="{{ route('librarians.show', $librarian->username) }}">
                                    <button type="button"
                                            class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                        Poništi <i class="fas fa-times ml-[4px]"></i>
                                    </button>
                                </a>
                                <button id="sacuvajBibliotekaraEdit" type="submit"
                                        class="btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]" onclick="validacijaBibliotekarEdit(event)">
                                            Sačuvaj <i class="fas fa-check ml-[4px]"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <style>
                        #cropper-wrapper {
                            width: 100vw;
                            height: 100vh;
                            position: absolute;
                            top: 0;
                            left: 0;
                            z-index: 99999;
                            background: rgba(0, 0, 0, 0.85);
                        }

                        #cropper-frame {
                            margin: 1.25rem auto;
                            position: absolute;
                            top: 55%;
                            left: 50%;
                            transform: translate(-50%, -50%);
                            padding: 1.25rem;

                        }

                        #cropper-image-frame {
                            max-width: 80vw;
                            max-height: 60vh;
                        }

                        #cropper-preview {
                            width: 100%;
                        }

                        #cropper-image-frame {
                            min-width: 25vw;
                            min-height: 25vh;
                        }

                        #cropper-action-btns {
                            margin-top: 1.25rem;
                        }
                    </style>
                    <div id="cropper-wrapper" style="display: none;">
                        <div id="cropper-frame" class="bg-white shadow-lg">
                            <div id="cropper-image-frame">
                                <img src="{{ asset('img/login.jpg') }}" alt="" id="cropper-preview">
                            </div>

                            <div id="cropper-action-btns" class="mx-2">
                                <button id="cropper-cancle-btn" type="button" class="text-white btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                            <i class="fas fa-times ml-[4px]"></i>
                                </button>
                                <button id="cropper-crop-btn" type="button" onclick="" class="text-white btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]">
                                            <i class="fas fa-check ml-[4px]"></i>
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
