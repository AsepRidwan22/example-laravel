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

    @if ($nullSeminars != null)
        <div class="table-responsive col-lg-12">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">NPM</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Laporan</th>
                        <th scope="col">Keterangan Perpus</th>
                        <th scope="col">Bebas Tagihan</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($seminars as $seminar)
                        <tr>
                            <td class="py-4">{{ $loop->iteration }}</td>
                            <td class="py-4">{{ $seminar->mahasiswa->npm }}</td>
                            <td class="py-4">{{ $seminar->mahasiswa->nama }}</td>
                            <td class="py-4">{{ $seminar->laporan }}</td>
                            <td class="py-4">{{ $seminar->keteranganPerpus }}</td>
                            <td class="py-4">{{ $seminar->bebasTagihan }}</td>
                            @if ($seminar->tanggal == null)
                                <td class="pt-3 text-center">
                                    <a href="/dashboard/seminars/{{ $seminar->id }}/addjadwal"
                                        class="btn btn-success btn-sm">Buat
                                        Jadwal</a>
                                </td>
                            @else
                                <td class="pt-4 text-center">
                                    <p>Sudah dibuat</p>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class=" image d-flex flex-column justify-content-center align-items-center">
            <img src="{{ asset('storage/icon/noData.png') }}" class="mx-auto d-block" alt="Profile Dosen" width="400"
                style="object-fit: cover;">
            <p class="idd">Data masih kosong!</p>
            <p>Silahkan tunggu Mahasiswa menyelesaikan KP terlebih dahulu</p>
        </div>
    @endif
@endsection
