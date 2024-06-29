<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\CustomerServices;
use App\Models\Leads;
use App\Models\Schedule;
use App\Models\Services;
use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{

////////////////////////////////////////////* Service All Method *///////////////////////////////////////////////////////////

    public function AllService(){

        $services = Services::latest()->get();

        return view('backend.client.service.all_service',compact('services'));

    } //End Method

    public function AddService(){

        return view('backend.client.service.add_service');

    } //End Method

    public function StoreService(Request $request){

        $request->validate([
          'name' => 'required|max:200',
          'description' => 'required'
        ]);

        Services::insert([
          'name' => $request->name,
          'description' => $request->description,
        ]);
        $notification = array(
          'message' => 'Services Created Succesfully',
          'alert-type' => 'success'
      );

      return redirect()->route('all.services')->with($notification);

      } //End Method

      public function EditService($id){

        $services = Services::findOrFail($id);
        return view('backend.client.service.edit_service',compact('services'));

    }// End MEthod

    public function UpdateService(Request $request, $id){

        $sid = $request->id;

        Services::findOrFail($sid)->update([
          'name' => $request->name,
          'description' => $request->description,
        ]);
        $notification = array(
          'message' => 'Service Updated Succesfully',
          'alert-type' => 'success'
      );

      return redirect()->route('all.services')->with($notification);

      } //End Method

      public function DeleteService($id){

        Services::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Service Deleted Succesfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

////////////////////////////////////////////* End  Service Method *///////////////////////////////////////////////////////////
////////////////////////////////////////////* Leads All Method *///////////////////////////////////////////////////////////


      public function AllLead(){

        $leads = Leads::latest()->get();
        $services = Services::all();
        $users = User::all();

        $combine_array = [];

        foreach ($leads as $lead) {
            # code...
            $lead["name_user"] = "";
            foreach ($users as $user) {
                # code...
                if($lead["users_id"] == $user["id"]){
                    $lead["name_user"] = $user["name"];
                }
            }
            array_push($combine_array, $lead);
        }

        return view('backend.client.lead.all_lead',compact('combine_array','services','users'));

    } //End Method

    public function AddLead(){

        return view('backend.client.lead.add_lead');

    } //End Method

    public function StoreLead(Request $request){

        $request->validate([
          'name' => 'required|max:200',
          'email'=>'required',
          'phone'=>'required',
          'address'=>'required',
          'city'=>'required',
          'description' => 'required'
        ]);

        Leads::insert([
          'name' => $request->name,
          'email' => $request->email,
          'phone' => $request->phone,
          'address' => $request->address,
          'city' => $request->city,
          'description' => $request->description,
        ]);
        $notification = array(
          'message' => 'Lead Created Succesfully',
          'alert-type' => 'success'
      );

      return redirect()->route('all.leads')->with($notification);

      } //End Method

      public function EditLead($id){

        $leads = Leads::findOrFail($id);
        $services = Services::all();
        $users = User::all();
        return view('backend.client.lead.edit_lead',compact('leads','services','users'));

    }// End MEthod

    public function UpdateLead(Request $request, $id){

        $lead = Leads::findOrFail($id);
        $lead-> name  = $request->name;
        $lead-> email =  $request->email;
        $lead-> phone =  $request->phone;
        $lead-> address =  $request->address;
        $lead-> city =  $request->city;
        $lead-> Designation =  $request->Designation;
        $lead-> description =  $request->description;
        $lead-> services_id =  $request->services_id;
        $lead-> users_id =  $request->users_id;
        $lead-> save();

        $notification = array(
            'message' => 'Lead Created Succesfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.leads')->with($notification);

    }//End Method

    public function DeleteLead($id){

        Leads::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Lead Deleted Succesfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
      }//End Method

////////////////////////////////////////////* End Leads All Method *///////////////////////////////////////////////////////////
////////////////////////////////////////////* Customers All Method *///////////////////////////////////////////////////////////

    public function AllCustomer(){

        $customers = Customers::latest()->get();
        $services = Services::all();
        $users = User::all();

        $combine_array = [];

        foreach ($customers as $customer) {
            # code...
            $customer["name_user"] = "";
            foreach ($users as $user) {
                # code...
                if($customer["users_id"] == $user["id"]){
                    $customer["name_user"] = $user["name"];
                }
            }
            array_push($combine_array, $customer);
        }

        return view('backend.client.customer.all_customer',compact('combine_array','services','users'));

    } //End Method

    public function AddCustomer(){

        return view('backend.client.customer.add_customer');

    } //End Method

    public function StoreCustomer(Request $request){

        $request->validate([
          'name' => 'required|max:200',
          'email'=>'required',
          'phone'=>'required',
          'address'=>'required',
          'city'=>'required',
          'description' => 'required'
        ]);

        Customers::insert([
          'name' => $request->name,
          'email' => $request->email,
          'phone' => $request->phone,
          'address' => $request->address,
          'city' => $request->city,
          'description' => $request->description,
        ]);
        $notification = array(
          'message' => 'Customers Created Succesfully',
          'alert-type' => 'success'
      );

      return redirect()->route('all.customers')->with($notification);

      } //End Method

      public function EditCustomer($id){

        $customers = Customers::findOrFail($id);
        $services = Services::all();
        $users = User::all();
        return view('backend.client.customer.edit_customer',compact('customers','services','users'));


    }// End MEthod

    public function UpdateCustomer(Request $request, $id){

        $customers = Customers::findOrFail($id);
        $customers-> name  = $request->name;
        $customers-> email =  $request->email;
        $customers-> phone =  $request->phone;
        $customers-> address =  $request->address;
        $customers-> city =  $request->city;
        $customers-> Designation =  $request->Designation;
        $customers-> description =  $request->description;
        $customers-> services_id =  $request->services_id;
        $customers-> users_id =  $request->users_id;
        $customers-> save();

        $notification = array(
            'message' => 'Customer Updated Succesfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.customers')->with($notification);

    }//End Method

    public function DeleteCustomer($id){

        Customers::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Customer Was Deleted Succesfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
      }//End Method


////////////////////////////////////////////* End Customers All Method *///////////////////////////////////////////////////////////

}
