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
  <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">&nbps;</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown dashboard-account">
              <a  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hi sudha <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <!-- <li><a href="#">Dashboard</a></li> -->
                <li><a>Logout</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container-fluid container-margin">
             <div class="row row-height">
                <div class="col-md-3" style="margin-top:70px;margin-right:0px;padding-right:0px;background-color:#f8f8f8;">
                    <?php
                    include_once'menubar.php';
                    ?>
                    
    </div>