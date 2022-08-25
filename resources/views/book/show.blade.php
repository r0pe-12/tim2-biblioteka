<x-layout>
    @section('title')
        Knjiga: {{ $book->title }}
    @endsection
    @section('styles')
        <style>
            .grid {
                display: grid;
                grid-template-columns: 1fr 1fr 1fr;
                grid-gap: 20px;
                align-items: stretch;
                justify-items: center;
            }
            .grid img {
                border: 1px solid #ccc;
                box-shadow: 2px 2px 6px 0px  rgba(0,0,0,0.3);
                max-width: 100%;
            }
        </style>
    @endsection
        <!-- Content -->
        <section class="w-screen h-screen pl-[80px] pb-2 text-gray-700">
            <!-- Heading of content -->
            <x-book-header :book="$book"/>

            <!-- content -->
            <div class="flex flex-row overflow-auto height-osnovniDetalji">
                <div class="w-[80%]">
                    <div class="py-4 text-gray-500 border-[#e4dfdf] pl-[30px]">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-link active" id="osnovniDetalji" data-bs-toggle="tab" href="#osnovniDetalji-tab"  role="tab" aria-controls="osnovniDetalji" aria-selected="true">Osnovni detalji</a>
                                <a class="nav-link" id="specifikacija" data-bs-toggle="tab" href="#specifikacija-tab"  role="tab" aria-controls="specifikacija" aria-selected="false">Specifikacija</a>
                                <a class="nav-link"  href="{{ route('book.izdate1', $book) }}" aria-selected="false">Evidencija iznajmljivanja</a>
                                <a class="nav-link" id="multimedija" data-bs-toggle="tab" href="#multimedija-tab"  role="tab" aria-controls="nav-contact" aria-selected="false">Multimedija</a>
                            </div>
                        </nav>
                    </div>
                    <div class="tab-content" id="nav-tabContent">
                        <!-- OSNOVNI DETALjI -->
                        <div class="tab-pane fade show active" id="osnovniDetalji-tab" role="tabpanel" aria-labelledby="osnovniDetalji">
                            <div class="scroll height-content section-content">
                                <!-- Space for content -->
                                <div class="pl-[30px] section- mt-[20px]">
                                        <div class="flex flex-row justify-between">
                                            <div class="mr-[30px]">
                                                <div class="mt-[20px]">
                                                    <span class="text-gray-500 text-[14px]">Naziv knjige</span>
                                                    <p class="font-medium">{{ $book->title }}</p>
                                                </div>
                                                <div class="mt-[40px]">
                                                    <span class="text-gray-500 text-[14px]">Kategorija/je</span>
                                                    <p class="font-medium">
                                                        @foreach($book->categories as $category)
                                                            <a href="#">{{ $category->name }}</a>{!! $loop->remaining >= 1 ? ',&nbsp;&nbsp;&nbsp;' : ''!!}
                                                        @endforeach
                                                    </p>
                                                </div>
                                                <div class="mt-[40px]">
                                                    <span class="text-gray-500 text-[14px]">Zanr</span>
                                                    <p class="font-medium">
                                                        @foreach($book->genres as $genre)
                                                            <a href="#">{{ $genre->name }}</a>{!! $loop->remaining >= 1 ? ',&nbsp;&nbsp;&nbsp;' : ''!!}
                                                        @endforeach
                                                    </p>
                                                </div>
                                                <div class="mt-[40px]">
                                                    <span class="text-gray-500 text-[14px]">Autor/ri</span>
                                                    <p class="font-medium">
                                                        @foreach($book->authors as $author)
                                                            <a href="{{ route('authors.show', $author) }}">{{ $author->name }}</a>{!! $loop->remaining >= 1 ? ',&nbsp;&nbsp;&nbsp;' : ''!!}
                                                        @endforeach
                                                    </p>
                                                </div>
                                                <div class="mt-[40px]">
                                                    <span class="text-gray-500 text-[14px]">Izdavac</span>
                                                    <p class="font-medium"><a href="#">{{ $book->publisher->name }}</a></p>
                                                </div>
                                                <div class="mt-[40px]">
                                                    <span class="text-gray-500 text-[14px]">Godina izdavanja</span>
                                                    <p class="font-medium">{{ $book->publishDate }}</p>
                                                </div>
                                            </div>
                                            <div class="mr-[70px] mt-[20px] flex flex-col max-w-[600px]">
                                                    <h4 class="text-gray-500 ">
                                                        Storyline (Kratki sadrzaj)
                                                    </h4>
                                                <div class="scroll" style="max-height: 511px">
                                                    <p class=" my-[10px]">
                                                        {!! $book->description !!}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <!-- kraj OSNOVNI DETALJI -->

                        <!-- SPECIFIKACIJE -->
                        <div class="tab-pane fade" id="specifikacija-tab" role="tabpanel" aria-labelledby="specifikacija">
                            <div class="scroll height-content section-content">
                                <!-- Space for content -->
                                <div class="pl-[30px] section- mt-[20px]">
                                    <div class="flex flex-row justify-between">
                                        <div class="mr-[30px]">
                                            <div class="mt-[20px]">
                                                <span class="text-gray-500 text-[14px]">Broj strana</span>
                                                <p class="font-medium">{{ $book->pageNum }}</p>
                                            </div>
                                            <div class="mt-[40px]">
                                                <span class="text-gray-500 text-[14px]">Pismo</span>
                                                <p class="font-medium"><a href="#">{{ $book->script->name }}</a></p>
                                            </div>
                                            <div class="mt-[40px]">
                                                <span class="text-gray-500 text-[14px]">Jezik</span>
                                                <p class="font-medium"><a href="#">{{ $book->lang->name }}</a></p>
                                            </div>
                                            <div class="mt-[40px]">
                                                <span class="text-gray-500 text-[14px]">Povez</span>
                                                <p class="font-medium"><a href="#">{{ $book->bookBind->name }}</a></p>
                                            </div>
                                            <div class="mt-[40px]">
                                                <span class="text-gray-500 text-[14px]">Format</span>
                                                <p class="font-medium"><a href="#">{{ $book->format->name }}</a></p>
                                            </div>
                                            <div class="mt-[40px]">
                                                <span class="text-gray-500 text-[14px]">International Standard Book Number
                                                    (ISBN)</span>
                                                <p class="font-medium">{{ $book->isbn }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- kraj SPECIFIKACIJE -->

                        <!-- EVIDENCIJA IZNAJMLjIVANjA -->
                            <!-- prebacujemo u novi tab -->
                        <!-- kraj EVIDENCIJA IZNAJMLjIVANjA -->

                        <!-- MULTIMEDIJA -->
                        <div class="tab-pane fade" id="multimedija-tab" role="tabpanel" aria-labelledby="multimedija">
                            <div class="scroll grid p-[10px]" style="max-height: 700px">
                                @foreach($book->photos as $photo)
                                    <img src="{{ $photo->path }}" alt="">
                                @endforeach
                            </div>
                        </div>
                        <!-- kraj MULTIMEDIJA -->
                    </div>
                </div>
                <x-book-borrow-history :book="$book"/>
            </div>
        </section>
        <!-- End Content -->
</x-layout>>
