<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PropertyType;
use App\Models\Amenities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class PropertyTypeController extends Controller
{
    public function AllType(){

        $types = PropertyType::latest()->get();
        return view('backend.type.all_type',compact('types'));

    } //End Method

    public function AddType(){

        return view('backend.type.add_type');
    } //End Method

    public function StoreType(Request $request){

      $request->validate([
        'type_name' => 'required|unique:property_types|max:200',
        'type_icon' => 'required'
      ]);

      PropertyType::insert([
        'type_name' => $request->type_name,
        'type_icon' => $request->type_icon,
      ]);
      $notification = array(
        'message' => 'Property Type Created Succesfully',
        'alert-type' => 'success'
    );

    return redirect()->route('all.type')->with($notification);

    } //End Method

    public function EditType($id){

        $types = PropertyType::findOrFail($id);
        return view('backend.type.edit_type',compact('types'));

    }// End MEthod

    public function UpdateType(Request $request){

        $pid = $request->id;

        PropertyType::findOrFail($pid)->update([
          'type_name' => $request->type_name,
          'type_icon' => $request->type_icon,
        ]);
        $notification = array(
          'message' => 'Property Type Updated Succesfully',
          'alert-type' => 'success'
      );

      return redirect()->route('all.type')->with($notification);

      } //End Method

      public function DeleteType($id){

        PropertyType::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Property Type Deleted Succesfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
      }//End Method

      ////////////////////////////////////////////* Amenities All Method *///////////////////////////////////////////////////////////

      public function AllAmenitie(){

        $amenities = Amenities::latest()->get();

        return view('backend.amenitie.all_amenities',compact('amenities'));

      }// End method

      public function AddAmenitie(){

        return view('backend.amenitie.add_amenities');
    } //End Method


    public function StoreAmenitie(Request $request){


        Amenities::insert([
          'amenities_name' => $request->amenities_name,
        ]);

        $notification = array(
          'message' => 'Amenitie Created Succesfully',
          'alert-type' => 'success'
      );

      return redirect()->route('all.amenities')->with($notification);

      } //End Method


    public function EditAmenitie($id){

        $amenities = Amenities::findOrFail($id);
        return view('backend.amenitie.edit_amenitie',compact('amenities'));

    }// End MEthod


    public function UpdateAmenitie(Request $request){

        $ame_id = $request->id;

        Amenities::findOrFail($ame_id)->update([
          'amenities_name' => $request->amenities_name,
        ]);

        $notification = array(
          'message' => 'Amenitie Updated Succesfully',
          'alert-type' => 'success'
      );

      return redirect()->route('all.amenities')->with($notification);

      } //End Method

      public function DeleteAmenitie($id){

        Amenities::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Amenitie Deleted Succesfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

      }//End Method
}
