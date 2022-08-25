<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Office\AuthController;
use App\Http\Controllers\Office\CRM\LeadController;
use App\Http\Controllers\Office\DashboardController;
use App\Http\Controllers\Office\CRM\ClientController;
use App\Http\Controllers\Office\Master\BankController;
use App\Http\Controllers\Office\Master\IsicController;
use App\Http\Controllers\Office\HRM\EmployeeController;
use App\Http\Controllers\Office\HRM\PositionController;
use App\Http\Controllers\Office\Master\EventController;
use App\Http\Controllers\Office\CRM\NewsletterController;
use App\Http\Controllers\Office\HRM\DepartmentController;
use App\Http\Controllers\Office\Setting\ModuleController;
use App\Http\Controllers\Office\Master\IsicTypeController;
use App\Http\Controllers\Office\CRM\ContactGroupController;
use App\Http\Controllers\Office\HRM\EmployeeMemoController;
use App\Http\Controllers\Office\Regional\CountryController;
use App\Http\Controllers\Office\Regional\RegencyController;
use App\Http\Controllers\Office\Regional\VillageController;
use App\Http\Controllers\Office\Regional\DistrictController;
use App\Http\Controllers\Office\Regional\ProvinceController;
use App\Http\Controllers\Office\Corporate\LegalDocController;
use App\Http\Controllers\Office\Corporate\LegalDocTypeController;
use App\Http\Controllers\Office\Communication\NotificationController;

Route::group(['domain' => ''], function() {
    Route::redirect('/', 'dashboard', 301);
    Route::prefix('')->name('office.')->group(function(){
        Route::prefix('auth')->name('auth.')->group(function(){
            Route::get('',[AuthController::class, 'index'])->name('index');
            Route::post('login',[AuthController::class, 'do_login'])->name('login');
            Route::get('register',[AuthController::class, 'register'])->name('register');
            Route::post('register',[AuthController::class, 'do_register'])->name('doregister');
            Route::get('forgot',[AuthController::class, 'forgot'])->name('forgot');
            Route::post('forgot',[AuthController::class, 'do_forgot'])->name('doforgot');
            Route::get('reset/{token}',[AuthController::class, 'reset'])->name('reset');
            Route::post('reset',[AuthController::class, 'do_reset'])->name('do_reset');
        });
        Route::middleware(['auth:employees'])->group(function(){
            Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
            Route::resource('employee-memo',EmployeeMemoController::class);
            Route::name('email.')->group(function(){
                Route::get('email/welcome', function () {
                    return view('email.welcome');
                });
                // Route::get('welcome', [DashboardController::class, 'ecommerce'])->name('ecommerce');
            });
            Route::name('communication.')->group(function(){
                Route::get('notification', [NotificationController::class, 'index'])->name('notification');
                Route::get('notification_log', [NotificationController::class, 'log'])->name('notification_log');
                Route::get('counter-notification', [NotificationController::class, 'counter'])->name('counter_notification');
            });
            Route::name('dashboard.')->group(function(){
                Route::get('dashboard-ecommerce', [DashboardController::class, 'ecommerce'])->name('ecommerce');
                Route::get('dashboard-project', [DashboardController::class, 'project'])->name('project');
                Route::get('dashboard-marketing', [DashboardController::class, 'marketing'])->name('marketing');
                Route::get('dashboard-analytic', [DashboardController::class, 'analytic'])->name('analytic');
                Route::get('dashboard-finance', [DashboardController::class, 'finance'])->name('finance');
            });
            Route::name('master.')->group(function(){
                Route::get('event/list', [EventController::class, 'list'])->name('event.list');
                Route::get('event/{id}/show', [EventController::class, 'show'])->name('event.show');
                Route::resource('event',EventController::class);
                Route::get('bank/list', [BankController::class, 'list'])->name('bank.list');
                Route::resource('bank',BankController::class);
                Route::get('isic-type/list',[IsicTypeController::class, 'list'])->name('isic-type.list');
                Route::get('isic-type/{isicType}/show-list',[IsicTypeController::class, 'show_list'])->name('isic-type.show_list');
                Route::get('isic-type/{isicType}/show-create',[IsicTypeController::class, 'show_create'])->name('isic-type.show_create');
                Route::get('isic-type/{isicType}/{isic}/show-edit',[IsicTypeController::class, 'show_edit'])->name('isic-type.show_edit');
                Route::resource('isic-type', IsicTypeController::class);
                Route::resource('isic', IsicController::class);
            });
            Route::name('regional.')->group(function(){
                Route::get('country/list',[CountryController::class, 'list'])->name('country.list');
                Route::get('country/{country}/show-list',[CountryController::class, 'show_list'])->name('country.show_list');
                Route::get('country/{country}/show-create',[CountryController::class, 'show_create'])->name('country.show_create');
                Route::get('country/{country}/{province}/show-edit',[CountryController::class, 'show_edit'])->name('country.show_edit');
                Route::resource('country', CountryController::class);
                Route::get('province/list',[ProvinceController::class, 'list'])->name('province.list');
                Route::get('province/{province}/show-list',[ProvinceController::class, 'show_list'])->name('province.show_list');
                Route::get('province/{province}/show-create',[ProvinceController::class, 'show_create'])->name('province.show_create');
                Route::get('province/{province}/{regency}/show-edit',[ProvinceController::class, 'show_edit'])->name('province.show_edit');
                Route::resource('province', ProvinceController::class);
                Route::get('regency/list',[RegencyController::class, 'list'])->name('regency.list');
                Route::get('regency/{regency}/show-list',[RegencyController::class, 'show_list'])->name('regency.show_list');
                Route::get('regency/{regency}/show-create',[RegencyController::class, 'show_create'])->name('regency.show_create');
                Route::get('regency/{regency}/{district}/show-edit',[RegencyController::class, 'show_edit'])->name('regency.show_edit');
                Route::resource('regency', RegencyController::class);
                Route::get('district/list',[DistrictController::class, 'list'])->name('district.list');
                Route::get('district/{district}/show-list',[DistrictController::class, 'show_list'])->name('district.show_list');
                Route::get('district/{district}/show-create',[DistrictController::class, 'show_create'])->name('district.show_create');
                Route::get('district/{district}/{village}/show-edit',[DistrictController::class, 'show_edit'])->name('district.show_edit');
                Route::resource('district', DistrictController::class);
                Route::get('village/list',[VillageController::class, 'list'])->name('village.list');
                Route::resource('village', VillageController::class);
            });
            Route::name('hrm.')->group(function(){
                Route::post('department/get-list',[DepartmentController::class, 'get_list'])->name('department.get_list');
                Route::get('department/list',[DepartmentController::class, 'list'])->name('department.list');
                Route::get('department/{department}/show-list',[DepartmentController::class, 'show_list'])->name('department.show_list');
                Route::get('department/{department}/show-create',[DepartmentController::class, 'show_create'])->name('department.show_create');
                Route::get('department/{department}/{position}/show-edit',[DepartmentController::class, 'show_edit'])->name('department.show_edit');
                Route::resource('department', DepartmentController::class);
                Route::get('position/list',[PositionController::class, 'list'])->name('position.list');
                Route::get('position/{position}/show-list',[PositionController::class, 'show_list'])->name('position.show_list');
                Route::get('position/{position}/show-create',[PositionController::class, 'show_create'])->name('position.show_create');
                Route::get('position/{position}/{permission}/show-edit',[PositionController::class, 'show_edit'])->name('position.show_edit');
                Route::resource('position', PositionController::class);
                Route::get('employee/list',[EmployeeController::class, 'list'])->name('employee.list');
                Route::get('employee/{employee}/show-list',[EmployeeController::class, 'show_list'])->name('employee.show_list');
                Route::get('employee/{employee}/show-create',[EmployeeController::class, 'show_create'])->name('employee.show_create');
                Route::get('employee/{employee}/{permission}/show-edit',[EmployeeController::class, 'show_edit'])->name('employee.show_edit');
                Route::resource('employee', EmployeeController::class);
            });
            Route::name('crm.')->group(function(){
                Route::resource('contact-group', ContactGroupController::class);
                Route::get('lead/list',[LeadController::class, 'list'])->name('lead.list');
                Route::resource('lead', LeadController::class);
                Route::get('client/list',[ClientController::class, 'list'])->name('client.list');
                Route::resource('client', ClientController::class);
                Route::get('newsletter/list',[NewsletterController::class, 'list'])->name('newsletter.list');
                Route::resource('newsletter', NewsletterController::class);
            });
            Route::name('corporate.')->group(function(){
                Route::get('document-type/list', [LegalDocTypeController::class, 'list'])->name('document-type.list');
                Route::get('document-type/{documentType}/show-list',[LegalDocTypeController::class, 'show_list'])->name('document-type.show_list');
                Route::get('document-type/{documentType}/show-create',[LegalDocTypeController::class, 'show_create'])->name('document-type.show_create');
                Route::get('document-type/{documentType}/{document}/show-edit',[LegalDocTypeController::class, 'show_edit'])->name('document-type.show_edit');
                Route::resource('document-type',LegalDocTypeController::class);
                Route::resource('document', LegalDocController::class);
            });
            Route::name('setting.')->group(function(){
                Route::get('module/list',[ModuleController::class, 'list'])->name('module.list');
                Route::get('module/{module}/show-list',[ModuleController::class, 'show_list'])->name('module.show_list');
                Route::get('module/{module}/show-create',[ModuleController::class, 'show_create'])->name('module.show_create');
                Route::get('module/{module}/{modulePrivilege}/show-edit',[ModuleController::class, 'show_edit'])->name('module.show_edit');
                Route::resource('module', ModuleController::class);
            });
            Route::get('logout',[AuthController::class, 'do_logout'])->name('auth.logout');
            // Route::get('/', function () {
            //     return view('welcome');
            // });
        });
    });
});
