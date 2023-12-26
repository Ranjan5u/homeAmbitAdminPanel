<?php namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\API\ResponseTrait;
use App\Models\TenantNoticeBoardModel;

class ApiTenantNoticeBoard extends ResourceController
{
	use ResponseTrait;

    public function saveTenantNoticeBoard(){
	   

        $tenantNoticeboard=new TenantNoticeBoardModel();

        $ten_nt_title=$this->request->getPost('ten_nt_title');
        $ten_nt_description=$this->request->getPost('ten_nt_description');
        $tenant_id=$this->request->getPost('tenant_id');
       
      
        $data=[

            
            'ten_nt_title'=>$ten_nt_title,
            'ten_nt_description'=>$ten_nt_description,
            'tenant_id'=>$tenant_id,

        ];

    

      
       $ten_id =$tenantNoticeboard->insert($data);
      

          $response= [
        'status' => "200",
        'error' => false,
        'message' => [
        'success'=>'Notice Board Save Successfully'
        
      ],
    
        'data'=>$data,
        'notice_id'=>$ten_id
      

        
      ];
      return $this->respondCreated($response);

    }
     
  }
 