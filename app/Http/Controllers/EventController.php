<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event_scope;
use App\Event_type;
use App\Http\Requests\eventRequest;
use App\Event;
use App\Competition;
use App\User;
use Illuminate\Support\Facades\Auth;


class EventController extends Controller
{

    private $event_point;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $events = \App\Event::where('user_id',Auth::id())->get();
        $scopes = \App\Event_scope::all();
        $types = \App\Event_type::all();
        $competitions = \App\Competition::where('user_id',Auth::id())->get();

        return view('event.index',compact('events','scopes','types','competitions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $scopes = \App\Event_scope::all();
        $types = \App\Event_type::all();


        return view('event.create',compact('scopes','types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(eventRequest $request)
    {
        
        $this->sumScore($request->event_scope);
        
        User::where('id',Auth::id())
        ->update([
            'point' => Auth::user()->point += $this->event_point
        ]);
        
        Event::create([
            'event_name' => $request->event_name,
            'event_desc' => $request->event_desc,
            'event_city' => $request->event_city,
            'event_country' => $request->event_country,
            'event_scope_id' => $request->event_scope,
            'event_type_id' => $request->event_type,
            'start_date' => $request->start_date,
            'finish_date' => $request->finish_date,
            'user_id' => $request->user_id,
            'event_point' => $this->event_point
        ]);

        return redirect('/events')->with('saved','The Event is added to your Experiences and you gain ' . $this->event_point . ' points' ); 
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $scopes = \App\Event_scope::all();
        $types = \App\Event_type::all();
        $target = \App\Event::where('event_id',$id)->first();
        return view('event.edit',compact('target','types','scopes'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(eventRequest $request, $id)
    {
        Event::where('event_id',$id)
        ->update([
            'event_name'    =>  $request->event_name,
            'event_desc'    =>  $request->event_desc,
            'start_date'    =>  $request->start_date,
            'finish_date'   =>  $request->finish_date,
            'event_scope_id'=>  $request->event_scope,
            'event_type_id' =>  $request->event_type,
            'event_country' =>  $request->event_country,
            'event_city'    =>  $request->event_city
        ]);

        return redirect('/events')->with('updated','The change you made is successfully saved!');
    }

    /**
     * Make a Change directly from modal in index Page
     */
    public function updateModal(eventRequest $request, $id){

        Event::where('event_id',$id)
        ->update([
            'event_name'    =>  $request->event_name,
            'event_desc'    =>  $request->event_desc,
            'start_date'    =>  $request->start_date,
            'finish_date'   =>  $request->finish_date,
            'event_scope_id'=>  $request->event_scope,
            'event_type_id' =>  $request->event_type,
            'event_country' =>  $request->event_country,
            'event_city'    =>  $request->event_city
        ]);

        return redirect('/events')->with('updated','The change you made is successfully saved!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $this->subScore($id);

        User::where('id',Auth::id())
        ->update([
            'point' => Auth::user()->point -= $this->event_point
        ]);

        $target = \App\Event::where('event_id',$id);
        $target->delete();

        return redirect('/events')->with('deleted','Your Event is Succesfully deleted! and you loose ' . $this->event_point . ' points'); 
    }

    public function sumScore($id)
    {
        $this->event_point = 0;

        $event_scope_score = \App\Event_scope::where('event_scope_id',$id)->first();
        $this->event_point = $event_scope_score->point;
        
    }

    public function subScore($id)
    {
        $this->event_point = 0;
        $target = \App\Event::where('event_id',$id)->first();

        $this->event_point = $target->event_point;
    }
}
