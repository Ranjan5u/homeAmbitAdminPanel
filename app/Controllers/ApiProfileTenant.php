<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\API\ResponseTrait;
use App\Models\TenantRegistrationModel;

use App\Models\profilePro;

class ApiProfileTenant extends ResourceController
{
	use ResponseTrait;

public function saveTenant()
{
	

		$ten_id=$this->request->getPost('tenant_id');

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

         $app_installation_date=$this->request->getPost('app_installation_date');
         $app_installation_latitude=$this->request->getPost('app_installation_latitude');
         $app_installation_lognitute=$this->request->getPost('app_installation_lognitute');
         $device_name=$this->request->getPost('device_name');
        $device_imei=$this->request->getPost('device_imei');
          $installation_address=$this->request->getPost('installation_address');
       // //   echo"<pre>";
       // print_r($mobile);
       // exit();

       

             $icon_file=$this->request->getFile('pro_image');

             if($icon_file){

            $icon_file->move('uploads/essential');

            }


           // print_r($icon_file);exit();
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
            
            
             'app_installation_date'=>$app_installation_date,
             'app_installation_latitude'=>$app_installation_latitude,
             'app_installation_lognitute'=>$app_installation_lognitute,
             'device_name'=>$device_name,
             'device_imei'=>$device_imei,
             'installation_address'=>$installation_address,
             'pro_image'=>$icon_file->getName()


        ];


        //echo "<pre>";print_r($data);exit();

         $addtenant=new TenantRegistrationModel();
      	// echo "<pre>";
      	// print_r($addtenant);exit();
       $addtenant->set($data)->where('tenant_id',$ten_id)->update();
         //print_r($id);exit();

         	$response[] = [
				'status' => 200,
				'error' => false,
				'message' => [
				'success'=>'Profile update successfully'
				
			],
			'image_base_url' => base_url('uploads/essential')."/",
				'data'=>$data,
				'tenant_id'=>$ten_id
			

				
			];
			return $this->respondCreated($response);

		}

    public function profileRequest(){

        $profilePro=new profilePro();


        $files = $this->request->getFiles('pro_image');


        if($files->isValid()){
            
            
            
        }


        $data=[
             'pro_image'=>$files
        ];

    }



}


