@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
        <h1 class="h2">Logbook {{ $mahasiswa }}</h1>
    </div>
    @can('mahasiswa')
        @if ($checkProposal == 1)
        @endcan
        <div class="d-flex justify-content-center">
            @if (session()->has('success'))
                <div class="alert alert-success col-lg-6" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div class="d-flex justify-content-center">
            @if (session()->has('danger'))
                <div class="alert alert-danger col-lg-6" role="alert">
                    {{ session('danger') }}
                </div>
            @endif
        </div>
        @foreach ($logbooks as $logbook)
            <div class="d-flex justify-content-center">
                <div class="card mb-4 col-lg-6">
                    <div class="card-header d-flex justify-content-between">
                        @if ($logbook->date == null)
                            <h6 class="card-text">Bimbingan {{ $loop->iteration }}</h6>
                        @else
                            <h6 class="card-text">{{ $logbook->date }}</h6>
                        @endif

                        @if ($logbook->isHadir == true)
                            <h6 class="card-text">Verified</h6>
                        @elseif ($logbook->isHadir === null)
                            @if ($logbook->body != null)
                                <h6 class="card-text">Menunggu Verifikasi</h6>
                            @endif
                        @else
                            <h6 class="card-text">Belum Terverifikasi</h6>
                        @endif

                    </div>
                    <div class="card-body">
                        {{-- <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
                        @if ($logbook->body != null)
                            <div class="card-body bg-light border rounded mb-2">
                                <p class="card-text">
                                    {!! $logbook->body !!}
                                </p>
                            </div>
                        @else
                            @can('koordinator')
                                <div class="alert alert-secondary text-center" role="alert">
                                    Logbook belum terisi
                                </div>
                            @endcan
                        @endif
                        @can('mahasiswa')
                            @if ($logbook->body == null)
                                <div class="text-center">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#logbookCreate{{ $logbook->id }}">
                                        Lengkapi Logbook
                                    </button>
                                </div>
                                @include('dashboard.logbooks.create')
                            @endif
                            @if ($logbook->isHadir === 0)
                                <div class="text-center">
                                    <a href="/dashboard/logbooks/{{ Crypt::encryptString($logbook->id) }}/create"
                                        class="btn btn-primary">Ubah
                                        Logbook</a>
                                </div>
                            @endif
                        @endcan
                        @can('dosen')
                            @if ($logbook->isHadir === null)
                                <div class="text-center mt-3">
                                    <a href="/dashboard/logbooks/{{ $logbook->id }}/edit"
                                        class="btn btn-primary @if ($logbook->body === null) disabled @endif">Verifikasi
                                        Logbook</a>
                                </div>
                            @endif
                        @endcan
                    </div>
                </div>
            </div>
        @endforeach
        @can('mahasiswa')
        @else
        @endcan
        <p>Silahkan Ajukan Dulu Proposal</p>
    @endif
@endsection
