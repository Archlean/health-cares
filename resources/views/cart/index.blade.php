@extends('layouts.main')

@section('container')
    <div class="webkit-listener mb-5">
        <h1 class="mb-5 text-center"> {{ $routes }} | Manage listed recipes </h1>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Category</th>
                <th scope="col">Recipe Title</th>
                <th scope="col">Signa Recipe</th>
                <th scope="col">Quantity</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($recipe as $myrecipe)
                <tr>
                  <td>{{ $myrecipe->id }}</td>
                  <td>{{ $myrecipe->category }}</td>
                  <td>{{ $myrecipe->recipe_name }}</td>
                  <td>{{ $myrecipe->signa_recipe }}</td>
                  <td>{{ $myrecipe->quantity }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
@endsection