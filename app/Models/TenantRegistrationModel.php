<?php namespace App\Models;

use CodeIgniter\Model;

class TenantRegistrationModel extends Model{
    
     protected $table = 'tenant';
     protected $primaryKey = 'tenant_id';
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
          'pro_image',
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
          'owner_id',
          'date',
          'ten_rent_date',
          'ten_rent_duration',
          'ten_renewed_date',
          'ten_start_date',
          'ten_end_date',
          'ten_property_name',
          'ten_project_name'

         ];



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
   
    public function tenDropList(){

       
        $this->select('tenant.tenant_id,name');
          $result=$this->get()->getResultArray();
         return $result;
         
         }

    public function getOwnerList($tenant_id){


       
        $this->join('owner as ow', 'ow.tenant_id = tenant.tenant_id', 'left');
     
        $this->select('tenant.tenant_id,tenant.name as tname');
        $this->select('ow.owner_id,ow.name as oname');
       
        $this->where('tenant.tenant_id',$tenant_id);
        $result = $this->get()->getResultArray();
        //echo $this->getlastQuery();
        return $result;




              
    }
    
 public function gettenantList($owner_id){


       
        $this->join('owner as ow', 'ow.tenant_id = tenant.tenant_id', 'left');

        $this->select('ow.*');
        $this->select('tenant.*');
        $this->where('owner.owner_id',$owner_id);
        $result = $this->get()->getResultArray();
        //echo $this->getlastQuery();
        return $result;




              
    }
    public function getDataAllTenant($id=0){


          $this->join('owner as own', 'own.owner_id = tenant.owner_id', 'left');
     
        $this->select('tenant.*');
        $this->select('own.name as oname');
        $this->where('tenant.tenant_id',$id);
        $result = $this->get()->getResultArray();
        return $result;


        //echo $this->getlastQuery();
      


    }
     



}
?>