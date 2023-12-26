<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\API\ResponseTrait;
use App\Models\TenantRegistrationModel;

class ApiOwnergetTenantInformation extends ResourceController
{
	use ResponseTrait;

public function GetTenantInformation()
{
	  
      $TenantModel=new TenantRegistrationModel();

        $owner_id=$this->request->getGet('owner_id');


        $data=$TenantModel->where('owner_id',$owner_id)->find();
          
          if ($data) {
                $response = [
                    'status' => 200,
                    'error' => null,
                    'messages' => [
                        'success' => 'Tenant listed successfully'
                    ],
                    //'image_base_url' => base_url('uploads/essential')."/",
                    'TenantID' => $data,
                ];


                return $this->respondCreated($response);        
        
    }
    else{


        $response[]=[
          'status'   => 201,
          'error'    => null,
          'messages' => [
              'success' => 'No TenantID data found'
          ]
           
           

            ];
            return $this->respond($response);

        
        }
 


}

}
