@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Dosen {{ auth()->user()->name }}</h1>
    </div>

    <div class="col-lg-8">

        <form method="POST" action="/dashboard/dosens" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nidn" class="form-label">NIDN</label>
                <input value="{{ old('nidn') }}" type="disabled" class="form-control @error('nidn') is-invalid @enderror"
                    id="nidn" name="nidn" required autofocus>
                @error('nidn')
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
                <label for="photo" class="form-label @error('photo') is-invalid @enderror">Dosen Photo</label>
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
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                    name="email" autofocus value="{{ old('email') }}" required autocomplete="off">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="noHp" class="form-label">No HP</label>
                <input type="text" class="form-control @error('noHp') is-invalid @enderror" id="noHp" name="noHp"
                    autofocus value="{{ old('noHp') }}" required autocomplete="off">
                @error('noHp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="url" class="form-label">URL Group WA</label>
                <input type="text" class="form-control @error('linkGroup') is-invalid @enderror" id="linkGroup"
                    name="linkGroup" autofocus value="{{ old('linkGroup') }}" required autocomplete="off">
                @error('linkGroup')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Tambah Dosen</button>
        </form>
    </div>
    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');
        console.log('udin')

        title.addEventListener('change', function() {
            fetch('/dashboard/posts/checkSlug?title=' + title.value).then(response => response.json()).then(data =>
                slug.value = data
                .slug)
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        });

        function previewPhoto() {
            const image = document.querySelector('#photo');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
