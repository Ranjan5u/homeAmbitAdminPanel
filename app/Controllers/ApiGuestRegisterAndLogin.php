<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\API\ResponseTrait;
use App\Models\GuestAllTypeModel;

class ApiGuestRegisterAndLogin extends ResourceController
{
    use ResponseTrait;

public function saveguest()
{
        $mobile=$this->request->getPost('mobile');
        $email=$this->request->getPost('email');
        $type=$this->request->getPost('type');
        $password=$this->request->getPost('password');
   
        $app_installation_date=$this->request->getPost('app_installation_date');
        $app_installation_latitude=$this->request->getPost('app_installation_latitude');
        $app_installation_lognitute=$this->request->getPost('app_installation_lognitute');
        $device_name=$this->request->getPost('device_name');
        $device_imei=$this->request->getPost('device_imei');
        $installation_address=$this->request->getPost('installation_address');


        // $files = $this->request->getFiles('file_image');
        // if($files)
        //     {
       
        //         if(isset($files["file_image"]) && !empty($files["file_image"]))
        //         {
                      
        //                 $file_image = (isset($files['file_image']) && !empty($files['file_image']))? $files["file_image"] : '';

        //                 $file_image ->move('uploads/essential/');
       
        //                     // print_r($file_image);exit();   

        //                 $file_image = ['file_image' =>$file_image->getName(),
        //                                ];

        //         }
                     
                     
        //               $file_image = (isset($file_image) && !empty($file_image))? $file_image : '';

        //         }

      
       //   echo"<pre>";
       // print_r($mobile);
       // exit();

         if ($mobile && $email) {
            $userModel = new GuestAllTypeModel();
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

            'mobile'=>$mobile,
            'email'=>$email,
            'type'=>$type,
          
            
            'password'=>password_hash($password,1),

            'app_installation_date'=>$app_installation_date,
            'app_installation_latitude'=>$app_installation_latitude,
            'app_installation_lognitute'=>$app_installation_lognitute,
            'device_name'=>$device_name,
            'device_imei'=>$device_imei,
            'installation_address'=>$installation_address
            

        ];

       // print_r($data);exit();

         $tenantForReister=new GuestAllTypeModel();
        // echo "<pre>";
        // print_r($addtenant);exit();
       $ten_id =$tenantForReister->insert($data);
         //print_r($id);exit();

        $response[]= [
        'status' => "200",
        'error' => false,
        'message' => [
        'success'=>'Guest Register Successfully'
        
      ],
    
        'data'=>$data,
        'guest_id'=>$ten_id
      
        
      ];
      return $this->respondCreated($response);

        }
     
  }
  
}

}