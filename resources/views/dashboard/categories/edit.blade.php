@extends('dashboard.template.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Category</h1>
</div>
<div class="col-lg-8">
    <form action="/dashboard/categories/{{ $category->slug }}" method="post" class="mb-5" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">  {{-- Input category name --}}
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Insert name" required autofocus value="{{ old('name', $category->name) }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>  {{-- End of input category name --}}
        <div class="mb-3">  {{-- Input slug --}}
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" placeholder="Insert slug" required value="{{ old('slug', $category->slug) }}">
            @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>  {{-- End of input slug --}}
        <div class="mb-3"> {{-- Input image --}}
            <label class="form-label">Image</label>
            <input type="hidden" name="oldImg" id="oldImg" value="{{ $category->image }}">
            @if ($category->image)
                <img src="{{ asset('storage/' . $category->image) }}" alt="" class="img-preview img-fluid mb-3 col-sm-5 d-block">    
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
        <button type="submit" class="btn btn-primary mt-3">Update category</button>
        <a class="btn btn-danger mt-3" href="/dashboard/categories">Cancel</a>
    </form>
</div>
@endsection