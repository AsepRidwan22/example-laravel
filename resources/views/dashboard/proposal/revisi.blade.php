<!-- Modal -->
<form method="POST" action="/dashboard/proposals/{{ $proposal->id }}" enctype="multipart/form-data">
    <div class="modal fade " id="formACC{{ $proposal->id }}" tabindex="-1" role="dialog" aria-labelledby="formACCTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formACCTitle">Form Revisi</h5>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul"
                            name="judul" autofocus value="{{ $proposal->judul }}" required disabled>
                    </div>
                    <a href="{{ asset('storage/' . $proposal->proposal) }}" class="btn btn-primary btn-sm mb-3"
                        target="_blank">Lihat
                        Proposal</a>
                    <div class="form-group">
                        <label for="pesan" class="mb-3">Pesan</label>
                        <textarea class="form-control" id="pesan" name="pesan" rows="4" autofocus></textarea>
                    </div>
                    <input type="hidden" id="isAccProposal" name="isAccProposal" value="0">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Revisi</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal" data-toggle="modal"
                        data-target="#formAccept{{ $proposal->id }}">
                        ACC
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
