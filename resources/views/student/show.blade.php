<x-layout>
    @section('title')
        Profil: {{$student->username}}
    @endsection
        <!-- Content -->
        <section class="w-screen h-screen pl-[80px] pb-4 text-gray-700">
            <!-- Heading of content -->
        <x-student-header :student="$student"/>
            <div class="py-4 text-gray-500 border-[#e4dfdf] pl-[30px]">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-link active"  href="{{ route('students.show', $student->username) }}" aria-selected="true">Osnovni detalji</a>
                        <a class="nav-link"  href="{{ route('ucenik.izdate', $student->username) }}" aria-selected="false">Evidencija iznajmljivanja</a>
                    </div>
                </nav>
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
            <div id="pwResetModal" class="w-[500px] bg-white rounded shadow-lg md:w-1/3">
                <!-- Modal Header -->
                <div class="flex items-center justify-between px-[30px] py-[20px] border-b">
                    <h3>Resetuj sifru: {{$student->name}} {{$student->surname}}</h3>
                    <button class="text-black close-modal" onclick="$('#pwResetModal input').each(function() {this.value = ''})">&cross;</button>
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
                            @error('pwResetUcenik') <div class="flash text-red-500 text-xs mt-1"><sup>*</sup>{{ $message }}</div> @enderror
                        </div>
                        <div class="flex flex-col pb-[30px]">
                            <span>Ponovi sifru <span class="text-red-500">*</span></span>
                            <input class="h-[40px] px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" type="password" name="pw2ResetUcenik" id="pw2ResetUcenik" onkeydown="clearErrorsPw2ResetUcenik()">
                            <div id="validatePw2ResetUcenik"></div>
                        </div>
                    </div>
                    <div class="flex items-center justify-end px-[30px] py-[20px] border-t w-100 text-white">
                        <button type="button" onclick="$('#pwResetModal input').each(function() {this.value = ''})"
                                class="close-modal shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
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
