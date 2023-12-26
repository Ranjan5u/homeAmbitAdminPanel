<?php namespace App\Models;

use CodeIgniter\Model;

class OwnerNoticeModel extends Model{
    
     protected $table = 'owner_nt_board';
     protected $primaryKey = 'nt_id';
     protected $allowedFields = ['nt_id','owner_id','own_nt_title','own_nt_description','own_nt_date'];

}
?>