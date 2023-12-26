<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\API\ResponseTrait;
use App\Models\OwnerRegisterModel;

class ApiGetByIdOwner extends ResourceController
{
	use ResponseTrait;

    public function GetByOwner(){
	   

        $getOwner=new OwnerRegisterModel();

        $ownerid=$this->request->getGet('owner_id');


        $data=$getOwner->where('owner_id',$ownerid)->first();
        
          if ($data) {
                $response[] = [
                    'status' => 200,
                    'error' => null,
                    'messages' => [
                        'success' => 'Owner listed successfully'
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
              'success' => 'No OwnerID data found'
          ]
           
           

            ];
            return $this->respond($response);

        
        }


	
}



}


