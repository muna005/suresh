<?php
include_once'header.php';
?>
         
                <div class="col-md-8" style='background-color:#f8f8f8;margin-top:70px'>
                   <div class="row">
                      <div class="col-md-12" >
                         
                         <div class="col-md-12">
                            <h4 class ="head_gst"> Add gallery  </h4>
                            <div class="row div-minheight">
                            <div class="col-lg-12 cart-box div-minheight">
                            <form method='POST' enctype="multipart/form-data" name="empForm" novalidate> 
                                <div class="alert alert-success fade in" ng-if="sussmsg">
                                                                   Detail Added successfully.
                                </div> 
                               <div class="form-group">
                                  <label>name <span class='start'>*</span> </label>
                                  <div class="input-group"> <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                     <input type="text" class="form-control"  name="pname"  placeholder="product name" required>
                                     
                                  </div>
                               </div>
                               <div class="form-group">
                                  <label>image<span class='start'>*</span> </label>
                                  <div class="input-group"> <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                     <input type="file" class="form-control"   name="image"  placeholder="image" required>
                                  </div>
                                  
                               </div>
                               <div class="form-group">
                                  <label>video <span class='start'>*</span> </label>
                                  <div class="input-group"> <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                     <input  type="number" class="form-control"    name="video" placeholder="video" required >
                                  </div>
                               </div>
                               
                                <div class="form-group">
                                  <label>detail <span class='start'>*</span> </label>
                                  <div class="input-group"> <span class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                                     <textarea  class="form-control ckeditor" name='detail' ></textarea>
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