<div class="modal fade" id="updateKategori" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateKategori">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="inputName5" class="form-label">Kategori</label>
                            <input type="text" class="form-control" placeholder="Penerbit"
                                value="{{ $detailKategori->kategori }}" id="update_kategori">
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
    $('#updateKategori').on('submit', function(e) {
        e.preventDefault();
        var id = '{{ $detailKategori->id }}';
        var kategori = $("#update_kategori").val();

        $.ajax({
            url: '{{ url('update-kategori') }}/' + id,
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                kategori: kategori,
            },
            success: function(response) {
                Swal.fire({
                    title: "Berhasil!",
                    text: "Kategori Berhasil Diupdate!",
                    icon: "success"
                }).then(function() {
                    location.reload();
                });
            },
            error: function(xhr) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Kategori Gagal Diupdate!',
                    icon: 'error',
                    confirmButtonText: 'Oke'
                });
            }
        });
    });
</script>
