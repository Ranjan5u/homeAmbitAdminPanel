<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\API\ResponseTrait;
use App\Models\AdminBaseModel;

class ApiAdmin extends ResourceController
{
	use ResponseTrait;

public function saveadmin()
{
        $name=$this->request->getPost('name');
        $mobile=$this->request->getPost('mobile');
        $email=$this->request->getPost('email');
        $type=$this->request->getPost('type');
        $password=$this->request->getPost('password');
        $address=$this->request->getPost('address');

        $files = $this->request->getFiles('file_image');
        if($files)
            {
       
                if(isset($files["file_image"]) && !empty($files["file_image"]))
                {
                      
                        $file_image = (isset($files['file_image']) && !empty($files['file_image']))? $files["file_image"] : '';

                        $file_image ->move('uploads/essential/');
       
                            // print_r($file_image);exit();   

                        $file_image = ['file_image' =>$file_image->getName(),
                                       ];

                }
                     
                     
                      $file_image = (isset($file_image) && !empty($file_image))? $file_image : '';

                }

      
       //   echo"<pre>";
       // print_r($mobile);
       // exit();

         if ($mobile && $email) {
            $userModel = new AdminBaseModel();
            $userData = $userModel->where('email', $email )->orWhere('mobile', $mobile)->first();

            if($userData){

          $response = [
          'status' => 404,
          'error' => false,
          'message' => [
          'success'=>'Email/mobile Already Exists'   
          ]
        
          ];
          return $this->respondCreated($response);

        }
     
     else{

            
        $data=[

            'name'=>$name,
            'mobile'=>$mobile,
            'email'=>$email,
            'type'=>$type,
            'password'=>password_hash($password,1),
            'address'=>$address,
            'file_image'=>$file_image,
            

        ];

       // print_r($data);exit();

         $tenantForReister=new AdminBaseModel();
      	// echo "<pre>";
      	// print_r($addtenant);exit();
       $ten_id =$tenantForReister->insert($data);
         //print_r($id);exit();

         	$response[] = [
				'status' => 200,
				'error' => false,
				'message' => [
				'success'=>'Client Register successfully'
				
			],
		
				'data'=>$data,
				'id'=>$ten_id
			

				
			];
			return $this->respondCreated($response);

		}
     
  }
  
}

public function Login()
{
       

        $userModel = new AdminBaseModel();

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
                           'id'=>$userData['id'],
                            'type'=>$userData['type'],
                            'name'=>$userData['name'],
                            'email'=>$userData['email'],
                            'mobile'=>$userData['mobile'],
                            'file_image'=>$userData['file_image'],


                        ];
                       
                        return $this->respondCreated($response);

        }else{

            return $this->failNotFound('password wrong');
        }
       
}
}