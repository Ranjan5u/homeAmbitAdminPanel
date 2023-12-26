<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\API\ResponseTrait;
use App\Models\TestProfileUpdateModel;

class ApiTestUpdate extends ResourceController
{
	use ResponseTrait;

    public function updateTest(){

        $test=new TestProfileUpdateModel();

        $id=$this->request->getPost('id');
       

        $name=$this->request->getPost('name');
     
        $data=[


            'name'=>$name,
    

        ];

     
       $test->set($data)->where('id',$id)->update();
      

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






