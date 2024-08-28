@extends('layout.main')

@section('content')
<div class="pagetitle">
            <h1>{{ $title }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Pages</li>
                    <li class="breadcrumb-item active">Blank</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="col d-flex gap-4">
                        <div>
                            <h5 class="card-title">{{ $title }}</h5>
                        </div>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Judul Buku</th>
                                <th scope="col">Penulis</th>
                                <th scope="col">Penerbit</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Tahun Terbit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_buku as $buku)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $buku->judul_buku }}</td>
                                    <td>{{ $buku->name }}</td>
                                    <td>{{ $buku->nama }}</td>
                                    <td>{{ $buku->kategori }}</td>
                                    <td>{{ $buku->thn_terbit }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
