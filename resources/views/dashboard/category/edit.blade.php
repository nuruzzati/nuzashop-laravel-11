@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 style="font-weight: 900;color: #333;" class="h2"><i class='bx bxs-category-alt'></i> Edit category</h1>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body bg-light">
                    <form action="/dashboard/category/{{ $category->id }}" method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label"><i class='bx bx-category'></i> Category Name</label>
                            <input value="{{ old('name', $category->name) }}" type="text"
                                class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                                placeholder="Enter category name">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label"><i class='bx bxs-image-add'></i> Category Image</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                                name="image">
                            @if ($category->image)
                                <div class="mt-2">
                                    <strong>Current Image:</strong> {{ $category->image }}
                                </div>
                            @endif
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <a href="/dashboard/category" class="btn btn-success"><i class='bx bx-arrow-back'></i> Back</a>
                            <button type="submit" class="btn btn-primary"><i class='bx bx-save'></i> Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
