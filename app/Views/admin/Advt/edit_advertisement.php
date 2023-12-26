

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="<?php echo base_url(PUBLIC_FOLDER.'/richtexteditor/rte_theme_default.css'); ?>"/>  



<script type="text/javascript"  src="<?php echo base_url(PUBLIC_FOLDER.'/richtexteditor/rte.js');?>"></script>  
<script type="text/javascript" src="<?php echo base_url(PUBLIC_FOLDER.'/richtexteditor/plugins/all_plugins.js');?>"></script> 
</head>
<body>
<div class="page-content adj">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12">
                            <h4 class="mb-4">Edit Advertisement</h4>
                            <form class="custom-validation" method='post' action="<?php echo site_url('Essentials/UpdateDataAdvertisementStore');?>"
                                enctype='multipart/form-data'>
                                <?php echo view('admin/_topmessage'); ?>
                                <div class="row  form-group">

                                    
                                    <div class="col-lg-4 ">
                                    <label style="font-size:16px;">Advertisement Name</label>
                                       <input type="text" name="adt_name" required placeholder="Advertisement Name" style="font-size:12px;" class="form-control form-control-lg" value="<?php echo isset($edit_advertisement['adt_name'])? $edit_advertisement['adt_name']: '';?>">
                                   
                                    </div>
                                    

                                    <div class="col-lg-4 ">
                                       
                                        <label style="font-size:16px;">Upload Advertisment</label>
                                        <input type="file" name="adt_file" placeholder=" Enter Service" style="font-size:12px;"  class="form-control form-control-lg" onchange="readURL(this);" accept=".png, .jpg, .jpeg">
                                        <br>
                                        <img id="blah" src="<?php echo isset($edit_advertisement['adt_file']) ?  base_url('uploads/essential/'.$edit_advertisement['adt_file']):'';?>"  width="200" height="150"/> 
                                    </div>
                                </div> 
                               
 
                                <div class="row  form-group">
                                    <div class="col-lg-4">  
                                        <input type="hidden" name="ad_id"  value="<?php echo isset($edit_advertisement['ad_id'])?$edit_advertisement['ad_id']:'';?>">                             
                                        <button type="submit" style="font-size:16px;"
                                            class="btn btn-lg btn-block btn-primary waves-effect waves-light mr-1">
                                            Update
                                        </button>
                                     </div>
                                     <div class="col-lg-4 ">
                                        <a href="<?php echo site_url('viewAdvt');?>"
                                           style="font-size:16px;" class="btn btn-lg btn-block btn-secondary waves-effect">Back
                                       </a>
                                   </div>
                                </div> 

                                      
                                </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- container-fluid -->
</div>

<script type="text/javascript">
    
   $(".image-box").click(function(event) {
   var previewImg = $(this).children("img");
   
   $(this)
       .siblings()
       .children("input")
       .trigger("click");
   
   $(this)
       .siblings()
       .children("input")
       .change(function() {
           var reader = new FileReader();
   
           reader.onload = function(e) {
               var urll = e.target.result;
               $(previewImg).attr("src", urll);
               previewImg.parent().css("background", "transparent");
               previewImg.show();
               previewImg.siblings("p").hide();
           };
           reader.readAsDataURL(this.files[0]);
       });
   });
 
</script>
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );

  function readURL(input, id) {
    id = id || '#blah';
    if (input.files && input.files[0]) {
        var reader = new FileReader();
 
        reader.onload = function (e) {
            $(id)
                    .attr('src', e.target.result)
                    .width(200)
                    .height(150);
        };
 
        reader.readAsDataURL(input.files[0]);
    }
 }

 

</script>

</body>
</html>

 
 



<!-- End Page-content -->



