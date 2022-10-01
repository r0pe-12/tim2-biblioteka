@props([
    'student'
])
<!-- Delete One Student Modal -->
<div class="modal fadeM" id="deleteOneModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Da li želite obrisati učenika: </h5>
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

<div {{ $attributes->class(['heading']) }}>
    <div class="flex flex-row justify-between border-b-[1px] border-[#e4dfdf]">
        <div class="pl-[30px] py-[10px] flex flex-col">
            <div>
                <h1>
                    {{ $student->name }} {{ $student->surname }}
                </h1>
            </div>
            <div>
                <nav class="w-full rounded">
                    <ol class="flex list-reset">
                        <li>
                            <a href="{{route('students.index')}}" class="text-[#2196f3] hover:text-blue-600">
                                Svi učenici
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
                Resetuj šifru
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
                        <a href="#"
                           class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600 deleteOne"
                           id="deleteOne"
                           data-toggle="modal"
                           data-target="#deleteOneModal"
                           data-id="{{ $student->username }}"
                           data-name="{{ $student->name }} {{ $student->surname }}"
                           data-action="{{ route('students.destroy', $student->username) }}"
                        >
                            <i class="fa fa-trash mr-[10px] ml-[5px] py-1"></i>
                            <span class="px-4 py-0">Izbriši učenika</span>
                        </a>
                    </div>
                </div>
            </div>
            </p>

        </div>
    </div>
</div>
