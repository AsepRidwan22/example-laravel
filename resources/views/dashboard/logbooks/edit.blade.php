{{-- @extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Kehadiran bimbingan</h1>
    </div>

    <div class="col-lg-8">

        <form method="POST" action="/dashboard/logbooks/{{ $logbook->id }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="isHadir" class="form-label @error('isHadir') is-invalid @enderror">Paraf</label>
                <select class="form-select" name="isHadir" required>
                    <option value="1" selected>Terverifikasi</option>
                    <option value="0">Tidak Terverifikasi</option>
                </select>
                @error('isHadir')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection --}}

<form method="POST" action="/dashboard/logbooks/{{ $logbook->id }}" enctype="multipart/form-data">
    <div class="modal fade" id="logbookEdit{{ $logbook->id }}" tabindex="-1" role="dialog"
        aria-labelledby="formAcceptTitle" aria-hidden="true">
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
                            <label for="isHadir"
                                class="form-label @error('isHadir') is-invalid @enderror">Paraf</label>
                            <select class="form-select" name="isHadir" required>
                                <option value="1" selected>Terverifikasi</option>
                                <option value="0">Tidak Terverifikasi</option>
                            </select>
                            @error('isHadir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>
