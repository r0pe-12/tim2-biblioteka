<x-layout>
    @section('title')
        Rezerviši knjigu: {{ $book->title }}
    @endsection
    @section('styles')
        <style>
            a.edit:hover{
                color: #4558be;
            }
        </style>
    @endsection
    <section class="w-screen h-screen pl-[80px] pb-2 text-gray-700">
        <!-- Heading of content -->
        <x-book-header :book="$book"/>

        <div class="scroll height-content section-content">
            <form class="text-gray-700 forma" method="post" action="{{ route('reserve.store', $book) }}">
                @csrf
                <div class="flex flex-row ml-[30px]">
                    <div class="w-[50%] mb-[100px]">
                        <h3 class="mt-[20px] mb-[10px]">Rezerviši knjigu</h3>
                        <div class="mt-[20px]">
                            <p class="mb-2">Izaberi učenika za koga se knjiga rezerviše <span class="text-red-500">*</span></p>
                            <select
                                class="select2 flex w-[90%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                                name="ucenik" id="ucenikRezervisanje" onchange="clearErrorsUcenikRezervisanje()">
                                <option disabled selected></option>
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->name }} {{ $student->surname }}</option>
                                @endforeach
                            </select>
                            <div id="validateUcenikRezervisanje"></div>
                            @error('ucenik') <div class="flash text-red-500 text-xs mt-1"><sup>*</sup>{{ $message }}</div> @enderror
                        </div>
                        <div class="mt-[20px]">
                            <p>Datum rezervisanja <span class="text-red-500">*</span></p>
                            <label class="text-gray-700" for="date">
                                {!! Form::date('datumRezervisanja', now('Europe/Belgrade'),
                                    ['class'=>'flex w-[50%] mt-2 px-4 py-2 text-base placeholder-gray-400 bg-white border border-gray-300 appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]',
                                    'min'=>now('Europe/Belgrade')->subDays(3)->format('Y-m-d'),
                                    'max'=>now('Europe/Belgrade')->addDays(3)->format('Y-m-d'),
                                    'id' => 'datumRezervisanja',
                                    'onclick' => 'clearErrorsDatumRezervisanja())',
                                    ]) !!}
                            </label>
                            <div id="validateDatumRezervisanja"></div>
                            @error('datumIzdavanja') <div class="flash text-red-500 text-xs mt-1"><sup>*</sup>{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="w-[50%] mb-[100px]">
                        <div class="border-[1px] border-[#e4dfdf] w-[360px] mt-[75px]">
                            <h2 class="mt-[20px] ml-[30px]">KOLIČINE</h2>
                            <x-book-samples :book="$book"/>
                        </div>
                    </div>
                </div>

                <div class="absolute bottom-0 w-full bg-white">
                    <div class="flex flex-row">
                        <div class="inline-block w-full text-right py-[7px] mr-[100px] text-white">
                            <button type="button" class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                Poništi <i class="fas fa-times ml-[4px]"></i>
                            </button>
                            <button id="rezervisiKnjigu" type="submit" class="btn-animation shadow-lg disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]" onclick="validacijaRezervisanje(event)">
                                Rezerviši knjigu <i class="fas fa-check ml-[4px]"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- Space for content -->
    </section>

</x-layout>
