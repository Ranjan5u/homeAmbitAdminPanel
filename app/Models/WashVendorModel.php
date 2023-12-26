<?php namespace App\Models;

use CodeIgniter\Model;

class WashVendorModel extends Model{
    
     protected $table = 'washVendor';
     protected $primaryKey = 'ven_id';
     protected $allowedFields = ['ven_id','ven_name','ven_shop_addres','ven_pincode','ven_password','user_refer','ven_date','ven_email','ven_mobile'];

    

}
?>