<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Session\Session;
use App\Models\AdminModel;

use App\Models\TenantRegistrationModel;
use App\Models\OwnerRegisterModel;
use App\Models\ChatModel;
use App\Models\GuestAllTypeModel;
use App\Models\EmployeeModel;
use App\Models\ClientModel;
use App\Models\AdminBaseModel;
class Admin extends BaseController {

    protected $session;
    protected $isAdminLoggedIn;

    public function __construct() {

        $this->session = session();
        $this->isAdminLoggedIn = $this->session->get('isAdminLoggedIn');
    }

    public function index() {

        //$session = session();

        $isAdminLoggedIn = $this->session->get('isAdminLoggedIn');

        if ($isAdminLoggedIn) {

            return redirect()->to(site_url('dashboard'));
        }
        $data = array();

        if (isset($_COOKIE['adminremember'])) {

            $data['adminremember'] = $_COOKIE['adminremember'];
            $data['cameronadmin'] = $_COOKIE['cameronadmin'];
            $data['cameronadminpass'] = $_COOKIE['cameronadminpass'];
        }
        $method = $this->request->getMethod();

        $adminModel = new AdminModel();

        if ($method == 'post') {

            $username = $this->request->getPost('username');

            $password = $this->request->getPost('password');
            $adminremember = $this->request->getPost('adminremember');

            if ($username != '' && $password != '') {

                $return = $adminModel->checkAdminLogin($username, $password);
                if ($return == 2) {
                    $this->session->setFlashdata('errmessage', 'Your account is not active');
                } else if ($return) {
                    //set cookie for login
                    if ($adminremember) {

                        setcookie('adminremember', $adminremember, strtotime('+1 year'), '/');
                        setcookie('cameronadmin', $username, strtotime('+1 year'), '/');
                        setcookie('cameronadminpass', $password, strtotime('+1 year'), '/');
                    } else {
                        setcookie('adminremember', $adminremember, time() - 3600, '/');
                        setcookie('cameronadmin', $username, time() - 3600, '/');
                        setcookie('cameronadminpass', $password, time() - 3600, '/');
                    }

                    return redirect()->to(site_url('dashboard'));
                } else {
                    $this->session->setFlashdata('errmessage', 'Invalid Email / Password');
                }
            } else {

                $this->session->setFlashdata('errmessage', 'Invalid Email / Password');
            }
        }

        $this->template->render('admintemplate', 'contents', 'admin/loginTpl', $data);
    }

    public function dashboard() {
        //print_r( $this->session->get() );
        $arrVeiwcontent = array('errorMsg' => '');
        $adminModel = new AdminModel();
        $chatmodel=new ChatModel();
      
       
        $admin_type = $this->session->get('admin_type');
        $admin_id = $this->session->get('admin_id');
        
        $tenantRegister=new TenantRegistrationModel();
          $ownerRegister=new OwnerRegisterModel();
          $guset=new GuestAllTypeModel();

          $empl=new EmployeeModel();
          $client=new ClientModel();
          $admin=new AdminModel();
          

        $arrVeiwcontent['tenant']=$tenantRegister->countAll();

         $arrVeiwcontent['owner']=$ownerRegister->countAll();

          $arrVeiwcontent['guest']=$guset->where('type','guest')->countAllResults();
          $arrVeiwcontent['empl']=$empl->where('type','employee')->countAllResults();
           $arrVeiwcontent['client']=$client->where('type','client')->countAllResults();

           $arrVeiwcontent['admin']=$admin->where('admin_type','subadmin')->countAllResults();

         // echo "<pre>";
         // print_r($arrVeiwcontent['admin']);exit();

        $arrVeiwcontent['admin_type'] = $admin_type;
        if (!$this->isAdminLoggedIn) {

            return redirect()->to(site_url('admin'));
        }   

         
        // get today date
        $query_date = date('d-m-Y');
        $todayDate = date('Y-m-d');

        //yesterday date
        $yesterday = strtotime('-1 day', strtotime($todayDate));
        $yesterdayStart = date('Y-m-d', $yesterday);
        $yesterdayEnd = date('Y-m-d', $yesterday);
        //get last month start and end date
        $lastmothdate = strtotime('-1 month', strtotime($todayDate));
        $lastmothStart = date('Y-m-01', $lastmothdate);
        $lastmothEnd = date('Y-m-t', $lastmothdate);

        // this month start and end date
        $firstDayOfMonth = date('Y-m-01', strtotime($query_date));
        $lastdayofMonth = date('Y-m-t', strtotime($query_date));

        //Current week date
        $monday = strtotime('last monday');
        $monday = date('w', $monday) == date('w') ? $monday + 7 * 86400 : $monday;
        $sunday = strtotime(date('Y-m-d', $monday) . ' +6 days');
        $this_week_sd = date('Y-m-d', $monday);
        $this_week_ed = date('Y-m-d', $sunday);
        
        

        $this->template->render('admintemplate', 'contents', 'admin/dashboard', $arrVeiwcontent);
    }

    public function logout() {
        //$session = session();
        $adminSession = array('admin_id', 'admin_email', 'admin_name', 'isAdminLoggedIn', 'admin_type', 'adminLoggedIn');
        $this->session->remove($adminSession);
        return redirect()->to(site_url('admin'));
    }

}
