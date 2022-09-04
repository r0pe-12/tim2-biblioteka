@props([
    /** @var \mixed */
    'zapis',
    'holded' => false,
    'failed' => false
])

@if($zapis->isActive())
    @if($failed == "true")
        {{ $zapis->return_date < today('Europe/Belgrade') ? str_replace(['pre', 'nedelju', 'mesec', '1 sekundu'], ['', 'nedelja', 'mjesec', 'Manje od jednog dana'], \App\Models\Carbon::parse($zapis->return_date)->diffInDays(today('Europe/Belgrade'))) . ' dana' : 'Nema prekoračenja' }}
    @else
        {{ str_replace(['pre', 'nedelju', 'mesec', '1 sekundu'], ['', 'nedelja', 'mjesec', 'Manje od jednog dana'], \App\Models\Carbon::parse($zapis->borrow_date)->diffForHumans(today('Europe/Belgrade'), null, false, 3)) }}
    @endif

@else
    @if($failed == "true")
        {{ $zapis->return_date < today('Europe/Belgrade') ? str_replace(['pre', 'nedelju', 'mesec', '1 sekundu'], ['', 'nedelja', 'mjesec', 'Manje od jednog dana'], \App\Models\Carbon::parse($zapis->return_date)->diffInDays(date('Y-m-d', strtotime($zapis->statuses()->latest()->first()->pivot->datum)))) . ' dana' : 'Nema prekoračenja' }}
    @else
        {{ str_replace(['pre', 'nedelju', 'mesec', '1 sekundu'], ['', 'nedelja', 'mjesec', 'Manje od jednog dana'], \App\Models\Carbon::parse($zapis->borrow_date)->diffForHumans(date('Y-m-d', strtotime($zapis->statuses()->latest()->first()->pivot->datum)), null, false, 3)) }}
    @endif
@endif


