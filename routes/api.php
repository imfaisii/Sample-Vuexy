<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('test', function () {
    return "EAS";
});
Route::group(['middleware'=>'auth:sanctum'],function () {

    Route::group(['middleware' => ['permission:Super_Admin_view']], function () {
        /* Routes to Add roles and Permission Begin*/
           /* Role controller */
           Route::get('role', [RoleController::class, 'index'])->name('role.index');
           Route::get('role/add', [RoleController::class, 'create_view'])->name('role.create_view');
           Route::get('permission/add', [RoleController::class, 'create_view_permission'])->name('permission_create_view');
           Route::get('role-permission/add', [RoleController::class, 'create_view_role_permission'])->name('role-permission.create_view');
           Route::get('user-role/add', [RoleController::class, 'create_view_user_role'])->name('user-role.create_view');
           Route::get('user-permission/add', [RoleController::class, 'create_view_user_permission'])->name('user_permission_create_view');
           Route::post('role/create', [RoleController::class, 'store_role'])->name('role.create_role');
           Route::POST('role/delete', [RoleController::class, 'delete_role'])->name('role.delete');
           Route::post('permission/create', [RoleController::class, 'store_permission'])->name('permission.create_permission');
           Route::POST('permission/delete', [RoleController::class, 'delete_permission'])->name('permission.delete');
           Route::post('role_to_permission/create', [RoleController::class, 'store_role_to_permission'])->name('role_to_permission_add');
           Route::POST('role_to_permission/Delete', [RoleController::class, 'delete_role_to_permission'])->name('role_to_permission_delete');
           Route::post('role_tos_user/create', [RoleController::class, 'store_role_to_user'])->name('create.role_to_user');
           Route::POST('role_to_user/delete', [RoleController::class, 'delete_role_to_user'])->name('role_to_user_delete');
           Route::POST('permission_to_user/create', [RoleController::class, 'store_permission_to_user'])->name('create.permission_to_user');
           Route::POST('permission_to_user/delete', [RoleController::class, 'delete_permission_to_user'])->name('permission_to_user_delete');
        /*Routes to Add roles and permission End*/ 
     });
    
});

// Route::post('AuthRoute', function (Request $request) {

//     try {
//         DB::beginTransaction();
//         if ($request->filled('email')) {
//             if (User::where('email', '=', $request->email)->exists()) {
//                 $token = User::where('email', '=', $request->email)->value('api_token');
//                 $user = User::where('email', $request->email)->first();
//                 // MailController::SendEmail($user, 'You have been logged into the app!');
//                 return response()->json([
//                     'message' => 'success',
//                     'response' => [
//                         'details' => 'User already exists!',
//                         'UserModel' => $user->where('id', $user->id)->with(['attributes'])->get(),
//                     ],
//                     'token' => $token,
//                     'status' => 200
//                 ], 200);
//             }
//         }
//         $validator = Validator::make(
//             $request->all(),
//             [
//                 'email' => 'required|email',
//                 'password' => 'required|min:6',
//                 'birthday' => 'required',
//                 'first_name' => 'required|string',
//                 'last_name' => 'required|string',
//                 'phone_no' => 'required|numeric|unique:users,phone_no'
//             ],
//         );

//         if ($validator->fails()) {

//             return response()->json([
//                 'message' => 'error',
//                 'response' => [
//                     'details' => 'Validation errors for sign up!',
//                     'errors' => $validator->errors()
//                 ],
//                 'status' => 422
//             ], 422);
//         }
//         $user = User::create([
//             'email' => $request->email,
//             'first_name' => $request->first_name,
//             'last_name' => $request->last_name,
//             'password' => Hash::make($request->password),
//             'birthday' => $request->birthday,
//             'phone_no' => $request->phone_no,
//         ]);
//         $attributes = UserAtrributes::create([
//             'user_id' => $user->id
//         ]);
//         SanctumTokenController::generate_token_with_email($request->email);
//         $token = User::where('email', '=', $request->email)->value('api_token');
//         $user = User::where('email', $request->email)->first();
//         if ($user) {
//             DB::commit();
//             // MailController::SendEmail($user, 'You have been signed up at the Family Tracker app!');
//             return response()->json([
//                 'message' => 'success',
//                 'response' => [
//                     'details' => 'User created succesfully!',
//                     'UserModel' => $user->where('id', $user->id)->with(['attributes'])->get(),
//                 ],
//                 'token' => $token,
//                 'status' => 200
//             ], 200);
//         }
//         DB::rollBack();
//         return response()->json([
//             'message' => 'error',
//             'response' => [
//                 'details' => 'Invalid parameters supplied!',
//             ],
//             'status' => 400
//         ], 400);
//     } catch (Exception $exception) {
//         DB::rollBack();
//         return response()->json([
//             'message' => 'exception',
//             'response' => $exception->getMessage(),
//             'status' => 500
//         ], 500);
//     }
// });

Route::post('custom_auth', function (Request $request) {
    $pusher = new Pusher\Pusher(env('PUSHER_APP_KEY'), env('PUSHER_APP_SECRET'), env('PUSHER_APP_ID'));
    return $pusher->socket_auth($request->get('channel_name'), $request->get('socket_id'));
});
