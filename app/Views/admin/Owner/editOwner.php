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
                            <h4 class="mb-4">Edit Owner</h4>
                            <form class="custom-validation" onsubmit="return validationForm()" method='post' action="<?php echo site_url('OwnerController/updateDataOwner/');?>"
                                enctype='multipart/form-data'>
                                <?php echo view('admin/_topmessage'); ?>


                                <div class="row  form-group">

                                    <div class="col-lg-4 ">
                                    <label style="font-size:12px;">Name</label>
                                          <input type="text" name="name" placeholder="Enter Name" style="font-size:12px;" class="form-control form-control-lg"  value="<?php echo isset($editTenant['name'])? $editTenant['name']: '';?>" >   
                                          <span id = "usernametenat" style="color:red;"> </span>

                                    </div>

                                    <div class="col-lg-4 ">
                                       
                                        <label style="font-size:12px;">Mobile</label>
                                         <input type="number" name="mobile"  placeholder="Enter Mobile" style="font-size:12px;" class="form-control form-control-lg" value="<?php echo isset($editTenant['mobile'])? $editTenant['mobile']: '';?>" > 
                                        
                                    </div>

                                     <div class="col-lg-4 ">
                                    <label style="font-size:12px;">Email</label>
                                          <input type="text" name="email"  placeholder="Enter Email" style="font-size:12px;" class="form-control form-control-lg" value="<?php echo isset($editTenant['email'])? $editTenant['email']: '';?>">     

                                    </div>

                                </div> 
                                 
                                    <div class="row  form-group">

                                        <div class="col-lg-4">
                                                <label style="font-size: 12px;">Enter Flat No</label>
                                                <input type="number" style="font-size:12px;" name="flat_no" placeholder="Enter Flat No" class="form-control form-control-lg" value="<?php echo isset($editTenant['flat_no'])? $editTenant['flat_no']: '';?>">

                                        </div>
                                        <div class="col-lg-4">
                                                <label style="font-size:12px;">Permanent Address</label>
                                                 <textarea style="font-size:12px;"   name="permanent_address"   class="form-control" placeholder="Enter Permanent Address"><?php echo isset($editTenant['permanent_address'])? $editTenant['permanent_address']: '';?></textarea > 
                                        </div>
                                          <div class="col-lg-4">
                                         <label style="font-size: 12px;">Select Tenant</label>
                                         <select class="form-control" name="tenant_id">
                                         <option  value="" style="font-size:14px;">-- Select Tenant --</option>
                                 
                                  
                                       <?php if($tenDropdown): ?>
                                    <?php foreach($tenDropdown as $uti): ?>

                                          <option value="<?php echo $uti['tenant_id']; ?>" 
                                            <?php if($uti['tenant_id'] == $editTenant['tenant_id'])
                                          { echo 'selected';}?>>
                                            <?php echo $uti['name']?> 
                                        </option>


                                        <?php endforeach;?>
                                    <?php endif;?>
                                  </select>
                                        </div>

                                 
                                </div>



                                <div class="row  form-group">

                                      <div class="col-lg-4 ">
                                       
                                        <label style="font-size:12px;">Property Name</label>
                                         <input type="text"
                                          name="own_property_name" 
                                          placeholder="Enter Property Name" style="font-size:12px;" class="form-control form-control-lg" 
                                         value="<?php echo isset($editTenant['own_property_name'])? $editTenant['own_property_name']: '';?>"> 
                                        
                                    </div>


                                    <div class="col-lg-4 ">
                                       
                                        <label style="font-size:12px;">Project Name</label>
                                         <input type="text"
                                          name="own_project_name" 
                                          placeholder="Enter Project Name" style="font-size:12px;" class="form-control form-control-lg" 
                                         value="<?php echo isset($editTenant['own_project_name'])? $editTenant['own_project_name']: '';?>"> 
                                        
                                    </div>

                                     

                                 <div class="col-lg-4 ">

                                    <label style="font-size:12px;">Registration Property Address</label>
                                          <input type="text" name="register_property_add" 
                                          placeholder="Enter Registration Property Address" style="font-size:12px;" class="form-control form-control-lg" id="username" value="<?php echo isset($editTenant['register_property_add'])? $editTenant['register_property_add']: '';?>">   
                                        

                                    </div>

                                </div>
                                <div class="row  form-group">
                                      <div class="col-lg-4 ">
                                       
                                        <label style="font-size:12px;">Registration Number</label>
                                       
                                         <input type="number" name="registration_number"  
                                         placeholder="Enter Registeration Number" style="font-size:12px;" class="form-control form-control-lg" value="<?php echo isset($editTenant['registration_number'])? $editTenant['registration_number']: '';?>" > 
                                        
                                    </div>

                                   

                                      <div class="col-lg-4 ">
                                       
                                        <label style="font-size:12px;">Present Address</label>
                                         <input type="text"
                                          name="present_address" 
                                          placeholder="Enter Present Address" style="font-size:12px;" class="form-control form-control-lg" 
                                         value="<?php echo isset($editTenant['present_address'])? $editTenant['present_address']: '';?>"> 
                                        
                                    </div>
                                     <div class="col-lg-4 ">
                                    <label style="font-size:12px;">State</label>
                                          <input type="text" name="state"  placeholder="Enter State" style="font-size:12px;" class="form-control form-control-lg" value="<?php echo isset($editTenant['state'])? $editTenant['state']: '';?>">     

                                    </div>
                                </div>


                                <div class="row  form-group">
                                    
                                  
                                  <div class="col-lg-4 ">
                                       
                                        <label style="font-size:12px;">City</label>
                                         <input type="text" name="city"  placeholder="Enter city" style="font-size:12px;" class="form-control form-control-lg" value="<?php echo isset($editTenant['city'])? $editTenant['city']: '';?>"> 
                                        
                                    </div>

                                     <div class="col-lg-4 ">
                                    <label style="font-size:12px;">Pincode</label>
                                          <input type="number" name="pincode" placeholder="Enter Pincode" style="font-size:12px;" class="form-control form-control-lg" id="username" value="<?php echo isset($editTenant['pincode'])? $editTenant['pincode']: '';?>">   
                                          <span id = "usernametenat" style="color:red;"> </span>

                                    </div>
                                    <div class="col-lg-4 ">
                                        <h5 class="text-center headercolor"> Profile Image</h5>
                                         <div class="col-ting">
                                            <div class="control-group file-upload" id="file-upload1">
                                               <div class="image-box text-center">
                                                  <!-- <p>Upload Image</p> -->
                                                  <img style="height: 150px; width: 150px; border: 2px solid gray; " src="<?php echo isset($editTenant['profile_image'])? base_url('uploads/essential/'.$editTenant['profile_image']): '';?>">
                                               </div>
                                               <div class="controls" style="display: none;">
                                                  <input type="file" accept="image/*"  name="profile_image" value="<?php echo (isset($editTenant) && !empty($editTenant)) ? $editTenant['profile_image'] : ''; ?>" >
                                               </div>
                                            </div>
                                         </div>

                                    </div>
                                     
                                      

                                </div> 




                                  <div class="row form-group">
                                        <!-- <div class="col-lg-4">
                                                <label style="font-size: 12px;">Password</label>
                                                <input type="password" id="visitorpassword1" style="font-size:12px;" name="password" placeholder="Enter password" class="form-control form-control-lg" value="<?php echo isset($editTenant['password'])? $editTenant['password']: '';?>">
                                                 <span id="displayComments1" style="color:red"> </span>

                                        </div>
                                        <div class="col-lg-4">
                                                <label style="font-size:12px;">Re-Confirm Password</label>
                                                <input type="password" id="visitorpassword2" name="password" style="font-size:12px;"  class="form-control form-control-lg" placeholder="Confirm password" value="<?php echo isset($editTenant['password'])? $editTenant['password']: '';?>">
                                                <span id="displayComments2" style="color:red;"> </span>
                                        </div> -->


                                        

                                </div>
                                
                                <div class="row  form-group">
                                    <div class="col-lg-4"> 

                                         
                                         <input type="hidden" 
                                         name="owner_id"
                                          value="<?php echo isset($editTenant['owner_id'])? $editTenant['owner_id']:'';?>">
                                                                        
                                        <button type="submit" style="font-size:16px;"
                                            class="btn btn-lg btn-block btn-primary waves-effect waves-light mr-1">
                                            Update
                                        </button>
                                     </div>
                                     <div class="col-lg-4 ">
                                        <a href="<?php echo site_url('viewOwner')?>"
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



