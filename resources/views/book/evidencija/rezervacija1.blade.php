<x-layout>
    @section('title')
        Detalji o transakciji: Rezervacija
    @endsection
    @if($reservation->isActive())
        <!-- Cancel Book Reservation Modal -->
        <div class="modal fadeM" id="otkaziRezModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" action="{{ route('rezervacija.otkazi', $reservation) }}">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Da li želite otkazati rezervaciju knjige: </h5>
                            <h5 class="modal-title">
                                <ul class="modalLabel">
                                    <b>{{ $reservation->book->title }}</b> za ucčenika <b>{{ $reservation->student->name }} {{ $reservation->student->surname }}</b>
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
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Otkaži</button>
                            <button type="submit" class="sure btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] text-white" style="background: red">
                                Potvrdi <i class="fas fa-check ml-[4px]"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @else
            <!-- Delete Reservation Modal -->
            <div class="modal fadeM" id="obrisiZapisModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="post" action="{{ route('rezervisane.destroy', $reservation) }}">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Da li želite izbrisati zapis rezervacije: </h5>
                                <h5 class="modal-title">
                                    <ul class="modalLabel">
                                        <b>{{ $reservation->book->title }}</b> za učenika <b>{{ $reservation->student->name }} {{ $reservation->student->surname }}</b>
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
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Otkaži</button>
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
        <x-book-header :book="$book" :reservation="$reservation->id"/>


        <div class="flex flex-row height-detaljiIzdavanje scroll pb-[20px]">
            <div class="">
                <!-- Space for content -->
                <div class="pl-[30px] section- mt-[20px]">
                    <div class="flex flex-row justify-between">
                        <div class="mr-[30px]">
                            <div class="mt-[20px]">
                                <span class="text-gray-500">Tip transakcije</span><br>
                                <p
                                    class="inline-block bg-yellow-200 text-blue-800 rounded-[10px] text-center px-[6px] py-[2px]">
                                    Rezervacija knjiga
                                </p>
                            </div>
                            <div class="mt-[40px]">
                                <span class="text-gray-500">Status transakcije</span><br>
                                <p
                                    class="inline-block
                                    @if($reservation->status()->id == \App\Models\ReservationStatus::RESERVED)
                                        bg-yellow-200 text-yellow-700
                                    @elseif($reservation->status()->id == \App\Models\ReservationStatus::CLOSED)
                                        bg-red-200 text-red-800
                                    @else
                                        bg-blue-200 text-blue-800
                                    @endif
                                    rounded-[10px] text-center px-[6px] py-[2px]">
                                    {{ $reservation->statuses()->latest()->first()->name }}
                                </p>
                            </div>
                            <div class="mt-[40px]">
                                <span class="text-gray-500">Razlog zatvaranja</span><br>
                                <p
                                    class="inline-block
                                    @if($reservation->closingReason->id == \App\Models\ClosingReason::BOOK_BORROWED)
                                        bg-green-200 text-green-800
                                    @elseif($reservation->closingReason->id == \App\Models\ClosingReason::OPEN)
                                        bg-blue-200 text-blue-800
                                    @else
                                        bg-red-200 text-red-800
                                    @endif
                                    rounded-[10px] text-center px-[6px] py-[2px]">
                                    {{ $reservation->closingReason->name }}
                                </p>
                            </div>
                            <div class="mt-[40px]">
                                <span class="text-gray-500">Datum akcije</span>
                                <p class="font-medium">{{ \Carbon\Carbon::parse($reservation->submttingDate)->format('d.m.Y') }}</p>
                            </div>
                            @if($reservation->isActive())
                                <div class="mt-[40px]">
                                    <span class="text-gray-500">Rezervacija ističe</span>
                                    <p class="font-medium">{{ \Carbon\Carbon::parse($reservation->submttingDate)->addDays($res_deadline->value)->format('d.m.Y') }}</p>
                                </div>
                            @else
                                <div class="mt-[40px]">
                                    <span class="text-gray-500">Rezervacija zatvorena</span>
                                    <p class="font-medium">{{ \Carbon\Carbon::parse($reservation->closingDate)->format('d.m.Y') }}</p>
                                </div>
                            @endif
                            <div class="mt-[40px]">
                                <span class="text-gray-500">Bibliotekar</span>
                                <a href="{{ route('librarians.show', $reservation->librarian->username) }}"
                                   class="block font-medium text-[#2196f3] hover:text-blue-600">{{ $reservation->librarian->name }} {{ $reservation->librarian->surname }}</a>
                            </div>
                            <div class="mt-[40px]">
                                <span class="text-gray-500">Učenik</span>
                                <a href="{{ route('students.show', $reservation->student->username) }}"
                                   class="block font-medium text-[#2196f3] hover:text-blue-600">{{ $reservation->student->name }} {{ $reservation->student->surname }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="absolute bottom-0 w-full">
            <div class="flex flex-row">
                <div class="inline-block w-full text-white text-right py-[7px] mr-[100px]">
                    @if($reservation->isActive())
                        <button href="#" data-toggle="modal" data-target="#otkaziRezModal" tabindex="0"
                                class="btn-animation shadow-lg disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#FF470E] bg-[#FF5722]">
                            <i class="fas fa-undo mr-[4px] "></i> Otkaži rezervaciju
                        </button>
                        <button type="submit" onclick="window.location.href = '{{ route('book.izdaj.create',[$reservation->book, 'ucenik' => $reservation->student->id]) }}'"
                                class="ml-[10px] btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]">
                            <i class="fas fa-hand-scissors mr-[4px] "></i> Izdaj knjigu
                        </button>
                    @else
                        <button type="button" data-toggle="modal" data-target="#obrisiZapisModal" tabindex="0"
                                class="ml-[10px] btn-animation show-izbrisiModal shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                            <i class="fas fa-trash mr-[4px]"></i> Izbriši zapis
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </section>
</x-layout>
