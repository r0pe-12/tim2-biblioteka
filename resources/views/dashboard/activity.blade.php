<x-layout>
    @section('title')
        Activity
    @endsection
        <!-- Content -->
        <section class="w-screen h-screen pl-[80px] py-4 text-gray-700">
            <!-- Heading of content -->
            <div class="heading mt-[7px]">
                <h1 class="pl-[30px] pb-[21px]  border-b-[1px] border-[#e4dfdf] ">
                    Prikaz aktivnosti
                </h1>
            </div>
            <!-- Space for content -->
            <div class="pl-[30px] overflow-auto scroll height-dashboard pb-[30px] mt-[20px]">
                <div class="flex flex-row justify-between">
                    <div class="mr-[30px]">
                        <x-book-activity-filters :students="$students" :librarians="$librarians" :books="$books"/>
                        <!-- Activity Cards -->
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
                    <div class="mr-[50px] ">
                        <h3 class="uppercase mb-[20px] text-left">
                            Rezervacije knjiga
                        </h3>
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
            </div>
        </section>
        <!-- End Content -->
</x-layout>>
