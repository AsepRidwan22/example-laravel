@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ajukan Proposal</h1>
    </div>

    @if ($proposalUser->value('id') === null)
        <div class="col-lg-8">
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
                    <label for="namaPembimbing" class="form-label">Nama Pembimbing Lapangan</label>
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
        </div>
    @elseif ($proposalStatus === null)
        <div class="image d-flex flex-column justify-content-center align-items-center">
            <img src="{{ asset('storage/icon/vectorWaiting.jpg') }}" class="mx-auto d-block" alt="Profile Dosen"
                width="400" style="object-fit: cover;">
            <p class="idd">Waiting!</p>
            <p>Silahkan tunggu Koordinator mengacc dulu</p>
        </div>
    @elseif ($proposalStatus == 0)
        @if ($proposalUser->value('pesan') !== null)
            <div class="col-lg-8">
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
            </div>
        @endif
        <div class="col-lg-8">
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
                    <label for="namaPembimbing" class="form-label">Nama Pembimbing Lapangan</label>
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
                    <label for="proposal" class="form-label @error('proposal') is-invalid @enderror">Post
                        proposal</label>
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
        </div>
    @elseif ($proposalStatus == 1)
        <div class="mt-4 image d-flex flex-column justify-content-center align-items-center">
            <img src="{{ asset('storage/icon/success.png') }}" class="mx-auto d-block" alt="Profile Dosen"
                width="200" style="object-fit: cover;">
            <p class="mt-4 idd">Success!</p>
            <p>Proposal Telah di ACC</p>
        </div>
    @endif

@endsection
