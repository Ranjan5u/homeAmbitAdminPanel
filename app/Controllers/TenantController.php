<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Session\Session;
use App\Libraries\Paginationnew;
use App\Models\AdminModel;
use App\Models\TenantRegistrationModel;
use App\Models\OwnerRegisterModel;
class TenantController extends BaseController {

    protected $session;
    protected $isAdminLoggedIn;

    public function __construct() {

        $this->session = session();
        $this->isAdminLoggedIn = $this->session->get('isAdminLoggedIn');
    }

    public function AddTenant(){

        if (!$this->isAdminLoggedIn) {

            return redirect()->to(site_url('dashboard'));   
        }

        $droOwn=new OwnerRegisterModel();

        $data['ownerDropdown']=$droOwn->dropList();
        // echo "<pre>";
        // print_r($data['ownerDropdown']);exit();

        $this->template->render('admintemplate','contents','admin/Tenant/Addtenant',$data);

     }


    public function index(){

        if(!$this->isAdminLoggedIn){
            return redirect()->to(site_url('dashboard'));
        }

            $data['pagetitle']='Tenant List';
            $data['action'] = "viewTenant";
            $TenantRegistrationModel=new TenantRegistrationModel();
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

            $totalRecord = $TenantRegistrationModel->getDataTenant($searchArray, '', '',1); 
            $pagination = $paginationnew->getPaginate($totalRecord, $page, $Limit);

            $data['txtsearch'] = $txtsearch;
            $data['startLimit'] = $startLimit;
            $data['pagination'] = $pagination;


           $data["viewtenantModel"] = $TenantRegistrationModel->getDataTenant($searchArray, $startLimit, $Limit);
            $data["searchArray"] = $searchArray;

        $this->template->render('admintemplate','contents','admin/Tenant/viewTenant',$data);
    }

    public function saveDataTenant()
    {

         if (!$this->isAdminLoggedIn) {

            return redirect()->to(site_url('dashboard'));   
        }

    $addtenant=new TenantRegistrationModel(); 
    // helper(['form','url']);  
    // $validation= \config\Services::validation();

    // $check=[
    //     'owner_id' => 'required|is_unique[tenant.owner_id]',
        
    // ];
    // $message=[
        
    //     'owner_id'=>[
    //         'required'=>'Select Owner Name',
    //         'is_unique'=>'Owner Name Already Added',

    //     ],
   
    // ];

    //   if(!$this->validate($check,$message)){
    //     $this->template->render('admintemplate','contents','admin/Tenant/Addtenant',['validation'=>$this->validator]);
    //   }
    //    else{

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
        $owner_id=$this->request->getPost('owner_id');
       


        $ten_rent_date=$this->request->getPost('ten_rent_date');
        $ten_rent_duration=$this->request->getPost('ten_rent_duration');
        $ten_renewed_date=$this->request->getPost('ten_renewed_date');
        $ten_start_date=$this->request->getPost('ten_start_date');
        $ten_end_date=$this->request->getPost('ten_end_date');
        $ten_property_name=$this->request->getPost('ten_property_name');
        $ten_project_name=$this->request->getPost('ten_project_name');

         $file = "";
            $pro_image=$this->request->getFile('pro_image');
            if ($pro_image) {
                $file_type = $pro_image->getClientMimeType();
                $valid_file_types = array("image/png", "image/jpeg", "image/jpg");

                if (in_array($file_type, $valid_file_types)) {
                    $file = $pro_image->getName();

                    if ($pro_image->move('uploads/essential', $file)) {
                        $pro_image = $pro_image->getName();
                    }
                }
            }



        $checkOwnerId=$addtenant->where('owner_id',$owner_id)->first();

        if($checkOwnerId>=1){
          return redirect()->to(site_url('addtenant'))->with('status','Owner Already Exits ! Please Select other Owner');

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
            'pro_image'=>$pro_image,
            'owner_id'=>$owner_id,
            'ten_rent_date'=>$ten_rent_date,
            'ten_rent_duration'=>$ten_rent_duration,
            'ten_renewed_date'=>$ten_renewed_date,
            'ten_start_date'=>$ten_start_date,
            'ten_end_date'=>$ten_end_date,
            'ten_property_name'=>$ten_property_name,
            'ten_project_name'=>$ten_project_name,




        ];

        $addtenant->insert($data);


        $this->session->setFlashdata('message','Tenant Added');
       return redirect()->to(site_url('addtenant'));

    }

    
}


    public function previewTenant($id=0){

          if (!$this->isAdminLoggedIn) {

            return redirect()->to(site_url('dashboard'));   
        }
        $ten_id=$this->request->getVar('tenant_id');
        $previewTenant=new TenantRegistrationModel();
      
        $data['previewTenant']=$previewTenant->getDataAllTenant($id);
       

       // echo "<pre>";
       //  print_r($data['previewTenant']);exit();

        $this->template->render('admintemplate','contents','admin/Tenant/previewTenant',$data);

    }


    public function edit_Tenant($id=0){

          if (!$this->isAdminLoggedIn) {

            return redirect()->to(site_url('dashboard'));   
        }
           // $edit_id=$this->request->getVar('tenant_id');

            $editTenant=new TenantRegistrationModel();

            $data['editTenant']=$editTenant->where('tenant_id',$id)->first();

             $droOwn=new OwnerRegisterModel();

        $data['ownerDropdown']=$droOwn->dropList();

        //   echo "<pre>";
        // print_r($data['editTenant']);exit();


          $this->template->render('admintemplate','contents','admin/Tenant/editTenant',$data);

    }

    public function updateDataTenant($id=0){


          if (!$this->isAdminLoggedIn) {

            return redirect()->to(site_url('dashboard'));   
        }

     
                 
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
        $ten_rent_date=$this->request->getPost('ten_rent_date');
        $ten_rent_duration=$this->request->getPost('ten_rent_duration');
        $ten_renewed_date=$this->request->getPost('ten_renewed_date');
        $ten_start_date=$this->request->getPost('ten_start_date');
        $ten_end_date=$this->request->getPost('ten_end_date');
        $ten_property_name=$this->request->getPost('ten_property_name');
        $ten_project_name=$this->request->getPost('ten_project_name');
        $owner_id=$this->request->getPost('owner_id');
         $id=$this->request->getPost('tenant_id');

         // print_r($id);exit();

        $updatetenant=new TenantRegistrationModel();
           // print_r($id);exit();

       $imagetag=$updatetenant->find($id);

       //echo "<pre>";print_r($imagetag);exit();

       $old_image=$imagetag['pro_image'];
    
        // print_r($old_image);exit();


     $image=$this->request->getFile('pro_image');
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
            'pro_image'=>$imageName,
            'ten_rent_date'=>$ten_rent_date,
            'ten_rent_duration'=>$ten_rent_duration,
            'ten_renewed_date'=>$ten_renewed_date,
            'ten_start_date'=>$ten_start_date,
            'ten_end_date'=>$ten_end_date,
            'ten_property_name'=>$ten_property_name,
            'ten_project_name'=>$ten_project_name,
            'owner_id'=>$owner_id,

        ];

      
        $check=$updatetenant->set($dataupdate)->where('tenant_id',$id)->update();

        if($check){

            $this->session->setFlashdata('message','Tenant Updated');
            return redirect()->to(site_url('TenantController/edit_Tenant/'.$id));
        }
    }

    


    public function delete_Tenant($id=0){

         if (!$this->isAdminLoggedIn) {

            return redirect()->to(site_url('dashboard'));   
        }
     

    $delete_tenant=new TenantRegistrationModel();

    
    $delete_tenant->where('tenant_id',$id)->delete();

    return redirect()->to(site_url('viewTenant'));

    }

   



}
