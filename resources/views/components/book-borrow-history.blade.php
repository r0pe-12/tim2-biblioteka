@props([
    /** @var \App\Models\Book */
    'book'
])

<div {{ $attributes->class(['min-w-[20%] border-l-[1px] border-[#e4dfdf] ']) }}>
    <div class="border-b-[1px] border-[#e4dfdf]">
        <x-book-samples :book="$book"/>
    </div>
    <div class="mt-[40px] mx-[30px]">
        @if($book->borrows()->count() > 0)
            @foreach($book->borrows()->latest()->take(3)->get() as $zapis)
                <div class="mt-[40px] flex flex-col max-w-[304px]">
                    <div class="text-gray-500 ">
                        <p class="inline uppercase">
                            Izdavanja knjige
                        </p>
                        <span>
                            -  {{ str_replace(['pre', 'nedelju', 'mesec', '1 sekundu'], ['', 'nedelja', 'mjesec', 'Danas'], \App\Models\Carbon::parse($zapis->borrow_date)->diffForHumans(today('Europe/Belgrade'), null, false, 3)) }}
                        </span>
                    </div>
                    <div>
                        <p>
                            <a href="{{ route('librarians.show', $zapis->librarian->username) }}"
                               class="text-[#2196f3] hover:text-blue-600">
                                {{ $zapis->librarian->name }} {{ $zapis->librarian->surname }}
                            </a>
                            je izdao/la knjigu
                            <a href="{{ route('students.show', $zapis->student->username) }}"
                               class="text-[#2196f3] hover:text-blue-600">
                                {{ $zapis->student->name }} {{ $zapis->student->surname }}
                            </a>
                            dana
                            <span class="font-medium">
                                                {{ \Carbon\Carbon::parse($zapis->borrow_date)->format('d.m.Y') }}
                            </span>
                        </p>
                    </div>
                    <div>
                        <a href="{{ route('izdate.show', [$zapis->book, $zapis]) }}"
                           class="text-[#2196f3] hover:text-blue-600">
                            pogledaj detaljnije >>
                        </a>
                    </div>
                </div>
            @endforeach

            <div class="mt-[40px]">
                <a href="#" class="text-[#2196f3] hover:text-blue-600">
                    <i class="fas fa-history"></i> Prikazi sve
                </a>
            </div>
        @else
        Nema zapisa
        @endif
    </div>
</div>
