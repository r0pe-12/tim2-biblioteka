<x-landing-layout>
    <div class="container rounded bg-white mb-5">
        <!-- design by https://github.com/Alldden -->
        <div class="card-body">
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Aktivne rezervacije</h6>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Knjiga</th>
                                            <th>Datum rezervacije</th>
                                            <th>Rezervacija ističe</th>
                                            <th>Status</th>
                                            <th>Akcija</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($activeRes) > 0)
                                            @foreach($activeRes as $reservation)
                                                <tr>
                                                    <td>{{ $reservation->book->title }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($reservation->submttingDate)->format('d.m.Y') }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($reservation->submttingDate)->addDays($res_deadline->value)->format('d.m.Y') }}</td>
                                                    <td>{{ $reservation->status }}</td>
                                                    <td><button class="btn btn-outline-danger">Otkaži</button></td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td class="text-center" colspan="5">Nemate aktivnih rezervacija</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow mb-4" style="margin-top: 100px">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Arhivirane rezervacije</h6>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Knjiga</th>
                                            <th>Datum rezervacije</th>
                                            <th>Rezervacija zatvorena</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($archiveRes) > 0)
                                            @foreach($archiveRes as $reservation)
                                                <tr>
                                                    <td>{{ $reservation->book->title }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($reservation->submttingDate)->format('d.m.Y') }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($reservation->closingDate)->format('d.m.Y') }}</td>
                                                    <td>
                                                        <div class="inline-block px-[6px] py-[2px] font-medium {{ $reservation->closingReason_id == \App\Models\ClosingReason::BOOK_BORROWED ? 'bg-green-200' : 'bg-red-200' }} rounded-[10px]">
                                                            <span class="{{ $reservation->closingReason_id == \App\Models\ClosingReason::BOOK_BORROWED ? 'text-green-800' : 'text-red-800' }}">{{ $reservation->cReason }}</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td class="text-center" colspan="4">Nemate arhiviranih rezervacija</td>
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
</x-landing-layout>
