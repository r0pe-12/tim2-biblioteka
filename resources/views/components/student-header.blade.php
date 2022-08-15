@props([
    'student'
])

<div {{ $attributes->class(['heading']) }}>
    <div class="flex flex-row justify-between border-b-[1px] border-[#e4dfdf]">
        <div class="pl-[30px] py-[10px] flex flex-col">
            <div>
                <h1>
                    {{$student->name}}
                </h1>
            </div>
            <div>
                <nav class="w-full rounded">
                    <ol class="flex list-reset">
                        <li>
                            <a href="{{route('students.index')}}" class="text-[#2196f3] hover:text-blue-600">
                                Svi ucenici
                            </a>
                        </li>
                        <li>
                            <span class="mx-2">/</span>
                        </li>
                        <li>
                            <a href="{{route('students.show', $student->username)}}"
                               class="text-[#2196f3] hover:text-blue-600">
                                {{$student->username}}
                            </a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="pt-[24px] pr-[30px]">
            <a href="#" class="inline hover:text-blue-600 show-modal">
                <i class="fas fa-redo-alt mr-[3px]"></i>
                Resetuj sifru
            </a>
            <a href="{{route('students.edit',$student->username)}}"
               class="hover:text-blue-600 inline ml-[20px] pr-[10px]">
                <i class="fas fa-edit mr-[3px] "></i>
                Izmjeni podatke
            </a>
            <p class="inline cursor-pointer text-[25px] py-[10px] pl-[30px] border-l-[1px] border-gray-300 dotsStudentProfile hover:text-[#606FC7]">
                <i
                        class="fas fa-ellipsis-v"></i>
            <div
                    class="z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-student-profile">
                <div class="absolute right-0 w-56 mt-[10px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                     aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                    <div class="py-1">
                        <form method="POST" action="{{ route('students.destroy', $student) }}"
                              enctype="multipart/form-data" tabindex="0"
                              class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                              role="menuitem">
                            @csrf
                            @method('DELETE')
                            <i class="fa fa-trash mr-[5px] ml-[5px] py-1"></i>
                            <button type="submit"><span class="px-4 py-0">Izbriši Korisnika</span></button>
                        </form>
                        </a>
                    </div>
                </div>
            </div>
            </p>

        </div>
    </div>
</div>
