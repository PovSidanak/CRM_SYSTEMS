<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ATM;
use App\Models\CallClose;
use App\Models\CallDetail;
use App\Models\Dispatch;
use App\Models\FollowUp;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;

class TicketController extends Controller
{

    ////////////////////* ATM All Method *////////////////////
    public function AllATM(){

        $atms = ATM::latest()->get();
        return view('backend.ticket.atm.all_atm',compact('atms'));

    } //End Method

    public function StoreATM(Request $request){

        $request->validate([
          'name' => 'required|max:200',
          'model' => 'required|max:200',
          'classification' => 'required|max:200',
          'type' => 'required|max:200',
          'category' => 'required|max:200',
          'address' => 'required|max:200',
          'city' => 'required|max:200'
        ]);

        ATM::insert([
          'name' => $request->name,
          'model' => $request->model,
          'classification' => $request->classification,
          'type' => $request->type,
          'category' => $request->category,
          'address' => $request->address,
          'city' => $request->city,
        ]);
        $notification = array(
          'message' => 'ATM Created Succesfully',
          'alert-type' => 'success'
      );

      return redirect()->route('all.atms')->with($notification);

      } //End Method

      public function EditATM($id){

        $atms = ATM::findOrFail($id);
        return view('backend.ticket.atm.edit_atm',compact('atms'));

    }// End MEthod

    public function UpdateATM(Request $request){

        $atmid = $request->id;

        ATM::findOrFail($atmid)->update([
            'name' => $request->name,
            'model' => $request->model,
            'classification' => $request->classification,
            'type' => $request->type,
            'category' => $request->category,
            'address' => $request->address,
            'city' => $request->city,
        ]);
        $notification = array(
          'message' => 'ATM Info Updated Succesfully',
          'alert-type' => 'success'
      );

      return redirect()->route('all.atms')->with($notification);

      } //End Method

      public function DeleteATM($id){

        ATM::findOrFail($id)->delete();

        $notification = array(
            'message' => 'This ATM Was Deleted Succesfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
      }//End Method



    ////////////////////* Ticket All Method *////////////////////
    public function AllTicket(){

        $tickets = Ticket::latest()->get();
        $atms = ATM::all();
        $users = User::all();

        $combine_array = [];

        foreach ($tickets as $ticket) {
            # code...
            $ticket["name_user"] = "";
            $ticket["name_service"] = "";
            foreach ($users as $user) {
                # code...
                if($ticket["users_id"] == $user["id"]){
                    $ticket["name_user"] = $user["name"];
                }
            }
            foreach ($atms as $atm) {
                # code...
                if($ticket["a_t_m_s_id"] == $atm["id"]){
                    $ticket["name_atm"] = $atm["name"];
                }
            }
            array_push($combine_array, $ticket);

        }

        return view('backend.ticket.allticket.all_ticket',compact('combine_array','atms','users'));

    } //End Method

    public function StoreTicket(Request $request){

        $request->validate([
          'a_t_m_s_id' => 'required',
          'source'=>'required',
          'phone'=>'required',
          'call_type'=>'required',
          'call_date'=>'required',
          'status' => 'required',
          'address'=>'required',
          'city'=>'required',
          'sub_call_type'=>'required',
          'diagnoise'=>'required',
          'vendor'=>'required',
          'users_id'=>'required',
        ]);

        Ticket::create([
          'a_t_m_s_id' => $request->a_t_m_s_id,
          'source' => $request->source,
          'phone' => $request->phone,
          'call_type' => $request->call_type,
          'call_date' => $request->call_date,
          'status' => $request->status,
          'address' => $request->address,
          'city' => $request->city,
          'sub_call_type' => $request->sub_call_type,
          'diagnoise' => $request->diagnoise,
          'vendor' => $request->vendor,
          'users_id' => $request->users_id,
        ]);
        $notification = array(
          'message' => 'Ticket Was Created Succesfully',
          'alert-type' => 'success'
      );

      return redirect()->route('all.tickets')->with($notification);

      } //End Method

      public function EditTicket($id){

        $tickets = Ticket::findOrFail($id);
        $atms = ATM::all();
        $users = User::all();

        return view('backend.ticket.allticket.edit_ticket',compact('tickets','atms','users'));

    }// End MEthod

    public function UpdateTicket(Request $request, $id){

        $tickets = Ticket::findOrFail($id);
        $tickets-> a_t_m_s_id =  $request->a_t_m_s_id;
        $tickets-> source =  $request->source;
        $tickets-> phone =  $request->phone;
        $tickets-> call_type =  $request->call_type;
        $tickets-> call_date =  $request->call_date;
        $tickets-> status =  $request->status;
        $tickets-> address =  $request->address;
        $tickets-> city =  $request->city;
        $tickets-> sub_call_type =  $request->sub_call_type;
        $tickets-> diagnoise =  $request->diagnoise;
        $tickets-> vendor =  $request->vendor;
        $tickets-> users_id =  $request->users_id;
        $tickets-> save();

        $notification = array(
            'message' => 'Ticket Updated Succesfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.tickets')->with($notification);

    }//End Method

    public function DeleteTicket($id){

        Ticket::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Ticket Deleted Succesfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
      }//End Method

    ////////////////////* Service Request All Method *////////////////////
    public function AllServiceRequest(){

        $tickets = Ticket::latest()->get();
        $atms = ATM::all();
        $users = User::all();

        $combine_array = [];

        foreach ($tickets as $ticket) {
            # code...
            $ticket["name_user"] = "";
            $ticket["name_service"] = "";
            foreach ($users as $user) {
                # code...
                if($ticket["users_id"] == $user["id"]){
                    $ticket["name_user"] = $user["name"];
                }
            }
            foreach ($atms as $atm) {
                # code...
                if($ticket["a_t_m_s_id"] == $atm["id"]){
                    $ticket["name_atm"] = $atm["name"];
                }
            }
            array_push($combine_array, $ticket);

        }

        return view('backend.ticket.service_request.service_request',compact('combine_array','atms','users'));

    } //End Method

    ////////////////////* Call Detail All Method *////////////////////
    public function AllCallDetail(){

        $calldetails = CallDetail::latest()->get();
        $tickets = Ticket::all();
        $users = User::all();

        $combine_array = [];

        foreach ($calldetails as $calldetail) {
            # code...
            $calldetail["name_ticket"] = "";
            $calldetail["name_user"] = "";
            foreach ($tickets as $ticket) {
                # code...
                if($calldetail["tickets_id"] == $ticket["id"]){
                    $calldetail["name_ticket"] = $ticket["diagnoise"];
                }
            }
            foreach ($users as $user) {
                # code...
                if($calldetail["users_id"] == $user["id"]){
                    $calldetail["name_user"] = $user["name"];
                }
            }

            array_push($combine_array, $calldetail);

        }
        return view('backend.ticket.service_request.call_detail.call_detail',compact('combine_array','tickets','users'));

    } //End Method

    public function StoreCallDetail(Request $request){

        $request->validate([
          'tickets_id' => 'required',
          'docket_no' => 'required',
          'reference_no'=>'required',
          'contact_person'=>'required',
          'contact_no'=>'required',
          'call_type' => 'required',
          'sub_call_type' => 'required',
          'call_date'=>'required',
          'source'=>'required',
          'users_id'=>'required',
          'type'=>'required',
          'vendor' => 'required',
          'status'=>'required',
          'sub_status'=>'required',
          'model'=>'required',
          'location'=>'required',
          'target_resolution_time'=>'required',
          'target_response_time'=>'required',
          'activity'=>'required',
        ]);

        CallDetail::create([
          'tickets_id' => $request->tickets_id,
          'docket_no' => $request->docket_no,
          'reference_no' => $request->reference_no,
          'contact_person' => $request->contact_person,
          'contact_no' => $request->contact_no,
          'call_type' => $request->call_type,
          'sub_call_type' => $request->sub_call_type,
          'call_date' => $request->call_date,
          'source' => $request->source,
          'users_id' => $request->users_id,
          'type' => $request->type,
          'vendor' => $request->vendor,
          'status' => $request->status,
          'sub_status' => $request->sub_status,
          'model' => $request->model,
          'location' => $request->location,
          'target_resolution_time' => $request->target_resolution_time,
          'target_response_time' => $request->target_response_time,
          'activity' => $request->activity,
        ]);
        $notification = array(
          'message' => 'Call Was Created Succesfully',
          'alert-type' => 'success'
      );

      return redirect()->route('all.calldetails')->with($notification);

      } //End Method
      public function DeleteCallDetail($id){

        CallDetail::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Call Deleted Succesfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
      }//End Method

    ////////////////////* End Call Detail All Method *////////////////////
    ////////////////////* Start Follow Up All Method *////////////////////

    public function AllFollowup(){

        $followups = FollowUp::latest()->get();
        $tickets = Ticket::all();
        $users = User::all();

        $combine_array = [];

        foreach ($followups as $followup) {
            # code...
            $followup["name_ticket"] = "";
            $followup["name_user"] = "";
            foreach ($tickets as $ticket) {
                # code...
                if($followup["tickets_id"] == $ticket["id"]){
                    $followup["name_ticket"] = $ticket["diagnoise"];
                }
            }
            foreach ($users as $user) {
                # code...
                if($followup["users_id"] == $user["id"]){
                    $followup["name_user"] = $user["name"];
                }
            }

            array_push($combine_array, $followup);

        }

        return view('backend.ticket.service_request.follow_up.follow_up',compact('combine_array','tickets','users'));

    } //End Method

    public function StoreFollowup(Request $request){

        $request->validate([
          'tickets_id' => 'required',
          'reference_no' => 'required',
          'call_date'=>'required',
          'users_id'=>'required',
          'model'=>'required',
          'location' => 'required',
          'vendor' => 'required',
          'account'=>'required',
          'contact'=>'required',
          'status'=>'required',
          'action_taken'=>'required',
          'next_activity' => 'required',

        ]);

        FollowUp::create([
          'tickets_id' => $request->tickets_id,
          'reference_no' => $request->reference_no,
          'call_date' => $request->call_date,
          'users_id' => $request->users_id,
          'model' => $request->model,
          'location' => $request->location,
          'vendor' => $request->vendor,
          'account' => $request->account,
          'contact' => $request->contact,
          'status' => $request->status,
          'action_taken' => $request->action_taken,
          'next_activity' => $request->next_activity,

        ]);
        $notification = array(
          'message' => 'Follow Up Was Created Succesfully',
          'alert-type' => 'success'
      );

      return redirect()->route('all.followup')->with($notification);

      } //End Method

      public function DeleteFollowup($id){

        FollowUp::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Follow Up Was Deleted Succesfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
      }//End Method

    ////////////////////* End Follow Up All Method *////////////////////
    ////////////////////* Start Dispatch All Method *////////////////////

    public function AllDispatch(){

        $dispatchs = Dispatch::latest()->get();
        $tickets = Ticket::all();
        $users = User::all();

        $combine_array = [];

        foreach ($dispatchs as $dispatch) {
            # code...
            $dispatch["name_ticket"] = "";
            $dispatch["name_user"] = "";
            foreach ($tickets as $ticket) {
                # code...
                if($dispatch["tickets_id"] == $ticket["id"]){
                    $dispatch["name_ticket"] = $ticket["diagnoise"];
                }
            }
            foreach ($users as $user) {
                # code...
                if($dispatch["users_id"] == $user["id"]){
                    $dispatch["name_user"] = $user["name"];
                }
            }

            array_push($combine_array, $dispatch);

        }

        return view('backend.ticket.service_request.dispatch.dispatch',compact('combine_array','tickets','users'));

    } //End Method

    public function StoreDispatch(Request $request){

        $request->validate([
          'tickets_id' => 'required',
          'docket_no' => 'required',
          'call_date'=>'required',
          'bank_docket_no'=>'required',
          'created_date'=>'required',
          'bank_name' => 'required',
          'account' => 'required',
          'call_type'=>'required',
          'source'=>'required',
          'sub_call_type'=>'required',
          'contact' => 'required',
          'diagnoisis'=>'required',
          'sub_status'=>'required',
          'dispatch_date'=>'required',
          'vendor'=>'required',
          'location' => 'required',
          'action_taken' => 'required',

        ]);

        Dispatch::create([
          'tickets_id' => $request->tickets_id,
          'docket_no' => $request->docket_no,
          'call_date' => $request->call_date,
          'bank_docket_no' => $request->bank_docket_no,
          'created_date' => $request->created_date,
          'bank_name' => $request->bank_name,
          'account' => $request->account,
          'call_type' => $request->call_type,
          'source' => $request->source,
          'sub_call_type' => $request->sub_call_type,
          'contact' => $request->contact,
          'diagnoisis' => $request->diagnoisis,
          'sub_status' => $request->sub_status,
          'dispatch_date' => $request->dispatch_date,
          'vendor' => $request->vendor,
          'location' => $request->location,
          'action_taken' => $request->action_taken,

        ]);
        $notification = array(
          'message' => 'Dispatch Was Created Succesfully',
          'alert-type' => 'success'
      );

      return redirect()->route('all.dispatch')->with($notification);

      } //End Method

      public function DeleteDispatch($id){

        Dispatch::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Dispatch Was Deleted Succesfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
      }//End Method

    ////////////////////* End Dispatch All Method *////////////////////
    ////////////////////* Start CallClose All Method *////////////////////


    public function AllCallClose(){

        $callcloses = CallClose::latest()->get();
        $tickets = Ticket::all();
        $users = User::all();

        $combine_array = [];

        foreach ($callcloses as $callclose) {
            # code...
            $callclose["name_ticket"] = "";
            $callclose["name_user"] = "";
            foreach ($tickets as $ticket) {
                # code...
                if($callclose["tickets_id"] == $ticket["id"]){
                    $callclose["name_ticket"] = $ticket["diagnoise"];
                }
            }
            foreach ($users as $user) {
                # code...
                if($callclose["users_id"] == $user["id"]){
                    $callclose["name_user"] = $user["name"];
                }
            }

            array_push($combine_array, $callclose);

        }
        return view('backend.ticket.service_request.call_close.call_close',compact('combine_array','tickets','users'));

    } //End Method

    public function StoreCallClose(Request $request){

        $request->validate([
          'tickets_id' => 'required',
          'reference_no' => 'required',
          'create_date'=>'required',
          'call_date'=>'required',
          'account'=>'required',
          'model' => 'required',
          'contact' => 'required',
          'vendor'=>'required',
          'max_re_allo_date'=>'required',
          'diagnoisis'=>'required',
          'service_code' => 'required',
          'remark'=>'required',
          'report_no'=>'required',
          'activity_type'=>'required',
          'actual_start_date'=>'required',
          'repaire_start_date' => 'required',
          'arrival_date' => 'required',
          'actual_comp_date'=>'required',
          'repair_hour' => 'required',
          'part_wait_hour' => 'required',
          'wait_hour'=>'required',
          'travel_hour' => 'required',
          'action_taken' => 'required',
          'status'=>'required',
          'sub_status' => 'required',
          'next_activity' => 'required',

        ]);

        CallClose::create([
          'tickets_id' => $request->tickets_id,
          'reference_no' => $request->reference_no,
          'create_date' => $request->create_date,
          'call_date' => $request->call_date,
          'account' => $request->account,
          'model' => $request->model,
          'contact' => $request->contact,
          'vendor' => $request->vendor,
          'max_re_allo_date' => $request->max_re_allo_date,
          'diagnoisis' => $request->diagnoisis,
          'service_code' => $request->service_code,
          'remark' => $request->remark,
          'report_no' => $request->report_no,
          'activity_type' => $request->activity_type,
          'actual_start_date' => $request->actual_start_date,
          'repaire_start_date' => $request->repaire_start_date,
          'arrival_date' => $request->arrival_date,
          'actual_comp_date' => $request->actual_comp_date,
          'repair_hour' => $request->repair_hour,
          'part_wait_hour' => $request->part_wait_hour,
          'wait_hour' => $request->wait_hour,
          'travel_hour' => $request->travel_hour,
          'action_taken' => $request->action_taken,
          'status' => $request->status,
          'sub_status' => $request->sub_status,
          'next_activity' => $request->next_activity,

        ]);
        $notification = array(
          'message' => 'Call Close Was Created Succesfully',
          'alert-type' => 'success'
      );

      return redirect()->route('all.callclose')->with($notification);

      } //End Method

    ////////////////////* End CallClose All Method *////////////////////



}
