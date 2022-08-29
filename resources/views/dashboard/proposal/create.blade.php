@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ajukan Proposal</h1>
    </div>

    <div class="col-lg-8">
        @if ($proposalUser->value('id') === null)
            <form method="POST" action="/dashboard/proposals" class="mb-5" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Proposal</label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul"
                        name="judul" value="{{ old('judul') }}" required autocomplete="off">
                    @error('judul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="namaInstansi" class="form-label">Nama Instansi</label>
                    <input type="text" class="form-control @error('namaInstansi') is-invalid @enderror" id="namaInstansi"
                        name="namaInstansi" value="{{ old('namaInstansi') }}" required autocomplete="off">
                    @error('namaInstansi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="namaPembimbing" class="form-label">Nama Pembimbing</label>
                    <input type="text" class="form-control @error('namaPembimbing') is-invalid @enderror"
                        id="namaPembimbing" name="namaPembimbing" value="{{ old('namaPembimbing') }}" required
                        autocomplete="off">
                    @error('namaPembimbing')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="noHp" class="form-label">No Handphone</label>
                    <input type="text" class="form-control @error('noHp') is-invalid @enderror" id="noHp"
                        name="noHp" value="{{ old('noHp') }}" required autocomplete="off">
                    @error('noHp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="proposal" class="form-label @error('proposal') is-invalid @enderror">Post proposal</label>
                    <input class="form-control @error('proposal') is invalid @enderror" type="file" id="proposal"
                        name="proposal" onchange="previewproposal()">
                    @error('proposal')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        @elseif ($proposalStatus === null)
            <p>silahkan tunggu hasil</p>
        @elseif ($proposalStatus == 0)
            @if ($proposalUser->value('pesan') !== null)
                <div class="card mb-3">
                    <div class="card-header">
                        List yang harus direvisi
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>{{ $proposalUser->value('pesan') }}</p>
                        </blockquote>
                    </div>
                </div>
            @endif
            <form method="POST" action="/dashboard/proposals/edit-proposal/{{ $proposalUser->value('id') }}"
                class="mb-5" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Proposal</label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul"
                        name="judul" value="{{ old('judul') }}" required autocomplete="off">
                    @error('judul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="proposal" class="form-label @error('proposal') is-invalid @enderror">Post proposal</label>
                    <input class="form-control @error('proposal') is invalid @enderror" type="file" id="proposal"
                        name="proposal" onchange="previewproposal()">
                    @error('proposal')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        @elseif ($proposalStatus == 1)
            <p>proposal telah di acc</p>
        @endif
    </div>
@endsection
