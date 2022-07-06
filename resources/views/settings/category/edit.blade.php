<x-layout>

    @section('title')
        Izmijeni kategoriju
    @endsection

        <!-- Content -->
        <section class="w-screen h-screen pl-[80px] pb-4 text-gray-700">
            <!-- Heading of content -->
            <x-settings-header/>
            
            <!-- Space for content -->
            <div class="scroll height-content section-content">
                <form method="POST" class="text-gray-700 forma" action="{{ route('category.update', $category) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="flex flex-row ml-[30px]">
                        <div class="w-[50%] mb-[100px]">
                            <div class="mt-[20px]">
                                <p>Naziv kategorije <span class="text-red-500">*</span></p>
                                <input type="text" name="nazivKategorijeEdit" id="nazivKategorijeEdit" value="{{ $category->name }}"
                                    class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                                    onkeydown="clearErrorsNazivKategorijeEdit()" />
                                <div id="validateNazivKategorijeEdit"></div>
                                @error('nazivKategorijaEdit') <div class="text-red-500 text-xs mt-1"><sup>*</sup>{{ $message }}</div> @enderror
                            </div>

                            <div class="mt-[20px]">
                                <p>Uploaduj ikonicu </p>
                                <div id="empty-cover-art-ikonica"
                                    class="flex w-[90%] mt-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]">
                                    <div class="bg-gray-300 h-[40px] w-[102px] px-[20px] pt-[10px]">
                                        <label class="cursor-pointer">
                                            <p class="leading-normal">Browse...</p>
                                            <input id="icon-upload" name="iconPath" type='file' class="hidden" :multiple="multiple"
                                                :accept="accept" />
                                        </label>
                                    </div>
                                    <div id="icon-output" class="h-[40px] px-[20px] pt-[7px]">{{ $category->getAttributes()['iconPath'] }}</div>
                                    @error('iconPath') <div class="text-red-500 text-xs mt-1"><sup>*</sup>{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="mt-[20px]">
                                <p class="inline-block">Opis</p>
                                <textarea name="opisKategorijeEdit" rows="10"
                                    class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]">{{ $category->description }}</textarea>
                                    @error('opisKategorijeEdit') <div class="text-red-500 text-xs mt-1"><sup>*</sup>{{ $message }}</div> @enderror
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
                                <button id="sacuvajKategorijuEdit" type="submit"
                                    class="btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]"
                                    onclick="validacijaKategorijaEdit()">
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