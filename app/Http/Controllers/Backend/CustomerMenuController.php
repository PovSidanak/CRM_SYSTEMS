<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CustomerAppointment;
use App\Models\CustomerCall;
use App\Models\CustomerService;
use App\Models\Document;
use App\Models\Quotation;
use App\Models\Services;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerMenuController extends Controller
{

////////////////////////////////////////////* Customer Service All Method *///////////////////////////////////////////////////////////

public function AllCustomerService(){

    $cservices = CustomerService::latest()->get();
    $services = Services::all();
    $users = User::all();

    $combine_array = [];

    foreach ($cservices as $cservice) {
        # code...
        $cservice["name_user"] = "";
        $cservice["name_service"] = "";
        foreach ($users as $user) {
            # code...
            if($cservice["users_id"] == $user["id"]){
                $cservice["name_user"] = $user["name"];
            }
        }
        foreach ($services as $service) {
            # code...
            if($cservice["services_id"] == $service["id"]){
                $cservice["name_service"] = $service["name"];
            }
        }
        array_push($combine_array, $cservice);

    }

    return view('backend.client.customer.customer_menu.all_service',compact('combine_array','services','users'));

} //End Method

public function StoreCustomerService(Request $request){
    $request->validate([
      'services_id'=>'required',
      'customer_designation'=>'required',
      'description'=>'required',
      'users_id'=>'required'
    ]);

    CustomerService::create([
      'services_id' => $request->services_id,
      'customer_designation' => $request->customer_designation,
      'description' => $request->description,
      'users_id' => $request->users_id
    ]);
    $notification = array(
      'message' => 'Customer Service Created Succesfully',
      'alert-type' => 'success'
  );

  return redirect()->route('all.customerservice')->with($notification);

  } //End Method

  public function EditCustomerService($id){

    $cservices = CustomerService::findOrFail($id);
    $services = Services::all();
    $users = User::all();

    return view('backend.client.customer.customer_menu.edit_customerservice',compact('cservices','services','users'));

}// End MEthod

public function UpdateCustomerService(Request $request, $id){

    $cservices = CustomerService::findOrFail($id);
    $cservices-> services_id =  $request->services_id;
    $cservices-> customer_designation =  $request->customer_designation;
    $cservices-> description =  $request->description;
    $cservices-> users_id =  $request->users_id;
    $cservices-> save();

    $notification = array(
        'message' => 'Customer Se3rvice Updated Succesfully',
        'alert-type' => 'success'
    );

    return redirect()->route('all.customerservice')->with($notification);

}//End Method

public function DeleteCustomerService($id){

    CustomerService::findOrFail($id)->delete();

    $notification = array(
        'message' => 'Customer Service Deleted Succesfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);
  }//End Method

////////////////////////////////////////////* End Customer Service All Method *///////////////////////////////////////////////////////////
////////////////////////////////////////////* Start Customers Call All Method *///////////////////////////////////////////////////////////

public function AllCustomerCall(){

    $customercalls = CustomerCall::latest()->get();
    $users = User::all();

    $combine_array = [];

    foreach ($customercalls as $customercall) {
        # code...
        $customercall["name_user"] = "";
        foreach ($users as $user) {
            # code...
            if($customercall["users_id"] == $user["id"]){
                $customercall["name_user"] = $user["name"];
            }
        }
        array_push($combine_array, $customercall);
    }

    return view('backend.client.customer.customer_call.all_call',compact('combine_array','users'));

} //End Method

public function StoreCustomerCall(Request $request){
    $request->validate([
      'date'=>'required',
      'call_type'=>'required',
      'status'=>'required',
      'users_id'=>'required',
    ]);

    CustomerCall::create([
      'date' => $request->date,
      'call_type' => $request->call_type,
      'status' => $request->status,
      'users_id' => $request->users_id
    ]);
    $notification = array(
      'message' => 'Customer Call Created Succesfully',
      'alert-type' => 'success'
  );

  return redirect()->route('all.customercalls')->with($notification);

  } //End Method

  public function EditCustomerCall($id){

    $customercalls = CustomerCall::findOrFail($id);
    $users = User::all();

    return view('backend.client.customer.customer_call.edit_customercall',compact('customercalls','users'));

}// End MEthod


public function UpdateCustomerCall(Request $request, $id){

    $customercalls = CustomerCall::findOrFail($id);
    $customercalls-> call_type =  $request->call_type;
    $customercalls-> status =  $request->status;
    $customercalls-> save();

    $notification = array(
        'message' => 'Customer Call Updated Succesfully',
        'alert-type' => 'success'
    );

    return redirect()->route('all.customercalls')->with($notification);

}//End Method

public function DeleteCustomerCall($id){

    CustomerCall::findOrFail($id)->delete();

    $notification = array(
        'message' => 'Customer Call Deleted Succesfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);
  }//End Method

////////////////////////////////////////////* End Customer Call All Method *///////////////////////////////////////////////////////////
////////////////////////////////////////////* Start Customers Appointment All Method *///////////////////////////////////////////////////////////

public function AllCustomerAppointment(){

    $customerappointments = CustomerAppointment::latest()->get();
    $users = User::all();

    $combine_array = [];

    foreach ($customerappointments as $customerappointment) {
        # code...
        $customerappointment["name_user"] = "";
        foreach ($users as $user) {
            # code...
            if($customerappointment["users_id"] == $user["id"]){
                $customerappointment["name_user"] = $user["name"];
            }
        }
        array_push($combine_array, $customerappointment);
    }

    return view('backend.client.customer.customer_appointment.all_appointment',compact('combine_array','users'));

} //End Method

public function StoreCustomerAppointment(Request $request){
    $request->validate([
      'customer_name'=>'required',
      'customer_email'=>'required',
      'meeting_date'=>'required',
      'description'=>'required',
      'users_id'=>'required',
    ]);

    CustomerAppointment::create([
      'customer_name' => $request->customer_name,
      'customer_email' => $request->customer_email,
      'meeting_date' => $request->meeting_date,
      'description' => $request->description,
      'users_id' => $request->users_id
    ]);
    $notification = array(
      'message' => 'Customer Appointment Created Succesfully',
      'alert-type' => 'success'
  );

  return redirect()->route('all.appointments')->with($notification);

  } //End Method

  public function EditCustomerAppointment($id){

    $customerappointments = CustomerAppointment::findOrFail($id);
    $users = User::all();

    return view('backend.client.customer.customer_appointment.edit_customerappointment',compact('customerappointments','users'));

}// End MEthod

public function UpdateCustomerAppointment(Request $request, $id){

    $customerappointments = CustomerAppointment::findOrFail($id);
    $customerappointments-> customer_name =  $request->customer_name;
    $customerappointments-> customer_email =  $request->customer_email;
    $customerappointments-> meeting_date =  $request->meeting_date;
    $customerappointments-> description =  $request->description;
    $customerappointments-> users_id =  $request->users_id;
    $customerappointments-> save();

    $notification = array(
        'message' => 'Customer Appointment Updated Succesfully',
        'alert-type' => 'success'
    );

    return redirect()->route('all.appointments')->with($notification);

}//End Method

public function DeleteCustomerAppointment($id){

    CustomerAppointment::findOrFail($id)->delete();

    $notification = array(
        'message' => 'Customer Appointment Deleted Succesfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);
  }//End Method


////////////////////////////////////////////* End Customer Appointment All Method *///////////////////////////////////////////////////////////
////////////////////////////////////////////* Start Customer Quotation All Method *///////////////////////////////////////////////////////////

public function AllCustomerQuotation(){

    $quotations = Quotation::latest()->get();
    $users = User::all();

    $combine_array = [];

    foreach ($quotations as $quotation) {
        # code...
        $quotation["name_user"] = "";
        foreach ($users as $user) {
            # code...
            if($quotation["users_id"] == $user["id"]){
                $quotation["name_user"] = $user["name"];
            }
        }
        array_push($combine_array, $quotation);
    }

    return view('backend.client.customer.quotation.all_quotation',compact('combine_array','users'));

} //End Method

public function StoreCustomerQuotation(Request $request){
    $request->validate([
      'title'=>'required',
      'date'=>'required',
      'users_id'=>'required'
    ]);

    Quotation::create([
      'title' => $request->title,
      'date' => $request->date,
      'users_id' => $request->users_id
    ]);
    $notification = array(
      'message' => 'Quotation Created Succesfully',
      'alert-type' => 'success'
  );

  return redirect()->route('all.quotations')->with($notification);

  } //End Method

  ////////////////////////////////////////////* End Customer Quotation All Method *///////////////////////////////////////////////////////////
////////////////////////////////////////////* Start Customer Document All Method *///////////////////////////////////////////////////////////

public function AllCustomerDocument(){

    $documents = Document::latest()->get();
    $users = User::all();

    $combine_array = [];

    foreach ($documents as $document) {
        # code...
        $document["name_user"] = "";
        foreach ($users as $user) {
            # code...
            if($document["users_id"] == $user["id"]){
                $document["name_user"] = $user["name"];
            }
        }
        array_push($combine_array, $document);
    }

    return view('backend.client.customer.document.all_document',compact('combine_array','users'));

} //End Method

public function StoreCustomerDocument(Request $request){
    $request->validate([
      'title'=>'required',
      'date'=>'required',
      'users_id'=>'required'
    ]);

    Document::create([
      'title' => $request->title,
      'date' => $request->date,
      'users_id' => $request->users_id
    ]);
    $notification = array(
      'message' => 'Document Created Succesfully',
      'alert-type' => 'success'
  );

  return redirect()->route('all.documents')->with($notification);

  } //End Method





}
