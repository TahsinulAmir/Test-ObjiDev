@extends('layout.main')

@section('content')
    <div class="pagetitle">
        <h1>{{ $title }}</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="col d-flex my-2">
                        <div>
                            <h5 class="card-title"></h5>
                        </div>
                        <div class="my-auto me-auto">
                            <button type="button " class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#tambahBuku">Tambah Buku</button>
                        </div>
                        <form action="/buku" method="GET" id="search">
                            <div class="d-flex ms-auto gap-1 align-items-center">
                                <input type="text" class="form-control" name="judul_buku" placeholder="Judul Buku"
                                    value="{{ isset($_GET['judul_buku']) ? $_GET['judul_buku'] : '' }}">
                                <select name="penulis_id" class="form-select">
                                    <option selected disabled>Penulis</option>
                                    @foreach ($all_penulis as $penulis)
                                        <option value="{{ $penulis->id }}"
                                            {{ isset($_GET['penulis_id']) && $_GET['penulis_id'] == $penulis->id ? 'selected' : '' }}>
                                            {{ $penulis->name }}</option>
                                    @endforeach
                                </select>
                                <select name="penerbit_id" class="form-select">
                                    <option selected disabled>Penerbit</option>
                                    @foreach ($all_penerbit as $penerbit)
                                        <option value="{{ $penerbit->id }}"
                                            {{ isset($_GET['penerbit_id']) && $_GET['penerbit_id'] == $penerbit->id ? 'selected' : '' }}>
                                            {{ $penerbit->nama }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-secondary">Cari</button>
                            </div>
                        </form>
                    </div>

                    <!-- Table with stripped rows -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Judul Buku</th>
                                <th scope="col">Penulis</th>
                                <th scope="col">Penerbit</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Tahun Terbit</th>
                                <th scope="col">Aksi</th>
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
                                    <td>
                                        <a href="{{ url('/buku/' . $buku->id) }}" class="btn btn-success"><i
                                                class="bi bi-pencil-square"></i></a>
                                        <button type="button" class="btn btn-warning modalDetailBuku"
                                            data-id="{{ $buku->id }}"><i class="bi bi-info-circle"></i></button>
                                        <button type="button" data-id="{{ $buku->id }}"
                                            class="btn btn-danger deleteBtn"><i class="bi bi-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>
        </div>
    </section>

    {{-- Modal Tambah Buku --}}
    <div class="modal fade" id="tambahBuku" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Buku Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="tambahBuku">
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Judul Buku</label>
                                <input type="text" class="form-control" placeholder="Judul" id="judul_buku">
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail5" class="form-label">Penulis</label>
                                <select id="penulis_id" class="form-select">
                                    <option selected disabled>--- Pilih Penulis ---</option>
                                    @foreach ($all_penulis as $penulis)
                                        <option value="{{ $penulis->id }}">{{ $penulis->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail5" class="form-label">Penerbit</label>
                                <select id="penerbit_id" class="form-select">
                                    <option selected disabled>--- Pilih Penerbit ---</option>
                                    @foreach ($all_penerbit as $penerbit)
                                        <option value="{{ $penerbit->id }}">{{ $penerbit->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail5" class="form-label">Kategori</label>
                                <select id="kategori_id" class="form-select">
                                    <option selected disabled>--- Pilih Kategori ---</option>
                                    @foreach ($all_kategori as $kategori)
                                        <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword5" class="form-label">Tahun Terbit</label>
                                <input type="number" class="form-control" placeholder="2020" id="thn_terbit">
                            </div>
                            <div class="col-12">
                                <label for="inputAddress5" class="form-label">Deskripsi</label>
                                <textarea class="form-control" placeholder="Detail Buku" id="deskripsi" style="height: 100px;"></textarea>
                            </div>
                            <div class="col-12 mb-4">
                                <label for="inputPassword5" class="form-label">Gambar Cover</label>
                                <input class="form-control" type="file" id="cover">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal Detail --}}
    <div id="modalDetailBuku"></div>

    @push('myscript')
        <script>
            $('#tambahBuku').on('submit', function(e) {
                e.preventDefault();
                const cover = $('#cover').prop('files')[0];

                let formData = new FormData();
                formData.append('judul_buku', $('#judul_buku').val());
                formData.append('penulis_id', $('#penulis_id').val());
                formData.append('penerbit_id', $('#penerbit_id').val());
                formData.append('kategori_id', $('#kategori_id').val());
                formData.append('thn_terbit', $('#thn_terbit').val());
                formData.append('deskripsi', $('#deskripsi').val());
                formData.append('cover', cover);

                $.ajax({
                    url: '{{ url('/tambah-buku') }}',
                    method: 'POST',
                    processData: false,
                    contentType: false,
                    data: formData,
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        Swal.fire({
                            title: "Berhasil!",
                            text: "Buku Berhasil Ditambahkan!",
                            icon: "success"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });
                    },
                    error: function(xhr) {
                        var errors = xhr.responseJSON.errors;
                        console.log(errors);

                        Swal.fire({
                            title: 'Error!',
                            text: 'Buku Gagal Ditambahkan!',
                            icon: 'error',
                            confirmButtonText: 'Oke'
                        });
                    }
                });
            });

            $('.modalDetailBuku').on('click', function(e) {
                var id = $(this).data('id');

                $.ajax({
                    url: '{{ url('modal-detail-buku') }}/' + id,
                    method: 'GET',
                    success: function(response) {
                        $('#modalDetailBuku').html(response);
                        $('#detailBuku').modal('show');
                    },
                    error: function(xhr) {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Gagal memuat modal!',
                            icon: 'error',
                            confirmButtonText: 'Oke'
                        });
                    }
                });
            });

            $('.deleteBtn').on('click', function(e) {
                e.preventDefault();

                var id = $(this).data('id');

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Buku akan dihapus dan tidak bisa dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/hapus/' + id,
                            method: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Dihapus!',
                                    'Buku berhasil dihapus.',
                                    'success'
                                );

                                $('button[data-id="' + id + '"]').closest('tr').remove();
                            },
                            error: function(xhr) {
                                Swal.fire(
                                    'Error!',
                                    'Buku gagal dihapus!',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });
        </script>
    @endpush
@endsection
