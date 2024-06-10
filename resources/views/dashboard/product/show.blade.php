@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 style="font-weight: 900;color: #333;" class="h2"><i class='bx bxl-product-hunt'></i> Product Details</h1>
    </div>
    <div class="card col-lg-8 ">
        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top img-fluid"
            style="object-fit: cover; object-position: top; height: 400px; width: 100%;" alt="Product Image">
        <div class="card-body" style="text-transform: capitalize">
            <h5 class="card-title"
                style="font-weight: 900; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                <i class='bx bx-package'></i> {{ $product->name }}
            </h5>
            <div class="border-bottom mb-2"></div>
            <p><i class='bx bx-category'></i> {{ $product->category->name }}</p>
            <p><i class='bx bx-dollar-circle'></i> {{ 'Rp ' . number_format($product->price, 0, ',', '.') }}</p>
            <p><i class='bx bx-info-circle'></i> Weight: {{ $product->weight }}g</p>
            <p><i class='bx bx-info-circle'></i> Description: {{ $product->description }}</p>
            <p><i class='bx bx-box'></i> Stock: {{ $product->stock }}</p>
        </div>

        <div class="card-footer d-flex gap-2 mb-3">
            <a href="/dashboard/category" class="btn btn-success"><i class='bx bx-arrow-back'></i></i>
                Back</a>
            <a href="/dashboard/product/{{ $product->id }}/edit" class="btn btn-primary"><i class='bx bxs-edit-alt'></i>
                Edit</a>
            <form action="/dashboard/product/{{ $product->id }}" method="post" class="d-inline">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Are you sure you want to delete this product?')">
                    <i class='bx bx-trash-alt'></i> Delete
                </button>
            </form>
            <form action="/dashboard/product/{{ $product->id }}/copy" method="post" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-secondary border-0"
                    onclick="return confirm('Are you sure you want to copy this product?')">
                    <i class='bx bx-copy'></i> Copy
                </button>
            </form>
        </div>
    </div>
@endsection
