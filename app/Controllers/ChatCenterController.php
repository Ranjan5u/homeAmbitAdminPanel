<?php namespace App\Controllers;
use CodeIgniter\HTTP\RequestInterface;
use App\Models\AdminModel;
use App\Libraries\Paginationnew;
use App\Models\OwnerRegisterModel;
use App\Models\ChatAdminModel;
use App\Models\TenantRegistrationModel;
use App\Models\ChatAdminModelForTenant;
use App\Models\GuestAllTypeModel;
use App\Models\ChatAdminModelForGuest;
class ChatCenterController extends BaseController {

	 protected $session;
    protected $isAdminLoggedIn;
    public $adminModel;
     public function __construct() 
     {
        $this->session = session();
        $this->isAdminLoggedIn = $this->session->get('isAdminLoggedIn');
    }

    public function index(){
      if (!$this->isAdminLoggedIn) {
         return redirect()->to(site_url('admin'));
      }
            $data['pagetitle']='Chat With Owner';
            $data['action'] = "chatOwner";
            $OwnerRegisterModel=new OwnerRegisterModel();
             $paginationnew = new Paginationnew();  

             $txtsearch = $this->request->getGet('txtsearch');
            if ($txtsearch) 
            {
                $searchArray['txtsearch'] = $txtsearch;
            
            }

            $page = $this->request->getGet('page');
            $page = $page ? $page : 1;
            $Limit = 25;

            $startLimit = ($page - 1) * $Limit;
            $data['startLimit'] = $startLimit;

            $totalRecord = $OwnerRegisterModel->getDataTenant($searchArray, '', '',1); 
            $pagination = $paginationnew->getPaginate($totalRecord, $page, $Limit);

            $data['txtsearch'] = $txtsearch;
            $data['startLimit'] = $startLimit;
            $data['pagination'] = $pagination;

           $data["viewtenantModel"] = $OwnerRegisterModel->getDataTenant($searchArray, $startLimit, $Limit);


           // echo "<pre>";
           // print_r( $data["viewtenantModel"]);exit();
            $data["searchArray"] = $searchArray;

    	$this->template->render('admintemplate','contents','admin/ChatCenter/ChatCenterWithOwner',$data);

    }

    public function ownerWithAdmin(){

      if (!$this->isAdminLoggedIn) {
         return redirect()->to(site_url('admin'));
      }
      $ownername=new OwnerRegisterModel();

      $data['owner_uid']=$this->request->getGet('owner_id');
      $data['admin_aid']=$this->request->getGet('admin');
      

//print_r($data['name']);exit();
     $uid=$this->request->getGet('owner_id');
      $sessionAdmin_id=$_SESSION['admin_id'];
     

      $chatadminmodel=new ChatAdminModel();
      $data['datashowalladminowner']=$chatadminmodel->where('owner_id',$uid)->orderBy('date','ASC')->find();
      
     //  $data['ownername']=$chatadminmodel->getOwnername($owner_id);
    // echo "<pre>";print_r($data['datashowalladminowner']);exit();


    $this->template->render('admintemplate','contents','admin/AdminChart/adminChart',$data); 
   }  

 public function postDataAdminChat(){


      if (!$this->isAdminLoggedIn) {
         return redirect()->to(site_url('admin'));
      }
    
      
      // print_r($_POST);exit();
   $chatadminmodel=new ChatAdminModel();

   $owner_id=$this->request->getPost('owner_id');
   // $adminSess=$this->request->getPost('admin_id');


   $sess=$_SESSION['admin_id'];
  // echo"<pre>"; print_r($sess);exit();

   $ownerchat=$this->request->getPost('admin_chat_description');

   
   $data=[

      'admin_chat_description'=>$ownerchat,
      'owner_id'=>$owner_id,
      'admin_id'=>$sess,
     
     
   ];


   // echo "<pre>";
   // print_r($data);exit();
   $chatadminmodel->insert($data);

     return redirect()->to(site_url('adminChat?owner_id='.$owner_id.'&admin_id='.$sess));
 }


  public function tenantIndex(){

      if (!$this->isAdminLoggedIn) {
         return redirect()->to(site_url('admin'));
      }
   
        $data['pagetitle']='Chat With Tenant';
            $data['action'] = "chatTenant";
            $OwnerRegisterModel=new TenantRegistrationModel();
             $paginationnew = new Paginationnew();  

             $txtsearch = $this->request->getGet('txtsearch');
            if ($txtsearch) 
            {
                $searchArray['txtsearch'] = $txtsearch;
            
            }

            $page = $this->request->getGet('page');
            $page = $page ? $page : 1;
            $Limit = 25;

            $startLimit = ($page - 1) * $Limit;
            $data['startLimit'] = $startLimit;

            $totalRecord = $OwnerRegisterModel->getDataTenant($searchArray, '', '',1); 
            $pagination = $paginationnew->getPaginate($totalRecord, $page, $Limit);

            $data['txtsearch'] = $txtsearch;
            $data['startLimit'] = $startLimit;
            $data['pagination'] = $pagination;

           $data["viewtenantModel"] = $OwnerRegisterModel->getDataTenant($searchArray, $startLimit, $Limit);
            $data["searchArray"] = $searchArray;

      $this->template->render('admintemplate','contents','admin/ChatCenter/ChatCenterWithTenant',$data);
   }  

    public function tenantWithAdmin(){

      if (!$this->isAdminLoggedIn) {
         return redirect()->to(site_url('admin'));
      }
      

      $data['tenant_tid']=$this->request->getGet('tenant_id');
      $data['admin_aid']=$this->request->getGet('admin');
      

//print_r($data['admin_aid']);exit();
     $tenant_id=$this->request->getGet('tenant_id');
      $adminTenantaid=$_SESSION['admin_id'];
     

      $chatadminmodel=new ChatAdminModelForTenant();

    // echo "<pre>"; print_r($chatadminmodel);exit();
      $data['datashowalladminowner']=$chatadminmodel->where('tenant_id',$tenant_id)->orderBy('date','asc')->find();
      
     //$data['ownername']=$chatadminmodel->getOwnername($owner_id);
    // echo "<pre>";print_r($data['datashowalladminowner']);exit();


    $this->template->render('admintemplate','contents','admin/AdminChart/adminChartWithTenant',$data); 
   }  

   public function postDataAdminChatTenant(){


      if (!$this->isAdminLoggedIn) {
         return redirect()->to(site_url('admin'));
      }
    
      
      // print_r($_POST);exit();
   $chatadminmodel=new ChatAdminModelForTenant();

   $tenant_id=$this->request->getPost('tenant_id');
   $admin_idSession=$_SESSION['admin_id'];

   //print_r($admin_id);exit();

   $tenantchat=$this->request->getPost('admin_chat_desc');

   
   $data=[

      'admin_chat_desc'=>$tenantchat,
      'tenant_id'=>$tenant_id,
      'admin_id'=>$admin_idSession,
     
     
   ];

   // echo "<pre>";
   // print_r($data);exit();
   $chatadminmodel->insert($data);

     return redirect()->to(site_url('adminChatForTenant?tenant_id='.$tenant_id.'&admin='.$admin_idSession));

    
 }


  public function GuestIndex(){

      if (!$this->isAdminLoggedIn) {
         return redirect()->to(site_url('admin'));
      }
   
        $data['pagetitle']='Chat With Guest';
            $data['action'] = "chatGuest";
            $guestModel=new GuestAllTypeModel();
             $paginationnew = new Paginationnew();  

             $txtsearch = $this->request->getGet('txtsearch');
            if ($txtsearch) 
            {
                $searchArray['txtsearch'] = $txtsearch;
            
            }

            $page = $this->request->getGet('page');
            $page = $page ? $page : 1;
            $Limit = 25;

            $startLimit = ($page - 1) * $Limit;
            $data['startLimit'] = $startLimit;

            $totalRecord = $guestModel->getDataGuest($searchArray, '', '',1); 
            $pagination = $paginationnew->getPaginate($totalRecord, $page, $Limit);

            $data['txtsearch'] = $txtsearch;
            $data['startLimit'] = $startLimit;
            $data['pagination'] = $pagination;

           $data["viewtenantModel"] = $guestModel->getDataGuest($searchArray, $startLimit, $Limit);
            $data["searchArray"] = $searchArray;

      $this->template->render('admintemplate','contents','admin/ChatCenter/ChatCenterWithGuest',$data);
   }  

    public function guestchatWithAdmin(){

      if (!$this->isAdminLoggedIn) {
         return redirect()->to(site_url('admin'));
      }
      

      $data['gus_iid']=$this->request->getGet('id');
      $data['admin_aid']=$this->request->getGet('admin_id');
      

//print_r($data['admin_aid']);exit();
     $gus_id=$this->request->getGet('id');

  //  print_r($gus_id);exit();
      $adminTenantaid=$_SESSION['admin_id'];
     

      $chatadminmodel=new ChatAdminModelForGuest();

 // echo "<pre>"; print_r($chatadminmodel);exit();
      $data['datashowalladminowner']=$chatadminmodel->where('gus_id',$gus_id)->findAll();
      
     //$data['ownername']=$chatadminmodel->getOwnername($owner_id);
  //  echo "<pre>";print_r($data['datashowalladminowner']);exit();


    $this->template->render('admintemplate','contents','admin/AdminChart/adminChartWithGuest',$data); 
   }  

   public function postDataAdminChatguest(){


      if (!$this->isAdminLoggedIn) {
         return redirect()->to(site_url('admin'));
      }
    
      
      // print_r($_POST);exit();
   $chatadminmodelguest=new ChatAdminModelForGuest();
   // echo "<pre>";
   // print_r($chatadminmodel);exit();

   $gus_id=$this->request->getPost('gus_id');
   $admin_idSession=$_SESSION['admin_id'];

   //print_r($admin_id);exit();

   $guestchat=$this->request->getPost('admin_chat_desc');

   
   $data=[

      'admin_chat_desc'=>$guestchat,
      'gus_id'=>$gus_id,
      'admin_id'=>$admin_idSession,
     
     
   ];

   // echo "<pre>";
   // print_r($data);exit();
   $chatadminmodelguest->insert($data);

     return redirect()->to(site_url('adminChatGuest?id='.$gus_id.'&admin='.$admin_idSession));

    
 }







}

