<?php

use App\Events\Listener;
use App\Events\myEvent;
use App\Events\Test;
use App\Events\UserSignedUp;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MasterPageController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SupportController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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

Route::get('exception', function () {
    return view('errors.error');
})->name('exception');

Route::post('forget-password', [MailController::class, 'forget_passowrd'])->name('forget_password');
/* Routes By  Hamza Begin*/

Route::group(['middleware' => ['auth']], function () {
    /* Routes for user online and offline system */
    Route::post('I_online', [MasterPageController::class, 'Status_Online'])->name('I_online');
    Route::post('I_offline', [MasterPageController::class, 'Status_Offline'])->name('I_offline');
    /* Routes for user online and offline system */
    Route::get('/', function () {
        return view('layouts.master');
    });

    Route::get('/dashboard', function () {
        return view('layouts.master');
    })->name('dashboard');

    Route::get('Role', [RoleController::class, 'role_index'])->name('Role');
    Route::get('Permission', [RoleController::class, 'permission_index'])->name('Permission');
    Route::post('RolePerAdd', [RoleController::class, 'RolePerAdd'])->name('RolePerAdd');
    Route::post('DeleteRole', [RoleController::class, 'delete_role'])->name('DeleteRol');
    Route::post('Get_Permission_Of_Role', [RoleController::class, 'Get_Permission_Of_Role'])->name('Get_Permission_Of_Role');
    Route::post('EditRolePer', [RoleController::class, 'EditRolePer'])->name('EditRolePer');
    Route::POST('Role-User-Del', [RoleController::class, 'delete_role_to_user'])->name('DelUserPer');
    Route::post('Create-User_Role', [RoleController::class, 'store_role_to_user'])->name('create.role_to_user');
    Route::post('Get-User_Role', [RoleController::class, 'get_user_role'])->name('get_user_role');
    Route::post('DeletePermission', [RoleController::class, 'delete_permission'])->name('DeletePermission');
    Route::post('PermissionAdd', [RoleController::class, 'store_permission'])->name('PermissionAdd');
    Route::POST('permission_to_user/create', [RoleController::class, 'store_permission_to_user'])->name('create.permission_to_user');
    Route::POST('EditPerUser', [RoleController::class, 'EditPerUser'])->name('EditPerUser');
    Route::post('GetPerUser', [RoleController::class, 'get_user_permission'])->name('UserPer');
    Route::post('GetPermission', [RoleController::class, 'get_permission'])->name('GetPermission');
    Route::post('GetPermissionData', [RoleController::class, 'GetPermissionData'])->name('GetPermissionData');
    Route::post('GetRoleData', [RoleController::class, 'GetRoleData'])->name('GetRoleData');

    Route::group(
        [
            'as' => 'support.',
        ],
        function () {
            Route::get('support_index', [SupportController::class, 'index'])->name('index');
            Route::get('support_chat', [SupportController::class, 'support_chat'])->name('chat');
            Route::post('make_agent_available', [RoomController::class, 'make_agent_available'])->name('make_agent_available');
            Route::post('make_agent_offline', [RoomController::class, 'make_agent_offline'])->name('make_agent_offline');
            Route::post('agent_available', [RoomController::class, 'agent_available'])->name('agent_available');
            /* works fine for myEvent */
            Route::get('Support_agent', [RoomController::class, 'support_agent'])->name("support_agent");
            Route::post('create_room', [RoomController::class, 'create_room'])->name('create_room');
            Route::post('send_event', function (Request $req) {
                event(new myEvent($req->user_name, $req->message, $req->receiver, $req->room));
            })->name('event_send');

         });

        }
    );



require __DIR__ . '/auth.php';

// Drop down routes start here

Route::get('get-states', [CountryDropDownController::class, 'getStates'])->name('guest.get-states');
Route::get('get-cities', [CountryDropDownController::class, 'getCities'])->name('guest.get-cities');

// Notifications Routes below

Route::group(
    [
        'prefix' => 'db-notifications',
        'as' => 'notification.',
        'middleware' => 'auth'
    ],
    function () {
        Route::get('/send-notification', [NotificationsController::class, 'SendTestMail'])->name('send');
        Route::get('/get-notifications', [NotificationsController::class, 'GetUserNotifications'])->name('get');
        Route::get('/mark-all-as-read', [NotificationsController::class, 'MarkAllAsRead'])->name('mark-all-as-read');
    }
);

// Routes for web-socketing
