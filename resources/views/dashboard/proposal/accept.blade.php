<form method="POST" action="/dashboard/proposals/accept/{{ $proposal->mahasiswa_id }}" enctype="multipart/form-data">
    <div class="modal fade " id="formAccept{{ $proposal->id }}" tabindex="-1" role="dialog"
        aria-labelledby="formAcceptTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formAcceptTitle">Form Pilih Dosen Pembimbing</h5>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="dosen" class="form-label @error('dosen') is-invalid @enderror">Dosen
                            Pembimbing</label>
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
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Revisi</button>
                </div>
            </div>
        </div>
    </div>
</form>
