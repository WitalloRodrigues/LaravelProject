<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class EventController extends Controller
{
    public function index() {

        $search = request('search');

        if($search) {

            $events = Event::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();

        } else {
            $events = Event::all();
        }        
    
        return view('welcome',['events' => $events, 'search' => $search]);

    }
    public function create(){
        return view("events.create");
    }
    public function store(Request $request){
        $event = new Event;
        $event->title = $request->title;
        $event->date = $request->date;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;
        $event->items = json_encode($request->items);

        //negocio da imagem(complicado pvt)
       //if($request->hasFile('image') && $request->file('image')->isValid()) {

         //   $requestImage = $request->image;

         //  $extension = $requestImage->extension();

           // $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            //$requestImage->move(public_path('img/events'), $imageName);

           /// $event->image = $imageName;

        //}
        $event->save();
        return redirect('/')->with('msg','Evento criado com sucesso!');
    }
    public function show($id){
        $event = Event::findOrFail($id);
        return view('events.show',['event' => $event]);
    }
    public function destroy($id){
        Event::findOrFail($id)->delete();
        return redirect('/')->with('msg','Evento deletado com sucesso!');
    }
    public function edit($id){
        $event = Event::findOrFail($id);
        return view('events.edit',['event' => $event]);
    }
    public function update(Request $request){
        Event::findOrFail($request->id)->update($request->all());
        return redirect('/')->with('msg','Evento editado com sucesso!');
    }
}
