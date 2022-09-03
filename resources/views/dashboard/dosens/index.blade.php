@extends('dashboard.layouts.main')

@section('container')
    @can('koordinator')
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Kelola Data Dosen</h1>
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
            <a href="/dashboard/dosens/create" class="btn btn-primary">Tambah Dosen</a>
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama</th>
                        <th scope="col">NIDN</th>
                        <th scope="col">Email</th>
                        <th scope="col" class="text-center">Mahasiswa</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dosens as $dosen)
                        <tr>
                            <td class="py-2">{{ $loop->iteration }}</td>
                            <td class="py-2">{{ $dosen->nama }}</td>
                            <td class="py-2">{{ $dosen->nidn }}</td>
                            <td class="py-2">{{ $dosen->email }}</td>
                            <td class="py-2 text-center">{{ $mahasiswas->where('dosen_id', $dosen->id)->count() }}</td>
                            <td class="py-1 text-center">
                                <button href="/dashboard/dosens/{{ $dosen->slug }}" class="badge bg-primary border-0">List
                                    Mahasiswa</button>
                                <button href="/dashboard/dosens/{{ $dosen->slug }}/edit"
                                    class="badge bg-warning border-0">Ubah</button>
                                <form action="/dashboard/dosens/{{ $dosen->slug }}" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger border-0"
                                        onclick="return confirm('Are you sure?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endcan
    @can('mahasiswa')
        <p>Propil Dosen Pembimbing</p>
    @endcan
@endsection
