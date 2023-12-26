  <?php echo view('website/_topbanner'); ?>

        <!--site-main start-->
      <div class="site-main">

            <!-- services-slide-section -->
            <section class="ttm-row zero-padding-section clearfix">
                <div class="container">
                    <div class="row no-gutters"><!-- row -->
                        <div class="col-lg-5">
                            <div class="spacing-9">
                                <!-- section title -->
                                <div class="section-title with-desc clearfix">
                                    <div class="title-header">
                                        <h5>Come Visit Us At</h5>
                                        <h2 class="title">Our Address</h2>
                                    </div>
                                </div><!-- section title end -->
                                <div class="row">
                                    <div class="col-12">
                                        <!-- featured-icon-box -->
                                        <div class="featured-icon-box style2 left-icon icon-align-top">
                                            <div class="featured-icon"><!-- featured-icon -->
                                               
                                                     <img src="<?php echo base_url('public/website/images/icon/India.png');?>" >
                                               
                                            </div>
                                            <div class="featured-content">
                                                <div class="featured-title"><!-- featured title -->
                                                    <h5>Head office </h5>
                                                </div>
                                                <div class="featured-desc"><!-- featured desc -->
                                                    <p><?php echo $setting['COMPANY_ADD1']; ?></p>
                                                    <p><?php echo $settingarr['CONTACT_PHONE']; ?>, <?php echo $settingarr['CONTACT_PHONE2']; ?>, <?php echo $settingarr['LANDLINE_PHONE']; ?></p>
                                                    <p><?php echo $settingarr['SALES_EMAIL']; ?></p>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                         <div class="separator">
                                    <div class="sep-line mt-25 mb-25"></div>
                                </div>
                                        <div class="featured-icon-box style2 left-icon icon-align-top">
                                            <div class="featured-icon"><!-- featured-icon -->
                                               
                                                     <img src="<?php echo base_url('public/website/images/icon/India.png');?>" >
                                                
                                            </div>
                                            <div class="featured-content">
                                                <div class="featured-title"><!-- featured title -->
                                                    <h5>Branch Office:</h5>
                                                </div>
                                                <div class="featured-desc"><!-- featured desc -->
                                                    <p><?php echo $settingarr['ADD_DELHI']; ?></p>
                                                    <p><?php echo $settingarr['PHONE_DELHI']; ?></p>
                                                    <p><?php echo $settingarr['SALES_EMAIL']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- separator -->
                                <div class="separator">
                                    <div class="sep-line mt-25 mb-25"></div>
                                </div>
                                <!-- separator -->
                                <div class="row">
                                    <div class="col-12">
                                        <!-- featured-icon-box -->
                                        <div class="featured-icon-box style2 left-icon icon-align-top">
                                            <div class="featured-icon"><!-- featured-icon -->
                                               
                                                     <img src="<?php echo base_url('public/website/images/icon/london.png');?>" >
                                                
                                            </div>
                                            <div class="featured-content">
                                                <div class="featured-title"><!-- featured title -->
                                                    <h5>Branch Office:</h5>
                                                </div>
                                                <div class="featured-desc"><!-- featured desc -->
                                                    <p><?php echo $settingarr['ADD_USA']; ?> </p>
                                                    <p><?php echo $settingarr['PHONE_USA']; ?> </p>
                                                    <p><?php echo $settingarr['SALES_EMAIL']; ?> </p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- separator -->
                                <div class="separator">
                                    <div class="sep-line mt-25 mb-25"></div>
                                </div>
                                <!-- separator -->
                                <div class="row">
                                    <div class="col-12">
                                        <!-- featured-icon-box -->
                                        <div class="featured-icon-box style2 left-icon icon-align-top">
                                            <div class="featured-icon"><!-- featured-icon -->
                                               
                                                     <img src="<?php echo base_url('public/website/images/icon/oman.png');?>">
                                                
                                            </div>
                                            <div class="featured-content">
                                                <div class="featured-title"><!-- featured title -->
                                                    <h5>Branch Office:</h5>
                                                </div>
                                                <div class="featured-desc"><!-- featured desc -->
                                                    <p><?php echo $settingarr['ADD_OMAN']; ?></p>
                                                    <p><?php echo $settingarr['PHONE_OMAN']; ?></p>
                                                    <p><?php echo $settingarr['SALES_EMAIL']; ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="spacing-10 ttm-bgcolor-grey ttm-bg ttm-col-bgcolor-yes ttm-right-span">
                                <div class="ttm-col-wrapper-bg-layer ttm-bg-layer">
                                    <div class="ttm-bg-layer-inner"></div>
                                </div>
                                <!-- section title -->
                                <div class="section-title with-desc clearfix">
                                    <div class="title-header">
                                        <h5>Send Message</h5>
                                        <h2 class="title">Drop Us A Line</h2>
                                    </div>
                                </div><!-- section title end -->
                               
                                <div>
                                <?php echo \Config\Services::validation()->listErrors(); ?>
                                                <?php echo csrf_field() ?>
                                                <?php echo view('website/_topmessage'); ?>

                                  </div>
                                <form  class="row ttm-quote-form clearfix" method="post" action="<?php echo site_url('enquiry');?>">
                     
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <input name="name" type="text" class="form-control bg-white" placeholder="Full Name*" required="required">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <input name="phone" type="text" placeholder="Phone Number*" required="required" class="form-control bg-white">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <input name="email" type="email" placeholder="Email Address*" required="required" class="form-control bg-white">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <input name="subject" type="text" placeholder="Subject" required="required" class="form-control bg-white">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <textarea name="message" rows="5" placeholder="Write A Massage..." required="required" class="form-control bg-white"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="text-left">
                                            <button type="submit" id="submit" class="ttm-btn ttm-btn-size-md ttm-btn-bgcolor-skincolor" value="">
                                                Submit Quote
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- row end -->
                    <!-- row -->
                    <div class="row">
                        
                    </div><!-- row end-->
                </div>
            </section>
            <!-- services-slide-section end -->

            <!-- map-section -->
            <div class="ttm-row map-section clearfix">
                <div class="container-fluid">
                    <div class="row">
                           
                            <!--map-start-->
                         <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1ja_BLEotD-LMK2XqFx2Wc9JULVMKC0cI&ehbc=2E312F" width="100%" height="480"></iframe>
                            <!--map-end-->
                      
                    </div>
                </div>
            </div>
            <!-- map-section end -->

        </div><!--site-main end-->