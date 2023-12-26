
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<div class="page-content">



    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="page-title-box">
                <h4 class="font-size-20" style="margin-left: 109px;">Chat Details</h4>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="float-right d-none d-md-block">
                <div class="dropdown">
                    <a class="btn btn-secondary waves-effect waves-light" style="background-color:#FF5151;" href="<?php echo site_url('chatreport');?>">
                        <i class="ion ion-md-arrow-back" ></i> Back
                    </a>

                </div>
            </div>
        </div>
    </div>



<div class="container" >

 <div class="row">
<div class="col-xl-12">
<div class="card">
                    <?php echo view('admin/_topmessage'); ?>
   <div class="tab-content" >
<div id="home" class="container tab-pane active">
 <div class="card-body">



<ul class="conversation-list" data-simplebar="init" style="max-height: 367px;" >





<div class="simplebar-wrapper" id="messages" style="margin: 0px -10px;">



 <div class="simplebar-offset" style="right: -20px; bottom: 0px;">
<div class="simplebar-content-wrapper" style="height: auto; padding-right: 20px; padding-bottom: 0px; overflow: hidden scroll;background-color:#fff;">


<div class="simplebar-content message" style="padding: 0px 10px;">
                                                                        
<?php foreach ($bothDataChat as $kdata) { ?>

<?php if ($kdata['is_send_me'] == 'owner') { ?>                
 <li class="clearfix">
<div class="chat-avatar w-sm">
<span class="user-name font-weight-bold">
<?php echo $kdata['oname']; ?>
                             
</span><br>
</div>
 <div class="conversation-text">
  <div class="ctext-wrap">
  <span class="user-name">
 <?php echo $kdata['date']; ?></span>
  <p> <?php echo $kdata['chat_description']; ?></p></div></div>
 </li>
 <?php } else if ($kdata['is_send_me'] == 'tenant') { ?>

 <li class="clearfix odd">
<div class="chat-avatar w-sm">
<span class="user-name font-weight-bold"><?php echo $kdata['tname']; ?></span>
 <span class="time"><?php //echo $kdata->created_date;   ?></span>
</div>
<div class="conversation-text">
 <div class="ctext-wrap">
 <span class="user-name"><?php echo $kdata['date']; ?></span>
<p><?php echo $kdata['chat_description']; ?></p>
</div>
 </div>
</li>
<?php }?>
   <?php if ($kdata['is_send_me'] == 'admin') { ?>

     <li class="clearfix odd" >
    <div class="chat-avatar w-sm">
    <span class="user-name font-weight-bold">Admin <?php echo $kdata['name']; ?></span>
    <span class="time"></span>
    </div>
    <div class="conversation-text"  >
     <div class="ctext-wrap" >
   <span class="user-name"><?php echo $kdata['date'];?></span>
    <p><?php echo $kdata['chat_description']; ?></p>
 </div>
 </div>
  </li>
  
  <?php } ?>
   <?php } ?>
     </div>


 </div>
 </div>



  <div class="simplebar-placeholder" style="width: auto; height:1080px;"></div>
 </div>
 <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
 <div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;"></div>

</div>
 <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
 <div class="simplebar-scrollbar" style="height: 292px; transform: translate3d(0px, 74px, 0px); display: block;">
 </div>
  </div>
   </ul>



                         <div class="row">
                             <div class="col-lg-12">
                           <form action="<?php echo site_url('adminChatOwnerwithtenant');?>" method="post"  enctype='multipart/form-data' class="msger-inputarea">
                                <textarea type="text" name="chat_description" rows="1" class="form-control" placeholder="Enter your message..."></textarea> 
                                
                                 <input type="hidden" name="owner_id" value="<?php echo isset($owner_uid)?$owner_uid:'';?>">
                                       
                                  <input type="hidden" name="tenant_id" value="<?php echo isset($tenant_tid)?$tenant_tid:'';?>">


                                   <input type="hidden" name="admin_id" value="<?php echo isset($adminORSub)?$adminORSub:'';?>">
                                      <input type="hidden" name="is_send_me" value="admin">

  
                                    <button type="submit"  id="demo" onclick="myFunction()" class="btn btn-success waves-effect waves-light mr-1" >
                                        Submit
                                    </button>
                                           <a href=""  class="btn btn-success waves-effect waves-light mr-1">
                                         <i class="fa fa-refresh" ></i></a>
                   
                              </form>        
                            </div>

                        </div>

 </div>
 </div>                     
 </div>
 </div>
    </div>
        </div> 
    </div> 


</div>

