<?php namespace App\Models;

use CodeIgniter\Model;

class AdminBaseModel extends Model{
    
     protected $table = 'all_type_guest';
     protected $primaryKey = 'id';
     protected $allowedFields = ['id','name','mobile','email','password','file_image','address','type','created_date'];


 public function getDataGuest($searchArray=array(), $offset='', $limit='',$coutOnly=''){


     if($coutOnly)
          {

           $sql = "SELECT COUNT($this->primaryKey) as total_count FROM $this->table AS ad ";
                        
          // print_r($sql );
          // exit;
               }
          else
           {
                $sql = "SELECT ad.* FROM $this->table AS ad ";
                       
                        
           }
          $sql .= " ";
        
           $sql .= " WHERE 1 ";


      if(isset($searchArray['txtsearch']) && $searchArray['txtsearch'])
          {
              $sql .= " AND ( ad.name LIKE '%".$searchArray['txtsearch']."%' ";
          
              $sql .= " OR ad.mobile LIKE '".$searchArray['txtsearch']."%' ";
               $sql .= " OR ad.email LIKE '".$searchArray['txtsearch']."%' ";
   
              $sql .= " ) ";

              
          }

          $sql .= " AND  ad.type = 'admin'";

          $sql .= " ORDER BY ".$this->primaryKey." DESC";



           if($limit)
        {
            $sql .= " LIMIT $offset,$limit";
        }

      
        $query = $this->db->query($sql);
        $result = $query->getResult();
        
        if($coutOnly)
        {
            return $result[0]->total_count;
        }



        return $result;

       }  
   
        public function getadminid($id=0){

        $this->select('all_type_guest.*');
        $this->where('all_type_guest.id',$id);
        $result = $this->get()->getResultArray();
        //echo $this->getlastQuery();
        return $result;

}

 
        

}
?>