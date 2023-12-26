<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('WebsiteController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

$routes->resource('ApiRegisterTenant');
$routes->post('saveTenant','ApiProfileTenant::saveTenant');
$routes->post('registerTenant','ApiRegisterForTenant::registerTenant');
$routes->post('loginTenant','ApiLoginForTenant::LoginTenant');


$routes->get('viewOwner','OwnerController::index');
$routes->get('addOwner','OwnerController::AddOwner');
$routes->post('Owner/saveDataOwner','OwnerController::saveDataOwner');

//Guset Register page
$routes->get('guest','GuestController::viewGuest');
$routes->get('addguest','GuestController::addGuest');

//Client Register page
$routes->get('viewemployee','EmployeeController::viewEmployee');
$routes->get('addemployee','EmployeeController::addEmployee');

//Client Register page
$routes->get('viewClient','ClientController::viewClient');
$routes->get('addclient','ClientController::addClient');

//Admin Register Page
$routes->get('viewAdmin','adminController::viewAdmin');
$routes->get('addAdmin','adminController::addAdmin');
$routes->post('saveadmin','adminController::saveDataAdmin');
$routes->get('previewAdmin/(:num)','adminController::previewAdmin/$1');
$routes->get('edit_Admin/(:num)','adminController::edit_Admin/$1');
$routes->post('updatedataAdmin','adminController::updateDataAdmin');
$routes->get('delete_admin/(:num)','adminController::delete_admin/$1');

//Api Notice Tenant Board
$routes->post('saveTenantNoticeBoard','ApiTenantNoticeBoard::saveTenantNoticeBoard');

//Api invitation 
$routes->post('getIdInvitation','ApiInvitation::GetTenantInvitation');

//Api Guest
$routes->post('registerGuest','ApiGuestRegisterAndLogin::saveguest');
$routes->post('GuestLogin','ApiGuestLogin::Login');

//Api Guest Profile 
$routes->post('saveProfileGuest','ApiGuestProfile::UpdateProfileGuest');

//Api Guest
$routes->post('saveEmployee','ApiEmployee::saveemployee');
//$routes->post('GuestLogin','ApiEmployee::Login');

//Api Client
$routes->post('saveClient','ApiClient::saveclient');
$routes->post('clientLogin','ApiClient::Login');

//Api Admin
$routes->post('saveAdmin','ApiAdmin::saveadmin');
$routes->post('adminLogin','ApiAdmin::Login');

//Api test
$routes->post('testUpdate','ApiTestUpdate::updateTest');


$routes->get('addtenant','TenantController::AddTenant');
$routes->post('Tenant/saveDataTenant','TenantController::saveDataTenant');
$routes->get('Tenant/edit_Tenant/(:any)','TenantController::edit_Tenant/$1');

$routes->get('viewTenant','TenantController::index');


$routes->resource('ApiProfileOwner');
$routes->post('saveOwner','ApiProfileOwner::saveOwner');
$routes->post('registerOwner','ApiProfileOwner::registerOwner');
$routes->post('loginOwner','ApiProfileOwner::loginOwner');

$routes->post('proFileRequest','ApiProfileTenant::profileRequest');
$routes->post('checkFileUpload','ApiCheckTestFile::fileupload');
$routes->post('sendChatAndListing','ApiChat::Chat');

//$routes->post('getChatList','ApiChat::ChatList');


$routes->get('admin', 'Admin::index');
$routes->get('dashboard', 'Admin::dashboard');
$routes->get('logout', 'Admin::logout');
$routes->get('adminusers', 'AdminController::adminusers');
$routes->get('newaccount', 'AdminController::newAccount');
$routes->post('addaccount', 'AdminController::addAccount');
$routes->get('editaccount', 'AdminController::editAccount');
$routes->post('updateaccount', 'AdminController::updateAccount');
$routes->get('delaccount', 'AdminController::delAccount');

$routes->get('adminprofile', 'AdminProfile::index');
$routes->get('cpassword', 'AdminProfile::cpassword');
$routes->post('updatepassword', 'AdminProfile::UpdatePassword');


$routes->get('chatTenant',"ChatCenterController::tenantIndex");

$routes->get('chatGuest',"ChatCenterController::GuestIndex");

$routes->get('adminChat','ChatCenterController::ownerWithAdmin');

$routes->get('adminChatGuest','ChatCenterController::guestchatWithAdmin');


$routes->post('adminChartSynchronouswithGuest','ChatCenterController::postDataAdminChatguest');


$routes->get('adminChatForTenant','ChatCenterController::tenantWithAdmin');


$routes->get('chatOwner','ChatCenterController::index');
$routes->post('adminChartSynchronous','ChatCenterController::postDataAdminChat');
$routes->post('adminChartSynchronouswithTenant','ChatCenterController::postDataAdminChatTenant');

//Home Ambit Advertisement
$routes->get('getAdvertisement','ApiHomeAdvertisement::ListAdvertisement');

//Home Ambit Adt Controller
$routes->get('AddAdvt','HomeAmbitAdvertisementController::AddAdvt');
$routes->get('viewAdvt','HomeAmbitAdvertisementController::ViewAdvt');

//Tenant Notice Board
$routes->post('getNotice','ApiNotice::GetNotice');



//feedback
$routes->post('saveFeedback','ApiFeedback::sendFeedback');
$routes->get('feedbackUser','FeedBackController::feeList');

$routes->get('addnotice','NoticeController::addnotice');
$routes->get('viewnotice','NoticeController::viewnotice');

//CarWash
$routes->post('CarWashCreateCustomer','ApiCarWashCustomer::createCarWashCustomer');
$routes->post('carWashLogin','ApiCarWashCustomer::login');
$routes->post('CarWashCreateVendorShop','ApiWashVendorShop::createCarWashVendor');
$routes->post('carWashVendorLogin','ApiWashVendorShop::login');

;//chat
$routes->get('chatreport', 'chatReportController::chatreport');
$routes->get('chat','chatReportController::viewChat');
$routes->post('adminChatOwnerwithtenant','chatReportController::threechatSave');


//Tenant Add 
$routes->get('addtenant','TenantController::AddTenant');
$routes->post('Tenant/saveDataTenant','TenantController::saveDataTenant');
$routes->get('Tenant/edit_Tenant/(:any)','TenantController::edit_Tenant/$1');


$routes->get('getTenantListing','ApiGetRelation::GetTenantRelation');

$routes->get('getOwnerListing','ApiGetRelation::GetOwnerRelation');
//$routes->post('Tenant/updateDataTenant/(:any)','TenantController::updateDataTenant/$1');

$routes->get('viewTenant','TenantController::index');
$routes->get('TenantController/delete_Tenant/(:num)','TenantController::delete_Tenant/$1');


$routes->get('dropdown','DropdownAjaxController::index');


$routes->get('getByTenant','ApiGetByIdTenant::GetByTenant');

$routes->get('getByOwner','ApiGetByIdOwner::GetByOwner'); 

$routes->get('viewtenant','TenantController::index');



$routes->get('getTenantInformation','ApiOwnergetTenantInformation::GetTenantInformation');
$routes->get('getOwnerInformation','ApiTenantgetOwnerInformation::GetOwnerInformation');
//Customer

//Api Tenant
//$routes->post('registerTenant','ApiRegisterTenant::saveTenant');

//Changpassword Guset Gustchangepass GusetUpPass

$routes->get('Gustchangepass/id/(:num)','GuestController::GuestChangePass/$1');
$routes->post('GuestController/guestchangepassword(:any)','GuestController::GusetUpPass');

if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
