@extends('dashboard.template.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create a New Category</h1>
</div>
<div class="col-lg-8">
    <form action="/dashboard/categories" method="post" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3"> {{-- Input Category Name --}}
            <label for="name" class="form-label">Category Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Insert category name" required autofocus value="{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div> {{-- End of input title --}}
        <div class="mb-3"> {{-- Input slug --}}
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" placeholder="Insert slug" required value="{{ old('slug') }}">
            @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div> {{-- End of input slug --}}
        <div class="mb-3"> {{-- Input image --}}
            <label class="form-label">Image</label>
            <img src="" alt="" class="img-preview img-fluid mb-3 col-sm-5">
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div> {{-- End of input image --}}
        <button type="submit" class="btn btn-primary mt-4">Create category</button>
        <a class="btn btn-danger mt-4" href="/dashboard/categories">Cancel</a>
    </form>
</div>
@endsection