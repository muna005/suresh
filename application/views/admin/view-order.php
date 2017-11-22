<?php
include'header.php';
?>

            <div class="col-md-8" style='background-color:#f8f8f8;margin-top:70px'>
               <div class="row ">
                  <div class="col-md-12" >
                     
                     <div class="col-md-12">
                        <h4 class ="head_gst">Order Detail</h4>
                        <div class="row div-minheight">
                            
                        <div class="col-lg-12 cart-box div-minheight">
                            
                         <div class="table-responsive">
                            <table class="table table-bordered gst-tbl">
                                <thead>
                                    <tr class='tbl-th'>
                                        <th><center>Sno</center></th>
                                        <th><center><a>OrderId</a></center></th>
                                         <th><center>User</center></th>
                                        <th><center>Payment Type</center></th>
                                        <th><center>Payment status</center></th>
                                         <th><center>price</center></th>
                                        <th><center>Action</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td> 
                                        <td>ORD123</td>
                                        <td>sudha005</td>
                                        <td>online</td>
                                        <td>paid</td>
                                         <td>Rs. 500.00</td>
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
    include'footer.php';
    ?>
    