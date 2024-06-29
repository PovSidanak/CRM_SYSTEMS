<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Calendar;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Database\Schema\SchemaState;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function Calendar(){

        return view('backend.calendar.calendar');

    } //End Method

    public function AddSchedule(Request $request){

        $request->validate([
            'title'=>'required|max:200',
            'start'=>'required',
            'end'=>'required',
            'description'=>'required',
            'color'=>'required'

        ]);
        Schedule::create([
            'title'=>$request->title,
            'start'=>$request->start,
            'end'=>$request->end,
            'description'=>$request->description,
            'color'=>$request->color
        ]);
        $notification = array(
            'message' => 'Event Created Succesfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.calendars')->with($notification);

    } //End Method

    public function getEvents(){

        $schedules = Schedule::all();

        return response()->json($schedules);

    } //End Method

    public function deleteEvent($id)
    {
        Schedule::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Event Deleted Succesfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }//End Method

    public function update(Request $request, $id)
    {
        $schedule = Schedule::findOrFail($id);

        $schedule->update([
            'start' => Carbon::parse($request->input('start_date'))->setTimezone('UTC'),
            'end' => Carbon::parse($request->input('end_date'))->setTimezone('UTC'),
        ]);

        return response()->json(['message' => 'Event moved successfully']);
    }//End Method

    public function resize(Request $request, $id)
    {
        $schedule = Schedule::findOrFail($id);

        $newEndDate = Carbon::parse($request->input('end_date'))->setTimezone('UTC');
        $schedule->update(['end' => $newEndDate]);

        return response()->json(['message' => 'Event resized successfully.']);
    }//End Method

    public function search(Request $request)
    {
        $searchKeywords = $request->input('title');

        $matchingEvents = Schedule::where('title', 'like', '%' . $searchKeywords . '%')->get();

        return response()->json($matchingEvents);
    }//End Method




}
