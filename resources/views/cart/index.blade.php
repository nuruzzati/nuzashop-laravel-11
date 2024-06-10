<!-- cart.index.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* CSS */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }

        .product-card {
            display: flex;
            gap: 20px;
            background-color: #fff;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            overflow: hidden;
            margin-bottom: 20px;
            padding: 20px;
        }

        .product-image img {
            width: 100px;
            height: auto;
            border-radius: 5px;
        }

        .product-details {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .product-details h3 {
            margin: 0;
            font-size: 18px;
            color: #333;
        }

        .product-price {
            margin: 5px 0;
            font-size: 16px;
            color: #ff5722;
        }

        .product-quantity {
            margin: 5px 0;
            font-size: 14px;
            color: #666;
        }

        .product-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }

        .btn-delete,
        .btn-buy {
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-delete {
            background-color: #f44336;
        }

        .btn-buy {
            background-color: #4caf50;
        }

        .empty-cart {
            text-align: center;
            padding: 50px;
            background-color: #fff;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <h2>Cart</h2>

    @if ($cartItems->isEmpty())
        <div class="empty-cart">
            <p>Kamu belum memiliki produk yang ditambahkan ke keranjang.</p>
        </div>
    @else
        @foreach ($cartItems as $cartItem)
            <div class="product-card">
                <div class="product-image">
                    <img src="{{ asset('storage/' . $cartItem->product->image) }}" alt="{{ $cartItem->product->name }}">
                </div>
                <div class="product-details">
                    <h3>{{ $cartItem->product->name }}</h3>
                    <p class="product-price">${{ $cartItem->product->price }}</p>
                    <p class="product-quantity">Quantity: {{ $cartItem->quantity }}</p>
                    <div class="product-actions">
                        <button class="btn-delete" title="Delete"><i class="fas fa-trash-alt"></i></button>
                        <button class="btn-buy" title="Buy"><i class="fas fa-shopping-cart"></i></button>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</body>

</html>
