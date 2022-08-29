@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Proposal</h1>
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

    <div class="table-responsive col-lg-12">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Laporan</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Ruangan</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($seminars as $seminar)
                    <tr>
                        <td class="py-4">{{ $loop->iteration }}</td>
                        <td class="py-4">{{ $seminar->laporan }}</td>
                        @if ($seminar->tanggal != null)
                            <td class="py-4">{{ $seminar->tanggal }}</td>
                            <td class="py-4">{{ $seminar->waktu }}</td>
                            <td class="py-4">{{ $seminar->ruangan }}</td>
                        @else
                            <td class="py-4">Belum Diisi</td>
                            <td class="py-4">Belum Diisi</td>
                            <td class="py-4">Belum Diisi</td>
                        @endif

                        <td class="pt-3 text-center">
                            <a href="/dashboard/seminars/create" class="btn btn-primary btn-sm">Buat Jadwal</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
