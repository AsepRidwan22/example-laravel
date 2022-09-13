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
                        <th scope="col">No HP</th>
                        <th scope="col" class="text-center">Mahasiswa</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dosens as $dosen)
                        <tr>
                            <td class="py-4">{{ $loop->iteration }}</td>
                            <td class="py-4">{{ $dosen->nama }}</td>
                            <td class="py-4">{{ $dosen->nidn }}</td>
                            <td class="py-4">{{ $dosen->email }}</td>
                            <td class="py-4">{{ $dosen->noHp }}</td>
                            <td class="py-4 text-center">{{ $mahasiswas->where('dosen_id', $dosen->id)->count() }}</td>
                            <td class="py-3 text-center">
                                <a href="/dashboard/mahasiswas/edit" class="btn btn-primary btn-sm">Lihat
                                    Mahasiswa</a>
                                <a href="/dashboard/mahasiswas/edit" class="btn btn-warning btn-sm">Ubah</a>
                                <form action="/dashboard/dosens/{{ $dosen->slug }}" method="POST" class="d-inline">
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
    @endcan
    @can('mahasiswa')
        @if ($pembimbing === null)
            <div class=" image d-flex flex-column justify-content-center align-items-center">
                <img src="https://img.freepik.com/premium-vector/file-found-illustration-with-confused-people-holding-big-magnifier-search-no-result_258153-336.jpg?w=2000"
                    class="mx-auto d-block" alt="Profile Dosen" width="500" style="object-fit: cover;">
                <p class="idd">Belum punya Pembimbing!</p>
                <p>Silahkan ajukan proposal terlebih dahulu</p>
            </div>
        @else
            <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
                <div class="cardz p-4">
                    @foreach ($dosens as $dosen)
                        <div class=" image d-flex flex-column justify-content-center align-items-center">
                            @if ($dosen->photo != null)
                                <img src="{{ asset('storage/' . $dosen->photo) }}" class="rounded-circle mx-auto d-block"
                                    alt="Profile Dosen" height="100" width="100" style="object-fit: cover;">
                            @else
                                <img src="https://www.its.ac.id/international/wp-content/uploads/sites/66/2020/02/blank-profile-picture-973460_1280-300x300.jpg"
                                    class="rounded-circle mx-auto d-block" alt="Profile Dosen" height="100" width="100"
                                    style="object-fit: cover;">
                            @endif
                        </div>
                        <table>
                            <tr>
                                <td class="py-2 px-4 idd">Nama</td>
                                <td>: </td>
                                <td class="p-2 idd">{{ $dosen->nama }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 idd">NIDN</td>
                                <td>: </td>
                                <td class="p-2 idd">{{ $dosen->nidn }}</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 idd">Email</td>
                                <td>: </td>
                                <td class="p-2 idd">{{ $dosen->email }}</td>
                            </tr>
                        </table>
                        <div class=" image d-flex flex-column justify-content-center align-items-center">
                            <div class=" d-flex mt-2">
                                <a href="{{ $dosen->linkGroup }}" class="btn btn-primary btn-lg active" role="button"
                                    aria-pressed="true" target="_blank">Join Group WA</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    @endcan
@endsection
