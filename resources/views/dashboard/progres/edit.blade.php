@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Progres</h1>
    </div>

    <div class="col-lg-8">
        <form method="POST" action="/dashboard/progres/{{ $idProgres }}" class="mb-5" enctype="multipart/form-data">
            @csrf
            @method('put')
            {{-- <div class="mb-3">
                @error('laporan')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input type="hidden" name="id" value="{{ $idProgres }}">
                <input id="laporan" type="hidden" name="laporan" required value="{{ old('laporan') }}">
                <trix-editor input="laporan"></trix-editor>
            </div>
            <button type="submit" class="btn btn-primary">Buat Progres</button> --}}

            <div class="input-group mb-3">
                <input type="hidden" name="id" value="{{ $idProgres }}">
                <input type="text" id="laporan" name="laporan" class="form-control" placeholder="Add URL"
                    aria-label="Add URL" aria-describedby="basic-addon2" autocomplete="off" required>
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
