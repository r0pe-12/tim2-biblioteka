<x-layout>

    @section('title')
        Izmijeni povez
    @endsection

        <!-- Content -->
        <section class="w-screen h-screen pl-[80px] pb-4 text-gray-700">
            <!-- Heading of content -->

            <x-settings-header/>
            
            <!-- Space for content -->
            <div class="scroll height-content section-content">
                <form method="POST" class="text-gray-700 forma" action="{{ route('bookbind.update', $bookbind) }}">
                    @method('PUT')
                    @csrf
                    <div class="flex flex-row ml-[30px]">
                        <div class="w-[50%] mb-[150px]">
                            <div class="mt-[20px]">
                                <p>Naziv poveza <span class="text-red-500">*</span></p>
                                <input type="text" name="nazivPovezEdit" id="nazivPovezEdit" value="{{ $bookbind->name }}" class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" onkeydown="clearErrorsNazivPovezEdit()"/>
                                <div id="validateNazivPovezEdit"></div>
                                @error('nazivPovezEdit') <div class="text-red-500 text-sm mt-1"><sup>*</sup>{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="absolute bottom-0 w-full">
                        <div class="flex flex-row">
                            <div class="inline-block w-full text-white text-right py-[7px] mr-[100px]">
                                <button type="button"
                                    class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                    Poništi <i class="fas fa-times ml-[4px]"></i>
                                </button>
                                <button id="sacuvajPovezEdit" type="submit"
                                    class="btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]" onclick="validacijaPovezEdit()">
                                    Sačuvaj <i class="fas fa-check ml-[4px]"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- End Content -->
    </x-layout>