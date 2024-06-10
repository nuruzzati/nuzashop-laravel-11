@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 style="font-weight: 900;color: #333;" class="h2"><i class='bx bxs-category-alt'></i> Category</h1>
    </div>

    <div class="table-responsive col-lg-12">
        <div class="d-flex gap-3 align-items-center mb-3">
            <a href="/dashboard/category/create" class="btn btn-primary d-flex align-items-center gap-1"
                style="font-weight: 500;"><i class='bx bx-plus-circle'></i><span> Create category</span></a>

            <form action="/dashboard/category">
                <div class="input-group" style="max-width: 300px;">
                    <input value="{{ request('search') }}" type="text" class="form-control" name="search"
                        placeholder="Search Category...">
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
            <a href="/dashboard/pdfcategory" class="btn btn-secondary"><i class='bx bx-printer'></i>
                Print</a>
            {{-- <button class="btn btn-danger" id="bulk-delete" onclick="confirmDeleteSelected()"> <i
                    class='bx bx-trash-alt'></i> Delete Selected</button> --}}
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

        <form id="bulk-delete-form" action="/dashboard/category/bulk-delete" method="post">
            @csrf
            @method('delete')
            <table class="table table-striped table-sm col-8">
                <thead>
                    <tr>
                        {{-- <th scope="col"><input type="checkbox" id="select-all"></th> --}}
                        <th scope="col">No</th>
                        <th scope="col">Category name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $counter = 1;
                    @endphp
                    @foreach ($categories as $category)
                        <tr>
                            {{-- <td><input type="checkbox" name="selected[]" value="{{ $category->id }}"></td> --}}
                            <td>{{ $counter++ }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a class="badge bg-warning my-1" href="/dashboard/category/{{ $category->id }}/edit"><i
                                        class='bx bxs-edit-alt'></i></a>
                                <form action="/dashboard/category/{{ $category->id }}" method="post" class="d-inline"
                                    id="deleteForm-{{ $category->id }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="badge bg-danger border-0"
                                        onclick="return confirm('Are you sure you want to delete this category?')">
                                        <i class='bx bx-trash-alt'></i>
                                    </button>
                                </form>
                                <form action="/dashboard/category/{{ $category->id }}/copy" method="post" class="d-inline">
                                    @csrf
                                    <button type="submit" class="badge bg-secondary border-0"
                                        onclick="return confirm('Are you sure you want to copy this category?')">
                                        <i class='bx bx-copy'></i>
                                    </button>
                                </form>
                                <a class="badge bg-success my-1" href="/dashboard/category/{{ $category->id }}">
                                    <i class='bx bx-zoom-in'></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
    </div>

    {{-- <script>
        var tes = document.getElementById('select-all')

        tes.onclick = function() {
            var checkboxes = document.getElementsByName('selected[]');
            for (var checkbox of checkboxes) {
                checkbox.checked = this.checked;
            }
        }

        function confirmDeleteSelected() {
            var form = document.getElementById('bulk-delete-form');
            var selected = document.querySelectorAll('input[name="selected[]"]:checked');
            if (selected.length > 0) {
                var confirmDelete = confirm('Are you sure you want to delete ' + selected.length + ' item(s)?');
                if (confirmDelete) {
                    form.submit();
                }
            } else {
                alert('Please select at least one category to delete.');
            }
        }
    </script> --}}
@endsection
