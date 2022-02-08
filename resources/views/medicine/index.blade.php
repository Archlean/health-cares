@extends('layouts.main')

@section('container')
    <div class="webkit-listener" style="width: 100%">
        @if (session()->has('post-success'))
            <div class="alert alert-success alert-dismissible fade show d-flex justify-content-center" style="height: fit-content; width:fit-content" role="alert">
            <small class="d-block text-center"> {{ session('post-success') }} </small>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ($infomessage != 'nomessage')
            <div class="alert alert-success alert-dismissible fade show d-flex justify-content-center w-100" style="height: fit-content; width:fit-content" role="alert">
            <small class="d-block text-center"> {{ $infomessage }} </small>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($overlay == 'new recipe')
        
            <div style="position: fixed; color:white; width: 100%; height: 100%; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0,0,0,0.9); z-index: 12;">
                <div class="container">
                    <div class="card d-flex justify-content-center mt-5">
                        <div class="card-title mt-3">
                            <h1 class="text-dark text-center"><strong>Create recipe configuration</strong></h1>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <main class="form-registration mt-1">    
                                        <form action="/medicine-list/info/order-save/new-recipe" method="post" class="hstack gap-2 mb-4">
                                            @csrf
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title text-dark">Create new {{ $routes }} recipes</h5>
                                                    <div class="form-floating">
                                                        <input type="text" name="recipename" class="form-control" id="recipename" placeholder="recipe name" required">
                                                        <label class="text-dark" for="recipename">Recipe name</label>
                                                    </div>
                                                    <p class="text-dark mt-4">Signa:</p>
                                                    <div class="input-group mb-3">
                                                        <select class="form-select" id="signa" name='signa'>
                                                            @foreach ($signa as $sign)
                                                                <option value="{{ $sign->signa_nama }}">{{ $sign->signa_nama }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <input type="text" hidden name="medcode" id="medcode" value="{{ $items[0]->obatalkes_id }}">
                                                    <input type="text" hidden name="quantity" id="quantity" value="{{ $arData['quantity'] }}">
                                                    <button class="w-100 btn btn-lg btn-primary mt-2" type="submit">Add Recipe</button>
                                                    <a href="/medicine-list/info/{{ $arData['id'] }}" class="text-danger">Back</a>
                                                </div>
                                            </div>
                                        </form>
                                    </main>
                                </div>
                            </div>
                            <p class="text-warning text-center mt-3">notes: you not have any recipe list, please create one recipe before adding any medicine</p>
                        </div>
                    </div>
                </div>
            </div>
            
        @endif
        @if ($overlay == 'existing recipe')
            
            <div style="position: fixed; color:white; width: 100%; height: 100%; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0,0,0,0.9); z-index: 12;">
                <div class="container">
                    <div class="card d-flex justify-content-center mt-5">
                        <div class="card-title mt-3">
                            <h4 class="text-dark text-center"><strong>Select your recipt list</strong></h3>
                        </div>
                        <div class="card-body">
                            <main>
                                <form action="/medicine-list/info/order-save/modified-recipe" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="card">
                                            <div class="card-title text-center text-dark mt-2">
                                                <h5>Recipe list information</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-2 mt-2">
                                                        <p class="text-dark">Select recipe</p>
                                                    </div>
                                                    <div class="col-lg-10"><select class="form-select" id="recipename" name='recipename'>
                                                        @foreach ($userRecipe as $recipe)
                                                            <option value="{{ $recipe->recipe_name }}">{{ $recipe->recipe_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mt-2">
                                            <img src="https://source.unsplash.com/300x200?{{ $items[0]->obatalkes_nama }}" class="card-img-top" alt="{{ $items[0]->obatalkes_nama }}">
                                        </div>
                                        <div class="col-lg-8 mt-2">
                                            <h5 class="fs-5 text-dark mb-4 ">Medicine information</h5>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <p class="text-dark">Medicine name</p>
                                                </div>
                                                <div class="col-lg-9">
                                                    <input readonly class="w-100" type="text" name="medname" id="medname" value="{{ $items[0]->obatalkes_nama }}">
                                                </div>
                                                <div class="col-lg-3">
                                                    <p class="text-dark">Medicine Quantity</p>
                                                </div>
                                                <div class="col-lg-9">
                                                    <input readonly class="w-100" type="text" name="quantity" id="quantity" value="{{ $arData['quantity'] }}">
                                                </div>
                                            </div>
                                            <input readonly hidden class="w-100" type="text" name="medcode" id="medcode" value="{{ $arData['id'] }}">
                                            <div class="row d-flex justify-content-center">
                                                <button class="w-100 btn btn-lg btn-primary" type="submit">Add Medicine</button>
                                                <a href="/medicine-list/info/{{ $arData['id'] }}" class="text-danger fs-4 d-flex justify-content-center mt-2">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </main>
                        </div>
                    </div>
                </div>
            </div>

        @endif
        @if ($overlay == 'non recipe')
            
            <div style="position: fixed; color:white; width: 100%; height: 100%; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0,0,0,0.9); z-index: 12;">
                <div class="container">
                    <div class="card d-flex justify-content-center mt-5">
                        <div class="card-title mt-3">
                            <h4 class="text-dark text-center"><strong>Order result</strong></h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <img src="https://source.unsplash.com/300x200?{{ $items[0]->obatalkes_nama }}" class="card-img-top" alt="{{ $items[0]->obatalkes_nama }}">
                                </div>
                                <div class="col-lg-8">
                                    <h5 class="fs-5 text-dark mb-4">Scheme Detail</h5>
                                    <main>
                                        <form action="/medicine-list/info/order-save/medicine" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <p class="text-dark">Scheme name</p>
                                                </div>
                                                <div class="col-lg-9">
                                                    <input readonly class="w-100" type="text" name="schemname" id="schemname" value="{{ $arData['orderScheme'] }}">
                                                </div>
                                                <div class="col-lg-3">
                                                    <p class="text-dark">Medicine name</p>
                                                </div>
                                                <div class="col-lg-9">
                                                    <input readonly class="w-100" type="text" name="medname" id="medname" value="{{ $items[0]->obatalkes_nama }}">
                                                </div>
                                                <div class="col-lg-3">
                                                    <p class="text-dark">Signa information</p>
                                                </div>
                                                <div class="col-lg-9">
                                                    <input readonly class="w-100" type="text" name="signa" id="signa" value="{{ $arData['signa'] }}">
                                                </div>
                                                <div class="col-lg-3">
                                                    <p class="text-dark">Recipe Quantity</p>
                                                </div>
                                                <div class="col-lg-9">
                                                    <input readonly class="w-100" type="text" name="quantity" id="quantity" value="{{ $arData['quantity'] }}">
                                                </div>
                                            </div>
                                            <input readonly hidden class="w-100" type="text" name="medcode" id="medcode" value="{{ $arData['id'] }}">
                                            <div class="row d-flex justify-content-center">
                                                <button class="w-100 btn btn-lg btn-primary" type="submit">Order</button>
                                                <a href="/medicine-list/info/{{ $arData['id'] }}" class="text-danger fs-4 d-flex justify-content-center mt-2">Cancel</a>
                                            </div>
                                        </form>
                                    </main>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        @endif

        <h1 class="mb-5 text-center"> {{ $routes }} | Explore our extensive medicine </h1>
        
        @if ($items->count())
        
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
                                                    <form action="/medicine-list/info/order-save" method="post">
                                                        @csrf
                                                        <div class="card-body">
                                                            <!-- Radio Order Categoy 1  -->
                                                            <div class="radio">
                                                                {!! Form::radio('category', 'Order as self medicine', true, ['id' => 'category1']) !!}
                                                                {!! Form::label('category1', 'Order as self medicine') !!}
                                                            </div>
                                                            <!-- Radio Order Categoy 2 -->
                                                            <div class="radio">
                                                                {!! Form::radio('category', 'Order as recipe list', false, ['id' => 'category2']) !!}
                                                                {!! Form::label('category2', 'Order as recipe list') !!}
                                                            </div>
                                                            <p class="text-dark mt-3">Quantity:</p>
                                                            <!-- Quantity Selection -->
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
                                                                <input readonly type="text" id="quantity" name="quantity" placeholder="quantity" class="form-control text-ceter input-number w-20 mw-20" value="1" min="1" max="{{ intval($items[0]->stok) }}">
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
                                                            <!-- Sign Selection -->
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
                                                            <div class="mb-2">
                                                                <input type="text" readonly hidden value="{{ $items[0]->obatalkes_id }}" name="id" placeholder="id" id="id">
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
                                                    <form action="/medicine-list/info/order-save/" method="get">
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
                                <a href="/medicine-list" class="btn btn-primary mt-1 w-100 fs-4 mb-1"><small>All List</small> </a>
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