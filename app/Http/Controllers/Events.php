<?php

namespace App\Http\Controllers;

use App\Models\Events as ModelsEvents;
use App\Models\EventUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class Events extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('event', 'events', 'registerUser', 'aboutus', 'contacts');
    }

    public function add(Request $request)
    {

        $item = $request->validate([
            'title' => 'string',
            'description' => 'string',
            'start_date' => 'date',
        ]);

        if ($request->image) {
            $path = $request->file('image')->store('public/images');
            $fileName = str_replace('public', '', $path);
            $item = array_merge($item, ['image' => $fileName]);
        }

        $item = array_merge($item, ['user_id' => Auth::id()]);

        ModelsEvents::create($item);

        return redirect('/');
    }

    public function delete($id)
    {
        $event = ModelsEvents::find($id);

        if (!$event->id == Auth::id()) {
            abort(403);
        }

        File::delete(storage_path('app/public' . $event->image));

        $event->delete();

        return redirect('/');
    }

    public function update(Request $request, $id)
    {

        $event = ModelsEvents::find($id);

        if (!$event->id == Auth::id()) {
            return abort(403);
        }

        $item = $request->validate([
            'title' => 'string',
            'description' => 'string',
            'start_date' => 'date',
        ]);

        if ($request->image) {
            File::delete(storage_path('app/public' . $event->image));

            $path = $request->file('image')->store('public/images');
            $fileName = str_replace('public', '', $path);
            $item = array_merge($item, ['image' => $fileName]);
            $event->image = $item['image'];
        }

        $event->title = $item['title'];
        $event->description = $item['description'];
        $event->start_date = $item['start_date'];

        $event->save();

        return redirect('/event/' . $event->id);
    }

    public function showadd()
    {
        return view('add');
    }

    public function showupdate($id)
    {
        $event = ModelsEvents::find($id);

        return view('update', ['event' => $event]);
    }

    public function events()
    {
        $events = ModelsEvents::all();

        return view('events', ['events' => $events]);
    }

    public function event($id)
    {
        $event = ModelsEvents::find($id);
        $can = 0;

        if ($event->id == Auth::id()) {
            $can = 1;
        }

        return view('event', ['event' => $event, 'can' => $can]);
    }

    public function registerUser(Request $request)
    {
        $item = $request->validate([
            'events_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);

        EventUsers::create($item);

        return redirect()->back();
    }

    public function aboutus()
    {
        return view('aboutus');
    }

    public function contacts()
    {
        return view('contacts');
    }
}
