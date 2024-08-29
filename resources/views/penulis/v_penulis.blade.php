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
                                data-bs-target="#modalTambahPenulis">Tambah Penulis</button>
                        </div>
                    </div>

                    <!-- Table with stripped rows -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Penulis</th>
                                <th scope="col">Email</th>
                                <th scope="col">No Phone</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_penulis as $penulis)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $penulis->name }}</td>
                                    <td>{{ $penulis->email }}</td>
                                    <td>{{ $penulis->no_phone }}</td>
                                    <td>{{ $penulis->alamat }}</td>
                                    <td>
                                        <button data-id="{{ $penulis->id }}" class="btn btn-success modalUpdatePenulis"><i
                                                class="bi bi-pencil-square"></i></button>
                                        <button type="button" class="btn btn-warning modalDetailPenulis"
                                            data-id="{{ $penulis->id }}"><i class="bi bi-info-circle"></i></button>
                                        <button type="button" data-id="{{ $penulis->id }}"
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
    <div class="modal fade" id="modalTambahPenulis" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Penulis Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="tambahPenulis">
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Nama Penulis</label>
                                <input type="text" class="form-control" placeholder="Jhon Doe" id="name">
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
                                <label for="inputPassword5" class="form-label">Jenis Kelamin</label>
                                <select id="gender" class="form-select">
                                    <option selected disabled>--- Pilih Jenis Kelamin ---</option>
                                    <option value="L">Laki - Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-4">
                                <label for="inputPassword5" class="form-label">Password</label>
                                <input type="password" class="form-control" placeholder="htttps//:" id="password">
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
    <div id="modalDetailPenulis"></div>
    <div id="modalUpdatePenulis"></div>

    @push('myscript')
        <script>
            $('#tambahPenulis').on('submit', function(e) {
                e.preventDefault();
                var name = $("#name").val();
                var alamat = $("#alamat").val();
                var no_phone = $("#no_phone").val();
                var gender = $("#gender").val();
                var email = $("#email").val();
                var password = $("#password").val();

                $.ajax({
                    url: '{{ url('/penulis') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        name: name,
                        alamat: alamat,
                        no_phone: no_phone,
                        gender: gender,
                        email: email,
                        password: password,
                    },
                    success: function(response) {
                        Swal.fire({
                            title: "Berhasil!",
                            text: "Penulis Berhasil Ditambahkan!",
                            icon: "success"
                        });

                        var newRow = `
                        <tr>
                            <th scope="row">${response.iteration}</th>
                            <td>${response.data.name}</td>
                            <td>${response.data.email}</td>
                            <td>${response.data.no_phone}</td>
                            <td>${response.data.alamat}</td>
                            <td>
                                <button data-id="${response.data.id}" class="btn btn-success modalUpdatePenulis"><i
                                    class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-warning modalDetailPenulis"
                                    data-id="${response.data.id}"><i class="bi bi-info-circle"></i></button>
                                <button type="button" data-id="${response.data.id}"
                                    class="btn btn-danger deleteBtn"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                    `;
                        $('tbody').append(newRow);
                        $('#tambahPenulis')[0].reset();
                    },
                    error: function(xhr) {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Penulis Gagal Ditambahkan!',
                            icon: 'error',
                            confirmButtonText: 'Oke'
                        });
                    }
                });
            });

            $('.modalDetailPenulis').on('click', function(e) {
                var id = $(this).data('id');

                $.ajax({
                    url: '{{ url('detail-penulis') }}/' + id,
                    method: 'GET',
                    success: function(response) {
                        $('#modalDetailPenulis').html(response);
                        $('#detailPenulis').modal('show');
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

            $('.modalUpdatePenulis').on('click', function(e) {
                var id = $(this).data('id');

                $.ajax({
                    url: '{{ url('update-penulis') }}/' + id,
                    method: 'GET',
                    success: function(response) {
                        $('#modalUpdatePenulis').html(response);
                        $('#updatePenulis').modal('show');
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
                    text: "Penulis akan dihapus dan tidak bisa dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/hapus-penulis/' + id,
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
