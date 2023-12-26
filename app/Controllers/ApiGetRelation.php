<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\API\ResponseTrait;

use App\Models\TenantRegistrationModel;
use App\Models\OwnerRegisterModel;
class ApiGetRelation extends ResourceController
{
	use ResponseTrait;

public function GetTenantRelation()
            
        {
        	//print_r($_GET);exit;
            	 
        	$TenantModel=new TenantRegistrationModel();

             //$tenant_id=$this->request->getGet('tenant_id');
             // print_r($tenant_id);exit();
        	$tenant_id=$this->request->getGet('tenant_id');
        	 // print_r($tenant_id);exit();
             $data=$TenantModel->getOwnerList($tenant_id);
 				//print_r($data);exit();
            
                if($data){


                    $response=[

                            'status' => 200,
                            'error' => null,
                            'messages' => [
                                'success' => 'Tenant Listed'
                            ],
                            'Tenant_List' => $data,
                    ];

                    return $this->respondCreated($response);
                }
                else{



					return $this->failNotFound('Not tenant id found');

		
		}


     }



     public function GetOwnerRelation()
            
        {
        	//print_r($_GET);exit;
            	 
        	$OwnerModel=new OwnerRegisterModel();

             //$tenant_id=$this->request->getGet('tenant_id');
             // print_r($tenant_id);exit();
        	$owner_id=$this->request->getGet('owner_id');
        	 // print_r($tenant_id);exit();
             $data=$OwnerModel->getOwnerList($owner_id);
 				//print_r($data);exit();
            
                if($data){


                    $response=[

                            'status' => 200,
                            'error' => null,
                            'messages' => [
                                'success' => 'Owner Listed'
                            ],
                            'Tenant_List' => $data,
                    ];

                    return $this->respondCreated($response);
                }
                else{

					return $this->failNotFound('Not Owner id found');

		
		}


     }



}
