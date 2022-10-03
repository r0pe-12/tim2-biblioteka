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
        <div class="height-ucenikProfile pb-[30px] scrolly">
            <!-- Space for content -->
            <x-flash-msg/>
            <div class="section- mt-[20px] row">
                <div class="flex flex-col col-xl-6">
                    <div class="pl-[30px] flex border-b-[1px] border-[#e4dfdf]  py-[20px]">
                        <div>
                            <h3>
                                Rok za rezervaciju
                            </h3>
                            <p class="pt-[15px] max-w-[400px]">
                                Učenik/korisnik može rezervisati svoju knjigu i preuzeti je u predviđenom roku. Ukoliko
                                rezervacija istekne, ista knjiga će se moći ponovo
                                rezervisati ukoliko je ima na raspoloživom stanju.
                            </p>
                        </div>
                        <div class="relative flex ml-[60px] mt-[20px]">
                            <form identifier="1" id="rokRezervacijeForma" class="policy w-[300px] text-gray-700"
                                  action="/settings/policy/{{$reservation->id}}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" class="id" value="{{ $reservation->id }}">
                                <input name="value" id="rokRezervacije" type="number" min="0"
                                       value="{{ $reservation->value }}"
                                       onkeydown="return event.key != 'Enter';"
                                       class="inputValue h-[50px] flex-1 w-full px-4 py-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-[1px]  border-[#e4dfdf]  rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                                       placeholder="...">
                                <p style="color: green;" hidden id="savedMessage1"><i class="fa fa-check  ml-[5px]"></i>
                                    Rok za rezervaciju je uspješno sačuvan</p>
                                <div id="errorDiv1">
                                    <p style="color: red;" hidden class="e1"><i class="fa fa-x  ml-[5px]"></i> Morate
                                        unijeti rok za rezervaciju</p>
                                    <p style="color: red;" hidden class="e2"><i class="fa fa-x  ml-[5px]"></i> Rok za
                                        rezervaciju je pogrešnog formata</p>
                                    <p style="color: red;" hidden class="e3"><i class="fa fa-x  ml-[5px]"></i> Rok za
                                        rezervaciju ne može biti negativan</p>
                                </div>
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
                                Vremenski period za vraćanje knjige, tokom ovog roka sva odgovornost za zadužene knjige
                                je na učeniku/korisniku.
                            </p>
                        </div>
                        <div class="relative flex ml-[60px] mt-[20px]">
                            <form identifier="2" id="rokVracanjaForma" class="policy w-[300px] text-gray-700"
                                  action="/settings/policy/{{ $return->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" class="id" value="{{ $return->id }}">
                                <input name="value" id="rokVracanja" type="number" min="0" value="{{ $return->value }}"
                                       onkeydown="return event.key != 'Enter';"
                                       class="inputValue h-[50px] flex-1 w-full px-4 py-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-[1px]  border-[#e4dfdf]  rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                                       placeholder="...">
                                <p style="color: green" hidden id="savedMessage2"><i class="fa fa-check  ml-[5px]"></i>
                                    Rok vraćanja je uspješno sačuvan</p>
                                <div id="errorDiv2">
                                    <p style="color: red;" hidden class="e1"><i class="fa fa-x  ml-[5px]"></i> Morate
                                        unijeti rok vraćanja</p>
                                    <p style="color: red;" hidden class="e2"><i class="fa fa-x  ml-[5px]"></i> Rok
                                        vraćanja je pogrešnog formata</p>
                                    <p style="color: red;" hidden class="e3"><i class="fa fa-x  ml-[5px]"></i> Rok
                                        vraćanja ne može biti negativan</p>
                                </div>
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
                                Naredna faza ima za cilj da sve učenike/korisnike koji nisu vratili svoje
                                zadužene knjige obavijesti da ih moraju vratiti.
                            </p>
                        </div>
                        <div class="relative flex ml-[60px] mt-[20px]">
                            <form identifier="3" id="rokKonfliktaForma" class="policy w-[300px] text-gray-700"
                                  action="/settings/policy/{{ $conflict->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" class="id" value="{{ $conflict->id }}">
                                <input name="value" id="rokKonflikta" type="number" min="0"
                                       value="{{ $conflict->value }}"
                                       onkeydown="return event.key != 'Enter';"
                                       class="inputValue h-[50px] flex-1 w-full px-4 py-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-[1px]  border-[#e4dfdf]  rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                                       placeholder="...">
                                <p style="color: green;" hidden id="savedMessage3"><i class="fa fa-check  ml-[5px]"></i>
                                    Rok konflikta je uspješno sačuvan</p>
                                <div id="errorDiv3">
                                    <p style="color: red;" hidden class="e1"><i class="fa fa-x  ml-[5px]"></i> Morate
                                        unijeti rok konflikta</p>
                                    <p style="color: red;" hidden class="e2"><i class="fa fa-x  ml-[5px]"></i> Rok
                                        konflikta je pogrešnog formata</p>
                                    <p style="color: red;" hidden class="e3"><i class="fa fa-x  ml-[5px]"></i> Rok
                                        konflikta ne može biti negativan</p>
                                </div>
                            </form>
                            <p class="ml-[10px] mt-[10px]">dana</p>
                        </div>
                    </div>

                    <div class="pl-[30px] flex border-b-[1px] border-[#e4dfdf]  py-[20px]">
                        <div>
                            <h3>
                                Broj knjiga po učeniku
                            </h3>
                            <p class="pt-[15px] max-w-[400px]">
                                Ova performansa ograničava koliko knjiga učenik može da zaduži iz školske biblioteke.
                                Bez obzira na broj uzetih knjiga učenik je dužan da poštuje rok za vraćanje istih.
                            </p>
                        </div>
                        <div class="relative flex ml-[60px] mt-[20px]">
                            <form identifier="4" id="maxIzdavanjaForma" class="policy w-[300px] text-gray-700"
                                  action="/settings/policy/{{ $conflict->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" class="id" value="{{ $maxBorrows->id }}">
                                <input name="value" id="maxIzdavanja" type="number" min="0"
                                       value="{{ $maxBorrows->value }}"
                                       onkeydown="return event.key != 'Enter';"
                                       class="inputValue h-[50px] flex-1 w-full px-4 py-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-[1px]  border-[#e4dfdf]  rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                                       placeholder="...">
                                <p style="color: green;" hidden id="savedMessage4"><i class="fa fa-check  ml-[5px]"></i>
                                    Varijabla je uspješno sačuvana</p>
                                <div id="errorDiv4">
                                    <p style="color: red;" hidden class="e1"><i class="fa fa-x  ml-[5px]"></i> Morate
                                        unijeti broj knjiga</p>
                                    <p style="color: red;" hidden class="e2"><i class="fa fa-x  ml-[5px]"></i> Varijabla
                                        je pogrešnog formata</p>
                                    <p style="color: red;" hidden class="e3"><i class="fa fa-x  ml-[5px]"></i> Broj
                                        knjiga ne može biti negativan</p>
                                </div>
                            </form>
                            <p class="ml-[10px] mt-[10px]">knjiga</p>
                        </div>
                    </div>

                </div>

                <div class="flex flex-col col-xl-6">

                    <div class="pl-[30px] flex border-b-[1px] border-[#e4dfdf]  py-[20px]">
                        <div>
                            <h3>
                                Izdavanje iste knjige više puta jednom učeniku
                            </h3>
                            <p class="pt-[15px] max-w-[400px]">
                                Ova funkcionalost je opciona, što znači da bibliotekar/ka može odlučiti da li želi da
                                izda jednu knjigu više puta istom učeniku.
                            </p>
                        </div>
                        <div class="relative flex ml-[60px] mt-[20px]">
                            <form identifier="5" class="policy w-[300px] text-gray-700"
                                  action="/settings/policy/{{$allowManyBooks->id}}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" class="id" value="{{ $allowManyBooks->id }}">
                                <input hidden name="value" type="checkbox" value="1"
                                       {{ $allowManyBooks->value == 1 ? 'checked' : '' }}
                                       onkeydown="return event.key != 'Enter';" class="inputValue">

                                <div class='toggle switch {{ $allowManyBooks->value == 1 ? 'toggle-on' : '' }}'>
                                    <div class='toggle-text-off'>NE &nbsp</div>
                                    <div class='glow-comp'></div>
                                    <div class='toggle-button'></div>
                                    <div class='toggle-text-on'>DA</div>
                                </div>

                                <p style="color: green;" hidden id="savedMessage5"><i class="fa fa-check  ml-[5px]"></i>
                                    Varijabla je uspješno sačuvana</p>
                                <div id="errorDiv5">
                                    <p class="e1"></p>
                                    <p class="e2"></p>
                                    <p class="e3"></p>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="pl-[30px] flex border-b-[1px] border-[#e4dfdf]  py-[20px]">
                        <div>
                            <h3>
                                Slati PDF verziju knjige prilikom izdavanja učeniku
                            </h3>
                            <p class="pt-[15px] max-w-[400px]">
                                Ova funcionalnost je opciona, učeniku se na e-mail dostavlja PDF verzija koja će
                                ostati dostupna i nakon vraćanja knjige u biblioteku. Ovom funkcionalošću bi se
                                moglo smanjiti zadržavanje knjige, jer bi učenik vratio knjigu ako je nije do kraja
                                pročitao, a njeno čitanje bi mogao završiti uz pomoć PDF verzije iste.
                            </p>
                        </div>
                        <div class="relative flex ml-[60px] mt-[20px]">
                            <form identifier="6" class="policy w-[300px] text-gray-700"
                                  action="/settings/policy/{{$sendPdf->id}}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" class="id" value="{{ $sendPdf->id }}">
                                <input hidden name="value" type="checkbox" value="1"
                                       {{ $sendPdf->value == 1 ? 'checked' : '' }}
                                       onkeydown="return event.key != 'Enter';" class="inputValue">

                                <div class='toggle switch {{ $sendPdf->value == 1 ? 'toggle-on' : '' }}'>
                                    <div class='toggle-text-off'>NE &nbsp</div>
                                    <div class='glow-comp'></div>
                                    <div class='toggle-button'></div>
                                    <div class='toggle-text-on'>DA</div>
                                </div>

                                <p style="color: green;" hidden id="savedMessage6"><i class="fa fa-check  ml-[5px]"></i>
                                    Varijabla je uspješno sačuvana</p>
                                <div id="errorDiv6">
                                    <p class="e1"></p>
                                    <p class="e2"></p>
                                    <p class="e3"></p>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End Content -->
</x-layout>
