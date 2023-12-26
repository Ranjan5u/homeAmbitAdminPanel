<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
 

<style type="text/css">

        table,td {
                table-layout: fixed;
              vertical-align: inherit;
              overflow: auto;
        }
      
       th{
            background-color: #FF5151;
            color: #fff;
            overflow: auto;
        }

        .mb-3{
         margin-left: 484px;
         margin-top: -15px;
     }
     </style>
  
    <div class="page-content">
        <div class="container-fluid">


            
            <div class="row align-items-center">


                <div class="col-sm-6">
                    <div class="page-title-box">
                        <h4 class="font-size-18" style="margin-left: 20px;"><?php echo $pagetitle; ?></h4>
                    </div>
                </div>
            
               
                
                

            </div>
         

<form action="" id="customersearch">
<div class="row">
    <div class="col-xl-12">
            <div class="card ">
                
                    <div class="card-body">

                        <div class="row ">

                            <div class="col-lg-4 ">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="form-control" name="txtsearch" placeholder="Search By Tenant Name" type="text" value="<?php echo $txtsearch;?>">
                                    </div>
                                </div>
                            </div>
                           
                           
                            
                            
                            <div class="col-lg-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                        Submit
                                    </button>
                                    <a href="<?php echo site_url('chatTenant');?>"><button type="button" class="btn btn-primary waves-effect waves-light mr-1"
                                     data-toggle="tooltip" data-placement="top" title=""
                                    data-original-title="Clear Search Filters">
                                    <i class="mdi mdi-refresh"></i>Clear
                                </button></a>

                                    
                                    </div>
                                </div>
                            </div>

                        </div>



                    </div>
            </div>
        </div>
</div>
</form> 


         <!--end  _searchform -->  

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <?php echo view('admin/_topmessage'); ?>
                        <div class="card-body">
                        
                            <?php if($pagination["getNbResults"] >0 ){ ?>
                         <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered table-nowrap" style="width:100% " id="livesearch">
                                    <thead style="background-color:#95004D;">
                                        <tr>
                                            <th class="text-center" >S No.</th>
                                            <th class="text-center">Tenant Name</th>
                                    
                                           
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody> 


                                        <?php 
                                            $sessiontenant=$_SESSION['admin_id'];
                                        foreach($viewtenantModel as $value)
                                        {?>
                                            <tr>
    
                                             <td class="text-center" ><?php echo ++$startLimit ;?></td>
                                            <td  class="text-center"><?php echo $value->name;?></td>
                                            <td  class="text-center" >
                                            <a href="<?php echo site_url('adminChatForTenant?tenant_id='.$value->tenant_id."&admin=".$sessiontenant);?>" class="btn btn-success btn-sm" title="Chat With This Tenant"><i class="fa fa-comments"></i></a>      
                                            </td>                                         
                                        </tr>
                                        <?php }?>    
                                    </tbody>
                                </table>
                              
                          <?php if ($pagination['haveToPaginate']) { ?>
                                <br>
                                <?php echo view('admin/_paging', array('paginate' => $pagination, 'siteurl' => $action, 'varExtra' => $searchArray)); ?>

                                <?php } ?>
                        </div>
                          <?php }else{ ?>
                            <?php echo view('admin/_noresult'); ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
            
        </div> <!-- container-fluid -->

    </div>
    
