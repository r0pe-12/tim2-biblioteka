@props([
    /** @var \mixed */
    'students',
    'librarians',
    'books'
])
<?php
if($_SERVER['REQUEST_METHOD'] == "GET") {
    if(isset($_GET['ucenik'])) {
        $ucenik = count($_GET['ucenik']);
        $ucenici = $_GET['ucenik'];
    } else {
        $ucenik = "Sve";
        $ucenici = [];
    }
    if(isset($_GET['bibliotekar'])) {
        $bibliotekar = count($_GET['bibliotekar']);
        $bibliotekari = $_GET['bibliotekar'];
    } else {
        $bibliotekar = "Sve";
        $bibliotekari = [];
    }
    if(isset($_GET['knjiga'])) {
        $knjiga = count($_GET['knjiga']);
        if ($knjiga === 1) {
            $knjiga = \App\Models\Book::find($_GET['knjiga'][0])->title;
        };
        $knjige = $_GET['knjiga'];
    } else {
        $knjiga = "Sve";
        $knjige = [];
    }
    if(isset($_GET['transakcija'])) {
        $transakcija = count($_GET['transakcija']);
        $transakcije = $_GET['transakcija'];
    } else {
        $transakcija = "Sve";
        $transakcije = [];
    }
    $datum = [];
    if (isset($_GET['od'])) {
        $od = $_GET['od'];
        strlen($od) > 0 ? $datum[] = 'Od' : '';
    }
    if (isset($_GET['do'])) {
        $do = $_GET['do'];
        strlen($do) > 0 ? $datum[] = 'Do' : '';
    }

    if (count($datum) == 1) {
        $datum = $datum[0];
    } elseif (count($datum) == 0) {
        $datum = "Sve";
    } else {
        $datum = count($datum);
    }

} else {
    $e = new Exception('Error', 222);
    echo '<h1>'.$e->getCode().' '.$e->getMessage().'</h1>';
}
?>

<!-- todo kad se ucitavaju podaci i stavi se klasa blur ovi dropdownovi se proemete -->

<!-- todo napraviti dugme ponisti da radi kako treba tj da kad se stisne uncekira cekirano i refresuje formu -->

<!-- todo kad se dropdown za ucenike otvori malo ekran secne i ucita se skrol  -->

<form id="activityForm" action="{{ route('dashboard.activity') }}" method="GET">
    <div class="text-[14px] flex flex-row mb-[30px]">
        <div class="">
            <div class="rounded">
                <div class="relative">
                    <button id="uceniciButton" class="w-auto rounded focus:outline-none uceniciDrop-toggle" type="button">
                        <?php if($ucenik==="Sve") {
                            echo "<span class='float-left'>";
                        } else {
                            echo "<span class='float-left bg-blue-200 text-blue-800 px-[8px] py-[2px]'>";
                        }
                        ?>
                        Ucenici: <?php echo $ucenik ?> <i class="px-[7px] fas fa-angle-down"></i></span>
                    </button>
                    <div id="uceniciDropdown"
                         class="uceniciMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md top-[42px] pin-l border-2 border-gray-300">
                        <ul class="border-b-2 border-gray-300 list-reset">
                            <li class="p-2 pb-[15px] border-b-[2px] relative border-gray-300">
                                <input class="w-full h-10 px-2 border-2 rounded focus:outline-none"
                                       placeholder="Search"
                                       onkeyup="filterFunction('searchUcenici', 'uceniciDropdown', 'dropdown-item-izdato')"
                                       id="searchUcenici"><br>
                                <button type="button"
                                    class="absolute block text-xl text-center text-gray-400 transition-colors w-7 h-7 leading-0 top-[14px] right-4 focus:outline-none hover:text-gray-900">
                                    <i class="fas fa-search"></i>
                                </button>
                            </li>
                            <div class="h-[200px] scroll">
                                @foreach($students as $student)
                                    <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-izdato" onclick="this.querySelector('input').click()">
                                        <label class="flex items-center justify-start">
                                            <div
                                                class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">
                                                <input type="checkbox" class="absolute opacity-0" name="ucenik[]" value="{{ $student->id }}" {{ in_array($student->id, $ucenici) ? 'checked' : '' }}>
                                                <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                     viewBox="0 0 20 20">
                                                    <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />
                                                </svg>
                                            </div>
                                        </label>
                                        <img width="40px" height="30px" class="ml-[15px] rounded-full"
                                             src="{{ $student->photoPath }}">
                                        <p
                                            class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                            {{ $student->name }} {{ $student->surname }}
                                        </p>
                                    </li>
                                @endforeach
                            </div>
                        </ul>
                        <div class="flex pt-[10px] text-white ">
                            <button type="submit"
                               class="btn-animation py-2 px-[20px] transition duration-300 ease-in hover:bg-[#46A149] bg-[#4CAF50] rounded-[5px]">
                                Sacuvaj <i class="fas fa-check ml-[4px]"></i>
                            </button>
                            <button type="button" data-dropdown="uceniciDropdown"
                               class="activity-reset btn-animation ml-[20px] py-2 px-[20px] transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                Ponisti <i class="fas fa-times ml-[4px]"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ml-[25px]">
            <div class="rounded">
                <div class="relative">
                    <button id="bibliotekariButton" class="w-auto rounded focus:outline-none bibliotekariDrop-toggle" type="button">
                        <?php if($bibliotekar==="Sve") {
                            echo "<span class='float-left'>";
                        } else {
                            echo "<span class='float-left bg-blue-200 text-blue-800 px-[8px] py-[2px]'>";
                        }
                        ?>
                        Bibliotekari: <?php echo $bibliotekar ?> <i class="px-[7px] fas fa-angle-down"></i></span>
                    </button>
                    <div id="bibliotekariDropdown"
                         class="bibliotekariMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md pin-t pin-l border-2 border-gray-300">
                        <ul class="border-b-2 border-gray-300 list-reset">
                            <li class="p-2 pb-[15px] border-b-[2px] relative border-gray-300">
                                <input class="w-full h-10 px-2 border-2 rounded focus:outline-none"
                                       placeholder="Search"
                                       onkeyup="filterFunction('searchBibliotekari', 'bibliotekariDropdown', 'dropdown-item-bibliotekar')"
                                       id="searchBibliotekari"><br>
                                <button type="button"
                                    class="absolute block text-xl text-center text-gray-400 transition-colors w-7 h-7 leading-0 top-[14px] right-4 focus:outline-none hover:text-gray-900">
                                    <i class="fas fa-search"></i>
                                </button>
                            </li>
                            <div class="h-[200px] scroll">
                                @foreach($librarians as $librarian)
                                    <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-bibliotekar" onclick="this.querySelector('input').click()">
                                        <label class="flex items-center justify-start">
                                            <div
                                                class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">
                                                <input type="checkbox" class="absolute opacity-0" name="bibliotekar[]" value="{{ $librarian->id }}" {{ in_array($librarian->id, $bibliotekari) ? 'checked' : '' }}>
                                                <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                     viewBox="0 0 20 20">
                                                    <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />
                                                </svg>
                                            </div>
                                        </label>
                                        <img width="40px" height="30px" class="ml-[15px] rounded-full"
                                             src="{{ $librarian->photoPath }}">
                                        <p
                                            class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                            {{ $librarian->name }} {{ $librarian->surname }}
                                        </p>
                                    </li>
                                @endforeach
                            </div>
                        </ul>
                        <div class="flex pt-[10px] text-white ">
                            <button type="submit"
                               class="btn-animation py-2 px-[20px] transition duration-300 ease-in hover:bg-[#46A149] bg-[#4CAF50] rounded-[5px]">
                                Sacuvaj <i class="fas fa-check ml-[4px]"></i>
                            </button>
                            <button type="button" data-dropdown="bibliotekariDropdown"
                               class="activity-reset btn-animation ml-[20px] py-2 px-[20px] transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                Ponisti <i class="fas fa-times ml-[4px]"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ml-[25px]">
            <div class="rounded">
                <div class="relative">
                    <button class="w-auto rounded focus:outline-none" id="knjigeMenu" type="button">
                        <?php if($knjiga==="Sve") {
                            echo "<span class='float-left'>";
                        } else {
                            echo "<span class='float-left bg-blue-200 text-blue-800 px-[8px] py-[2px]'>";
                        }
                        ?>
                        Knjiga: <?php echo $knjiga ?> <i class="px-[7px] fas fa-angle-down"></i></span>
                    </button>
                    <div id="knjigeDropdown"
                         class="knjigeMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md pin-t pin-l border-2 border-gray-300">
                        <ul class="border-b-2 border-gray-300 list-reset">
                            <li class="p-2 pb-[15px] border-b-[2px] relative border-gray-300">
                                <input class="w-full h-10 px-2 border-2 rounded focus:outline-none"
                                       placeholder="Search"
                                       onkeyup="filterFunction('searchKnjige', 'knjigeDropdown', 'dropdown-item-knjiga')"
                                       id="searchKnjige"><br>
                                <button type="button"
                                    class="absolute block text-xl text-center text-gray-400 transition-colors w-7 h-7 leading-0 top-[14px] right-4 focus:outline-none hover:text-gray-900">
                                    <i class="fas fa-search"></i>
                                </button>
                            </li>
                            <div class="h-[200px] scroll">
                                @foreach($books as $book)
                                    <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-knjiga" onclick="this.querySelector('input').click()">
                                        <label class="flex items-center justify-start">
                                            <div
                                                class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">
                                                <input type="checkbox" class="absolute opacity-0" name="knjiga[]" value="{{ $book->id }}" {{ in_array($book->id, $knjige) ? 'checked' : '' }}>
                                                <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                     viewBox="0 0 20 20">
                                                    <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />
                                                </svg>
                                            </div>
                                        </label>
                                        <img width="30px" height="30px" class="ml-[15px]"
                                             src="{{ $book->cover() }}">
                                        <p
                                            class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                            {{ $book->title }}
                                        </p>
                                    </li>
                                @endforeach
                            </div>
                        </ul>
                        <div class="flex pt-[10px] text-white ">
                            <button type="submit"
                               class="btn-animation py-2 px-[20px] transition duration-300 ease-in hover:bg-[#46A149] bg-[#4CAF50] rounded-[5px]">
                                Sacuvaj <i class="fas fa-check ml-[4px]"></i>
                            </button>
                            <button type="reset"
                               class="btn-animation ml-[20px] py-2 px-[20px] transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                Ponisti <i class="fas fa-times ml-[4px]"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ml-[25px]">
            <div class="rounded">
                <div class="relative">
                    <button class="w-auto rounded focus:outline-none" id="transakcijeMenu" type="button">
                        <?php if($transakcija==="Sve") {
                            echo "<span class='float-left'>";
                        } else {
                            echo "<span class='float-left bg-blue-200 text-blue-800 px-[8px] py-[2px]'>";
                        }
                        ?>
                        Transakcije: <?php echo $transakcija ?> <i class="px-[7px] fas fa-angle-down"></i></span>

                    </button>
                    <div id="transakcijeDropdown"
                         class="transakcijeMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md pin-t pin-l border-2 border-gray-300">
                        <ul class="border-b-2 border-gray-300 list-reset">
                            <li class="p-2 pb-[15px] border-b-[2px] relative border-gray-300">
                                <input class="w-full h-10 px-2 border-2 rounded focus:outline-none"
                                       placeholder="Search"
                                       onkeyup="filterFunction('searchTransakcije', 'transakcijeDropdown', 'dropdown-item-transakcije')"
                                       id="searchTransakcije"><br>
                                <button type="button"
                                    class="absolute block text-xl text-center text-gray-400 transition-colors w-7 h-7 leading-0 top-[14px] right-4 focus:outline-none hover:text-gray-900">
                                    <i class="fas fa-search"></i>
                                </button>
                            </li>
                            <div class="h-[200px] scroll">
                                <li onclick="this.querySelector('input').click()" class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-transakcije">
                                    <label class="flex items-center justify-start">
                                        <div
                                            class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">
                                            <input type="checkbox" class="absolute opacity-0" name="transakcija[]" value="izdavanjeRez" {{ in_array('izdavanjeRez', $transakcije) ? 'checked' : '' }}>
                                            <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                 viewBox="0 0 20 20">
                                                <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />
                                            </svg>
                                        </div>
                                    </label>
                                    <p
                                        class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                        Izdavanje knjiga po rezervaciji
                                    </p>
                                </li>
                                <li onclick="this.querySelector('input').click()" class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-transakcije">
                                    <label class="flex items-center justify-start">
                                        <div
                                            class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">
                                            <input type="checkbox" class="absolute opacity-0" name="transakcija[]" value="izdavanje" {{ in_array('izdavanje', $transakcije) ? 'checked' : '' }}>
                                            <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                 viewBox="0 0 20 20">
                                                <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />
                                            </svg>
                                        </div>
                                    </label>
                                    <p
                                        class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                        Izdavanje knjiga
                                    </p>
                                </li>
                                <li onclick="this.querySelector('input').click()" class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-transakcije">
                                    <label class="flex items-center justify-start">
                                        <div
                                            class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">
                                            <input type="checkbox" class="absolute opacity-0" name="transakcija[]" value="vracanje" {{ in_array('vracanje', $transakcije) ? 'checked' : '' }}>
                                            <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                 viewBox="0 0 20 20">
                                                <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />
                                            </svg>
                                        </div>
                                    </label>
                                    <p
                                        class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                        Vracanje knjiga
                                    </p>
                                </li>
                                <li onclick="this.querySelector('input').click()" class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-transakcije">
                                    <label class="flex items-center justify-start">
                                        <div
                                            class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">
                                            <input type="checkbox" class="absolute opacity-0" name="transakcija[]" value="vracanjePrek" {{ in_array('vracanjePrek', $transakcije) ? 'checked' : '' }}>
                                            <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                 viewBox="0 0 20 20">
                                                <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />
                                            </svg>
                                        </div>
                                    </label>
                                    <p
                                        class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                        Vracanje knjiga sa prekoracenjem
                                    </p>
                                </li>
                                <li onclick="this.querySelector('input').click()" class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-transakcije">
                                    <label class="flex items-center justify-start">
                                        <div
                                            class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">
                                            <input type="checkbox" class="absolute opacity-0" name="transakcija[]" value="otpis" {{ in_array('otpis', $transakcije) ? 'checked' : '' }}>
                                            <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                 viewBox="0 0 20 20">
                                                <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />
                                            </svg>
                                        </div>
                                    </label>
                                    <p
                                        class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                        Otpisivanje knjiga
                                    </p>
                                </li>
                            </div>
                        </ul>
                        <div class="flex pt-[10px] text-white ">
                            <button type="submit"
                               class="btn-animation py-2 px-[20px] transition duration-300 ease-in hover:bg-[#009688] bg-[#46A149] rounded-[5px]">
                                Sacuvaj <i class="fas fa-check ml-[4px]"></i>
                            </button>
                            <button type="reset"
                               class="btn-animation ml-[20px] py-2 px-[20px] transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                Ponisti <i class="fas fa-times ml-[4px]"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ml-[25px]">
            <div class="rounded">
                <div class="relative">
                    <button class="w-auto rounded focus:outline-none datumDrop-toggle" type="button">
                        <?php if($datum==="Sve") {
                            echo "<span class='float-left'>";
                        } else {
                            echo "<span class='float-left bg-blue-200 text-blue-800 px-[8px] py-[2px]'>";
                        }
                        ?>
                        Datum: <?php echo $datum ?> <i class="px-[7px] fas fa-angle-down"></i></span>
                    </button>
                    <div id="datumDropdown"
                         class="datumMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md pin-t pin-l border-2 border-gray-300">
                        <div
                            class="flex justify-between flex-row p-2 pb-[15px] border-b-[2px] relative border-gray-300">
                            <div>
                                <label class="font-bold text-gray-500">Period od:</label>
                                <input type="date" class="border-[1px] border-[#e4dfdf]  cursor-pointer focus:outline-none" name="od" value="{{ isset($od) ? $od : '' }}">
                            </div>
                            <div class="ml-[50px]">
                                <label class="font-bold text-gray-500">Period do:</label>
                                <input type="date" class="border-[1px] border-[#e4dfdf]  cursor-pointer focus:outline-none" name="do" value="{{ isset($do) ? $do : '' }}">
                            </div>
                        </div>
                        <div class="flex pt-[10px] text-white ">
                            <button type="submit"
                               class="btn-animation py-2 px-[20px] transition duration-300 ease-in hover:bg-[#009688] bg-[#46A149] rounded-[5px]">
                                Sacuvaj <i class="fas fa-check ml-[4px]"></i>
                            </button>
                            <button type="reset" onclick="document.getElementById('datumDropdown').querySelectorAll('input').forEach(function($v) {$v.removeAttribute('value');})"
                               class="btn-animation ml-[20px] py-2 px-[20px] transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                Ponisti <i class="fas fa-times ml-[4px]"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ml-[35px] cursor-pointer hover:text-blue-600">
            <button type="submit">
                <i class="fa fa-check"></i>
            </button>
        </div>
        <div class="ml-[35px] cursor-pointer hover:text-blue-600">
            <a href="{{ route('dashboard.activity') }}">
                <i class="fas fa-sync-alt"></i>
            </a>
        </div>
    </div>
</form>
