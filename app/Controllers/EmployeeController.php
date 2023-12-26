<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Session\Session;
use App\Libraries\Paginationnew;
use App\Models\AdminModel;
use App\Models\EmployeeModel;
class EmployeeController extends BaseController {

    protected $session;
    protected $isAdminLoggedIn;

    public function __construct() {

        $this->session = session();
        $this->isAdminLoggedIn = $this->session->get('isAdminLoggedIn');
    }

    public function viewEmployee(){

        if (!$this->isAdminLoggedIn) {

            return redirect()->to(site_url('dashboard'));   
        }

            $data['pagetitle']='Employee List';
            $data['action'] = "viewemployee";
            $AllTypeGuest=new EmployeeModel();
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

            $totalRecord = $AllTypeGuest->getDataGuest($searchArray, '', '',1); 
            $pagination = $paginationnew->getPaginate($totalRecord, $page, $Limit);

            $data['txtsearch'] = $txtsearch;
            $data['startLimit'] = $startLimit;
            $data['pagination'] = $pagination;


           $data["viewGuest"] = $AllTypeGuest->getDataGuest($searchArray, $startLimit, $Limit);


           // echo "<pre>";
           // print_r($data["viewGuest"]);exit();
           $data["searchArray"] = $searchArray;
        $this->template->render('admintemplate','contents','admin/Employee/viewEmployee',$data);

     }

     public function addEmployee(){

        if (!$this->isAdminLoggedIn) {

            return redirect()->to(site_url('dashboard'));   
        }
        $data['pagetitle']='Add Employee';

        $data['guest']=$this->request->getGet('guest');
        // echo "<pre>";
        // print_r($data['guest']);exit();

        $this->template->render('admintemplate','contents','admin/Employee/addEmployee',$data);

     }


     public function saveDataEmployee(){

         if (!$this->isAdminLoggedIn) {

            return redirect()->to(site_url('dashboard'));   
        }

        $addguest=new EmployeeModel();   

        $name=$this->request->getPost('name');
        $mobile=$this->request->getPost('mobile');
        $email=$this->request->getPost('email');
     
        $address=$this->request->getPost('address');
       
        $password=$this->request->getPost('password');
     
         $type=$this->request->getPost('type');
       

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
            'type'=>$type,
            'address'=>$address


        ];
        // echo "<pre>"; print_r($data);exit();
        $addguest->insert($data);


         $this->session->setFlashdata('message','Employee Added');
       return redirect()->to(site_url('addemployee'));

    }
  public function previewEmployee($id=0){

          if (!$this->isAdminLoggedIn) {

            return redirect()->to(site_url('dashboard'));   
        }
        $ten_id=$this->request->getVar('owner_id');
        $previewGuest=new EmployeeModel();
      
        $data['previewGuest']=$previewGuest->getGusetData($id);
        

        // echo "<pre>";
        // print_r($data['previewGuest']);exit();

        $this->template->render('admintemplate','contents','admin/Employee/previewEmployee',$data);


}

  public function edit_Employee($id=0){

          if (!$this->isAdminLoggedIn) {

            return redirect()->to(site_url('dashboard'));   
        }
           // $edit_id=$this->request->getVar('owner_id');
        $data['pagetitle']='Edit Employee';
            $editGuest=new EmployeeModel();

            $data['editGuest']=$editGuest->where('id',$id)->first();


      
        //  echo "<pre>";
        // print_r($data['editGuest']);exit();


          $this->template->render('admintemplate','contents','admin/Employee/edit_employee',$data);

    }
  public function updateDataEmployee($id=0){


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

         // print_r($id);exit();

        $updateGuest=new EmployeeModel();
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
            'address'=>$address


        ];
        $check=$updateGuest->set($data)->where('id',$id)->update();

        if($check){

            $this->session->setFlashdata('message','Employee Updated');
            return redirect()->to(site_url('EmployeeController/edit_employee/'.$id));
        }
    }

       public function delete_Employee($id=0){

         if (!$this->isAdminLoggedIn) {

            return redirect()->to(site_url('dashboard'));   
        }
     

    $delete_GuestAlltype=new EmployeeModel();

    
    $delete_GuestAlltype->where('id',$id)->delete();

    return redirect()->to(site_url('viewEmployee'));

    }
    
}