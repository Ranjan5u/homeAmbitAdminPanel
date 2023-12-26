<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\API\ResponseTrait;
use App\Models\Home_Advertisement;

class ApiHomeAdvertisement extends ResourceController
{
	use ResponseTrait;

    public function ListAdvertisement(){
	
        $home_advt=new Home_Advertisement();


         $data = $home_advt->findAll();
     
          if ($data) {
                $response= [
                    'status' => 200,
                    'error' => null,
                    'messages' => [
                        'success' => 'Advertisement listed successfully'
                    ],
                    'image_base_url' => base_url('uploads/essential'),
                    'Category' => $data,
                ];


                return $this->respondCreated($response);        
        
    }
    else{

        $response=[
          'status'   => 201,
          'error'    => null,
          'messages' => [
              'fail' => 'No advertisement data found'
          ],
            ];
            return $this->respond($response);
        }       
        
        

    }

    }



