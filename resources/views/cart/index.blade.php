@extends('layouts.main')

@section('container')
  <div class="webkit-listener mb-5">
    @if ($message != 'no message')
        <div class="alert alert-warning alert-dismissible fade show d-flex justify-content-center w-100" style="height: fit-content; width:fit-content" role="alert">
        <small class="d-block text-center"> {{ $message }} </small>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
  
    <h1 class="mb-5 text-center"> {{ $routes }} | Manage listed recipes </h1>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">Recipe Title</th>
            <th scope="col">Category</th>
            <th scope="col">Signa Recipe</th>
            <th scope="col">Quantity</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($recipe as $myrecipe)
            <tr>
              <td>{{ $myrecipe->recipe_name }}</td>
              <td>{{ $myrecipe->category }}</td>
              <td>{{ $myrecipe->signa_recipe }}</td>
              <td>{{ $myrecipe->quantity }}</td>
              <td>
                <a href="/user-recipe/scheme/{{ $myrecipe->id }}" class="badge bg-info">
                  <i class="bi bi-eye"></i>
                </a>
                <a href="/user-recipe/print/{{ $myrecipe->id }}" class="badge bg-warning">
                  <i class="bi bi-printer"></i>
                </a>
                <a href="/user-recipe/delete/{{ $myrecipe->id }}" class="badge bg-danger">
                  <i class="bi bi-trash"></i>
                </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection