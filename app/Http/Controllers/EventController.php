<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use DB;

class EventController extends Controller
{

    public function index()
    {
        if(!Auth::check()) {
            return Redirect::to("login")->withSuccess('Ops! You do not have access');
        }

        $user = Auth::user();
        $events = $user->events;

        return view('posts.index', compact('events'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_name'=> 'required',
            'description'=> 'required|max:255',
            'start_date'=> 'required',
            'end_date'=> 'required',
        ]);
        $userID = $request->user()->id;

        $event = new Event([
            'user_id' => $userID,
            'event_name' => $request->get('event_name'),
            'description' => $request->get('description'),
            'start_date' => $request->get('start_date'),
            'end_date' => $request->get('end_date'),
        ]);

        $event->save();

        return redirect('/posts')->with('success', 'Event saved!');
    }

    public function edit($id)
    {
        $event = Event::find($id);
        return view('posts.edit',['event' => $event]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'event_name'=> 'required',
            'description'=> 'required|max:255',
            'start_date'=> 'required',
            'end_date'=> 'required',
        ]);

        $event = Event::find($id);
        $event -> event_name = $request -> get('event_name');
        $event -> description = $request -> get('description');
        $event -> start_date = $request -> get('start_date');
        $event -> end_date = $request -> get('end_date');
        $event -> save();

        return redirect('/posts')->with('success', 'Event update!');

    }

    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();

        return redirect('/posts')->with('success', 'Event deleted!');
    }
}
