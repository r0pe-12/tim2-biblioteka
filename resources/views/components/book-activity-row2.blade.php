@props([
    /** @var \mixed */
    'zapis'
])
@switch($zapis->status_id)
    @case(1)
        <div {{ $attributes->class(['flex flex-row mb-[30px]']) }}>
            <div class="w-[60px] h-[60px]">
                <img class="rounded-full" src="{{$zapis->librarian->photoPath}}" alt="">
            </div>
            <div class="ml-[15px] mt-[5px] flex flex-col">
                <div class="text-gray-500 mb-[5px]">
                    <p class="uppercase">
                        Otvorena : {{ $zapis->status }}
                        <span class="inline lowercase">
                                                        - {{ str_replace(['pre', 'nedelju', 'mesec', '1 sekundu', 'prije Danas'], ['prije', 'nedelja', 'mjesec', 'Danas', 'Danas'], \App\Models\Carbon::parse(date('Y-m-d', strtotime($zapis->datum)))->diffForHumans(today('Europe/Belgrade'), null, false, 3)) }}
                                                </span>
                    </p>
                </div>
                <div class="">
                    <p>
                        <a href="{{ route('librarians.show', $zapis->librarian->username) }}"
                           class="text-[#2196f3] hover:text-blue-600">
                            {{$zapis->librarian->name}} {{$zapis->librarian->surname}}
                        </a>
                        je prihvatio/la zahtjev za rezervaciju knjige
                        <span class="font-bold"><a href="{{ route('books.show', $zapis->book) }}">{{$zapis->book->title}}</a></span>
                        učenika
                        <a href="{{route('students.show', $zapis->student->username)}}"
                           class="text-[#2196f3] hover:text-blue-600">
                            {{$zapis->student->name}} {{$zapis->student->surname}}
                        </a>
                        dana
                        <span class="font-bold">{{ \Carbon\Carbon::parse($zapis->datum)->format('d.m.Y') }}</span>
                        <a href="{{ route('book.rezervisane.show', [$zapis->book, $zapis]) }}" class="text-[#2196f3] hover:text-blue-600">
                            pogledaj detaljnije >>
                        </a>
                    </p>
                </div>
            </div>
        </div>
        @break
    @case(2)
        <div {{ $attributes->class(['flex flex-row mb-[30px]']) }}>
            <div class="w-[60px] h-[60px]">
                <img class="rounded-full" src="{{$zapis->student->photoPath}}" alt="">
            </div>
            <div class="ml-[15px] mt-[5px] flex flex-col">
                <div class="text-gray-500 mb-[5px]">
                    <p class="uppercase">
                        {{ $zapis->cReason }} : {{ $zapis->status }}
                        <span class="inline lowercase">
                                                        - {{ str_replace(['pre', 'nedelju', 'mesec', '1 sekundu', 'prije Danas'], ['prije', 'nedelja', 'mjesec', 'Danas', 'Danas'], \App\Models\Carbon::parse(date('Y-m-d', strtotime($zapis->datum)))->diffForHumans(today('Europe/Belgrade'), null, false, 3)) }}
                                                </span>
                    </p>
                </div>
                <div class="">
                    <p>
                        <a href="{{ route('students.show', $zapis->student->username) }}"
                           class="text-[#2196f3] hover:text-blue-600">
                            {{$zapis->student->name}} {{$zapis->student->surname}}
                        </a>
                        je poslao/la zahtjev za rezervaciju knjige
                        <span class="font-bold"><a href="{{ route('books.show', $zapis->book) }}">{{$zapis->book->title}}</a></span>
                        dana
                        <span class="font-bold">{{ \Carbon\Carbon::parse($zapis->datum)->format('d.m.Y') }}</span>
                        <a href="{{ route('book.rezervisane.show', [$zapis->book, $zapis]) }}" class="text-[#2196f3] hover:text-blue-600">
                            pogledaj detaljnije >>
                        </a>
                    </p>
                </div>
            </div>
        </div>
        @break
    @case(3)
        <div {{ $attributes->class(['flex flex-row mb-[30px]']) }}>
            <div class="w-[60px] h-[60px]">
                <img class="rounded-full" src="{{$zapis->librarian1->photoPath}}" alt="">
            </div>
            <div class="ml-[15px] mt-[5px] flex flex-col">
                <div class="text-gray-500 mb-[5px]">
                    <p class="uppercase">
                        {{ $zapis->cReason }} : {{ $zapis->status }}
                        <span class="inline lowercase">
                                                        - {{ str_replace(['pre', 'nedelju', 'mesec', '1 sekundu', 'prije Danas'], ['prije', 'nedelja', 'mjesec', 'Danas', 'Danas'], \App\Models\Carbon::parse(date('Y-m-d', strtotime($zapis->datum)))->diffForHumans(today('Europe/Belgrade'), null, false, 3)) }}
                                                </span>
                    </p>
                </div>
                <div class="">
                    <p>
                        <a href="{{ route('librarians.show', $zapis->librarian1->username) }}"
                           class="text-[#2196f3] hover:text-blue-600">
                            {{$zapis->librarian1->name}} {{$zapis->librarian1->surname}}
                        </a>
                        je odbio/la zahtjev za rezervaciju knjige
                        <span class="font-bold"><a href="{{ route('books.show', $zapis->book) }}">{{$zapis->book->title}}</a></span>
                        učenika
                        <a href="{{route('students.show', $zapis->student->username)}}"
                           class="text-[#2196f3] hover:text-blue-600">
                            {{$zapis->student->name}} {{$zapis->student->surname}}
                        </a>
                        dana
                        <span class="font-bold">{{ \Carbon\Carbon::parse($zapis->datum)->format('d.m.Y') }}</span>
                        <a href="{{ route('book.rezervisane.show', [$zapis->book, $zapis]) }}" class="text-[#2196f3] hover:text-blue-600">
                            pogledaj detaljnije >>
                        </a>
                    </p>
                </div>
            </div>
        </div>
        @break
    @case(4)
        @if($zapis->closingReason_id == 1)
            <div {{ $attributes->class(['flex flex-row mb-[30px]']) }}>
                <div class="w-[60px] h-[60px]">
                    <img class="rounded-full" src="{{$zapis->librarian->photoPath}}" alt="">
                </div>
                <div class="ml-[15px] mt-[5px] flex flex-col">
                    <div class="text-gray-500 mb-[5px]">
                        <p class="uppercase">
                            Zatvorena : {{ $zapis->cReason }}
                            <span class="inline lowercase">
                                                            - {{ str_replace(['pre', 'nedelju', 'mesec', '1 sekundu', 'prije Danas'], ['prije', 'nedelja', 'mjesec', 'Danas', 'Danas'], \App\Models\Carbon::parse(date('Y-m-d', strtotime($zapis->datum)))->diffForHumans(today('Europe/Belgrade'), null, false, 3)) }}
                                                    </span>
                        </p>
                    </div>
                    <div class="">
                        <p>
                            Rezervacija knjige
                            <span class="font-bold"><a href="{{ route('books.show', $zapis->book) }}">{{$zapis->book->title}}</a></span>
                            za
                            ucenika
                            <a href="{{route('students.show', $zapis->student->username)}}"
                               class="text-[#2196f3] hover:text-blue-600">
                                {{$zapis->student->name}} {{$zapis->student->surname}}
                            </a>
                            je istekla
                            dana
                            <span class="font-bold">{{ \Carbon\Carbon::parse($zapis->datum)->format('d.m.Y') }}</span>
                            <a href="{{ route('book.rezervisane.show', [$zapis->book, $zapis]) }}" class="text-[#2196f3] hover:text-blue-600">
                                pogledaj detaljnije >>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        @else
            <div {{ $attributes->class(['flex flex-row mb-[30px]']) }}>
                <div class="w-[60px] h-[60px]">
                    <img class="rounded-full" src="{{$zapis->librarian1->photoPath}}" alt="">
                </div>
                <div class="ml-[15px] mt-[5px] flex flex-col">
                    <div class="text-gray-500 mb-[5px]">
                        <p class="uppercase">
                            Zatvorena : {{ $zapis->cReason }}
                            <span class="inline lowercase">
                                                            - {{ str_replace(['pre', 'nedelju', 'mesec', '1 sekundu', 'prije Danas'], ['prije', 'nedelja', 'mjesec', 'Danas', 'Danas'], \App\Models\Carbon::parse(date('Y-m-d', strtotime($zapis->datum)))->diffForHumans(today('Europe/Belgrade'), null, false, 3)) }}
                                                    </span>
                        </p>
                    </div>
                    <div class="">
                        <p>
                            <a href="{{ route('librarians.show', $zapis->librarian1->username) }}"
                               class="text-[#2196f3] hover:text-blue-600">
                                {{$zapis->librarian1->name}} {{$zapis->librarian1->surname}}
                            </a>
                            je zatvorio/la rezervaciju knjige
                            <span class="font-bold"><a href="{{ route('books.show', $zapis->book) }}">{{$zapis->book->title}}</a></span>
                            ucenika
                            <a href="{{route('students.show', $zapis->student->username)}}"
                               class="text-[#2196f3] hover:text-blue-600">
                                {{$zapis->student->name}} {{$zapis->student->surname}}
                            </a>
                            dana
                            <span class="font-bold">{{ \Carbon\Carbon::parse($zapis->datum)->format('d.m.Y') }}</span>
                            <a href="{{ route('book.rezervisane.show', [$zapis->book, $zapis]) }}" class="text-[#2196f3] hover:text-blue-600">
                                pogledaj detaljnije >>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        @endif
        @break


@endswitch
