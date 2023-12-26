<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\API\ResponseTrait;
use App\Models\TenantNoticeBoardModel;
use App\Models\OwnerNoticeModel;
use App\Models\GuestNoticeModel;


class ApiNotice extends ResourceController
{
	use ResponseTrait;

            public function GetNotice()
            
        {
                
      $teanant=new TenantNoticeBoardModel();
      $owner=new OwnerNoticeModel();

      $guest=new GuestNoticeModel();

      $tenant_id=$this->request->getPost('tenant_id');
      $owner_id=$this->request->getPost('owner_id');
      $guest_id=$this->request->getPost('guest_id');
      if($tenant_id){
            // print_r($_POST);exit();            
           $check=$teanant->where('tenant_id',$tenant_id)->where('type','tenant')->findAll();
           $response = [
                'status' => "200",
                'error' => false,
                'message' => [
                'success'=>'Notice Listed',
                
            ],
                'data'=>$check,
                
            ];
                 return $this->respondCreated($response);
       }
       if($owner_id) {
            $checkowner=$owner->where('owner_id',$owner_id)->where('type','Owner')->findAll();
             $response = [
                'status' => "200",
                'error' => false,
                'message' => [
                'success'=>'Notice Listed',
                
            ],
                'data'=>$checkowner,
                
            ];
                 return $this->respondCreated($response);
       }
       if($guest_id){

            $checkguest=$guest->where('guest_id',$guest_id)->where('type','guest')->findAll();


             $response = [
                'status' => "200",
                'error' => false,
                'message' => [
                'success'=>'Notice Listed',
                
            ],
                'data'=>$checkguest,
                
            ];
                 return $this->respondCreated($response);


       }


             

               
     }



}
