<form method="POST" action="/dashboard/logbook/create/{{ $logbook->id }}" class="mb-5" enctype="multipart/form-data">
    <div class="modal fade" id="logbookCreate{{ $logbook->id }}" tabindex="-1" role="dialog"
        aria-labelledby="formAcceptTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formAcceptTitle">Form Tambah Logbook</h5>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        {{-- <label for="body" class="form-label">body</label> --}}
                        @error('body')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <input type="hidden" name="id" value="{{ $logbook->id }}">

                        @if ($logbook->isHadir !== null)
                            <input type="hidden" name="isHadir" value="true">
                        @endif
                        <div class="mb-3">
                            <input type="date" class="form-control @error('date') is-invalid @enderror"
                                id="date" name="date" required autocomplete="off">
                            @error('date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <input id="body" type="hidden" name="body" required>
                        <trix-editor input="body"></trix-editor>
                    </div>
                    <button type="submit" class="btn btn-primary">Buat Logbook</button>
                </div>
            </div>
        </div>
    </div>
</form>
