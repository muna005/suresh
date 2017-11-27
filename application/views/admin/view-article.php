<?php
include'header.php';
?>

            <div class="col-md-8" style='background-color:#f8f8f8;margin-top:70px'>
               <div class="row ">
                  <div class="col-md-12" >
                     
                     <div class="col-md-12">
                        <h4 class ="head_gst">Article Detail</h4>
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
                                        <th><center><a>title</a></center></th>
                                        <th><center>Detail</center></th>
                                        <th><center>Date</center></th>
                                        <th><center>Author</center></th>
                                        <th><center>Expire Date</center></th>
                                        <th><center>Action</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                     $count =count(array_filter((array)$result));            
                                     if($count > 0) {
                                        $index = 0 ;
                                        foreach($result as $row) {
                                            $index++ ;
                                    ?>
                                    <tr>
                                        <td><?php echo $index ; ?></td>  
                                        <td> <?php echo $row->title ; ?></td>
                                                                      
                                        <td> <textarea  readonly='true' rows='50' cols='50'><?php echo strip_tags($row->article_desc); ?></textarea></td> 
                                        <td><?php echo $row->created_date ; ?></td>
                                         <td><?php echo $row->author ; ?></td>
                                         <td><?php echo $row->exp_date ; ?></td>
                                        <td>
                                           <ul class="social-icons icon-circle icon-rotate list-unstyled list-inline"> 
                                                <li> <a href="<?php echo base_url() ?>admin/editArticle/<?php echo  $row->id; ?>"><i class="fa fa-pencil"></i></a> </li>         
                                                <?php
                                                if($row->status==0){
                                                ?>
                                                <li > <a style='cursor:pointer' href="<?php echo base_url() ?>/admin/changeStatus/<?php echo $row->id ; ?>" >  <i class="fa fa-check-circle"></i> </a></li> 
                                                <?php
                                                }
                                                else {
                                                ?>
                                                <li > <a style='cursor:pointer' href="<?php echo base_url() ?>/admin/changeStatus/<?php echo $row->id ; ?>" >  <i class="fa fa-trash-o"></i> </a></li> 
                                                <?php    
                                                }
                                                ?>
                                               
                                                <li> <a onclick="return confirm('Are you sure to delete this article ?')" href="<?php echo base_url() ?>admin/deleteArticle/<?php echo $row->id ; ?>" style='cursor:pointer'> <i class="fa fa-times" aria-hidden="true"></i></a></li> 
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
    