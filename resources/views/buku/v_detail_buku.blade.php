@extends('layout.main')

@section('content')
    <div class="pagetitle">
        <h1>{{ $title }}</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <!-- Card with an image on left -->
        <div class="card mb-3">
            <form id="updateBuku">
                <div class="row g-0">
                    <div class="col-md-4 text-center">
                        @if ($detailBuku['cover'])
                            <img src="{{ asset('/') }}image/cover/{{ $detailBuku['cover'] }}" id="gambar_load" width="300px"
                                class="img-fluid m-4" alt="...">
                        @else
                            <i class="bi bi-book" style="font-size: 200px"></i>
                        @endif
                        <div class="mx-4">
                            <input class="form-control" type="file" id="cover">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <div>
                                <div class="row g-3 pt-4">
                                    <div class="col-md-12">
                                        <label for="inputName5" class="form-label">Judul Buku</label>
                                        <input type="text" class="form-control" id="judul_buku"
                                            value="{{ $detailBuku['judul_buku'] }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail5" class="form-label">Penulis</label>
                                        <select id="penulis_id" class="form-select">
                                            <option disabled>--- Pilih Penulis ---</option>
                                            @foreach ($all_penulis as $penulis)
                                                <option value="{{ $penulis->id }}"
                                                    {{ $penulis->id == $detailBuku['penulis_id'] ? 'selected' : '' }}>
                                                    {{ $penulis->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputPassword5" class="form-label">Penerbit</label>
                                        <select id="penerbit_id" class="form-select">
                                            <option disabled>--- Pilih Penerbit ---</option>
                                            @foreach ($all_penerbit as $penerbit)
                                                <option value="{{ $penerbit->id }}"
                                                    {{ $penerbit->id == $detailBuku['penerbit_id'] ? 'selected' : '' }}>
                                                    {{ $penerbit->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="inputAddress5" class="form-label">Kategori</label>
                                        <select id="kategori_id" class="form-select">
                                            <option disabled>--- Pilih Kategori ---</option>
                                            @foreach ($all_kategori as $kategori)
                                                <option value="{{ $kategori->id }}"
                                                    {{ $kategori->id == $detailBuku['kategori_id'] ? 'selected' : '' }}>
                                                    {{ $kategori->kategori }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="inputAddress2" class="form-label">Tahun Terbit</label>
                                        <input type="number" class="form-control" id="thn_terbit" placeholder="2002"
                                            value="{{ $detailBuku['thn_terbit'] }}">
                                    </div>
                                    <div class="col-6">
                                        <label for="inputAddress2" class="form-label">Jumlah</label>
                                        <input type="number" class="form-control" id="jumlah" placeholder="2"
                                            value="{{ $detailBuku['jumlah'] }}">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                        <textarea class="form-control" placeholder="Detail Buku" id="deskripsi" style="height: 100px;">{{ $detailBuku['deskripsi'] }}</textarea>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <button type="button" class="btn btn-secondary">Kembali</button>
                                    </div>
                                </div><!-- End Multi Columns Form -->
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div><!-- End Card with an image on left -->
    </section>

    @push('myscript')
        <script>
            $('#updateBuku').on('submit', function(e) {
                e.preventDefault();
                const cover = $('#cover').prop('files')[0];
                const id = '{{ $detailBuku['id'] }}'

                let formData = new FormData();
                formData.append('judul_buku', $('#judul_buku').val());
                formData.append('penulis_id', $('#penulis_id').val());
                formData.append('penerbit_id', $('#penerbit_id').val());
                formData.append('kategori_id', $('#kategori_id').val());
                formData.append('thn_terbit', $('#thn_terbit').val());
                formData.append('jumlah', $('#jumlah').val());
                formData.append('deskripsi', $('#deskripsi').val());
                formData.append('cover', cover);

                $.ajax({
                    url: '{{ url('buku') }}/' + id,
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
                            text: "Buku Berhasil Diperbarui!",
                            icon: "success"
                        })
                    },
                    error: function(xhr) {
                        var errors = xhr.responseJSON.errors;
                        console.log(errors);

                        Swal.fire({
                            title: 'Error!',
                            text: 'Buku Gagal Diperbarui!',
                            icon: 'error',
                            confirmButtonText: 'Oke'
                        });
                    }
                });
            });
        </script>
        <script>
        function bacaGambar(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#gambar_load').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $('#cover').change(function() {
            bacaGambar(this);
        });
    </script>
    @endpush
@endsection
