<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Exceptions\NotFoundException;
use App\Http\Resources\EventResource;

class EventsController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return EventResource::collection($events);
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_title' => 'required|string',
            'event_desc' => 'required|string',
            'event_code' => 'required|string|unique:events',
            'store_id' => 'required|integer',
            'event_status' => 'required|boolean',
        ]);

        $event = Event::create($request->all());
        return new EventResource($event);
    }

    public function show($id)
    {
        $event = Event::find($id);
        if (!$event) {
            throw new NotFoundException('Event not found');
        }
        return new EventResource($event);
    }

    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        if (!$event) {
            throw new NotFoundException('Event not found');
        }

        $request->validate([
            'event_title' => 'required|string',
            'event_desc' => 'required|string',
            'event_code' => 'required|string|unique:events,event_code,' . $id,
            'store_id' => 'required|integer',
            'event_status' => 'required|boolean',
        ]);

        $event->update($request->all());
        return new EventResource($event);
    }

    public function destroy($id)
    {
        $event = Event::find($id);
        if (!$event) {
            throw new NotFoundException('Event not found');
        }

        $event->delete();
        return response()->json(['message' => 'Event deleted successfully'], 204);
    }
}
