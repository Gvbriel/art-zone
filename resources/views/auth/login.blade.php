@extends('layouts.app')

@section('content')
    <div class="container-fluid d-flex justify-content-center">
        <div class="rounded w-25 p-3 h-50 bg-white mt-2 ">

            @if (session('status'))
                {{session('status')}}
            @endif

            <form action="{{route('login')}}" method="post">
                @csrf

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
                    <input type="checkbox" name="remember" id="remember">
                    <label for="checkbox" class="form-label">Remember me</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
