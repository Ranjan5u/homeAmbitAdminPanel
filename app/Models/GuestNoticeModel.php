<?php namespace App\Models;

use CodeIgniter\Model;

class GuestNoticeModel extends Model{
    
     protected $table = 'guest_nt_board';
     protected $primaryKey = 'nt_id';
     protected $allowedFields = ['nt_id','guest_id','guest_title','guest_description','guest_nt_date'];

}
?>