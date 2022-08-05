<x-layout>
    @section('title')
        Autor : {{ $author->surname }}
    @endsection
        <!-- Content -->
        <section class="w-screen h-screen pl-[80px] pb-4 text-gray-700">
            <!-- Heading of content -->
            <div class="heading">
                <div class="flex justify-between border-b-[1px] border-[#e4dfdf]">
                    <div class="pl-[30px] py-[10px] flex flex-col">
                        <div>
                            <h1>
                                {{ $author->name }} {{ $author->surname }}
                            </h1>
                        </div>
                        <div>
                            <nav class="w-full rounded">
                                <ol class="flex list-reset">
                                    <li>
                                        <a href="{{ route('authors.index') }}" class="text-[#2196f3] hover:text-blue-600">
                                            Evidencija autora
                                        </a>
                                    </li>
                                    <li>
                                        <span class="mx-2">/</span>
                                    </li>
                                    <li>
                                        <a href="{{ route('authors.show', $author) }}" class="text-gray-400 hover:text-blue-600">
                                            AUTOR-{{ $author->id }}
                                        </a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="pt-[24px] pr-[30px]">
                        <p class="inline cursor-pointer text-[25px] py-[10px] pl-[30px] border-l-[1px] border-gray-300 dotsAutor hover:text-[#606FC7]">
                            <i
                                class="fas fa-ellipsis-v"></i>
                        </p>
                        <div
                            class="z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-autor">
                            <div class="absolute right-0 w-56 mt-[2px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                                <div class="py-1">
                                    <a href="{{ route('authors.edit', $author) }}" tabindex="0"
                                        class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                        role="menuitem">
                                        <i class="fas fa-edit mr-[1px] ml-[5px] py-1"></i>
                                        <span class="px-4 py-0">Izmijeni autora</span>
                                    </a>
                                    <form method="POST" action="{{ route('authors.destroy', $author) }}" enctype="multipart/form-data" tabindex="0"
                                          class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                          role="menuitem">
                                        @csrf
                                        @method('DELETE')
                                        <i class="fa fa-trash mr-[5px] ml-[5px] py-1"></i>
                                        <button type="submit"><span class="px-4 py-0">Izbriši autora</span></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Space for content -->
            <div class="pl-[30px] height-profile pb-[30px] scroll mt-[20px]">
                <div class="flex flex-row">
                    <div class="mr-[30px]">
                        <div class="mt-[20px]">
                            <span class="text-gray-500">Ime</span>
                            <p class="font-medium">{{ $author->name }}</p>
                        </div>
                        <div class="mt-[40px]">
                            <span class="text-gray-500">Prezime</span>
                            <p class="font-medium">{{ $author->surname }}</p>
                        </div>
                        <div class="mr-[70px] mt-[20px] flex flex-col max-w-[600px]">
                            <h4 class="text-gray-500 ">
                                Storyline (Kratki sadrzaj)
                            </h4>
                            <div class="scroll" style="max-height: 511px">
                                <p class=" my-[10px]">
                                    {!! $author->biography !!}
                                </p>
                            </div>
                        </div>

                    </div>
                    <div class="ml-[100px]  mt-[20px]">
                        <img class="p-2 border-2 border-gray-300" width="300px" src="{{ $author->image }}" alt="">
                    </div>
                </div>
            </div>
        </section>
        <!-- End Content -->
    </main>
    <!-- End Main content -->
</x-layout>>
