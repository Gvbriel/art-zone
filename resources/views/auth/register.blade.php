@extends('layouts.app')

@section('content')
    <div class="container-fluid d-flex justify-content-center">
        <div class="rounded w-25 p-3 h-50 bg-white mt-2 ">
            <form action="{{route('register')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="name" class="form-control @error('name') is-invalid @enderror" id="name" name="name" aria-describedby="emailHelp" value="{{old("name")}}">
                    @error('name')
                        <div class="invalid-feedback">
                            Please insert your name.
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="username" class="form-control @error('username') is-invalid @enderror" id="username" name="username" aria-describedby="emailHelp" value="{{old("username")}}">
                    @error('username')
                    <div class="invalid-feedback">
                        Please choose username.
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old("email")}}">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    @error('email')
                    <div class="invalid-feedback">
                        Please enter your e-mail.
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" aria-describedby="password">
                    @error('password')
                    <div class="invalid-feedback">
                        Please insert your password.
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Confirm password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" id="password" aria-describedby="password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
