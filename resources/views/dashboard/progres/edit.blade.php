<form method="POST" action="/dashboard/progres/{{ $progres->id }}" class="mb-3" enctype="multipart/form-data">
    <div class="modal fade" id="progresCreate{{ $progres->id }}" tabindex="-1" role="dialog"
        aria-labelledby="formAcceptTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formAcceptTitle">Form Tambah Progres</h5>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        {{-- <label for="body" class="form-label">body</label> --}}
                        {{-- @error('body')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <input type="hidden" name="id" value="{{ $logbook->id }}">

                            @if ($logbook->isHadir !== null)
                                <input type="hidden" name="isHadir" value="true">
                            @endif --}}
                        <div class="mb-3">
                            <label for="laporan" class="form-label @error('laporan') is-invalid @enderror">Post
                                Laporan</label>
                            <input type="hidden" name="id" value="{{ $progres->id }}">
                            <input class="form-control @error('laporan') is invalid @enderror" type="file"
                                id="laporan" name="laporan" onchange="previewlaporan()">
                            @error('laporan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Buat Laporan</button>
                </div>
            </div>
        </div>
    </div>
</form>
