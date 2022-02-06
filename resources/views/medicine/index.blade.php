@extends('layouts.main')

@section('container')
    <div class="webkit-listener">
        <h1 class="mb-5 text-center"> {{ $routes }} | Explore our extensive medicine </h1>
        
        @if ($items->count())
                
            <!--<div class="card mb-3">
                <img src="https://source.unsplash.com/1200x400? $items[0]->obatalkes_nama }}" class="card-img-top" alt="$items[0]->obatalkes_nama }}">
                <div class="card-body">
                    <h5 class="card-title"> $items[0]->obatalkes_nama }}</h5>
                    <p class="card-text"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Optio et dolorum ipsum unde? Accusamus reiciendis mollitia ab, est odit, in reprehenderit quidem ut nesciunt illo quos. Similique laudantium, qui nobis dolores sunt rerum sint repudiandae repellendus nihil nemo. Facilis dolores veniam similique exercitationem delectus numquam consequatur nostrum est fuga, molestiae laboriosam doloribus nesciunt dolorem quasi sed minima accusamus at id corporis, repudiandae obcaecati animi. Porro voluptatem obcaecati fugit? Corporis magni obcaecati voluptatibus voluptate, distinctio illum labore quibusdam ipsum provident libero sapiente modi fuga? Rerum cumque accusantium nobis tenetur placeat eveniet obcaecati, suscipit modi unde distinctio? Molestiae deleniti illum recusandae sunt ea incidunt odit ipsa sint, doloribus dolores a possimus veniam! Alias ea officia quae neque adipisci maxime eligendi quidem perspiciatis? </p>
                    <p class="card-text"><small>Stock available intval($items[0]->stok) }}</small> </p>
                    <a href="/new-recipe" class="btn btn-primary">Create recipe now</a>
                </div>
            </div>-->
            
            <div class="container">
                <div class="row">
                    <form action="/medicine-list/search" method="get" class="hstack gap-2 mb-4">
                        @csrf
                        <div class="col-md-8">
                            <div class="form-floating">
                            <input type="text" name="text" class="form-control" id="text" placeholder="'KASSA NON-XRAY 10 CM X 10 CM'" autofocus required">
                            <label for="text">Medicine name</label>
                            </div>
                        </div>
                            
                        <div class="col-md-4">
                            <div class="row-md-2">
                                <button class="w-100 h-50 btn btn-lg btn-primary" type="submit"">Search</button>
                                <a href="/medicine-list" class="btn btn-primary mt-1 w-100 h-50">Load all</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="container">
                <div class="row">

                    @foreach ($items as $item)
                    
                        <div class="col-md-4">
                            <div class="card mb-3">
                                <img src="https://source.unsplash.com/1200x400?{{ $item->obatalkes_nama }}" class="card-img-top" alt="{{ $item->obatalkes_nama }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->obatalkes_nama }}</h5>
                                    <p class="card-text">
                                        <small>Medicine description</small>
                                    </p>
                                    <p class="card-text"> 
                                        <small class="text-muted">
                                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Optio et dolorum ipsum unde? Accusamus reiciendis mollitia ab, est odit, in reprehenderit quidem ut nesciunt illo quos. Similique laudantium, qui nobis dolores sunt rerum sint repudiandae repellendus nihil nemo. Facilis dolores veniam similique exercitationem delectus numquam consequatur nostrum est fuga, molestiae laboriosam doloribus nesciunt dolorem quasi sed minima accusamus at id corporis, repudiandae obcaecati animi. Porro voluptatem obcaecati fugit? Corporis magni obcaecati voluptatibus voluptate, distinctio illum labore quibusdam ipsum provident libero sapiente modi fuga? Rerum cumque accusantium nobis tenetur placeat eveniet obcaecati, suscipit modi unde distinctio? Molestiae deleniti illum recusandae sunt ea incidunt odit ipsa sint, doloribus dolores a possimus veniam! Alias ea officia quae neque adipisci maxime eligendi quidem perspiciatis? 
                                        </small>
                                    </p>
                                    <p class="card-text"> 

                                        @if (intval($item->stok))
                                            <small class="text-primary">Stock available {{ intval($item->stok) }} left</small> </p>
                                            <a href="/new-recipe" class="btn btn-primary w-100 mb-3" aria-disabled="true">Add to new recipe</a>
                                            <a href="/medicine" class="btn btn-primary w-100" aria-disabled="true">Add to existing recipe</a>
                                        @else
                                            <small class="text-danger">Stock unvailable</small> </p>
                                            <a href="/" class="btn btn-dark w-100 mb-3 pe-none" aria-disabled="true">Add to new recipe</a>
                                            <a href="/" class="btn btn-dark w-100 pe-none" aria-disabled="true">Add to existing recipe</a>
                                        @endif 
                                    
                                </div>
                            </div>
                        </div>

                    @endforeach
                
                </div>
            </div>
            <a href="/recipe" class="mb-4">Back to selection</a>
            {{-- Pagination --}}
            <div class="d-flex justify-content-center mt-3 mb-3">
                {{ $items->links() }}
            </div>
        @else
            
            <p class="text-center fs-4">Medicine not found!</p>
            <a href="/recipe" class="mb-4">Back to selection</a>

        @endif
    </div>
@endsection