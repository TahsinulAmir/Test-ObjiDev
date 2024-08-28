@extends('layout.main')

@section('content')
    <div class="pagetitle">
        <h1>{{ $title }}</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    @if (Auth::guard('user')->user()->role === 'admin')
                        <!-- Sales Card -->
                        <div class="col-xxl-4 col-md-3">
                            <a href="{{ url('buku') }}" class="text-decoration-none">
                                <div class="card info-card sales-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Buku <span>| Books</span></h5>

                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-book"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>{{ $jml_buku }} Buku</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div><!-- End Sales Card -->

                        <!-- Revenue Card -->
                        <div class="col-xxl-4 col-md-3">
                            <a href="{{ url('penulis') }}" class="text-decoration-none">
                                <div class="card info-card revenue-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Penulis <span>| Authors</span></h5>
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-person"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>{{ $jml_penulis }} Penulis</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div><!-- End Revenue Card -->

                        <!-- Revenue Card -->
                        <div class="col-xxl-4 col-md-3">
                            <a href="{{ url('penerbit') }}" class="text-decoration-none">
                                <div class="card info-card sales-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Penerbit<span>| Publishers</span></h5>

                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-upload"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>{{ $jml_penerbit }} Penerbit</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div><!-- End Revenue Card -->

                        <!-- Revenue Card -->
                        <div class="col-xxl-4 col-md-3">
                            <a href="{{ url('kategori') }}" class="text-decoration-none">
                                <div class="card info-card revenue-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Kategori <span>| Categories</span></h5>
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-x-diamond"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>{{ $jml_kategori }} Kategori</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div><!-- End Revenue Card -->
                    @elseif(Auth::guard('user')->user()->role === 'penulis')
                        <!-- Revenue Card -->
                        <div class="col-xxl-4 col-md-3">
                            <a href="{{ url('my-buku') }}" class="text-decoration-none">
                                <div class="card info-card sales-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Buku<span>| My Books</span></h5>

                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-upload"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>{{ $jml_bukuku }} Buku</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div><!-- End Revenue Card -->
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
