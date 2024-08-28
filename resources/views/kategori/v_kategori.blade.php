@extends('layout.main')

@section('content')
    <div class="pagetitle">
        <h1>{{ $title }}</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="col d-flex my-2">
                            <div>
                                <h5 class="card-title"></h5>
                            </div>
                            <div class="my-auto me-auto">
                                <button type="button " class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modalTambahKategori">Tambah Kategori</button>
                            </div>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_kategori as $kategori)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $kategori->kategori }}</td>
                                        <td>
                                            <button data-id="{{ $kategori->id }}"
                                                class="btn btn-success modalUpdateKategori"><i
                                                    class="bi bi-pencil-square"></i></button>
                                            <button type="button" data-id="{{ $kategori->id }}"
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
        </div>
    </section>

    {{-- Modal Tambah Kategori --}}
    <div class="modal fade" id="modalTambahKategori" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kategori Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="tambahKategori">
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label for="inputName5" class="form-label">Kategori</label>
                                <input type="text" class="form-control" placeholder="Kategori" id="kategori">
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
    <div id="modalUpdateKategori"></div>

    @push('myscript')
        <script>
            $('#tambahKategori').on('submit', function(e) {
                e.preventDefault();
                var kategori = $("#kategori").val();

                $.ajax({
                    url: '{{ url('/kategori') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        kategori: kategori,
                    },
                    success: function(response) {
                        Swal.fire({
                            title: "Berhasil!",
                            text: "Kategori Berhasil Ditambahkan!",
                            icon: "success"
                        });

                        var newRow = `
                        <tr>
                            <th scope="row">${response.iteration}</th>
                            <td>${response.data.kategori}</td>
                            <td>
                                <button class="btn btn-success"><i
                                    class="bi bi-pencil-square"></i></button>
                                <button type="button" data-id="${response.data.id}"
                                    class="btn btn-danger deleteBtn"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                    `;
                        $('tbody').append(newRow);
                        $('#tambahKategori')[0].reset();
                    },
                    error: function(xhr) {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Kategori Gagal Ditambahkan!',
                            icon: 'error',
                            confirmButtonText: 'Oke'
                        });
                    }
                });
            });

            $('.modalUpdateKategori').on('click', function(e) {
                var id = $(this).data('id');

                $.ajax({
                    url: '{{ url('update-kategori') }}/' + id,
                    method: 'GET',
                    success: function(response) {
                        $('#modalUpdateKategori').html(response);
                        $('#updateKategori').modal('show');
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
                    text: "Kategori akan dihapus dan tidak bisa dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/hapus-kategori/' + id,
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
                                    'Kategori gagal dihapus!',
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
