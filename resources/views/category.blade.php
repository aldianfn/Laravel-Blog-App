@extends('template.main')

@section('content')
    <div class="text-center mb-5">
        <h3><a href="/categories" class="text-dark">Category:</a> {{ $category }}</h3>
    </div>
   @forelse ($posts as $post)
    <div class="card row-hover pos-relative py-3 px-3 mb-3 border-warning border-top-0 border-right-0 border-bottom-0 rounded-0">
        <div class="row align-items-center">
        <div class="col-md-8 mb-3 mb-sm-0">
            <h5>
            <a href="/post/{{ $post->slug }}" class="text-primary text-decoration-none">{{ $post->title }}</a>
            </h5>
            <p class="text-sm"><span >Posted by</span> <a class="text-black" href="/author/{{ $post->author->username }}">{{ $post->author->name }}</a><span> on xx xx xxxx</span></p>
            <div class="text-sm op-5"> {{ $post->excerpt }} </div>
        </div>
        <div class="col-md-4 op-7">
            <div class="row text-center op-7">
            <div class="col px-1"> <i class="ion-connection-bars icon-1x"></i> <span class="d-block text-sm">141 Votes</span> </div>
            <div class="col px-1"> <i class="ion-ios-chatboxes-outline icon-1x"></i> <span class="d-block text-sm">122 Replys</span> </div>
            <div class="col px-1"> <i class="ion-ios-eye-outline icon-1x"></i> <span class="d-block text-sm">290 Views</span> </div>
            </div>
        </div>
        </div>
    </div>
    @if ($loop->last)
        <a href="/categories" type="button" class="btn btn-primary mt-4 mb-2 d-block"><i class="fa-solid fa-angle-left"></i> Back to all categories</a>
        <a href="/post" type="button" class="btn btn-primary mt-4 mb-2 d-block"><i class="fa-solid fa-angle-left"></i> Back to all posts</a>
    @endif  
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
   @endforelse

    {{-- <a href="/categories" type="button" class="btn btn-primary mt-4 mb-2"><i class="fa-solid fa-angle-left"></i> Back to all categories</a>
    <a href="/post" type="button" class="btn btn-primary mt-4 mb-2"><i class="fa-solid fa-angle-left"></i> Back to all posts</a> --}}
@endsection