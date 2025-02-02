<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\InstallmentController;




    Route::get('/',[AuthController::class,'login']);
    Route::post('/',[AuthController::class,'auth_login']);
    Route::get('logout',[AuthController::class,'logout']);



Route::group(['middleware'=>'admin'],function(){

    ///Admins
    Route::get('admins/add',[AdminController::class,'add']);
    Route::post('admins/add',[AdminController::class,'insert']);
    Route::get('admins/list',[AdminController::class,'list']);
    Route::get('admins/edit/{id}',[AdminController::class,'edit']);
    Route::post('admins/edit/{id}',[AdminController::class,'update']);
    Route::delete('admins/delete/{id}',[AdminController::class,'delete']);

     ///Employee
     Route::get('employee/add',[EmployeeController::class,'add']);
     Route::post('employee/add',[EmployeeController::class,'insert']);
     Route::get('employee/list',[EmployeeController::class,'list']);
     Route::get('employee/details/{id}',[EmployeeController::class,'details']);
     Route::get('employee/edit/{id}',[EmployeeController::class,'edit']);
     Route::post('employee/edit/{id}',[EmployeeController::class,'update']);
     Route::delete('employee/delete/{id}',[EmployeeController::class,'delete']);
     Route::get('employee/print',[EmployeeController::class,'print']);

     ///Assets
     Route::get('asset/add',[AssetController::class,'add']);
     Route::post('asset/add',[AssetController::class,'insert']);
     Route::get('asset/list',[AssetController::class,'list']);
     Route::get('asset/edit/{id}',[AssetController::class,'edit']);
     Route::post('asset/edit/{id}',[AssetController::class,'update']);
     Route::delete('asset/delete/{id}',[AssetController::class,'delete']);
     Route::get('asset/print',[AssetController::class,'print']);


      ///Tours
      Route::get('tour/add',[TourController::class,'add']);
      Route::post('tour/add',[TourController::class,'insert']);
      Route::get('tour/list',[TourController::class,'list']);
      Route::get('tour/details/{id}',[TourController::class,'details']);
      Route::get('tour/edit/{id}',[TourController::class,'edit']);
      Route::post('tour/edit/{id}',[TourController::class,'update']);
      Route::delete('tour/delete/{id}',[TourController::class,'delete']);


      ///Tour Member
      Route::get('member/add/{id}',[MemberController::class,'add']);
      Route::post('member/add/{id}',[MemberController::class,'insert']);
      Route::get('member/edit/{id}',[MemberController::class,'edit']);
      Route::post('member/edit/{id}',[MemberController::class,'update']);
      Route::delete('member/delete/{id}',[MemberController::class,'delete']);
      
      ///Expense
      Route::get('expense/add/{id}',[ExpenseController::class,'add']);
      Route::post('expense/add/{id}',[ExpenseController::class,'insert']);
      Route::get('expense/edit/{id}',[ExpenseController::class,'edit']);
      Route::post('expense/edit/{id}',[ExpenseController::class,'update']);
      Route::delete('expense/delete/{id}',[ExpenseController::class,'delete']);

      ///Employee Role
      Route::get('role/add',[RoleController::class,'add']);
      Route::post('role/add',[RoleController::class,'insert']);
      Route::get('role/list',[RoleController::class,'list']);
      Route::get('role/edit/{id}',[RoleController::class,'edit']);
      Route::post('role/edit/{id}',[RoleController::class,'update']);
      Route::delete('role/delete/{id}',[RoleController::class,'delete']);

      //installment
      Route::get('installment/add',[InstallmentController::class,'add']);
      Route::post('installment/add',[InstallmentController::class,'insert']);
      Route::get('installment/list',[InstallmentController::class,'list']);
      Route::get('installment/edit/{id}',[InstallmentController::class,'edit']);
      Route::get('installment/details/{id}',[InstallmentController::class,'details']);
      Route::get('installment/collection/{id}',[InstallmentController::class,'collection']);
      Route::post('installment/collection/{id}',[InstallmentController::class,'submit_collection']);
      Route::post('installment/edit/{id}',[InstallmentController::class,'update']);
      Route::delete('installment/delete/{id}',[InstallmentController::class,'delete']);
      Route::get('installment/print/{id}',[InstallmentController::class,'print']);
      
      
      
      ///Print
      Route::get('tour/expenseprint/{id}',[TourController::class,'expenseprint']);
      Route::get('tour/memberprint/{id}',[TourController::class,'memberprint']);

        ///Dashboard
      Route::get('backend/dashboard',[DashboardController::class,'dashboard']); 

});

