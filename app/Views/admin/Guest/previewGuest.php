<?php foreach ($previewGuest as $value) {?>
   
<?php }?>

<div class="page-content adj">
    <div class="container-fluid">
            <div class="row">
               <div class="col-md-12">
                   <h2 class="mt-6 font-weight-semibold">Guest Details</h2> 
                  <table class="table table-striped table-bordered m-top20">
                     <tbody>
                         <tr>
                           <th scope="row">Name</th>
                           <td><?php echo $value['name']; ?></td>
                        </tr>
                         <tr>
                           <th scope="row">Mobile</th>
                           <td><?php echo $value['mobile']; ?></td>
                        </tr>
                        <tr>
                           <th scope="row">Email</th>
                           <td><?php echo $value['email']; ?></td>
                        </tr>
                         <tr>
                           <th scope="row">File Image</th>
                           <td><img  src="<?php echo base_url('uploads/essential/'.$value['file_image']);?>"  class="circular_image" style="width:100px;"></td>
                        </tr>
                         <tr>
                           <th scope="row">Address</th>
                           <td><?php echo $value['address']; ?></td>
                        </tr>
                        <tr>
                           <th scope="row">Created Date</th>
                           <td><?php echo $value['created_date']; ?></td>
                        </tr>
                       
                       
                     </tbody>
                  </table>
                  <a href="<?php echo site_url('guest') ?>" class="btn btn-primary w-100" style="width:100%;">Back</a>
               </div>
            </div>
   </div>
</div>
