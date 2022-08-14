@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Progres Laporan Kerja Praktek</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('danger'))
        <div class="alert alert-danger col-lg-8" role="alert">
            {{ session('danger') }}
        </div>
    @endif

    @foreach ($progress as $progres)
        <div class="card mb-4 col-lg-8">
            <div class="card-header">
                <h6 class="card-text">BAB {{ $loop->iteration }}</h6>
            </div>
            <div class="card-body">
                @if ($progres->laporan != null)
                    <div class="card-body bg-light border rounded mb-2 text-center">
                        <a href="{!! $progres->laporan !!}" class="btn btn-success" target="_blank">Lihat Progres</a>
                    </div>
                @endif

                @can('mahasiswa')
                    @if ($progres->laporan == null)
                        <div class="text-center">
                            <a href="/dashboard/progres/{{ Crypt::encryptString($progres->id) }}/edit"
                                class="btn btn-primary">Lengkapi Progres</a>
                        </div>
                    @endif
                @endcan
                @can('koordinator')
                    @if ($progres->laporan == null)
                        <div class="alert alert-secondary text-center" role="alert">
                            Progres belum terisi
                        </div>
                    @endif
                @endcan
                @can('dosen')
                    @if ($progres->laporan == null)
                        <div class="alert alert-secondary text-center" role="alert">
                            Progres belum terisi
                        </div>
                    @endif
                @endcan
            </div>
        </div>
    @endforeach
@endsection
