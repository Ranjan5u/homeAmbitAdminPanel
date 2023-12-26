<?php namespace App\Models;

use CodeIgniter\Model;

class Home_Advertisement extends Model{
    
     protected $table = 'homeAdvertisement';
     protected $primaryKey = 'ad_id';
     protected $allowedFields = ['ad_id','adt_name','adt_file','adt_date'];

  
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

          

      if(isset($searchArray['adt_name']) && $searchArray['adt_name'])
          {
                
              $sql .= " AND ( ad.adt_name LIKE '%".$searchArray['adt_name']."' ";
            
             $sql .= " ) ";
         
         }
 
        $sql .= " ORDER BY ad . " . $this->primaryKey . " DESC ";




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