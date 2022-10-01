<x-landing-layout>
    @section('scripts')
        <script class="u-script" type="text/javascript" src="{{ asset('js/landing/reserveBook.js') }}" crossorigin="anonymous"></script>
    @endsection
    <div class="container rounded bg-white mb-5">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6 offset-sm-3 mt-3">
                    <form onsubmit="event.preventDefault()" id="searchBookForm">
                        <div class="input-group">
                            <input class="form-control border-end-0 border rounded-pill" type="search" placeholder="Search" id="searchBar" autocomplete="off" name="searchWord">
                            <span class="input-group-append">
                                <button class="btn btn-outline-secondary bg-white border-bottom-0 border rounded-pill ms-n5" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-5">
{{--                <div class="col-md-3">--}}

{{--                </div>--}}
                <div class="col-md-12">
                    <div class="row">
                        @foreach($books as $book)
                            <x-client-books-card :book="$book"/>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-landing-layout>
