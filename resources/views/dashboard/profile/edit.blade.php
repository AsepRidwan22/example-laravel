<form method="POST" action="/dashboard/dosens/{{ $profile->id }}" enctype="multipart/form-data">
    <div class="modal fade" id="dosenEdit{{ $profile->id }}" tabindex="-1" role="dialog" aria-labelledby="formAcceptTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formAcceptTitle">Form Edit dosen</h5>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="nidn" class="form-label">NIDN</label>
                            <input value="{{ old('nidn', $profile->nidn) }}" type="text"
                                class="form-control @error('nidn') is-invalid @enderror" id="nidn" name="nidn"
                                required disabled autofocus>
                            @error('nidn')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                id="nama" name="nama" value="{{ old('nama', $profile->nama) }}" required
                                autocomplete="off">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="photo" class="form-label @error('photo') is-invalid @enderror">Dosen
                                Photo</label>
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                            <input class="form-control @error('photo') is invalid @enderror" type="file"
                                id="photo" name="photo" onchange="previewPhoto()">
                            @error('photo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                id="email" name="email" autofocus value="{{ old('email', $profile->email) }}"
                                required autocomplete="off">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="noHp" class="form-label">No HP</label>
                            <input type="text" class="form-control @error('noHp') is-invalid @enderror"
                                id="noHp" name="noHp" autofocus value="{{ old('noHp', $profile->noHp) }}"
                                required autocomplete="off">
                            @error('noHp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="url" class="form-label">URL Group WA</label>
                            <input type="text" class="form-control @error('linkGroup') is-invalid @enderror"
                                id="linkGroup" name="linkGroup" autofocus
                                value="{{ old('linkGroup', $profile->linkGroup) }}" required autocomplete="off">
                            @error('linkGroup')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah Profile</button>
                </div>
            </div>
        </div>
    </div>
</form>
