@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Proposal</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-12" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('danger'))
        <div class="alert alert-danger col-lg-12" role="alert">
            {{ session('danger') }}
        </div>
    @endif

    <div class="table-responsive col-lg-12">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">NPM</th>
                    <th scope="col">Nama</th>
                    {{-- <th scope="col">Instansi</th> --}}
                    <th scope="col">Judul</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proposals as $proposal)
                    <tr>
                        <td class="py-4">{{ $loop->iteration }}</td>
                        <td class="py-4">{{ $proposal->mahasiswa->npm }}</td>
                        <td class="py-4">{{ $proposal->mahasiswa->nama }}</td>
                        {{-- <td class="py-4">{{ $proposal->instansi->namaInstansi }}</td> --}}
                        <td class="py-4">{{ $proposal->judul }}</td>
                        <td class="pt-3 text-center">
                            @if ($proposal->isAccProposal === null)
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                    data-target="#formACC{{ $proposal->id }}">
                                    Acc Proposal
                                </button>
                            @elseif ($proposal->isAccProposal == 0)
                                <button type="button" class="btn btn-danger btn-sm">
                                    Rejected
                                </button>
                            @else
                                <button type="button" class="btn btn-success btn-sm">
                                    Accepted
                                </button>
                            @endif
                        </td>
                    </tr>
                    @include('dashboard.proposal.accept')
                    @include('dashboard.proposal.revisi')
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
