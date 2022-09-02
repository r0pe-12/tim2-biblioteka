<x-layout>
    @section('title')
        Detalji o transakciji: Izdavanje
    @endsection
        @if($borrow->isActive())
            <!-- WriteOff Book Modal -->
            <div class="modal fadeM" id="otpisiKnjiguModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="post" action="{{ route('otpisi.store', $borrow->book) }}">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Da li zelite otpisati knjigu: </h5>
                                <h5 class="modal-title">
                                    <ul class="modalLabel">
                                        <b>{{ $borrow->book->title }}</b> za ucenika <b>{{ $borrow->student->name }} {{ $borrow->student->surname }}</b>
                                    </ul>
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="text-red-800">
                                    Ova akcija je nepovratna.
                                </p>
                            </div>
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="toWriteoff[]" value="{{ $borrow->id }}">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Otkazi</button>
                                <button type="submit" class="sure btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] text-white" style="background: red">
                                    Potvrdi <i class="fas fa-check ml-[4px]"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

             <!-- Return Book Modal -->
            <div class="modal fadeM" id="vratiKnjiguModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="post" action="{{ route('vrati.store', $borrow->book) }}">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Da li zelite vratiti knjigu: </h5>
                                <h5 class="modal-title">
                                    <ul class="modalLabel">
                                        <b>{{ $borrow->book->title }}</b> za ucenika <b>{{ $borrow->student->name }} {{ $borrow->student->surname }}</b>
                                    </ul>
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="text-red-800">
                                    Ova akcija je nepovratna.
                                </p>
                            </div>
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="toReturn[]" value="{{ $borrow->id }}">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Otkazi</button>
                                <button type="submit" class="sure btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] text-white" style="background: red">
                                    Potvrdi <i class="fas fa-check ml-[4px]"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <!-- Delete Borrow Modal -->
            <div class="modal fadeM" id="obrisiZapisModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="post" action="{{ route('izdate.destroy', $borrow) }}">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Da li izbrisati zapis knjige: </h5>
                                <h5 class="modal-title">
                                    <ul class="modalLabel">
                                        <b>{{ $borrow->book->title }}</b> za ucenika <b>{{ $borrow->student->name }} {{ $borrow->student->surname }}</b>
                                    </ul>
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="text-red-800">
                                    Ova akcija je nepovratna.
                                </p>
                            </div>
                            @csrf
                            @method('DELETE')
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Otkazi</button>
                                <button type="submit" class="sure btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] text-white" style="background: red">
                                    Potvrdi <i class="fas fa-check ml-[4px]"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        @endif

        <section class="w-screen h-screen pl-[80px] pb-2 text-gray-700">
            <!-- Heading of content -->
            <x-book-header :book="$book" :borrow="$borrow->id"/>


            <div class="flex-row height-detaljiIzdavanje scroll pb-[20px]">
                <div class="">
                    <!-- Space for content -->
                    <div class="pl-[30px] section- mt-[20px]">
                        <div class="flex-row justify-between">
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
                                        class="inline-block
                                        @if($borrow->status()->id == \App\Models\BookStatus::BORROWED || $borrow->status()->id == \App\Models\BookStatus::RESERVED)
                                            bg-green-200 text-green-800
                                        @elseif($borrow->status()->id == \App\Models\BookStatus::RETURNED)
                                            bg-blue-200 text-blue-800
                                        @else()
                                            bg-red-200 text-red-800
                                        @endif
                                        rounded-[10px] text-center px-[6px] py-[2px]">
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
                                <div class="mt-[40px] mb-[30px]">
                                    <span class="text-gray-500">Prekoracenje</span>
                                    <p class="font-medium"><x-date-diff :zapis="$borrow" :failed="true"/></p>
                                </div>
                                <div class="row">
                                    <div class="mt-[40px] col-sm-3">
                                        <span class="text-gray-500">Bibliotekar: izdao</span>
                                        <a href="{{ route('librarians.show', $borrow->librarian->username) }}"
                                           class="block font-medium text-[#2196f3] hover:text-blue-600">{{ $borrow->librarian->name }} {{ $borrow->librarian->surname }}</a>
                                    </div>
                                    @if($borrow->librarian1)
                                        <div class="mt-[40px] col-sm-3">
                                            <span class="text-gray-500">Bibliotekar: vratio/otpisao</span>
                                            <a href="{{ route('librarians.show', $borrow->librarian1->username) }}"
                                               class="block font-medium text-[#2196f3] hover:text-blue-600">{{ $borrow->librarian1->name }} {{ $borrow->librarian1->surname }}</a>
                                        </div>
                                    @endif
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
                        @if($borrow->isActive())
                            <button type="submit" data-toggle="modal" data-target="#otpisiKnjiguModal" tabindex="0"
                                    class="btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#FF470E] bg-[#FF5722]">
                                <i class="fas fa-level-up-alt mr-[4px] "></i> Otpisi knjigu
                            </button>
                            <button type="submit" data-toggle="modal" data-target="#vratiKnjiguModal" tabindex="0"
                                    class="ml-[10px] btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]">
                                <i class="fas fa-redo-alt mr-[4px] "></i> Vrati knjigu
                            </button>
                        @else
                            <button type="button" data-toggle="modal" data-target="#obrisiZapisModal" tabindex="0"
                                    class="ml-[10px] btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                <i class="fas fa-trash mr-[4px]"></i> Izbrisi zapis
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </section>
</x-layout>
