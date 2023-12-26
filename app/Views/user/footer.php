<?php $session = session(); ?>
<?php if($session->get('isUserLoggedIn')){ ?>
<footer class="footer" style="width:100%; left:0px !important;">
    <div class="container-fluid">
        <!-- <div class="row">
            <div class="col-12 font-size-18">
                 Powered By <img src="<?php echo base_url('images/andlogo.png'); ?>" height="40px"  alt="&AND Solution">
            </div>
        </div> -->
    </div>
</footer>
<?php } ?>

