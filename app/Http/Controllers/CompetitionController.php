<?php

namespace App\Http\Controllers;

use App\Competition;
use Illuminate\Http\Request;
use App\Event_scope;
use App\Http\Requests\CompetitionRequest;
use App\Prize;
use Illuminate\Support\Facades\Auth;

class CompetitionController extends Controller
{
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
        Competition::create([
            'competition_name' => $request->competition_name,
            'event_scope_id' => $request->competition_scope,
            'prize_id' => $request->competition_prize,
            'user_id' => $request->user_id
        ]);

        return redirect('events')->with('competition_created','Your Achievement is Successfully Listed');
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
    public function destroy(Competition $competition)
    {
        //
    }
}
