@extends('template.main')

@section('content')
    <div class="text-center mb-5">
        <h1>Category Lists</h1>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-4 mb-4">
                    <div class="card text-bg-dark border-light">
                        <a href="/post?category={{ $category->slug }}" class="text-white">
                        @if ($category->image)
                        <div style="max-height:500px; overflow:hidden">
                            <img src="{{ asset('storage/' . $category->image) }}" class="img-fluid text-center" alt="{{ $category->name }}">   
                        </div>
                        @else
                            <img src="https://source.unsplash.com/500x500?{{ $category->name }}" class="img-fluid text-center" alt="{{ $category->name }}">   
                        @endif
                        <div class="card-img-overlay d-flex align-items-center p-0">
                            <h5 class="card-title text-center flex-fill p-4" style="background-color: rgba(0, 0, 0, 0.7)">
                                {{ $category->name }}
                            </h5>
                        </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection