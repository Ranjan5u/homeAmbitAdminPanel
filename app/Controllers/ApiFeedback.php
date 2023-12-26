<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\API\ResponseTrait;

use App\Models\FeedbackModel;

class ApiFeedback extends ResourceController
{
	use ResponseTrait;

public function sendFeedback()
            
        {
            	
         	$feedback=new FeedbackModel();


         	//print_r($feedback);exit();
         	
         	$users_id=$this->request->getPost('users_id');
         	$phone=$this->request->getPost('phone');
         	$type=$this->request->getPost('type');
         	$email=$this->request->getPost('email');
         	$title=$this->request->getPost('title');
         	$description=$this->request->getPost('description');


         	$data=[

         		'users_id'=>$users_id,
         		'phone'=>$phone,
         		'type'=>$type,
         		'email'=>$email,
         		'title'=>$title,
         		'description'=>$description,
         		

         	];

         	$feedback->insert($data);




                    $response=[

                            'status' => 200,
                            'error' => null,
                            'messages' =>  'feedback success',
                            'feedback' => $data
                    ];

                    return $this->respondCreated($response);
                



       
       }

}
