@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Mahasiswa</h1>
    </div>

    <div class="col-lg-8">

        <form method="POST" action="/dashboard/mahasiswas" class="mb-5" enctype="multipart/form-data">
            @csrf
            {{-- <input id="user_id" type="hidden" name="user_id" required value="{{ $users->id }}"> --}}
            <div class="mb-3">
                <label for="npm" class="form-label">NPM</label>
                <input type="number" class="form-control @error('npm') is-invalid @enderror" id="npm" name="npm"
                    value="{{ old('npm') }}" required autofocus autocomplete="off">
                @error('npm')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                    value="{{ old('nama') }}" required autocomplete="off">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label @error('photo') is-invalid @enderror">Mahasiswa Photo
                    (*optional)</label>
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input class="form-control @error('photo') is invalid @enderror" type="file" id="photo"
                    name="photo" onchange="previewPhoto()">
                @error('photo')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <input type="text" class="form-control @error('kelas') is-invalid @enderror" id="kelas"
                    name="kelas" value="{{ old('kelas') }}" required autocomplete="off">
                @error('kelas')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="angkatan" class="form-label">Angkatan</label>
                <input type="text" class="form-control @error('angkatan') is-invalid @enderror" id="angkatan"
                    name="angkatan" value="{{ old('angkatan') }}" required autocomplete="off">
                @error('angkatan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="priode" class="form-label">Priode Kerja Praktek</label>
                <input type="text" class="form-control @error('priode') is-invalid @enderror" id="priode"
                    name="priode" value="{{ old('priode') }}" required autocomplete="off">
                @error('priode')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="noHp" class="form-label">Nomor HP</label>
                <input type="text" class="form-control @error('noHp') is-invalid @enderror" id="noHp" name="noHp"
                    value="{{ old('noHp') }}" required autocomplete="off">
                @error('noHp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                    name="email" value="{{ old('email') }}" required autocomplete="off">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Tambah Mahasiswa</button>
        </form>
    </div>
@endsection
