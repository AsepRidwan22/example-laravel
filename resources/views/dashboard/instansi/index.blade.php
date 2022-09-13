@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Instansi</h1>
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

    <div class="table-responsive col-lg-8">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Instansi</th>
                    <th scope="col">Nama Pembimbing</th>
                    <th scope="col">Nomor HP</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($instansis as $instansi)
                    <tr>
                        <td class="py-4">{{ $loop->iteration }}</td>
                        <td class="py-4">{{ $instansi->namaInstansi }}</td>
                        <td class="py-4">{{ $instansi->namaPembimbing }}</td>
                        <td class="py-4">{{ $instansi->noHp }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        $('.alert').alert()
    </script>
@endsection
