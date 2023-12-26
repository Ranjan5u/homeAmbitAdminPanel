<?php $session = session(); ?>
 <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.css">

<div class="page-content">
    


        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <h4 class="font-size-20" style="margin-left: 107px;">Chat Reports</h4>
                </div>
            </div>
        </div>


    <div class="container">
            <?php echo view('admin/chatreport/_searchformchat'); ?>
        
            <div class="row">

                <div class="col-xl-12">
                    <div class="card">
                        <?php echo view('admin/_topmessage'); ?>
                      
                                <div class="card-body">
                                    

                            
                                    <div class="table-responsive">
                                        
                                           <table  data-toggle="table" data-striped="true" class="table table-hover table-centered table-nowrap mb-0">
                                                <thead>
                                                    <tr>
                                                       <th data-sortable="true" class="text-center">SI. No.</th>
                                                        <th data-sortable="true" class="text-center">Owner name</th>
                                                        <th data-sortable="true" class="text-center">Tenant name</th>
                                                        <th data-sortable="true" class="text-center">Flat No</th>
                                                        <th data-sortable="true" class="text-center">Date & Time</th>
                                                        <th class="text-center" scope="col" width="10%">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                           
                                     <?php 
                                       $sess=$_SESSION['admin_id'];
                                        foreach($chatAllData as $value){?>

                                            <tr>
    
                                             <td class="text-center" ><?php echo ++$startLimit ;?></td>

                                            <td  class="text-center"><?php echo $value->name;?></td>

                                              <td  class="text-center"><?php echo $value->tname;?></td>
                                            
                                               <td  class="text-center"><?php echo $value->flat_no;?></td>
                                              <td  class="text-center"><?php echo $value->date;?></td>
                                             <td  class="text-center" >
                                                     <a href="<?php echo site_url('chat?owner_id=' . $value->owner_id."&tenant_id=".$value->tenant_id."&admin=".$sess);?>" class="btn btn-success" title="view chat" ><i class="fa fa-comments"></i></a>
    
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

<script src="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>