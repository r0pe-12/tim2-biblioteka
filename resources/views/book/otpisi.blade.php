<x-layout>
    @section('title')
        Otpiši knjigu: {{$book->title}}
    @endsection
        <section class="w-screen h-screen pl-[80px] pb-2 text-gray-700">
            <!-- Heading of content -->
            <x-book-header :book="$book"/>
            <form class="text-gray-700 forma" action="{{ route('otpisi.store', $book) }}" method="POST">
                @method('PUT')
                @csrf
            <div class="scroll height-dashboard px-[30px]">

                <div class="flex items-center justify-between py-4 pt-[20px] space-x-3 rounded-lg">
                    <h3>
                        Otpiši knjigu: {{$book->title}}
                    </h3>
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
                                Izdato učeniku
                            </th>
                            <th class="px-4 py-4 leading-4 tracking-wider text-left">
                                Datum izdavanja
                            </th>
                            <th class="px-4 py-4 leading-4 tracking-wider text-left">
                                Trenutno zadržavanje knjige
                            </th>
                            <th class="px-4 py-4 leading-4 tracking-wider text-left">
                                Prekoračenje u danima
                            </th>
                            <th class="px-4 py-4 leading-4 tracking-wider text-left">
                                Knjigu izdao
                            </th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody class="bg-white">
                        @foreach($book->failed() as $fail)
                        <tr class="border-b-[1px] border-[#e4dfdf]">
                            <td class="px-4 py-4 whitespace-no-wrap">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" class="form-checkbox" name="toWriteoff[]" value="{{ $fail->id }}">
                                </label>
                            </td>
                            <td class="flex flex-row items-center px-4 py-4">
                                <img class="object-cover w-8 h-8 mr-2 rounded-full" src="{{ $fail->student->photoPath }}"
                                     alt="" />
                                <a href="{{ route('students.show', $fail->student->username ) }}">
                                    <span class="font-medium text-center">{{ $fail->student->name }} {{ $fail->student->surname }}</span>
                                </a>
                            </td>
                            <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">{{ \Carbon\Carbon::parse($fail->borrow_date)->format('d.m.Y') }}</td>
                            <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap"><x-date-diff :zapis="$fail"/></td>
                            <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">
                                    <span class="px-[6px] py-[2px] bg-red-200 text-red-800 rounded-[10px]">
                                        <x-date-diff :zapis="$fail" :failed="true"/>
                                    </span>
                            </td>
                            <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">{{ $fail->librarian->name }} {{ $fail->librarian->surname }}</td>
                            <td></td>
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr class="border-b-[1px] border-[#e4dfdf]">
                            <th class="px-4 py-3 leading-4 tracking-wider text-left text-blue-500">
                            </th>
                            <th class="px-4 py-4 leading-4 tracking-wider text-left">
                                Izdato učeniku
                            </th>
                            <th class="px-4 py-4 leading-4 tracking-wider text-left">
                                Datum izdavanja
                            </th>
                            <th class="px-4 py-4 leading-4 tracking-wider text-left">
                                Trenutno zadržavanje knjige
                            </th>
                            <th class="px-4 py-4 leading-4 tracking-wider text-left">
                                Prekoračenje u danima
                            </th>
                            <th class="px-4 py-4 leading-4 tracking-wider text-left">
                                Knjigu izdao
                            </th>
                            <th></th>
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
                            Poništi <i class="fas fa-times ml-[4px]"></i>
                        </button>
                        <button type="submit"
                                class="btn-animation disabled-btn shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]"
                                disabled onclick="validacijaUcenik()">
                            Otpiši knjigu <i class="fas fa-check ml-[4px]"></i>
                        </button>
                    </div>
                </div>
            </div>
            </form>

        </section>

</x-layout>
