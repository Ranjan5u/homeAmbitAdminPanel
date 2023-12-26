<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Session\Session;
use App\Libraries\Paginationnew;
use App\Models\AdminModel;
use App\Models\OwnerRegisterModel;
use App\Models\TenantRegistrationModel;
class OwnerController extends BaseController {

    protected $session;
    protected $isAdminLoggedIn;

    public function __construct() {

        $this->session = session();
        $this->isAdminLoggedIn = $this->session->get('isAdminLoggedIn');
    }

    public function AddOwner(){

        if (!$this->isAdminLoggedIn) {

            return redirect()->to(site_url('dashboard'));   
        }

        $droOwn=new TenantRegistrationModel();

        $data['tenDropdown']=$droOwn->tenDropList();
        
        // echo "<pre>";
        // print_r($data['tenDropdown']);exit();   

        $this->template->render('admintemplate','contents','admin/Owner/addowner',$data);

     }


    public function index(){

        if(!$this->isAdminLoggedIn){
            return redirect()->to(site_url('dashboard'));
        }

            $data['pagetitle']='Owner List';
            $data['action'] = "viewTenant";
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
            $data["searchArray"] = $searchArray;

            // echo "<pre>";
            // print_r( $data["pagination"]);exit();
        $this->template->render('admintemplate','contents','admin/Owner/viewOwner',$data);
    }

    public function saveDataOwner(){

         if (!$this->isAdminLoggedIn) {

            return redirect()->to(site_url('dashboard'));   
        }

        $addowner=new OwnerRegisterModel();   

        
        $username=$this->request->getPost('name');
        $mobile=$this->request->getPost('mobile');
        $email=$this->request->getPost('email');
        //$type=$this->request->getPost('type');
        $flat_no=$this->request->getPost('flat_no');
        $permanent_address=$this->request->getPost('permanent_address');
        $register_property_add=$this->request->getPost('register_property_add');
        $registration_number=$this->request->getPost('registration_number');
        $present_address=$this->request->getPost('present_address');
        $pincode=$this->request->getPost('pincode');
        $city=$this->request->getPost('city');
        $state=$this->request->getPost('state');
        $password=$this->request->getPost('password');
        $own_property_name=$this->request->getPost('own_property_name');
        $own_project_name=$this->request->getPost('own_project_name');
        $tenant_id=$this->request->getPost('tenant_id');


       

         $file = "";
            $profile_image=$this->request->getFile('profile_image');
            if ($profile_image) {
                $file_type = $profile_image->getClientMimeType();
                $valid_file_types = array("image/png", "image/jpeg", "image/jpg");

                if (in_array($file_type, $valid_file_types)) {
                    $file = $profile_image->getName();

                    if ($profile_image->move('uploads/essential', $file)) {
                        $profile_image = $profile_image->getName();
                    }
                }
            }


        $checkTenantId=$addowner->where('tenant_id',$tenant_id)->first();

        if($checkTenantId>=1){
          return redirect()->to(site_url('addOwner'))->with('status','Tenant Already Exits ! Please Select other Tenant');

        }
       
        else{
          

        $data=[

            'name'=>$username,
            'mobile'=>$mobile,
            'email'=>$email,
            //'type'=>$type,
            'flat_no'=>$flat_no,
            'permanent_address'=>$permanent_address,
            'password'=>password_hash($password,1),
            'register_property_add'=>$register_property_add,
            'registration_number'=>$registration_number,
            'present_address'=>$present_address,
            'pincode'=>$pincode,
            'city'=>$city,
            'state'=>$state,
            'profile_image'=>$profile_image,
            'own_property_name'=>$own_property_name,
            'own_project_name'=>$own_project_name,
            'tenant_id'=>$tenant_id,


        ];

        $addowner->insert($data);


         $this->session->setFlashdata('message','Owner Added');
       return redirect()->to(site_url('addOwner'));

    }

}
    public function previewOwner($id=0){

          if (!$this->isAdminLoggedIn) {

            return redirect()->to(site_url('dashboard'));   
        }
        $ten_id=$this->request->getVar('owner_id');
        $previewTenant=new OwnerRegisterModel();
      
        $data['previewTenant']=$previewTenant->getdataAllOwner($id);
        

        // echo "<pre>";
        // print_r($data['previewTenant']);exit();

        $this->template->render('admintemplate','contents','admin/Owner/previewOwner',$data);

    }


    public function edit_Owner($id=0){

          if (!$this->isAdminLoggedIn) {

            return redirect()->to(site_url('dashboard'));   
        }
           // $edit_id=$this->request->getVar('owner_id');

            $editTenant=new OwnerRegisterModel();

            $data['editTenant']=$editTenant->where('owner_id',$id)->first();


        $droOwn=new TenantRegistrationModel();

        $data['tenDropdown']=$droOwn->tenDropList();
        //  echo "<pre>";
        // print_r($data['editTenant']);exit();


          $this->template->render('admintemplate','contents','admin/Owner/editOwner',$data);

    }

    public function updateDataOwner($id=0){


          if (!$this->isAdminLoggedIn) {

            return redirect()->to(site_url('dashboard'));   
        }

     
                 
        $username=$this->request->getPost('name');
        $mobile=$this->request->getPost('mobile');
        $email=$this->request->getPost('email');
        // $type=$this->request->getPost('type');
        $flat_no=$this->request->getPost('flat_no');    
        $permanent_address=$this->request->getPost('permanent_address');
        $register_property_add=$this->request->getPost('register_property_add');
        $registration_number=$this->request->getPost('registration_number');
        $present_address=$this->request->getPost('present_address');
        $pincode=$this->request->getPost('pincode');
        $city=$this->request->getPost('city');
        $state=$this->request->getPost('state');
        $password=$this->request->getPost('password');
         $own_property_name=$this->request->getPost('own_property_name');
        $own_project_name=$this->request->getPost('own_project_name');
        $tenant_id=$this->request->getPost('tenant_id');


         $id=$this->request->getPost('owner_id');

         // print_r($id);exit();

        $updatetenant=new OwnerRegisterModel();
           // print_r($id);exit();

       $imagetag=$updatetenant->find($id);

       //echo "<pre>";print_r($imagetag);exit();

       $old_image=$imagetag['profile_image'];
    
        // print_r($old_image);exit();


     $image=$this->request->getFile('profile_image');
      // print_r($image);exit();

         if( $image->isValid() && ! $image->hasMoved()){

        
        if(file_exists('uploads/essential'.$old_image))
        {
            @unlink('uploads/essential'.$old_image);

        }

        $imageName=$image->getRandomName();

        $image->move('uploads/essential',$imageName);

        }else
        {
            $imageName=$old_image;
        }

       

        $dataupdate=[

            'name'=>$username,
            'mobile'=>$mobile,
            'email'=>$email,
            // 'type'=>$type,
            'flat_no'=>$flat_no,
            'permanent_address'=>$permanent_address,
            'password'=>password_hash($password,1),
            'register_property_add'=>$register_property_add,
            'registration_number'=>$registration_number,
            'present_address'=>$present_address,
            'pincode'=>$pincode,
            'city'=>$city,
            'state'=>$state,
            'profile_image'=>$imageName,
            'own_property_name'=>$own_property_name,
            'own_project_name'=>$own_project_name,
            'tenant_id'=>$tenant_id,

        ];
         // echo "<pre>";print_r($dataupdate);exit();
        $check=$updatetenant->set($dataupdate)->where('owner_id',$id)->update();

        if($check){

            $this->session->setFlashdata('message','Owner Updated');
            return redirect()->to(site_url('OwnerController/edit_Owner/'.$id));
        }
    }


    public function delete_Owner($id=0){

         if (!$this->isAdminLoggedIn) {

            return redirect()->to(site_url('dashboard'));   
        }
     

    $delete_tenant=new OwnerRegisterModel();

    
    $delete_tenant->where('owner_id',$id)->delete();

    return redirect()->to(site_url('viewOwner'));

    }



}
