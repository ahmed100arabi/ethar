<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/case/(:num)', 'CaseController::details/$1');
$routes->get('/create-case', 'CaseController::create');

// Public Pages (Placeholders)
$routes->get('/cases', 'Home::index'); // Redirect to home for now
$routes->get('/about', 'Home::index');
$routes->get('/contact', 'Home::index');

// Campaign Routes
$routes->get('/campaigns', 'CampaignController::index');
$routes->get('/campaigns/(:num)', 'CampaignController::details/$1');
$routes->post('/campaigns/register', 'CampaignController::register');
$routes->get('/campaigns/verify', 'CampaignController::verify');
$routes->post('/campaigns/confirm', 'CampaignController::confirm');

// Blood Donation Routes
$routes->get('/blood-donation', 'BloodDonationController::index');
$routes->post('/blood-donation/donate', 'BloodDonationController::donate');
$routes->get('/blood-donation/verify', 'BloodDonationController::verify');
$routes->post('/blood-donation/confirm', 'BloodDonationController::confirm');

// Payment Routes
$routes->post('/payment/init', 'PaymentController::init');
$routes->get('/payment/amount', 'PaymentController::amount');
$routes->post('/payment/process', 'PaymentController::process');
$routes->get('/payment/select-method', 'PaymentController::selectMethod');
$routes->get('/payment/fake-card', 'PaymentController::fakeCard');
$routes->post('/payment/process-fake-card', 'PaymentController::processFakeCard');
$routes->get('/payment/prepaid-card-form', 'PaymentController::prepaidCardForm');
$routes->get('/payment/success', 'PaymentController::success');

// Prepaid Card Payment Routes
$routes->post('/payment/redeem-card', 'PaymentController::redeemCard');

// Auth Routes
$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::attemptLogin');
$routes->get('/register', 'AuthController::register');
$routes->post('/register', 'AuthController::attemptRegister');
$routes->get('/logout', 'AuthController::logout');

$routes->group('admin', ['filter' => 'auth:admin'], function($routes) {
    $routes->get('/', 'AdminController::dashboard');
    $routes->get('requests', 'AdminController::requests');
    $routes->get('requests/(:num)', 'AdminController::requestDetails/$1');
    $routes->post('cases/update-image/(:num)', 'AdminController::updateCaseImage/$1');
    $routes->post('approve/(:num)', 'AdminController::approve/$1');
    $routes->get('reject/(:num)', 'AdminController::reject/$1');
    
    // Campaigns Management
    $routes->get('campaigns', 'AdminController::campaigns');
    $routes->get('campaigns/create', 'AdminController::createCampaign');
    $routes->post('campaigns/store', 'AdminController::storeCampaign');
    $routes->get('campaigns/edit/(:num)', 'AdminController::editCampaign/$1');
    $routes->post('campaigns/update/(:num)', 'AdminController::updateCampaign/$1');
    $routes->get('campaigns/delete/(:num)', 'AdminController::deleteCampaign/$1');
    $routes->get('campaigns/approve/(:num)', 'AdminController::approveCampaign/$1');
    $routes->get('campaigns/reject/(:num)', 'AdminController::rejectCampaign/$1');
    
    $routes->get('users', 'AdminController::users');
    $routes->post('users/store-admin', 'AdminController::storeAdmin');
    $routes->get('ban-user/(:num)', 'AdminController::banUser/$1');
    $routes->get('reports', 'AdminController::reports');
    $routes->get('cases', 'AdminController::cases');
    $routes->get('cases/delete/(:num)', 'AdminController::deleteCase/$1');
    $routes->get('edit-case/(:num)', 'AdminController::editCase/$1');
    $routes->post('update-case/(:num)', 'AdminController::updateCase/$1');
    
    // Blood Requests Management
    $routes->get('blood-requests', 'AdminController::bloodRequests');
    $routes->get('blood-requests/approve/(:num)', 'AdminController::approveBlood/$1');
    $routes->get('blood-requests/reject/(:num)', 'AdminController::rejectBlood/$1');
    $routes->get('blood-requests/delete/(:num)', 'AdminController::deleteBloodRequest/$1');

    // Prepaid Cards Management
    $routes->get('prepaid-cards', 'AdminController::prepaidCards');
    $routes->post('prepaid-cards/create', 'AdminController::createCard');
    $routes->get('prepaid-cards/delete/(:num)', 'AdminController::deleteCard/$1');
    
    // Case Priority Toggle
    $routes->get('toggle-priority/(:num)', 'AdminController::togglePriority/$1');

    // Campaigns Management
    $routes->get('campaigns', 'AdminController::campaigns');
    $routes->get('campaigns/approve/(:num)', 'AdminController::approveCampaign/$1');
    $routes->get('campaigns/reject/(:num)', 'AdminController::rejectCampaign/$1');
});

// Patient Dashboard Routes
$routes->group('patient', ['filter' => 'auth:user'], function($routes) {
    $routes->get('dashboard', 'PatientController::index');
    $routes->get('create-request', 'PatientController::createRequest');
    $routes->post('create-request', 'PatientController::storeRequest');
    $routes->get('create-blood-request', 'PatientController::createBloodRequest');
    $routes->post('create-blood-request', 'PatientController::storeBloodRequest');
    $routes->get('my-requests', 'PatientController::myRequests');
    $routes->get('donors', 'PatientController::donors');
});
