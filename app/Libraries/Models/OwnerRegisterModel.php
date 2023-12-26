<?php namespace App\Models;

use CodeIgniter\Model;

class OwnerRegisterModel extends Model{
    
     protected $table = 'owner';
     protected $primaryKey = 'owner_id';
     protected $allowedFields = [
          'name',
          'mobile',
          'email',
          'register_property_add',
          'registration_number',
          'present_address',
          'permanent_address',
          'pincode',
          'city',
          'state',
          'profile_image',
          'app_installation_date',
          'app_installation_latitude',
          'app_installation_lognitute',
          'device_name',
          'device_imei',
          'password',
          'flat_no',
          'type',
          'user_status',
          'installation_address',
          'tenant_id',
          'date',
          'own_property_name',
          'own_project_name',
          'admin'
         ];

         public function getDatachart($searchArray=array(), $offset='', $limit='',$coutOnly=''){


                if($coutOnly)
                    {

                        $sql = "SELECT COUNT($this->primaryKey) as total_count FROM $this->table AS ad ";
                        
                   
                    }
                    
                
                else
                {
                $sql = "SELECT ad.*,tet.name as tname,tet.owner_id as own_id,tet.flat_no FROM $this->table AS ad ";
                  
       
                }
                    $sql .= " LEFT JOIN owner AS ow ON (ad.owner_id = ow.owner_id) "; 
                        
                      


                    $sql .= " LEFT JOIN tenant AS tet ON (ad.tenant_id = tet.tenant_id) "; 

                      $sql .= " ";
        
                      $sql .= " WHERE 1 ";

                    // print_r($sql);exit();

                    if(isset($searchArray['owner_id']) && $searchArray['owner_id'])
                    {
                        $sql .= " AND ( ow.owner_id  LIKE '%".$searchArray['owner_id']."' ";
           
                        $sql .= " ) ";


                    
                    }

                     if(isset($searchArray['tenant_id']) && $searchArray['tenant_id'])
                    {
                        $sql .= " AND ( tet.tenant_id  LIKE '%".$searchArray['tenant_id']."' ";
           
                        $sql .= " ) ";


                    
                    }

                    if ((isset($searchArray['start_date'])) && (isset($searchArray['end_date']))) {
                        $sql .= " AND ( DATE_FORMAT(ad.date, '%Y-%m-%d') >= '".$searchArray['start_date']."'";

                        // print_r($sql);exit();
                         $sql .= " AND DATE_FORMAT(ad.date, '%Y-%m-%d') <= '".$searchArray['end_date']."' ) "; 
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

                     // echo $this->getLastQuery();exit;

                    return $result;

                   } 

       public function getDataTenant($searchArray=array(), $offset='', $limit='',$coutOnly=''){


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
             // print_r($sql);exit;
          
             
            
             
              $sql .= " OR ad.mobile LIKE '".$searchArray['txtsearch']."%' ";
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


    public function dropList(){

       

        $this->select('owner.owner_id,name');
        $result=$this->get()->getResultArray();
        return $result;



    }  


     public function getOwnerList($owner_id){


       
        $this->join('tenant as tet', 'tet.tenant_id = owner.tenant_id', 'left');
     
        $this->select('owner.owner_id,owner.name as oname');
        $this->select('tet.tenant_id,tet.name as tname');
       
        $this->where('owner.owner_id',$owner_id);
        $result = $this->get()->getResultArray();
        //echo $this->getlastQuery();
        return $result;


              
    }
    public function getdataAllOwner($id=0){

     
     
       
        $this->join('tenant as tet', 'tet.tenant_id = owner.tenant_id', 'left');
     
        $this->select('owner.*');
        $this->select('tet.name as tname');
        $this->where('owner.owner_id',$id);
        $result = $this->get()->getResultArray();
        //echo $this->getlastQuery();
        return $result;


    }

  // public function getownername(){

     
     
       
  //        $this->join('adminChart as adchart', 'adchart.owner_id = owner.owner_id', 'left');
     
  //       $this->select('owner.*');
  //      // $this->select('tet.name as tname');
  //      // $this->where('owner.owner_id',$owner_id);
  //       $result = $this->get()->getResultArray();
  //       //echo $this->getlastQuery();
  //       return $result;


  //   }
}
?>