<x-layout>
    @section('title')
        Dashboard
    @endsection
        @section('scripts')
            <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
            <script>
                const labels = ["Izdate", "Rezervisane", "U prekoračenju"]

                const data = {
                    labels: labels,
                    datasets: [{
                        label: "Knjige",
                        {{--data: [{{ count($izdateAll) }}, {{ count($rezervisaneAll) }}, {{ count($prekoracene) }}],--}}
                        data: [7, 10, 3],
                        backgroundColor: [
                            'rgba(167, 243, 208, 1)',
                            'rgba(230, 174, 23, 0.75)',
                            'rgba(255, 0, 0, 0.9)',
                        ],
                        borderColor: [
                            'rgba(167, 243, 208, 0.2)',
                            'rgba(230, 174, 23, 0.2)',
                            'rgba(255, 0, 0, 0.2)',
                        ],
                        borderWidth: 1,
                    }]
                };

                const config = {
                    type: 'bar',
                    data,
                    options: {
                        ticks: {
                            precision: 0
                        },
                        indexAxis: 'y',
                        scales: {
                            x: {
                                grid: {
                                    // beginAtZero: true,
                                    color: "rgba(235,235,235)",
                                    borderWidth: 1,
                                    // borderOffset: 2,
                                    borderColor: "rgba(120,120,120)"
                                }
                            },
                            y: {
                                grid: {
                                    display: false,
                                    borderWidth: 1,
                                    // borderOffset: 2,
                                    borderColor: "rgba(120,120,120)"
                                }
                            }
                        }
                    }
                };

                const myChart = new Chart(document.getElementById('myChart'), config);

            </script>
        @endsection
        <!-- Content -->
        <section class="w-screen h-screen pl-[80px] py-4 text-gray-700">
            <!-- Heading of content -->
            <div class="heading mt-[7px]">
                <h1 class="pl-[30px] pb-[21px]  border-b-[1px] border-[#e4dfdf] ">
                    Dashboard
                </h1>
            </div>
            <!-- Space for content -->
            <div class="pl-[30px] scroll height-dashboard overflow-auto mt-[20px] pb-[30px]">
                <div class="flex flex-row justify-between">
                    <div class="mr-[30px]">

                        <h3 class="uppercase mb-[20px]">Aktivnosti</h3>
                        <!-- Activity Cards -->
                        @if(count($izdate) > 0)
                            <div class="scroll" style="max-height: 500px">
                                @foreach($izdate as $zapis)
                                    <x-book-activity-row :zapis="$zapis"/>
                                @endforeach
                            </div>
                            <div class="inline-block w-full mt-4">
                                <a href="{{ route('dashboard.activity') }}"
                                    class="btn-animation block text-center w-full px-4 py-2 text-sm tracking-wider text-gray-600 transition duration-300 ease-in border-[1px] border-gray-400 rounded hover:bg-gray-200 focus:outline-none focus:ring-[1px] focus:ring-gray-300">
                                    Prikaži više
                                </a>
                            </div>
                        @else
                            <div class="flex flex-row mb-[30px]">
                                <div class="ml-[15px] mt-[5px] flex flex-col">
                                    <div class="text-gray-500 mb-[5px]" style="font-size: 30px">
                                        <h2 class="uppercase">
                                            NEMA IZDAVANJA
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
                        @if(count($rezervisane) > 0)
                            <div>
                                <table class="w-[560px] table-auto">
                                    <tbody class="bg-gray-200">
                                    @foreach($rezervisane as $zapis)
                                        <tr class="bg-white border-b-[1px] border-[#e4dfdf]">
                                            <td class="flex flex-row items-center px-2 py-4">
                                                <img class="object-cover w-8 h-8 rounded-full "
                                                    src="{{$zapis->student->photoPath}}" alt="" />
                                                <a href="{{route('students.show', $zapis->student->username)}}" class="ml-2 font-medium text-center">{{$zapis->student->name}} {{$zapis->student->surname}}</a>
                                            </td>
                                            <td class="px-2 py-2">
                                                <a href="{{ route('books.show', $zapis->book) }}">
                                                {{$zapis->book->title}}
                                                </a>
                                            </td>
                                            <td class="px-2 py-2">
                                                <span class="px-[10px] py-[3px] bg-gray-200 text-gray-800 px-[6px] py-[2px] rounded-[10px]">{{ \Carbon\Carbon::parse($zapis->status()->datum)->format('d.m.Y') }}</span>
                                            </td>
                                            <td class="px-2 py-2">
                                                <?php
                                                    if ($zapis->isActive()) {
                                                        $bg = 'bg-yellow-200';
                                                        $txt = 'text-yellow-700';
                                                        $status = $zapis->status()->name;
                                                    } else {
                                                        $status = $zapis->closingReason->name;
                                                        if ($zapis->closingReason_id == \App\Models\ClosingReason::BOOK_BORROWED) {
                                                            $bg = 'bg-green-200';
                                                            $txt = 'text-green-800';
                                                        } else {
                                                            $bg = 'bg-red-200';
                                                            $txt = 'text-red-800';
                                                        }
                                                    }
                                                ?>
                                                <style>
                                                    .status:hover {
                                                        color: #4558be;
                                                    }
                                                </style>

                                                    <a href="{{ route('book.rezervisane.show', [$zapis->book, $zapis]) }}">
                                                <div class="inline-block px-[6px] py-[2px] font-medium {{ $bg }} rounded-[10px]">
                                                        <span class="status text-xs {{ $txt }}">{{ $status }}</span>
                                                </div>
                                                    </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="text-right mt-[5px]">
                                    <a href="{{route('evidencija.aktivne-rezervacije')}}" class="text-[#2196f3] hover:text-blue-600">
                                        <i class="fas fa-calendar-alt mr-[4px]" aria-hidden="true"></i>
                                        Prikaži sve
                                    </a>
                                </div>
                            </div>
                        @else
                            <table class="w-[560px] table-auto">
                                <tbody class="bg-gray-200">
                                    <tr class="bg-white border-b-[1px] border-[#e4dfdf]" style="column-span: 4; text-align: center">
                                        <td class="flex flex-row items-center px-2 py-4">
                                            <h2>NEMA REZERVACIJA</h2>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        @endif
                        <div class="relative">
                            <h3 class="uppercase mb-[20px] text-left py-[30px]">
                                Statistika
                            </h3>
                            <canvas id="myChart" height="130"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Content -->
</x-layout>>
