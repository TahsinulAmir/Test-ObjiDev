<div class="modal fade" id="detailBuku" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class=" mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            @if ($detailBuku['cover'])
                                <img src="{{ asset('/') }}image/cover/{{ $detailBuku['cover'] }}" width="300px"
                                    class="img-fluid" alt="...">
                            @else
                                <i class="bi bi-book" style="font-size: 200px"></i>
                            @endif
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Judul Buku</div>
                                    <div class="col-lg-9 col-md-8">: {{ $detailBuku->judul_buku }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Penulis</div>
                                    <div class="col-lg-9 col-md-8">: {{ $detailBuku->name }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Penerbit</div>
                                    <div class="col-lg-9 col-md-8">: {{ $detailBuku->nama }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Kategori</div>
                                    <div class="col-lg-9 col-md-8">: {{ $detailBuku->kategori }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Tahun Terbit</div>
                                    <div class="col-lg-9 col-md-8">: {{ $detailBuku->thn_terbit }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Jumlah</div>
                                    <div class="col-lg-9 col-md-8">: {{ $detailBuku->jumlah }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Deskripsi</div>
                                    <div class="col-lg-9 col-md-8">: {{ $detailBuku->deskripsi }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>
