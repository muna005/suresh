<?php
include_once'header.php';
?>
         
                <div class="col-md-8" style='background-color:#f8f8f8;margin-top:70px'>
                   <div class="row">
                      <div class="col-md-12" >
                         
                         <div class="col-md-12">
                            <h4 class ="head_gst"> Add product  </h4>
                            <div class="row div-minheight">
                            <div class="col-lg-12 cart-box div-minheight">
                            <form method='POST' enctype="multipart/form-data" name="empForm" action="<?php echo base_url() ?>/addproduct/"> 
                                <?php
                                echo $this->session->flashdata('msg');
                                ?>
                               <div class="form-group">
                                  <label>Name <span class='start'>*</span> </label>
                                  <div class="input-group"> <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                     <input type="text" required="true" title="please Enter product name" class="form-control"  name="product_name"  placeholder="product name" required>
                                     
                                  </div>
                               </div>
                               <div class="form-group">
                                  <label>SKU Code<span class='start'>*</span> </label>
                                  <div class="input-group"> <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                     <input type="text" required="true" title="please Enter product code" class="form-control"   name="product_code"  placeholder="SKU Code" required>
                                  </div>
                                  
                               </div>
                               <div class="form-group">
                                  <label>price <span class='start'>*</span> </label>
                                  <div class="input-group"> <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                     <input required="true" title="please Enter product price"  type="number" class="form-control"    name="price" placeholder="price" required >
                                  </div>
                               </div>
                               
                                <div class="form-group">
                                  <label>detail <span class='start'>*</span> </label>
                                  <div class="input-group"> <span class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                                     <textarea required="true" title="please Enter product detail"  class="form-control" name='product_desc' ></textarea>
                                  </div>
                               </div>
                               
                                <center>
                                <input type="submit"  name="submit"   id="submit" value="Submit" class="btn btn-primary pull-center" style='margin-bottom:100px'>
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