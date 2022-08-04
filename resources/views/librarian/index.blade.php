<x-layout>
    @section('title')
        Bibliotekari
    @endsection
        <!-- Content -->
        <section class="w-screen h-screen py-4 pl-[80px] text-[#333333]">
            <!-- Heading of content -->
            <div class="heading mt-[7px]">
                <h1 class="pl-[30px] pb-[21px] border-b-[1px] border-[#e4dfdf] ">
                    Bibliotekari
                </h1>
            </div>
            <!-- Space for content -->
            <div class="scroll height-dashboard">
                <x-flash-msg/>
                <div class="flex items-center justify-between px-[30px] py-4 space-x-3 rounded-lg">
                    <a href="{{ route('librarians.create') }}" class="btn-animation inline-flex items-center text-sm py-2.5 px-5 rounded-[5px] tracking-wider text-white bg-[#3f51b5] rounded hover:bg-[#4558BE]">
                        <i class="fas fa-plus mr-[15px]"></i> Novi bibliotekar
                    </a>
                    <div class="flex items-center">
                        <div class="relative text-gray-600 focus-within:text-gray-400">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                                <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                                </button>
                            </span>
                        </div>
                    </div>
                </div>

                <div
                    class="inline-block min-w-full px-[30px] pt-3 align-middle bg-white rounded-bl-lg rounded-br-lg shadow-dashboard">
                    <table class="overflow-hidden shadow-lg rounded-xl min-w-full border-[1px] border-[#e4dfdf]" id="myTable">
                        <thead class="bg-[#EFF3F6]">
                            <tr class="border-[1px] border-[#e4dfdf]">
                                <th class="px-4 py-4 leading-4 tracking-wider text-left text-blue-500">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" class="form-checkbox">
                                    </label>
                                </th>
                                <th class="px-4 py-4 leading-4 tracking-wider text-left">Ime i prezime<a href="#"><i
                                            class="ml-3 fa-lg fas fa-long-arrow-alt-down" onclick="sortTable()"></i></a>
                                </th>
                                <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Email</th>
                                <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Tip bibliotekara</th>
                                <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Zadnji pristup sistemu
                                </th>
                                <th class="px-4 py-4"> </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach($librarians as $librarian)
                                <tr class="hover:bg-gray-200 hover:shadow-md border-[1px] border-[#e4dfdf]">
                                    <td class="px-4 py-4 whitespace-no-wrap">
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" class="form-checkbox">
                                        </label>
                                    </td>
                                    <td class="flex flex-row items-center px-4 py-4">
                                        <img class="object-cover w-8 h-8 mr-2 rounded-full" src="{{ $librarian->photoPath }}"
                                            alt="" />
                                        <a href="{{ route('librarians.show', $librarian->username) }}">
                                            <span class="font-medium text-center">{{ $librarian->name }} {{ $librarian->surname }}</span>
                                        </a>
                                    </td>
                                    <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">
                                        {{ $librarian->email }}
                                    </td>
                                    <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">{{ $librarian->role->name }}</td>
                                    <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">{{ $librarian->lastLogin() }}</td>
                                    <td class="px-4 py-4 text-sm leading-5 text-right whitespace-no-wrap">
                                        <p class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsLibrarian hover:text-[#606FC7]">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </p>
                                        <div
                                            class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-librarian">
                                            <div class="absolute right-[25px] w-56 mt-[7px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                                aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                                                <div class="py-1">
                                                    <a href="{{ route('librarians.show', $librarian->username) }}" tabindex="0"
                                                        class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                        role="menuitem">
                                                        <i class="far fa-file mr-[5px] ml-[5px] py-1"></i>
                                                        <span class="px-4 py-0">Pogledaj detalje</span>
                                                    </a>
                                                    <a href="{{ route('librarians.edit', $librarian->username) }}" tabindex="0"
                                                        class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                        role="menuitem">
                                                        <i class="fas fa-edit mr-[1px] ml-[5px] py-1"></i>
                                                        <span class="px-4 py-0">Izmijeni bibliotekara</span>
                                                    </a>
                                                    <form method="POST" action="{{ route('librarians.destroy', $librarian) }}" enctype="multipart/form-data" tabindex="0"
                                                          class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                          role="menuitem">
                                                        @csrf
                                                        @method('DELETE')
                                                        <i class="fa fa-trash mr-[5px] ml-[5px] py-1"></i>
                                                        <button type="submit"><span class="px-4 py-0">Izbriši bibliotekara</span></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr class="border-[1px] border-[#e4dfdf]">
                            <th class="px-4 py-4 leading-4 tracking-wider text-left text-blue-500">
                            </th>
                            <th class="px-4 py-4 leading-4 tracking-wider text-left">Ime i prezime<a href="#"><i
                                        class="ml-3 fa-lg fas fa-long-arrow-alt-down" onclick="sortTable()"></i></a>
                            </th>
                            <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Email</th>
                            <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Tip bibliotekara</th>
                            <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Zadnji pristup sistemu
                            </th>
                            <th class="px-4 py-4"> </th>
                        </tr>
                        </tfoot>
                    </table>

                </div>
            </div>

        </section>
        <!-- End Content -->
</x-layout>>
