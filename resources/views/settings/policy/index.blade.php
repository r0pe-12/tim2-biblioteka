<x-layout>
    @section('title')
        Polisa
    @endsection
    @section('scripts')
            <script src="{{ asset('js/AutoSavePolicy.js') }}"></script>
    @endsection
        <!-- Content -->
        <section class="w-screen h-screen pl-[80px] py-4 text-gray-700">
            <!-- Heading of content -->
            <div class="heading mt-[7px]">
                <div class="border-b-[1px] border-[#e4dfdf]">
                    <div class="pl-[30px] pb-[21px]">
                        <h1>
                            Settings
                        </h1>
                    </div>
                </div>
            </div>
                <x-settings-nav/>
            <div class="height-ucenikProfile pb-[30px] scroll">
                <!-- Space for content -->
                    <x-flash-msg/>
                <div class="section- mt-[20px]">
                    <div class="flex flex-col">
                        <div class="pl-[30px] flex border-b-[1px] border-[#e4dfdf]  pb-[20px]">
                            <div>
                                <h3>
                                    Rok za rezervaciju
                                </h3>
                                <p class="pt-[15px] max-w-[400px]">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum eligendi nihil, vel
                                    necessitatibus saepe laboriosam! Perspiciatis laboriosam culpa veritatis ea
                                    voluptatum commodi tempora unde, dolorum debitis quia id dicta vitae.
                                </p>
                            </div>
                            <div class="relative flex ml-[60px] mt-[20px]">
                                <form id="rokRezervacijeForma" class="text-gray-700" action="/settings/policy/{{$reservation->id}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" id="id" value="{{ $reservation->id }}">
                                    <input name="value" id="rokRezervacije" type="text" value="{{ $reservation->value }}"
                                           onkeydown="return event.key != 'Enter';" class="h-[50px] flex-1 w-full px-4 py-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-[1px]  border-[#e4dfdf]  rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="...">
                                    <p style="color: green; visibility: hidden;" id="savedMessage1"><i class="fa fa-check  ml-[5px]"></i> Rok za rezervaciju je uspješno sačuvan</p>
                                </form>
                                <p class="ml-[10px] mt-[10px]">dana</p>
                            </div>
                        </div>
                        <div class="pl-[30px] flex border-b-[1px] border-[#e4dfdf]  py-[20px]">
                            <div>
                                <h3>
                                    Rok vraćanja
                                </h3>
                                <p class="pt-[15px] max-w-[400px]">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum eligendi nihil, vel
                                    necessitatibus saepe laboriosam! Perspiciatis laboriosam culpa veritatis ea
                                    voluptatum commodi tempora unde, dolorum debitis quia id dicta vitae.
                                </p>
                            </div>
                            <div class="relative flex ml-[60px] mt-[20px]">
                                <form id="rokVracanjaForma" class="text-gray-700" action="/settings/policy/{{ $return->id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" id="id" value="{{ $return->id }}">
                                    <input name="value" id="rokVracanja" type="text" value="{{ $return->value }}"
                                           onkeydown="return event.key != 'Enter';" class="h-[50px] flex-1 w-full px-4 py-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-[1px]  border-[#e4dfdf]  rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="...">
                                    <p style="color: green;visibility: hidden" id="savedMessage2"><i class="fa fa-check  ml-[5px]"></i> Rok vraćanja je uspješno sačuvan</p>
                                </form>
                                <p class="ml-[10px] mt-[10px]">dana</p>
                            </div>
                        </div>
                        <div class="pl-[30px] flex border-b-[1px] border-[#e4dfdf]  py-[20px]">
                            <div>
                                <h3>
                                    Rok konflikta
                                </h3>
                                <p class="pt-[15px] max-w-[400px]">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum eligendi nihil, vel
                                    necessitatibus saepe laboriosam! Perspiciatis laboriosam culpa veritatis ea
                                    voluptatum commodi tempora unde, dolorum debitis quia id dicta vitae.
                                </p>
                            </div>
                            <div class="relative flex ml-[60px] mt-[20px]">
                                <form id="rokKonfliktaForma" class="text-gray-700" action="/settings/policy/{{ $conflict->id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" id="id" value="{{ $conflict->id }}">
                                    <input name="value" id="rokKonflikta" type="text" value="{{ $conflict->value }}"
                                           onkeydown="return event.key != 'Enter';" class="h-[50px] flex-1 w-full px-4 py-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-[1px]  border-[#e4dfdf]  rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="...">
                                    <p style="color: green;visibility: hidden" id="savedMessage3"><i class="fa fa-check  ml-[5px]"></i> Rok konflikta je uspješno sačuvan</p>
                                </form>
                                <p class="ml-[10px] mt-[10px]">dana</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- End Content -->
</x-layout>
