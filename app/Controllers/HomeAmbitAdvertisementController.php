<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Session\Session;
use App\Libraries\Paginationnew;
use App\Models\AdminModel;
use App\Models\Home_Advertisement;
class HomeAmbitAdvertisementController extends BaseController {

    protected $session;
    protected $isAdminLoggedIn;

    public function __construct() {

        $this->session = session();
        $this->isAdminLoggedIn = $this->session->get('isAdminLoggedIn');
    }

    public function ViewAdvt()
    {

        if (!$this->isAdminLoggedIn) {

            return redirect()->to(site_url('dashboard'));   
        }

            $data['pagetitle']='Advertisement List';
            $data['action'] = "viewAdvt";
            $AllTypeGuest=new Home_Advertisement();
            $paginationnew = new Paginationnew();  

             $txtsearch = $this->request->getGet('adt_name');
            if ($txtsearch) 
            {
                $searchArray['adt_name'] = $txtsearch;
            
            }

            $page = $this->request->getGet('page');
            $page = $page ? $page : 1;
            $Limit = 25;

            $startLimit = ($page - 1) * $Limit;
            $data['startLimit'] = $startLimit;

            $totalRecord = $AllTypeGuest->getDataGuest($searchArray, '', '',1); 
            $pagination = $paginationnew->getPaginate($totalRecord, $page, $Limit);

            $data['adt_name'] = $txtsearch;
            $data['startLimit'] = $startLimit;
            $data['pagination'] = $pagination;


           $data["viewGuest"] = $AllTypeGuest->getDataGuest($searchArray, $startLimit, $Limit);
           $data["searchArray"] = $searchArray;
           $data['viewad']=$AllTypeGuest->findAll();
        $this->template->render('admintemplate','contents','admin/Advt/viewAdvt',$data);
       
     }


     public function AddAdvt(){
         if (!$this->isAdminLoggedIn) {

            return redirect()->to(site_url('dashboard'));   
        }

        $data['pagetitle']='Add Advertisement';
       
         $this->template->render('admintemplate','contents','admin/Advt/AddAdvt',$data); 
     }

     public function AddedDataAdvertisementStore(){
         if (!$this->isAdminLoggedIn) {

            return redirect()->to(site_url('dashboard'));   
        }


        $advetisement=new Home_Advertisement();

        $adt_name=$this->request->getPost('adt_name');
       

         $file = "";
            $adt_file=$this->request->getFile('adt_file');
            if ($adt_file) {
                $file_type = $adt_file->getClientMimeType();
                $valid_file_types = array("image/png", "image/jpeg", "image/jpg");

                if (in_array($file_type, $valid_file_types)) {
                    $file = $adt_file->getName();

                    if ($adt_file->move('uploads/essential', $file)) {
                        $adt_file = $adt_file->getName();
                    }
                }
            }

            $data = [
                 'adt_name'=> $adt_name, 
                 'adt_file'=>$adt_file,
               
               
            ];

            $advetisement->save($data);
        $this->session->setFlashdata('message','advetisement Added');
        return redirect()->to(site_url('AddAdvt'));

     }
      public function edit_advertisement($id){

        if(!$this->isAdminLoggedIn){

            return redirect()->to(site_url('admin'));
        }


        $edit_advertisement=new Home_Advertisement();

        $data['edit_advertisement']=$edit_advertisement->where('ad_id',$id)->first();
        
        // echo "<pre>";
        // print_r($data['edit_advertisement']);exit();
    
        $this->template->render('admintemplate','contents','admin/Advt/edit_advertisement',$data);

       }
       public function UpdateDataAdvertisementStore($id=0){

        if(!$this->isAdminLoggedIn){
            return redirect()->to(site_url('admin'));
        }

        $updateDataAdver=new Home_Advertisement();

        $adt_name=$this->request->getPost('adt_name');
        $id=$this->request->getPost('ad_id');

        
        $image_advertise=$updateDataAdver->find($id);
     
        $old_image_adverisement=$image_advertise['adt_file'];
       
        $img_ad=$this->request->getFile('adt_file');


        if($img_ad->isValid() && ! $img_ad->hasMoved()){

            if(file_exists('uploads/essential'.$old_image_adverisement))
            {
               
                 @unlink('uploads/essential'.$old_image_adverisement);

            }
        
        $image_advt_name=$img_ad->getClientName();
        $img_ad->move('uploads/essential'.$image_advt_name);
    }
    else{
        $image_advt_name=$old_image_adverisement;
    }

        $data=[

                'adt_name' => $adt_name,
                'adt_file' =>$image_advt_name
                  
        ];

        // echo"<pre>";
        // print_r($data);exit();
            
           
        $updateDataAdver->set($data)->where('ad_id',$id)->update();
    

        $this->session->setFlashdata('message','Advertisement Updated');
        return redirect()->to(site_url('Essentials/edit_advertisement/'.$id));
        
       


   }


   public function delete_advertisement($id){

    if(!$this->isAdminLoggedIn){
        
        return redirect()->to(site_url('admin'));

    }

    $delete_advertisement=new Home_Advertisement();

    $delete_advertisement->where('ad_id',$id)->delete();

    return redirect()->to(site_url('viewAdvt'));

   }

}
