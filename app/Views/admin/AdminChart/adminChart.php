<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="jquery-3.6.1.min.js"></script>
<div class="page-content">



    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="page-title-box">
                <h4 class="font-size-20" style="margin-left: 109px;">Chat Owner </h4>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="float-right d-none d-md-block">
                <div class="dropdown">
                    <a href="<?php echo site_url('chatOwner');?>" class="btn btn-secondary waves-effect waves-light" style="background-color:#FF5151;">
                        <i class="ion ion-md-arrow-back" ></i> Back
                    </a>

                </div>
            </div>
        </div>
    </div>



<div class="container">

 <div class="row">
<div class="col-xl-12">
<div class="card">
                    <?php echo view('admin/_topmessage'); ?>
   <div class="tab-content">
<div id="home" class="container tab-pane active">
 <div class="card-body">
                          
  <div class="card">
   <div class="card-body">
<div class="chat-conversation">
<ul class="conversation-list" data-simplebar="init" style="max-height: 367px;">
<div class="simplebar-wrapper" style="margin: 0px -10px;">
<div class="simplebar-height-auto-observer-wrapper">
    <div class="simplebar-height-auto-observer"> 
    </div>
    </div>
 <div class="simplebar-mask" id="messages">
     <div class="simplebar-offset" style="right: -20px; bottom: 0px;">
        <div class="simplebar-content-wrapper" style="height: auto; padding-right: 20px; padding-bottom: 0px; overflow: hidden scroll;background-color:#fff;">
        <div class="simplebar-content" style="padding: 0px 10px;" id="chatlist">
                                                                        
                <?php foreach ($datashowalladminowner as $kdata) { ?>

                 <?php if ($kdata['who_send'] == 'owner') { ?>                
                <li class="clearfix">
                         <div class="chat-avatar w-sm">
                         <span class="user-name font-weight-bold">
                         
                            
                            </span><br>
                             </div>
                            <div class="conversation-text" class="message">
                                         <div class="ctext-wrap">
                                 <span class="user-name">
                                    <?php echo $kdata['date']; ?></span>
                <p> <?php echo $kdata['admin_chat_description']; ?></p></div></div>
                </li>
                    <?php } else if ($kdata['who_send'] == 'admin') { ?>

                            <li class="clearfix odd">
                            <div class="chat-avatar w-sm">
            <span class="user-name font-weight-bold">Admin</span>
        <span class="time"><?php //echo $kdata->created_date;   ?></span>
                                                                    </div>
                 <div class="conversation-text" class="message">
                 <div class="ctext-wrap">
            <span class="user-name"><?php echo $kdata['date']; ?></span>
                                     <p>
                                                 <?php echo $kdata['admin_chat_description']; ?>
                                                                        </p>
                                                                            </div>
                                                                                    </div>
                                                                                </li>

                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                               
                                                                       
                                                                    </div>
                                                                    
            
                                                                </div>
                                                            </div>
                                                        </div>
                 <div class="simplebar-placeholder" style="width: auto; height: 480px;"></div>

                                         </div>
            <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
        <div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;"></div>

                                                    </div>
             <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                        <div class="simplebar-scrollbar" style="height: 292px; transform: translate3d(0px, 74px, 0px); display: block;"></div>

                                                    </div>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
   
         

                    <div class="row">
                             <div class="col-lg-12">
                           <form action="<?php echo site_url('adminChartSynchronous');?>" method="post"  enctype='multipart/form-data' class="msger-inputarea">
                                <textarea type="text" name="admin_chat_description" rows="1" class="form-control" placeholder="Enter your message..."></textarea> 
                                
                                 <input type="hidden" name="owner_id" value="<?php echo isset($owner_uid)?$owner_uid:'';?>">
                                       
                                   <input type="hidden" name="admin_id" value="<?php echo isset($admin_aid)?$admin_aid:'';?>">

                                     
                                    <button type="submit" id="btm" class="btn btn-success waves-effect waves-light mr-1" >
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

<script>
    
  const messages = document.getElementById('messages');

function appendMessage() {
  const message = document.getElementsByClassName('message')[0];
  const newMessage = message.cloneNode(true);
  messages.appendChild(newMessage);
}

function getMessages() {
  // Prior to getting your messages.
  shouldScroll = messages.scrollTop + messages.clientHeight === messages.scrollHeight;
  /*
   * Get your messages, we'll just simulate it by appending a new one syncronously.
   */
  appendMessage();
  // After getting your messages.
  if (!shouldScroll) {
    scrollToBottom();
  }
}

function scrollToBottom() {
  messages.scrollTop = messages.scrollHeight;
}

scrollToBottom();

setInterval(getMessages, 100);
  

</script>