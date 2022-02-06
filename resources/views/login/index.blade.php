@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-lg-4">
      @if (session()->has('reg-success'))
        <div class="alert alert-success alert-dismissible fade show d-flex justify-content-center" style="height: fit-content; width:fit-content" role="alert">
          <small class="d-block text-center"> {{ session('reg-success') }} </small>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      @if (session()->has('Error-Login'))
      <div class="alert alert-errors alert-dismissible fade show d-flex justify-content-center" style="height: fit-content; width:fit-content" role="alert">
        <small class="d-block text-center"> {{ session('Error-Login') }} </small>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

      <main class="form-signin bg-opacity-50">
        <h1 class="h3 mb-3 fw-normal text-center">Login</h1>
        <form action="/login" method="post">
          @csrf
          <div class="form-floating">
            <input type="email" name="email" class="form-control @error('username') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
            <label for="email">Email address</label>
            @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="password" name="password" class="form-control @error('username') is-invalid @enderror" id="password" placeholder="Password" required>
            <label for="password">Password</label>
            @error('password')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          
          <button class="w-100 btn btn-lg btn-primary" type="submit">Login Now</button>
        </form>
        <small class="d-block text-center text-white mt-2">Not have an account? <a href="/register">Register Now!</a></small>
      </main>
      
    </div>
</div>
  
@endsection