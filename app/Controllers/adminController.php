<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Session\Session;
use App\Libraries\Paginationnew;
use App\Models\AdminModel;

class adminController extends BaseController {

    protected $session;
    protected $isAdminLoggedIn;

    public function __construct() {

        $this->session = session();
        $this->isAdminLoggedIn = $this->session->get('isAdminLoggedIn');
    }

    public function viewAdmin(){

        if (!$this->isAdminLoggedIn) {

            return redirect()->to(site_url('dashboard'));   
        }

            $data['pagetitle']='Admin List';
            $data['action'] = "viewAdmin";
            $AllTypeGuest=new AdminModel();
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

            $totalRecord = $AllTypeGuest->getData($searchArray, '', '',1); 
            $pagination = $paginationnew->getPaginate($totalRecord, $page, $Limit);

            $data['txtsearch'] = $txtsearch;
            $data['startLimit'] = $startLimit;
            $data['pagination'] = $pagination;


           $data["viewGuest"] = $AllTypeGuest->getData($searchArray, $startLimit, $Limit);


           // echo "<pre>";
           // print_r($data["viewGuest"]);exit();
           $data["searchArray"] = $searchArray;
        $this->template->render('admintemplate','contents','admin/AdBase/viewAdmin',$data);

     }

     public function addAdmin(){

        if (!$this->isAdminLoggedIn) {

            return redirect()->to(site_url('dashboard'));   
        }
        $data['pagetitle']='Add Admin';

        $data['guest']=$this->request->getGet('guest');
        // echo "<pre>";
        // print_r($data['guest']);exit();

        $this->template->render('admintemplate','contents','admin/AdBase/addAdmin',$data);

     }


     public function saveDataAdmin(){
       // print_r($_POST);exit;

         if (!$this->isAdminLoggedIn) {

            return redirect()->to(site_url('dashboard'));   
        }

        $addguest=new AdminModel();   

        $name=$this->request->getPost('name');
        $mobile=$this->request->getPost('mobile');
        $email=$this->request->getPost('email');
     
        $address=$this->request->getPost('address');
       
        $password=$this->request->getPost('password');
     
        
         $admin_type=$this->request->getPost('admin_type');
       

         $file = "";
            $file_image=$this->request->getFile('file_image');
            if ($file_image) {
                $file_type = $file_image->getClientMimeType();
                $valid_file_types = array("image/png", "image/jpeg", "image/jpg");

                if (in_array($file_type, $valid_file_types)) {
                    $file = $file_image->getName();

                    if ($file_image->move('uploads/essential', $file)) {
                        $file_image = $file_image->getName();
                    }
                }
            }

        $data=[

            'name'=>$name,
            'mobile'=>$mobile,
            'email'=>$email,
            'file_image'=>$file_image,
            'password'=>password_hash($password,1),
            'address'=>$address,
            'admin_type'=>$admin_type,


        ];
        // echo "<pre>"; print_r($data);exit();
        $addguest->insert($data);


         $this->session->setFlashdata('message','Admin Added');
       return redirect()->to(site_url('addAdmin'));

    }




  public function previewAdmin($id=0){

          if (!$this->isAdminLoggedIn) {

            return redirect()->to(site_url('dashboard'));   
        }
       
        $previewad=new AdminModel();

       
        $data['previewad']=$previewad->getadminid($id);
        
        // echo "<pre>";
        // print_r($data['previewad']);exit();

        $this->template->render('admintemplate','contents','admin/AdBase/previewAdmin',$data);


}

  public function edit_Admin($id=0){

          if (!$this->isAdminLoggedIn) {

            return redirect()->to(site_url('dashboard'));   
        }
           // $edit_id=$this->request->getVar('owner_id');


            $data['pagetitle']='Edit Admin';
            $editGuest=new AdminModel();

            $data['editadmin']=$editGuest->where('id',$id)->first();


      
        //  echo "<pre>";
        // print_r($data['editadmin']);exit();


          $this->template->render('admintemplate','contents','admin/AdBase/edit_Admin',$data);

    }
  public function updateDataAdmin($id=0){


          if (!$this->isAdminLoggedIn) {

            return redirect()->to(site_url('dashboard'));   
        }

       $name=$this->request->getPost('name');
        $mobile=$this->request->getPost('mobile');
        $email=$this->request->getPost('email');
     
        $address=$this->request->getPost('address');
       
        $password=$this->request->getPost('password');
     
         $type=$this->request->getPost('type');

         $id=$this->request->getPost('id');
         $admin_type=$this->request->getPost('admin_type');

         // print_r($id);exit();

        $updateGuest=new AdminModel();
           // print_r($id);exit();

       $imagetag=$updateGuest->find($id);

       //echo "<pre>";print_r($imagetag);exit();

       $old_image=$imagetag['file_image'];
    
        // print_r($old_image);exit();


     $image=$this->request->getFile('file_image');
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

       

       $data=[

            'name'=>$name,
            'mobile'=>$mobile,
            'email'=>$email,
            'file_image'=>$imageName,
            'password'=>password_hash($password,1),
            'type'=>$type,
            'address'=>$address,
            'admin_type'=>$admin_type,


        ];
        $check=$updateGuest->set($data)->where('id',$id)->update();

        if($check){

            $this->session->setFlashdata('message','Admin Updated');
            return redirect()->to(site_url('edit_Admin/'.$id));
        }
    }

      public function delete_admin($id=0){

         if (!$this->isAdminLoggedIn) {

            return redirect()->to(site_url('dashboard'));   
        }
     

    $delete_GuestAlltype=new AdminModel();

    
    $delete_GuestAlltype->where('id',$id)->delete();

    return redirect()->to(site_url('viewAdmin'));

    }
    
    
}