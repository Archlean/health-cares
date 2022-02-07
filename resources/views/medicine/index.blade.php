@extends('layouts.main')

@section('container')
    <div class="webkit-listener" style="width: 100%">
        @if (session()->has('post-success'))
            <div class="alert alert-success alert-dismissible fade show d-flex justify-content-center" style="height: fit-content; width:fit-content" role="alert">
            <small class="d-block text-center"> {{ session('post-success') }} </small>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ($overlay == 'new')
            <div style="position: fixed; color:white; width: 100%; height: 100%; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0,0,0,0.9); z-index: 2;">
                <div class="row-lg-3 w-100">
                    <main class="form-registration mt-1">    
                        <form action="/medicine/save-new" method="post" class="hstack gap-2 mb-4">
                            @csrf
                            <div class="card mb-5">
                                <img src="https://source.unsplash.com/800x400?{{ $items[0]->obatalkes_nama }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-dark">{{ $items[0]->obatalkes_nama }}</h5>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <p class="text-dark">Medicine Code</p>
                                                <div class="form-floating">
                                                    <input readonly type="text" name="medcode" class="form-control" id="medcode" value="{{ $items[0]->obatalkes_kode }}" placeholder="medcode" required>
                                                    <label class="text-dark" for="medcode">M-Code</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <p class="text-dark">Categoty</p>
                                                <div class="input-group mb-3">
                                                    <select class="form-select" id="category" name='category'>
                                                        <option value="Non Concoction"">Non Concoction</option>
                                                        <option value="Concoction"">Concoction</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <p class="text-dark">Sheet name</p>
                                                <div class="form-floating">
                                                    <input type="text" name="recipename" class="form-control @error('recipename') is-invalid @enderror" id="recipename" placeholder="recipe name" required">
                                                    <label class="text-dark" for="recipename">Sheet name</label>
                                                    @error('recipename')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="container mt-2">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <p class="text-dark">Quantity:</p>
                                                <div class="input-group mb-3">
                                                    <button class="btn bg-danger ms-auto text-white" onclick="decrement()" type="button">
                                                            -
                                                            <script>
                                                                function decrement(){
                                                                    var maxLimit = parseInt(document.getElementById("quantity").max);
                                                                    var currentNumber = parseInt(document.getElementById("quantity").value);
                                                                    if (currentNumber > 1){
                                                                        currentNumber--;
                                                                    }
                                                                    else if (currentNumber > maxLimit){
                                                                        currentNumber = maxLimit;
                                                                    }
                                                                    else if (currentNumber < 1){
                                                                        currentNumber = 1;
                                                                    }
                                                                    document.getElementById("quantity").value = currentNumber;
                                                                }
                                                            </script>
                                                        </button>
                                                    <input readonly type="text" id="quantity" name="quantity" placeholder="quantity" class="form-control input-number w-20" value="1" min="1" max="{{ intval($items[0]->stok) }}">
                                                    <button class="btn bg-primary text-white" onclick="increment()" type="button">
                                                            +
                                                            <script>
                                                                function increment(){
                                                                    var maxLimit = parseInt(document.getElementById("quantity").max);
                                                                    var currentNumber = parseInt(document.getElementById("quantity").value);
                                                                    if (currentNumber < maxLimit){
                                                                        currentNumber++;
                                                                    }
                                                                    else if (currentNumber < 1){
                                                                        currentNumber = 1;
                                                                    }
                                                                    else if (currentNumber > maxLimit){
                                                                        currentNumber = maxLimit;
                                                                    }
                                                                    document.getElementById("quantity").value = currentNumber;
                                                                }
                                                            </script>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <p class="text-dark">Signa:</p>
                                                <div class="input-group mb-3">
                                                    <select class="form-select @error('signa') is-invalid @enderror" id="signa" name='signa'>
                                                      @foreach ($signa as $sign)
                                                        <option value="{{ $sign->signa_nama }}">{{ $sign->signa_nama }}</option>
                                                      @endforeach
                                                    </select>
                                                    @error('signa')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="card-text text-dark">Stock available {{ intval($items[0]->stok) }}
                                    </p>
                                    <button class="w-100 btn btn-lg btn-primary mt-2" type="submit">Add Medicine</button>
                                    <a href="/medicine-list" class="text-danger">Back</a>
                                </div>
                            </div>
                        </form>
                    </main>
                </div>
            </div>
        @endif
        
        @if ($overlay == 'existing')
            <div style="position: fixed; color:white; width: 100%; height: 100%; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0,0,0,0.9); z-index: 2;">
                
                <div class="row-mb-3 justify-content-center">
                    <main class="form-registration mt-1">    
                        <form action="/new-recipe/include/{{ $items[0]->obatalkes_id }}" method="get" class="hstack gap-2 mb-4">
                            @csrf
                            <div class="card mb-3">
                                <img src="https://source.unsplash.com/800x400?{{ $items[0]->obatalkes_nama }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-dark">a{{ $items[0]->obatalkes_nama }}</h5>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <p class="text-dark">Categoty</p>
                                                <div class="input-group mb-3">
                                                    <select class="form-select" id="signa" name='signa'>
                                                        <option value="Concoction"">Concoction</option>
                                                        <option value="Non Concoction"">Non Concoction</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <p class="text-dark">Sheet name</p>
                                                <div class="form-floating">
                                                    <input type="text" name="recipename" class="form-control" id="recipename" placeholder="recipe name" required">
                                                    <label class="text-dark" for="recipename">Sheet name</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <p class="text-dark">Quantity:</p>
                                                <div class="input-group mb-3">
                                                    <button class="btn bg-danger ms-auto text-white" onclick="decrement()" type="button">
                                                            -
                                                            <script>
                                                                function decrement(){
                                                                    var maxLimit = parseInt(document.getElementById("quantity").max);
                                                                    var currentNumber = parseInt(document.getElementById("quantity").value);
                                                                    if (currentNumber > 1){
                                                                        currentNumber--;
                                                                    }
                                                                    else if (currentNumber > maxLimit){
                                                                        currentNumber = maxLimit;
                                                                    }
                                                                    else if (currentNumber < 1){
                                                                        currentNumber = 1;
                                                                    }
                                                                    document.getElementById("quantity").value = currentNumber;
                                                                }
                                                            </script>
                                                        </button>
                                                    <input readonly type="text" id="quantity" name="quantity" placeholder="quantity" class="form-control input-number w-20" value="1" min="1" max="{{ intval($items[0]->stok) }}">
                                                    <button class="btn bg-primary text-white" onclick="increment()" type="button">
                                                            +
                                                            <script>
                                                                function increment(){
                                                                    var maxLimit = parseInt(document.getElementById("quantity").max);
                                                                    var currentNumber = parseInt(document.getElementById("quantity").value);
                                                                    if (currentNumber < maxLimit){
                                                                        currentNumber++;
                                                                    }
                                                                    else if (currentNumber < 1){
                                                                        currentNumber = 1;
                                                                    }
                                                                    else if (currentNumber > maxLimit){
                                                                        currentNumber = maxLimit;
                                                                    }
                                                                    document.getElementById("quantity").value = currentNumber;
                                                                }
                                                            </script>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <p class="text-dark">Signa:</p>
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text" for="inputGroupSelect01">Notes</label>
                                                    <select class="form-select" id="signa" name='signa'>
                                                      <option selected>Choose...</option>
                                                      @foreach ($signa as $sign)
                                                        <option value="{{ $sign->signa_nama }}">{{ $sign->signa_nama }}</option>
                                                      @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="card-text text-dark">Stock available {{ intval($items[0]->stok) }}
                                    </p>
                                    <button class="w-100 btn btn-lg btn-primary mt-2" type="submit">Add Medicine</button>
                                    <a href="/medicine-list" class="text-danger">Back</a>
                                </div>
                            </div>
                        </form>
                    </main>
                </div>
            </div>
        @endif

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
            
            @if ($views == 'SPECIFIC')
                    
                <div class="container">
                    <div class="row">
                        <form action="/medicine-list/search" method="get" class="hstack gap-2 mb-4">
                            @csrf
                            <div class="col-md-9">
                                <div class="form-floating">
                                <input type="text" name="text" class="form-control" id="text" placeholder="'KASSA NON-XRAY 10 CM X 10 CM'" autofocus required">
                                <label for="text">Medicine name</label>
                                </div>
                            </div>
                                
                            <div class="col-md-3">
                                <button class="w-100 btn btn-lg btn-primary" type="submit"">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="card rounded">
                    <div class="card-title">
                        <h1 class="text-dark text-center mt-2"><strong>{{ $items[0]->obatalkes_nama }}</strong></h1>
                    </div>

                    <div class="card-body">
                        <div class="row mt-5 ml-4">
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-lg-5">
                                        <img src="https://source.unsplash.com/1200x800?{{ $items[0]->obatalkes_nama }}" class="card-img-top" alt="{{ $items[0]->obatalkes_nama }}">
                                        <div class="mt-3">
                                            <p><small>Uploaded {{ \Carbon\Carbon::parse($items[0]->created_date)->diffForHumans() }}</small></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <p class="fs-3">Medicine Description</p>
                                        <p class="fs-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda, distinctio voluptas nesciunt similique aliquam nulla ipsum delectus quisquam animi dolorem dolor! Ipsum laudantium voluptas esse nulla. Impedit soluta eveniet porro temporibus, quidem rerum placeat tenetur fugit aut labore aspernatur accusamus possimus dolor nemo esse. Laborum incidunt, ipsam alias aspernatur natus temporibus deserunt at, odio minus sapiente numquam tempore dolorum omnis eaque expedita quia dolor reprehenderit harum voluptatibus tenetur labore aperiam consequuntur voluptatem? Neque, beatae magnam repudiandae maiores eaque architecto natus eum culpa, recusandae quam maxime sunt temporibus officiis illo voluptate quis exercitationem sequi fugiat fugit ipsam? Cumque asperiores cupiditate totam. Eum, fugit saepe consequuntur sed velit omnis nostrum rerum ex aspernatur, architecto laudantium dolorum error corrupti, inventore commodi earum repellendus adipisci unde fugiat! Dolores ipsa reiciendis necessitatibus voluptatum voluptatem dicta dolorem quam! Reiciendis possimus voluptas ipsa quis quia doloremque esse officia enim, excepturi sit explicabo. Aspernatur atque excepturi aliquam iste exercitationem dicta corrupti eum, sit voluptas ut voluptates quis esse quas suscipit! Tempora dolor error molestiae reprehenderit aliquid ducimus expedita esse excepturi ullam quia. Aliquid sed nostrum vero, quisquam illum sequi a velit quas incidunt natus doloribus magni explicabo eos maxime ex ipsam quae odit ea ad laboriosam deserunt recusandae?</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card mt-5">
                                    <div class="card-title mt-3">
                                        <h5 class="text-dark text-center">General Information</h4>
                                    </div>

                                    <div class="card-body">

                                        @if (intval($items[0]->stok) > 0)

                                            <div class="card rounded">
                                                <div class="card-title">
                                                    <h5 class="text-center"><small>select order</small></h5>
                                                </div>
                                                <main>
                                                    <form action="/medicine-list/info/order-save/{{ $items[0]->obatalkes_id }} method="post">
                                                        @csrf
                                                        <div class="card-body">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="category" id="recipelist">
                                                                <label class="form-check-label" for="recipelist">
                                                                Order as recipe list
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="category" id="selfmedicine" checked>
                                                                <label class="form-check-label" for="selfmedicine">
                                                                Order as self medicine
                                                                </label>
                                                            </div>
                                                            <p class="text-dark">Quantity:</p>
                                                            <div class="input-group mb-2">
                                                                <button class="btn bg-danger ms-auto text-white" onclick="decrement()" type="button">
                                                                        -
                                                                        <script>
                                                                            function decrement(){
                                                                                var maxLimit = parseInt(document.getElementById("quantity").max);
                                                                                var currentNumber = parseInt(document.getElementById("quantity").value);
                                                                                if (currentNumber > 1){
                                                                                    currentNumber--;
                                                                                }
                                                                                else if (currentNumber > maxLimit){
                                                                                    currentNumber = maxLimit;
                                                                                }
                                                                                else if (currentNumber < 1){
                                                                                    currentNumber = 1;
                                                                                }
                                                                                document.getElementById("quantity").value = currentNumber;
                                                                            }
                                                                        </script>
                                                                    </button>
                                                                <input readonly disabled type="text" id="quantity" name="quantity" placeholder="quantity" class="form-control input-number w-20 mw-20" value="1" min="1" max="{{ intval($items[0]->stok) }}">
                                                                <button class="btn bg-primary text-white" onclick="increment()" type="button">
                                                                        +
                                                                        <script>
                                                                            function increment(){
                                                                                var maxLimit = parseInt(document.getElementById("quantity").max);
                                                                                var currentNumber = parseInt(document.getElementById("quantity").value);
                                                                                if (currentNumber < maxLimit){
                                                                                    currentNumber++;
                                                                                }
                                                                                else if (currentNumber < 1){
                                                                                    currentNumber = 1;
                                                                                }
                                                                                else if (currentNumber > maxLimit){
                                                                                    currentNumber = maxLimit;
                                                                                }
                                                                                document.getElementById("quantity").value = currentNumber;
                                                                            }
                                                                        </script>
                                                                </button>
                                                            </div>
                                                            <div class="mt-2">
                                                                <p class="text-dark">Signa:</p>
                                                                <div class="input-group mb-3">
                                                                    <select class="form-select @error('signa') is-invalid @enderror" id="signa" name='signa'>
                                                                    @foreach ($signa as $sign)
                                                                        <option value="{{ $sign->signa_nama }}">{{ $sign->signa_nama }}</option>
                                                                    @endforeach
                                                                    </select>
                                                                    @error('signa')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <button class="w-100 btn btn-lg btn-primary" type="submit">Order</button>
                                                        </div>
                                                    </form>
                                                </main>
                                            </div>

                                            <div class="text-primary">
                                                <p>Stock available {{ intval($items[0]->stok) }} left</p>
                                                <p class="text-dark"><small>Notes: <br> you can insert this medicine to your concoction or your recipe list, also you can add it with non concoction list. non concoction list will included with signa information for each medicine while concoction list will use it signa information from it's recipe name</small> </p>
                                            </div>

                                        @else

                                            <div class="card rounded">
                                                <div class="card-title">
                                                    <h5 class="text-center"><small>select order</small></h5>
                                                </div>
                                                <main>
                                                    <form action="/medicine-list/info/order-save/{{ $items[0]->obatalkes_id }} method="post">
                                                        @csrf
                                                        <div class="card-body">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="category" id="recipelist" disabled>
                                                                <label class="form-check-label" for="recipelist">
                                                                Order as recipe list
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="category" id="selfmedicine" disabled>
                                                                <label class="form-check-label" for="selfmedicine">
                                                                Order as self medicine
                                                                </label>
                                                            </div>
                                                            <p class="text-dark">Quantity:</p>
                                                            <div class="input-group mb-2">
                                                                <button class="btn bg-danger ms-auto text-white" onclick="decrement()" type="button" disabled>
                                                                        -
                                                                        <script>
                                                                            function decrement(){
                                                                                var maxLimit = parseInt(document.getElementById("quantity").max);
                                                                                var currentNumber = parseInt(document.getElementById("quantity").value);
                                                                                if (currentNumber > 1){
                                                                                    currentNumber--;
                                                                                }
                                                                                else if (currentNumber > maxLimit){
                                                                                    currentNumber = maxLimit;
                                                                                }
                                                                                else if (currentNumber < 1){
                                                                                    currentNumber = 1;
                                                                                }
                                                                                document.getElementById("quantity").value = currentNumber;
                                                                            }
                                                                        </script>
                                                                    </button>
                                                                <input readonly disabled type="text" id="quantity" name="quantity" placeholder="quantity" class="form-control input-number w-20" value="0" min="0" max="0">
                                                                <button class="btn bg-primary text-white" onclick="increment()" type="button" disabled>
                                                                        +
                                                                        <script>
                                                                            function increment(){
                                                                                var maxLimit = parseInt(document.getElementById("quantity").max);
                                                                                var currentNumber = parseInt(document.getElementById("quantity").value);
                                                                                if (currentNumber < maxLimit){
                                                                                    currentNumber++;
                                                                                }
                                                                                else if (currentNumber < 1){
                                                                                    currentNumber = 1;
                                                                                }
                                                                                else if (currentNumber > maxLimit){
                                                                                    currentNumber = maxLimit;
                                                                                }
                                                                                document.getElementById("quantity").value = currentNumber;
                                                                            }
                                                                        </script>
                                                                </button>
                                                            </div>
                                                            <div class="mt-2">
                                                                <p class="text-dark">Signa:</p>
                                                                <div class="input-group mb-3">
                                                                    <select class="form-select @error('signa') is-invalid @enderror" id="signa" name='signa'>
                                                                    @foreach ($signa as $sign)
                                                                        <option value="{{ $sign->signa_nama }}">{{ $sign->signa_nama }}</option>
                                                                    @endforeach
                                                                    </select>
                                                                    @error('signa')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <button class="w-100 btn btn-lg btn-dark" disabled type="submit">Order</button>
                                                        </div>
                                                    </form>
                                                </main>
                                            </div>

                                            <div>
                                                <p class="text-danger">Stock Not Available</p>
                                            </div>

                                        @endif
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <a href="/medicine-list" class="mb-4">Back to list</a>
            @else

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
                                
                            <div class="col-md-2">
                                <button class="w-100 btn btn-lg btn-primary" type="submit"">Search</button>
                            </div>
                            
                            <div class="col-md-2">
                                <a href="/medicine-list" class="btn btn-primary mt-1 w-100 fs-4 mb-1"><small>Reset</small> </a>
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
                                        <h5 class="card-title"><a href="/medicine-list/info/{{ $item->obatalkes_id }}">{{ $item->obatalkes_nama }}</a></h5>
                                        <p class="card-text">
                                            <small>Medicine description</small>
                                        </p>
                                        <p class="card-text"> 
                                            <small class="text-muted">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur, quisquam.
                                            </small>
                                        </p>
                                        <p class="card-text"> 
                                            <small class="text-primary">Stock available {{ intval($item->stok) }} left</small> 
                                        </p>
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
                
            @endif
        @else
            
            <p class="text-center fs-4">Medicine not found!</p>
            <a href="/recipe" class="mb-4">Back to selection</a>

        @endif
    </div>
@endsection