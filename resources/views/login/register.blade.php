@extends('layouts.template')

@section('content')
    <div class="row justify-content-center mt-5 m-2">
        <div class="col-md-5 rounded-full mt-5 p-5 shadow card rounded bg-light shadow-sm m-5 pb-5">

            @if (session()->has('loginError'))
                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <main class="form-signin">
                <form action="/register" method="post">
                    @csrf
                    <h2 class="text-center">
                    </h2>
                    <div class="text-center">
                        <h4 class="" style="font-weight: 900 !important"><i class="fas fa-shopping-bag"></i> Nuzashop
                        </h4>

                        <p class="mb-3">Silahkan register untuk melanjutkan</p>
                    </div>

                    <div class="form-floating">
                        <input type="text" autofocus class="form-control @error('name') is-invalid @enderror"
                            id="name" name="name" placeholder="name@example.com" value="{{ old('name') }}">
                        <label for="name">Full Name</label>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="text" autofocus class="form-control @error('username') is-invalid @enderror"
                            id="username" name="username" placeholder="username@example.com" value="{{ old('username') }}">
                        <label for="username">username</label>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="email" autofocus class="form-control @error('email') is-invalid @enderror"
                            id="email" name="email" placeholder="name@example.com" value="{{ old('email') }}">
                        <label for="email">Email address</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                            name="password" placeholder="Password">
                        <label for="password">Password</label>
                        @error('password')
                            <div class="invalid-feedback mb-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                            id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                        <label for="password_confirmation">Confirm Password</label>
                        @error('password_confirmation')
                            <div class="invalid-feedback mb-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button class="w-100 btn btn-lg text-light" style="font-weight: 700;background-color: #353534"
                        type="submit"> Register</button>
                </form>
                <p class="mt-3" style="font-size: 12px">already have an account yet?<a class="text-decoration-none"
                        href="/login"> sign in now!</a></p>
            </main>

        </div>
    </div>
@endsection
