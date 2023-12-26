<?php namespace App\Models;

use CodeIgniter\Model;

class TestProfileUpdateModel extends Model{
    
     protected $table = 'testmodelupdate';
     protected $primaryKey = 'id';
     protected $allowedFields = ['id','name'];

}