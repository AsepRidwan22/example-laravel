@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pengajuan Seminar</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-12" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('danger'))
        <div class="alert alert-danger col-lg-12" role="alert">
            {{ session('danger') }}
        </div>
    @endif
    @if ($first != null)
        <div class="table-responsive col-lg-12">
            <div class="table-responsive col-lg-20">
                <table class="table table-striped table-lg">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">NPM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Penguji</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Waktu</th>
                            <th scope="col">Ruangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($seminars as $seminar)
                            <tr>
                                <td class="py-4">{{ $loop->iteration }}</td>
                                <td class="py-4">{{ $seminar->mahasiswa->npm }}</td>
                                <td class="py-4">{{ $seminar->mahasiswa->nama }}</td>
                                @if ($seminar->dosen_id != null)
                                    <td class="py-4">{{ $seminar->penguji->nama }}</td>
                                @else
                                    <td class="py-4">Belum Diisi</td>
                                @endif
                                @if ($seminar->tanggal != null)
                                    <td class="py-4">{{ $seminar->tanggal }}</td>
                                    <td class="py-4">{{ $seminar->waktu }}</td>
                                    <td class="py-4">{{ $seminar->ruangan }}</td>
                                @else
                                    <td class="py-4">Belum Diisi</td>
                                    <td class="py-4">Belum Diisi</td>
                                    <td class="py-4">Belum Diisi</td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class=" image d-flex flex-column justify-content-center align-items-center">
            <img src="{{ asset('storage/icon/noData.png') }}" class="mx-auto d-block" alt="Profile Dosen" width="400"
                style="object-fit: cover;">
            <p class="idd">Jadwal masih kosong!</p>
            <p>Silahkan Koordinator membuat jadwal terlebih dahulu</p>
        </div>
    @endif

@endsection
