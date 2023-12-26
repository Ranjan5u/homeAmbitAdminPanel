<?php $settingObj= new \App\Models\SettingsModel();
 $settingarr = $settingObj->getNameValuepair();
 //print_r($settingarr);
 ?>
<header id="masthead" class="header ttm-header-style-01">
                <!-- ttm-topbar-wrapper -->
                <div class="ttm-topbar-wrapper clearfix">
                    <div class="container">
                        <div class="ttm-topbar-content">
                            <ul class="top-contact text-left">

                                <li><i class="fa fa-envelope-o"></i><a href="mailto:<?php echo $settingarr['SALES_EMAIL']; ?>"><?php echo $settingarr['SALES_EMAIL']; ?></a></li>
                                <li><i class="fa fa-phone"></i><a href=""><?php echo $settingarr['CONTACT_PHONE']; ?> / <?php echo $settingarr['CONTACT_PHONE2']; ?></a></li>
                            </ul>
                            <div class="topbar-right text-right">
                                <ul class="top-contact">

                                </ul>
                                <div class="ttm-social-links-wrapper list-inline">
                                    <ul class="social-icons">
                                        <li><a href="<?php echo $settingarr['FACEBOOK_URL']; ?>" class=" tooltip-bottom" data-tooltip="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li><a href="<?php echo $settingarr['TWITTER_URL']; ?>" class=" tooltip-bottom" data-tooltip="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li><a href="<?php echo $settingarr['LINKEDIN_URL']; ?>" class=" tooltip-bottom" data-tooltip="Linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div><!-- ttm-topbar-wrapper end -->
                <!-- ttm-header-wrap -->
                <div class="ttm-header-wrap">
                    <!-- ttm-stickable-header-w -->
                    <div id="ttm-stickable-header-w" class="ttm-stickable-header-w clearfix">
                        <div id="site-header-menu" class="site-header-menu">
                            <div class="site-header-menu-inner ttm-stickable-header">
                                <div class="container">
                                    <!-- site-branding -->
                                    <div class="site-branding">
                                        <a class="home-link" href="<?php echo site_url(); ?>" title="Altech" rel="home">
                                            <img id="logo-img" class="img-center lazyload" data-src="<?php echo base_url('public/website/images/logo.png'); ?>" alt="logo">
                                        </a>
                                    </div><!-- site-branding end -->
                                    <!--site-navigation -->
                                    <div id="site-navigation" class="site-navigation">
                                        <div class="ttm-rt-contact">
                                            <!-- header-icons -->
                                            <div class="ttm-header-icons ">


                                            </div> 
                                        </div>
                                        <div class="ttm-menu-toggle">
                                            <input type="checkbox" id="menu-toggle-form" />
                                            <label for="menu-toggle-form" class="ttm-menu-toggle-block">
                                                <span class="toggle-block toggle-blocks-1"></span>
                                                <span class="toggle-block toggle-blocks-2"></span>
                                                <span class="toggle-block toggle-blocks-3"></span>
                                            </label>
                                        </div>
                                        <nav id="menu" class="menu">
                                            <ul class="dropdown">

                                                <?php 
                                               
                                                 $menucategory= new \App\Models\MenucategoryModel();
                                                 $searchArray = array("parentid"=>0,"cat_showinmenu"=>'1');
                                                 $topmenu= $menucategory->getData($searchArray);
//                                                 print_r($topmenu);die;
                                                 foreach($topmenu as $topmenudetail)
                                                 {
                                                     $secondLevelsearch = array("parentid"=>$topmenudetail['cat_id'],"cat_showinmenu"=>1);
                                                     $secondLevelmenu = $menucategory->getData($secondLevelsearch);
                                                     $secondcount = count($secondLevelmenu);
                                                     $menuUrl = strstr( $topmenudetail['cat_url'], "#") ? $topmenudetail['cat_url'] : site_url("content/".$topmenudetail['cat_url']);
                                                     $target = strstr( $topmenudetail['cat_url'], "#") ? "target='_new'" : "";
                                                ?>
                                                <li><a href="<?php echo  $menuUrl; ?>"  <?php echo $target; ?>><?php echo $topmenudetail['cat_name']; ?></a>
                                                    
                                                    <!<!-- Second level menu -->
                                                    <?php if($secondLevelmenu){ ?>
                                                    <ul <?php if($secondcount > 14){ echo 'class="custom-list" style="width:500px"'; }?>>
                                                        <?php     
                                                        foreach($secondLevelmenu as $secondmenudetail)
                                                            {
                                                                $thirdLevelsearch = array("parentid"=>$secondmenudetail['cat_id'],"cat_showinmenu"=>1);
                                                                $thirdLevelmenu = $menucategory->getData($thirdLevelsearch);
                                                                $menuUrl = strstr( $secondmenudetail['cat_url'], "#") ? $secondmenudetail['cat_url'] : site_url("content/".$secondmenudetail['cat_url']);
                                                                $target = strstr( $secondmenudetail['cat_url'], "#") ? "target='_new'" : "";
                                                           ?>
                                                            <li><a href="<?php echo $menuUrl; ?>" <?php echo $target; ?>><?php echo $secondmenudetail['cat_name']; ?></a>
                                                             
                                                                <?php if($thirdLevelmenu){ ?>
                                                                <ul>
                                                                <?php      
                                                                foreach($thirdLevelmenu as $thirdmenudetail)
                                                                    {
                                                                    $menuUrl = strstr( $thirdmenudetail['cat_url'], "#") ? $thirdmenudetail['cat_url'] : site_url("content/".$thirdmenudetail['cat_url']); 
                                                                    $target = strstr( $thirdmenudetail['cat_url'], "#") ? "target='_new'" : "";
                                                                   ?>
                                                                    <li><a href="<?php echo $menuUrl; ?>" <?php echo $target; ?>><?php echo $thirdmenudetail['cat_name']; ?></a> </li>
                                                                    <?php } ?>
                                                                </ul>
                                                                <?php } ?>
                                                            </li>
                                                           <?php } ?>
                                                       
                                                        </ul>
                                                    <?php } ?>
                                                    
                                                     <!<!-- Second level menu -->
                                                </li>
                                                
                                                 <?php } ?>

                                            </ul>
                                        </nav>
                                    </div><!-- site-navigation end-->
                                </div>
                            </div>
                        </div>
                    </div><!-- ttm-stickable-header-w end-->
                </div><!--ttm-header-wrap end -->

            </header><!--header end-->
