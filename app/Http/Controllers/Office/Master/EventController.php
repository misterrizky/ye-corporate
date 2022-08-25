<?php

namespace App\Http\Controllers\Office\Master;

use Carbon\Carbon;
use App\Models\Master\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            return view('pages.office.master.event.main');
        }
        return view('pages.office.theme');
    }
    public function create()
    {
        return view('pages.office.master.event.input',['data' => new Event]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required',
                'start' => 'required',
                'end' => 'required',
                'description' => 'required',
                'type' => 'required',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 401);
        }

        $event = new Event();
        $event->employee_id = Auth::guard('employees')->user()->id;
        $event->name = $request->title;
        $event->start_at = Carbon::createFromFormat('D M d Y H:i:s e+', $request->start);
        $event->end_at = Carbon::createFromFormat('D M d Y H:i:s e+', $request->end);
        $event->description = $request->description;
        $event->type = $request->type;
        $event->url = $request->url;
        $event->save();

        return response()->json([
            'alert' => 'success',
            'message' => 'Event created!',
        ], 200);
    }
    public function show($id)
    {
        if(!Event::find($id)){
            return response()->json([
                'alert' => 'success',
                'message' => 'Event not found!',
            ], 200);
        }
        // return Event::findOrFail($event->id);
    }
    public function edit(Event $event)
    {
        //
    }
    public function update(Request $request, Event $event)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'start' => 'required',
                'end' => 'required',
            ]
        );
        if ($validator->fails()){
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 401);
        }
        $event->employee_id = Auth::guard('employees')->user()->id;
        $event->start_at = Carbon::createFromFormat('D M d Y H:i:s e+', $request->start);
        $event->end_at = Carbon::createFromFormat('D M d Y H:i:s e+', $request->end);
        $event->update();

        return response()->json([
            'alert' => 'success',
            'message' => 'Event updated!',
        ], 200);
    }
    public function destroy(Event $event)
    {
        $event->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Event deleted!',
        ], 200);
    }
    public function list(Request $request)
    {
        $collection = Event::get();
        $collection = $collection->map(function ($item) {
            if($item->type == "Celebration")
            {
                $color = "purple";
            }elseif($item->type == "Holiday")
            {
                $color = "green";
            }elseif($item->type == "Meeting")
            {
                $color = "";
            }elseif($item->type == "National")
            {
                $color = "red";
            }
            return [
                'id' => $item->id,
                'title' => $item->name,
                'start' => Carbon::parse($item->start_at)->format('Y-m-d H:i:s'),
                'end' => Carbon::parse($item->end_at)->format('Y-m-d H:i:s'),
                'description' => $item->description,
                'url' => $item->url ?? '',
                'color' => $color,
            ];
        });
        return view('pages.office.master.event.list',compact('collection'));
    }
}
