<!-- CSRF token -->
<input type="hidden" class="txt_csrfname" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

<!-- Autocomplete -->
Search : <input type="text" id="autocompletekelurahan">

<br><br>
Selected kelurahan : <input type="text" id="kelurahan" value='0'>
Selected kecamatan : <input type="text" id="kecamatan" value='0'>
Selected kabupaten : <input type="text" id="kabupaten" value='0'>
Selected provinsi : <input type="text" id="provinsi" value='0'>

<!-- Script -->
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