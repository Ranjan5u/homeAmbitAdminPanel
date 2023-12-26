<?php $session = session(); ?>


<div class="page-content">
    


        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <h4 class="font-size-20" style="margin-left: 107px;">Chat Reports</h4>
                </div>
            </div>
        </div>



        <div class="container">
           <div class="row">
        <form action="" id="adminsearch" >
            <div class="col-xl-12">
                   <?php echo view('admin/_topmessage'); ?>
                <div class="card">                  
                    <div class="card-body">                           
   
                        <div class="row ">                             
                            <div class="col-lg-3 ">
                                <div class="row">
                                    <label> Start Date </label>
                                    <div class="col-md-12">
                                        <input class="form-control" name="start_date" type="date" 
                                        value="<?php  echo isset($searchArray['start_date']) ? $searchArray['start_date'] : "" ?>" placeholder="Search by start date">
                                    </div>
                                </div>       
                            </div>                              

                            <div class="col-lg-3 ">
                                <div class="row">
                                    <label> End Date </label>
                                    <div class="col-md-12">
                                        <input class="form-control" name="end_date" type="date" value="<?php echo isset($searchArray['end_date']) ? $searchArray['end_date'] :''; ?>" placeholder="Search by end date">
                                    </div>
                                </div>       
                            </div>

                            <div class="col-lg-3 ">
                                <div class="row">
                                    <label> Owner Name </label>
                                    <div class="col-md-12">
                                        <select class="form-control" name="owner_id" id="owner_id" >

                                             <option value="">--Select Owner--</option>

                                       <?php
                                            foreach ($ownerDropdown as $row) { ?>
                                                <option value="<?php echo $row['owner_id'] ?>"  <?php echo   (isset($searchArray['owner_id']) &&  $searchArray['owner_id'] ==$row['owner_id']) ? "Selected" : ""; ?> ><?php echo $row['name']; ?></option>

                                            <?php } ?>

                                                </option>
                                        </select>  
                                    </div>
                                </div>       
                            </div>

                              <div class="col-lg-3 ">
                                <div class="row">
                                    <label> Tenant Name </label>
                                    <div class="col-md-12">
                                        <select class="form-control" name="tenant_id" id="tenant_id" >

                                             <option value="">--Select Tenant--</option>
                                
                                        </select>  
                                    </div>
                                </div>       
                            </div>
                            
                           
                            
                        </div><!-- first row end here--> <br />

                            

                      <div class="row ">
   

                            <div class="col-lg-1">
                                <div class="row">
                                </div><br />
                                <div class="col-md-2 text-right">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                        Submit
                                    </button>
                                </div>
                            </div>


                            <div class="col-lg-2">
                                <div class="row">
                                </div><br />
                                <div class="col-md-2">
                                    <a href="<?php echo site_url('chatreport'); ?>">
                                        <button type="button" class="btn btn-primary waves-effect waves-light mr-1">
                                            Refresh
                                        </button></a>
                                </div>
                            </div>

                        </div>                              
                    </div> 
                    
                   
                </div>
            </div>
        </form> 
    </div>

<ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active"  href="javascript::void(0);">Chat List</a>
                </li>
                
            </ul>
            <div class="row">

                <div class="col-xl-12">
                    <div class="card">
                        <?php echo view('admin/_topmessage'); ?>
                        <div class="tab-content">
                            <div id="home" class="container tab-pane active">
                                <div class="card-body">
                                      
                                    <div class="table-responsive">
                                        
                                            <table class="table table-striped table-centered table-nowrap mb-1">
                                                <thead>
                                                    <tr>
                                                       <th>SI. No.</th>
                                                        <th>Owner name</th>
                                                        <th>Tenant name</th>
                                                        
                                                        <th>Date & Time</th>
                                                        <th scope="col" width="10%">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                           
                                     <?php 
                                        foreach($chatAllData as $value)
                                        {?>

                                            <tr>
    
                                             <td class="text-center" ><?php echo ++$startLimit ;?></td>

                                            <td  class="text-center"><?php echo 'Ranjan';?></td>

                                              <td  class="text-center"><?php echo 'shyam';?></td>
                                          
                                              <td  class="text-center"><?php echo $value->date;?></td>
                                             <td  class="text-center" >
                                                     <a href="<?php echo site_url('chatReportController/viewChat/'.$value->cha_id);?>" class="btn btn-success btn-sm" title="preview" ><i class="fas fa-eye"></i></a>
                                                     &nbsp;&nbsp;&nbsp;
                                            
                                                
                                                 
                                            </td>
                                        </tr>


                                        <?php }?>

                                                    
                                                       
                                           
                                                </tbody>
                                            </table>
                                              
                                        
                                    </div>
                                       
                                 
                                </div>
                            </div>                      
                           
                            

                        </div>
                    </div>
                </div>
            </div> 
        </div> 


</div>
<!-- <script>
  $(document).ready(function () {

        $('#owner_id').change(function () {

            var ow = $('#owner_id').val();
         
            var action = 'get_tenant';
            if (ow != '')
            {
                $.ajax({
                    url: "<?php echo site_url('chatReportController/action'); ?>",

                    method: "POST",
                    data: {owner_id: ow, action: action},
                    dataType: "JSON",
                    success: function (data)
                    {
                        var html = '<option value="">Select Tenant</option>';

                        for (var count = 0; count < data.length; count++)
                        {
                            html += '<option value="' + data[count].tenant_id + '">' + data[count].name + '</option>';
                        }

                        $('#tenant_id').html(html);

                    }
                });
            } 
        });
});

</script> 
 -->