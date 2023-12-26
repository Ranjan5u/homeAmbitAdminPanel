    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12">
                                <h2 class="pb-4">Create New Customer</h2>
                                <form class="custom-validation" method='post'
                                    action="<?php echo site_url('adduser'); ?>" enctype='multipart/form-data'>

                                    <?php echo view('admin/_topmessage'); ?>


                                    <div class="row  form-group">

                                        <div class="col-5 ">
                                            <label>Studio/Company Name</label>
                                            <input type="text" class="form-control form-control-lg" required
                                                placeholder="" name="companyname" />

                                        </div>
                                        <div class="col-5 ">
                                            <label>Full Name</label>
                                            <input type="text" class="form-control form-control-lg" required
                                                placeholder="" name="firstname" />

                                        </div>

                                    </div>

                                    <div class="row  form-group">
                                        <div class="col-5 ">
                                            <label>Mobile Number</label>
                                            <input data-parsley-type="digits" type="text"
                                                class="form-control form-control-lg" required maxlength="10"
                                                placeholder="" name="mobilenumber" />
                                        </div>
                                        <div class="col-5 ">
                                            <label>Password</label>
                                            <input type="password" id="pass2" class="form-control form-control-lg"
                                                placeholder="" name="password" />
                                            <span class="text-muted ml-2">(If you want add password then enter else keep
                                                blank)</span>
                                        </div>
                                    </div>

                                    <div class="row  form-group">
                                        <div class="col-5 ">
                                            <label>E-Mail</label>
                                            <input type="email" class="form-control form-control-lg" required
                                                parsley-type="email" placeholder="" name="email" />

                                        </div>
                                        <div class="col-5 ">
                                            <label>Address</label>
                                            <textarea class="form-control form-control-lg" name="address"></textarea>

                                        </div>
                                    </div>

                                    <div class="row  form-group">
                                        <div class="col-5 ">
                                            <label>Pincode</label>
                                            <input type="text" class="form-control form-control-lg" maxlength="10"
                                                placeholder="" name="pincode" />
                                        </div>
                                        <div class="col-5 ">
                                            <label>Select State</label>
                                            <select name="state" id="state" class="form-control form-control-lg"
                                                onChange="getDistrict();">
                                                <option value=""> -Select state -</option>
                                                <?php foreach($states as $statedetail){ ?>
                                                <option value="<?php echo $statedetail["st_id"]; ?>">
                                                    <?php echo $statedetail["st_name"]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="row  form-group">
                                        <div class="col-5 ">
                                            <label>Select District</label>
                                            <div id="districbox">
                                                <select name="district" id="district" onChange="getCity();" class="form-control form-control-lg">
                                                    <option value=""> -Select District -</option>
                                                    <?php foreach($districts as $districsdetail){ ?>
                                                    <option value="<?php echo $districsdetail["ds_id"]; ?>">
                                                        <?php echo $districsdetail["ds_name"]; ?></option>
                                                    <?php } ?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-5 ">
                                            <label>Select City</label>
                                            <div id="citybox">
                                                <select name="city" class="form-control form-control-lg">
                                                    <option value=""> -Select City -</option>
                                                    <?php foreach($cities as $citydetail){ ?>
                                                    <option value="<?php echo $citydetail["ct_id"]; ?>">
                                                        <?php echo $citydetail["ct_name"]; ?></option>
                                                    <?php } ?>

                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    
                                    <div id="divdocuments">
                                        <div class="row  form-group">
                                            <div class="col-5 ">
                                                <label>GST Number</label>
                                                <input type="text" name="gstnumber" class="form-control form-control-lg"  placeholder=""  />

                                            </div>
                                            <div class="col-5 ">
                                                <label>PAN Number</label>
                                                <input type="text" name="pannumber" class="form-control form-control-lg"  placeholder=""  />

                                            </div>
                                        </div>
                                        <div class="row  form-group">
                                            <div class="col-5 ">
                                                <label>GST Document</label>
                                                <input type="file" name="gstdoc" class="filestyle">

                                            </div>
                                            <div class="col-5 ">
                                                <label>PAN Card</label>
                                                <input type="file" name="pandoc" class="filestyle">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row  form-group">
                                        <div class="col-5 ">
                                            <button type="submit"
                                                class="btn btn-lg btn-block btn-primary waves-effect waves-light mr-1">
                                                Submit
                                            </button>
                                        </div>
                                        <div class="col-5 ">
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
                '<select name="district" id="district" onChange="getCity();" class="form-control form-control-lg"><option value=""> -Select District -</option>';
            if (data1.status) {
                for (i = 0; i < data1.districs.length; i++) {
                    districsstr += '<option value="' + data1.districs[i].ds_id + '">' + data1.districs[i]
                        .ds_name + '</option>';
                }
            }

            districsstr += "</select>";
            $("#districbox").html(districsstr);

        }
    });
    getCity();

}
    </script>