

<style type="text/css">
    .navbar-badge {
    font-size: 0.7rem !important;
    font-weight: 300 !important;
    padding: 2px 3px !important;
    position: absolute !important;
    right: 5px !important;
    top: 26px !important;
}
.badge-warning {
    color: #000 !important;
    background-color: #f8b425;
}
</style>

<link rel="shortcut icon" href="<?php echo base_url(PUBLIC_FOLDER.'admin/css/custom.css'); ?>">
<link rel="shortcut icon" href="<?php echo base_url(PUBLIC_FOLDER.'admin/css/app.css'); ?>">
<?php $session = session(); ?>
<header id="page-topbar">


                <div class="navbar-header" style="background-color: #FF5151;">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box" style="background-color: #FF5151;">
                            <a href="<?php echo site_url('dashboard'); ?>" class="logo logo-dark">
                                <span class="logo-sm">

                                    <img src="<?php echo base_url(PUBLIC_FOLDER.'admin/images/'.SITE_LOGO); ?>" alt="" height="80px" >
                                </span>
                                <span class="logo-lg" >
                                    <img src="<?php echo base_url(PUBLIC_FOLDER.'admin/images/'.SITE_LOGO); ?>" alt="" height="80px"  >

                                </span>
                            </a>

                            <a href="<?php echo site_url('dashboard'); ?>" class="logo logo-light">
                                <span class="logo-sm ml-4">
                            <img src="<?php echo base_url(PUBLIC_FOLDER.'admin/images/'.SITE_LOGO); ?>" alt="" height="55px" style="background-color:#fff;">
                                </span>
                                <span class="logo-lg" >
                                    <img src="<?php echo base_url(PUBLIC_FOLDER.'admin/images/'.SITE_LOGO); ?>" alt="" height="80px"  style="margin-top:24px ; background-color:#fff;"  >

                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                            <i class="mdi mdi-menu" style="color:white;" ></i>
                        </button>

                       
                    </div>

                    

                    <div class="d-flex"></div>
                    <div class="d-flex " >

                        <div class="d-flex" >
                            <div class="dropdown dropdown-menu-right d-inline-block" >
                            </div>
            
                        </div>


                        <div class="d-flex">

                            <div class="dropdown d-inline-block">
                                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-bell" style="font-size:24px; color: white;"></i>
                                    <span class="badge badge-warning navbar-badge">15</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    
                                    <!-- item-->
                                    <a class="dropdown-item text-primary h4" >Invite List<br> <span class="text-muted h6"><span> </a>
                                    <a class="dropdown-item" href=""><i class="fa fa-user-plus"></i> Owner Invite 8</a>
                                    <a class="dropdown-item"><i class="fa fa-user-plus"></i> Tenant Invite 9</a>
                                      <a class="dropdown-item"><i class="fa fa-user-plus"></i> Guest Invite 4</a>
                                    <div class="dropdown-divider"></div>
                                 
                                </div>
                            </div>
                            <div class="dropdown d-inline-block">
                                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-settings" style="font-size:24px; color: white;"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    
                                    <!-- item-->
                                    <a class="dropdown-item text-primary h4" > <?php echo  $session->get('admin_name'); ?> <br> <span class="text-muted h6"><?php echo  $session->get('admin_email'); ?><span> </a>
                                    <a class="dropdown-item" href="<?php echo site_url('adminprofile');?>"><i class="mdi mdi-account-outline font-size-17 align-middle mr-1"></i> Profile</a>
                                    <a class="dropdown-item" href="<?php echo site_url('cpassword');?>"><i class="mdi mdi-lock-open-outline font-size-17 align-middle mr-1"></i> Change Password</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="<?php echo site_url('logout'); ?>"><i class="ion ion-md-power  font-size-17 align-middle mr-1 text-danger"></i> Logout</a>
                                </div>
                            </div>
                
                        </div>
                    </div>
                </div>
            </header>