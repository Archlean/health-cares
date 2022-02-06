@extends('layouts.main')

@section('container')
    <div class="webkit-listener">
        <h1 class="mb-5 text-center"> {{ $routes }} | Select your action </h1>
        
        <div class="container">
            <div class="row">

                <div class="col-md-6 mb-3">
                    <div class="card">
                        <img src="https://source.unsplash.com/300x200?paper" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">non concoction</h5>
                            <p class="card-text">Create your medicine recipe without any concotion.</p>
                            <a href="/recipe-non-concoction" class="btn btn-primary">Create now</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 mb-3">
                    <div class="card">
                        <img src="https://source.unsplash.com/300x200?concoction" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">concoction</h5>
                            <p class="card-text">Create your medicine recipe without any concotion.</p>
                            <a href="/recipe-non-concoction" class="btn btn-primary">Create now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <a href="/recipe" class="mb-5">Back to selection</a>
    </div>
@endsection