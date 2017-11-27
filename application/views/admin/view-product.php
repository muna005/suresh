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
                            <?php
                            echo $this->session->flashdata('msg');
                            ?>
                            <table class="table table-bordered gst-tbl">
                                <thead>
                                    <tr class='tbl-th'>
                                        <th><center>Sno</center></th>
                                        <th><center><a>product</a></center></th>
                                        <th><center>Sku Code</center></th>
                                        <th><center>Price</center></th>
                                        <th><center>Action</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                
                                    $count =count(array_filter((array)$result));            
                                    if($count > 0) {
                                        $i=0;
                                        foreach($result as $row) {
                                        $i++;    
                                    ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>  
                                                <td><?php echo $row->product_name; ?></td>
                                                <td><?php echo $row->product_code; ?> </td>
                                                <td><i class='fa fa-inr'></i><?php echo $row->price; ?></td>                                
                                                <td>
                                                <ul class="social-icons icon-circle icon-rotate list-unstyled list-inline"> 
                                                <ul class="social-icons icon-circle icon-rotate list-unstyled list-inline"> 
                                                <li> <a href="<?php echo base_url() ?>admin/editProduct/<?php echo  $row->id; ?>"><i class="fa fa-pencil"></i></a> </li>                                                     
                                                <li> <a onclick="return confirm('Are you sure to delete this product ?')" href="<?php echo base_url() ?>admin/deleteProduct/<?php echo $row->id ; ?>" style='cursor:pointer'> <i class="fa fa-times" aria-hidden="true"></i></a></li> 
                                            </ul>
                                                    </ul>					
                                                </td>
                                                
                                            </tr>
                                    <?php
                                        }
                                    } 
                                    else{
                                        echo"<tr><td colspan='5'>no records Found</td></tr>";
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
    