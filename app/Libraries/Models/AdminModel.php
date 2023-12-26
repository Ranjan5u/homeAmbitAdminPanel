<?php namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model{
    
     protected $table = 'admin';
     protected $primaryKey = 'id';
     protected $allowedFields = ['id','name','fname','lname','email','mobile','password','admin_created','user_status','admin_type','production_unit_type','temp_password','os','phone_model','lat','long','location','user_name','company_name','state','city','gst_no','address','pan_no','user_refer','refer_by','instatallation_date','point','file_image','created_date'];

	// public function savedata($arrSaveData){

    //     $this->save($arrSaveData);
        
    //     return $this->getInsertID();
    // }

    function checkAdminLogin($username,$password){

		$txtreturn = false;

        $objResult =  $this->asObject()
	                        ->where(['email' => $username])
	                        ->first();

			if($objResult) {
                       
			$dbPassword = $objResult->password;
			
            if(password_verify($password,$dbPassword))
				{
                    if($objResult->user_status)
                    {
                        $adminSession = array(
                            'admin_id' => $objResult->id,
                            'admin_email'   => $objResult->email,
                            'admin_name'   => $objResult->fname,
                            'admin_type'   => $objResult->admin_type,
                            'production_unit_type'   => $objResult->production_unit_type,
                            'isAdminLoggedIn' 	=> TRUE,
                            'adminLoggedIn'   => TRUE,
                        );
                                            
                    $session = session();
                    $session->set($adminSession);
                    
                        $txtreturn = 1;
                    }
                    else
                    {
                        $txtreturn = 2;
                    }
				}
				
			}

			return $txtreturn;
		}

    public function getData($searchArray=array(), $offset='', $limit='',$coutOnly='')
   {
        if($coutOnly)
        {
            $sql = "SELECT COUNT($this->primaryKey) as total_count FROM $this->table AS ad ";
        }
        else
        {
            $sql = "SELECT ad.* FROM $this->table AS ad ";
        }
        $sql .= " ";
        $sql .= " WHERE 1 ";
        if(isset($searchArray['txtsearch']) && $searchArray['txtsearch'])
        {
            $sql .= " AND ( ad.email LIKE '".$searchArray['txtsearch']."%' ";
            $sql .= " OR ad.mobile LIKE '".$searchArray['txtsearch']."%' )";
        }
        // if(isset($searchArray['user_type']) && $searchArray['user_type'])
        // {
        //  $sql .= " AND  ad.admin_type = '".$searchArray['user_type']."' ";
        // }

        // if(isset($searchArray['saleshead']) && $searchArray['saleshead'])
        // {
        //  $sql .= " AND  ad.created_by = '".$searchArray['saleshead']."' ";
        // }

        $sql .= " AND  ad.admin_type != 'admin'";

       $sql .= " ORDER BY ".$this->primaryKey." ASC";

        if($limit)
        {
            $sql .= " LIMIT $offset,$limit";
        }

       // echo  $sql;

        $query = $this->db->query($sql);
        $result = $query->getResult();
        
        if($coutOnly)
        {
            return $result[0]->total_count;
        }

        return $result;
    }

    public function getSubAdmindetail($id)
    {
        $arrResult =  $this->asArray()
                    ->where(['id' => $id])
                    ->first();

        return $arrResult;
    }

    public function getchilds($userid)
    {

            $sql = "SELECT ad.id FROM $this->table AS ad ";
            
            $sql .= " ";
            $sql .= " WHERE 1 ";
           
            $sql .= " AND  ad.created_by =".$userid;
            $sql .= " AND  ad.admin_type = 'salesexecutive' ";

            $query = $this->db->query($sql);
            $result = $query->getResult('array');
        return  $result ;
    }

    public function getAdmin(){
    //     // $this->db->select('*');
    //     // $this->db->from('admin');
    //     // $this->db->where('user_name');
    //     // $query=$this->db->get();
    //     // return $query->result_array();


        return $this
                    ->db->table('admin')
                    ->select('fname')
                    ->where('superdistributor,distributor,retailer');
       

    }

    public function getAdminData(){
        $query = $this->db->query('select * from admin');
       return $query->getResult();
    }

    // public function fetchData($id=false){
    //     if($id== false){
    //         return $this->findAll();

    //     }else{
    //         return $this->getWhere(['id'=>$id]);
    //     }
    // }


    // public function getSuperDistributer(){
    //      $query = 'select * from admin where fname';
    //    return $query;


    

}



?>
