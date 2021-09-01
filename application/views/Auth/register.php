
<div class="container">
	<h1 class="page-header text-center">CodeIgniter Signup with Email Verification</h1>
	<div class="row justify-content-md-center">
		<div class="col-md-4"></div>
		<div class="col-md-4">
            <?php
                if(validation_errors()){
                    ?>
                    <div class="alert alert-info text-center">
                        <?php echo validation_errors(); ?>
                    </div>
                    <?php
                }

                if($this->session->flashdata('status')){
                    ?>
                    <div class="alert alert-info text-center">
                        <?php echo $this->session->flashdata('status'); ?>
                    </div>
                    <?php
                    unset($_SESSION['status']);
                }	
            ?>
            <span id="success_message"></span>
            <form  id="register_form" method="POST" action="<?php echo base_url('register') ?>" >
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" >
                    <span id='name_error' class='text-danger'></span>
                </div>	
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="tel" class="form-control" id="phone" name="phone">
                    <span id='phone_error' class='text-danger'></span>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email">
                    <span id='email_error' class='text-danger'></span>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <span id='password_error' class='text-danger'></span>
                </div>
                <div class="form-group">
                    <label for="password_confirm">Confirm Password:</label>
                    <input type="password" class="form-control" id="password_confirm" name="password_confirm">
                    <span id='password_confirm_error' class='text-danger'></span>
                </div>
                <div class="form-group">
                    <button type="submit" id="register_btn" name="register_btn" class="btn btn-primary">register</button>
                </div>
            </form>
        </div>
		<div class="col-md-4"></div>
	</div>
</div>
<script>
$(document).ready(function(){

    $('#register_form').on('submit',function(event){
        event.preventDefault();
        $.ajax({
            url:"<?php echo base_url('register'); ?>",
            method:'POST',
            data:$(this).serialize(),
            dataType:'json',
            beforeSend:function(){
                $('#register_btn').attr('disabled','disabled');
            },
            success:function(data)
            {
                if(data.error)
                {
                    if(data.name_error != '')
                    {
                        $('#name_error').html(data.name_error);
                    }
                    else
                    {
                        $('#name_error').html('');
                    }
                    if(data.phone_error != '')
                    {
                        $('#phone_error').html(data.phone_error);
                    }
                    else
                    {
                        $('#phone_error').html('');
                    }
                    if(data.email_error != '')
                    {
                        $('#email_error').html(data.email_error);
                    }
                    else
                    {
                        $('#email_error').html('');
                    }
                    if(data.password_error != '')
                    {
                        $('#password_error').html(data.password_error);
                    }
                    else
                    {
                        $('#password_error').html('');
                    }
					if(data.password_confirm_error != '')
                    {
                        $('#password_confirm_error').html(data.password_confirm_error);
                    }
                    else
                    {
                        $('#password_confirm_error').html('');
                    }
                }
                if(data.success)
                {
                    window.location.href = "<?php echo base_url('login'); ?>"
                    // $('#success_message').html(data.success);
                    
                }
				$('#register_btn').attr('disabled',false);
            }
        })
    });
});


</script>

