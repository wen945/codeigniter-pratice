
    <title>Login</title>
</head>
<body>
<div class="container">
    <h1 class="page-header text-center">CodeIgniter Longin with Email Verification</h1>
    <div class="row">
        <div class="col-sm-4">
        </div>   
        <div class="col-sm-4">
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
            <h3 class="text-center">Login Form</h3>
            <center>
            <span id="success_message"></span>
                <form id="login_form" action="<?php echo base_url('login') ?>" method="POST" >
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
                    <button type="submit" id="login_btn" class="btn btn-primary">Login</button>
                </form>
            </center>
        </div>
        <div class="col-sm-4"></div>
    </div>
</div>
<!-- <script>
    $(document).ready(function(){

        $('#login_form').on('submit',function(event){
            event.preventDefault();
            $.ajax({
                url:"<?php echo base_url(); ?>Auth/LoginController/login",
                method:'POST',
                data:$(this).serialize(),
                dataType:'json',
                beforeSend:function(){
                    $('#login_btn').attr('disabled','disabled');
                },
                success:function(data)
                {
                    if(data.error)
                    {
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
                    }
                    if(data.success)
                    {
                        $('#success_message').html(data.success);
                        $('#email_error').html('');
                        $('#password_error').html('');
                        $('#login_form')[0].reset();
                    }
                    $('#login_btn').attr('disabled',false);
                }
            })
        });
    });
</script> -->
