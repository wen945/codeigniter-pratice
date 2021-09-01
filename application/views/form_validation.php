<html>
<head>
    <title>CodeIgniter Form Validtion using Ajax JSON</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    
</head>
<body>
    <div class="container">
        <br />
        <h3 align = 'center'>Codeigniter Form validation using Ajax JSON</h3>
        <br />
        <div class="row">
            <div class="col-md-4"></div>        
            <div class='col-md-4'>
                <span id="success_message"></span>
                <form method='post' id='contact_form'>
                    <div class='form-group'>
                        <input type='text' name='name' id='name' class='form-control' placeholder='Name'>
                        <span id='name_error' class='text-danger'></span>
                    </div>
                    <div class='form-group'>
                        <input type='text' name='email' id='email' class='form-control' placeholder='Email Address'>
                        <span id='email_error' class='text-danger'></span>
                    </div>
                    <div class='form-group'>
                        <input type='text' name='subject' id='subject' class='form-control' placeholder='Subject'>
                        <span id='subject_error' class='text-danger'></span>
                    </div>
                    <div class='form-group'>
                        <textarea name='message' id='message' class='form-control' placeholder='Message' row='6'></textarea>
                        <span id='message_error' class='text-danger'></span>
                    </div>
                    <div class='form-group'>
                        <input type='submit' name='contact' id='contact' class='btn btn-info' value='Contact Us'> 
                    </div>
                </form>
            </div>
            <div class='col-md-4'></div>
        </div>
    </div>
</body>
</html>
<script>
$(document).ready(function(){

    $('#contact_form').on('submit',function(event){
        event.preventDefault();
        $.ajax({
            url:"<?php echo base_url(); ?>form_validation/validation",
            method:'POST',
            data:$(this).serialize(),
            dataType:'json',
            beforeSend:function(){
                $('#contact').attr('disabled','disabled');
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
                    if(data.email_error != '')
                    {
                        $('#email_error').html(data.email_error);
                    }
                    else
                    {
                        $('#email_error').html('');
                    }
                    if(data.subject_error != '')
                    {
                        $('#subject_error').html(data.subject_error);
                    }
                    else
                    {
                        $('#subject_error').html('');
                    }
                    if(data.message_error != '')
                    {
                        $('#message_error').html(data.message_error);
                    }
                    else
                    {
                        $('#message_error').html('');
                    }
                }
                if(data.success)
                {
                    $('#success_message').html(data.success);
                    $('#name_error').html('');
                    $('#email_error').html('');
                    $('#subject_error').html('');
                    $('#message_error').html('');
                    $('#contact_form')[0].reset();
                }
                $('#contact').attr('disabled',false);
            }
        })
    });
});


</script>