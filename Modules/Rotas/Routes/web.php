<?php

use Illuminate\Support\Facades\Route;

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

// Route::prefix('rotas')->group(function () {
//     Route::get('/', 'RotasController@index');
// });
Route::group(['middleware' => 'PlanModuleCheck:Rotas'], function () {
    Route::get('dashboard/rotas', ['as' => 'rotas.dashboard', 'uses' => 'DashboardController@index'])->middleware(['auth']);
    Route::get('dashboard/day', ['as' => 'rota.dashboard.day', 'uses' => 'DashboardController@dayView'])->middleware(['auth']);
    Route::post('dashboard/dayview_filter', ['as' => 'rota.dashboard.dayview_filter', 'uses' => 'DashboardController@dayview_filter'])->middleware(['auth']);
    Route::get('dashboard/user-view', ['as' => 'rota.dashboard.user-view', 'uses' => 'DashboardController@userView'])->middleware(['auth']);
    Route::post('dashboard/userviewfilter', ['as' => 'rota.dashboard.userviewfilter', 'uses' => 'DashboardController@userviewfilter'])->middleware(['auth']);


    Route::post('/dashboard/location_filter', ['as' => 'rota.dashboard.location_filter', 'uses' => 'DashboardController@location_filter'])->middleware(['auth']);




    Route::post('rotas/setting/save', 'RotaController@companyworkschedule')->name('rotas.setting.save')->middleware(['auth']);

    Route::resource('/employeerole', 'RoleController')->middleware(['auth']);

    Route::post('/rota/week_sheet', ['as' => 'rotas.week_sheet', 'uses' => 'RotaController@week_sheet'])->middleware(['auth']);
    Route::post('hideavailability', 'RotaController@hideavailability')->name('hideavailability')->middleware(['auth']);
    Route::post('hidedayoff', 'RotaController@hidedayoff')->name('hidedayoff')->middleware(['auth']);
    Route::post('hideleave', 'RotaController@hideleave')->name('hideleave')->middleware(['auth']);
    Route::post('/rota/clear_week', ['as' => 'rotas.clear_week', 'uses' => 'RotaController@clear_week'])->middleware(['auth']);
    Route::post('/rota/add_dayoff', ['as' => 'rotas.add_dayoff', 'uses' => 'RotaController@add_dayoff'])->middleware(['auth']);
    Route::post('/rota/send_email_rotas', ['as' => 'rotas.send_email_rotas', 'uses' => 'RotaController@send_email_rotas'])->middleware(['auth']);
    Route::post('copy_week_sheet', ['as' => 'copy.week.sheet', 'uses' => 'RotaController@copy_week_sheet'])->middleware(['auth']);
    Route::post('/rota/publish_week', ['as' => 'rotas.publish_week', 'uses' => 'RotaController@publish_week'])->middleware(['auth']);
    Route::post('/rota/un_publish_week', ['as' => 'rotas.un_publish_week', 'uses' => 'RotaController@un_publish_week'])->middleware(['auth']);
    Route::post('/rota/shift_copy', ['as' => 'rotas.shift_copy', 'uses' => 'RotaController@shift_copy'])->middleware(['auth']);
    Route::get('/rota/print_rotas_popup', ['as' => 'rotas.print_rotas_popup', 'uses' => 'RotaController@print_rotas_popup'])->middleware(['auth']);

    Route::post('/rota/print', ['as' => 'rotas.print', 'uses' => 'RotaController@printrotasInvoice'])->middleware(['auth']);

    Route::get('/rota/share_rotas_popup', ['as' => 'rotas.share_popup', 'uses' => 'RotaController@share_rotas_popup'])->middleware(['auth']);

    Route::post('/slug-match', ['as' => 'slug.match', 'uses' => 'RotaController@slug_match'])->middleware(['auth']);
    Route::post('/rota-date-change', ['as' => 'rota.date.change', 'uses' => 'RotaController@rota_date_change'])->middleware(['auth']);

    Route::get('/rota/shift_cancel/{id}', ['as' => 'rotas.shift.cancel', 'uses' => 'RotaController@shift_cancel'])->middleware(['auth']);
    Route::post('/rota/shift_disable', ['as' => 'rotas.shift.disable', 'uses' => 'RotaController@shift_disable'])->middleware(['auth']);
    Route::post('rota/shift_disable_reply', ['as' => 'rotas.shift.disable.reply', 'uses' => 'RotaController@shift_disable_reply'])->middleware(['auth']);

    Route::get('/rota/shift_disable_response/{id}', ['as' => 'rotas.shift.response', 'uses' => 'RotaController@shift_disable_response'])->middleware(['auth']);

    Route::resource('/rota', 'RotaController')->middleware(['auth']);

    // Custom work
    Route::post('rotas/target_sale/update', 'RotaSaleTargetController@update')->name('rotas.target-sale.update')->middleware(['auth']);
    Route::post('rotas/labor_target/update', 'RotaLaborTargetController@update')->name('rotas.labor-target.update')->middleware(['auth']);
    
    
    Route::post('rotas/setting/store', 'RotaController@setting')->name('rotas.setting.store')->middleware(['auth']);
    Route::resource('/availabilitie', 'AvailabilityController')->middleware(['auth']);


    Route::any('workschedule/{id?}', 'RotaController@workscheduleData')->name('rota.workschedule')->middleware(['auth']);
    Route::post('workschedule/{id?}', 'RotaController@workscheduleDataSave')->name('rota.workschedule.save')->middleware(['auth']);


    Route::get('rotas_data', 'RotaController@rotas_filter')->name('rotas.filter')->middleware(
        [
            'auth',
        ]
    );
    // branch

    Route::resource('branches', 'BranchesController')->middleware(
        [
            'auth',
        ]
    );
    Route::get('branchesnameedit', 'BranchesController@BranchesNameEdit')->middleware(
        [
            'auth',
        ]
    )->name('branchesname.edit');
    Route::post('branch-setting', 'BranchesController@saveBranchesName')->middleware(
        [
            'auth',
        ]
    )->name('branchesname.update');

    // department
    Route::resource('departments', 'DepartmentsController')->middleware(
        [
            'auth',
        ]
    );
    Route::get('departmentsnameedit', 'DepartmentsController@DepartmentsNameEdit')->middleware(
        [
            'auth',
        ]
    )->name('departmentsname.edit');
    Route::post('department-settings', 'DepartmentsController@saveDepartmentsName')->middleware(
        [
            'auth',
        ]
    )->name('departmentsname.update');

    // designation
    Route::resource('designations', 'DesignationsController')->middleware(
        [
            'auth',
        ]
    );
    Route::get('designationsnameedit', 'DesignationsController@DesignationsNameEdit')->middleware(
        [
            'auth',
        ]
    )->name('designationsname.edit');
    Route::post('designation-settings', 'DesignationsController@saveDesignationsName')->middleware(
        [
            'auth',
        ]
    )->name('designationsname.update');

    // leave type and leave

    Route::resource('leavestype', 'RotaleaveTypeController')->middleware(
        [
            'auth',
        ]
    );
    Route::get('rota-leave/{id}/action', 'RotaleaveController@action')->name('rota.leave.action')->middleware(
        [
            'auth',
        ]
    );
    Route::post('rota-leave/changeaction', 'RotaleaveController@changeaction')->name('rota.leave.changeaction')->middleware(
        [
            'auth',
        ]
    );
    Route::post('rota-leave/jsoncount', 'RotaleaveController@jsoncount')->name('rota.leave.jsoncount')->middleware(
        [
            'auth',
        ]
    );
    Route::resource('rota-leave', 'RotaleaveController')->middleware(
        [
            'auth',
        ]
    );

    // Rotaemployee
    Route::resource('rotaemployee', 'RotaemployeeController')->middleware(
        [
            'auth',
        ]
    );
    Route::get('rotaemployee-grid', 'RotaemployeeController@grid')->name('rotaemployee.grid')->middleware(
        [
            'auth'
        ]
    );

    Route::post('rotaemployee/getdepartment', 'RotaemployeeController@getDepartment')->name('employee.getdepartment')->middleware(
        [
            'auth',
        ]
    );
    Route::post('rotaemployee/getdesignation', 'RotaemployeeController@getdDesignation')->name('employee.getdesignation')->middleware(
        [
            'auth',
        ]
    );

    //employee import
    Route::get('rotaemployee/import/export', 'RotaemployeeController@fileImportExport')->name('rotaemployee.file.import')->middleware(['auth']);
    Route::post('rotaemployee/import', 'RotaemployeeController@fileImport')->name('rotaemployee.import')->middleware(['auth']);
    Route::get('rotaemployee/import/modal', 'RotaemployeeController@fileImportModal')->name('rotaemployee.import.modal')->middleware(['auth']);
    Route::post('rotaemployee/data/import/', 'RotaemployeeController@rotaemployeeImportdata')->name('rotaemployee.import.data')->middleware(['auth']);
});


Route::post('/rota/share_rotas_link', ['as' => 'rotas.share_rotas_link', 'uses' => 'RotaController@share_rotas_link']);
Route::get('/rota/share_rotas/{slug}', ['as' => 'rotas.share', 'uses' => 'RotaController@share_rotas']);
Route::post('/slug-match', ['as' => 'slug.match', 'uses' => 'RotaController@slug_match']);
Route::post('/rota-date-change', ['as' => 'rota.date.change', 'uses' => 'RotaController@rota_date_change']);
