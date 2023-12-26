<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Session\Session;
use App\Libraries\Paginationnew;
use App\Models\AdminModel;
use App\Models\TenantNoticeBoardModel;
use App\Models\TenantRegistrationModel;
class NoticeController extends BaseController {

    protected $session;
    protected $isAdminLoggedIn;

    public function __construct() {

        $this->session = session();
        $this->isAdminLoggedIn = $this->session->get('isAdminLoggedIn');
    }

    public function addTenantNotice(){

        if (!$this->isAdminLoggedIn) {

            return redirect()->to(site_url('dashboard'));   
        }

        $data['pagetitle']='Add Tenant Notice';

        $tenantModel=new TenantRegistrationModel();

        $data['findTenant']=$tenantModel->getTenantNotice();

        // echo "<pre>";
        // print_r($data['findTenant']);exit();

        $this->template->render('admintemplate','contents','admin/TeanantNoticeBoard/TenantaddNotice',$data);

     }


     public function viewTenantNotice(){

          if (!$this->isAdminLoggedIn) {

            return redirect()->to(site_url('dashboard'));   
        }

        $data['pagetitle']='View Tenant Notice';


            $TenantNoticeModel=new TenantNoticeBoardModel();
            $data['action'] = "viewTenantNotice";
            
            $txtsearch = $this->request->getGet('txtsearch');
             $AppStr = str_replace ("'","\'",$txtsearch);

            $category_id=$this->request->getGet('category_id');
             $cateStr = str_replace ("'","\'",$category_id);

            $searchArray = array();
            $paginationnew = new Paginationnew();        
            if ($AppStr) 
            {
                $searchArray['txtsearch'] = $AppStr;
            
            }
            
            if($cateStr){
                $searchArray['category_id'] = $cateStr;
            }

            $totalRecord =$TenantNoticeModel->getDataGuest($searchArray, '', '',1); 
            
             
           
            $page = $this->request->getGet('page');
            $page = $page ? $page : 1;
            $Limit = 25;
         

            $startLimit = ($page - 1) * $Limit;
            $data['startLimit'] = $startLimit;
            $pagination = $paginationnew->getPaginate($totalRecord, $page, $Limit);
            $data['startLimit'] = $startLimit;
            $data['pagination'] = $pagination;
            $data['txtsearch']  = $txtsearch;
            $data['category_name']=$category_id;
            $data["searchArray"] = $searchArray;
          
            $data['tenantNoticeBoardModel']=$TenantNoticeModel->getDataGuest($searchArray, $startLimit, $Limit);

        
        $this->template->render('admintemplate','contents','admin/TeanantNoticeBoard/TeanantviewNotice',$data);

     }

     public function saveDataTenantNotice(){
          if (!$this->isAdminLoggedIn) {

            return redirect()->to(site_url('dashboard'));   
        }

           $noticemodel=new TenantNoticeBoardModel();


           $tenant_id=$this->request->getPost('tenant_id');


           //print_r($tenant_id);exit();
           $ten_nt_title=$this->request->getPost('ten_nt_title');
           $ten_nt_description=$this->request->getPost('ten_nt_description');

        $data=[

            'tenant_id'=>$tenant_id,
            'ten_nt_title'=>$ten_nt_title,
            'ten_nt_description'=>$ten_nt_description,

             ];
           

           // echo "<pre>";
           // print_r($data);exit();
          $noticemodel->save($data);

         $this->session->setFlashdata('message','Add Tenant Notice');
         return redirect()->to(site_url('addTenantNotice'));

     }



}
