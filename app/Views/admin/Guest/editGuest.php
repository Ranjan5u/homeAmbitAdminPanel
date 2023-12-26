<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
   
  </head>
   <style type="text/css">
        .user {
          display: inline-block;
          width: 150px;
          height: 150px;
          border-radius: 50%;

          object-fit: cover;
}
    </style>
<body>
<div class="page-content adj">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="col-12">

                          

                             <div class="row align-items-center">


                <div class="col-sm-6">
                    <div class="page-title-box">
                        <h4 class="font-size-18" style="margin-left: 20px;"><?php echo $pagetitle; ?></h4>
                    </div>
                </div>
            


                
            </div>
                       <form class="custom-validation" onsubmit="return validationForm()" method='post' action="<?php echo site_url('GuestController/updateDataGuest');?>"
                                enctype='multipart/form-data'>
                                <?php echo view('admin/_topmessage'); ?>
                                 <div class="row form-group">
                                       <div class="col-lg-4">
                                        <h5 class="text-center headercolor">Image File</h5>
                                         <div class="col-ting">
                                            <div class="control-group file-upload" id="file-upload1">
                                               <div class="image-box text-center">
                                                  <!-- <p>Upload Image</p> -->
                                                  <img src="<?php echo isset($editGuest['file_image']) ?  base_url('uploads/essential/'.$editGuest['file_image']):'';?>"  width="100" height="100" id="display_image_here">
                                               </div>
                                               <div class="controls" style="display: none;">
                                                  <input type="file" accept="image/*"  name="file_image">
                                               </div>
                                            </div>
                                         </div>

                                    </div>

                                </div>

                                <div class="row  form-group">

                                    <div class="col-lg-4 ">
                                    <label style="font-size:12px;">Name</label>
                                          <input type="text" name="name" placeholder="Enter Name" style="font-size:12px;" class="form-control form-control-lg"  value="<?php echo $editGuest['name']?>">   
                                          <span id = "usernametenat" style="color:red;"> </span>

                                    </div>

                                    <div class="col-lg-4 ">
                                       
                                        <label style="font-size:12px;">Mobile</label>
                                         <input type="number" name="mobile"  placeholder="Enter Mobile" style="font-size:12px;" class="form-control form-control-lg" value="<?php echo $editGuest['mobile']?>"> 
                                        
                                    </div>

                                  
                                </div> 
                                 
                                    <div class="row  form-group">
                                           <div class="col-lg-4 ">
                                    <label style="font-size:12px;">Email</label>
                                          <input type="email" name="email"  placeholder="Enter Email" style="font-size:12px;" class="form-control form-control-lg" value="<?php echo $editGuest['email']?>">     

                                    </div>


                                       <div class="col-lg-4">
                                                <label style="font-size: 12px;">Address</label>
                                                <input type="text" style="font-size:12px;" name="address" placeholder="Enter Address" class="form-control form-control-lg" value="<?php echo $editGuest['address']?>">

                                        </div>
                                    
                                </div> 
                            <div class="row  form-group">
                                <div class="col-lg-4 ">
                                <label style="font-size:12px;">Status</label>
                                                       
                                  <select name="status" class="form-control">
                                 <option value="Active" <?php echo (isset($editGuest) && !empty($editGuest) && $editGuest['status']=='Active') ? 'selected' : ''; ?>>Active</option>
                                                                
                                 <option value="In Active" <?php echo (isset($editGuest) && !empty($editGuest) && $editGuest['status']=='In Active') ? 'selected' : ''; ?>>In Active</option>
                                     </div>
                                    </select>
                                </div>
                                </div> 

                                  
                                
                                
                                <div class="row  form-group">
                                    <div class="col-lg-4">  
                                           <input type="hidden" value="guest" name="type">

                                            <input type="hidden" name="id" value="<?php echo isset($editGuest['id'])?$editGuest['id']:'';?>">                      

                                        <button type="submit" style="font-size:16px;"
                                            class="btn btn-lg btn-block btn-primary waves-effect waves-light mr-1">
                                            Submit
                                        </button>

                                     </div>
                                     <div class="col-lg-4 ">
                                        <a href="<?php echo site_url('guest')?>"
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
    function validationForm(){
       
         var visitorpass1 = document.getElementById("visitorpassword1").value;  
         var visitorpass2 = document.getElementById("visitorpassword2").value;  

      


     if(visitorpass1 == "") {  
      document.getElementById("displayComments1").innerHTML = "**Fill the password please!";  
      return false;  
    }  
    
    
    if(visitorpass2 == "") {  
      document.getElementById("displayComments2").innerHTML = "**Enter the password please!";  
      return false;  
    }  

     //minimum password length validation  
    if(visitorpass1.length < 5) {  
      document.getElementById("displayComments1").innerHTML = "**Password length must be atleast 5 characters";  
      return false;  
    }  
  
    //maximum length of password validation  
    if(visitorpass1.length > 15) {  
      document.getElementById("displayComments1").innerHTML = "**Password length must not exceed 15 characters";  
      return false;  
    }  
    
    if(visitorpass1 != visitorpass2) {  
      document.getElementById("displayComments2").innerHTML = "**Passwords are not same";  
      return false;  
    }    

    }


</script>
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

</body>
</html>

 
 



<!-- End Page-content -->



