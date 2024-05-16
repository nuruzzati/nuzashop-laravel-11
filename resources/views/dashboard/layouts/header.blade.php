<style>
    /* Menampilkan menu sebagai hamburger menu hanya di layar mobile */
    @media screen and (max-width: 767px) {

        /* Menampilkan tombol hamburger */
        #headers {
            display: none
        }
    }
</style>


<header id="headers" class="p-3 mb-3 border-bottom bg-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-center"
            style="gap: 150px">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap" />
                </svg>
            </a>

            <ul class="nav col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <p class="text-white">.</p>
            </ul>



            <div class="dropdown text-end">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <p class="d-inline" style="font-weight: 700"> Haloo, Nuza Nadenta
                    </p>
                    <img src="https://github.com/mdo.png" width="32" height="32" class="rounded-circle mx-1"
                        style="border: 1px solid #444">
                </a>

                <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="/"><i class="bx bx-book"></i> User page</a></li>
                    <li><a class="dropdown-item" href="/dashboard/profil"><i class="bx bx-user"></i> My Profil</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="bx bx-log-out"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</header>




















{{-- KHUSUS TAMPILAN MOBILE --}}
<header class=" mb-3">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">


            <style>
                .hilang {
                    display: none;
                }


                @media screen and (max-width: 768px) {

                    .hilang {
                        display: block;
                    }

                    .search-awal {
                        display: none;
                    }

                }
            </style>



            <nav class="hilang navbar navbar-expand-lg bg-body-tertiary col-12">
                <div class="container-fluid" style="gap: 100xp">
                    <a class="text-decoration-none fs-4 text-dark" href="#">
                        <span style="font-weight: 900"> <i class='bx bxs-store-alt'></i> Nuzashop</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page"
                                    href="/dashboard"> <i class='bx bxs-store-alt'></i> Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('dashboard/category*') ? 'active' : '' }}"
                                    href="/dashboard/category"> <i class='bx bxs-category-alt'></i> Category</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('dashboard/product*') ? 'active' : '' }}"
                                    href="/dashboard/product"> <i class='bx bxl-product-hunt'></i> Product</a>
                            </li>
                        </ul>

                        <div class="dropdown text-end">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <img class="rounded-circle" src="https://github.com/mdo.png" alt="mdo"
                                            width="32"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="/"><i class="bx bx-user"></i> User
                                                Page</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="/profil"><i class="bx bx-user-circle"></i> My
                                                Profile</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                            <form action="/logout" method="post">
                                                @csrf
                                                <button type="submit" class="dropdown-item">
                                                    <i class="bx bx-log-out"></i> Logout
                                                </button>
                                            </form>
                                        </li>
                                    </ul>

                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </nav>






        </div>
    </div>
</header>
