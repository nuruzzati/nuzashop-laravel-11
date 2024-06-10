@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 style="font-weight: 900;color: #333;" class="h2"><i class='bx bxs-category-alt'></i> Category Details</h1>
    </div>

    <div class="card col-lg-8">
        <img src="{{ asset('storage/' . $category->image) }}" class="card-img-top img-fluid"
            style="object-fit: cover; object-position: top; height: 400px; width: 100%;" alt="Category Image">
        <div class="card-body" style="text-transform: capitalize">
            <h5 class="card-title"
                style="font-weight: 900; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                <i class='bx bxs-category-alt'></i> {{ $category->name }}
            </h5>
        </div>

        <div class="card-footer d-flex gap-2 mb-3">
            <a href="/dashboard/category" class="btn btn-success"><i class='bx bx-arrow-back'></i></i>
                Back</a>
            <a href="/dashboard/category/{{ $category->id }}/edit" class="btn btn-primary"><i class='bx bxs-edit-alt'></i>
                Edit</a>
            <form action="/dashboard/category/{{ $category->id }}" method="post" class="d-inline">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Are you sure you want to delete this category?')">
                    <i class='bx bx-trash-alt'></i> Delete
                </button>
            </form>
            <form action="/dashboard/category/{{ $category->id }}/copy" method="post" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-secondary "
                    onclick="return confirm('Are you sure you want to copy this category?')">
                    <i class='bx bx-copy'></i> Copy
                </button>
            </form>
        </div>
    </div>
@endsection
