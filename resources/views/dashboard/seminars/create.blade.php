@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ajukan Seminar</h1>
    </div>

    @if ($logbookCount == 7 && $progresCount == 4)
        <div class="col-lg-8">
            <form method="POST" action="/dashboard/seminars" class="mb-5" enctype="multipart/form-data">
                @csrf
                @if ($data_seminar == null)
                    <div class="mb-3">
                        {{-- <input type="hidden" name="user_id" value="{{ $user_id }}"> --}}
                        <label for="laporan" class="form-label @error('laporan') is-invalid @enderror">Laporan *Bab 1 s/d
                            Bab 4</label>
                        <input class="form-control @error('laporan') is invalid @enderror" type="file" id="laporan"
                            name="laporan" onchange="previewproposal()">
                        @error('laporan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <label for="laporan" class="form-label mt-3 @error('laporan') is-invalid @enderror">Keterangan
                            Tidak
                            Pinjam Buku</label>
                        <input class="form-control @error('keteranganPerpus') is invalid @enderror" type="file"
                            id="keteranganPerpus" name="keteranganPerpus" onchange="previewproposal()">
                        @error('keteranganPerpus')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <label for="bebasTagihan"
                            class="form-label mt-3 @error('bebasTagihan') is-invalid @enderror">Keterangan
                            Bebas Tagihan</label>
                        <input class="form-control @error('bebasTagihan') is invalid @enderror" type="file"
                            id="bebasTagihan" name="bebasTagihan" onchange="previewproposal()">
                        @error('bebasTagihan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Daftar Seminar</button>
                @elseif ($jadwalNotNull == null)
                    <div class="image d-flex flex-column justify-content-center align-items-center">
                        <img src="{{ asset('storage/icon/vectorWaiting.jpg') }}" class="mx-auto d-block" alt="Profile Dosen"
                            width="400" style="object-fit: cover;">
                        <p class="idd">Anda Telah Mengajukan Seminar!</p>
                        <p>Silahkan tunggu Koordinator mengacc dulu</p>
                    </div>
                @else
                    <div class="mt-4 image d-flex flex-column justify-content-center align-items-center">
                        <img src="{{ asset('storage/icon/success.png') }}" class="mx-auto d-block" alt="Profile Dosen"
                            width="200" style="object-fit: cover;">
                        <p class="mt-4 idd">Success!</p>
                        <p>Seminar Telah di ACC</p>
                    </div>
                @endif
            </form>
        </div>
    @else
        <div class=" image d-flex flex-column justify-content-center align-items-center">
            <img src="https://img.freepik.com/premium-vector/file-found-illustration-with-confused-people-holding-big-magnifier-search-no-result_258153-336.jpg?w=2000"
                class="mx-auto d-block" alt="Profile Dosen" width="500" style="object-fit: cover;">
            <p class="idd">Belum bisa mengajukan seminar!</p>
            <p>Silahkan lengkapi dulu logbook dan progres laporannya</p>
        </div>
    @endif
@endsection
