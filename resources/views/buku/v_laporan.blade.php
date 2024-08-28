@extends('layout.main')

@section('content')
    <div class="pagetitle">
        <h1>{{ $title }}</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <!-- Multi Columns Form -->
                <form id="rekap" class="row g-3 pt-3">
                    <div class="col-md-3">
                        <select id="penulis_id" class="form-select">
                            <option selected disabled>--- Pilih Penulis ---</option>
                            @foreach ($all_penulis as $penulis)
                                <option value="{{ $penulis->id }}">{{ $penulis->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select id="penerbit_id" class="form-select">
                            <option selected disabled>--- Pilih Penerbit ---</option>
                            @foreach ($all_penerbit as $penerbit)
                                <option value="{{ $penerbit->id }}">{{ $penerbit->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select id="kategori_id" class="form-select">
                            <option selected disabled>--- Pilih Kategori ---</option>
                            @foreach ($all_kategori as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3">
                        <div class="">
                            <button type="submit" class="btn btn-primary">Rekap</button>
                            {{-- <button type="button" class="btn btn-secondary" onclick="window.open()">Cetak</button> --}}
                        </div>
                    </div>
                </form><!-- End Multi Columns Form -->

            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul Buku</th>
                                    <th>Penulis</th>
                                    <th>Penerbit</th>
                                    <th>Kategori</th>
                                    <th>Tahun Terbit</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody id="loadbuku">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('myscript')
        <script>
            $('#rekap').on('submit', function(e) {
                e.preventDefault();
                var penulis_id = $("#penulis_id").val();
                var penerbit_id = $("#penerbit_id").val();
                var kategori_id = $("#kategori_id").val();

                $.ajax({
                    url: '{{ url('/laporan') }}',
                    method: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        penulis_id: penulis_id,
                        penerbit_id: penerbit_id,
                        kategori_id: kategori_id,
                    },
                    cache: false,
                    success: function(response) {
                        $("#loadbuku").html(response);
                        $('#rekap')[0].reset();
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
