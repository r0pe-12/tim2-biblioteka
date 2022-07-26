<x-layout>
    @section('title')
        Detalji o transakciji:
    @endsection
        <section class="w-screen h-screen pl-[80px] pb-2 text-gray-700">
            <!-- Heading of content -->
            <x-book-header :book="$book" :borrow="$borrow->id"/>


            <div class="flex flex-row height-detaljiIzdavanje scroll pb-[20px]">
                <div class="">
                    <!-- Space for content -->
                    <div class="pl-[30px] section- mt-[20px]">
                        <div class="flex flex-row justify-between">
                            <div class="mr-[30px]">
                                <div class="mt-[20px]">
                                    <span class="text-gray-500">Tip transakcije</span><br>
                                    <p
                                        class="inline-block bg-blue-200 text-blue-800 rounded-[10px] text-center px-[6px] py-[2px]">
                                        Izdavanje knjiga
                                    </p>
                                </div>
                                <div class="mt-[40px]">
                                    <span class="text-gray-500">Datum akcije</span>
                                    <p class="font-medium">{{ \Carbon\Carbon::parse($borrow->borrow_date)->format('d.m.Y') }}</p>
                                </div>
                                <div class="mt-[40px]">
                                    <span class="text-gray-500">Trenutno zadrzavanje knjige</span>
                                    <p class="font-medium">{{ $borrow->hold(1) }}</p> <!-- todo -->
                                </div>
                                <div class="mt-[40px]">
                                    <span class="text-gray-500">Prekoracenje</span>
                                    <p class="font-medium">Nema prekoracenja</p> <!-- todo -->
                                </div>
                                <div class="mt-[40px]">
                                    <span class="text-gray-500">Bibliotekar</span>
                                    <a href="{{ route('librarians.show', $borrow->librarian->username) }}"
                                       class="block font-medium text-[#2196f3] hover:text-blue-600">{{ $borrow->librarian->name }} {{ $borrow->librarian->surname }}</a>
                                </div>
                                <div class="mt-[40px]">
                                    <span class="text-gray-500">Ucenik</span>
                                    <a href="{{ route('students.show', $borrow->student->username) }}"
                                       class="block font-medium text-[#2196f3] hover:text-blue-600">{{ $borrow->student->name }} {{ $borrow->student->surname }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="absolute bottom-0 w-full">
                <div class="flex flex-row">
                    <div class="inline-block w-full text-white text-right py-[7px] mr-[100px]">
                        <button type="submit"
                                class="btn-animation show-otpisiModal shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#FF470E] bg-[#FF5722]">
                            <i class="fas fa-level-up-alt mr-[4px] "></i> Otpisi knjigu
                        </button>
                        <button type="submit"
                                class="ml-[10px] btn-animation show-vratiModal shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]">
                            <i class="fas fa-redo-alt mr-[4px] "></i> Vrati knjigu
                        </button>
                        <button type="button"
                                class="ml-[10px] btn-animation show-izbrisiModal shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                            <i class="fas fa-trash mr-[4px]"></i> Izbrisi zapis
                        </button>
                    </div>
                </div>
            </div>
        </section>

</x-layout>
