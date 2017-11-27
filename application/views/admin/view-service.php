<?php
include'header.php';
?>

            <div class="col-md-8" style='background-color:#f8f8f8;margin-top:70px'>
               <div class="row ">
                  <div class="col-md-12" >
                     
                     <div class="col-md-12">
                        <h4 class ="head_gst">Service Detail</h4>
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
                                        <th><center><a>service</a></center></th>
                                        <th><center>Duration</center></th>
                                        <th><center>price</center></th>
                                        <th><center>created  Date</center></th>
                                        <th><center>updated  Date</center></th>
                                        <th><center>Action</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php        

                                    $count =count(array_filter((array)$result));            
                                    if($count > 0) {
                                        $i=0;
                                        foreach($result as $row){
                                            $i++; 
                                    ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>  
                                                <td><?php echo $row->service_name; ?></td>
                                                                            
                                                <td><?php echo $row->duration; ?> </td> 
                                                <td><?php echo $row->price; ?></td>
                                                <td><?php echo $row->created_by; ?></td>
                                                <td><?php echo $row->updated_by; ?></td>
                                                <td>
                                                <ul class="social-icons icon-circle icon-rotate list-unstyled list-inline"> 
                                                        <li> <a href="<?php echo base_url() ?>admin/editService/<?php echo $row->id ;?>"><i class="fa fa-pencil"></i></a> </li> 
                                                        <li> <a onclick="are you sure to delete ??" href="<?php echo base_url(); ?>/admin/deleteService/<?php echo $row->id ; ?>" style='cursor:pointer'><i class="fa fa-times"></i></a></li> 
                                                    </ul>					
                                                </td>
                                                
                                            </tr>
                                    <?php
                                        }
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
    