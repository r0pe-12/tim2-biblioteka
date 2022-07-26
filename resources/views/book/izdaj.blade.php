<x-layout>
    @section('title')
        Izdaj knjigu: {{ $book->title }}
    @endsection
    @section('scripts')
            <script>
                window.onload = function () {
                    funkcijaDatumVracanja();
                }
            </script>
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

            <!-- Space for content -->
            <div  class="scroll height-content section-content">
                <form class="text-gray-700 forma" action="{{ route('izdaj.store', $book) }}" method="POST">
                    @csrf
                    <div class="flex flex-row ml-[30px]">
                        <div class="w-[50%] mb-[100px] mr-[100px]">
                            <h3 class="mt-[20px] mb-[10px]">Izdaj knjigu</h3>
                            <div class="mt-[20px]">
                                <p class="mb-2">Izaberi učenika koji zadužuje knjigu <span class="text-red-500">*</span></p>
                                <select
                                    class="select2 flex w-[90%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                                    name="ucenik" id="ucenikIzdavanje" onchange="clearErrorsUcenikIzdavanje()">
                                    <option disabled selected></option>
                                    @foreach($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->name }} {{ $student->surname }}</option>
                                    @endforeach
                                </select>
                                <div id="validateUcenikIzdavanje"></div>
                                @error('ucenik') <div class="flash text-red-500 text-xs mt-1"><sup>*</sup>{{ $message }}</div> @enderror
                            </div>
                            <div class="mt-[20px] flex justify-between w-[90%]">
                                <div class="w-[50%]">
                                    <p>Datum izdavanja <span class="text-red-500">*</span></p>
                                    <label class="text-gray-700" for="date">
                                        {!! Form::date('datumIzdavanja', now('Europe/Belgrade'),
                                            ['class'=>'flex w-[90%] mt-2 px-4 py-2 text-base placeholder-gray-400 bg-white border border-gray-300 appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]',
                                            'min'=>now('Europe/Belgrade')->format('Y-m-d'),
                                            'id' => 'datumIzdavanja',
                                            'onclick' => 'clearErrorsDatumIzdavanja()',
                                            'onchange' => 'funkcijaDatumVracanja()',
                                            ]) !!}
                                    </label>
                                    <div id="validateDatumIzdavanja"></div>
                                    @error('datumIzdavanja') <div class="flash text-red-500 text-xs mt-1"><sup>*</sup>{{ $message }}</div> @enderror
                                </div>
                                <div class="w-[50%]">
                                    <p>Datum vraćanja</p>
                                    <label class="text-gray-700" for="date">
                                        {!! Form::date('datumVracanja', null,
                                            ['class'=>'flex w-[90%] mt-2 px-4 py-2 text-base placeholder-gray-400 bg-white border border-gray-300 appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]',
                                            'id' => 'datumVracanja',
                                            'readonly'
                                            ]) !!}
                                    <a class="edit" href="{{ route('policy.index') }}" target="_blank">
                                        <div>
                                            <p class="w-[90%]">Rok vraćanja u danima: {{ $return->value }} <i class="fa fa-edit" style="float: right; padding-top: 3px"></i></p>
                                            <input type="hidden" id="return_deadline" value="{{ $return->value }}">
                                        </div>
                                    </a>
                                    </label>
                                    @error('datumVracanja') <div class="flash text-red-500 text-xs mt-1"><sup>*</sup>{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="w-[50%] mb-[100px]">
                            <div class="border-[1px] border-[#e4dfdf] w-[360px] mt-[75px]">
                                <h2 class="mt-[20px] ml-[30px]">KOLIČINE</h2>
                                <x-book-samples :available="$available" :book="$book"/>
                            </div>
                        </div>
                    </div>

                    <div class="absolute bottom-0 w-full">
                        <div class="flex flex-row">
                            <div class="inline-block w-full text-right py-[7px] mr-[100px] text-white">
                                <a href="{{ route('books.show', $book) }}">
                                    <button type="button"
                                            class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                        Poništi <i class="fas fa-times ml-[4px]"></i>
                                    </button>
                                </a>
                                <button id="izdajKnjigu" type="submit"
                                        class="btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]"
                                        onclick="validacijaIzdavanje(event)">
                                    Izdaj knjigu <i class="fas fa-check ml-[4px]"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>

</x-layout>
