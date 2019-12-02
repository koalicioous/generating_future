<?php

namespace App\Http\Controllers;

use App\Competition;
use Illuminate\Http\Request;
use App\Event_scope;
use App\Http\Requests\CompetitionRequest;
use App\Prize;
use Illuminate\Support\Facades\Auth;
use App\User;

class CompetitionController extends Controller
{
    private $competition_point;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $scopes = \App\Event_scope::all();
        $prizes = \App\Prize::all();
        return view('competition.create',compact('scopes','prizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompetitionRequest $request)
    {

        $this->sumScore($request->competition_scope,$request->competition_prize);

        User::where('id',Auth::id())
        ->update([
            'point' => Auth::user()->point += $this->competition_point
        ]);

        Competition::create([
            'competition_name' => $request->competition_name,
            'event_scope_id' => $request->competition_scope,
            'prize_id' => $request->competition_prize,
            'user_id' => $request->user_id,
            'competition_point' => $this->competition_point
        ]);

        return redirect('events')->with('competition_created','Your Achievement is Successfully Listed and you gain ' . $this->competition_point . ' points'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function show(Competition $competition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function edit(Competition $competition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Competition $competition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->subScore($id);

        User::where('id',Auth::id())
        ->update([
            'point' => Auth::user()->point -= $this->competition_point
        ]);

        $target = \App\Competition::where('competition_id',$id);
        $target->delete();

        return redirect('/events')->with('competition_deleted','Your competition prize is Succesfully deleted! and you loose ' . $this->competition_point . ' points');

    }

    public function sumScore($scope_id,$prize_id)
    {
        $this->competition_point = 0;

        $event_scope_score = \App\Event_scope::where('event_scope_id',$scope_id)->first();
        $competition_prize_score = \App\Prize::where('prize_id',$prize_id)->first();

        $this->competition_point = $event_scope_score->point + $competition_prize_score->score;
        
    }

    public function subScore($id)
    {
        $this->event_point = 0;
        $target = \App\Competition::where('competition_id',$id)->first();

        $this->competition_point = $target->competition_point;
    }

}
