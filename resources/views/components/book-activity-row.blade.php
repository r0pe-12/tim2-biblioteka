@props([
    /** @var \mixed */
    'zapis'
])

<div {{ $attributes->class(['flex flex-row mb-[30px]']) }}>
    <div class="flex w-[60px] h-[60px] items-center">
        <img class="rounded-full" src="{{$zapis->librarian->photoPath}}" alt="">
    </div>
    <div class="ml-[15px] mt-[5px] flex flex-col">
        <div class="text-gray-500 mb-[5px]">
            <p class="uppercase">
                <b>Knjiga {{ $zapis->name }}</b>
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
                je
                @switch($zapis->bookStatus_id)
                    @case(1)
                        izdao/la na osnovu rezervacije knjigu <span class="font-bold"><a
                                    href="{{ route('books.show', $zapis->book) }}">{{$zapis->book->title}}</a></span>
                        uceniku
                        @break
                    @case(2)
                        izdao/la knjigu <span class="font-bold"><a
                                    href="{{ route('books.show', $zapis->book) }}">{{$zapis->book->title}}</a></span>
                        uceniku
                        @break
                    @case(3||4)
                        preuzeo/la knjigu <span class="font-bold"><a
                                    href="{{ route('books.show', $zapis->book) }}">{{$zapis->book->title}}</a></span> od
                        ucenika
                        @break
                    @case(5)
                        otpisao/la knjigu <span class="font-bold"><a
                                    href="{{ route('books.show', $zapis->book) }}">{{$zapis->book->title}}</a></span>
                        ucenika
                        @break
                @endswitch
                <a href="{{route('students.show', $zapis->student->username)}}"
                   class="text-[#2196f3] hover:text-blue-600">
                    {{$zapis->student->name}} {{$zapis->student->surname}}
                </a>
                dana <span
                        class="font-bold">{{ \Carbon\Carbon::parse($zapis->datum)->format('d.m.Y') }}</span>
                <a href="{{ route('book.izdate.show', [$zapis->book, $zapis->id] ) }}"
                   class="text-[#2196f3] hover:text-blue-600">
                    pogledaj detaljnije >>
                </a>
            </p>
        </div>
    </div>
</div>
