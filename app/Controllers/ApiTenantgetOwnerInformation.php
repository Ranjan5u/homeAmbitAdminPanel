<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\API\ResponseTrait;
use App\Models\OwnerRegisterModel;

class ApiTenantgetOwnerInformation extends ResourceController
{
	use ResponseTrait;

public function GetOwnerInformation()
{
	  
      $OwnerModel=new OwnerRegisterModel();

        $tenant_id=$this->request->getGet('tenant_id');


        $data=$OwnerModel->where('tenant_id',$tenant_id)->find();
          
          if ($data) {
                $response = [
                    'status' => 200,
                    'error' => null,
                    'messages' => [
                        'success' => 'Owner listed successfully'
                    ],
                    //'image_base_url' => base_url('uploads/essential')."/",
                    'OwnerID' => $data,
                ];


                return $this->respondCreated($response);        
        
    }
    else{


        $response[]=[
          'status'   => 201,
          'error'    => null,
          'messages' => [
              'success' => 'No OwnerID data found'
          ]
           
           

            ];
            return $this->respond($response);

        
        }
 


}

}
