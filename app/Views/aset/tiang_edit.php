<?= session()->getFlashdata('error') ?>
<?= validation_list_errors('list_toasts') ?>
<div class="card">
    <div class="card-header">
        <h5 class="card-title">
            EDIT TIANG (id=<?= esc($daftar_tiang[0]['id_tiang']) ?>)
        </h5>
    </div>
    <div class="card-body">
        <form action="/tiang/update/<?= esc($daftar_tiang[0]['id_tiang']) ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>      
                
            <div class="mb-3">
                <label for="no_tiang" class="form-label">Nomor Tiang</label>
                <input type="text" name="no_tiang" class="form-control" id="no_tiang" placeholder="KMOCLP-000001" value="<?= esc($daftar_tiang[0]['no_tiang']) ?>">
            </div>
            <div class="mb-3">
                <label for="latitude" class="form-label">Latitude</label>
                <input type="text" name="latitude" class="form-control" id="latitude" placeholder="-7.123456789012" value="<?= esc($daftar_tiang[0]['latitude']) ?>">
            </div>
            <div class="mb-3">
                <label for="longitude" class="form-label">Longitude</label>
                <input type="text" name="longitude" class="form-control" id="longitude" placeholder="100.12345678901234" value="<?= esc($daftar_tiang[0]['longitude']) ?>">
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Longitude</label>
                <input type="file" name="foto" class="form-control">
            </div>
            <div class="mb-3">
                <input type="submit" name="submit" class="btn btn-primary" id="submit" value="Simpan">
            </div>
        </form>
    </div>
</div>