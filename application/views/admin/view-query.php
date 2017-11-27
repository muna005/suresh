<?php
include'header.php';
?>

            <div class="col-md-8" style='background-color:#f8f8f8;margin-top:70px'>
               <div class="row ">
                  <div class="col-md-12" >
                     
                     <div class="col-md-12">
                        <h4 class ="head_gst">Query Detail</h4>
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
                                        <th><center><a>Question</a></center></th>
                                        <th><center>Answer</center></th>
                                        <th><center>Query By</center></th>
                                        <th><center>Response By</center></th>
                                        <th><center>Query Time</center></th>
                                        <th><center>Response Time</center></th>
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
                                        <td><?php echo $i ; ?></td>  
                                        <td><?php echo $row->question ; ?></td>
                                                                      
                                        <td> <textarea  readonly='true' rows='50' cols='50'><?php echo $row->answer ; ?></textarea></td> 
                                        <td><?php echo $row->query_by ; ?></td>
                                        <td><?php echo $row->response_by ; ?></td>
                                        <td><?php echo $row->query_time ; ?></td>
                                        <td><?php echo $row->response_time ; ?></td>

                                        <td>
                                        <!--
                                           <ul class="social-icons icon-circle icon-rotate list-unstyled list-inline"> 
                                                <li> <a><i class="fa fa-pencil"></i></a> </li> 
                                                <li> <a><i class="fa fa-eye"></i></a> </li> 
                                                <li > <a style='cursor:pointer'  > <i class="fa fa-check" aria-hidden="true"></i></a></li> 
                                                <li> <a style='cursor:pointer'><i class="fa fa-trash"></i></a></li> 
                                            </ul>	
                                        -->    				
                                        </td>
                                        
                                    </tr>
                                     <?php
                                      }
                                    }
                                    else{
                                        echo "<tr><td colspan='5'> no records founds </td></tr>";
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
    