<x-layout>
    @section('title')
        Povez
    @endsection

        <!-- Delete One Category Modal -->
        <div class="modal fadeM" id="deleteOneModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" action="">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Da li želite obrisati povez: </h5>
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

        <!-- Delete Many Category Modal -->
        <div class="modal fadeM" id="deleteManyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" action="{{route('book-bind.bulkDelete')}}">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Da li želite obrisati sljedeće poveze: </h5>
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
                            <input class="ids" type="hidden" value="" name="ids" id="ids">
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
            <div class="height-kategorije pb-[30px] scroll">
                <x-flash-msg/>
                <div class="flex items-center px-[50px] py-8 space-x-3 rounded-lg">
                    <a href="{{ route('bookbind.create') }}"
                        class="btn-animation inline-flex items-center text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] tracking-wider text-white bg-[#3f51b5] rounded hover:bg-[#4558BE]">
                        <i class="fas fa-plus mr-[15px]"></i> Novi povez
                    </a>

                    <a href="#" class="text-red-800 multiple" id="deleteMany" hidden data-toggle="modal" data-target="#deleteManyModal"><i class="fa fa-trash ml-4"></i> Izbrisi poveze</a>

                    <a class="text-blue-800 one" hidden id="edit" href="#"><i class="far fa-edit"></i> Izmjeni povez</a>
                    <a href="#" class="text-red-800 one deleteOne" id="deleteOne" hidden data-toggle="modal" data-target="#deleteOneModal"><i class="fa fa-trash ml-4"></i> Izbrisi povez</a>
                </div>


                <div
                    class="inline-block min-w-full px-[50px] pt-3 align-middle bg-white rounded-bl-lg rounded-br-lg shadow-dashboard">
                    <table class="overflow-hidden shadow-lg rounded-xl min-w-full border-[1px] border-[#e4dfdf]" id="myTable">
                        <thead class="bg-[#EFF3F6]">
                            <tr id="head" class="border-b-[1px] border-[#e4dfdf]">
                                <th class="px-4 py-4 leading-4 tracking-wider text-left text-blue-500">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" class="form-checkbox checkAll checkOthers">
                                    </label>
                                </th>
                                <th class="px-4 py-4 leading-4 tracking-wider text-left">Naziv poveza<a href="#"></a>
                                </th>
                                <th class="px-4 py-4"> </th>
                            </tr>
                        </thead>
                        <tbody id="myTableBody" class="bg-white">
                            @foreach($bookbinds as $bookbind)
                            <tr class="hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                                <td class="px-4 py-4 whitespace-no-wrap">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" class="form-checkbox checkOthers" data-name="{{ $bookbind->name }}" data-id="{{ $bookbind->id }}">
                                    </label>
                                </td>
                                <td class="flex flex-row items-center px-4 py-4">
                                    <p>{{ $bookbind->name }}</p>
                                </td>
                                <td class="px-4 py-4 text-sm leading-5 text-right whitespace-no-wrap">
                                    <p class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsBookBind hover:text-[#606FC7]">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </p>
                                    <div
                                        class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-book-bind">
                                        <div class="absolute right-[25px] w-56 mt-[7px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                            aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                                            <div class="py-1">
                                                <a href="{{ route('bookbind.edit', $bookbind) }}" tabindex="0"
                                                    class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                    role="menuitem">
                                                    <i class="fas fa-edit mr-[1px] ml-[5px] py-1"></i>
                                                    <span class="px-4 py-0">Izmijeni povez</span>
                                                </a>
                                                <a href="#" tabindex="0" data-toggle="modal" data-target="#deleteOneModal"
                                                   data-name="{{ $bookbind->name }}" data-id="{{ $bookbind->id }}"
                                                   class="deleteOne flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                   role="menuitem">
                                                    <i class="fa fa-trash mr-[1px] ml-[5px] py-1"></i>
                                                    <span class="px-4 py-0">Izbriši povez</span>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr class="border-b-[1px] border-[#e4dfdf]">
                            <th class="px-4 py-4 leading-4 tracking-wider text-left text-blue-500">

                            </th>
                            <th class="px-4 py-4 leading-4 tracking-wider text-left">
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
