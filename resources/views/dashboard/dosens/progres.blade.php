@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Progres Laporan Mahasiswa</h1>
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
                    <th scope="col">NPM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kelas</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswas as $mahasiswa)
                    <tr>
                        <td class="py-4">{{ $loop->iteration }}</td>
                        <td class="py-4">{{ $mahasiswa->npm }}</td>
                        <td class="py-4">{{ $mahasiswa->nama }}</td>
                        <td class="py-4">{{ $mahasiswa->kelas }}</td>
                        <td class="pt-3 text-center">
                            <a href="/dashboard/mahasiswas/progres/{{ $mahasiswa->user_id }}"
                                class="btn btn-primary btn-sm">Progres</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
