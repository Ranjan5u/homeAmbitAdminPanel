<?php namespace App\Models;

use CodeIgniter\Model;

class ChatAdminModelForGuest extends Model{
    
     protected $table = 'adminChartGuest';
     protected $primaryKey = 'guest_id';
     protected $allowedFields = ['guest_id','gus_id','admin_chat_desc','admin_id','who_send','date'];

}
?>