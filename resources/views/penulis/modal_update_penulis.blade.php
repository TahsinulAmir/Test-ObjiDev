<div class="modal fade" id="updatePenulis" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Penulis</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updatePenulis">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="inputName5" class="form-label">Nama Penulis</label>
                            <input type="text" class="form-control" value="{{ $detailPenulis->name }}"
                                placeholder="Jhon Doe" id="update_name">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword5" class="form-label">Alamat</label>
                            <input type="text" class="form-control" value="{{ $detailPenulis->alamat }}"
                                placeholder="Jakarta" id="update_alamat">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword5" class="form-label">No Phone</label>
                            <input type="number" class="form-control" value="{{ $detailPenulis->no_phone }}"
                                placeholder="023424" id="update_no_phone">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword5" class="form-label">Email</label>
                            <input type="email" class="form-control" value="{{ $detailPenulis->email }}"
                                placeholder="email@email.com" id="update_email">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword5" class="form-label">Jenis Kelamin</label>
                            <select id="update_gender" class="form-select">
                                <option disabled>--- Pilih Jenis Kelamin ---</option>
                                <option value="L" {{ $detailPenulis->gender === 'L' ? 'selected' : '' }}>Laki -
                                    Laki
                                </option>
                                <option value="P" {{ $detailPenulis->gender === 'P' ? 'selected' : '' }}>Perempuan
                                </option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="update_deskripsi" style="height: 100px;">{{ $detailPenulis['deskripsi'] }}</textarea>
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
    $('#updatePenulis').on('submit', function(e) {
        e.preventDefault();
        var id = '{{ $detailPenulis->id }}';
        var name = $("#update_name").val();
        var alamat = $("#update_alamat").val();
        var no_phone = $("#update_no_phone").val();
        var email = $("#update_email").val();
        var gender = $("#update_gender").val();
        var deskripsi = $("#update_deskripsi").val();

        $.ajax({
            url: '{{ url('update-penulis') }}/' + id,
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                name: name,
                alamat: alamat,
                no_phone: no_phone,
                email: email,
                gender: gender,
                deskripsi: deskripsi,
            },
            success: function(response) {
                Swal.fire({
                    title: "Berhasil!",
                    text: "Penulis Berhasil Diupdate!",
                    icon: "success"
                }).then(function() {
                    location.reload();
                });
            },
            error: function(xhr) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Penulis Gagal Diupdate!',
                    icon: 'error',
                    confirmButtonText: 'Oke'
                });
            }
        });
    });
</script>
