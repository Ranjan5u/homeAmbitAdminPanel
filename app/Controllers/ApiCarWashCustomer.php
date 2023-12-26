<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\API\ResponseTrait;
use App\Models\WashCustomerModel;

class ApiCarWashCustomer extends ResourceController
{
	use ResponseTrait;

public function createCarWashCustomer()
{
      

        $customer_model=new WashCustomerModel();

    // echo "<pre>";print_r($customer_model);exit();
        $cus_name=$this->request->getPost('cust_name');
        $cus_mobile=$this->request->getPost('cust_Mobile');
        $cust_pincode=$this->request->getPost('cust_pincode');
        $cust_bike_number=$this->request->getPost('cust_bike_number');
        $cust_address=$this->request->getPost('cust_address');
        $cust_location=$this->request->getPost('cust_location');
        $cust_email=$this->request->getPost('cust_email');

            $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                 $res = "M";
                 for ($i = 0; $i < 4; $i++) {
                    $res .= $chars[mt_rand(0, strlen($chars)-1)];     
                     }

         $cust_password=$this->request->getPost('cust_password');


      
        $check=$customer_model->where('cust_Mobile',$cus_mobile)->first();

        if($check){

             return $this->failNotFound('Mobile already Exits!');

        }
        else{



         $data=[

            'cust_name'=>$cus_name,
            'cust_Mobile'=>$cus_mobile,
            'cust_pincode'=>$cust_pincode,
            'cust_bike_number'=>$cust_bike_number,
            'cust_address'=>$cust_address,
            'cust_location'=>$cust_location,
            'cust_user_refer'=>$res,
            'cust_email'=>$cust_email,
            'cust_password'=>password_hash($cust_password,1),
          
      
        ];

       // echo "<pre>";print_r($data);exit();

        $getcus_id=$customer_model->insert($data);
        $cus_idd="$getcus_id";

        $response=[     
          'messages' => [
            'status'=>200,
              'success' => 'Customer Registered',

          ],
         
                'data'=>$data,
                'cus_id'=>$cus_idd
                

            ];
        return $this->respond($response);
  

}
}

    public function login()
    {

        $username = $this->request->getPost( 'cust_Mobile' );
        
        $password = $this->request->getPost( 'cust_password' );
          // print_r( $password );
          //   die;
     
       
            $userModel = new WashCustomerModel();
            $userData = $userModel->where('cust_Mobile',$username)->first();

            // print_r($userData);
            //exit();

            if ( $userData ) {

                $dbPassword = $userData['cust_password'];
                    
                 // echo $dbPassword;exit();
                 // print_r($dbPassword);
                 //  exit();

                if ( password_verify( $password, $dbPassword ) ) {
                        
                      
                    //echo "password matched";exit();

                    // if ( $dbPassword == $password ) {
                        
                    //      echo "password verify";exit();


                      $data = array(
                        "cust_id" =>$userData['cust_id'],
                        "cust_name" =>$userData['cust_name'],
                        "cust_Mobile"=>$userData['cust_Mobile'],
                        "cust_pincode"=>$userData['cust_pincode'],
                        "cust_bike_number"=>$userData['cust_bike_number'],
                        "cust_address"=>$userData['cust_address'],
                        "cust_location"=>$userData['cust_location'],
                        "cust_user_refer"=>$userData['cust_user_refer'],
                        "cust_email"=>$userData['cust_email'],
                      );

                       // print_r($data);
                       //  exit();



                      $response = [
                            'status' => 201,
                            'error' => null,
                            'messages' => [
                                'success' => 'Login successfully'
                            ],
                            'customer_detail' => $data,
                        ];
                        return $this->respondCreated($response);
                        

                //        else {
                //           return $this->failNotFound('Your  account deactivated.');
                //     }
                //     } else {
                //         return $this->failNotFound('Invalid OTP');
                //     }
                // } else {
                //     return $this->failNotFound('Invalid password');
                // }

                
                   

                }else{

                    return $this->failNotFound('password does not matched');
                }


}
else{
    return $this->failNotFound('Mobile number not valid');
}

}

}