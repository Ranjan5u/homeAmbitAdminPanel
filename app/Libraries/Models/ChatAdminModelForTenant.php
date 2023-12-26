<?php namespace App\Models;

use CodeIgniter\Model;

class ChatAdminModelForTenant extends Model{
    
     protected $table = 'adminChartTenant';
     protected $primaryKey = 'id';
     protected $allowedFields = ['id','tenant_id','admin_chat_desc','admin_id','date','who_send'];

   
}
?>