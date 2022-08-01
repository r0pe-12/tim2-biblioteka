<x-layout>
    @section('title')
        Vrati knjigu:
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
                        <table class="min-w-full border-[1px] border-[#e4dfdf]" id="vratiKnjiguTable">
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
                                @foreach($book->active() as $active)
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
                        </table>

                        <div class="flex flex-row items-center justify-end my-2">
                            <div>
                                <p class="inline text-md">
                                    Rows per page:
                                </p>
                                <select
                                    class=" text-gray-700 bg-white rounded-md w-[46px] focus:outline-none focus:ring-primary-500 focus:border-primary-500 text-md"
{{--                                    name="ucenici"--}}
                                >
                                    <option value="">
                                        20
                                    </option>
                                    <option value="">
                                        Option1
                                    </option>
                                    <option value="">
                                        Option2
                                    </option>
                                    <option value="">
                                        Option3
                                    </option>
                                    <option value="">
                                        Option4
                                    </option>
                                </select>
                            </div>

                            <div>
                                <nav class="relative z-0 inline-flex">
                                    <div>
                                        <a href="#"
                                           class="relative inline-flex items-center px-4 py-2 -ml-px font-medium leading-5 transition duration-150 ease-in-out bg-white text-md focus:z-10 focus:outline-none">
                                            1 of 1
                                        </a>
                                    </div>
                                    <div>
                                        <a href="#"
                                           class="relative inline-flex items-center px-2 py-2 font-medium leading-5 text-gray-500 transition duration-150 ease-in-out bg-white text-md rounded-l-md hover:text-gray-400 focus:z-10 focus:outline-none"
                                           aria-label="Previous"
                                           v-on:click.prevent="changePage(pagination.current_page - 1)">
                                            <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                      d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                      clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </div>
                                    <div v-if="pagination.current_page < pagination.last_page">
                                        <a href="#"
                                           class="relative inline-flex items-center px-2 py-2 -ml-px font-medium leading-5 text-gray-500 transition duration-150 ease-in-out bg-white text-md rounded-r-md hover:text-gray-400 focus:z-10 focus:outline-none"
                                           aria-label="Next">
                                            <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                      d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                      clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </div>
                                </nav>
                            </div>
                        </div>

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
