<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Panel</title>
        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="https://vklps.com/suresh/assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://vklps.com/suresh/assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://vklps.com/suresh/assets/css/form-elements.css">
        <link rel="stylesheet" href="https://vklps.com/suresh/assets/css/style.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    </head>
    
    <body>
        <!-- Top content -->
        <div class="top-content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 form-box">
                    	<form role="form" action="<?php echo base_url() ?>login/" method="POST" class="f1">
                            <fieldset>
                                <h4><center>Admin</center></h4>
                                <?php
                                echo $this->session->flashdata('error_mesg');
                                ?>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-email">Username</label>
                                    <input type="text" name="username" placeholder="Email..."  required='required' class="f1-email form-control" id="f1-email">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-password">Password</label>
                                    <input type="password" name="password" placeholder="Password..." required='required'  class="f1-password form-control" 
                                     id="f1-password">
                                </div>
                                <div class="f1-buttons">
                                    <button type="submit" name='loginSubmit' class="btn btn-next pull-left">Submit</button>
                                </div>
                            </fieldset>
                    	</form>
                    </div>
                </div>
                    
            </div>
        </div>
        <!-- Javascript -->
        <script src="https://vklps.com/suresh/assets/js/jquery-1.11.1.min.js"></script>
        <script src="https://vklps.com/suresh/assets/bootstrap/js/bootstrap.min.js"></script>

        
    </body>

</html>