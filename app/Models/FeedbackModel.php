<?php namespace App\Models;

use CodeIgniter\Model;

class FeedbackModel extends Model{
    
     protected $table = 'feedback';
     protected $primaryKey = 'id';
     protected $allowedFields = ['id','phone','type','email','title','description','date','users_id'];


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
              $sql .= " AND ( ad.phone LIKE '%".$searchArray['txtsearch']."%' ";
     
               $sql .= " OR ad.email LIKE '".$searchArray['txtsearch']."%' ";
   
              $sql .= " ) ";

              
          }


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


}

?>