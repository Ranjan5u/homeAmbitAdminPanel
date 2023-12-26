<?php namespace App\Models;

use CodeIgniter\Model;

class RelationListModel extends Model{
    
     protected $table = 'relation_list';
     protected $primaryKey = 'relation_id';
     protected $allowedFields = ['relation_id','owner_id','tenant_id','flat_no','datetime'];

}