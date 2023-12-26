

<link rel="shortcut icon" href="<?php echo base_url(PUBLIC_FOLDER.'admin/css/app.css'); ?>">
<link rel="shortcut icon" href="<?php echo base_url(PUBLIC_FOLDER.'admin/css/custom.css'); ?>">
<?php $session = session(); 
$admin_type = $session->get('admin_type');
?>
<style type="text/css">
    #sidebar-menu{
        background-color: #FF5151; !important;
    }
    .simplebar-content-wrapper{
        background-color: #FF5151; !important; 
    }
    .bold{
          font-weight: 800;
          background: linear-gradient(to right, #fff, #fff 50%, #fff 50%);
          background-clip: text;
          -webkit-background-clip: text;
          -webkit-text-fill-color: transparent;
          background-size: 200% 100%;
          background-position: 100%;
          transition: background-position 275ms ease;

    }
    .bol-sub-menu{
      font-weight: 600 !important;  
    }
    

</style>


            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title"></li>

                            <li  style="border-bottom: 1px solid #5f6369">
                                <a  href="<?php echo site_url('dashboard'); ?>" class="waves-effect bold">
                                    <i class="ti-home"></i>
                                    <span >Dashboard</span>
                                </a>
                            </li>
                            

                                 <li style="border-bottom: 1px solid #5f6369" >
                                <a href="javascript: void(0);" class="has-arrow waves-effect bold" aria-expanded="false">
                                        <i class="fa fa-user-circle"></i>
                                        <span>Guest</span>
                                    </a>
                                    <ul class="sub-menu mm-collapse" aria-expanded="false" >
                                    <li class="bol-sub-menu" style="color:#ffffff;">
                                        <a href="<?php echo site_url('addguest'); ?>">Add Guest</a>
                                    </li>
                                        <li class="bol-sub-menu" style="border-bottom: 1px solid #5f6369">
                                        <a href="<?php echo site_url('guest'); ?>">View Guest</a>
                                    </li>   
                                    </ul>
                                </li>

                                  <li style="border-bottom: 1px solid #5f6369" >
                                <a href="javascript: void(0);" class="has-arrow waves-effect bold" aria-expanded="false">
                                        <i class="fa fa-building"></i>
                                        <span>
                                        Tenant</span>
                                    </a>
                                    <ul class="sub-menu mm-collapse" aria-expanded="false" >
                                    <li class="bol-sub-menu" style="color:#ffffff;">
                                        <a href="<?php echo site_url('addtenant'); ?>">Add Tenant</a>
                                    </li>
                                        <li class="bol-sub-menu" style="border-bottom: 1px solid #5f6369">
                                        <a href="<?php echo site_url('viewTenant'); ?>">View Tenant</a>
                                    </li>   
                                    </ul>
                                </li>

                                   <li style="border-bottom: 1px solid #5f6369" >
                                <a href="javascript: void(0);" class="has-arrow waves-effect bold" aria-expanded="false">
                                        <i class="fa fa-user"></i>
                                        <span>Owner</span>
                                    </a>
                                    <ul class="sub-menu mm-collapse" aria-expanded="false" >
                                    <li class="bol-sub-menu" style="color:#ffffff;">
                                        <a href="<?php echo site_url('addOwner'); ?>">Add Owner</a>
                                    </li>
                                        <li class="bol-sub-menu" style="border-bottom: 1px solid #5f6369">
                                        <a href="<?php echo site_url('viewOwner'); ?>">View Owner</a>
                                    </li>   
                                    </ul>
                                </li>

                                   <li style="border-bottom: 1px solid #5f6369" >
                                <a href="javascript: void(0);" class="has-arrow waves-effect bold" aria-expanded="false">
                                        <i class="fa fa-user"></i>
                                        <span>Employee</span>
                                    </a>
                                    <ul class="sub-menu mm-collapse" aria-expanded="false" >
                                    <li class="bol-sub-menu" style="color:#ffffff;">
                                        <a href="<?php echo site_url('addemployee'); ?>">Add Employee</a>
                                    </li>
                                        <li class="bol-sub-menu" style="border-bottom: 1px solid #5f6369">
                                        <a href="<?php echo site_url('viewemployee'); ?>">View Employee</a>
                                    </li>   
                                    </ul>
                                </li>

                                  <li style="border-bottom: 1px solid #5f6369" >
                                <a href="javascript: void(0);" class="has-arrow waves-effect bold" aria-expanded="false">
                                        <i class="fa fa-user"></i>
                                        <span>Client</span>
                                    </a>
                                    <ul class="sub-menu mm-collapse" aria-expanded="false" >
                                    <li class="bol-sub-menu" style="color:#ffffff;">
                                        <a href="<?php echo site_url('addclient'); ?>">Add Client</a>
                                    </li>
                                        <li class="bol-sub-menu" style="border-bottom: 1px solid #5f6369">
                                        <a href="<?php echo site_url('viewClient'); ?>">View Client</a>
                                    </li>   
                                    </ul>
                                </li>
                                     <?php $session=$_SESSION['admin_type'];
                                                if($session == 'admin'){?>
                                 <li style="border-bottom: 1px solid #5f6369" >
                                <a href="javascript: void(0);" class="has-arrow waves-effect bold" aria-expanded="false">
                                        <i class="fa fa-user"></i>
                                        <span>Admin</span>
                                    </a>
                                    <ul class="sub-menu mm-collapse" aria-expanded="false" >
                                    <li class="bol-sub-menu" style="color:#ffffff;">
                                        <a href="<?php echo site_url('addAdmin'); ?>">Add Admin</a>
                                    </li>
                                        <li class="bol-sub-menu" style="border-bottom: 1px solid #5f6369">
                                        <a href="<?php echo site_url('viewAdmin'); ?>">View Admin</a>
                                    </li>   
                                    </ul>
                                </li>
                                <?php }?>
                           
                            <li style="border-bottom: 1px solid #5f6369" >
                                <a href="<?php echo site_url('chatreport');?>" class="waves-effect bold">
                                    <i class="far fa-comment-alt"></i>
                                        
                                        <span>Chat History</span>
                                </a>  
                
                            </li>


                           <li style="border-bottom: 1px solid #5f6369" >
                                <a href="javascript: void(0);" class="has-arrow waves-effect bold">
                                        <i class="fa fa-history"></i>
                                        <span>Service History</span>
                                </a>
                                    <ul class="sub-menu mm-collapse">
                                       <li class="bol-sub-menu">
                                        <a href="#">Service History</a>
                                        </li>
                                    </ul> 

                            </li>
                            
                            
                              
                           
                            <li style="border-bottom: 1px solid #5f6369" >
                                <a href="javascript: void(0);" class="has-arrow waves-effect bold">
                                        <i class="fa fa-clipboard"></i>
                                        <span>Notice Board</span>
                                </a>
                                    <ul class="sub-menu mm-collapse">
                                       <li class="bol-sub-menu">
                                        <a href="<?php echo site_url('addnotice');?>">Add Notice</a>
                                        </li>
                                          <li class="bol-sub-menu">
                                        <a href="<?php echo site_url('viewnotice');?>">View Notice</a>
                                        </li>
                                    </ul> 

                            </li>

                              <li style="border-bottom: 1px solid #5f6369" >
                                <a href="javascript: void(0);" class="has-arrow waves-effect bold">
                                        <i class="fa fa-comment"></i>
                                        <span>FeedBack</span>
                                </a>
                                    <ul class="sub-menu mm-collapse">
                                       <li class="bol-sub-menu">
                                        <a href="<?php echo site_url('feedbackUser'); ?>">FeedBack List</a>
                                        </li>
                                    </ul> 

                            </li>

                             <li style="border-bottom: 1px solid #5f6369" >
                                <a href="javascript: void(0);" class="has-arrow waves-effect bold">
                                        <i class="fas fa-ad"></i>
                                        <span>Home Advertisement</span>
                                </a>
                                    <ul class="sub-menu mm-collapse">
                                       <li class="bol-sub-menu">
                                        <a href="<?php echo site_url('AddAdvt'); ?>">Add Advertisement</a>
                                        </li>
                                        <li class="bol-sub-menu">
                                        <a href="<?php echo site_url('viewAdvt'); ?>">View Advertisement</a>
                                        </li>
                                    </ul> 

                            </li>

                               <li style="border-bottom: 1px solid #5f6369" >
                                <a href="javascript: void(0);" class="has-arrow waves-effect bold" aria-expanded="false">
                                        <i class="fa fa-comments"></i>
                                        <span>Home Service Center</span>
                                    </a>
                                    <ul class="sub-menu mm-collapse" aria-expanded="false" >
                                    <li class="bol-sub-menu" style="color:#ffffff;">
                                        <a href="<?php echo site_url('chatOwner'); ?>">Chat With Owner</a>
                                    </li>
                                     <li class="bol-sub-menu">
                                        <a href="<?php echo site_url('chatTenant'); ?>">Chat With Tenant</a>
                                    </li> 
                                        
                                    <li class="bol-sub-menu">
                                    <a href="<?php echo site_url('chatGuest'); ?>">Chat with Guest</a>
                                    </li>

                                    </ul>
                                </li>

                            
                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->