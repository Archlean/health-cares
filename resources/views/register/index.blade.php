@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-lg-4">
        <main class="form-registration bg-opacity-50">
            <h1 class="h3 mb-3 fw-normal text-center">Register</h1>
            <form action="/register" method="post">
                @csrf
                <div class="form-floating">
                  <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="Name" value="{{ old('name') }}">
                  <label for="name">Name</label>
                  @error('name')
                    <div class="invalid-feedback">Please insert your name</div>
                  @enderror
                </div>
                <div class="form-floating">
                  <input type="text" name="username" class="form-control @error('username') is-invalid @enderror " id="username" placeholder="Username" value="{{ old('username') }}">
                  <label for="username">Username</label>
                  @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-floating">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value="{{ old('email') }}">
                    <label for="email">Email address</label>
                    @error('email')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password">
                    <label for="password">Password</label>
                    @error('password')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            
                <button class="w-100 btn btn-lg btn-primary mt-2" type="submit">Register Now</button>
            </form>
            <small class="d-block text-center text-white mt-2">have an account? <a href="/login">Login Now!</a></small>
        </main>
    </div>
</div>
  
@endsection