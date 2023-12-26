<?php

namespace App\Controllers;
use CodeIgniter\HTTP\RequestInterface;
use App\Models\AdminModel;
use App\Libraries\Paginationnew;
use App\Models\TenantRegistrationModel;
use App\Models\ChatModel;
use App\Models\OwnerRegisterModel;

class chatReportController extends BaseController {

    protected $session;
    protected $isAdminLoggedIn;
    public $adminModel;
     public function __construct() {
        $this->session = session();
        $this->isAdminLoggedIn = $this->session->get('isAdminLoggedIn');
    }

    public function chatreport(){
      if (!$this->isAdminLoggedIn) {
            return redirect()->to(site_url('admin'));
        }   

        // $txtsearch = $this->request->getGet('txtsearch');
         $data['pageurl'] = "chatreport";
        $start_date = $this->request->getGet('start_date');
        $end_date = $this->request->getGet('end_date');
        $owner_id = $this->request->getGet('owner_id');
        $tenant_id = $this->request->getGet('tenant_id');

        $searchArray = array();
       

        if($start_date) {
            $searchArray['start_date'] = $start_date ? $start_date : "";
           
        }
        if($end_date) {
           $searchArray['end_date'] = $end_date;
        }
         if($owner_id) {
           $searchArray['owner_id'] = $owner_id;
        }
        if($tenant_id) {
           $searchArray['tenant_id'] = $tenant_id;
        }
        
         $paginationnew = new Paginationnew(); 
       
            $page = $this->request->getGet('page');
            $page = $page ? $page : 1;
            $Limit = 25;

            $startLimit = ($page - 1) * $Limit;
            $data['startLimit'] = $startLimit;

        
        $droOwn=new OwnerRegisterModel();

        $data['ownerDropdown']=$droOwn->orderBy('name','ASC')->findAll();

        $drotet=new TenantRegistrationModel();   
        $data['tenantDropdown']=$drotet->orderBy('name','ASC')->findAll();

           
            $drotent=new OwnerRegisterModel();
            $totalRecord =  $drotent->getDatachart($searchArray, '', '',1); 
            $pagination = $paginationnew->getPaginate($totalRecord, $page, $Limit);

            $chatdata=$drotent->getDatachart($searchArray, $startLimit, $Limit);
            
               
               
                $data['startLimit'] = $startLimit;
                $data['pagination'] = $pagination;
                $data["searchArray"] = $searchArray;
                $data['chatAllData'] = $chatdata;

                // echo "<pre>";
                // print_r($data['pagination']);exit();

               

         $this->template->render('admintemplate', 'contents' , 'admin/chatreport/chatlist',$data);
     }


    //    public function action() {
    //     if ($this->request->getVar('action')) {
    //         $action = $this->request->getVar('action');

    //         if ($action == 'get_tenant') {
    //             $ownerModel = new TenantRegistrationModel();
    //             $ownerdata = $ownerModel->where('owner_id', $this->request->getVar('owner_id'))->findAll();
    //             // print_r($ownerdata);exit;

    //             echo json_encode($ownerdata);
    //         }
    //     }
    // }
   

     public function viewChat(){

         if (!$this->isAdminLoggedIn) {
            return redirect()->to(site_url('admin'));
        }   
        $data['pageurl'] = "viewChat";
        
        
        $chatModel = new ChatModel();
     
        
        $owner_id = $this->request->getGet('owner_id');
        $tenant_id = $this->request->getGet('tenant_id');
        $admin=$this->request->getGet('admin');
        $admin_send=$this->request->getGet('is_send_me');
       // print_r($admin);exit();

        $ownerrr_id= $this->request->getPost('owner_id');
        $tenatrrr_id= $this->request->getPost('tenant_id');

        $session=$_SESSION['admin_id'];
         // print_r($session);exit();


        $admimnn_id = $this->request->getPost('admin_id');

      
        $check=$chatModel->getOwnerNameTenatName($tenant_id,$owner_id);

        // echo "<pre>";
        // print_r($check);exit();

        $data['bothDataChat']=$check;


        $data['owner_uid']=$this->request->getGet('owner_id');
        $data['tenant_tid']=$this->request->getGet('tenant_id');


        $session=$_SESSION['admin_id'];
           //print_r($session);exit();
        // $adminorsubadmin=$this->request->getGet('admin');
        $data['adminORSub']=$session;

        // print_r($data['adminORSub']);exit();

         $data['admin_status']=$this->request->getGet('is_send_me');

        // echo "<pre>";
        // print_r(  $data['admin_status']);exit();

        // $session=$_SESSION['admin_id']; 
        // print_r($session);exit();



      

        $this->template->render('admintemplate', 'contents' , 'admin/chatreport/chatdetail',$data);
  

     }



     public function threechatSave(){

           if (!$this->isAdminLoggedIn) {
            return redirect()->to(site_url('admin'));
        } 


             // print_r($_POST);exit();
   $chatadminmodel=new ChatModel();

    $owner_id=$this->request->getPost('owner_id');
    $tenant_id=$this->request->getPost('tenant_id');
    $admin_id=$this->request->getPost('admin_id');
    $admin_status=$this->request->getPost('is_send_me');


   //print_r($admin_id);exit();

   $adminchat=$this->request->getPost('chat_description');

   
   $data=[

      'chat_description'=>$adminchat,
      'owner_id'=>$owner_id,
      'tenant_id'=>$tenant_id,
      'admin_id'=>$admin_id,
      'is_send_me'=>$admin_status,
     
   ];

   // echo "<pre>";
   // print_r($data);exit();
   $chatadminmodel->insert($data);

     return redirect()->to(site_url('chat?owner_id='.$owner_id.'&tenant_id='.$tenant_id.'&admin='.$admin_id));

     }

}