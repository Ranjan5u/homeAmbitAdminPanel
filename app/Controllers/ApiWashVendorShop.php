<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\API\ResponseTrait;
use App\Models\WashVendorModel;

class ApiWashVendorShop extends ResourceController
{
	use ResponseTrait;

public function createCarWashVendor()
{
      

        $customer_model=new WashVendorModel();

    // echo "<pre>";print_r($customer_model);exit();
        $ven_name=$this->request->getPost('ven_name');
        $ven_shop_addres=$this->request->getPost('ven_shop_addres');
        $ven_pincode=$this->request->getPost('ven_pincode');
        $ven_password=$this->request->getPost('ven_password');
        $ven_mobile=$this->request->getPost('ven_mobile');
        $ven_email=$this->request->getPost('ven_email');

            $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                 $res = "M";
                 for ($i = 0; $i < 4; $i++) {
                    $res .= $chars[mt_rand(0, strlen($chars)-1)];     
                     }

       


      
        $check=$customer_model->where('cust_Mobile',$cus_mobile)->first();

        if($check){

             return $this->failNotFound('Mobile already Exits!');

        }
        else{



         $data=[

            'ven_name'=>$ven_name,
            'ven_shop_addres'=>$ven_shop_addres,
            'ven_pincode'=>$ven_pincode,
            'user_refer'=>$res,
            'ven_email'=>$ven_email,
            'ven_password'=>password_hash($ven_password,1),
            'ven_mobile'=>$ven_mobile,
      
        ];

       // echo "<pre>";print_r($data);exit();

        $getcus_id=$customer_model->insert($data);
        $cus_idd="$getcus_id";

        $response=[     
          'messages' => [
            'status'=>200,
              'success' => 'Vendor Shop Registered',

          ],
         
                'data'=>$data,
                'ven_id'=>$cus_idd
                

            ];
        return $this->respond($response);
  

}
}

    public function login()
    {

        $username = $this->request->getPost( 'ven_mobile' );
        
        $password = $this->request->getPost( 'ven_password' );
          // print_r( $password );
          //   die;
     
       
            $userModel = new WashVendorModel();
            $userData = $userModel->where('ven_mobile',$username)->first();

            // print_r($userData);
            //exit();

            if ( $userData ) {

                $dbPassword = $userData['ven_password'];
                    
                 // echo $dbPassword;exit();
                 // print_r($dbPassword);
                 //  exit();

                if ( password_verify( $password, $dbPassword ) ) {
                        
                      
                    //echo "password matched";exit();

                    // if ( $dbPassword == $password ) {
                        
                    //      echo "password verify";exit();


                      $data = array(
                        "ven_id" =>$userData['ven_id'],
                        "ven_name" =>$userData['ven_name'],
                        "ven_shop_addres"=>$userData['ven_shop_addres'],
                        "ven_pincode"=>$userData['ven_pincode'],
                        "ven_email"=>$userData['ven_email'],
                        "ven_mobile"=>$userData['ven_mobile'],
                      
                      );

                       // print_r($data);
                       //  exit();



                      $response = [
                            'status' => 201,
                            'error' => null,
                            'messages' => [
                                'success' => 'Login successfully'
                            ],
                            'Vendor_detail' => $data,
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