<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\API\ResponseTrait;

use App\Models\TenantRegistrationModel;

class ApiGetByIdTenant extends ResourceController
{
	use ResponseTrait;

	public function GetByTenant()
	{
		

		$getTenant=new TenantRegistrationModel();

		$tenant_id=$this->request->getGet('tenant_id');


		$data=$getTenant->where('tenant_id',$tenant_id)->first();
		
		  if ($data) {
                $response[] = [
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