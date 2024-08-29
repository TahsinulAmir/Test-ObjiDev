<div class="modal fade" id="detailPenulis" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class=" mb-3">
                    <div class="row g-0">
                        <div class="col-md-8">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Penulis</div>
                                    <div class="col-lg-9 col-md-8">: {{ $detailPenulis->name }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Alamat</div>
                                    <div class="col-lg-9 col-md-8">: {{ $detailPenulis->alamat }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">No Phone</div>
                                    <div class="col-lg-9 col-md-8">: {{ $detailPenulis->no_phone }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">: {{ $detailPenulis->email }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Website</div>
                                    <div class="col-lg-9 col-md-8">:
                                        {{ $detailPenulis->gender === 'L' ? 'Laki - Laki' : 'Perempuan' }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Deskripsi</div>
                                    <div class="col-lg-9 col-md-8">: {{ $detailPenulis->deskripsi }}</div>
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
