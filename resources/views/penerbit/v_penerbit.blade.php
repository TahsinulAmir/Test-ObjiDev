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
                                data-bs-target="#modalTambahPenerbit">Tambah Penerbit</button>
                        </div>
                    </div>

                    <!-- Table with stripped rows -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Penerbit</th>
                                <th scope="col">Email</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_penerbit as $penerbit)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $penerbit->nama }}</td>
                                    <td>{{ $penerbit->email }}</td>
                                    <td>{{ $penerbit->alamat }}</td>
                                    <td>
                                        <button data-id="{{ $penerbit->id }}" class="btn btn-success modalUpdatePenerbit"><i
                                                class="bi bi-pencil-square"></i></button>
                                        <button type="button" class="btn btn-warning modalDetailPenerbit"
                                            data-id="{{ $penerbit->id }}"><i class="bi bi-info-circle"></i></button>
                                        <button type="button" data-id="{{ $penerbit->id }}"
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

    {{-- Modal Tambah Penerbit --}}
    <div class="modal fade" id="modalTambahPenerbit" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Penerbit Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="tambahPenerbit">
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Nama Penerbit</label>
                                <input type="text" class="form-control" placeholder="Penerbit" id="nama">
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword5" class="form-label">Alamat</label>
                                <input type="text" class="form-control" placeholder="Jakarta" id="alamat">
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword5" class="form-label">No Phone</label>
                                <input type="number" class="form-control" placeholder="023424" id="no_phone">
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword5" class="form-label">Email</label>
                                <input type="email" class="form-control" placeholder="email@email.com" id="email">
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword5" class="form-label">Alamat Website</label>
                                <input type="text" class="form-control" placeholder="htttps//:" id="website">
                            </div>
                            <div class="col-12">
                                <label for="inputAddress5" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi_penerbit" style="height: 100px;"></textarea>
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
    <div id="modalDetailPenerbit"></div>
    <div id="modalUpdatePenerbit"></div>

    @push('myscript')
        <script>
            $('#tambahPenerbit').on('submit', function(e) {
                e.preventDefault();
                var nama = $("#nama").val();
                var alamat = $("#alamat").val();
                var no_phone = $("#no_phone").val();
                var email = $("#email").val();
                var website = $("#website").val();
                var deskripsi_penerbit = $("#deskripsi_penerbit").val();

                $.ajax({
                    url: '{{ url('/penerbit') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        nama: nama,
                        alamat: alamat,
                        no_phone: no_phone,
                        email: email,
                        website: website,
                        deskripsi_penerbit: deskripsi_penerbit,
                    },
                    success: function(response) {
                        Swal.fire({
                            title: "Berhasil!",
                            text: "Penerbit Berhasil Ditambahkan!",
                            icon: "success"
                        });

                        var newRow = `
                        <tr>
                            <th scope="row">${response.iteration}</th>
                            <td>${response.data.nama}</td>
                            <td>${response.data.email}</td>
                            <td>${response.data.alamat}</td>
                            <td>
                                <button class="btn btn-success"><i
                                    class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-warning modalDetailPenerbit"
                                    data-id="${response.data.id}"><i class="bi bi-info-circle"></i></button>
                                <button type="button" data-id="${response.data.id}"
                                    class="btn btn-danger deleteBtn"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                    `;
                        $('tbody').append(newRow);
                        $('#tambahPenerbit')[0].reset();
                    },
                    error: function(xhr) {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Penerbit Gagal Ditambahkan!',
                            icon: 'error',
                            confirmButtonText: 'Oke'
                        });
                    }
                });
            });

            $('.modalDetailPenerbit').on('click', function(e) {
                var id = $(this).data('id');

                $.ajax({
                    url: '{{ url('penerbit') }}/' + id,
                    method: 'GET',
                    success: function(response) {
                        $('#modalDetailPenerbit').html(response);
                        $('#detailPenerbit').modal('show');
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

            $('.modalUpdatePenerbit').on('click', function(e) {
                var id = $(this).data('id');

                $.ajax({
                    url: '{{ url('update-penerbit') }}/' + id,
                    method: 'GET',
                    success: function(response) {
                        $('#modalUpdatePenerbit').html(response);
                        $('#updatePenerbit').modal('show');
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
                    text: "Penerbit akan dihapus dan tidak bisa dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/hapus-penerbit/' + id,
                            method: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Dihapus!',
                                    'Penerbit berhasil dihapus.',
                                    'success'
                                );

                                $('button[data-id="' + id + '"]').closest('tr').remove();
                            },
                            error: function(xhr) {
                                Swal.fire(
                                    'Error!',
                                    'Penerbit gagal dihapus!',
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
