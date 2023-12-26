<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\API\ResponseTrait;
use App\Models\OwnerRegisterModel;
use App\Models\TenantRegistrationModel;
use App\Models\GuestAllTypeModel;


class ApiInvitation extends ResourceController
{
    use ResponseTrait;

public function GetTenantInvitation()
{
      

      $model=new TenantRegistrationModel();
      $owner=new OwnerRegisterModel();

      $guest=new GuestAllTypeModel();

      $tenant_id=$this->request->getPost('tenant_id');
      $owner_id=$this->request->getPost('owner_id');
      $guest_id=$this->request->getPost('id');
      if($tenant_id){
       
           $check=$model->where('tenant_id',$tenant_id)->where('type','tenant')->first();
       }
       if($owner_id) {
            $checkowner=$owner->where('owner_id',$owner_id)->where('type','Owner')->first();
       }
       if($guest_id){

            $checkguest=$guest->where('id',$guest_id)->where('type','guest')->first();

       }


             $response = [
                'status' => "200",
                'error' => false,
                'message' => [
                'success'=>'Success'
                
            ],
                
            ];
            return $this->respondCreated($response);



    
}

}