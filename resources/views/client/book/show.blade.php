<x-landing-layout>
    @section('scripts')
        <script class="u-script" type="text/javascript" src="{{ asset('js/landing/reserveBook.js') }}" crossorigin="anonymous"></script>
    @endsection
    <div class="container rounded bg-white mb-5">
        <!-- design by https://github.com/Alldden -->
        <div class="card-body">
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3" style="border: none">
                            <div class="card pt-5">

                                <div class="row g-0">
                                    <div id="border" class="col-md-7 border-end d-flex flex-column /*justify-content-center*/">
                                        <div>
                                            <div class="main_image">
                                                <img src="{{ $book->cover() }}" id="main_product_image" alt=""></div>
                                            <div class="thumbnail_images">
                                                <ul id="thumbnail" class="overflow-auto ps-0">
                                                    @foreach ($book->photos as $image)
                                                        <li><img class="thumbnail_image" onclick="changeImg(this)" src="{{ $image->path }}" alt=""></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="p-3 right-side" style="padding-top: 0 !important;">
                                            <div class="d-flex justify-content-between align-items-center"><h1 class="fw-bold">{{$book->title}}</h1></div>
                                            <h4 class="text-gray">
                                                @foreach($book->authors as $author)
                                                    {{ $author->name }} {{ $author->surname }}{!! $loop->remaining >= 1 ? ',&nbsp;' : ''!!}
                                                @endforeach
                                            </h4>
                                            <div class="mt-2 pr-3 content"><p>{!! $book->description !!}</p>
                                            </div>

                                            <div class="d-grid gap-2 pt-5">
                                                @if(auth()->check() && auth()->user()->isStudent())
                                                    <button {{ $book->ableToBorrow() && \App\Models\Student::findOrFail(auth()->user()->id)->ableToGet($book->id, true) ? '' : 'disabled'}} onclick="pullReserveModal(this)" data-book-id="{{ $book->id }}" data-book-name="{{ $book->title }}" class="btn btn-prem">Rezerviši</button>
                                                @else
                                                    <button disabled class="btn btn-premium">Nije moguće rezervisati knjigu</button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-landing-layout>
