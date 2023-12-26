<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\API\ResponseTrait;

use App\Models\profilePro;

class ApiCheckTestFile extends ResourceController
{
	use ResponseTrait;

	public function fileupload()
	{
		
		$checkfile=new profilePro();

		//echo "<pre>";print_r();exit();
		//Get the file
			$file = $this->request->getFile('profile_image');


		//echo "<pre>";print_r($file);exit();
			if(! $file->isValid())
				return $this->fail($file->getErrorString());

			$file->move('uploads/essential/');

			$data = [
				
				'profile_image' => $file->getName()
			];

			$post_id = $checkfile->insert($data);

			$response[]=[

				'status' => 200,
				'error' => false,
				'message' =>'profile uploaded',
				'pro_image'=>$data
			];

			
			return $this->respondCreated($response);
}

}
