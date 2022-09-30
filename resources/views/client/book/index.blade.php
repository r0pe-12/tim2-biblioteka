<x-landing-layout>
    @section('scripts')
        <script class="u-script" type="text/javascript" src="{{ asset('js/landing/reserveBoook.js') }}" crossorigin="anonymous"></script>
    @endsection
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="card-body">
            <div class="row">
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