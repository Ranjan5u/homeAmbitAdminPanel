<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\API\ResponseTrait;
use App\Models\OwnerRegisterModel;

class ApiProfileOwner extends ResourceController
{
	use ResponseTrait;

    public function saveOwner(){
	

		$own_id=$this->request->getPost('owner_id');

        if(!$own_id>0){
            return $this->failNotFound('Owner not found');
        }


        $name=$this->request->getPost('name');
        
        $mobile=$this->request->getPost('mobile');
        $email=$this->request->getPost('email');
        $type=$this->request->getPost('type');
        $flat_no=$this->request->getPost('flat_no');
        $permanent_address=$this->request->getPost('permanent_address');
        //$password=$this->request->getPost('password');
        $city=$this->request->getPost('city');
        $state=$this->request->getPost('state');
        $pincode=$this->request->getPost('pincode');
        $register_property_add=$this->request->getPost('register_property_add');
        $registration_number=$this->request->getPost('registration_number');
        $present_address=$this->request->getPost('present_address');


		$files = $this->request->getFiles('profile_image');


		if($files)
            {
       
                if(isset($files["profile_image"]) && !empty($files["profile_image"]))
                {
                      
                        $profile_image = (isset($files['profile_image']) && !empty($files['profile_image']))? $files["profile_image"] : '';

                       

                        $profile_image ->move('uploads/essential/');
                      
                     
                        	// print_r($profile_image);exit();   

                        $profile_image = ['profile_image' =>$profile_image->getName(),
                                       ];



                }
                     
                     
                      $profile_image = (isset($profile_image) && !empty($profile_image))? $profile_image : '';
                     

                }
         



        $app_installation_date=$this->request->getPost('app_installation_date');
        $app_installation_latitude=$this->request->getPost('app_installation_latitude');
        $app_installation_lognitute=$this->request->getPost('app_installation_lognitute');
        $device_name=$this->request->getPost('device_name');
        $device_imei=$this->request->getPost('device_imei');

       //   echo"<pre>";
       // print_r($mobile);
       // exit();

       
     
        $data=[

            'name'=>$name,
            'mobile'=>$mobile,
            'email'=>$email,
            'type'=>$type,
            'flat_no'=>$flat_no,
            'permanent_address'=>$permanent_address,
            //'password'=>password_hash($password,1),
            'city'=>$city,
            'state'=>$state,
            'pincode'=>$pincode,
            'register_property_add'=>$register_property_add,
            'registration_number'=>$registration_number,
            'present_address'=>$present_address,
            'profile_image'=>$profile_image,
            
            'app_installation_date'=>$app_installation_date,
            'app_installation_latitude'=>$app_installation_latitude,
            'app_installation_lognitute'=>$app_installation_lognitute,
            'device_name'=>$device_name,
            'device_imei'=>$device_imei


        ];
       // print_r($data);exit();

         $addOwner=new OwnerRegisterModel();
      	// echo "<pre>";
      	// print_r($addtenant);exit();
       $addOwner->set($data)->where('owner_id',$own_id)->update();
         //print_r($id);exit();

         	$response[] = [
				'status' => 200,
				'error' => false,
				'message' => [
				'success'=>'Profile update successfully'
				
			],
			'image_base_url' => base_url('uploads/essential')."/",
				'data'=>$data,
				'owner_id'=>$own_id
			

				
			];
			return $this->respondCreated($response);

		}


    public function registerOwner(){


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

        
      

         if ($mobile && $email) {
            $userModel = new OwnerRegisterModel();
            $userData = $userModel->where('email', $email )->orWhere('mobile', $mobile)->first();

            if($userData){

          $response[] = [
          'status' => "404",
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

         $OwnerForReister=new OwnerRegisterModel();
        // echo "<pre>";
        // print_r($addtenant);exit();
       $own_id =$OwnerForReister->insert($data);
         //print_r($id);exit();

            $response[] = [
                'status' => "200",
                'error' => false,
                'message' => [
                'success'=>'Owner Register successfully'
                
            ],
        
                'data'=>$data,
                'Owner_id'=>$own_id
            

                
            ];
            return $this->respondCreated($response);

        }
     
     }


    }


    public function loginOwner()
{
       

        $userModel = new OwnerRegisterModel();

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
                           'owner_id'=>$userData['owner_id'],
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


