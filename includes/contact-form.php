


<form class="contact-form" id="contact">
<div id="success_message" class="alert alert-success" style="display:none"></div>
<div id="fail_message" class="alert alert-danger" style="display:none"></div>

    <div class="mb-3 row">
        <div class="mb-3 col-md-6 col-sm-12">
            <input type="text" name="first_name" placeholder="First name" class="form-control" aria-describedby="firstname" required>
        </div>

        <div class="mb-3 col-md-6 col-sm-12">
            <input type="text" name="last_name" class="form-control" placeholder="Last name" aria-describedby="lastname" required>
        </div>

    </div>

    <div class="mb-3">
        <input name="email" placeholder="Email" type="email" class="form-control" aria-describedby="email" required>
    </div>
    
    <div class="mb-3">
        <textarea placeholder="Message" name="message" class="form-control" id="exampleFormControlTextarea3"
            rows="7" required></textarea>
    </div>
    <button type="submit" class="btn site-button">Submit</button>
</form>

<script>


    (function ($) {
        $('#contact').submit(function (event) {
            event.preventDefault()
           
           var endpoint = '<?php echo admin_url('admin-ajax.php') ?>';

           var form = $('#contact').serialize();

           var formData = new FormData();

           formData.append('action','contact');

           /////////// Replace nonce info for you website to prevent security issues ///////////////
           formData.append('nonce','<?php echo wp_create_nonce('ajax-nonce') ?>');


           formData.append('contact',form);

           $.ajax(endpoint, {

               type:'POST',
               data:formData,
               processData:false,
               contentType:false,

               success: function(res){
                   $('#success_message').text('Your message has been sent. Thank you!').show();
                   $('#success_message').fadeIn(2000).delay(3000).slideUp(1000)
                   $('#contact').trigger('reset');
               },

               error: function(err){
                $('#fail_message').text('Sorry message was not sent. Please contact through phone or email').show();
                   $('#fail_message').fadeIn(2000).delay(3000).slideUp(1000)
                   $('#contact').trigger('reset');
               }


           })
        })
    })(jQuery)


</script>