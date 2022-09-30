@props([
    'book' => null,
])

<div style="margin: auto" class="col-auto">
    <div class="card" style="width: 18rem;height: auto">
        <a style="height: 461px" href="#knjigaPrikaz">
            <img style="object-fit: contain;height: 100%; width: 100%"
                 src="{{ $book->cover() }}" class="book-image" alt="...">
        </a>
        <div class="card-body">
            <h2 class="card-title" style="font-size: x-large"><a href="#knjigaPrikaz">{{ $book->title }}</a>
            </h2>
            <div class="card-text" style="min-height: 120px">
                {!! strip_tags(Str::limit($book->description, 100)) !!}
            </div>
            <div class="d-grid gap-2">
                @if(auth()->check())
                    <button {{ $book->ableToBorrow() && \App\Models\Student::findOrFail(auth()->user()->id)->ableToGet($book->id, true) ? '' : 'disabled'}} onclick="pullReserveModal(this)" data-book-id="{{ $book->id }}" data-book-name="{{ $book->title }}" class="btn btn-prem">Rezerviši</button>
                @endif
{{--                todo da li moramo odje da mu kazemo da mora da se uloguje da bi rezerviso knjigu vljd nije tolko glup--}}
            </div>
        </div>
    </div>
</div>
