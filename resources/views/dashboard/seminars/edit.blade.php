@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ajukan Seminar</h1>
    </div>

    <div class="col-lg-8">
        <form method="POST" action="/dashboard/seminars" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mt-3">
                {{-- <label for="laporan" class="form-label">Laporan</label> --}}
                {{-- <input type="text" class="form-control @error('laporan') is-invalid @enderror" id="laporan"
                    name="laporan" value="{{ old('laporan') }}" required autocomplete="off">
                @error('laporan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror --}}
                <a href="{{ asset('storage/') }}" class="btn btn-success btn-sm mb-3" target="_blank">Lihat
                    Laporan</a>
            </div>
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                    name="tanggal" value="{{ old('tanggal') }}" required autocomplete="off">
                @error('tanggal')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="waktu" class="form-label">Waktu</label>
                <div class="d-flex justify-content-start">
                    <label class="timex" for="appt"></label>
                    <input type="time" class="timez" id="appt" name="appt" min="09:00" max="18:00"
                        required>
                    <p class="pt-3 mx-3"> s/d </p>
                    <input type="time" class="timez" id="appt" name="appt" min="09:00" max="18:00"
                        required>
                </div>
            </div>
            <div class="mb-3">
                <label for="ruangan" class="form-label">Ruangan</label>
                <input type="text" class="form-control @error('ruangan') is-invalid @enderror" id="ruangan"
                    name="ruangan" value="{{ old('ruangan') }}" required autocomplete="off">
                @error('ruangan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
