@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create Akun Dosen {{ auth()->user()->name }}</h1>
    </div>

    <div class="col-lg-8">
        <form action="/dashboard/register" method="POST">
            @csrf
            {{-- <div class="form-floating mb-2">
                <input type="text" class="form-control rounded-top @error('name') is-invalid @enderror" name="name"
                    id="name" placeholder="Name" required value="{{ old('name') }}" autocomplete="off" autofocus>
                <label for="name">Name</label>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div> --}}
            <div class="form-floating mb-2">
                <input type="number" class="form-control @error('username') is-invalid @enderror" name="username"
                    id="username" placeholder="Username" required value="{{ old('username') }}" autocomplete="off">
                <label for="userneme">NIDN</label>
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- <div class="form-floating mb-2">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    id="email" placeholder="name@example.com" required value="{{ old('email') }}" autocomplete="off">
                <label for="email">Email address</label>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div> --}}
            <input type="hidden" name="roles" value="dosen">
            <div class="form-floating mb-2">
                <input type="password" class="form-control rounded-bottom @error('password') is-invalid @enderror"
                    name="password" id="password" placeholder="Password" required>
                <label for="password">Password</label>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
        </form>
    </div>
@endsection
