@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Profile </h1>
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
        @can('koordinator')
            <a href="/dashboard/profiles/create" class="btn btn-primary">Tambah Profile</a>
        @endcan
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    @can('dosen')
                        <th scope="col">NIDN</th>
                    @endcan
                    @can('mahasiswa')
                        <th scope="col">NPM</th>
                    @endcan
                    <th scope="col">Nama</th>
                    @can('mahasiswa')
                        <th scope="col">Kelas</th>
                    @endcan
                    <th scope="col">Email</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($profiles as $Profile)
                    <tr>
                        <td class="py-4">{{ $loop->iteration }}</td>
                        @can('dosen')
                            <td class="py-4">{{ $Profile->nidn }}</td>
                        @endcan
                        @can('mahasiswa')
                            <td class="py-4">{{ $Profile->npm }}</td>
                        @endcan
                        <td class="py-4">{{ $Profile->nama }}</td>
                        @can('mahasiswa')
                            <td class="py-4">{{ $Profile->kelas }}</td>
                        @endcan
                        <td class="py-4">{{ $Profile->email }}</td>
                        <td class="pt-3 text-center">
                            <a href="/dashboard/profiles/{{ $Profile->slug }}/edit" class="btn btn-warning btn-sm">Ubah</a>
                            <form action="/dashboard/profiles/{{ $Profile->slug }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        $('.alert').alert()
    </script>
@endsection
