@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Mahasiswa </h1>
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
            <a href="/dashboard/mahasiswas/create" class="btn btn-primary">Tambah Mahasiswa</a>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#importDataModal">Import</button>
            <div class="modal fade" id="importDataModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="/dashboard/mahasiswa/import" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="cover">Upload File</label>
                                    <input type="file" class="form-control" name="file" />
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Import Data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">NPM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Email</th>
                    <th scope="col">Nomor HP</th>
                    <th scope="col">Pembimbing</th>
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
                        <td class="py-4">{{ $mahasiswa->email }}</td>
                        <td class="py-4">{{ $mahasiswa->noHp }}</td>
                        @if ($mahasiswa->dosen_id === null)
                            <td class="py-4">Belum Punya</td>
                        @else
                            <td class="py-4">{{ $mahasiswa->pembimbing->nama }}</td>
                        @endif
                        <td class="pt-3 text-center">
                            @can('dosen')
                            @endcan
                            {{-- <a href="/dashboard/mahasiswas/{{ $mahasiswa->slug }}/edit"
                                class="btn btn-primary btn-sm">Lihat</a> --}}
                            @can('koordinator')
                                <a href="/dashboard/mahasiswas/{{ $mahasiswa->slug }}/edit"
                                    class="btn btn-warning btn-sm">Ubah</a>
                                <form action="/dashboard/mahasiswas/{{ $mahasiswa->slug }}" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure?')">Hapus</button>
                                </form>
                            @endcan
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
