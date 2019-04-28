<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('admin.adminlogin');
});

Route::group(['middleware' => 'auth'], function () {
    // Authentication Routes...
   Route::get('dashboard','AdminController@Dashboard')->name('dashboard');
   Route::get('event','AdminController@Event')->name('Adminhome');
 //Users outing
   Route::get('addnewuser','UserController@AddNewUser')->name('addnewuser');
   Route::post('add_user_account','UserController@AddNewUserAccount')->name('add_user_account');//->middleware(['permission:addd-user']);
   Route::get('user_list','UserController@UserList')->name('user_list')->middleware(['permission:view-user']);
   Route::get('edit_user/{id}','UserController@editUser')->name('edit_user')->middleware(['permission:edit-user']);
   Route::post('edit_user_request','UserController@userEdit')->name('edit_user_request')->middleware(['permission:edit-user']);

 //API Routing
   Route::post('createnewapi','AdminController@CreateNewAPI')->name('createnewapi')->middleware(['permission:add-client']);
   Route::get('viewclient','UserController@Viewclient')->name('viewclientew');
   Route::get('view_client_profile/{id}','AdminController@ViewClientProfile')->name('view_client_profile');
   Route::get('createapi','AdminController@CreateAPI')->name('createapi')->middleware(['permission:add-client']);
   Route::get('apilist','AdminController@APIList')->name('apilist')->middleware(['permission:view-client']);
   Route::get('regenerate_client_secret/{id}','AdminController@Regenerate_Client_Sceret')->name('regenerate_client_secret')->middleware(['permission:re-client']);
  Route::get('edit_client/{id}','AdminController@EditClient')->name('edit_client');
  Route::post('edit_client_request','AdminController@EditClientRequest')->name('edit_client_request');

//Permission Routing
   Route::get('permission','PermissionController@Permission')->name('permission')->middleware(['permission:add-permission']);
   Route::post('new_permission','PermissionController@newPermission')->name('new_permission')->middleware(['permission:add-permission']);
   Route::get('permission_list','PermissionController@Permission_List')->name('permission_list')->middleware(['permission:view-permission']);
   Route::get('edit_permission/{id}','PermissionController@editPermission')->name('edit_permission')->middleware(['permission:edit-permission']);
   Route::post('edit_permission_request','PermissionController@editPermissionRequest')
   ->name('edit_permission_request')->middleware(['permission:edit-permission']);
//Role Routing
   Route::get('role','RoleController@Role')->name('role')->middleware(['permission:add-role']);
   Route::post('new_role','RoleController@New_Role')->name('new_role')->middleware(['permission:add-role']);
   Route::get('rolelist','RoleController@Role_List')->name('rolelist')->middleware(['permission:view-role']);
   Route::get('edit_role/{id}','RoleController@Edit_Role')->name('edit_role')->middleware(['permission:edit-role']);
   Route::post('edit_role_request','RoleController@editRoleRequest')->name('edit_role_request')->middleware(['permission:edit-role']);
   //mail Routing
   //Route::get('sendmail','AdminController@sendMail')->name('sendMail');

  //profile
   Route::get('profile','UserController@Profile')->name('profile');
   Route::post('update_name','UserController@updateName')->name('update_name');
   Route::post('update_email','UserController@updateEmail')->name('update_email');
   Route::post('change_password','UserController@ChangePassword')->name('change_password');
 

  //Route::get('mailpage','AdminController@mailPage')->name('mailpage');

});






Auth::routes();
Route::get('onetime_password_update/{randon}/{time}/{userid}','UserController@psswordUpdate')->name('onetime_password_update');
  

Route::post('update_onetime_password','UserController@updateOnetimrPassword')->name('update_onetime_password');
// Route::get('updatepassword','UserController@updatePassword')->name('updatepassword');
Route::post('update_onetime_password','UserController@updateOnetimrPassword')->name('update_onetime_password');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('adminlogin','AdminController@AdminLogIn')->name('adminlogin');
//Route::get('adminlogin', 'Auth\LoginController@showLoginForm');
Route::get('adminregister','AdminController@AdminRegister')->name('adminregister');
Route::get('verifyemail/{var}/{now}/{userid}/{email}','UserController@verifyEmail')->name('verifyemail');

//token Routing
Route::post('uerlogin','Datacontroller@login');
Route::post('api/pk', 'AccessTokenController@issueToken');
Route::get('user',"Datacontroller@APIUser")->name('apilink')->middleware('auth:api');

//log
Route::get('logdata','AdminController@logWrite')->name('logdata');
Route::post('test','UserController@test');
