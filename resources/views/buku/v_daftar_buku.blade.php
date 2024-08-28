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
                        <div class="my-auto">
                            <button type="button " class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#tambahBuku">Tambah Buku</button>
                        </div>
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
                                        <button type="button" class="btn btn-warning"><i
                                                class="bi bi-info-circle"></i></button>
                                        <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>
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

                        //     var newRow = `
                //         <tr>
                //             <th scope="row">${response.iteration}</th>
                //             <td>${response.data.judul_buku}</td>
                //             <td>${response.data.name}</td>
                //             <td>${response.data.nama}</td>
                //             <td>${response.data.kategori}</td>
                //             <td>${response.data.thn_terbit}</td>
                //             <td>
                //                  <button type="button" class="btn btn-success"><i
                //                     class="bi bi-pencil-square"></i></button>
                //                 <button type="button" class="btn btn-warning"><i
                //                     class="bi bi-info-circle"></i></button>
                //                 <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                //             </td>
                //         </tr>
                // `;
                        //     $('tbody').append(newRow);
                        //     $('#tambahBuku')[0].reset();
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
        </script>
    @endpush
@endsection
