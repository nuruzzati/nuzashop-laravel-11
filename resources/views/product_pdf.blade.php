<!DOCTYPE html>
<html>

<head>
    <title>Laporan PDF Produk</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table {
            table-layout: fixed;
            width: 100%;
        }

        table tr td,
        table tr th {
            font-size: 9pt;
            word-wrap: break-word;
        }

        table th.description,
        table td.description {
            width: 30%;
            /* Adjust the width percentage as needed */
        }
    </style>
    <center>
        <h4>Laporan PDF Produk</h4>
        <table class='table table-bordered'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Weight</th>
                    <th>Image</th>
                    <th class="description">Description</th>
                    <th>Stock</th>
                </tr>
            </thead>
            <tbody>
                @php $i=1 @endphp
                @foreach ($product as $p)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $p->category->name }}</td>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->price }}</td>
                        <td>{{ $p->weight }}</td>
                        <td><img src="{{ asset('storage/' . $p->image) }}" alt="{{ $p->name }}" width="50">
                        </td>
                        <td class="description">{{ $p->description }}</td>
                        <td>{{ $p->stock }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </center>
</body>

</html>
