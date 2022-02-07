@extends('layouts.main')

@section('container')
    <div class="webkit-listener">
        @if ($overlay == true)
            <div style="position: fixed; color:white; width: 100%; height: 100%; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0,0,0,0.9); z-index: 2;">
                
                <div class="row-mb-3 justify-content-center">
                    <main class="form-registration mt-1">    
                        <form action="/new-recipe/save/{{ $routes }}" method="post" class="hstack gap-2 mb-4">
                            @csrf
                            <div class="card mb-3">
                                <img src="https://source.unsplash.com/800x400?storage" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-dark">Create new {{ $routes }} recipes</h5>
                                    <div class="form-floating">
                                        <input type="text" name="recipename" class="form-control" id="recipename" placeholder="recipe name" required">
                                        <label class="text-dark" for="recipename">Recipe name</label>
                                    </div>
                                    <button class="w-100 btn btn-lg btn-primary mt-2" type="submit">Add Recipe</button>
                                    <a href="/new-recipe" class="text-danger">Back</a>
                                </div>
                            </div>
                        </form>
                    </main>
                </div>
            </div>
        @endif

        <h1 class="mb-5 text-center"> {{ $routes }} | Select your action </h1>
        
        <div class="container">
            <div class="row">

                <div class="col-md-6 mb-3">
                    <div class="card">
                        <img src="https://source.unsplash.com/300x200?bookcase" class="card-img-top" alt="paper">
                        <div class="card-body">
                            <h5 class="card-title">Explore Medicine</h5>
                            <p class="card-text">Explore the extensive list of our medicines for your reference.</p>
                            <a href="/medicine-list" class="btn btn-primary">Browse now</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="card">
                        <img src="https://source.unsplash.com/300x200?concoction" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">concoction</h5>
                            <p class="card-text">Create your medicine recipe without any concotion.</p>
                            <a href="/new-recipe/recipe-concoction" class="btn btn-primary">Create now</a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection