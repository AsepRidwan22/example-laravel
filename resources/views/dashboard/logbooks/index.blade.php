@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
        <h1 class="h2">Logbook {{ auth()->user()->name }}</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('danger'))
        <div class="alert alert-danger col-lg-4" role="alert">
            {{ session('danger') }}
        </div>
    @endif
    @foreach ($logbooks as $logbook)
        <div class="card mb-4 col-lg-8">
            {{-- <div class="card-header">
                <h5>
                    Logbook {{ $loop->iteration }}
                </h5>
            </div> --}}
            <div class="card-body">
                {{-- <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
                @if ($logbook->date)
                    <h6 class="card-text">{{ $logbook->date }}</h6>
                    <div class="card-body bg-light border rounded mb-2">
                        <p class="card-text">
                            {{ $logbook->body }}
                        </p>
                    </div>
                @endif
                @can('mahasiswa')
                    <div class="text-center">
                        <a href="/dashboard/logbooks/create"
                            class="btn btn-primary @if ($logbook->isHadir == false) disabled @endif">Lengkapi
                            Logbook </a>
                    </div>
                @endcan
                @can('dosen')
                    @if ($logbook->isHadir == 1)
                        <div class="text-center mt-3">
                            <a href="/dashboard/logbooks/{{ $logbook->id }}/edit" class="btn btn-success">Hadir</a>
                        </div>
                    @else
                        <div class="text-center mt-3">
                            <a href="/dashboard/logbooks/{{ $logbook->id }}/edit" class="btn btn-primary">Buat Paraf</a>
                        </div>
                    @endif
                @endcan
            </div>
        </div>
    @endforeach
@endsection
