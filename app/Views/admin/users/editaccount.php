<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12">
                            <h2 class="mb-4">Edit Account</h2>
                            <form class="custom-validation" method='post' action="<?php echo site_url('updateuser'); ?>"
                                enctype='multipart/form-data'>

                                <?php echo view('admin/_topmessage'); ?>

                                <div class="row  form-group">

                                    <div class="col-lg-5 ">

                                        <label>Studio/Company Name</label>
                                        <input type="text" class="form-control form-control-lg" required placeholder=""
                                            name="companyname" value="<?php echo $userdetails['companyname']; ?>" />

                                    </div>
                                    <div class="col-lg-5 ">

                                        <label>Full Name</label>
                                        <input type="text" class="form-control form-control-lg" required placeholder=""
                                            name="firstname" value="<?php echo $userdetails['fname']; ?>" />

                                    </div>

                                </div>

                                <div class="row  form-group">

                                    <div class="col-lg-5">

                                        <label>E-Mail</label>

                                        <input type="email" class="form-control form-control-lg" required
                                            parsley-type="email" placeholder="" name="email"
                                            value="<?php echo $userdetails['email']; ?>" />

                                    </div>
                                    <div class="col-lg-5">

                                        <label>Password</label>

                                        <input type="password" id="pass2" class="form-control form-control-lg"
                                            placeholder="" name="password" />
                                        <span class="text-muted ml-2">(If you want to change password then enter else
                                            keep blank)</span>


                                    </div>

                                </div>

                                <div class="row  form-group">

                                    <div class="col-lg-5">

                                        <label>Mobile Number</label>

                                        <input data-parsley-type="digits" type="text"
                                            class="form-control form-control-lg" required maxlength="10" placeholder=""
                                            name="mobilenumber" value="<?php echo $userdetails['phone']; ?>" />


                                    </div>
                                    <div class="col-lg-5">

                                        <label>Address</label>

                                        <textarea class="form-control form-control-lg"
                                            name="address"><?php echo $userdetails["address"]; ?></textarea>


                                    </div>

                                </div>

                                <div class="row  form-group">

                                    <div class="col-lg-5">

                                        <label>Pincode</label>

                                        <input type="text" class="form-control form-control-lg" maxlength="10"
                                            placeholder="" value="<?php echo $userdetails["pincode"]; ?>"
                                            name="pincode" />


                                    </div>
                                    <div class="col-lg-5">

                                        <label>Select State</label>

                                        <select name="state" id="state" class="form-control form-control-lg"
                                            onChange="getDistrict();">
                                            <option value=""> -Select state -</option>
                                            <?php foreach($states as $statedetail){ ?>
                                            <option value="<?php echo $statedetail["st_id"]; ?>"
                                                <?php echo ($statedetail["st_id"] ==$userdetails['stateid']) ? "selected" : ''; ?>>
                                                <?php echo $statedetail["st_name"]; ?></option>
                                            <?php } ?>
                                        </select>


                                    </div>

                                </div>

                                <div class="row  form-group">

                                    <div class="col-lg-5">

                                        <label>Select District</label>
                                        <div id="districbox">
                                            <select name="district" id="district" class="form-control form-control-lg"
                                                onChange="getCity();">
                                                <option value=""> -Select District -</option>
                                                <?php foreach($districts as $districsdetail){ ?>
                                                <option value="<?php echo $districsdetail["ds_id"]; ?>"
                                                    <?php echo ($districsdetail['ds_id'] ==$userdetails['districid']) ? "selected" : ''; ?>>
                                                    <?php echo $districsdetail["ds_name"]; ?></option>
                                                <?php } ?>

                                            </select>
                                        </div>


                                    </div>
                                    <div class="col-lg-5">

                                        <label>Select City</label>
                                        <div id="citybox">
                                            <select name="city" class="form-control form-control-lg">
                                                <option value=""> -Select City -</option>
                                                <?php foreach($cities as $citydetail){ ?>
                                                <option value="<?php echo $citydetail["ct_id"]; ?>"
                                                    <?php echo ($citydetail["ct_id"] ==$userdetails['cityid']) ? "selected" : ''; ?>>
                                                    <?php echo $citydetail["ct_name"]; ?></option>
                                                <?php } ?>

                                            </select>
                                        </div>


                                    </div>

                                </div>

                                

                                </div>


                                <div id="divdocuments" >
                                    
                                    <div class="row  form-group">

                                        <div class="col-lg-5">
                                            <label>GST Number</label>
                                            <input type="text" name="gstnumber" value="<?php echo $userdetails['gst_number']; ?>" class="form-control form-control-lg"  placeholder=""  />
                                        </div>
                                        <div class="col-lg-5">
                                            <label>PAN Number</label>
                                            <input type="text" name="pannumber" value="<?php echo $userdetails['idproof']; ?>" class="form-control form-control-lg"  placeholder=""  />
                                        </div>

                                    </div>
                                    <div class="row  form-group">

                                        <div class="col-lg-5">
                                            <label>GST Document</label>
                                            <input type="file" name="gstdoc" class="filestyle">

                                            <?php if($userdetails['gst_doc']){ ?>
                                            <div class="mt-2" id="gstdoc"><a target="_blank"
                                                    href="<?php echo base_url('userdoc/'.$userdetails['gst_doc']); ?>"><?php echo $userdetails['gst_doc']; ?></a>
                                                <a href="javascript:void(0);"
                                                    onclick="delFile(<?php echo $userdetails['id']; ?>,'gstdoc');"><i
                                                        class="mdi mdi-close-circle-outline text-danger"></i></a>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <div class="col-lg-5">
                                            <label>PAN Card</label>
                                            <input type="file" name="pandoc" class="filestyle">

                                            <?php if($userdetails['idproof_doc']){ ?>
                                            <div class=" mt-2" id="idproof"><a target="_blank"
                                                    href="<?php echo base_url('userdoc/'.$userdetails['idproof_doc']); ?>"><?php echo $userdetails['idproof_doc']; ?></a>
                                                <a href="javascript:void(0);"
                                                    onclick="delFile(<?php echo $userdetails['id']; ?>,'idproof');"><i
                                                        class="mdi mdi-close-circle-outline text-danger"></i></a>
                                            </div>
                                            <?php } ?>
                                        </div>

                                    </div>

                                    
                                </div>

                               
                                <div class="row  form-group">

                                    <div class="col-lg-5">

                                        <label>Status</label>

                                        <select name="user_status" class="form-control form-control-lg">
                                            <option value=""> -Status -</option>
                                            <option value="1"
                                                <?php echo ($userdetails['user_status'] =="1") ? "selected" : ''; ?>>
                                                Active</option>
                                            <option value="0"
                                                <?php echo ($userdetails['user_status'] =="0") ? "selected" : ''; ?>>In
                                                Active</option>

                                        </select>


                                    </div>
                                   

                                </div>





                                <div class="row  form-group">

                                    <div class="col-lg-5">
                                        <input type="hidden" name="userid" value="<?php echo $userid; ?>">
                                        <button type="submit"
                                            class="btn btn-lg btn-block btn-primary waves-effect waves-light mr-1">
                                            Submit
                                        </button>
                                    </div>
                                    <div class="col-lg-5">
                                        <a href="<?php echo site_url("users");?>"
                                            class="btn btn-lg btn-block btn-secondary waves-effect"> Cancel </a>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->

<script>
function delFile(id, filetype) {
    if (confirm("Are you sure?")) {
        $.ajax({
            url: "<?php echo site_url('deluserfile'); ?>",
            data: {
                id: id,
                filetype: filetype
            },
            success: function(data, status) {
                var data1 = JSON.parse(data);
                if (data1.status) {
                    $("#" + filetype).html("");
                }
            }
        });

    }


}

function showhideChanelpartner() {
    if ($('#user_type').val() == "channelpartnerstudio") {
        $('#chanelpartnerbox').css("display", "block")
        $('#partnerlevelbox').css("display", "none")
        $('#divdocuments').css("display", "none");

    } else if ($('#user_type').val() == "channelpartner") {
        $('#chanelpartnerbox').css("display", "none");
        $('#partnerlevelbox').css("display", "block");
        $('#divdocuments').css("display", "block");
    } else {
        $('#chanelpartnerbox').css("display", "none");
        $('#partnerlevelbox').css("display", "none");
        $('#divdocuments').css("display", "block");
    }
}

function getCity() {
    var stid = $('#state').val();
    var district = $('#district').val();

    // get cities of state
    $.ajax({
        url: "<?php echo site_url('getcity'); ?>",
        data: {
            stid: stid,
            district: district
        },
        success: function(data, status) {
            var data1 = JSON.parse(data);

            var citiesstr;
            citiesstr =
                '<select name="city" class="form-control form-control-lg"><option value=""> -Select City -</option>';
            if (data1.status) {
                for (i = 0; i < data1.cities.length; i++) {
                    citiesstr += '<option value="' + data1.cities[i].ct_id + '">' + data1.cities[i]
                        .ct_name + '</option>';
                }
            }

            citiesstr += "</select>";
            $("#citybox").html(citiesstr);

        }
    });




}

function getDistrict() {
    var stid = $('#state').val();
    // get distric of state
    $.ajax({
        url: "<?php echo site_url('getdistric'); ?>",
        data: {
            stid: stid
        },
        success: function(data, status) {
            var data1 = JSON.parse(data);

            var districsstr;
            districsstr =
                '<select name="district" id="district" class="form-control form-control-lg" onChange="getCity();"><option value=""> -Select Distric -</option>';
            if (data1.status) {
                for (i = 0; i < data1.districs.length; i++) {
                    districsstr += '<option value="' + data1.districs[i].ds_id + '">' + data1.districs[i]
                        .ds_name + '</option>';
                }
            }

            districsstr += "</select>";
            //  console.log(districsstr);
            $("#districbox").html(districsstr);

        }
    });

    getCity();

}
</script>