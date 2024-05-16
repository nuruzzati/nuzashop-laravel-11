@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 style="font-weight: 900;color: #333;" class="h2"><i class='bx bxs-category-alt'></i> Category</h1>
    </div>




    <div class="table-responsive col-lg-12">
        <div class="d-flex gap-3 align-items-center mb-3">
            <a href="/dashboard/category/create" class="btn btn-primary d-flex align-items-center gap-1"
                style="font-weight: 500;"><i class='bx bx-plus-circle'></i><span> Create category</span></a>
            <div class="input-group" style="max-width: 300px;">
                <input type="text" class="form-control" placeholder="Search Category...">
                <button class="btn btn-outline-secondary" type="button"><i class='bx bx-search'></i></button>
            </div>
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
            <a href="/dashboard/category/cetak_pdf" class="btn btn-secondary"><i class='bx bx-printer'></i> Print</a>
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
        <table class="table table-striped table-sm col-8">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Category name</th>
                    {{-- <th scope="col">Category image</th> --}}
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $counter = 1;
                @endphp
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $counter++ }}</td>
                        <td>{{ $category->name }}</td>
                        {{-- <td><img src="{{ asset('storage/' . $category->image) }}" alt=""> </td> --}}
                        <td>
                            <a class="badge bg-warning my-1" href="/dashboard/category/{{ $category->id }}/edit"><i
                                    class='bx bxs-edit-alt'></i></a>
                            <form action="/dashboard/category/{{ $category->id }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="badge bg-danger border-0"
                                    onclick="return confirm('Are you sure you want to delete this category?')">
                                    <i class='bx bx-trash-alt'></i>
                                </button>
                            </form>
                            <a class="badge bg-success my-1" href=""><i class='bx bx-zoom-in'></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
