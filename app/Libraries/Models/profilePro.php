<?php namespace App\Models;

use CodeIgniter\Model;

class profilePro extends Model{
    
     protected $table = 'pro';
     protected $primaryKey = 'id';
     protected $allowedFields = ['id','profile_image'];


}
?>