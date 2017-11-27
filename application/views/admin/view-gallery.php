<?php
include'header.php';
?>

            <div class="col-md-8" style='background-color:#f8f8f8;margin-top:70px'>
               <div class="row ">
                  <div class="col-md-12" >
                     
                     <div class="col-md-12">
                        <h4 class ="head_gst">Gallery</h4>
                        <div class="row div-minheight">
                            
                        <div class="col-lg-12 cart-box div-minheight">
                            
                         <div class="table-responsive">
                            <table class="table table-bordered gst-tbl">
                                <thead>
                                    <tr class='tbl-th'>
                                        <th><center>Sno</center></th>
                                        <th><center><a>name</a></center></th>
                                        <th><center>image</center></th>
                                        <th><center>video</center></th>
                                        <th><center>Action</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = count(array_filter((array)$result) > 0) ;
                                    if($count > 0) {
                                        $i=0;
                                        foreach($result as $row){
                                            $i++;
                                        ?>
                                   
                                            <tr>
                                                <td><?php echo $i; ?></td> 
                                                <td><?php echo $row->title; ?></td>
                                                <td><img src='./uploads/<?php echo $row->image; ?>' width='75' height='75'></td>
                                                <td>
                                              
                                                    <video width="200" height="150" controls>
                                                    <source src='./uploads/<?php echo $row->image; ?>' type="video/mp4">
                                                    <source src='./uploads/<?php echo $row->video; ?>' type="video/ogg">
                                                    Your browser does not support the video tag.
                                                    </video>
                                                
                                                </td>
                                                <td>
                                                <ul class="social-icons icon-circle icon-rotate list-unstyled list-inline"> 
                                                        <li> <a><i class="fa fa-pencil"></i></a> </li> 
                                                        <li> <a href="<?php echo base_url() ?>/admin/deleteGallery/<?php echo $row->id ;?>" style='cursor:pointer'><i class="fa fa-times"></i></a></li> 
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
    