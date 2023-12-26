<?php namespace App\Models;

use CodeIgniter\Model;

class WashCustomerModel extends Model{
    
     protected $table = 'wash_customer';
     protected $primaryKey = 'cust_id';
     protected $allowedFields = ['cust_id','cust_name','cust_Mobile','cust_pincode','cust_bike_number','cust_address','cust_location','cust_user_refer','cust_washing_type','cust_password','cust_created_date','cust_email'];

    

}
?>