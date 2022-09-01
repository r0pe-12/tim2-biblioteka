<x-layout>
    @section('title')
        Activity
    @endsection
        <!-- Content -->
        <section class="w-screen h-screen pl-[80px] py-4 text-gray-700">
            <!-- Heading of content -->
            <div class="flex align-items-center heading border-b-[1px] border-[#e4dfdf] pb-[10px]">
                <h1 class="child pl-[30px] max-w-[304px]">
                    Prikaz aktivnosti
                </h1>
                <div class="activity-dropdown child pl-[30px] relative">
                    <x-book-activity-filters :students="$students" :librarians="$librarians" :books="$books"/>
                </div>
            </div>
            <!-- Space for content -->
            <div class="pl-[30px] overflow-auto scroll height-dashboard pb-[30px] mt-[20px]">
                <div class="flex flex-row justify-between">
                    <!-- Activity Cards -->
                    <!-- izdavanje knjiga -->
                    <div class="mr-[30px]">
                        <h3 class="uppercase mb-[20px] text-left">
                            Izdavanje knjiga
                        </h3>
                       <div id="izdavanja">
                           @if(count($borrows) > 0)
                               @foreach($borrows as $zapis)
                                   <x-book-activity-row :zapis="$zapis"/>
                               @endforeach
                           @else
                               <div class="flex flex-row mb-[30px]">
                                   <div class="ml-[15px] mt-[5px] flex flex-col">
                                       <div class="text-gray-500 mb-[5px]" style="font-size: 30px">
                                           <h2 class="uppercase">
                                               NEMA AKTIVNOSTI
                                           </h2>
                                       </div>
                                   </div>
                               </div>
                           @endif
                       </div>
                    </div>
                    <!-- end izdavanje knjiga -->

                    <!-- rezervacija knjiga -->
                    <div class="mr-[50px] ">
                        <h3 class="uppercase mb-[20px] text-left">
                            Rezervacije knjiga
                        </h3>
                       <div id="rezervacije">
                           @if(count($reservations) > 0)
                               @foreach($reservations as $zapis)
                                   <x-book-activity-row2 :zapis="$zapis"/>
                               @endforeach
                           @else
                               <div class="flex flex-row mb-[30px]">
                                   <div class="ml-[15px] mt-[5px] flex flex-col">
                                       <div class="text-gray-500 mb-[5px]" style="font-size: 30px">
                                           <h2 class="uppercase">
                                               NEMA AKTIVNOSTI
                                           </h2>
                                       </div>
                                   </div>
                               </div>
                           @endif
                       </div>
                    </div>
                    <!-- end rezervacija knjiga -->
                </div>
            </div>
        </section>
        <!-- End Content -->
</x-layout>>
