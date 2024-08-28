<div class="modal fade" id="updatePenerbit" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Penerbit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updatePenerbit">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="inputName5" class="form-label">Nama Penerbit</label>
                            <input type="text" class="form-control" placeholder="Penerbit"
                                value="{{ $detailPenerbit->nama }}" id="update_nama">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword5" class="form-label">Alamat</label>
                            <input type="text" class="form-control" placeholder="Jakarta"
                                value="{{ $detailPenerbit->alamat }}" id="update_alamat">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword5" class="form-label">No Phone</label>
                            <input type="number" class="form-control" placeholder="023424"
                                value="{{ $detailPenerbit->no_phone }}" id="update_no_phone">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword5" class="form-label">Email</label>
                            <input type="email" class="form-control" placeholder="email@email.com"
                                value="{{ $detailPenerbit->email }}" id="update_email">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword5" class="form-label">Alamat Website</label>
                            <input type="text" class="form-control" placeholder="htttps//:"
                                value="{{ $detailPenerbit->website }}" id="update_website">
                        </div>
                        <div class="col-12">
                            <label for="inputAddress5" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="update_deskripsi_penerbit" style="height: 100px;">{{ $detailPenerbit->deskripsi_penerbit }}</textarea>
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

<script>
    $('#updatePenerbit').on('submit', function(e) {
        e.preventDefault();
        var id = '{{ $detailPenerbit->id }}';
        var nama = $("#update_nama").val();
        var alamat = $("#update_alamat").val();
        var no_phone = $("#update_no_phone").val();
        var email = $("#update_email").val();
        var website = $("#update_website").val();
        var deskripsi_penerbit = $("#update_deskripsi_penerbit").val();

        $.ajax({
            url: '{{ url('update-penerbit') }}/' + id,
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
                    text: "Penerbit Berhasil Diupdate!",
                    icon: "success"
                }).then(function() {
                    location.reload();
                });
            },
            error: function(xhr) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Penerbit Gagal Diupdate!',
                    icon: 'error',
                    confirmButtonText: 'Oke'
                });
            }
        });
    });
</script>
