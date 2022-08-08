@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Mahasiswa </h1>
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

    <div class="table-responsive col-lg-12">
        @can('koordinator')
            <a href="/dashboard/register/mhs" class="btn btn-primary">Tambah Mahasiswa</a>
        @endcan
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NPM</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Email</th>
                    <th scope="col">Pembimbing</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswas as $mahasiswa)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $mahasiswa->nama }}</td>
                        {{-- <td>{{ $mahasiswa->pembimbing->name }}</td> --}}
                        <td>{{ $mahasiswa->npm }}</td>
                        <td>{{ $mahasiswa->kelas }}</td>
                        <td>{{ $mahasiswa->email }}</td>
                        <td>{{ $mahasiswa->pembimbing->nama }}</td>
                        <td>
                            <a href="/dashboard/logbooks/mhs/{{ $mahasiswa->npm }}" class="badge bg-info"><span
                                    data-feather="eye"></span></a>
                            <a href="/dashboard/mahasiswas/{{ $mahasiswa->slug }}/edit" class="badge bg-warning"><span
                                    data-feather="edit"></span></a>
                            <form action="/dashboard/mahasiswas/{{ $mahasiswa->slug }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span
                                        data-feather="x-circle"></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
