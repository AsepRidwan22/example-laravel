@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create Post {{ auth()->user()->name }}</h1>
    </div>

    <div class="col-lg-8">

        <form method="POST" action="/dashboard/mahasiswas" class="mb-5" enctype="multipart/form-data">
            @csrf
            <input id="user_id" type="hidden" name="user_id" required value="{{ $users->id }}">
            <div class="mb-3">
                <label for="npm" class="form-label">NPM</label>
                <input type="text" class="form-control @error('npm') is-invalid @enderror" id="npm" name="npm"
                    value="{{ $users->username }}" required disabled>
                <input type="hidden" name="npm" value="{{ $users->username }}">
                @error('npm')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                    autofocus value="{{ old('nama') }}" required>
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <input type="text" class="form-control @error('kelas') is-invalid @enderror" id="kelas"
                    name="kelas" value="{{ old('kelas') }}" required>
                @error('kelas')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                    name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="dosen" class="form-label @error('dosen') is-invalid @enderror">Dosen Pembimbing</label>
                <select class="form-select" name="dosen_id" required>
                    @foreach ($dosens as $dosen)
                        @if (old('dosen_id') == $dosen->id)
                            <option value="{{ $dosen->id }}" selected>{{ $dosen->nama }}</option>
                        @else
                            <option value="{{ $dosen->id }}">{{ $dosen->nama }}</option>
                        @endif
                    @endforeach
                </select>
                @error('category')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>
    </div>
@endsection
