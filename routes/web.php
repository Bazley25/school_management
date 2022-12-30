<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\student_setup\StudentClassController;
use App\Http\Controllers\Backend\student_setup\StudentYearController;
use App\Http\Controllers\Backend\student_setup\StudentGroupController;
use App\Http\Controllers\Backend\student_setup\StudentShiftController;
use App\Http\Controllers\Backend\student_setup\FeeCategoryController;
use App\Http\Controllers\Backend\student_setup\FeeAmountController;

use App\Models\StudentClass;
use App\Models\StudentYear;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\FeeCategory;
use App\Models\FeeCategoryAmount;



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
    return view('auth/login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin/master/index');
    })->name('dashboard');
});


// Admin Controller
Route::get('admin/logout', [AdminController::class, 'Logout'])->name('admin/logout');

// User Management  



Route::prefix('users')->group(function(){

    Route::get('/view', [UserController::class, 'UserView'])->name('user/view');
    Route::get('/add', [UserController::class, 'UserAdd'])->name('user/add');
    Route::post('/store', [UserController::class, 'UserStore'])->name('user/store');
    Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('user/edit');
    Route::post('/update/{id}', [UserController::class, 'UserUpdate'])->name('user/update');
    Route::get('/delete/{id}', [UserController::class, 'UserDelete'])->name('user/delete');

});


// profile Routes
Route::prefix('profile')->group(function(){

Route::get('/view/', [ProfileController::class, 'ProfileView'])->name('view/profile');
Route::get('/edit', [ProfileController::class, 'ProfileEdit'])->name('profile/edit');
Route::post('/update', [ProfileController::class, 'ProfileUpdate'])->name('profile/update');

Route::get('/user/pass/change', [ProfileController::class, 'PasswordView'])->name('pass/change');
Route::post('/user/pass/update', [ProfileController::class, 'PasswordUpdate'])->name('password/update');

}); 


   // Student managment Routes

Route::prefix('setups')->group(function(){

    // Student Class Routes
    Route::get('/student/class/view', [StudentClassController::class, 'StudentView'])->name('student/class/view');
    Route::get('/student/class/add', [StudentClassController::class, 'StudentClassAdd'])->name('student/class/add');
    Route::post('/student/class/store', [StudentClassController::class, 'StudentClassStore'])->name('student/class/store');
    Route::get('/student/class/edit/{id}', [StudentClassController::class, 'StudentClassEdit'])->name('student/class/edit');
    Route::post('/student/class/update/{id}', [StudentClassController::class, 'StudentClassUpdate'])->name('student/class/update');
    Route::get('/student/class/delete/{id}', [StudentClassController::class, 'StudentClassDelete'])->name('student/class/delete');
    
    // student Year Routes

    Route::get('/student/year/view', [StudentYearController::class, 'StudentYearView'])->name('student/year/view');
    Route::get('/student/year/add', [StudentYearController::class, 'StudentYearAdd'])->name('student/year/add');
    Route::post('/student/year/store', [StudentYearController::class, 'StudentYeartore'])->name('student/year/store');
    Route::get('/student/year/edit/{id}', [StudentYearController::class, 'StudentYearEdit'])->name('student/year/edit');
    Route::post('/student/year/update/{id}', [StudentYearController::class, 'StudentYearUpdate'])->name('student/year/update');
    Route::get('/student/year/delete/{id}', [StudentYearController::class, 'StudentYearDelete'])->name('student/year/delete');

// student Group Routes
    
    Route::get('/student/group/view', [StudentGroupController::class, 'StudentGroupView'])->name('student/group/view');
    Route::get('/student/group/add', [StudentGroupController::class, 'StudentGroupAdd'])->name('student/group/add');
    Route::post('/student/group/store', [StudentGroupController::class, 'StudentGroupStore'])->name('student/group/store');
    Route::get('/student/group/edit/{id}', [StudentGroupController::class, 'StudentGroupEdit'])->name('student/group/edit');
    Route::post('/student/group/update/{id}', [StudentGroupController::class, 'StudentGroupupdate'])->name('student/group/update');
    Route::get('/student/group/delete/{id}', [StudentGroupController::class, 'StudentGroupDelete'])->name('student/group/delete');
    

    // student Group Routes
    Route::get('/student/shift/view', [StudentShiftController::class, 'StudentShiftView'])->name('student/shift/view');
    Route::get('/student/shift/add', [StudentShiftController::class, 'StudentShiftAdd'])->name('student/shift/add');
    Route::post('/student/shift/store', [StudentShiftController::class, 'StudentShiftStore'])->name('student/shift/store');
    Route::get('/student/shift/edit/{id}', [StudentShiftController::class, 'StudentShiftEdit'])->name('student/shift/edit');
    Route::post('/student/shift/update/{id}', [StudentShiftController::class, 'StudentShiftUpdate'])->name('student/shift/update');
    Route::get('/student/shift/delete/{id}', [StudentShiftController::class, 'StudentShiftDelete'])->name('student/shift/delete');

    // Fee Category Routes
    Route::get('/fee/category/view', [FeeCategoryController::class, 'FeeCategoryView'])->name('fee/category/view');
    Route::get('/fee/category/add', [FeeCategoryController::class, 'FeeCategoryAdd'])->name('fee/category/add');
    Route::post('/fee/category/store', [FeeCategoryController::class, 'FeeCategoryStore'])->name('fee/category/store');
    Route::get('/fee/category/edit/{id}', [FeeCategoryController::class, 'FeeCategoryEdit'])->name('fee/category/edit');
    Route::post('/fee/category/update/{id}', [FeeCategoryController::class, 'FeeCategoryUpdate'])->name('fee/category/update');
    Route::get('/fee/category/delete/{id}', [FeeCategoryController::class, 'FeeCategoryDelete'])->name('fee/category/delete');


    
    // Fee Category Routes
    Route::get('/fee/amount/view', [FeeAmountController::class, 'FeeAmountView'])->name('fee/amount/view');
    Route::get('/fee/amount/add', [FeeAmountController::class, 'FeeAmountAdd'])->name('fee/amount/add');



    }); 