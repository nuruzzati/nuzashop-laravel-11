<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="css/style.css">

    <!-- icons -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <!-- font googgle -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        .dropdown-divider {
            border-top: 1px solid rgba(0, 0, 0, 0.1);
        }

        .dropdown-item {
            font-size: 14px;
            background: none;
            border: none;
            padding: 12px;
            margin: 0;
            display: flex;
            align-items: center;
            width: 100%;
            text-align: left;
            color: inherit;
            cursor: pointer;
        }

        .dropdown-item:hover {
            background-color: rgba(233, 226, 226, 0.686);
        }
    </style>


</head>

<body>
    <!-- header -->
    <header>
        <a href="#" class="logo"><i class='bx bxs-t-shirt'></i>Nuza<span>shop</span></a>
        <ul class="navlist">
            <li><a href="#home">Home</a></li>
            <li><a href="#featured">Categories</a></li>
            <li><a href="#new">New</a></li>
            <li><a href="#all">Product</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>

        <div class="header-icons">
            <div class="bx bx-menu" id="menu-icon"></div>
            <a style="position: absolute;right: 0; margin-right: 120px;" href="/cart"><i
                    class='bx bx-shopping-bag'></i></a>
        </div>

        <div class="dropdown">
            <div class="user-icon align-item justify-content-center">
                <!-- Gambar avatar pengguna (misalnya) -->
                <img src="img/user.webp" width="60" alt="">
            </div>
            <div class="dropdown-content text-small">
                @guest <!-- Tampilkan saat pengguna belum login -->
                    <a class="dropdown-item" href="/login"><i class="bx bx-log-in"></i> Login</a>
                    <hr class="dropdown-divider"> <!-- Garis pemisah -->
                    <a class="dropdown-item" href="/register"><i class="bx bx-user-plus"></i> Register</a>
                @else
                    @can('admin')
                        <a class="dropdown-item" href="/dashboard"><i class="bx bx-grid-alt"></i> Dashboard</a>
                    @endcan
                    <hr class="dropdown-divider"> <!-- Garis pemisah -->

                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item border-0">
                            <i style="margin-right: 5px" class="bx bx-log-out"></i> Logout
                        </button>
                    </form>
                @endguest
            </div>



        </div>


    </header>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- home -->
    <section class="home" id="home">
        <div class="home-text">
            <h1>Men's New <br><span>Arrivals</span></h1>
            <p>New colors, now also avaible in men's sizing</p>
            <a href="#" class="btn"><i class='bx bxs-t-shirt'></i> View Collection</a>

        </div>
    </section>

    <!-- featured -->
    <section class="featured" id="f-categories">
        <div class="center-text">
            <h2>Featured <span>Categories</span></h2>
        </div>

        <div class="featured-content">
            {{-- @php $count = 1 @endphp --}}

            {{-- @while ($count <= 6) --}}
            @foreach ($categories as $category)
                <div class="row" style="text-transform:capitalize;">
                    <a href="#"> <img src="{{ asset('storage/' . $category->image) }}" class="product-img"
                            alt=""></a>
                    <div class="fea-text">
                        <a style="color: #111;" href="">
                            <h5>{{ $category->name }}</h5>
                            <p>10 items</p>
                        </a>
                    </div>
                    <div class="arrow">
                        <a href=""><i class="bx bx-right-arrow-alt"></i></a>
                    </div>
                </div>
            @endforeach

            {{-- @php $count++ @endphp --}}
            {{-- @endwhile --}}
        </div>
    </section>




    <!-- cta -->
    <section class="cta">
        <div class="cta-text">
            <h6>
                SUMMER ON SALE
                <h4>20% OFF <br> NEW ARRIVAL</h4>
                <a href="#" class="btn">Shop Now</a>
            </h6>
        </div>
    </section>

    <!-- new -->
    <section class="new" id="new">
        <div class="new">
            <div class="center-text">
                <h2>New <span>Arrivals</span></h2>
            </div>

            <div class="new-content">
                @foreach ($latestProducts as $lp)
                    <div class="box">
                        <img width="90%" src="{{ asset('storage/' . $lp->image) }}" alt="">
                        <h5>{{ Illuminate\Support\Str::limit($lp->name, 20, '...') }}</h5>
                        <!-- Menampilkan maksimal 20 karakter -->
                        <h6>{{ 'Rp ' . number_format($lp->price, 0, ',', '.') }}</h6>
                        <div class="sale">
                            <h4>New</h4>
                        </div>
                    </div>
                @endforeach
            </div>


        </div>
    </section>

    <!-- all product -->
    <!-- all product -->
    <section class="new" id="f-products">
        <div class="new">
            <div class="center-text">
                <h2>Featured <span>Product</span></h2>
            </div>

            <div class="new-content">

                @foreach ($product as $p)
                    <div class="box">
                        <a href="/product/detail/{{ $p->id }}"> <img height="200px" width="100%"
                                src="{{ asset('storage/' . $p->image) }}"></a>
                        <h5>{{ Illuminate\Support\Str::limit($p->name, 20, '...') }}</h5>
                        <h6>{{ 'Rp ' . number_format($p->price, 0, ',', '.') }}</h6>

                        <div class="sale">
                            <h4>Sale</h4>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
        <div class="button" style="display: flex;justify-content: center;margin-top:20px">
            <a href="all_produk.php" style="justify-content: center;margin-top: 10px;align-items: center;"
                class="btn">View All Product</a>
        </div>
    </section>



    <!-- brand -->
    <section class="brand">
        <div class="brand-content">
            <div class="main">
                <img src="brand.webp" alt="">
            </div>
            <div class="main">
                <img src="brand.webp" alt="">
            </div>
            <div class="main">
                <img src="brand.webp" alt="">
            </div>
            <div class="main">
                <img src="brand.webp" alt="">
            </div>
            <div class="main">
                <img src="brand.webp" alt="">
            </div>
            <div class="main">
                <img src="brand.webp" alt="">
            </div>
        </div>

    </section>

    <!-- contact -->
    <section class="contact" id="contact">
        <div class="main-contact">
            <h3>Nuza</h3>
            <h5>Let's Connect With Us</h5>
            <div class="icons">
                <a href="#"><i class='bx bxl-instagram-alt'></i></a>
                <a href="#"><i class='bx bxl-whatsapp-square'></i></a>
                <a href="#"><i class='bx bxl-facebook-square'></i></a>
            </div>
        </div>
        <div class="main-contact">
            <h3>Explore</h3>
            <li><a href="#home">Home</a></li>
            <li><a href="#featured">Featured</a></li>
            <li><a href="#new">New</a></li>
            <li><a href="#contact">Contact</a></li>
        </div>

        <div class="main-contact">
            <h3>Our Services</h3>
            <li><a href="#">Pricing</a></li>
            <li><a href="#">Free Shipping</a></li>
            <li><a href="#">Gift Cards</a></li>
        </div>
        <div class="main-contact">
            <h3>Shopping</h3>
            <li><a href="#">Clothing Store</a></li>
            <li><a href="#">Trending Shoes</a></li>
            <li><a href="#">Accesories</a></li>
            <li><a href="#">Sale</a></li>
        </div>
    </section>

    <div class="last-text">
        <p>Copyright @ 2022 All rights reserved | This template is made with by Nuza Nadenta</p>
    </div>

    <!-- scroll-top -->
    <a href="#" id="home" class="top"><i class='bx bx-up-arrow-alt'></i></a>



    <script src="https://unpkg.com/scrollreveal"></script>
    <!-- javascript -->
    <script>
        const header = document.querySelector('header');

        window.addEventListener('scroll', function() {
            header.classList.toggle('sticky', window.scrollY > 0);
        });

        let menu = document.querySelector('#menu-icon');
        let navlist = document.querySelector('.navlist');

        menu.onclick = () => {
            menu.classList.toggle('bx-x');
            navlist.classList.toggle('open');
        }

        window.onscroll = () => {
            menu.classList.remove('bx-x');
            navlist.classList.remove('open');
        };

        const sr = ScrollReveal({
            distance: '30px',
            duration: 2600,
            reset: true
        })

        sr.reveal('.home-text', {
            delay: 200,
            origin: 'right'
        })
        // sr.reveal('.featured,.cta,.new,.brand,.contact',{delay:200, origin:'bottom'})
    </script>
</body>

</html>
