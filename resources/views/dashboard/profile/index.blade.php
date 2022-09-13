@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Profile </h1>
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
    @can('mahasiswa')
        <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
            <div class="cardz p-4">
                @foreach ($profiles as $profile)
                    <div class=" image d-flex flex-column justify-content-center align-items-center">
                        @if ($profile->photo != null)
                            <img src="{{ asset('storage/' . $profile->photo) }}" class="rounded-circle mx-auto d-block"
                                alt="Profile profile" height="100" width="100" style="object-fit: cover;">
                        @else
                            <img src="https://www.its.ac.id/international/wp-content/uploads/sites/66/2020/02/blank-profile-picture-973460_1280-300x300.jpg"
                                class="rounded-circle mx-auto d-block" alt="Profile profile" height="100" width="100"
                                style="object-fit: cover;">
                        @endif
                    </div>
                    <table>
                        <tr>
                            <td class="py-2 px-4 idd">NPM</td>
                            <td>: </td>
                            <td class="p-2 idd">{{ $profile->npm }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 idd">Nama</td>
                            <td>: </td>
                            <td class="p-2 idd">{{ $profile->nama }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 idd">Kelas</td>
                            <td>: </td>
                            <td class="p-2 idd">{{ $profile->kelas }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 idd">Email</td>
                            <td>: </td>
                            <td class="p-2 idd">{{ $profile->email }}</td>
                        </tr>
                    </table>
                    <div class=" image d-flex flex-column justify-content-center align-items-center">
                        <div class=" d-flex mt-2">
                            <a href="/dashboard/profiles/{{ $profile }}/edit" class="btn btn-warning btn-sm">Ubah</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endcan
    @can('dosen')
        <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
            <div class="cardz p-4">
                @foreach ($profiles as $profile)
                    <div class=" image d-flex flex-column justify-content-center align-items-center">
                        @if ($profile->photo != null)
                            <img src="{{ asset('storage/' . $profile->photo) }}" class="rounded-circle mx-auto d-block"
                                alt="Profile profile" height="100" width="100" style="object-fit: cover;">
                        @else
                            <img src="https://www.its.ac.id/international/wp-content/uploads/sites/66/2020/02/blank-profile-picture-973460_1280-300x300.jpg"
                                class="rounded-circle mx-auto d-block" alt="Profile profile" height="100" width="100"
                                style="object-fit: cover;">
                        @endif
                    </div>
                    <table>
                        <tr>
                            <td class="py-2 px-4 idd">NIDN</td>
                            <td>: </td>
                            <td class="p-2 idd">{{ $profile->nidn }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 idd">Nama</td>
                            <td>: </td>
                            <td class="p-2 idd">{{ $profile->nama }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 idd">No Hp</td>
                            <td>: </td>
                            <td class="p-2 idd">{{ $profile->noHp }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 idd">Email</td>
                            <td>: </td>
                            <td class="p-2 idd">{{ $profile->email }}</td>
                        </tr>
                    </table>
                    <div class=" image d-flex flex-column justify-content-center align-items-center">
                        <div class=" d-flex mt-2">
                            <a href="/dashboard/profiles/{{ $profile }}/edit" class="btn btn-warning btn-sm">Ubah</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endcan
    @can('koordinator')
        <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
            <div class="cardz p-4">
                @foreach ($profiles as $profile)
                    <div class=" image d-flex flex-column justify-content-center align-items-center">
                        @if ($profile->photo != null)
                            <img src="{{ asset('storage/' . $profile->photo) }}" class="rounded-circle mx-auto d-block"
                                alt="Profile profile" height="100" width="100" style="object-fit: cover;">
                        @else
                            <img src="https://www.its.ac.id/international/wp-content/uploads/sites/66/2020/02/blank-profile-picture-973460_1280-300x300.jpg"
                                class="rounded-circle mx-auto d-block" alt="Profile profile" height="100" width="100"
                                style="object-fit: cover;">
                        @endif
                    </div>
                    <table>
                        <tr>
                            <td class="py-2 px-4 idd">NIDN</td>
                            <td>: </td>
                            <td class="p-2 idd">{{ $profile->nidn }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 idd">Nama</td>
                            <td>: </td>
                            <td class="p-2 idd">{{ $profile->nama }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 idd">No Hp</td>
                            <td>: </td>
                            <td class="p-2 idd">{{ $profile->noHp }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 idd">Email</td>
                            <td>: </td>
                            <td class="p-2 idd">{{ $profile->email }}</td>
                        </tr>
                    </table>
                    <div class=" image d-flex flex-column justify-content-center align-items-center">
                        <div class=" d-flex mt-2">
                            <a href="/dashboard/profiles/{{ $profile }}/edit" class="btn btn-warning btn-sm">Ubah</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endcan
@endsection
