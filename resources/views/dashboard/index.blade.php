<x-layout>
    @section('title')
        Dashboard
    @endsection
        @section('scripts')
            <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
            <script>
                var xValues = ["Izdate knjige", "Rezervisane knjige", "Knjige u prekoracenju"];
                const ctx = document.getElementById('myChart').getContext('2d');
                const myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:['Izdate', 'Rezervisane', 'U prekoračenju'],
                        datasets:[{
                            label: 'Knjige',
                            data:
                                [
                                   {{ count($izdate) }},
                                   {{ count($rezervisane) }},
                                   {{ count($prekoracene) }},
                                ],

                            /*data:[
                            30,
                            15
                                ],*/

                            //backgroundColor:'green',
                            backgroundColor:[
                                'rgb(6, 78, 59, 0.5)',
                                'rgb(120, 53, 15, 0.5)',
                                'rgb(127, 29, 29, 0.5)',
                            ],
                            borderWidth:1,
                            barThickness:40,
                            borderColor:'#777',
                            hoverBorderWidth:3,
                            hoverBorderColor:'#000'
                        }]

                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                        maxHeight: 1000
                    }
                });
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
                        @foreach($izdate as $zapis)
                        <div class="activity-card flex flex-row mb-[30px]">
                            <div class="flex w-[60px] h-[60px] items-center">
                                <img class="rounded-full" src="{{$zapis->librarian->photoPath}}" alt="">
                            </div>
                            <div class="ml-[15px] mt-[5px] flex flex-col">
                                <div class="text-gray-500 mb-[5px]">
                                    <p class="uppercase">
                                        <b>Izdavanje knjige</b>
                                        <span class="inline lowercase">
                                            {{ \App\Models\Carbon::parse($zapis->borrow_date)->diffForHumans() }}
                                        </span>
                                    </p>
                                </div>
                                <div class="">
                                    <p>
                                        <a href="{{ route('librarians.show', $zapis->librarian->username) }}" class="text-[#2196f3] hover:text-blue-600">
                                            {{$zapis->librarian->name}} {{$zapis->librarian->surname}}
                                        </a>
                                        je izdao/la knjigu <span class="font-medium">{{$zapis->book->title}}</span>
                                        <a href="{{route('students.show', $zapis->student->username)}}" class="text-[#2196f3] hover:text-blue-600">
                                            {{$zapis->student->name}} {{$zapis->student->surname}}
                                        </a>
                                        dana <span class="font-medium">{{ \Carbon\Carbon::parse($zapis->borrow_date)->format('d.m.Y') }}</span>
                                        <a href="{{ route('izdate.show', [$zapis->book, $zapis->id] ) }}" class="text-[#2196f3] hover:text-blue-600">
                                            pogledaj detaljnije >>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="inline-block w-full mt-4">
                            <a href="{{ route('dashboard.activity') }}"
                                class="btn-animation block text-center w-full px-4 py-2 text-sm tracking-wider text-gray-600 transition duration-300 ease-in border-[1px] border-gray-400 rounded hover:bg-gray-200 focus:outline-none focus:ring-[1px] focus:ring-gray-300">
                                Prikazi vise
                            </a>
                        </div>
                    </div>
                    <div class="mr-[50px] ">
                        <h3 class="uppercase mb-[20px] text-left">
                            Rezervacije knjiga
                        </h3>
                        <div>
                            <table class="w-[560px] table-auto">
                                <tbody class="bg-gray-200">
                                @foreach($rezervisane as $zapis)
                                    <tr class="bg-white border-b-[1px] border-[#e4dfdf]">
                                        <td class="flex flex-row items-center px-2 py-4">
                                            <img class="object-cover w-8 h-8 rounded-full "
                                                src="{{$zapis->student->photoPath}}" alt="" />
                                            <a href="{{route('students.show', $zapis->student->username)}}" class="ml-2 font-medium text-center">{{$zapis->student->name}} {{$zapis->student->surname}}</a>
                                        <td>
                                        </td>
                                        <td class="px-2 py-2">
                                            <a href="knjigaOsnovniDetalji.php">
                                            {{$zapis->book->title}}
                                            </a>
                                        </td>
                                        <td class="px-2 py-2">
                                            <span class="px-[10px] py-[3px] bg-gray-200 text-gray-800 px-[6px] py-[2px] rounded-[10px]">{{ \Carbon\Carbon::parse($zapis->submttingDate)->format('d.m.Y') }}</span>
                                        </td>
                                        <td class="px-2 py-2">
                                            <div
                                                class="inline-block px-[6px] py-[2px] font-medium bg-yellow-200 rounded-[10px]">
                                                <span class="text-xs text-yellow-700">{{ $zapis->status->name }}</span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="text-right mt-[5px]">
                                <a href="{{route('aktivne-rezervacije')}}" class="text-[#2196f3] hover:text-blue-600">
                                    <i class="fas fa-calendar-alt mr-[4px]" aria-hidden="true"></i>
                                    Prikaži sve
                                </a>
                            </div>
                        </div>
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
