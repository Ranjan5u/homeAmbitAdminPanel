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
                            <h4 class="mb-4"><?php echo $pagetitle;?></h4>

                       <form class="custom-validation" onsubmit="return validationForm()" method='post' action="<?php echo site_url('FeedBackController/updateDataFeedback');?>"
                                enctype='multipart/form-data'>
                                <?php echo view('admin/_topmessage'); ?>


                                <div class="row  form-group">

                                    <div class="col-lg-4 ">
                                    <label style="font-size:12px;">Phone</label>
                                          <input type="number" name="phone"  placeholder="Enter Email" style="font-size:12px;" class="form-control form-control-lg" value="<?php echo $editGuest['phone']?>"> 
                                        
                                    </div>

                                    <div class="col-lg-4 ">
                                       
                                        <label style="font-size:12px;">Email</label>
                                         <input type="text" name="email"  placeholder="Enter Email" style="font-size:12px;" class="form-control form-control-lg" value="<?php echo $editGuest['email']?>"> 
                                        
                                    </div>

                                  
                                </div> 
                                 
                                    <div class="row  form-group">
                                           <div class="col-lg-4 ">
                                    <label style="font-size:12px;">Title</label>
                                          <input type="text" name="title"  placeholder="Enter Title" style="font-size:12px;" class="form-control form-control-lg" value="<?php echo $editGuest['title']?>">     

                                    </div>


                                       <div class="col-lg-4">
                                                <label >Description</label>
                                                <textarea type="text"  name="description" placeholder="Enter Description" class="form-control form-control-lg" ><?php echo $editGuest['description']?></textarea> 

                                        </div>
                                    
                                </div> 

                                
                                <div class="row  form-group">
                                    <div class="col-lg-4">  

                                            <input type="hidden" name="id" value="<?php echo isset($editGuest['id'])?$editGuest['id']:'';?>">                      

                                        <button type="submit" style="font-size:16px;"
                                            class="btn btn-lg btn-block btn-primary waves-effect waves-light mr-1">
                                            Update
                                        </button>

                                     </div>
                                     <div class="col-lg-4 ">
                                        <a href="<?php echo site_url('feedbackUser')?>"
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



