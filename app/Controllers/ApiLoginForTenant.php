<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\API\ResponseTrait;
use App\Models\TenantRegistrationModel;

class ApiLoginForTenant extends ResourceController
{
	use ResponseTrait;

public function LoginTenant()
{
	   

        $userModel = new TenantRegistrationModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
      
        $userData=$userModel->where('email',$username)->orWhere('mobile',$username)->first();
        // print_r($userData);exit();

        if(!$userData){
            return $this->failNotFound('Email or mobile not found');
        }

        $verify=password_verify($password, $userData['password']);
        if($verify){
                      $response[] = [
                            'status' => "200",
                            'error' => null,
                            'messages' => [
                                'success' => 'login successfully'
                            ],
                            'image_base_url' => base_url('uploads/essential')."/",
                           'tenant_id'=>$userData['tenant_id'],
                            'type'=>$userData['type'],
                            'name'=>$userData['name'],
                            'email'=>$userData['email'],
                            'mobile'=>$userData['mobile'],
                            'pro_image'=>$userData['pro_image'],


                        ];
                       
                        return $this->respondCreated($response);

        }else{

            return $this->failNotFound('password wrong');
        }
       
}

}
