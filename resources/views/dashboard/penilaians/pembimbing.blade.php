@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Penilaian Kerja Praktek</h1>
    </div>

    <div class="col-lg-8">
        <form method="POST" action="/dashboard/penilaians/bimbingan/create/{{ $mahasiswa_id }}" class="mb-5"
            enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="pembimbing_1" class="form-label">Pemahaman Terhadap Masalah</label>
                <input type="text" class="form-control @error('pembimbing_1') is-invalid @enderror" id="pembimbing_1"
                    name="pembimbing_1" value="{{ old('pembimbing_1') }}" required autocomplete="off" max="9">
                @error('pembimbing_1')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="pembimbing_2" class="form-label">Solusi yang diusulkan sesuai dengan permasalahan</label>
                <input type="text" class="form-control @error('pembimbing_2') is-invalid @enderror" id="pembimbing_2"
                    name="pembimbing_2" value="{{ old('pembimbing_2') }}" required autocomplete="off">
                @error('pembimbing_2')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="pembimbing_3" class="form-label">Kemampuan Menyelesaikan Pekerjaan</label>
                <input type="text" class="form-control @error('pembimbing_3') is-invalid @enderror" id="pembimbing_3"
                    name="pembimbing_3" value="{{ old('pembimbing_3') }}" required autocomplete="off">
                @error('pembimbing_3')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="pembimbing_4" class="form-label">Kemampuan Mengambil Keputusan</label>
                <input type="text" class="form-control @error('pembimbing_4') is-invalid @enderror" id="pembimbing_4"
                    name="pembimbing_4" value="{{ old('pembimbing_4') }}" required autocomplete="off">
                @error('pembimbing_4')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="pembimbing_5" class="form-label">Kerjasama, Disiplin, Kerajinan dan Ketekunan</label>
                <input type="text" class="form-control @error('pembimbing_5') is-invalid @enderror" id="pembimbing_5"
                    name="pembimbing_5" value="{{ old('pembimbing_5') }}" required autocomplete="off">
                @error('pembimbing_5')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="pembimbing_6" class="form-label">Percaya Diri</label>
                <input type="text" class="form-control @error('pembimbing_6') is-invalid @enderror" id="pembimbing_6"
                    name="pembimbing_6" value="{{ old('pembimbing_6') }}" required autocomplete="off">
                @error('pembimbing_6')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="pembimbing_7" class="form-label">Mendeskripsikan langkah menuju solusi</label>
                <input type="text" class="form-control @error('pembimbing_7') is-invalid @enderror" id="pembimbing_7"
                    name="pembimbing_7" value="{{ old('pembimbing_7') }}" required autocomplete="off">
                @error('pembimbing_7')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="pembimbing_8" class="form-label">Mampu mengkomunikasikan hasil kerja praktek</label>
                <input type="text" class="form-control @error('pembimbing_8') is-invalid @enderror" id="pembimbing_8"
                    name="pembimbing_8" value="{{ old('pembimbing_8') }}" required autocomplete="off">
                @error('pembimbing_8')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="pembimbing_9" class="form-label">Tata tulis laporan</label>
                <input type="text" class="form-control @error('pembimbing_9') is-invalid @enderror" id="pembimbing_9"
                    name="pembimbing_9" value="{{ old('pembimbing_9') }}" required autocomplete="off">
                @error('pembimbing_9')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="pembimbing_10" class="form-label">Mampu membuktikan hasil KP sebagai solusi dari
                    masalah</label>
                <input type="text" class="form-control @error('pembimbing_10') is-invalid @enderror"
                    id="pembimbing_10" name="pembimbing_10" value="{{ old('pembimbing_10') }}" required
                    autocomplete="off">
                @error('pembimbing_10')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="pembimbing_11" class="form-label">Hasil produk menjawab permasalahan</label>
                <input type="text" class="form-control @error('pembimbing_11') is-invalid @enderror"
                    id="pembimbing_11" name="pembimbing_11" value="{{ old('pembimbing_11') }}" required
                    autocomplete="off">
                @error('pembimbing_11')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="pembimbing_12" class="form-label">Kontribusi nyata terhadap instansi</label>
                <input type="text" class="form-control @error('pembimbing_12') is-invalid @enderror"
                    id="pembimbing_12" name="pembimbing_12" value="{{ old('pembimbing_12') }}" required
                    autocomplete="off">
                @error('pembimbing_12')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="pembimbing_13" class="form-label">Kontribusi nyata terhadap instansi</label>
                <input type="text" class="form-control @error('pembimbing_13') is-invalid @enderror"
                    id="pembimbing_13" name="pembimbing_13" value="{{ old('pembimbing_13') }}" required
                    autocomplete="off">
                @error('pembimbing_13')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="pembimbing_14" class="form-label">Kemudahan penggunaan hasil/produk</label>
                <input type="text" class="form-control @error('pembimbing_14') is-invalid @enderror"
                    id="pembimbing_14" name="pembimbing_14" value="{{ old('pembimbing_14') }}" required
                    autocomplete="off">
                @error('pembimbing_14')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="pembimbing_15" class="form-label">Produk meningkatkan kinerja instansi</label>
                <input type="text" class="form-control @error('pembimbing_15') is-invalid @enderror"
                    id="pembimbing_15" name="pembimbing_15" value="{{ old('pembimbing_15') }}" required
                    autocomplete="off">
                @error('pembimbing_15')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit Nilai</button>
        </form>
    </div>
@endsection
