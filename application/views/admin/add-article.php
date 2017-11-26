<?php
include_once'header.php';
?>
         
                <div class="col-md-8" style='background-color:#f8f8f8;margin-top:70px'>
                   <div class="row">
                      <div class="col-md-12" >
                         
                         <div class="col-md-12">
                            <h4 class ="head_gst"> Add Article </h4>
                            <div class="row div-minheight">
                            <div class="col-lg-12 cart-box div-minheight">
                            <form method='POST' enctype="multipart/form-data" action="<?php echo base_url() ?>/addarticle"> 
                               <?php
                               echo $this->session->flashdata('msg');
                               ?>
                                <div class="form-group">
                                  <label>Title <span class='start'>*</span> </label>
                                  <div class="input-group"> <span class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                                     <input type='text'  class="form-control" name='title' >
                                  </div>
                               </div>
                                <div class="form-group">
                                  <label>Detail <span class='start'>*</span> </label>
                                  <div class="input-group"> <span class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                                     <textarea  class="form-control ckeditor" name='detail' ></textarea>
                                  </div>
                               </div>
                               <div class="form-group">
                                  <label>Author <span class='start'>*</span> </label>
                                  <div class="input-group"> <span class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                                     <select name='author' class="form-control" required='true'>
                                      <option>sudha</option>
                                      <otion>suresh </option>
                                     </select>
                                  </div>
                               </div>
                               <div class="form-group">
                                  <label>Expire Date <span class='start'>*</span> </label>
                                  <div class="input-group"> <span class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                                     <input type='text' id="datepicker-inline"  class="form-control" name='exp_date' required="true" >
                                  </div>
                               </div>
                               <center>
                                <input  type="submit"  name="submit"   id="submit" value="Submit" class="btn btn-primary pull-center" style='margin-bottom:100px'>
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