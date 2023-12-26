<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Session\Session;
use App\Libraries\Paginationnew;
use App\Models\AdminModel;
use App\Models\FeedbackModel;
class FeedBackController extends BaseController {

    protected $session;
    protected $isAdminLoggedIn;

    public function __construct() {

        $this->session = session();
        $this->isAdminLoggedIn = $this->session->get('isAdminLoggedIn');
    }

    public function feeList(){

        if (!$this->isAdminLoggedIn) {

            return redirect()->to(site_url('dashboard'));   
        }

            $data['pagetitle']='FeedBack List';
           

            $data['action'] = "feedbackUser";
            $AllTypeGuest=new FeedbackModel();
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


      $this->template->render('admintemplate','contents','admin/FeedBack/viewFeedback',$data);
  

    }


    public function edit_feedback($id=0){

         if (!$this->isAdminLoggedIn) {

            return redirect()->to(site_url('dashboard'));   
        }

        $data['pagetitle']='Edit FeedBack';
            $editGuest=new FeedbackModel();

            $data['editGuest']=$editGuest->where('id',$id)->first();


      
        //  echo "<pre>";
        // print_r($data['editGuest']);exit();


          $this->template->render('admintemplate','contents','admin/FeedBack/edit_feedback',$data);

    }

public function updateDataFeedback($id=0){


          if (!$this->isAdminLoggedIn) {

            return redirect()->to(site_url('dashboard'));   
        }


        $updateData=new FeedbackModel();

        $id=$this->request->getPost('id');
        // print_r($id);exit();
        $phone=$this->request->getPost('phone');

         // print_r($phone);exit();


        $email=$this->request->getPost('email');

        $title=$this->request->getPost('title');
        $description=$this->request->getPost('description');
    

       $data=[

            'phone'=>$phone,
            'email'=>$email,
            'title'=>$title,
            'description'=>$description,


        ];

        // echo "<pre>";
        // print_r($data);exit;
        $check=$updateData->set($data)->where('id',$id)->update();

        if($check){

            $this->session->setFlashdata('message','FeedBack Updated');
            return redirect()->to(site_url('FeedBackController/edit_feedback/'.$id));
        }
    }

       public function delete_feedback($id=0){

         if (!$this->isAdminLoggedIn) {

            return redirect()->to(site_url('dashboard'));   
        }
     

    $delete_GuestAlltype=new FeedbackModel();

    
    $delete_GuestAlltype->where('id',$id)->delete();

    return redirect()->to(site_url('feedbackUser'));

    }
    
}