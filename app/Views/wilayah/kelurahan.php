<!-- CSRF token -->
<input type="hidden" class="txt_csrfname" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

<!-- Autocomplete -->
Search User : <input type="text" id="autocompletekelurahan">

<br><br>
Selected user id : <input type="text" id="kelurahanid" value='0'>

<!-- Script -->
<!-- Script -->
<script type='text/javascript'>
   $(document).ready(function(){
     // Initialize
     $( "#autocompletekelurahan" ).autocomplete({

        source: function( request, response ) {

           // CSRF Hash
           var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
           var csrfHash = $('.txt_csrfname').val(); // CSRF hash

           // Fetch data
           $.ajax({
              url: "<?=site_url('kelurahan/getkelurahan')?>",
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
           $('#autocompletekelurahan').val(ui.item.label); // display the selected text
           $('#kelurahanid').val(ui.item.value); // save selected id to input
           return false;
        },
        focus: function(event, ui){
          $( "#autocompletekelurahan" ).val( ui.item.label );
          $( "#kelurahanid" ).val( ui.item.value );
          return false;
        },
      }); 
   }); 
   </script> 