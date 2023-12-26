<?php namespace App\Models;

use CodeIgniter\Model;

class TenantNoticeBoardModel extends Model{
    
     protected $table = 'tenant_notice_board';
     protected $primaryKey = 'nt_id';
     protected $allowedFields = ['nt_id','tenant_id','ten_nt_title','ten_nt_description','ten_nt_date'];

}
?>