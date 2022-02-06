@extends('layouts.main')

@section('container')
    <div class="webkit-listener">
        <h1 class="mb-5 text-center"> {{ $routes }} | New Medicine </h1>

        @if ($data->count())
                
            @foreach ($data as $item)
            
                <div class="card mb-3">
                    <img src="https://source.unsplash.com/1200x400?{{ $item->obatalkes_nama }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->obatalkes_nama }}</h5>
                        <p class="card-text">Medicine Description</p>
                        <p class="card-text"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Optio et dolorum ipsum unde? Accusamus reiciendis mollitia ab, est odit, in reprehenderit quidem ut nesciunt illo quos. Similique laudantium, qui nobis dolores sunt rerum sint repudiandae repellendus nihil nemo. Facilis dolores veniam similique exercitationem delectus numquam consequatur nostrum est fuga, molestiae laboriosam doloribus nesciunt dolorem quasi sed minima accusamus at id corporis, repudiandae obcaecati animi. Porro voluptatem obcaecati fugit? Corporis magni obcaecati voluptatibus voluptate, distinctio illum labore quibusdam ipsum provident libero sapiente modi fuga? Rerum cumque accusantium nobis tenetur placeat eveniet obcaecati, suscipit modi unde distinctio? Molestiae deleniti illum recusandae sunt ea incidunt odit ipsa sint, doloribus dolores a possimus veniam! Alias ea officia quae neque adipisci maxime eligendi quidem perspiciatis? </p>
                        <p class="card-text"><small>Uploaded {{ \Carbon\Carbon::parse($item->created_date)->diffForHumans() }}</small> </p>
                    </div>
                </div>

            @endforeach
            {{-- Pagination --}}
            <div class="d-flex justify-content-center mt-3 mb-3">
                {{ $data->links() }}
            </div>
        @else
            
            <p class="text-center fs-4">Feeds not found!</p>

        @endif
        
    </div>
@endsection