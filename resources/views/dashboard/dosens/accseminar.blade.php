@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Penilaian Bimbingan</h1>
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
                    <th scope="col">Laporan</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($seminars as $seminar)
                    <tr>
                        <td class="py-4">{{ $loop->iteration }}</td>
                        <td class="py-4">{{ $seminar->mahasiswa->npm }}</td>
                        <td class="py-4">{{ $seminar->mahasiswa->nama }}</td>
                        <td class="py-4">{{ $seminar->mahasiswa->kelas }}</td>
                        <td class="py-4"><a href="{{ asset('storage/' . $seminar->laporan) }}"
                                class="btn btn-success btn-sm" target="_blank">Lihat
                                Laporan</a></td>
                        <td class="pt-3 text-center">
                            @if ($seminar->accSeminar == 1)
                                <p class="mt-2">Sudah ACC</p>
                            @else
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                    data-target="#progresCreate{{ $seminar->id }}">
                                    Acc Seminar
                                </button>
                            @endif
                        </td>
                    </tr>
            </tbody>
            <form method="POST" action="/dashboard/seminars/accseminar/{{ $seminar->id }}" class="mb-3"
                enctype="multipart/form-data">
                <div class="modal fade" id="progresCreate{{ $seminar->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="formAcceptTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="formAcceptTitle">Form Acc Seminar</h5>
                            </div>
                            <div class="modal-body">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <select class="form-select" name="accSeminar" required>
                                            <option value="1" selected>Acc Seminar</option>
                                            <option value="0">Tidak Acc</option>
                                        </select>
                                        @error('accSeminar')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            @endforeach
        </table>
    </div>
@endsection
