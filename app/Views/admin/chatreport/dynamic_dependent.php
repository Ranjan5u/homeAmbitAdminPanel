
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   
</head>
<body>
    <div class="container">
      
        <span id="message"></span>
        <div class="card">
           
            <div class="card-body">
                <div class="row justify-content-md-center">
                    <div class="col col-lg-6">
                        <div class="form-group">
                            <select name="country" id="country" class="form-control input-lg">
                                <option value="">Select Country</option>
                                <?php
                                foreach($country as $row)
                                {
                                    echo '<option value="'.$row["country_id"].'">'.$row["country_name"].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="state" id="state" class="form-control input-lg">
                                <option value="">Select State</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="city" id="city" class="form-control input-lg">
                                <option value="">Select City</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
</body>
</html>

<script>

$(document).ready(function(){

    $('#country').change(function(){

        var country_id = $('#country').val();

       
      
        var action = 'get_state';

        if(country_id != '')
        {
            $.ajax({
                url:"<?php echo site_url('DropdownAjaxController/action'); ?>",
               
                method:"POST",
                data:{country_id:country_id, action:action},
                dataType:"JSON",
                success:function(data)
                {
                    var html = '<option value="">Select State</option>';

                    for(var count = 0; count < data.length; count++)
                    {

                        html += '<option value="'+data[count].state_id+'">'+data[count].state_name+'</option>';

                    }

                    $('#state').html(html);
                }
            });
        }
        else
        {
            $('#state').val('');
        }
        $('#city').val('');
    });

    $('#state').change(function(){

        var state_id = $('#state').val();

        var action = 'get_city';

        if(state_id != '')
        {
            $.ajax({
                url:"<?php echo site_url('DropdownAjaxController/action'); ?>",
                method:"POST",
                data:{state_id:state_id, action:action},
                dataType:"JSON",
                success:function(data)
                {
                    var html = '<option value="">Select City</option>';

                    for(var count = 0; count < data.length; count++)
                    {
                        html += '<option value="'+data[count].city_id+'">'+data[count].city_name+'</option>';
                    }

                    $('#city').html(html);
                }
            });
        }
        else
        {
            $('#city').val('');
        }

    });

});

</script>
