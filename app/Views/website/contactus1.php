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
                                                <div class="ttm-icon ttm-icon_element-bgcolor-skincolor ttm-icon_element-size-md ttm-icon_element-style-round">
                                                    <i class="fa fa-map-marker"></i>
                                                </div>
                                            </div>
                                            <div class="featured-content">
                                                <div class="featured-title"><!-- featured title -->
                                                    <h5>Office Address</h5>
                                                </div>
                                                <div class="featured-desc"><!-- featured desc -->
                                                    <p><?php echo $settingarr['COMPANY_ADD1']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="separator">
                                    <div class="sep-line mt-25 mb-25"></div>
                                </div>
                                        <div class="featured-icon-box style2 left-icon icon-align-top">
                                            <div class="featured-icon"><!-- featured-icon -->
                                                <div class="ttm-icon ttm-icon_element-bgcolor-skincolor ttm-icon_element-size-md ttm-icon_element-style-round">
                                                    <i class="fa fa-map-marker"></i>
                                                </div>
                                            </div>
                                            <div class="featured-content">
                                                <div class="featured-title"><!-- featured title -->
                                                    <h5>Branch Office:</h5>
                                                </div>
                                                <div class="featured-desc"><!-- featured desc -->
                                                    <p><?php echo $settingarr['COMPANY_ADD2']; ?></p>
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
                                                <div class="ttm-icon ttm-icon_element-bgcolor-skincolor ttm-icon_element-size-md ttm-icon_element-style-round">
                                                    <i class="fa fa-phone"></i>
                                                </div>
                                            </div>
                                            <div class="featured-content">
                                                <div class="featured-title"><!-- featured title -->
                                                    <h5>Our Phone Number</h5>
                                                </div>
                                                <div class="featured-desc"><!-- featured desc -->
                                                    <p><?php echo $settingarr['CONTACT_PHONE']; ?> </p>
                                                    <p><?php echo $settingarr['CONTACT_PHONE2']; ?> </p>
                                                    <p><?php echo $settingarr['LANDLINE_PHONE']; ?> </p>

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
                                                <div class="ttm-icon ttm-icon_element-bgcolor-skincolor ttm-icon_element-size-md ttm-icon_element-style-round">
                                                    <i class="ti ti-email"></i>
                                                </div>
                                            </div>
                                            <div class="featured-content">
                                                <div class="featured-title"><!-- featured title -->
                                                    <h5>Our Email</h5>
                                                </div>
                                                <div class="featured-desc"><!-- featured desc -->
                                                    <p><?php echo $settingarr['SALES_EMAIL']; ?></p>
                                                    <p><?php echo $settingarr['CONTACT_EMAIL']; ?></p>
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
                     
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input name="name" type="text" class="form-control bg-white" placeholder="Full Name*" required="required">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input name="phone" type="text" placeholder="Phone Number*" required="required" class="form-control bg-white">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input name="email" type="email" placeholder="Email Address*" required="required" class="form-control bg-white">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
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
                          <div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=genie%20soft%20solution%20Bhyandar%20Road,%20Mira%20Road%20(E),%20Mumbai%20%E2%80%93%20401107&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-to.org">123 movies</a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:100%;}</style><a href="https://www.embedgooglemap.net">google maps embed zoom</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:100%;}</style></div></div>
                            <!--map-end-->
                      
                    </div>
                </div>
            </div>
            <!-- map-section end -->

        </div><!--site-main end-->