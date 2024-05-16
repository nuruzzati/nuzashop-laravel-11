@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 style="font-weight: 900; color: #333;" class="h2"><i class='bx bxs-category-alt'></i> Dashboard</h1>
    </div>
    <div class="row">
        <!-- Total Penjualan -->
        <div class="col-md-3 mb-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title"><i class='bx bx-dollar'></i> Total Penjualan</h5>
                    <p class="card-text">Rp 500.000.000</p>
                </div>
            </div>
        </div>

        <!-- Total Pendapatan -->
        <div class="col-md-3 mb-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title"><i class='bx bx-line-chart'></i> Total Pendapatan</h5>
                    <p class="card-text">Rp 350.000.000</p>
                </div>
            </div>
        </div>

        <!-- Total Pengunjung -->
        <div class="col-md-3 mb-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title"><i class='bx bx-user'></i> Total Pengunjung</h5>
                    <p class="card-text">10.000</p>
                </div>
            </div>
        </div>

        <!-- Rata-rata Transaksi -->
        <div class="col-md-3 mb-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title"><i class='bx bx-bar-chart'></i> Rata-rata Transaksi</h5>
                    <p class="card-text">Rp 500.000</p>
                </div>
            </div>
        </div>

        <!-- Produk Terlaris -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <i class='bx bx-bar-chart-alt-2'></i> Produk Terlaris
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Produk 1 - 500 terjual</li>
                        <li class="list-group-item">Produk 2 - 400 terjual</li>
                        <li class="list-group-item">Produk 3 - 300 terjual</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Kategori Terpopuler -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <i class='bx bx-bar-chart-alt'></i> Kategori Terpopuler
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Kategori A - 2000 dilihat</li>
                        <li class="list-group-item">Kategori B - 1500 dilihat</li>
                        <li class="list-group-item">Kategori C - 1000 dilihat</li>
                    </ul>
                </div>
            </div>
        </div>







    </div>
@endsection
