@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Logbook</h1>
    </div>

    <div class="col-lg-8">
        <form method="POST" action="/dashboard/logbooks" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                {{-- <label for="body" class="form-label">body</label> --}}
                @error('body')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input id="body" type="hidden" name="body" required value="{{ old('body') }}">
                <trix-editor input="body"></trix-editor>
            </div>
            <button type="submit" class="btn btn-primary">Buat Logbook</button>
        </form>
    </div>
@endsection
