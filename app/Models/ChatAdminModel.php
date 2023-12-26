<?php namespace App\Models;

use CodeIgniter\Model;

class ChatAdminModel extends Model{
    
     protected $table = 'adminChart';
     protected $primaryKey = 'id';
     protected $allowedFields = ['id','owner_id','admin_chat_description','admin_id','date','who_send'];

   // public function getOwnername($owner_id=0){


   //      $this->join('owner as own', 'own.owner_id = adminChart.owner_id', 'left');
     
   //      $this->select('owner.*');
   //         // $this->select('adminChart.*');
   //      $this->where('owner.owner_id',$owner_id);
   //      $result = $this->get()->getResultArray();
   //      //echo $this->getlastQuery();
   //      return $result;


   // }

    // public function getOwnername($owner_id=0){

     
     
       
    //     $this->join('owner as own', 'own.owner_id = adminChart.owner_id', 'left');
     
    //     $this->select('owner.name as oname');
    //    // $this->select('tet.name as tname');
    //     $this->where('owner.owner_id',$owner_id);
    //     $result = $this->get()->getResultArray();
    //     //echo $this->getlastQuery();
    //     return $result;


    // }
}
?>