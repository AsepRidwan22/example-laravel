@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Bimbingan </h1>
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

    <div class="table-responsive col-lg-8">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">NPM</th>
                    <th scope="col">Nama</th>
                    @can('koordinator')
                        <th scope="col">Logbook</th>
                        <th scope="col">Progres</th>
                    @endcan
                    <th scope="col">Pembimbing</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswas as $mahasiswa)
                    <tr>
                        <td class="py-4">{{ $loop->iteration }}</td>
                        <td class="py-4">{{ $mahasiswa->npm }}</td>
                        <td class="py-4">{{ $mahasiswa->nama }}</td>
                        @can('koordinator')
                            <td class="py-4">{{ $logbooks->where('mahasiswa_id', $mahasiswa->id)->count() }}</td>
                            @if ($progres->where('mahasiswa_id', $mahasiswa->id)->count() + 1 == 5)
                                <td class="py-4">Sudah ACC</td>
                            @else
                                <td class="py-4">BAB {{ $progres->where('mahasiswa_id', $mahasiswa->id)->count() + 1 }}</td>
                            @endif
                        @endcan
                        <td class="py-4">{{ $mahasiswa->pembimbing->nama }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
