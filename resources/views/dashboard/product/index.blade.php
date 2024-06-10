@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 style="font-weight: 900;color: #333;" class="h2"><i class='bx bxl-product-hunt'></i> Product</h1>
    </div>




    <div class="table-responsive col-lg-12" style="z-index: 1000">
        <div class="d-flex gap-3 align-items-center mb-3">
            <a href="/dashboard/product/create" class="btn btn-primary d-flex align-items-center gap-1"
                style="font-weight: 500;"><i class='bx bx-plus-circle'></i><span> Create product</span></a>


            <form action="/dashboard/product">
                <div class="input-group" style="max-width: 300px;">
                    <input name="search" value="{{ request('search') }}" type="text" class="form-control"
                        placeholder="Search product...">
                    <button class="btn btn-outline-secondary" type="button"><i class='bx bx-search'></i></button>
                </div>
            </form>

            <div class="dropdown">
                <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class='bx bx-sort'></i> Sorting
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="#">Nama A-Z</a></li>
                    <li><a class="dropdown-item" href="#">Nama Z-A</a></li>
                    <li><a class="dropdown-item" href="#">Terbaru</a></li>
                    <li><a class="dropdown-item" href="#">Terlama</a></li>
                </ul>
            </div>
            <a href="/dashboard/pdfproduct" class="btn btn-secondary"><i class='bx bx-printer'></i> Print</a>
        </div>



        @if (session()->has('success'))
            <div style="width: fit-content" class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <div>
                    {{ session('success') }}
                </div>
            </div>
        @endif
        <div class="row mt-4 row-cols-1 row-cols-md-7 g-3">
            @foreach ($products as $product)
                <div class="col-lg-3">
                    <div class="card">
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top img-fluid"
                            style="object-fit: cover; object-position: top; height: 250px; width: 100%;"
                            alt="Product Image">

                        <div class="card-body" style="text-transform: capitalize">
                            <h5 class="card-title"
                                style="font-weight: 900; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                <i class='bx bx-package'></i> {{ $product->name }}
                            </h5>

                            <div class="border-bottom mb-2"></div>
                            <p><i class='bx bx-category'></i> {{ $product->category->name }}</p>
                            <p><i class='bx bx-dollar-circle'></i> {{ 'Rp ' . number_format($product->price, 0, ',', '.') }}
                            </p>

                        </div>

                        <div class="card-footer">
                            <a href="/dashboard/product/{{ $product->id }}/edit" class="badge bg-primary"><i
                                    class='bx bxs-edit-alt'></i></a>
                            <form action="/dashboard/product/{{ $product->id }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="badge bg-danger border-0"
                                    onclick="return confirm('Are you sure you want to delete this product?')">
                                    <i class='bx bx-trash-alt'></i>
                                </button>
                            </form>
                            <form action="/dashboard/product/{{ $product->id }}/copy" method="post" class="d-inline">
                                @csrf
                                <button type="submit" class="badge bg-secondary border-0"
                                    onclick="return confirm('Are you sure you want to copy this product?')">
                                    <i class='bx bx-copy'></i>
                                </button>
                            </form>
                            <a class="badge bg-success my-1" href="/dashboard/product/{{ $product->id }}"><i
                                    class='bx bx-zoom-in'></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
