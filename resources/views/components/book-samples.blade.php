@props([
    'book',
    'available' => $book->samples - $book->borrowedSaples
])

<div {{ $attributes->class(['ml-[30px] mr-[70px] mt-[20px] flex flex-row justify-between']) }}>
    <div class="text-gray-500 ">
        <p>Na raspolaganju:</p>
        <p class="mt-[20px]">Rezervisano:</p>
        <p class="mt-[20px]">Izdato:</p>
        <p class="mt-[20px]">U prekoracenju:</p>
        <p class="mt-[20px]">Ukupna kolicina:</p>
    </div>
    <div class="text-center pb-[30px]">
        <p class=" bg-green-200 text-green-700 rounded-[10px] px-[6px] py-[2px] text-[14px]">
            {{ $available }} {{ $available%10 == 0 ? 'primjeraka' : ($available%10 == 1 ? 'primjerak' : ($available%10 > 1 && $available%10 < 5 ? 'primjerka' : 'primjeraka')) }}
        </p>
        <a href="iznajmljivanjeAktivne.php">
            <p
                    class=" mt-[16px] bg-yellow-200 text-yellow-700 rounded-[10px] px-[6px] py-[2px] text-[14px]">
                {{ $book->reservedSamples }} {{ $book->reservedSamples%10 == 0 ? 'primjeraka' : ($book->reservedSamples%10 == 1 ? 'primjerak' : ($book->reservedSamples%10 > 1 && $book->reservedSamples%10 < 5 ? 'primjerka' : 'primjeraka')) }}
            </p>
        </a>
        <a href="{{ route('izdate1', $book) }}">
            <p
                    class=" mt-[16px] bg-blue-200 text-blue-800 rounded-[10px] px-[6px] py-[2px] text-[14px]">
                {{ $book->borrowedSaples }} {{ $book->borrowedSaples%10 == 0 ? 'primjeraka' : ($book->borrowedSaples%10 == 1 ? 'primjerak' : ($book->borrowedSaples%10 > 1 && $book->borrowedSaples%10 < 5 ? 'primjerka' : 'primjeraka')) }}
            </p>
        </a>
        <a href="{{ route('prekoracene1', $book) }}">
            <p
                    class=" mt-[16px] bg-red-200 text-red-800 rounded-[10px] px-[6px] py-[2px] text-[14px]">
                {{ count($book->failed()) }} {{ count($book->failed())%10 == 0 ? 'primjeraka' : (count($book->failed())%10 == 1 ? 'primjerak' : (count($book->failed())%10 > 1 && count($book->failed())%10 < 5 ? 'primjerka' : 'primjeraka')) }}
            </p>
        </a>
        <p
                class=" mt-[16px] border-[1px] border-green-700 text-green-700 rounded-[10px] px-[6px] py-[2px] text-[14px]">
            {{ $book->samples }} {{ $book->samples%10 == 0 ? 'primjeraka' : ($book->samples%10 == 1 ? 'primjerak' : ($book->samples%10 > 1 && $book->samples%10 < 5 ? 'primjerka' : 'primjeraka')) }}
        </p>
    </div>
</div>
