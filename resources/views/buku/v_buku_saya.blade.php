@extends('layout.main')

@section('content')
    <div class="pagetitle">
        <h1>{{ $title }}</h1>
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
                                <th scope="col">Penerbit</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Tahun Terbit</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_buku as $buku)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $buku->judul_buku }}</td>
                                    <td>{{ $buku->nama }}</td>
                                    <td>{{ $buku->kategori }}</td>
                                    <td>{{ $buku->thn_terbit }}</td>
                                    <td>{{ $buku->jumlah }}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning modalDetailBukuSaya"
                                            data-id="{{ $buku->id }}"><i class="bi bi-info-circle"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <div id="modalDetailBukuSaya"></div>

@endsection

@push('myscript')
<script>
    $('.modalDetailBukuSaya').on('click', function(e) {
                var id = $(this).data('id');

                $.ajax({
                    url: '{{ url('modal-detail-buku') }}/' + id,
                    method: 'GET',
                    success: function(response) {
                        $('#modalDetailBukuSaya').html(response);
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
</script>
@endpush
