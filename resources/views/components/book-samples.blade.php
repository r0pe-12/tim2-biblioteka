@props([
    'available',
    'book'
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
            {{ $available }} {{ $available == 0 ? 'primjeraka' : ($available == 1 ? 'primjerak' : ($available > 1 && $available < 5 ? 'primjerka' : 'primjeraka')) }}
        </p>
        <a href="iznajmljivanjeAktivne.php">
            <p
                    class=" mt-[16px] bg-yellow-200 text-yellow-700 rounded-[10px] px-[6px] py-[2px] text-[14px]">
                {{ $book->reservedSamples }} {{ $book->reservedSamples == 0 ? 'primjeraka' : ($book->reservedSamples == 1 ? 'primjerak' : ($book->reservedSamples > 1 && $book->reservedSamples < 5 ? 'primjerka' : 'primjeraka')) }}
            </p>
        </a>
        <a href="iznajmljivanjeIzdate.php">
            <p
                    class=" mt-[16px] bg-blue-200 text-blue-800 rounded-[10px] px-[6px] py-[2px] text-[14px]">
                {{ $book->borrowedSaples }} {{ $book->borrowedSaples == 0 ? 'primjeraka' : ($book->borrowedSaples == 1 ? 'primjerak' : ($book->borrowedSaples > 1 && $book->borrowedSaples < 5 ? 'primjerka' : 'primjeraka')) }}
            </p>
        </a>
        <a href="iznajmljivanjePrekoracenje.php">
            <p
                    class=" mt-[16px] bg-red-200 text-red-800 rounded-[10px] px-[6px] py-[2px] text-[14px]">
                U PREKORACENjU
            </p>
        </a>
        <p
                class=" mt-[16px] border-[1px] border-green-700 text-green-700 rounded-[10px] px-[6px] py-[2px] text-[14px]">
            {{ $book->samples }} {{ $book->samples == 0 ? 'primjeraka' : ($book->samples == 1 ? 'primjerak' : ($book->samples > 1 && $book->samples < 5 ? 'primjerka' : 'primjeraka')) }}
        </p>
    </div>
</div>
