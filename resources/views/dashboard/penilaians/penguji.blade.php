@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Penilaian Penguji Kerja Praktek</h1>
    </div>

    <div class="col-lg-8">
        <form method="POST" action="/dashboard/penilaians/penguji/create/{{ $mahasiswa_id }}" class="mb-5"
            enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="penguji_1" class="form-label">Pemahaman Terhadap Masalah</label>
                <input type="text" class="form-control @error('penguji_1') is-invalid @enderror" id="penguji_1"
                    name="penguji_1" value="{{ old('penguji_1') }}" required autocomplete="off">
                @error('penguji_1')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="penguji_2" class="form-label">Solusi yang diusulkan sesuai dengan permasalahan</label>
                <input type="text" class="form-control @error('penguji_2') is-invalid @enderror" id="penguji_2"
                    name="penguji_2" value="{{ old('penguji_2') }}" required autocomplete="off">
                @error('penguji_2')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="penguji_3" class="form-label">Kemampuan Menyelesaikan Pekerjaan</label>
                <input type="text" class="form-control @error('penguji_3') is-invalid @enderror" id="penguji_3"
                    name="penguji_3" value="{{ old('penguji_3') }}" required autocomplete="off">
                @error('penguji_3')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="penguji_4" class="form-label">Kemampuan Mengambil Keputusan</label>
                <input type="text" class="form-control @error('penguji_4') is-invalid @enderror" id="penguji_4"
                    name="penguji_4" value="{{ old('penguji_4') }}" required autocomplete="off">
                @error('penguji_4')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="penguji_5" class="form-label">Kerjasama, Disiplin, Kerajinan dan Ketekunan</label>
                <input type="text" class="form-control @error('penguji_5') is-invalid @enderror" id="penguji_5"
                    name="penguji_5" value="{{ old('penguji_5') }}" required autocomplete="off">
                @error('penguji_5')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="penguji_6" class="form-label">Percaya Diri</label>
                <input type="text" class="form-control @error('penguji_6') is-invalid @enderror" id="penguji_6"
                    name="penguji_6" value="{{ old('penguji_6') }}" required autocomplete="off">
                @error('penguji_6')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="penguji_7" class="form-label">Mendeskripsikan langkah menuju solusi</label>
                <input type="text" class="form-control @error('penguji_7') is-invalid @enderror" id="penguji_7"
                    name="penguji_7" value="{{ old('penguji_7') }}" required autocomplete="off">
                @error('penguji_7')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="penguji_8" class="form-label">Mampu mengkomunikasikan hasil kerja praktek</label>
                <input type="text" class="form-control @error('penguji_8') is-invalid @enderror" id="penguji_8"
                    name="penguji_8" value="{{ old('penguji_8') }}" required autocomplete="off">
                @error('penguji_8')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="penguji_9" class="form-label">Tata tulis laporan</label>
                <input type="text" class="form-control @error('penguji_9') is-invalid @enderror" id="penguji_9"
                    name="penguji_9" value="{{ old('penguji_9') }}" required autocomplete="off">
                @error('penguji_9')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="penguji_10" class="form-label">Mampu membuktikan hasil KP sebagai solusi dari masalah</label>
                <input type="text" class="form-control @error('penguji_10') is-invalid @enderror" id="penguji_10"
                    name="penguji_10" value="{{ old('penguji_10') }}" required autocomplete="off">
                @error('penguji_10')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit Nilai</button>
        </form>
    </div>
@endsection
