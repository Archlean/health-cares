@extends('layouts.main')

@section('container')
    <div class="webkit-listener mb-5">
        <h1 class="mb-5 text-center"> {{ $routes }} | Detail of {{ $recipe[0]->recipe_name }} </h1>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">Medicine Name</th>
                <th scope="col">Signa Recipe</th>
                <th scope="col">Quantity</th>
              </tr>
            </thead>
            <tbody>
              @if ($recipe[0]->category == 'recipe / concoction')
                @foreach ($detail as $myrecipe)
                  <tr>
                    <td>{{ $myrecipe['name'] }}</td>
                    <td>{{ $recipe[0]->signa_recipe}}</td>
                    <td>{{ $myrecipe['quantity'] }}</td>
                  </tr>
                @endforeach
              @else
                <tr>
                  <td>{{ json_decode($recipe[0]->recipe_detail) }}</td>
                  <td>{{ $recipe[0]->signa_recipe }}</td>
                  <td>{{ $recipe[0]->quantity }}</td>
                </tr>
              @endif
            </tbody>
          </table>
          <a href="/user-recipe" class="btn btn-primary"><i class="bi bi-backspace"></i>Back to recipe list</a>
          <a href="/user-recipe/print/{{ $recipe[0]->id }}" class="btn btn-warning"><i class="bi bi-printer"></i>Print recipe</a>
          <a href="/user-recipe/delete/{{ $recipe[0]->id }}" class="btn btn-danger"><i class="bi bi-trash"></i>Delete recipe</a>
        </div>
    </div>
@endsection