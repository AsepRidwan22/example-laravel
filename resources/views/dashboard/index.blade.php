@extends('dashboard.layouts.main')

@section('container')
    <div class="row mt-4">
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-blue order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Jumlah Mahasiswa</h6>
                    <h2 class="text-right"><i class="fa fa-cart-plus f-left"></i><span>{{ $mahasiswas }}</span></h2>
                    <p class="m-b-0">Selesai Kerja Praktek<span class="f-right">0</span></p>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-green order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Mengajukan Proposal</h6>
                    <h2 class="text-right"><i
                            class="fa fa-rocket f-left"></i><span>{{ $pengajuanProposals - $accProposals }}</span></h2>
                    <p class="m-b-0">Selesai Proposal<span class="f-right">{{ $accProposals }}</span></p>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-yellow order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Bimbingan</h6>
                    <h2 class="text-right"><i class="fa fa-refresh f-left"></i><span>{{ $bimbingans }}</span></h2>
                    <p class="m-b-0">Selesai Bimbingan<span class="f-right">0</span></p>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-pink order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Mengajukan Seminar</h6>
                    <h2 class="text-right"><i class="fa fa-credit-card f-left"></i><span>0</span></h2>
                    <p class="m-b-0">Selesai Seminar<span class="f-right">0</span></p>
                </div>
            </div>
        </div>
    </div>
@endsection
