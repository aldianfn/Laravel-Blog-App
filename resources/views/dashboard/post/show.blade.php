@extends('dashboard.template.main')

@section('content')
<div class="container my-4">
    <div class="row">
        <div class="col-lg">
            <h1 class="mb-2">{{ $post->title }}</h1>
            <p class="mb-2">Category: {{ $post->category->name }}</a></p>
            <a href="/dashboard/post" type="button" class="btn btn-success mt-3"><span data-feather="arrow-left" class="mb-1"></span> Back to all my post</a>
            <a href="/dashboard/post/{{ $post->slug }}/edit" type="button" class="btn btn-warning mt-3"><span data-feather="edit" class="mb-1"></span> Edit</a>
            <form action="/dashboard/post/{{ $post->slug }}" method="post" class="d-inline">
                @csrf
                @method('delete')
                <button class="btn btn-danger mt-3 border-0" onclick="return confirm('Are you sure to delete this post?')"><span data-feather="x-circle"></span> Delete</button>
            </form>
            <div class="text-center">
                @if ($post->image)
                    <div style="max-height:500px; overflow:hidden">
                        <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid mt-4 text-center" alt="{{ $post->category->name }}">   
                    </div>
                @else
                    <img src="https://source.unsplash.com/1000x500?{{ $post->category->name }}" class="img-fluid mt-4 text-center" alt="{{ $post->category->name }}">   
                @endif
            </div>
            <article class="my-4" style="font-size: 16px">{!! $post->body !!}</article>
        </div>
    </div>
</div>
@endsection