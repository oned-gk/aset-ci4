<?= session()->getFlashdata('error') ?>
<?= validation_list_errors('list_toasts') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h2 class="h2"><?= esc($title) ?></h2>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="#" onclick="history.go(-1)" class="btn btn-sm btn-outline-secondary">Kembali</a>
                    <a href="<?=base_url('tiang')?>" class="btn btn-sm btn-outline-secondary">Data Tiang</a>
                </div>
            </div>
        </div>
<div class="card shadow shadow-lg bg-light">
<div class="card-body">
        <form action="/tiang/insert" method="post" enctype="multipart/form-data" class="row gx-3 gy-1">
            <?= csrf_field() ?>
            <input type="hidden" class="txt_csrfname" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

            <div class="col-6">
                <label for="no_tiang" class="form-label">Nomor Tiang</label>
                <input type="text" name="no_tiang" class="form-control" id="no_tiang" value="<?= set_value('no_tiang') ?>">
            </div>
            <div class="col-6">
                <label for="autocompletekelurahan" class="form-label">Kelurahan</label>
                <input type="text" name="autocompletekelurahan" class="form-control" id="autocompletekelurahan">
                <input type="hidden" id="kelurahan" name="kelurahan" value="<?= set_value('kelurahan') ?>">
                <input type="hidden" id="kecamatan" name="kecamatan" value="<?= set_value('kecamatan') ?>">
                <input type="hidden" id="kabupaten" name="kabupaten" value="<?= set_value('kabupaten') ?>">
                <input type="hidden" id="provinsi" name="provinsi" value="<?= set_value('provinsi') ?>">
            </div>
            <div class="col-6">
                <label for="latitude" class="form-label">Latitude</label>
                <input type="text" name="latitude" class="form-control" id="latitude" value="<?= set_value('latitude') ?>">
            </div>
            <div class="col-6">
                <label for="longitude" class="form-label">Longitude</label>
                <input type="text" name="longitude" class="form-control" id="longitude" value="<?= set_value('longitude') ?>">
            </div>
            <div class="col-6">
                <label for="jalan" class="form-label">Nama Jalan</label>
                <input type="text" name="jalan" class="form-control" id="jalan" value="<?= set_value('jalan') ?>">
            </div>
            <div class="col-6">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" name="foto" class="form-control">
            </div>
            <div class="col-6">
                <input type="submit" name="submit" class="btn btn-primary" id="submit" value="Tambahkan">
                <a href="#" onclick="history.go(-1)" class="btn btn-warning">Batal</a>
            </div>
    </div>

    </form>
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