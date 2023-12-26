<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\API\ResponseTrait;
use App\Models\ChatModel;
use App\Models\TenantRegistrationModel;
use App\Models\OwnerRegisterModel;
class ApiChat extends ResourceController
{
	use ResponseTrait;

public function Chat()
            
        {
            	   
             $tenant_id=$this->request->getPost('tenant_id');
             $owner_id=$this->request->getPost('owner_id');
             $chat_desc=$this->request->getPost('chat_description');
             $date_time=$this->request->getPost('date_time');
             $is_send_me=$this->request->getPost('is_send_me');
            

             $data=[

                'tenant_id'=>$tenant_id,
                'owner_id'=>$owner_id,
                'chat_description'=>$chat_desc,
                'date_time'=>$date_time,
                'is_send_me'=>$is_send_me,
               

             ];

             $chatlist=new ChatModel();

             $chatlist->insert($data);


             $checklist=$chatlist->getTenatNameAndOwnerName($tenant_id,$owner_id);

             //echo"<pre>";print_r($checklist);exit();
            
                if($checklist){


                    $response=[

                            'status' => 200,
                            'error' => null,
                            'messages' => [
                                'success' => 'chat and List Success'
                            ],
                            'chat_list' => $checklist
                    ];

                    return $this->respondCreated($response);
                }


     }


  

}
