<x-landing-layout>
    @section('title')
        Evidencija izdavanja
    @endsection
    <div class="container rounded bg-white mb-5">
        <!-- design by https://github.com/Alldden -->
        <div class="card-body">
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <nav>
                                <div class="nav nav-pills" id="nav-tab" role="tablist">
                                    <a class="nav-link active" id="izdate" data-bs-toggle="tab" href="#izdate-tab"  role="tab" aria-controls="izdate" aria-selected="true">Izdate knjige</a>
                                    <a class="nav-link" id="vracene" data-bs-toggle="tab" href="#vracene-tab"  role="tab" aria-controls="vracene" aria-selected="false">Vraćene knjige</a>
                                    <a class="nav-link" id="otpisane" data-bs-toggle="tab" href="#otpisane-tab"  role="tab" aria-controls="otpisane" aria-selected="false">Otpisane knjige</a>
                                    <a class="nav-link" id="prekoracene" data-bs-toggle="tab" href="#prekoracene-tab"  role="tab" aria-controls="prekoracene" aria-selected="false">Knjige u prekoračenju</a>
                                </div>
                            </nav>
                        </div>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="izdate-tab" role="tabpanel" aria-labelledby="izdate">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Knjiga</th>
                                                    <th>Datum izdavanja</th>
                                                    <th>Trenutno zadržavanje</th>
                                                    <th>Knjigu izdao</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($izdate) > 0)
                                                    @foreach($izdate as $zapis)
                                                        <tr>
                                                            <td>{{ $zapis->book->title }}</td>
                                                            <td>{{ \Carbon\Carbon::parse($zapis->borrow_date)->format('d.m.Y') }}</td>
                                                            <td><span><x-date-diff :zapis="$zapis"/></span></td>
                                                            <td>{{ $zapis->librarian->name }} {{ $zapis->librarian->surname }}</td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td class="text-center" colspan="5">Nemate aktivnih izdavanja</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="vracene-tab" role="tabpanel" aria-labelledby="vracene">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                            <tr>
                                                <th>Knjiga</th>
                                                <th>Datum izdavanja</th>
                                                <th>Datum vraćanja</th>
                                                <th>Zadržavanje knjige</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(count($returned) > 0)
                                                @foreach($returned as $zapis)
                                                    <tr>
                                                        <td>{{ $zapis->book->title }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($zapis->borrow_date)->format('d.m.Y') }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($zapis->statuses()->latest()->first()->pivot->datum)->format('d.m.Y') }}</td>
                                                        <td><span><x-date-diff :zapis="$zapis" :holded="true"/></span></td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td class="text-center" colspan="4">Nemate vraćenih knjiga</td>
                                                </tr>
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="otpisane-tab" role="tabpanel" aria-labelledby="otpisane">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                            <tr>
                                                <th>Knjiga</th>
                                                <th>Datum izdavanja</th>
                                                <th>Datum otpisivanja</th>
                                                <th>Zadržavanje knjige</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(count($otpisane) > 0)
                                                @foreach($otpisane as $zapis)
                                                    <tr>
                                                        <td>{{ $zapis->book->title }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($zapis->borrow_date)->format('d.m.Y') }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($zapis->statuses()->latest()->first()->pivot->datum)->format('d.m.Y') }}</td>
                                                        <td><span><x-date-diff :zapis="$zapis" :holded="true"/></span></td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td class="text-center" colspan="4">Nemate otpisanih knjiga</td>
                                                </tr>
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="prekoracene-tab" role="tabpanel" aria-labelledby="prekoracene">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                            <tr>
                                                <th>Knjiga</th>
                                                <th>Datum izdavanja</th>
                                                <th>Prekoračenje u danima</th>
                                                <th>Trenutno zadržavanje knjige</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(count($prekoracene) > 0)
                                                @foreach($prekoracene as $prekoracena)
                                                    <tr>
                                                        <td>{{ $prekoracena->book->title }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($prekoracena->borrow_date)->format('d.m.Y') }}</td>
                                                        <td>
                                                            <div
                                                                class="inline-block px-[6px] py-[2px] font-medium bg-red-200 rounded-[10px]">
                                                                <span class="text-red-800"><x-date-diff :zapis="$prekoracena" :failed="true"/></span>
                                                            </div>
                                                        </td>
                                                        <td><span><x-date-diff :zapis="$prekoracena"/></span></td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td class="text-center" colspan="4">Nemate otpisanih knjiga</td>
                                                </tr>
                                            @endif
                                            </tbody>
                                        </table>
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
