<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Panel</title>
        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        
        
<?php
include'header.html';
?>
      <div class="container-fluid container-margin">
         <div class="row row-height">
            <div class="col-md-3" style="margin-right:0px;padding-right:0px;background-color:#f8f8f8;">
                <?php
                include'menubar.html';
                ?>
            </div>
            <div class="col-md-8" style='background-color:#f8f8f8'>
               <div class="row ">
                  <div class="col-md-12" >
                     
                     <div class="col-md-12">
                        <h4 class ="head_gst">Emploies Detail</h4>
                        <div class="row div-minheight">
                            <div class="col-md-12" style='margin-bottom:10px;padding-left:0;margin-left:0px'>
                                <div class='col-md-4 pull-left'><input type='text' placeholder="Search" class='form-control' ng-model="query"></div>
                            </div>
                        <div class="col-lg-12 cart-box div-minheight">
                            <div class="alert alert-success fade in" ng-if="sussmsg">
                                  record sucessfully Disactive
                            </div>
                         <div class="table-responsive">
                            <table class="table table-bordered gst-tbl">
                                <thead>
                                    <tr>
                                        <th><center>Sno</center></th>
                                        <th><center><a>Name</a></center></th>
                                        <th><center>EmpId</center></th>
                                        <th><center>Email</center></th>
                                        <th><center>Mobile</center></th>
                                        <th><center>Action</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>  
                                        <td>sudha</td>
                                        <td>4152 </td>
                                        <td>sudha@gmail.com</td>                                
                                        <td>7416842094 </td> 
                                        <td>
                                           <ul class="social-icons icon-circle icon-rotate list-unstyled list-inline"> 
                                                <li> <a><i class="fa fa-pencil"></i></a> </li> 
                                                <li> <a><i class="fa fa-eye"></i></a> </li> 
                                                <li > <a style='cursor:pointer'  > <i class="fa fa-check" aria-hidden="true"></i></a></li> 
                                                <li> <a style='cursor:pointer'><i class="fa fa-trash"></i></a></li> 
                                            </ul>					
                                        </td>
                                        
                                    </tr>
                                     
                                  </tbody>
                            </table>
                        </div> 
                        </div>
                    </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

      </div>
    <?php  
    include'footer.html';
    ?>
     <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>

        
    </body>

</html>