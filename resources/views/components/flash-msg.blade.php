@if(session('success'))
    <div class="bg-blue-100 border-t flex items-center border-b border-blue-500 text-blue-700 px-4 py-3" style="background-color:#34d399" role="alert">
        <p class="font-bold items-center">{{session('success')}}</p>
    </div>
@elseif(session('fail'))
    <div class="bg-blue-100 mssg border-t flex items-center border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
        <p class="font-bold items-center">{{session('fail')}}</p>
    </div>
@endif
