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
                                    <span class="text-gray-500">Status transakcije</span><br>
                                    <p
                                        class="inline-block bg-blue-200 text-blue-800 rounded-[10px] text-center px-[6px] py-[2px]">
                                        {{ $borrow->statuses()->latest()->first()->name }}
                                    </p>
                                </div>
                                <div class="mt-[40px]">
                                    <span class="text-gray-500">Datum akcije</span>
                                    <p class="font-medium">{{ \Carbon\Carbon::parse($borrow->borrow_date)->format('d.m.Y') }}</p>
                                </div>
                                <div class="mt-[40px]">
                                    <span class="text-gray-500">Ukupno zadrzavanje knjige</span>
                                    <p class="font-medium"><x-date-diff :zapis="$borrow"/></p>
                                </div>
                                <div class="mt-[40px]">
                                    <span class="text-gray-500">Prekoracenje</span>
                                    <p class="font-medium"><x-date-diff :zapis="$borrow" :failed="true"/></p>
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
        <!-- Modal - Vrati Knjigu -->
        <div
            class="fixed top-0 left-0 flex items-center justify-center hidden w-full h-screen bg-black bg-opacity-50 vrati-modal">
            <!-- Modal -->
            <div class="w-[500px] bg-white rounded shadow-lg md:w-1/3">
                <!-- Modal Header -->
                <div class="flex items-center justify-between px-[30px] py-[20px] border-b">
                    <h3>Da li zelite da vratite knjigu "{{ $borrow->book->title }}" za ucenika "{{ $borrow->student->name }} {{ $borrow->student->surname }}"?</h3>
                </div>
                <!-- Modal Body -->
                <form method="post" action="{{ route('vrati.store', $book) }}" enctype="multipart/form-data">
                    <input type="hidden" name="toReturn[]" value="{{ $borrow->id }}">
                    @csrf
                    @method('PUT')
                    <div class="flex items-center justify-end px-[30px] py-[20px] border-t w-100 text-white">
                        <button type="button"
                                class="close-modal shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                            Ponisti <i class="fas fa-times ml-[4px]"></i>
                        </button>
                        <button type="submit"
                                class="shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]"">
                        Potvrdi <i class="fas fa-check ml-[4px]"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal - Otpisi Knjigu -->
        <div
            class="fixed top-0 left-0 flex items-center justify-center hidden w-full h-screen bg-black bg-opacity-50 otpisi-modal">
            <!-- Modal -->
            <div class="w-[500px] bg-white rounded shadow-lg md:w-1/3">
                <!-- Modal Header -->
                <div class="flex items-center justify-between px-[30px] py-[20px] border-b">
                    <h3>Da li zelite da otpisete knjigu "{{ $book->title }}" za ucenika "{{ $borrow->student->name }} {{ $borrow->student->surname }}"?</h3>
                </div>
                <!-- Modal Body -->
                <form method="post" action="{{ route('otpisi.store', $book) }}" enctype="multipart/form-data">
                    <input type="hidden" name="toWriteoff[]" value="{{ $borrow->id }}">
                    @csrf
                    @method('PUT')
                    <div class="flex items-center justify-end px-[30px] py-[20px] border-t w-100 text-white">
                        <button type="button"
                                class="close-modal shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                            Ponisti <i class="fas fa-times ml-[4px]"></i>
                        </button>
                        <button type="submit"
                                class="shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]"">
                        Potvrdi <i class="fas fa-check ml-[4px]"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal - Izbrisi Zapis -->
        <div
            class="fixed top-0 left-0 flex items-center justify-center hidden w-full h-screen bg-black bg-opacity-50 izbrisi-modal">
            <!-- Modal -->
            <div class="w-[500px] bg-white rounded shadow-lg md:w-1/3">
                <!-- Modal Header -->
                <div class="flex items-center justify-between px-[30px] py-[20px] border-b">
                    <h3>Da li zelite da izbrisete zapis knjige "Tom Sojer" za ucenika "Milos Milosevic?"</h3>
                </div>
                <!-- Modal Body -->
                <div class="flex items-center justify-end px-[30px] py-[20px] border-t w-100 text-white">
                    <button type="button"
                            class="close-modal shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                        Ponisti <i class="fas fa-times ml-[4px]"></i>
                    </button>
                    <button type="submit"
                            class="shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]"">
                    Potvrdi <i class="fas fa-check ml-[4px]"></i>
                    </button>
                </div>
            </div>
        </div>


</x-layout>
