@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 style="font-weight: 900;color: #333;" class="h2"><i class='bx bxl-product-hunt'></i> Edit product</h1>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body bg-light">
                    <form action="/dashboard/product/{{ $product->id }}" method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="category_id" class="form-label"><i class='bx bx-category'></i> Category Name</label>
                            <select class="form-select" id="category_id" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if (old('category_id', $product->category_id) == $category->id) selected @endif>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label"><i class='bx bxs-package'></i> Product Name</label>
                            <input value="{{ old('name', $product->name) }}" type="text"
                                class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                                placeholder="Enter product name">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label"><i class='bx bxs-dollar-circle'></i> Price</label>
                            <input value="{{ old('price', $product->price) }}" type="number"
                                class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                                placeholder="Enter price">
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="weight" class="form-label"><i class='bx bxs-package'></i> Weight</label>
                            <input value="{{ old('weight', $product->weight) }}" type="number"
                                class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight"
                                placeholder="Enter weight">
                            @error('weight')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label"><i class='bx bxs-image-add'></i> Product Image</label>
                            <input required value="{{ old('image') }}" type="file" class="form-control" id="image"
                                name="image">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label"><i class='bx bx-info-circle'></i>
                                Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                rows="3" placeholder="Enter description">{{ old('description', $product->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="stock" class="form-label"><i class='bx bxs-package'></i> Stock</label>
                            <input value="{{ old('stock', $product->stock) }}" type="number"
                                class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock"
                                placeholder="Enter stock">
                            @error('stock')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <a href="/dashboard/product" class="btn btn-success"><i class='bx bx-arrow-back'></i> Back</a>
                            <button type="submit" class="btn btn-primary"><i class='bx bx-save'></i> Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
