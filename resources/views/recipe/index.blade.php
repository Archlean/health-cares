@extends('layouts.main')

@section('container')
    <div class="webkit-listener">
        <h1 class="mb-5 text-center"> {{ $routes }} | Select your action </h1>

        <div class="container">
            <div class="row">

                <div class="col-md-6 mb-3">
                    <div class="card">
                        <img src="https://source.unsplash.com/300x200?recipe" class="card-img-top" alt="recipe">
                        <div class="card-body">
                            <h5 class="card-title">Create New Recipe</h5>
                            <p class="card-text">Create your prescription from our rich medicine list, and take the prescription to the nearest pharmacy or hospital for more convenient selection.</p>
                            <a href="/new-recipe" class="btn btn-primary">Create now</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 mb-3">
                    <div class="card">
                        <img src="https://source.unsplash.com/300x200?paper" class="card-img-top" alt="paper">
                        <div class="card-body">
                            <h5 class="card-title">Explore Medicine</h5>
                            <p class="card-text">Explore the extensive list of our medicines for your reference.</p>
                            <a href="/medicine-list" class="btn btn-primary">Browse now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection