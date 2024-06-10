<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Product</title>

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Vendor Script -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,800&display=swap');

        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            background: #000;
        }



        .container {
            position: relative;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            width: 900px;
            height: 600px;
            background: #fff;
            margin: 20px;
        }

        .container .imgBx {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 50%;
            height: 100%;
            background: #212121;
            transition: .3s linear;
        }


        .container .imgBx img {
            position: relative;
            width: 500px;
            /* transform: rotate(10deg); */
            left: -40px;
            transition: .9s linear;
        }

        .container .details {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 50%;
            height: 100%;
            box-sizing: border-box;
            padding: 40px;
        }

        .container .details h2 {
            margin: 0;
            padding: 0;
            font-size: 2.4em;
            line-height: 1em;
            color: #444;
        }

        .container .details h2 span {
            font-size: 0.4em;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #999;
        }

        .container .details p {
            max-width: 85%;
            margin-left: 15%;
            color: #333;
            font-size: 15px;
            margin-bottom: 36px;
        }

        .container .details h3 {
            margin: 0;
            padding: 0;
            font-size: 2.5em;
            color: #a2a2a2;
            /* float: left; */
        }



        .product-buttons a:last-child {
            margin-bottom: 0;
        }

        .product-buttons a:hover {
            opacity: 0.8;
        }

        .add-to-cart {
            background-color: #007bff;
        }

        .buy-now {
            background-color: #28a745;
        }

        .button-icon {
            margin-right: 10px;
        }

        /* responsive */
        @media (max-width: 1080px) {
            .container {
                height: auto;
            }

            .container .imgBx {
                padding: 40px;
                box-sizing: border-box;
                width: 100% !important;
                height: auto;
                text-align: center;
                overflow: hidden;
            }

            .container .imgBx img {
                left: initial;
                max-width: 100%;
                transform: rotate(0deg);
            }

            .details {
                width: 100% !important;
                height: auto;
                padding: 20px;
            }

            .container .details p {
                margin-left: 0;
                max-width: 100%;
            }
        }

        footer {
            position: fixed;
            right: 16px;
            bottom: 12px;
        }

        footer a {
            color: #fff;
            text-decoration: none;
            font-size: 12px;
        }

        .btn {
            margin-right: 5px;
            padding: 10px 15px;
            background-color: #333;
            color: white;
            border-radius: 40px;
            text-decoration: none;
            font-weight: 600;
            font-size: 13px;
            transition: background-color 0.3s, color 0.3s;
        }

        .btn:hover {
            background-color: #555;
            color: #fff;
        }

        .btn i {
            margin-right: 5px;
        }
    </style>
</head>

<body>
    @if (session('success'))
        <script>
            alert('{{ session('success') }}');
        </script>
    @endif

    <div class="container">
        <div class="imgBx">
            <img src="{{ asset('storage/' . $product->image) }}" alt="Nike Jordan Proto-Lyte Image">
        </div>
        <div class="details">
            <div class="content">
                <h2 style="text-transform: capitalize">{{ $product->name }} <br>
                    <span style="text-transform: uppercase">{{ $product->category->name }} collection</span>
                </h2>
                <p>
                    {{ Illuminate\Support\Str::limit($product->description, 400, '...') }}
                </p>



                <h3 style="flex-wrap: wrap;margin-bottom: 30px;margin-top: -20px">
                    {{ 'Rp ' . number_format($product->price, 0, ',', '.') }}</h3>

                <a class="btn" href="/">
                    <i class="fas fa-home" style="margin-right: -2px;"></i>
                </a>


                <form action="{{ route('cart.add', $product->id) }}" class="border-0" method="POST"
                    style="display: inline">
                    @csrf
                    <button type="submit" class="btn add-to-cart">
                        <i class="fas fa-shopping-cart"></i>
                        Cart
                    </button>
                </form>

                <a class="btn" href="#">
                    <i class="fas fa-credit-card"></i>
                    Buy
                </a>
            </div>
        </div>
    </div>

</body>

</html>
