<x-layout>
    @section('title')
        Vrati knjigu: {{ $book->title }}
    @endsection
        <section class="w-screen h-screen pl-[80px] pb-2 text-gray-700">
            <!-- Heading of content -->
            <x-book-header :book="$book"/>
            <form method="post" action="{{ route('vrati.store', $book) }}">
            @csrf
            @method('PUT')
                <div class="scroll height-dashboard px-[30px]">
                    <div class="flex items-center justify-between py-4 pt-[20px] space-x-3 rounded-lg">
                        <h3>
                            Vrati knjigu
                        </h3>
{{--                        <div class="relative text-gray-600 focus-within:text-gray-400">--}}
{{--                            <span class="absolute inset-y-0 left-0 flex items-center pl-2">--}}
{{--                                <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">--}}
{{--                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"--}}
{{--                                         stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6">--}}
{{--                                        <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>--}}
{{--                                    </svg>--}}
{{--                                </button>--}}
{{--                            </span>--}}
{{--                            <input type="search" name="q"--}}
{{--                                   class="py-2 pl-10 border-[#e4dfdf] text-sm text-white border-[1px] bg-white rounded-md focus:outline-none focus:bg-white focus:text-gray-900"--}}
{{--                                   placeholder="Search..." autocomplete="off">--}}
{{--                        </div>--}}
                    </div>

                    <div
                        class="inline-block min-w-full pt-3 align-middle bg-white rounded-bl-lg rounded-br-lg shadow-dashboard">
                        <table class="min-w-full border-[1px] border-[#e4dfdf]" id="myTable">
                            <thead class="bg-[#EFF3F6]">
                            <tr class="border-b-[1px] border-[#e4dfdf]">
                                <th class="px-4 py-3 leading-4 tracking-wider text-left text-blue-500">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" class="select-all form-checkbox">
                                    </label>
                                </th>
                                <th class="px-4 py-4 leading-4 tracking-wider text-left">
                                    Izdato uceniku
                                </th>
                                <th class="px-4 py-4 leading-4 tracking-wider text-left">
                                    Datum izdavanja
                                </th>
                                <th class="px-4 py-4 leading-4 tracking-wider text-left">
                                    Trenutno zadrzavanje knjige
                                </th>
                                <th class="px-4 py-4 leading-4 tracking-wider text-left">
                                    Prekoracenje u danima
                                </th>
                                <th class="px-4 py-4 leading-4 tracking-wider text-left">
                                    Knjigu izdao
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white">
                                @foreach($book->active()->get() as $active)
                                        <tr class="border-b-[1px] border-[#e4dfdf]">
                                            <td class="px-4 py-4 whitespace-no-wrap">
                                                <label class="inline-flex items-center">
                                                    <input type="checkbox" class="form-checkbox" name="toReturn[]" value="{{ $active->id }}">
                                                </label>
                                            </td>
                                            <td class="flex flex-row items-center px-4 py-4">
                                                <img class="object-cover w-8 h-8 mr-2 rounded-full" src="{{ $active->student->photoPath }}"
                                                     alt="" />
                                                <a href="{{ route('students.show', $active->student->username) }}">
                                                    <span class="font-medium text-center">{{ $active->student->name }} {{ $active->student->surname }}</span>
                                                </a>
                                            </td>
                                            <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">{{ \Carbon\Carbon::parse($active->borrow_date)->format('d.m.Y') }}</td>
                                            <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap"><x-date-diff :zapis="$active"/></td>
                                            <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap"><x-date-diff :zapis="$active" :failed="true"/></td>
                                            <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">{{ $active->librarian->name }} {{ $active->librarian->surname }}</td>
                                        </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                            <tr class="border-b-[1px] border-[#e4dfdf]">
                                <th class="px-4 py-3 leading-4 tracking-wider text-left text-blue-500">
                                </th>
                                <th class="px-4 py-4 leading-4 tracking-wider text-left">
                                    Izdato uceniku
                                </th>
                                <th class="px-4 py-4 leading-4 tracking-wider text-left">
                                    Datum izdavanja
                                </th>
                                <th class="px-4 py-4 leading-4 tracking-wider text-left">
                                    Trenutno zadrzavanje knjige
                                </th>
                                <th class="px-4 py-4 leading-4 tracking-wider text-left">
                                    Prekoracenje u danima
                                </th>
                                <th class="px-4 py-4 leading-4 tracking-wider text-left">
                                    Knjigu izdao
                                </th>
                            </tr>
                            </tfoot>
                        </table>


                    </div>
                </div>
                <div class="absolute bottom-0 w-full">
                    <div class="flex flex-row">
                        <div class="inline-block w-full text-right py-[7px] mr-[100px] text-white">
                            <button type="button"
                                    class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                Ponisti <i class="fas fa-times ml-[4px]"></i>
                            </button>
                            <button type="submit"
                                    class="btn-animation disabled-btn shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]"
                                    disabled>
                                Vrati knjigu <i class="fas fa-check ml-[4px]"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </section>

</x-layout>
