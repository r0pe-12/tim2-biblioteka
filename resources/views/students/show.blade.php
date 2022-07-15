<x-layout>
    @section('title')
        Profil: {{$student->username}}
    @endsection
        <!-- Content -->
        <section class="w-screen h-screen pl-[80px] pb-4 text-gray-700">
            <!-- Heading of content -->
            <div class="heading">
                <div class="flex flex-row justify-between border-b-[1px] border-[#e4dfdf]">
                    <div class="pl-[30px] py-[10px] flex flex-col">
                        <div>
                            <h1>
                                {{$student->name}}
                            </h1>
                        </div>
                        <div>
                            <nav class="w-full rounded">
                                <ol class="flex list-reset">
                                    <li>
                                        <a href="{{route('students.index')}}" class="text-[#2196f3] hover:text-blue-600">
                                            Svi ucenici
                                        </a>
                                    </li>
                                    <li>
                                        <span class="mx-2">/</span>
                                    </li>
                                    <li>
                                        <a href="{{route('students.show', $student->username)}}" class="text-[#2196f3] hover:text-blue-600">
                                            {{$student->username}}
                                        </a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="pt-[24px] pr-[30px]">
                        <a href="#" class="inline hover:text-blue-600 show-modal">
                            <i class="fas fa-redo-alt mr-[3px]"></i>
                            Resetuj sifru
                        </a>
                        <a href="{{route('students.edit',$student->username)}}" class="hover:text-blue-600 inline ml-[20px] pr-[10px]">
                            <i class="fas fa-edit mr-[3px] "></i>
                            Izmjeni podatke
                        </a>
                        <p class="inline cursor-pointer text-[25px] py-[10px] pl-[30px] border-l-[1px] border-gray-300 dotsStudentProfile hover:text-[#606FC7]">
                            <i
                                class="fas fa-ellipsis-v"></i>
                        <div
                            class="z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-student-profile">
                            <div class="absolute right-0 w-56 mt-[10px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                 aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                                <div class="py-1">
                                    <form method="POST" action="{{ route('students.destroy', $student) }}" enctype="multipart/form-data" tabindex="0"
                                          class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                          role="menuitem">
                                        @csrf
                                        @method('DELETE')
                                        <i class="fa fa-trash mr-[5px] ml-[5px] py-1"></i>
                                        <button type="submit"><span class="px-4 py-0">Izbriši Korisnika</span></button>
                                    </form>
                                    </a>
                                </div>
                            </div>
                        </div>
                        </p>

                    </div>
                </div>
            </div>
            <div class="border-b-[1px] py-4 text-gray-500 border-[#e4dfdf] pl-[30px]">
                <a href="#" class="inline active-book-nav">
                    Osnovni detalji
                </a>
                <a href="ucenikIzdate.php" class="inline ml-[70px] hover:text-blue-800">
                    Evidencija iznajmljivanja
                </a>
            </div>
            <div class="height-ucenikProfile pb-[30px] scroll">
                <!-- Space for content -->
                    <x-flash-msg/>
                <div class="pl-[30px] section- mt-[20px]">
                    <div class="flex flex-row">
                        <div class="mr-[30px]">
                            <div class="mt-[20px]">
                                <span class="text-gray-500">Ime </span>
                                <p class="font-medium">{{$student->name}}</p>
                            </div>
                            <div class="mt-[40px]">
                                <span class="text-gray-500">Prezime</span>
                                <p class="font-medium">{{ $student->surname }}</p>
                            </div>
                            <div class="mt-[40px]">
                                <span class="text-gray-500">Tip korisnika</span>
                                <p class="font-medium">{{$student->role->name}}</p>
                            </div>
                            <div class="mt-[40px]">
                                <span class="text-gray-500">JMBG</span>
                                <p class="font-medium">{{$student->jmbg}}</p>
                            </div>
                            <div class="mt-[40px]">
                                <span class="text-gray-500">Email</span>
                                <a href="mailto:{{$student->email}}" class="block font-medium text-[#2196f3]">{{$student->email}}</a>
                            </div>
                            <div class="mt-[40px]">
                                <span class="text-gray-500">Korisnicko ime</span>
                                <p class="font-medium">{{$student->username}}</p>
                            </div>
                            <div class="mt-[40px]">
                                <span class="text-gray-500">Broj logovanja</span>
                                <p class="font-medium">{{count($student->logins)}}</p>
                            </div>
                            <div class="mt-[40px]">
                                <span class="text-gray-500">Poslednji put logovan/a</span>
                                <p class="font-medium">{{$student->lastLogin()}}</p>
                            </div>

                        </div>
                        <div class="ml-[100px]  mt-[20px]">
                            <img class="p-2 border-2 border-gray-300" width="300px" src="{{$student->photoPath}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Content -->
        </main>
        <!-- End Main content -->

        <!-- This code will show up when we press reset password -->
        <div
            class="fixed top-0 left-0 flex items-center justify-center hidden w-full h-screen bg-black bg-opacity-50 modal">
            <!-- Modal -->
            <div class="w-[500px] bg-white rounded shadow-lg md:w-1/3">
                <!-- Modal Header -->
                <div class="flex items-center justify-between px-[30px] py-[20px] border-b">
                    <h3>Resetuj sifru: {{$student->name}} {{$student->surname}}</h3>
                    <button class="text-black close-modal">&cross;</button>
                </div>
                <!-- Modal Body -->
                <form method="POST" class="forma" action="{{ route('student.pwreset', $student) }}">
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="flex flex-col px-[30px] py-[30px]">
                        <div class="flex flex-col pb-[30px]">
                            <span>Unesi novu sifru <span class="text-red-500">*</span></span>
                            <input class="h-[40px] px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" type="password" name="pwResetUcenik" id="pwResetUcenik" onkeydown="clearErrorsPwResetUcenik()">
                            <div id="validatePwResetUcenik"></div>
                            @error('pwResetUcenik') <div class="text-red-500 text-xs mt-1"><sup>*</sup>{{ $message }}</div> @enderror
                        </div>
                        <div class="flex flex-col pb-[30px]">
                            <span>Ponovi sifru <span class="text-red-500">*</span></span>
                            <input class="h-[40px] px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" type="password" name="pw2ResetUcenik" id="pw2ResetUcenik" onkeydown="clearErrorsPw2ResetUcenik()">
                            <div id="validatePw2ResetUcenik"></div>
                        </div>
                    </div>
                    <div class="flex items-center justify-end px-[30px] py-[20px] border-t w-100 text-white">
                        <button type="button"
                                class="shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                            Ponisti <i class="fas fa-times ml-[4px]"></i>
                        </button>
                        <button id="resetujSifruUcenik" type="submit"
                                class="shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]"
                                onclick="validacijaSifraUcenik()">
                            Sacuvaj <i class="fas fa-check ml-[4px]"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
</x-layout>
