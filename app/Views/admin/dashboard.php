<style type="text/css">
  
.c-dashboardInfo {
  margin-bottom: 15px;
}
.c-dashboardInfo .wrap {
  background: #FF5151;;
  box-shadow: 2px 10px 20px rgba(0, 0, 0, 0.1);
 border-radius: 23px;
  text-align: center;
  position: relative;
  overflow: hidden;
  padding: 40px 25px 20px;
  height: 100%;
}
.c-dashboardInfo__title,
.c-dashboardInfo__subInfo {
  color: white;
  font-size: 1.18em;
}
.c-dashboardInfo span {
  display: block;
}
.c-dashboardInfo__count {
  font-weight: 600;
  font-size: 2.5em;
  line-height: 64px;
  color: white;
}
.c-dashboardInfo .wrap:after {
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 10px;
  content: "";
}

.c-dashboardInfo:nth-child(1) .wrap:after {
  background: linear-gradient(82.59deg, #00c48c 0%, #00a173 100%);
}
.c-dashboardInfo:nth-child(2) .wrap:after {
  background: linear-gradient(81.67deg, #0084f4 0%, #1a4da2 100%);
}
.c-dashboardInfo:nth-child(3) .wrap:after {
  background: linear-gradient(69.83deg, #0084f4 0%, #00c48c 100%);
}
.c-dashboardInfo:nth-child(4) .wrap:after {
  background: linear-gradient(81.67deg, #ff647c 0%, #1f5dc5 100%);
}
.c-dashboardInfo__title svg {
  color: #d7d7d7;
  margin-left: 5px;
}
.MuiSvgIcon-root-19 {
  fill: currentColor;
  width: 1em;
  height: 1em;
  display: inline-block;
  font-size: 24px;
  transition: fill 200ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
  user-select: none;
  flex-shrink: 0;
}
.pt-5, .py-5 {
    padding-top: 13rem!important;
}

</style>
<style>


.datetime{

  color: #000;
    font-family: "Segoe UI", sans-serif;
  width: 400px;
  padding: 15px 10px;
  /*border: 1px solid #F6D000;*/
  border-radius: 5px;
 /* -webkit-box-reflect: below 1px linear-gradient(transparent, rgba(255, 255, 255, 0.1));*/
  transition: 0.5s;
  transition-property: background, box-shadow;



margin-top: -94px;
margin-bottom: 27px;
margin-left: -42px;
}

.datetime:hover{
  background: #fff;
  box-shadow: 0 0 30px #fff;
}

.date{
  font-size: 20px;
  font-weight: 600;
  text-align: center;
  letter-spacing: 3px;
}

.time{
  font-size: 40px;
  display: flex;
  justify-content: center;
  align-items: center;
}

.time span:not(:last-child){
  position: relative;
  margin: 0 6px;
  font-weight: 500;
  text-align: center;

}

.time span:last-child{
  background: #fff;
  font-size: 30px;
  font-weight: 600;
  text-transform: uppercase;
  margin-top: 10px;
  padding: 0 5px;
  border-radius: 3px;
}
.right-sidebar{

  color: #000;
  background: #fff;
  font-family: "Segoe UI", sans-serif;
  width: 500px;
  
  padding: 15px 10px;
  /*border: 1px solid #F6D000;*/
  border-radius: 5px;
  -webkit-box-reflect: below 1px linear-gradient(transparent, rgba(255, 255, 255, 0.1));
  transition: 0.5s;
  transition-property: background, box-shadow;

margin-top: -74px;
margin-bottom: 20px;
margin-right:10px !important;
}

.col-sm-2{
  display: inline;

}

.list_all li {
 display: inline;
margin:0 3em 0 4em;
}

.pull-right img{
float:right !important; 
border-radius: 50%;
height:56x; 
width:56px;
}

.pull-right{
color: #000;
}

</style>
<div class="container">
<div id="root">
  <div class="container pt-5">

     <body onLoad="initClock()">

     

    <div class="datetime">
     
          <div class="date">
        <span id="dayname">Day</span>,
        <span id="month">Month</span>
        <span id="daynum">00</span>,
        <span id="year">Year</span>
      </div>
      <div class="time">
        <span id="hour">00</span>:
        <span id="minutes">00</span>:
        <span id="seconds">00</span>
        <span id="period">AM</span>
      </div>
        </div>
      
    </div>

     
     <div class="row align-items-stretch">

       
       <div class="c-dashboardInfo col-lg-3 col-md-6">
          <a href="<?php echo site_url('guest')?>">

          <div class="wrap">
           <i class="fa fa-user-circle" style="color:white;"></i> <h3 style="font-size:25px;" class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">Guest</h3><span class="hind-font caption-12 c-dashboardInfo__count"><?php echo $guest; ?></span>
          </div>
           </a>
        </div>

         <div class="c-dashboardInfo col-lg-3 col-md-6">
          <a href="<?php echo site_url('viewTenant');?>">

          <div class="wrap">
           <i class="fa fa-building" style="color:white;"></i> <h3 style="font-size:25px;" class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">Tenant</h3><span class="hind-font caption-12 c-dashboardInfo__count"><?php echo $tenant; ?></span>
          </div>
           </a>
        </div>

           <div class="c-dashboardInfo col-lg-3 col-md-6">
          <a href="<?php echo site_url('viewOwner');?>">

          <div class="wrap">
           <i class="fa fa-user"  style="color:white;"></i> <h3 style="font-size:25px;" class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">Owner</h3><span class="hind-font caption-12 c-dashboardInfo__count"><?php echo $owner;?></span>
          </div>
           </a>
        </div>

         <div class="c-dashboardInfo col-lg-3 col-md-6">
          <a href="<?php echo site_url('viewemployee')?>">

          <div class="wrap">
           <i class="fa fa-user"  style="color:white;"></i> <h3 style="font-size:25px;" class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">Employee</h3><span class="hind-font caption-12 c-dashboardInfo__count"><?php echo $empl;?></span>
          </div>
           </a>
        </div>

    
       
   </div>
     <div class="row align-items-stretch">

      <div class="c-dashboardInfo col-lg-3 col-md-6">
        <a href="<?php echo site_url('viewClient')?>">
        <div class="wrap">
         <i class="fa fa-user"  style="color:white;"></i> <h4 style="font-size:25px;" class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">Client</h4><span class="hind-font caption-12 c-dashboardInfo__count"><?php echo $client;?></span>
        </div>
         </a>
      </div>
    <?php $seesion=$_SESSION['admin_type'];
          if($seesion == 'admin')
        {?>
          
          <div class="c-dashboardInfo col-lg-3 col-md-6">
        <a href="<?php echo site_url('viewAdmin')?>">
        <div class="wrap">
         <i class="fa fa-user"  style="color:white;"></i> <h4 style="font-size:25px;" class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">Admin</h4><span class="hind-font caption-12 c-dashboardInfo__count"><?php echo $admin; ?> </span>
        </div>
         </a>
      </div>
    <?php }?>
         <div class="c-dashboardInfo col-lg-3 col-md-6">
        <a href="<?php echo site_url('chatreport');?>">
        <div class="wrap">
         <i class="fa fa-comment"  style="color:white;"></i> <h4 style="font-size:25px;" class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">Chat Report</h4><span class="hind-font caption-12 c-dashboardInfo__count"><?php echo $owner;?></span>
        </div>
         </a>
      </div>

         <div class="c-dashboardInfo col-lg-3 col-md-6">
        <a href="#">
        <div class="wrap">
         <i class="fa fa-history"  style="color:white;"></i> <h4 style="font-size:25px;" class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">Service History</h4><span class="hind-font caption-12 c-dashboardInfo__count"><?php echo 0; ?> </span>
        </div>
         </a>
      </div>

     </div>


   
        
      </div>
    </div>
     

</div>
</div>
</div>


<script type="text/javascript">
    function updateClock(){
      var now = new Date();
      var dname = now.getDay(),
          mo = now.getMonth(),
          dnum = now.getDate(),
          yr = now.getFullYear(),
          hou = now.getHours(),
          min = now.getMinutes(),
          sec = now.getSeconds(),
          pe = "AM";

          if(hou >= 12){
            pe = "PM";
          }
          if(hou == 0){
            hou = 12;
          }
          if(hou > 12){
            hou = hou - 12;
          }

          Number.prototype.pad = function(digits){
            for(var n = this.toString(); n.length < digits; n = 0 + n);
            return n;
          }

          var months = ["January", "February", "March", "April", "May", "June", "July", "Augest", "September", "October", "November", "December"];
          var week = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
          var ids = ["dayname", "month", "daynum", "year", "hour", "minutes", "seconds", "period"];
          var values = [week[dname], months[mo], dnum.pad(2), yr, hou.pad(2), min.pad(2), sec.pad(2), pe];
          for(var i = 0; i < ids.length; i++)
          document.getElementById(ids[i]).firstChild.nodeValue = values[i];
    }

    function initClock(){
      updateClock();
      window.setInterval("updateClock()", 1);
    }
    </script>
  </body>











