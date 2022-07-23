<x-layout>
    @section('title')
        Novi izdavač
    @endsection
        <!-- Content -->
        <section class="w-screen h-screen pl-[80px] pb-4 text-gray-700">
            <!-- Heading of content -->
            <x-settings-header/>

            <!-- Space for content -->
            <div class="scroll height-content section-content">
                <form method="POST" class="text-gray-700" action="{{ route('publisher.store') }}">
                    @csrf
                    <div class="flex flex-row ml-[30px]">
                        <div class="w-[50%] mb-[150px]">
                            <div class="mt-[20px]">
                                <p>Naziv izdavača<span class="text-red-500">*</span></p>
                                <input type="text" name="nazivIzdavac" id="nazivIzdavac" class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" onkeydown="clearErrorsNazivIzdavac()"/>
                                <div id="validateNazivIzdavac"></div>
                                @error('nazivIzdavac') <div class="text-red-500 text-xs mt-1"><sup>*</sup>{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="absolute bottom-0 w-full">
                        <div class="flex flex-row">
                            <div class="inline-block w-full text-white text-right py-[7px] mr-[100px]">
                                <a href="{{ route('publisher.index') }}">
                                    <button type="button"
                                            class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                        Poništi<i class="fas fa-times ml-[4px]"></i>
                                    </button>
                                </a>
                                <button id="sacuvajIzdavac" type="submit"
                                    class="btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]" onclick="validacijaIzdavac()">
                                    Sačuvaj<i class="fas fa-check ml-[4px]"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- End Content -->
</x-layout>
