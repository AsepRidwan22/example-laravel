@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ajukan Seminar</h1>
    </div>

    @if ($logbookCount == 7 && $progresCount == 4)
        <div class="col-lg-8">
            <form method="POST" action="/dashboard/seminars" class="mb-5" enctype="multipart/form-data">
                @csrf
                @if ($data_seminar == null)
                    <div class="mb-3">
                        {{-- <input type="hidden" name="user_id" value="{{ $user_id }}"> --}}
                        <label for="laporan" class="form-label @error('proposal') is-invalid @enderror">Laporan</label>
                        <input class="form-control @error('proposal') is invalid @enderror" type="file" id="laporan"
                            name="laporan" onchange="previewproposal()">
                        @error('laporan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Create Post</button>
                @else
                    <p>Anda Telah Mengajukan Seminar</p>
                @endif
            </form>
        </div>
    @else
        <p>Silahkan lengkapi dulu logbook dan progres laporannya</p>
    @endif
@endsection