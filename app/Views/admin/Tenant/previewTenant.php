   <?php if($previewTenant): ?>
<?php foreach ($previewTenant as $value):?>
   
<?php endforeach;?>
<?php endif;?>

<style type="text/css">
    .card{
        border-radius: 2.75rem!important;
    }
    td ,th{
    width: 30%;
    }
</style>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12">

                   

                    <div class="container-fluid">
            <div class="row">
               <div class="col-md-12">
                   <h2 class="mt-6 font-weight-semibold">Tenant Details</h2> 
                  <table class="table table-striped table-bordered m-top20">
                     <tbody>
                         <tr>
                            <th class="text-center">Profile Image</th>
                           <th class="text-center">Tenant Name</th>
                           <th class="text-center">Tenant Email</th>
                           <th class="text-center">Tenant Mobile</th>
                        </tr>

                        <tr>
                             <td class="text-center"><img src="<?php echo base_url('uploads/essential/'.$value['pro_image'])?> " style="height:109px;" ></td>
                           <td class="text-center"><?php echo $value['name']; ?></td>
                           
                           
                           <td class="text-center"><?php echo $value['email']; ?></td>
                       
                           
                           <td class="text-center"><?php echo $value['mobile']; ?></td>
                                                
                        
                        </tr>

                     </tbody>


                  </table>
                  <table class="table table-striped table-bordered m-top20">
                     <tbody>
                         <tr>
                            <th class="text-center">Present Address</th>
                           <th class="text-center">Permanent Address</th>
                          
                        </tr>

                        <tr>
                             
                           
                           <td class="text-center"><?php echo $value['present_address']; ?></td>
                       
                           
                           <td class="text-center"><?php echo $value['permanent_address']; ?></td>
                                                
                        
                        </tr>

                     </tbody>


                  </table>
              </div>
          </div>
           <div class="row">
                  <div class="col-md-12">
                   
                  <div class="row">
                  <div class="col-md-12">
                   <h2 class="mt-6 font-weight-semibold">Tenant Property Details</h2> 
                  <table class="table table-striped table-bordered ">
                     <tbody>
                        
                         <tr>
                           <th scope="row">Owner Name</th>
                           <td class="text-left"><?php echo $value['oname'];?></td>
                        </tr>

                         <tr>
                           <th scope="row">Property Name</th>
                           <td class="text-left"><?php echo $value['ten_property_name'];?></td>
                        </tr>
                       
                        <tr>
                           <th scope="row">Register Property Address</th>
                          <td class="text-left"><?php echo $value['register_property_add']; ?></td>
                        </tr>
                         <tr>
                           <th scope="row">Register Number</th>
                          <td class="text-left"><?php echo $value['registration_number']; ?></td>
                        </tr>
                        
                        <tr>
                           <th scope="row">Pincode</th>
                          <td class="text-left"><?php echo $value['pincode']; ?></td>
                        </tr>
                         <tr>
                           <th scope="row">State</th>
                          <td class="text-left"><?php echo $value['state']; ?></td>
                        </tr>
                        <tr>
                           <th scope="row">City</th>
                          <td class="text-left"><?php echo $value['city']; ?></td>
                        </tr>


                          </tbody>


                  </table>


                  <div class="row">
                  <div class="col-md-12">
                   <h2 class="mt-6 font-weight-semibold">Tenant Rent Details</h2> 
                  <table class="table table-striped table-bordered ">
                     <tbody>

                         <tr>
                           <th scope="row">Rent Date</th>
                           <td class="text-left"><?php echo $value['ten_rent_date'];?></td>
                        </tr>
                        <tr>
                            </tr><tr>
                           <th scope="row">Rent Duration</th>
                           <td class="text-left"><?php echo $value['ten_rent_duration'];?></td>
                        </tr>
                        <tr>
                           <th scope="row">Renewed Date</th>
                          <td class="text-left"><?php echo $value['ten_renewed_date']; ?></td>
                        </tr>
                         <tr>
                           <th scope="row">Rent Start Date</th>
                          <td class="text-left"><?php echo $value['ten_start_date']; ?></td>
                        </tr>
                         <tr>
                           <th scope="row">Rent End Start</th>
                          <td class="text-left"><?php echo $value['ten_end_date']; ?></td>
                        </tr>
 
                          </tbody>


                  </table>



                   <div class="row">

                          <div class="col-md-12">
                   <h2 class="mt-6 font-weight-semibold">Device Details</h2> 
                  <table class="table table-striped table-bordered ">
                     <tbody>
                        
                   

                       
                          <tr>
                           <th scope="row">App Installation Date</th>
                          <td class="text-left"><?php echo $value['app_installation_date']; ?></td>
                        </tr>
                        <tr>
                           <th scope="row">App Installation Latitude</th>
                          <td class="text-left"><?php echo $value['app_installation_latitude']; ?></td>
                        </tr>
                        <tr>
                           <th scope="row">App Installation Longitude</th>
                          <td class="text-left"><?php echo $value['app_installation_lognitute']; ?></td>
                        </tr>
                          <tr>
                           <th scope="row">Device Name</th>
                          <td class="text-left"><?php echo $value['device_name']; ?></td>
                        </tr>
                         </tr>
                          <tr>
                           <th scope="row">Device IMEI</th>
                          <td class="text-left"><?php echo $value['device_imei']; ?></td>
                        </tr>
                         <tr>
                           <th scope="row">Installation Address</th>
                          <td class="text-left"><?php echo $value['installation_address']; ?></td>
                        </tr>
                   


                        
                     </tbody>
                  </table>
                
               </div>
                   <a href="<?php echo site_url('viewTenant') ?>" class="btn btn-primary w-100" >Back</a>
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
<!-- End Page-content -->


                        
                     
                    