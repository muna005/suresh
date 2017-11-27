<?php
include_once'header.php';
?>
         
                <div class="col-md-8" style='background-color:#f8f8f8;margin-top:70px'>
                   <div class="row">
                      <div class="col-md-12" >
                         
                         <div class="col-md-12">
                            <h4 class ="head_gst"> Add Service </h4>
                            <div class="row div-minheight">
                            <div class="col-lg-12 cart-box div-minheight">
                            <form method='POST' enctype="multipart/form-data" name="empForm" action='<?php echo base_url() ?>/addservice'> 
                                <?php
                                echo $this->session->flashdata('msg');
                                ?>
                                <div class="form-group">
                                  <label>Name <span class='start'>*</span> </label>
                                  <div class="input-group"> <span class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                                     <input type='text'  class="form-control" name='service_name' >
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label>Duration <span class='start'>*</span> </label>
                                  <div class="input-group"> <span class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                                     <select name="duration" class='form-control'>
                                     <option value='15min'>15 min</option>
                                      <option value='1hr'>1 hr</option>
                                      <option value='2hr'>2 hr</option>
                                     </select>
                                  </div>
                               </div>
                               <div class="form-group">
                                  <label>Price <span class='start'>*</span> </label>
                                  <div class="input-group"> <span class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                                     <input type='number'  class="form-control" name='price' >
                                  </div>
                                </div> 
                               <center>
                                <input ng-if="submitbtn" type="submit"  name="submit"   id="submit" value="Submit" class="btn btn-primary pull-center" style='margin-bottom:100px'>
                               </center>
                            </form>
                            </div>
                        </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
        <?php
        include_once'footer.php';
        ?>