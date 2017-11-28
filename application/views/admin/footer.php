<footer class="footer">
      <div class="container">
        <span class="text-muted">©2017 company. All rights reserved.</span>
      </div>
</footer>
 <!-- Javascript -->
        <script src="https://vklps.com/suresh/assets/js/jquery-1.11.1.min.js"></script>
        <script src="https://vklps.com/suresh/assets/bootstrap/js/bootstrap.min.js"></script>

        <script src="https://vklps.com/suresh/assets/ckeditor/ckeditor.js"></script>
        <script src="https://vklps.com/suresh/assets/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <script>
        jQuery('#datepicker-inline').datepicker();
            jQuery('#datePost').datepicker({
              format: "dd-mm-yyyy",
                clearBtn: true,
                multidate: true,
                multidateSeparator: ","
            });
            jQuery('#date-range').datepicker({
                toggleActive: true
            });
            !function ($) {
    
    // Le left-menu sign
    /* for older jquery version
    $('#left ul.nav li.parent > a > span.sign').click(function () {
        $(this).find('i:first').toggleClass("icon-minus");
    }); */
    
    $(document).on("click","#left ul.nav li.parent > a > span.sign", function(){          
        $(this).find('i:first').toggleClass("icon-minus");      
    }); 
    
    // Open Le current menu
    $("#left ul.nav li.parent.active > a > span.sign").find('i:first').addClass("icon-minus");
    $("#left ul.nav li.current").parents('ul.children').addClass("in");

}(window.jQuery);
        </script>
		
		<script>
  $(function() {
	$(".image").change(function() 
		{
        var galType =$('#galtype').val();
        if(galType==1) {  
            var val = $(this).val();
            switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
            case 'jpeg': case 'jpg': case 'png': case 'gif':

            break;
            default:
            $(this).val('');
            // error message here
                alert('Please uploads only jpg,png,jpeg,gif,files');
            break;
            }
        }
        if(galType==2) {  
            var val2 = $(this).val();
            var val22 = val2.substring(val2.lastIndexOf('.') + 1).toLowerCase();
            switch(val22){
            case 'mp4': case 'flv': case 'mp3': case 'avi':
    
            break;
            default:
            $(this).val('');
            // error message here
                 alert('Please uploads only avi,mp3,flv,flv');
            break;
            }
            }
        }
});
  });
</script>


    </body>

</html>