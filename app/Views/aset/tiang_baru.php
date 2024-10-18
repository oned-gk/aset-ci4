<?= session()->getFlashdata('error') ?>
<?= validation_list_errors('list_toasts') ?>
<div class="card">
    <div class="card-header">
        <h5 class="card-title">
            TIANG BARU
        </h5>
    </div>
    <div class="card-body">
        <form action="/tiang/insert" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <input type="hidden" class="txt_csrfname" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
            Search kota : <input type="text" id="autocompletekota">

            Selected kota id : <input type="text" id="kotaid" value='0' >
            <div class="mb-3">
                <label for="no_tiang" class="form-label">Nomor Tiang</label>
                <input type="text" name="no_tiang" class="form-control" id="no_tiang" placeholder="KMOCLP-000001" value="<?= set_value('no_tiang') ?>">
            </div>
            <div class="mb-3">
                <label for="latitude" class="form-label">Latitude</label>
                <input type="text" name="latitude" class="form-control" id="latitude" placeholder="-7.123456789012" value="<?= set_value('latitude') ?>">
            </div>
            <div class="mb-3">
                <label for="longitude" class="form-label">Longitude</label>
                <input type="text" name="longitude" class="form-control" id="longitude" placeholder="100.12345678901234" value="<?= set_value('longitude') ?>">
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Longitude</label>
                <input type="file" name="foto" class="form-control">
            </div>
            <div class="mb-3">
            <div class="ui-widget">
                <label for="tags" class="form-label">Lokasi</label>
                <input type="text" name="tags" class="form-control" id="tags">
            </div>
            </div>
            <div class="mb-3">
                <input type="submit" name="submit" class="btn btn-primary" id="submit" value="Tambahkan">
            </div>
        </form>
       
   <!-- Script -->
   <script type='text/javascript'>
   $(document).ready(function(){
     // Initialize
     $( "#autocompleteuser" ).autocomplete({

        source: function( request, response ) {

           // CSRF Hash
           var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
           var csrfHash = $('.txt_csrfname').val(); // CSRF hash

           // Fetch data
           $.ajax({
              url: "<?=base_url('wilayah/kabkot')?>",
              type: 'post',
              dataType: "json",
              data: {
                 search: request.term,
                 [csrfName]: csrfHash // CSRF Token
              },
              success: function( data ) {
                 // Update CSRF Token
                 $('.txt_csrfname').val(data.token);

                 response( data.data );
              }
           });
        },
        select: function (event, ui) {
           // Set selection
           $('#autocompletekota').val(ui.item.label); // display the selected text
           $('#kotaid').val(ui.item.value); // save selected id to input
           return false;
        },
        focus: function(event, ui){
          $( "#autocompletekota" ).val( ui.item.label );
          $( "#kotaid" ).val( ui.item.value );
          return false;
        },
      }); 
   }); 
   </script> 

    </div>
</div>