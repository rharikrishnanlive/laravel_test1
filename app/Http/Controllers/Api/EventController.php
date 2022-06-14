<?php

namespace App\Http\Controllers\Api;

use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $events = Event::get()->toJson(JSON_PRETTY_PRINT);
      return response($events, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $events = new Event;
      $events->name = $request->name;
      $events->slug = $request->slug;
      $events->save();

      return response()->json([
        "message" => "Event record created"
      ], 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      if (Event::where('id', $id)->exists()) {
        $event = Event::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
        return response($event, 200);
      } else {
        return response()->json([
          "message" => "Event not found"
        ], 404);
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      if (Event::where('id', $id)->exists()) {
        $event = Event::find($id);

        $event->name = is_null($request->name) ? $event->name : $event->name;
        $event->slug = is_null($request->slug) ? $event->slug : $event->slug;
        $event->save();

        return response()->json([
          "message" => "records updated successfully"
        ], 200);
      } else {
        $events = new Event;
        $events->name = $request->name;
        $events->slug = $request->slug;
        $events->save();

        return response()->json([
          "message" => "Event record created"
        ], 201);
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update_only(Request $request, $id)
    {
      if (Event::where('id', $id)->exists()) {
        $event = Event::find($id);

        $event->name = is_null($request->name) ? $event->name : $event->name;
        $event->slug = is_null($request->slug) ? $event->slug : $event->slug;
        $event->save();

        return response()->json([
          "message" => "records updated successfully"
        ], 200);
      } else {
        return response()->json([
          "message" => "Event not found"
        ], 404);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      if(Event::where('id', $id)->exists()) {
        $event = Event::find($id);
        $event->delete();

        return response()->json([
          "message" => "records deleted"
        ], 202);
      } else {
        return response()->json([
          "message" => "Event not found"
        ], 404);
      }
    }

    public function active_events(){
      start_time = date('Y-m-d H:i:s')
      end_time = date('Y-m-d H:i:s')

      $events = Event::whereBetween('created_at', [$start_time, $end_time])
                      ->get()
                      ->toJson(JSON_PRETTY_PRINT);
      return response($events, 200);
    }
}
