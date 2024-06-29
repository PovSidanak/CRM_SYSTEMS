<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\SaleReport;
use App\Models\TechnicleReport;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    ////////////////////////////////////////////* Sale Report All Method *///////////////////////////////////////////////////////////

public function AllSaleReport(){

    $salereports = SaleReport::latest()->get();
    $users = User::all();
    $customers = Customers::all();

    $combine_array = [];

    foreach ($salereports as $salereport) {
        # code...
        $salereport["name_user"] = "";
        $salereport["name_customer"] = "";

        foreach ($users as $user) {
            # code...
            if($salereport["users_id"] == $user["id"]){
                $salereport["name_user"] = $user["name"];
            }
        }
        foreach ($customers as $customer) {
            # code...
            if($salereport["customers_id"] == $customer["id"]){
                $salereport["name_customer"] = $customer["name"];
            }
        }

        array_push($combine_array, $salereport);

    }

    return view('backend.report.sale_report.all_salereport',compact('combine_array','users','customers'));

} //End Method


public function StoreSaleReport(Request $request){
    $request->validate([
      'users_id'=>'required',
      'customers_id'=>'required',
      'contact_person'=>'required',
      'project_name'=>'required',
      'date_of_project'=>'required',
      'project_size_budget'=>'required',
      'project_close_date'=>'required',
      'sum_engage_client'=>'required',
      'nos_of_visit'=>'required',
      'nos_of_call'=>'required',
      'note'=>'required',
    ]);

    SaleReport::create([
      'users_id' => $request->users_id,
      'customers_id' => $request->customers_id,
      'contact_person' => $request->contact_person,
      'project_name' => $request->project_name,
      'project_size_budget' => $request->project_size_budget,
      'project_close_date' => $request->project_close_date,
      'date_of_project' => $request->date_of_project,
      'sum_engage_client' => $request->sum_engage_client,
      'nos_of_visit' => $request->nos_of_visit,
      'nos_of_call' => $request->nos_of_call,
      'note' => $request->note

    ]);
    $notification = array(
      'message' => 'Sale Report Created Succesfully',
      'alert-type' => 'success'
  );

  return redirect()->route('all.salereports')->with($notification);

  } //End Method

  public function EditSaleReport($id){

    $salereports = SaleReport::findOrFail($id);
    $customers = Customers::all();
    $users = User::all();

    return view('backend.report.sale_report.edit_salereport',compact('salereports','customers','users'));

}// End MEthod

    ////////////////////////////////////////////* End Sale Report All Method *///////////////////////////////////////////////////////////
    ////////////////////////////////////////////* Start Technicle Report All Method *///////////////////////////////////////////////////////////

    public function AllTechnicleReport(){

    $technicalreports = TechnicleReport::latest()->get();
    $customers = Customers::all();
    $combine_array = [];

    foreach ($technicalreports as $technicalreport) {
        # code...

        $technicalreport["name_customer"] = "";

        foreach ($customers as $customer) {
            # code...
            if($technicalreport["customers_id"] == $customer["id"]){
                $technicalreport["name_customer"] = $customer["name"];
            }
        }
        array_push($combine_array, $technicalreport);

    }

    // dd($combine_array);

        return view('backend.report.technical_report.all_techniclereport',compact('combine_array','customers'));

    } //End Method

    public function StoreTechnicleReport(Request $request){

        $request->validate([
          'customers_id'=>'required',
          'report_name'=>'required',
          'case_date'=>'required',

        ]);

        TechnicleReport::create([
          'customers_id' => $request->customers_id,
          'report_name' => $request->report_name,
          'case_date' => $request->case_date
        ]);
        $notification = array(
          'message' => 'Technical Report Created Succesfully',
          'alert-type' => 'success'
      );

      return redirect()->route('all.techniclereports')->with($notification);

      } //End Method

    public function AllBTI(){

        return view('backend.report.technical_report.BTI_request');

    } //End Method

    public function AllPM(){

        return view('backend.report.technical_report.PM_request');

    } //End Method

    public function DrewcustomerBTI(){

        return view('backend.report.technical_report.drewCustomerBTI');

    } //End Method
    public function DrewTechnicalBTI(){

        return view('backend.report.technical_report.drewTechnicalBTI');

    } //End Method
    public function DrewcustomerPM(){

        return view('backend.report.technical_report.drewcustomerPM');

    } //End Method
    public function DrewTechnicalPM(){

        return view('backend.report.technical_report.drewTechnicalPM');

    } //End Method



}
