<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Session\Session;
use App\Libraries\Paginationnew;
use App\Models\AdminModel;
use App\Models\GuestAllTypeModel;
class GuestController extends BaseController {

    protected $session;
    protected $isAdminLoggedIn;

    public function __construct() {

        $this->session = session();
        $this->isAdminLoggedIn = $this->session->get('isAdminLoggedIn');
    }

    public function viewGuest(){

        if (!$this->isAdminLoggedIn) {

            return redirect()->to(site_url('dashboard'));   
        }

            $data['pagetitle']='Guest List';
            $data['action'] = "guest";
            $AllTypeGuest=new GuestAllTypeModel();
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
           $data["searchArray"] = $searchArray;
        $this->template->render('admintemplate','contents','admin/Guest/viewGuest',$data);

     }

     public function addGuest(){

        if (!$this->isAdminLoggedIn) {

            return redirect()->to(site_url('dashboard'));   
        }
        $data['pagetitle']='Add Guest';

        $data['guest']=$this->request->getGet('guest');
        // echo "<pre>";
        // print_r($data['guest']);exit();

        $this->template->render('admintemplate','contents','admin/Guest/addguest',$data);

     }


     public function saveDataGuest(){

         if (!$this->isAdminLoggedIn) {

            return redirect()->to(site_url('dashboard'));   
        }

        $addguest=new GuestAllTypeModel();   

        $name=$this->request->getPost('name');
        $mobile=$this->request->getPost('mobile');
        $email=$this->request->getPost('email');
     
        $address=$this->request->getPost('address');
       
        $password=$this->request->getPost('password');
     
         $type=$this->request->getPost('type');
         $status=$this->request->getPost('status');
       

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
            'address'=>$address,
            'status'=>$status,


        ];
        // echo "<pre>"; print_r($data);exit();
        $addguest->insert($data);


         $this->session->setFlashdata('message','Guest Added');
       return redirect()->to(site_url('addguest'));

    }
  public function previewGuest($id=0){

          if (!$this->isAdminLoggedIn) {

            return redirect()->to(site_url('dashboard'));   
        }
        $ten_id=$this->request->getVar('owner_id');
        $previewGuest=new GuestAllTypeModel();
      
        $data['previewGuest']=$previewGuest->getGusetData($id);
        

        // echo "<pre>";
        // print_r($data['previewGuest']);exit();

        $this->template->render('admintemplate','contents','admin/Guest/previewGuest',$data);


}

  public function edit_guest($id=0){

          if (!$this->isAdminLoggedIn) {

            return redirect()->to(site_url('dashboard'));   
        }
           // $edit_id=$this->request->getVar('owner_id');

            $editGuest=new GuestAllTypeModel();

            $data['editGuest']=$editGuest->where('id',$id)->first();

            $data['pagetitle']='Edit Guest';
      
        //  echo "<pre>";
        // print_r($data['editGuest']);exit();


          $this->template->render('admintemplate','contents','admin/Guest/editGuest',$data);

    }
  public function updateDataGuest($id=0){


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

         $status=$this->request->getPost('status');

         // print_r($id);exit();

        $updateGuest=new GuestAllTypeModel();
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
            'status'=>$status


        ];
        $check=$updateGuest->set($data)->where('id',$id)->update();

        if($check){

            $this->session->setFlashdata('message','Guest Updated');
            return redirect()->to(site_url('GuestController/edit_guest/'.$id));
        }
    }

       public function delete_Guest($id=0){

         if (!$this->isAdminLoggedIn) {

            return redirect()->to(site_url('dashboard'));   
        }
     

    $delete_GuestAlltype=new GuestAllTypeModel();

    
    $delete_GuestAlltype->where('id',$id)->delete();

    return redirect()->to(site_url('guest'));

    }
    
}