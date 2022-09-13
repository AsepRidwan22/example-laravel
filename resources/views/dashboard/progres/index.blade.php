@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Progres Laporan Kerja Praktek</h1>
    </div>

    @if ($checkProposal !== 0)
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
                            <a href="{{ asset('storage/' . $progres->laporan) }}" class="btn btn-success"
                                target="_blank">Lihat Progres</a>
                        </div>
                    @endif

                    @can('mahasiswa')
                        @if ($progres->laporan == null)
                            {{-- <a href="/dashboard/progres/{{ Crypt::encryptString($progres->id) }}/edit"
                            class="btn btn-primary">Lengkapi Progres</a> --}}
                            <div class="text-center mt-3">
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                    data-target="#progresCreate{{ $progres->id }}">
                                    Lengkapi Progres
                                </button>
                            </div>
                            @include('dashboard.progres.edit')
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
    @else
        <div class=" image d-flex flex-column justify-content-center align-items-center">
            <img src="https://img.freepik.com/premium-vector/file-found-illustration-with-confused-people-holding-big-magnifier-search-no-result_258153-336.jpg?w=2000"
                class="mx-auto d-block" alt="Profile Dosen" width="500" style="object-fit: cover;">
            <p class="idd">Belum bisa mengisi progres!</p>
            <p>Silahkan ACC proposal terlebih dahulu</p>
        </div>
    @endif
@endsection
