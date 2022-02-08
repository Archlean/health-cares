@extends('layouts.main')

@section('container')
    <div class="webkit-listener mb-5">
        <h1 class="mb-5 text-center"> {{ $routes }} | Detail of {{ $recipe[0]->recipe_name }} </h1>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Medicine Name</th>
                <th scope="col">Signa Recipe</th>
                <th scope="col">Quantity</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($detail as $myrecipe)
                <tr>
                  <td>{{ $myrecipe->id }}</td>
                  <td>{{ $myrecipe->name }}</td>
                  <td>{{ $recipe[0]->signa_recipe}}</td>
                  <td>{{ $myrecipe->quantity }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
@endsection