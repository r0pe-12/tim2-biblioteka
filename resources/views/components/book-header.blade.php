@props([
    /** @var \App\Models\Book */
    'book',
    'borrow' => 0,
    'reservation' => 0
])

@section('scripts')
    <script>
        // star rating
        // total number of stars
        const starTotal = 5;

        var stars = $('.book-rating .stars-inner').attr('star-rating');

        const starPercentage = (stars / starTotal) * 100;
        const starPercentageRounded = `${((starPercentage / 10) * 10)}%`;
        document.querySelector(`.stars-inner`).style.width = starPercentageRounded;
    </script>
@endsection


<!-- Delete One Book Modal -->
<div class="modal fadeM" id="deleteOneModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Da li želite obrisati knjigu: </h5>
                    <h5 class="modal-title modalLabel"></h5>
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

<div {{ $attributes->class(['heading']) }}>
    <div class="flex flex-row justify-between border-b-[1px] border-[#e4dfdf]">
        <div class="py-[10px] flex flex-row items-center">
            <div class="w-[77px] pl-[30px]">
                <img src="{{ $book->cover() }}" alt="">
            </div>
            <div class="pl-[15px]  flex flex-col">
                <div>
                    <h1>
                        {{ $book->title }}
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
                                <a href="{{ route('books.show', $book) }}"
                                   class="text-[#2196f3] hover:text-blue-600">
                                    KNJIGA-{{ $book->id }}
                                </a>
                            </li>
                            @if(request()->routeIs('book.izdaj.create'))
                                <li>
                                    <span class="mx-2">/</span>
                                </li>
                                <li>
                                    <a href="#"
                                       class="text-[#2196f3] hover:text-blue-600">
                                        Izdaj knjigu
                                    </a>
                                </li>
                            @endif
                            @if(request()->routeIs('book.izdate.show'))
                                <li>
                                    <span class="mx-2">/</span>
                                </li>
                                <li>
                                    <a href="#"
                                       class="text-[#2196f3] hover:text-blue-600">
                                        IZDAVANJE-{{ $borrow }}
                                    </a>
                                </li>
                            @endif
                            @if(request()->routeIs('book.rezervisane.show'))
                                <li>
                                    <span class="mx-2">/</span>
                                </li>
                                <li>
                                    <a href="#"
                                       class="text-[#2196f3] hover:text-blue-600">
                                        REZERVACIJA-{{ $reservation }}
                                    </a>
                                </li>
                            @endif
                            @if(request()->routeIs('book.otpisi.create'))
                                <li>
                                    <span class="mx-2">/</span>
                                </li>
                                <li>
                                    <a href="#"
                                       class="text-[#2196f3] hover:text-blue-600">
                                        Otpiši knjigu
                                    </a>
                                </li>
                            @endif
                            @if(request()->routeIs('book.vrati.create'))
                                <li>
                                    <span class="mx-2">/</span>
                                </li>
                                <li>
                                    <a href="#"
                                       class="text-[#2196f3] hover:text-blue-600">
                                        Vrati knjigu
                                    </a>
                                </li>
                            @endif
                            @if(request()->routeIs('book.reserve.create'))
                                <li>
                                    <span class="mx-2">/</span>
                                </li>
                                <li>
                                    <a href="#"
                                       class="text-[#2196f3] hover:text-blue-600">
                                        Rezerviši knjigu
                                    </a>
                                </li>
                            @endif
                            @if(request()->routeIs('book.izdate1'))
                                <li>
                                    <span class="mx-2">/</span>
                                </li>
                                <li>
                                    <a href="{{ route('book.izdate1', $book) }}"
                                       class="text-[#2196f3] hover:text-blue-600">
                                        Izdate Knjige
                                    </a>
                                </li>
                            @endif
                            @if(request()->routeIs('book.vracene1'))
                                <li>
                                    <span class="mx-2">/</span>
                                </li>
                                <li>
                                    <a href="{{ route('book.vracene1', $book) }}"
                                       class="text-[#2196f3] hover:text-blue-600">
                                        Vraćene Knjige
                                    </a>
                                </li>
                            @endif
                            @if(request()->routeIs('book.otpisane'))
                                <li>
                                    <span class="mx-2">/</span>
                                </li>
                                <li>
                                    <a href="{{ route('book.vracene1', $book) }}"
                                       class="text-[#2196f3] hover:text-blue-600">
                                        Otpisane Knjige
                                    </a>
                                </li>
                            @endif
                            @if(request()->routeIs('book.prekoracene'))
                                <li>
                                    <span class="mx-2">/</span>
                                </li>
                                <li>
                                    <a href="{{ route('book.prekoracene', $book) }}"
                                       class="text-[#2196f3] hover:text-blue-600">
                                        Prekoračene Knjige
                                    </a>
                                </li>
                            @endif
                            @if(request()->routeIs('evidencija.aktivne-rezervacije1'))
                                <li>
                                    <span class="mx-2">/</span>
                                </li>
                                <li>
                                    <a href="{{ route('evidencija.aktivne-rezervacije1', $book) }}"
                                       class="text-[#2196f3] hover:text-blue-600">
                                        Aktivne Rezervacije
                                    </a>
                                </li>
                            @endif
                            @if(request()->routeIs('book.arhivirane-rezervacije1'))
                                <li>
                                    <span class="mx-2">/</span>
                                </li>
                                <li>
                                    <a href="{{ route('book.arhivirane-rezervacije1', $book) }}"
                                       class="text-[#2196f3] hover:text-blue-600">
                                        Arhivirane Rezervacije
                                    </a>
                                </li>
                            @endif
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div style="z-index: 999" class="pt-[24px] mr-[30px]">

            <!-- star rating -->
                <div class="stars-outer book-rating" title="{{ $book->reviews->count() > 0 ? round($book->reviews->sum('star') / $book->reviews->count(), 1) : 'Nema komentara' }}">
                    <div class="stars-inner" star-rating="{{ $book->reviews->count() > 0 ? round($book->reviews->sum('star') / $book->reviews->count(), 1) : 0 }}">
                    </div>
                </div>

            <a href="{{ route('book.otpisi.create', $book) }}" class="inline hover:text-blue-600 ml-[20px]">
                <i class="fas fa-level-up-alt mr-[3px]"></i>
                Otpiši knjigu
            </a>
            <a href="{{ route('book.izdaj.create', $book) }}" class="inline hover:text-blue-600 ml-[20px]">
                <i class="far fa-hand-scissors mr-[3px]"></i>
                Izdaj knjigu
            </a>
            <a href="{{ route('book.vrati.create', $book) }}" class="hover:text-blue-600 inline ml-[20px]">
                <i class="fas fa-redo-alt mr-[3px] "></i>
                Vrati knjigu
            </a>
            <a href="{{ route('book.reserve.create', $book) }}" class="hover:text-blue-600 inline ml-[20px] pr-[10px]">
                <i class="far fa-calendar-check mr-[3px] "></i>
                Rezerviši knjigu
            </a>
            <p class="inline cursor-pointer text-[25px] py-[10px] pl-[30px] border-l-[1px] border-[#e4dfdf] dotsKnjigaOsnovniDetalji hover:text-[#606FC7]">
                <i
                        class="fas fa-ellipsis-v"></i>
            </p>
            <div
                    class="z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-knjiga-osnovni-detalji">
                <div class="absolute right-0 w-56 mt-[7px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                     aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                    <div class="py-1">
                        <a href="{{ route('books.edit', $book) }}" tabindex="0"
                           class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                           role="menuitem">
                            <i class="fas fa-edit mr-[1px] ml-[5px] py-1"></i>
                            <span class="px-4 py-0">Izmijeni knjigu</span>
                        </a>
                        <a href="#"
                           class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600 deleteOne"
                           data-toggle="modal"
                           data-target="#deleteOneModal"
                           data-id="{{ $book->id }}"
                           data-name="{{ $book->title }}"
                           data-action="{{ route('books.destroy', $book) }}"
                        >
                            <i class="fa fa-trash mr-[1px] ml-[5px] py-1"></i>
                            <span class="px-4 py-0">Izbriši knjigu</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
