<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
  <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.css">


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
                                        <input class="form-control" name="txtsearch" placeholder="Search By Phone/Email" type="text" value="<?php echo $txtsearch;?>">
                                    </div>
                                </div>
                            </div>
                           
                           
                            
                            
                            <div class="col-lg-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                        Submit
                                    </button>
                                    <a href="<?php echo site_url('feedbackUser');?>"><button type="button" class="btn btn-primary waves-effect waves-light mr-1"
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
                                <table  data-toggle="table" data-striped="true" class="table table-hover table-centered table-nowrap mb-0">
                                    <thead style="background-color:#95004D;">
                                        <tr>
                                            <th data-sortable="true" class="text-center" >S No.</th>
                                            <th data-sortable="true" class="text-center">Phone</th>
                                    
                                            <th data-sortable="true" class="text-center">Email</th>
  
                                           <th data-sortable="true" class="text-center">Title</th>
                                           <th data-sortable="true" class="text-center">Description</th>
                                            <th data-sortable="true" class="text-center">Created Date</th>
                                            <th class="text-center">Action</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody> 


                                        <?php 
                                        foreach($viewGuest as $value)
                                        {?>

                                            <tr>
    
                                             <td class="text-center" ><?php echo ++$startLimit ;?></td>

                                            <td  class="text-center"><?php echo $value->phone;?></td>

             
                                            <td  class="text-center"> <?php echo $value->email;?></td>
                                             <td  class="text-center"> <?php echo $value->title;?></td>
                                              <td  class="text-center"> <?php echo $value->description;?></td>
                                              <td  class="text-center"> <?php echo $value->date;?></td>
                                                <td  class="text-center" >
                                                     
                                                  <a href="<?php echo site_url('FeedBackController/edit_feedback/'.$value->id);?>" class="btn btn-primary btn-sm"  title="Edit"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                                                 
                                                  <a href="<?php echo site_url('FeedBackController/delete_feedback/'.$value->id);?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')" title="delete"><i class="fa fa-trash"></i></a>
                                                
                                                 
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
   
<script src="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>