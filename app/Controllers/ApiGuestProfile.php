<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\API\ResponseTrait;
use App\Models\GuestAllTypeModel;

class ApiGuestProfile extends ResourceController
{
	use ResponseTrait;

    public function UpdateProfileGuest(){
	
     
        $model=new GuestAllTypeModel();
       // echo "<pre>";print_r($model);exit();

        $id=$this->request->getPost('id');
        $name=$this->request->getPost('name');
        $mobile =$this->request->getPost('mobile');
        $email=$this->request->getPost('email');
        $type=$this->request->getPost('type');
      
      
        $city=$this->request->getPost('city');
        $state=$this->request->getPost('state');
        $pincode=$this->request->getPost('pincode');
       
        $address=$this->request->getPost('address');

         $app_installation_date=$this->request->getPost('app_installation_date');
         $app_installation_latitude=$this->request->getPost('app_installation_latitude');
         $app_installation_lognitute=$this->request->getPost('app_installation_lognitute');
         $device_name=$this->request->getPost('device_name');
         $device_imei=$this->request->getPost('device_imei');
         $installation_address=$this->request->getPost('installation_address');
       // //   echo"<pre>";
       // print_r($mobile);
       // exit();

       

             $icon_file=$this->request->getFile('file_image');

             if($icon_file){

            $icon_file->move('uploads/essential');

            }


           // print_r($icon_file);exit();
        $data=[

            'name'=>$name,
            'mobile'=>$mobile,
            'email'=>$email,
            'type'=>$type,
           
            'city'=>$city,
            'state'=>$state,
            'pincode'=>$pincode,
           
            'address'=>$address,
            
             'app_installation_date'=>$app_installation_date,
             'app_installation_latitude'=>$app_installation_latitude,
             'app_installation_lognitute'=>$app_installation_lognitute,
             'device_name'=>$device_name,
             'device_imei'=>$device_imei,
             'installation_address'=>$installation_address,
             'file_image'=>$icon_file->getName()


        ];

       $model->set($data)->where('id',$id)->update();
      

          $response[] = [
                'status' => 200,
                'error' => false,
                'message' => [
                'success'=>'Guest Profile update successfully'
                
            ],
            'image_base_url' => base_url('uploads/essential')."/",
                'data'=>$data,
                'id'=>$id
            

                
            ];
            return $this->respondCreated($response);



        }
 }





