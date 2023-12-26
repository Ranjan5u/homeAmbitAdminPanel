<?php namespace App\Models;

use CodeIgniter\Model;

class ChatModel extends Model{
    
     protected $table = 'chat';
     protected $primaryKey = 'chat_id';
     protected $allowedFields = ['chat_id','owner_id','tenant_id','chat_description','date','date_time','is_send_me','status','time','admin_id'];

     public function getDatachart($searchArray=array(), $offset='', $limit='',$coutOnly=''){


                if($coutOnly)
                    {

                        $sql = "SELECT COUNT($this->primaryKey) as total_count FROM $this->table AS ad ";
                        
                    // print_r($sql );
                    // exit;
                    }
                    else
                    {
                        $sql = "SELECT ad.*,ow.name as oname,tet.name as tname FROM $this->table AS ad ";
                   
                      
                    }
                    
                    $sql .= " LEFT JOIN owner AS ow ON (ad.owner_id = ow.owner_id) ";
                    
                    $sql .= " LEFT JOIN tenant AS tet ON (ad.tenant_id = tet.tenant_id) ";
                      $sql .= " ";
        
                      $sql .= " WHERE 1 ";


                    if(isset($searchArray['owner_id']) && $searchArray['owner_id'])
                    {
                        $sql .= " AND ( ow.owner_id  LIKE '%".$searchArray['owner_id']."' ";
           
                        $sql .= " ) ";


                    
                    }

                     if(isset($searchArray['tenant_id']) && $searchArray['tenant_id'])
                    {
                        $sql .= " AND ( ow.tenant_id  LIKE '%".$searchArray['tenant_id']."' ";
           
                        $sql .= " ) ";


                    
                    }

                    if ((isset($searchArray['start_date'])) && (isset($searchArray['end_date']))) {
                        $sql .= " AND ( DATE_FORMAT(ad.date, '%Y-%m-%d') >= '".$searchArray['start_date']."'";

                        // print_r($sql);exit();
                         $sql .= " AND DATE_FORMAT(ad.date, '%Y-%m-%d') <= '".$searchArray['end_date']."' ) "; 
                     }


                  $sql .= " ORDER BY ".$this->primaryKey." DESC ";


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


        public function getBothChatData(){

             $sql = "SELECT ad.*, IF(ad.is_send_me='owner',(SELECT owner.name FROM owner where owner.owner_id=ad.owner_id),(SELECT owner.name FROM owner where owner.owner_id=ad.owner_id)) AS oname";


            $sql .= " IF(ad.is_send_me='tenant',(SELECT tenant.name FROM tenant where tenant.tenant_id=ad.tenant_id),(SELECT tenant.name FROM tenant where tenant.tenant_id=ad.tenant_id)) AS tname  ";


            $sql .= " FROM $this->table AS ad ";
            $sql .= " WHERE ad.owner_id = '" . $searchArray['owner_id'] . "' ";
            $sql .= " AND ad.tenant_id = '" . $searchArray['tenant_id'] . "' ";
            
             $sql .=  " UNION ";


            $sql .= " SELECT ad.*, IF(ad.is_send_me='owner',(SELECT owner.name FROM owner where owner.owner_id=ad.tenant_id),(SELECT owner.name FROM owner where owner.owner_id=ad.tenant_id)) AS oname , ";


            $sql .= " IF(ad.is_send_me='tenant',(SELECT tenant.name FROM tenant where tenant.tenant_id=ad.owner_id),(SELECT tenant.name FROM tenant where tenant.tenant_id=ad.tenant_id)) AS tname  ";


            $sql .= " FROM $this->table AS ad ";
            $sql .= " WHERE ad.owner_id = '" . $searchArray['tenant_id'] . "' ";
            $sql .= " AND ad.tenant_id = '" . $searchArray['owner_id'] . "' ";
       
             $sql .= " ORDER BY id DESC";

            
        if($limit)
        {
            $sql .= " LIMIT $offset,$limit";
        }
        
        if($showQuery)
        {
           echo  $sql;
        }
 
        $query = $this->db->query($sql);
        $result = $query->getResult();
        if($coutOnly)
        {
            
           return count($result);
        }
        

        return $result;

}
 public function getTenatNameAndOwnerName($tenant_id,$owner_id){

    $this->join('owner as own', 'own.owner_id = chat.owner_id', 'LEFT');
    $this->join('tenant as tet', 'tet.tenant_id = chat.tenant_id', 'LEFT');

    $this->select('own.owner_id,own.name as oname');

   $this->select('tet.tenant_id,tet.name as tname');
   $this->select('chat.*');
   $this->where('chat.tenant_id',$tenant_id);
   $this->where('chat.owner_id',$owner_id);
   //$this->select('chat.chat_description,is_send_me,date,date_time');

   // $this->where('owner.owner_id',$owner_id);
    $result = $this->get()->getResultArray();
    return $result;

}
 public function getOwnerNameTenatName($tenant_id,$owner_id,$admin_id){

    $this->join('owner as own', 'own.owner_id = chat.owner_id', 'LEFT');
    $this->join('tenant as tet', 'tet.tenant_id = chat.tenant_id', 'LEFT');

    $this->select('own.owner_id,own.name as oname');

   $this->select('tet.tenant_id,tet.name as tname');
   $this->select('chat.*');
   $this->where('chat.tenant_id',$tenant_id);
   $this->where('chat.owner_id',$owner_id);
   //$this->select('chat.chat_description,is_send_me,date,date_time');

   // $this->where('owner.owner_id',$owner_id);
    $result = $this->get()->getResultArray();
    return $result;

}



}
?>