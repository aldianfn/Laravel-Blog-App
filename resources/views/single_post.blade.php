@extends('template.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="mb-2">{{ $post->title }}</h1>
                <h5>By <a class="text-dark link-secondary" href="/post?author={{ $post->author->username }}">{{ $post->author->name }}</a> {{ $post->created_at->diffForHumans() }}</h5>
                <p class="mb-4">Category: <a class="text-dark link-secondary" href="/post?category={{ $post->category->slug }}">{{ $post->category->name }}</a></p>
                @if ($post->image)
                    <div style="max-height:400px; overflow:hidden">
                        <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid text-center" alt="{{ $post->category->name }}">   
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="img-fluid text-center" alt="{{ $post->category->name }}">   
                @endif
                <article class="my-4">{!! $post->body !!}</article>
                <a href="/post" type="button" class="btn btn-primary link-light"><i class="fa-solid fa-angle-left"></i> Back</a>
            </div>
        </div>
    </div>
@endsection