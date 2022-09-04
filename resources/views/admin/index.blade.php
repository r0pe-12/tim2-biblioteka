<x-layout>
    @section('title')
        Administratori
    @endsection
        <!-- Delete One Admin Modal -->
        <div class="modal fadeM" id="deleteOneModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" action="">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Da li želite obrisati administratora: </h5>
                            <h5 class="modal-title modalLabel"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="text-red-800">
                                Ova akcija je nepovratna.
                            </p>
                        </div>
                        @csrf
                        @method('DELETE')
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Otkaži</button>
                            <button type="submit" class="sure btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] text-white" style="background: red">
                                Potvrdi <i class="fas fa-check ml-[4px]"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Delete Many Admin Modal -->
        <div class="modal fadeM" id="deleteManyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" action="ovoNapravi">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Da li želite obrisati sljedeće administratore: </h5>
                            <h5 class="modal-title">
                                <a data-bs-toggle="collapse" href="#showMore" role="button" class="showMorebtn" aria-expanded="false" aria-controls="collapseExample"></a>
                                <ul class="collapse modalLabel" id="showMore"></ul>
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="text-red-800">
                                Ova akcija je nepovratna.
                            </p>
                        </div>
                        @csrf
                        @method('DELETE')
                        <div class="modal-footer">
                            <input type="hidden" class="ids" value="" name="unames" id="ids">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Otkaži</button>
                            <button type="submit" class="sure btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] text-white" style="background: red">
                                Potvrdi <i class="fas fa-check ml-[4px]"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Content -->
        <section class="w-screen h-screen py-4 pl-[80px] text-[#333333]">
            <!-- Heading of content -->
            <div class="heading mt-[7px]">
                <h1 class="pl-[30px] pb-[21px] border-b-[1px] border-[#e4dfdf] ">
                    Administratori
                </h1>
            </div>
            <!-- Space for content -->
            <div class="scroll height-dashboard">
                <x-flash-msg/>
                <div class="flex items-center justify-between px-[30px] py-4 space-x-3 rounded-lg">
                    <a href="{{ route('admins.create') }}" class="btn-animation inline-flex items-center text-sm py-2.5 px-5 rounded-[5px] tracking-wider text-white bg-[#3f51b5] rounded hover:bg-[#4558BE]">
                        <i class="fas fa-plus mr-[15px]"></i> Novi Administrator
                    </a>
                    <a href="#" class="text-red-800 multiple" id="deleteMany" hidden data-toggle="modal" data-target="#deleteManyModal"><i class="fa fa-trash ml-4"></i> Izbrisi administratora</a>

                    <a class="text-blue-800 one" hidden id="detalji" href="#"><i class="far fa-copy"></i> Pogledaj detalje</a>
                    <a class="text-blue-800 one" hidden id="edit" href="#"><i class="fas fa-user-edit"></i> Izmijeni administratora</a>

                    <a href="#" class="text-red-800 one deleteOne" id="deleteOne" hidden data-toggle="modal" data-target="#deleteOneModal"><i class="fa fa-trash ml-4"></i> Izbrisi administratora</a>
                    <div></div>
                </div>

                <div
                    class="inline-block min-w-full px-[30px] pt-3 align-middle bg-white rounded-bl-lg rounded-br-lg shadow-dashboard">
                    <table class="overflow-hidden shadow-lg rounded-xl min-w-full border-[1px] border-[#e4dfdf]" id="myTable">
                        <thead class="bg-[#EFF3F6]">
                            <tr id="head" class="border-[1px] border-[#e4dfdf]">
                                <th class="px-4 py-4 leading-4 tracking-wider text-left text-blue-500">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" class="form-checkbox checkAll checkOthers">
                                    </label>
                                </th>
                                <th class="px-4 py-4 leading-4 tracking-wider text-left">Ime i prezime<a href="#"></a>
                                </th>
                                <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Email</th>
                                <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Tip korisnika</th>
                                <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Zadnji pristup sistemu
                                </th>
                                <th class="px-4 py-4"> </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white" id="myTableBody">
                            @foreach($admins as $admin)
                                <tr class="hover:bg-gray-200 hover:shadow-md border-[1px] border-[#e4dfdf]">
                                    <td class="px-4 py-4 whitespace-no-wrap">
                                        <label class="inline-flex items-center">
                                            @if(auth()->user()->can('delete', $admin))<input type="checkbox" class="form-checkbox checkOthers" data-id="{{ $admin->username }}" data-name="{{ $admin->name }} {{ $admin->surname }}">@endif
                                        </label>
                                    </td>
                                    <td class="flex flex-row items-center px-4 py-4">
                                        <img class="object-cover w-8 h-8 mr-2 rounded-full" src="{{ $admin->photoPath }}"
                                            alt="" />
                                        <a href="{{ route('admins.show', $admin->username) }}">
                                            <span class="font-medium text-center">{{ $admin->name }} {{ $admin->surname }}</span>
                                        </a>
                                    </td>
                                    <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">
                                        {{ $admin->email }}
                                    </td>
                                    <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">{{ $admin->role->name }}</td>
                                    <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">{{ $admin->lastLogin() }}</td>
                                    <td class="px-4 py-4 text-sm leading-5 text-right whitespace-no-wrap">
                                        <p class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsLibrarian hover:text-[#606FC7]">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </p>
                                        <div
                                            class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-librarian">
                                            <div class="absolute right-[25px] w-56 mt-[7px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                                aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                                                <div class="py-1">
                                                    <a href="{{ route('admins.show', $admin->username) }}" tabindex="0"
                                                        class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                        role="menuitem">
                                                        <i class="far fa-file mr-[5px] ml-[5px] py-1"></i>
                                                        <span class="px-4 py-0">Pogledaj detalje</span>
                                                    </a>
                                                    <a href="{{ route('admins.edit', $admin->username) }}" tabindex="0"
                                                        class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                        role="menuitem">
                                                        <i class="fas fa-edit mr-[1px] ml-[5px] py-1"></i>
                                                        <span class="px-4 py-0">Izmijeni administratora</span>
                                                    </a>
                                                    @if(auth()->user()->can('delete', $admin))
                                                        <a href="#"
                                                           class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600 deleteOne"
                                                           id="deleteOne"
                                                           data-toggle="modal"
                                                           data-target="#deleteOneModal"
                                                           data-id="{{ $admin->username }}"
                                                           data-name="{{ $admin->name }} {{ $admin->surname }}"
                                                           data-action="{{ route('admins.destroy', $admin->username) }}"
                                                        >
                                                            <i class="fa fa-trash mr-[10px] ml-[5px] py-1"></i>
                                                            <span class="px-4 py-0">Izbriši administratora</span>
                                                        </a>
                                                    @endif
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
                            <th class="px-4 py-4 leading-4 tracking-wider text-left">Ime i prezime
                            </th>
                            <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Email</th>
                            <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Tip korisnika</th>
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
