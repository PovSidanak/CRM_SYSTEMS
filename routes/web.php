<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\Backend\CalendarController;
use App\Http\Controllers\Backend\ClientController;
use App\Http\Controllers\Backend\CustomerMenuController;
use App\Http\Controllers\Backend\CustomerQutationController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\PropertyTypeController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\TicketController;
use PHPUnit\Framework\Attributes\Ticket;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

///Product Group MiddleWare
Route::middleware(['auth', 'role:admin'])->group(function(){
    //Product Controller
    Route::controller(ProductController::class)->group(function(){
        Route::get('/admin/dashboard','Product')
        ->name('product');

    });

});// End Group Product middleware

///Admin Group MiddleWare
Route::middleware(['auth', 'role:admin'])->group(function(){

    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])
         ->name('admin.dashboard');

    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])
         ->name('admin.logout');

    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])
         ->name('admin.profile');


    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])
         ->name('admin.profile.store');

    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])
         ->name('admin.change.password');

    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])
         ->name('admin.update.password');

});// End Group Admin middleware

///Agent Group MiddleWare
// Route::middleware(['auth', 'role:agent'])->group(function(){

//     Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])
//     ->name('agent.dashboard');

// });// End Group Agent middleware

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])
->name('admin.login');

///Admin Group MiddleWare
Route::middleware(['auth', 'role:admin'])->group(function(){

    // Property Type All ROute
    Route::controller(PropertyTypeController::class)->group(function(){

        Route::get('/all/type','AllType') ->name('all.type');
        Route::get('/add/type','AddType') ->name('add.type');
        Route::post('/store/type','StoreType') ->name('store.type');
        Route::get('/edit/type/{id}','EditType') ->name('edit.type');
        Route::post('/update/type','UpdateType') ->name('update.type');
        Route::get('/delete/type/{id}','DeleteType') ->name('delete.type');
    });
     // Amenity All ROute
     Route::controller(PropertyTypeController::class)->group(function(){

        Route::get('/all/amenitie','AllAmenitie') ->name('all.amenities');
        Route::get('/add/amenitie','AddAmenitie') ->name('add.amenitie');
        Route::post('/store/amenitie','StoreAmenitie') ->name('store.amenitie');
        Route::get('/edit/amenitie/{id}','EditAmenitie') ->name('edit.amenitie');
        Route::post('/update/amenitie','UpdateAmenitie') ->name('update.amenitie');
        Route::get('/delete/amenitie/{id}','DeleteAmenitie') ->name('delete.amenitie');
    });

    // Permission Type All ROute
    Route::controller(RoleController::class)->group(function(){

        Route::get('/allpermission','AllPermission') ->name('allpermission');
        Route::get('/add/permission','AddPermission') ->name('add.permission');
        Route::post('/store/permission','StorePermission') ->name('store.permission');
        Route::get('/edit/permission/{id}','EditPermission') ->name('edit.permission');
        Route::post('/update/permission','UpdatePermission') ->name('update.permission');
        Route::get('/delete/permission/{id}','DeletePermission') ->name('delete.permission');
    });

    // Role All Route
    Route::controller(RoleController::class)->group(function(){

        Route::get('/listrole','AllRole') ->name('listrole');
        Route::get('/add/role','AddRole') ->name('add.role');
        Route::post('/store/role','StoreRole') ->name('store.role');
        Route::get('/edit/role/{id}','EditRole') ->name('edit.role');
        Route::post('/update/role','UpdateRole') ->name('update.role');
        Route::get('/delete/role/{id}','DeleteRole') ->name('delete.role');

        // Add role in permission All route
        Route::get('/addrolepermission','AddRolePermission') ->name('addrolepermission');
        Route::post('/role/permission/store','RolePermissionStore') ->name('role.permission.store');
        Route::get('/allrolepermission','AllRolePermission') ->name('allrolepermission');
        Route::get('/admin/edit/role/{id}','AdminEditRole') ->name('admin.edit.role');
        Route::post('/admin/role/update/{id}','AdminUpdateRole') ->name('admin.role.update');
        Route::get('/admin/delete/role/{id}','AdminDeleteRole') ->name('admin.delete.role');
    });

        // Admin User All ROute
    Route::controller(AdminController::class)->group(function(){

        Route::get('/all/admin','AllAdmin') ->name('all.admin');
        Route::get('/add/admin','AddAdmin') ->name('add.admin');
        Route::post('/store/admin','StoreAdmin') ->name('store.admin');
        Route::get('/edit/admin/{id}','EditAdmin') ->name('edit.admin');
        Route::post('/update/admin/{id}','UpdateAdmin') ->name('update.admin');
        Route::get('/delete/admin/{id}','DeleteAdmin') ->name('delete.admin');
    });

    // Client All Route
    Route::controller(ClientController::class)->group(function(){

        // Services all route
        Route::get('/all/services','AllService') ->name('all.services');
        Route::get('/add/services','AddService') ->name('add.services');
        Route::post('/store/services','StoreService') ->name('store.services');
        Route::get('/edit/services/{id}','EditService') ->name('edit.services');
        Route::post('/update/services/{id}','UpdateService') ->name('update.services');
        Route::get('/delete/services/{id}','DeleteService') ->name('delete.services');

        // Leads all route
        Route::get('/all/leads','AllLead') ->name('all.leads');
        Route::get('/add/leads','AddLead') ->name('add.leads');
        Route::post('/store/leads','StoreLead') ->name('store.leads');
        Route::get('/edit/leads/{id}','EditLead') ->name('edit.leads');
        Route::post('/update/leads/{id}','UpdateLead') ->name('update.leads');
        Route::get('/delete/leads/{id}','DeleteLead') ->name('delete.leads');

        // Customers all route
        Route::get('/all/customers','AllCustomer') ->name('all.customers');
        Route::get('/add/customers','AddCustomer') ->name('add.customers');
        Route::post('/store/customers','StoreCustomer') ->name('store.customers');
        Route::get('/edit/customers/{id}','EditCustomer') ->name('edit.customers');
        Route::post('/update/customers/{id}','UpdateCustomer') ->name('update.customers');
        Route::get('/delete/customers/{id}','DeleteCustomer') ->name('delete.customers');

    });

    //Customer Menu All Route
    Route::controller(CustomerMenuController::class)->group(function(){

        //Customer Service All Route
        Route::get('/all/customerservices','AllCustomerService') ->name('all.customerservice');
        Route::post('/store/customerservices','StoreCustomerService') ->name('store.customerservice');
        Route::get('/edit/customerservice/{id}','EditCustomerService') ->name('edit.customerservice');
        Route::post('/update/customerservice/{id}','UpdateCustomerService') ->name('update.customerservice');
        Route::get('/delete/customerservice/{id}','DeleteCustomerService') ->name('delete.customerservice');

        //Customer Call All Route
        Route::get('/all/customercalls','AllCustomerCall') ->name('all.customercalls');
        Route::post('/store/customercalls','StoreCustomerCall') ->name('store.customercalls');
        Route::get('/edit/customercalls/{id}','EditCustomerCall') ->name('edit.customercalls');
        Route::post('/update/customercalls/{id}','UpdateCustomerCall') ->name('update.customercalls');
        Route::get('/delete/customercalls/{id}','DeleteCustomerCall') ->name('delete.customercalls');

        //Customer Appointment All Route
        Route::get('/all/appointments','AllCustomerAppointment') ->name('all.appointments');
        Route::post('/store/appointments','StoreCustomerAppointment') ->name('store.appointments');
        Route::get('/edit/appointments/{id}','EditCustomerAppointment') ->name('edit.appointments');
        Route::post('/update/appointments/{id}','UpdateCustomerAppointment') ->name('update.appointments');
        Route::get('/delete/appointments/{id}','DeleteCustomerAppointment') ->name('delete.appointments');

        //Customer Quotation All Route
        Route::get('/all/quotations','AllCustomerQuotation') ->name('all.quotations');
        Route::post('/store/quotations','StoreCustomerQuotation') ->name('store.quotations');

        //Customer Document All Route
        Route::get('/all/documents','AllCustomerDocument') ->name('all.documents');
        Route::post('/store/documents','StoreCustomerDocument') ->name('store.documents');

    });




    // Ticket All ROute
    Route::controller(TicketController::class)->group(function(){

        // ATM All Route
        Route::get('/all/atms','AllATM') ->name('all.atms');
        Route::post('/store/atms','StoreATM') ->name('store.atms');
        Route::get('/edit/atms/{id}','EditATM') ->name('edit.atms');
        Route::post('/update/atms/{id}','UpdateATM') ->name('update.atms');
        Route::get('/delete/atms/{id}','DeleteATM') ->name('delete.atms');

        // Ticket All Route
        Route::get('/all/tickets','AllTicket') ->name('all.tickets');
        Route::post('/store/tickets','StoreTicket') ->name('store.tickets');
        Route::get('/edit/tickets/{id}','EditTicket') ->name('edit.tickets');
        Route::post('/update/tickets/{id}','UpdateTicket') ->name('update.tickets');
        Route::get('/delete/tickets/{id}','DeleteTicket') ->name('delete.tickets');

        // Service Request All Route
        Route::get('/all/servicerequest','AllServiceRequest') ->name('all.servicerequest');

            // Call deatil All Route
            Route::get('/all/calldetails','AllCallDetail') ->name('all.calldetails');
            Route::post('/store/calls','StoreCallDetail') ->name('store.calls');
            Route::get('/delete/calldetails/{id}','DeleteCallDetail') ->name('delete.calldetails');

            // Follow Up All Route
            Route::get('/all/followup','AllFollowup') ->name('all.followup');
            Route::post('/store/followup','StoreFollowup') ->name('store.followup');
            Route::get('/delete/followup/{id}','DeleteFollowup') ->name('delete.followup');

            // Dispatch All Route
            Route::get('/all/dispatch','AllDispatch') ->name('all.dispatch');
            Route::post('/store/dispatch','StoreDispatch') ->name('store.dispatch');
            Route::get('/delete/dispatch/{id}','DeleteDispatch') ->name('delete.dispatch');

            // Dispatch All Route
            Route::get('/all/callclose','AllCallClose') ->name('all.callclose');
            Route::post('/store/callclose','StoreCallClose') ->name('store.callclose');

    });

     // Report All ROute
    Route::controller(ReportController::class)->group(function(){

        //Sale Report All Route
        Route::get('/all/salereports','AllSaleReport') ->name('all.salereports');
        Route::post('/store/salereports','StoreSaleReport') ->name('store.salereports');
        Route::get('/edit/salereports/{id}','EditSaleReport') ->name('edit.salereports');

        //Technicle Report All Route
        Route::get('/all/techniclereports','AllTechnicleReport') ->name('all.techniclereports');
        Route::post('/store/techniclereports','StoreTechnicleReport') ->name('store.techniclereports');

        //BTI AND PM Report All Route
         Route::get('/all/btireport','AllBTI') ->name('all.btireport');
         Route::get('/all/pmreport','AllPM') ->name('all.pmreport');
         Route::get('/all/drewcustomerBTI','DrewcustomerBTI') ->name('all.drewcustomerBTI');
         Route::get('/all/drewTechnicalBTI','DrewTechnicalBTI') ->name('all.drewTechnicalBTI');
         Route::get('/all/drewcustomerPM','DrewcustomerPM') ->name('all.drewcustomerPM');
         Route::get('/all/drewTechnicalPM','DrewTechnicalPM') ->name('all.drewTechnicalPM');
    });


    // Calendar All ROute
    Route::controller(CalendarController::class)->group(function(){

        // ATM All Route
        Route::get('/all/calendars','Calendar') ->name('all.calendars');
        Route::get('/events','getEvents') ->name('events');
        Route::post('/store/schedules','AddSchedule') ->name('store.schedules');
        Route::get('/delete/events/{id}','deleteEvent') ->name('delete.events');
        Route::post('/update/events/{id}','Update') ->name('update.events');
        Route::post('/events/{id}/resize','resize') ->name('update.resize');
        Route::get('/events/search','search') ->name('search.schedules');

    });


});// End Group Admin middleware
