<?php
include'header.php';
?>

            <div class="col-md-8" style='background-color:#f8f8f8;margin-top:70px'>
               <div class="row ">
                  <div class="col-md-12" >
                     <div class="col-md-12">
                        <h4 class ="head_gst">Product Detail</h4>
                        <div class="row div-minheight">
                            
                        <div class="col-lg-12 cart-box div-minheight">
                            
                         <div class="table-responsive">
                            <table class="table table-bordered gst-tbl">
                                <thead>
                                    <tr class='tbl-th'>
                                        <th><center>Sno</center></th>
                                        <th><center><a>Name</a></center></th>
                                        <th><center>email</center></th>
                                        <th><center>Mobile</center></th>
                                         <th><center>gender</center></th>
                                         <th><center>Dob</center></th>
                                        <th><center>Action</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if(count($result) > 0)
                                    {
                                        $index=0;
                                        foreach($result as $row)
                                        $index++;
                                    ?>  
                                        <tr>
                                            <td><?php echo $index ; ?></td>  
                                            <td><?php echo $row->fname ?> &nbsp;&nbsp; <?php echo $row->lname ?></td>
                                            <td><?php echo $row->email ?> </td>
                                            <td><?php echo $row->mobile ?></td>  
                                            <td><?php echo $row->gender ?></td> 
                                            <td><?php echo $row->date_of_birth; ?></td> 
                                            <td>
                                            <ul class="social-icons icon-circle icon-rotate list-unstyled list-inline"> 
                                                    <li> <a><i class="fa fa-pencil"></i></a> </li> 
                                                    <li> <a><i class="fa fa-eye"></i></a> </li> 
                                                    <li > <a style='cursor:pointer'  > <i class="fa fa-check" aria-hidden="true"></i></a></li> 
                                                    <li> <a style='cursor:pointer'><i class="fa fa-trash"></i></a></li> 
                                                </ul>					
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                    ?>     
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
    include'footer.php';
    ?>
    