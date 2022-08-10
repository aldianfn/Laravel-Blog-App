@extends('template.main')

@section('content')
    <div class="text-center mb-5">
        <h1>{{ $title }}</h1>
    </div>
    {{-- @forelse ($post as $item)
        <div class="card row-hover pos-relative py-3 px-3 mb-3 border-warning border-top-0 border-right-0 border-bottom-0 rounded-0">
            <div class="row align-items-center">
            <div class="col-md-8 mb-3 mb-sm-0">
                <h2>
                <a href="/post/{{ $item->slug }}" class="text-primary">{{ $item->title }}</a>
                </h2>
                <h4>{{ $item->excerpt }}</h4>
                <p class="text-sm"><span >Posted by</span> <a class="text-black" href="/author/{{ $item->author->username }}">{{ $item->author->name }}</a><span> on xx xx xxxx</span></p>
                <div class="text-sm mt-2"> <a class="text-black mr-2" href="/categories/{{ $item->category->slug }}">#{{ $item->category->name }}</a> </div>
            </div>
            <div class="col-md-4">
                <div class="row text-center">
                <div class="col px-1"> <i class="ion-connection-bars icon-1x"></i> <span class="d-block text-sm">141 Votes</span> </div>
                <div class="col px-1"> <i class="ion-ios-chatboxes-outline icon-1x"></i> <span class="d-block text-sm">122 Replies</span> </div>
                <div class="col px-1"> <i class="ion-ios-eye-outline icon-1x"></i> <span class="d-block text-sm">290 Views</span> </div>
                </div>
            </div>
            </div>
        </div>
        @empty
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="error-template">
                        <h1>
                            Oops!</h1>
                        <h2>
                            No post available now</h2>
                        <div class="error-details">
                            Sorry, an error has occured, Requested page not found!
                        </div>
                        <div class="error-actions">
                            <a href="/categories" class="btn btn-primary btn-lg">Back to Categories </a>
                            <a href="/" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-envelope"></span> Create article </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforelse --}}

    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/post">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}" id="search">
                    <button class="btn btn-secondary" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    @if ($post->count())
        <div class="card mb-5 text-center">
            @if ($post[0]->image)
                <div style="max-height:400px; overflow:hidden">
                    <img src="{{ asset('storage/' . $post[0]->image) }}" class="img-fluid text-center" alt="{{ $post[0]->category->name }}">   
                </div>
            @else
                <img src="https://source.unsplash.com/1200x400?{{ $post[0]->category->name }}" class="img-fluid text-center" alt="{{ $post[0]->category->name }}">   
            @endif
            <div class="card-body">
            <a href="/post/{{ $post[0]->slug }}" class="link-secondary text-dark"><h5 class="card-title">{{ $post[0]->title }}</h5></a>
            <p class="card-text">{{ $post[0]->excerpt }}</p>
            <p class="card-text"><small class="text-muted">Posted by <a class="text-dark link-secondary" href="/post?author={{ $post[0]->author->username }}">{{ $post[0]->author->name }}</a> in 
                <a class="text-dark link-secondary" href="/post?category={{ $post[0]->category->slug }}">{{ $post[0]->category->name }}</a> {{ $post[0]->created_at->diffForHumans() }}</small></p>
            <a href="/post/{{ $post[0]->slug }}" class="btn btn-primary">Read more</a>
            </div>
        </div>

    <div class="container">
        <div class="row">
            @foreach ($post->skip(1) as $item)
            <div class="col-md-4 d-flex align-items-stretch">
                <div class="card mb-4">
                <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.5)">
                    <a href="/post?category={{$item->category->slug}}" class="text-white link-info">{{ $item->category->name }}</a>
                </div>
                @if ($item->image)
                    <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid text-center" alt="{{ $item->category->name }}">   
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $item->category->name }}" class="img-fluid text-center" alt="{{ $item->category->name }}">   
                @endif
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title"><a href="/post/{{ $item->slug }}" class="text-dark link-secondary">{{ $item->title }}</a></h5>
                    <p class="card-text">{{ $item->excerpt }}</p>
                    <p class="card-text"><small class="text-muted">Posted by <a class="text-dark link-secondary" href="/post?author={{ $item->author->username }}">{{ $item->author->name }}</a> {{ $item->created_at->diffForHumans() }}</small></p>
                    <a href="/post/{{ $item->slug }}" class="btn btn-primary mt-auto align-self-start">Read more</a>
                </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @else
    <div class="col-md-12">
        <div class="error-template">
            <h1>Oops!</h1>
            <h2>No post found</h2>
            <div class="error-actions mt-4">
                <a href="/post" class="btn btn-primary btn-lg">Back to Posts </a>
                <a href="/" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-envelope"></span> Create article </a>
            </div>
        </div>
    </div>
    @endif
    <div class="d-flex justify-content-end">
        {{ $post->links() }}
    </div>
    <div class="mb-3"></div>
@endsection