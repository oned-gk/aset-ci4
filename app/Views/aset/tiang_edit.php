<?= session()->getFlashdata('error') ?>
<?= validation_list_errors('list_toasts') ?>
<div class="card">
    <div class="card-header">
        <h5 class="card-title">
            EDIT TIANG (id=<?= esc($daftar_tiang[0]['id']) ?>)
        </h5>
    </div>
    <div class="card-body">
        <form action="/tiang/update/<?= esc($daftar_tiang[0]['id']) ?>" method="post" enctype="multipart/form-data" class="row gx-3 gy-1">
            <?= csrf_field() ?>      
            <input type="hidden" class="txt_csrfname" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
            <div class="col-6">
                <label for="no_tiang" class="form-label">Nomor Tiang</label>
                <input type="text" name="no_tiang" class="form-control" id="no_tiang"  value="<?= esc($daftar_tiang[0]['no_tiang']) ?>">
            </div>
            <div class="col-6">
                <label for="autocompletekelurahan" class="form-label">Kelurahan</label>
                <input type="text" name="autocompletekelurahan" class="form-control" id="autocompletekelurahan" value="<?= esc($daftar_tiang[0]['kelurahan']) ?>">
                <input type="hidden" id="kelurahan" name="kelurahan" value="<?= esc($daftar_tiang[0]['kelurahan']) ?>">
                <input type="hidden" id="kecamatan" name="kecamatan" value="<?= esc($daftar_tiang[0]['kecamatan']) ?>">
                <input type="hidden" id="kabupaten" name="kabupaten" value="<?= esc($daftar_tiang[0]['kabupaten']) ?>">
                <input type="hidden" id="provinsi" name="provinsi" value="<?= esc($daftar_tiang[0]['provinsi']) ?>">
            </div>
            <div class="col-6">
                <label for="latitude" class="form-label">Latitude</label>
                <input type="text" name="latitude" class="form-control" id="latitude" value="<?= esc($daftar_tiang[0]['latitude']) ?>">
            </div>
            <div class="col-6">
                <label for="longitude" class="form-label">Longitude</label>
                <input type="text" name="longitude" class="form-control" id="longitude" value="<?= esc($daftar_tiang[0]['longitude']) ?>">
            </div>
            <div class="col-6">
                <label for="jalan" class="form-label">Nama Jalan</label>
                <input type="text" name="jalan" class="form-control" id="jalan" value="<?= esc($daftar_tiang[0]['jalan']) ?>">
            </div>
            <div class="col-6">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" name="foto" class="form-control">
            </div>
            <div class="col-12">
                <input type="submit" name="submit" class="btn btn-primary" id="submit" value="Simpan">
                <a href="#" onclick="history.go(-1)" class="btn btn-warning">Batal</a>
            </div>
        </form>
    </div>
</div>
<!-- Script -->
<script type='text/javascript'>
    $(document).ready(function() {
        // Initialize
        $("#autocompletekelurahan").autocomplete({
            maxShowItems: 10,
            source: function(request, response) {

                // CSRF Hash
                var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
                var csrfHash = $('.txt_csrfname').val(); // CSRF hash

                // Fetch data
                $.ajax({
                    url: "<?= base_url('kelurahan/getkelurahan') ?>",
                    type: 'post',
                    dataType: "json",
                    data: {
                        search: request.term,
                        [csrfName]: csrfHash // CSRF Token
                    },
                    success: function(data) {
                        // Update CSRF Token
                        $('.txt_csrfname').val(data.token);

                        response(data.data);
                    }
                });
            },
            select: function(event, ui) {
                // Set selection
                $('#autocompletekelurahan').val(ui.item.kelurahan); // display the selected text
                $('#kelurahan').val(ui.item.kelurahan); // save selected id to input
                $('#kecamatan').val(ui.item.kecamatan); // save selected id to input
                $('#kabupaten').val(ui.item.kabupaten); // save selected id to input
                $('#provinsi').val(ui.item.provinsi); // save selected id to input
                return false;
            },
            focus: function(event, ui) {
                $("#autocompletekelurahan").val(ui.item.kelurahan);
                $("#kelurahan").val(ui.item.kelurahan);
                $("#kecamatan").val(ui.item.kecamatan);
                $('#kabupaten').val(ui.item.kabupaten); // save selected id to input
                $('#provinsi').val(ui.item.provinsi); // save selected id to input

                return false;
            },

        });
    });
</script>