@extends('dashboard.template.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Post</h1>
</div>
<div class="col-lg-8">
    <form action="/dashboard/post/{{ $post->slug }}" method="post" class="mb-5" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">  {{-- Input title --}}
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Insert title" required autofocus value="{{ old('title', $post->title) }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>  {{-- End of input title --}}
        <div class="mb-3">  {{-- Input slug --}}
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" placeholder="Insert slug" required value="{{ old('slug', $post->slug) }}">
            @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>  {{-- End of input slug --}}
        <div class="mb-3">  {{-- Input category --}}
            <label for="category" class="form-label">Category</label>
            <select class="form-select" name="category_id" required>
                <option selected="true" value="" disabled>-- Choose category --</option>
                @foreach ($categories as $category)
                @if (old('category_id', $post->category_id) == $category->id)
                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
                @endforeach
            </select>
        </div>  {{-- End of input category --}}
        <div class="mb-3"> {{-- Input image --}}
            <label class="form-label">Image</label>
            <input type="hidden" name="oldImg" id="oldImg" value="{{ $post->image }}">
            @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="" class="img-preview img-fluid mb-3 col-sm-5 d-block">    
            @else
                <img src="" alt="" class="img-preview img-fluid mb-3 col-sm-5">    
            @endif        
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div> {{-- End of input image --}}
        <div class="mb-3">  {{-- Input Body --}}
            <label for="body" class="form-label">Body</label>
            <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
            <trix-editor input="body"></trix-editor>
            @error('body')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>  {{-- End of input body --}}
        <button type="submit" class="btn btn-primary mt-3">Update post</button>
        <a class="btn btn-danger mt-3" href="/dashboard/post">Cancel</a>
    </form>
</div>
@endsection