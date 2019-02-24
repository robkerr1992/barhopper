<?php

namespace App\Http\Controllers;

use App\Venue;
use App\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class VenueController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $venues = Venue::orderBy('venues.beer_rating', 'desc')->get();
        $data = [
            'venues' => $venues
        ];
        return view ('venues.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        if (!Auth::check()) {
//            session()->flash('error', 'You must be logged in to view this page!');
//            return redirect('auth.login');
//        }
        return view('venues.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v = Validator::make($request->all(), Venue::$rules);
        if ($v->fails()) {
            session()->flash('fail', 'Your post was NOT created. Please fix errors.');
            return redirect()->back()->withInput()->withErrors($v);
        }
        $venue = new Venue();
        $venue->name = $request->get('name');
        $venue->address = $request->get('address');
        $venue->phone = $request->get('phone');
        $venue->website = $request->get('website');
        $venue->email = $request->get('email');
        $venue->save();

//TODO: Add features logic
//        $venuefeatures = new Feature();
//        $venuefeatures->venue_id = $venue->id;
//        $venueinput = $request->input('features');
//        $venueinput = explode(',', $barinput);
//
//        foreach($venueinput as $key => $feature){
//            $venuefeatures->$feature = 1;
//        }
//        $venuefeatures->save();
        session()->flash('success', 'Your post was created successfully!');
        return redirect()->action('VenueController@show', $venue->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $venue = Venue::find($id);
        if (!$venue) {
            abort(404);
        }
        $data = [
            'venue' => $venue
        ];
        return view('venues.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        if (!Auth::check()) {
//            return view('auth.login');
//        }
        $venue = Venue::find($id);
        if (!$venue) {
            abort(404);
        }
        $data = [
            'venue' => $venue
        ];
        return view('venues.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $venue = Venue::find($id);
        if (!$venue) {
            abort(404);
        }
        session()->flash('fail', $venue->name . ' was NOT updated. Please fix errors.');
        $v = Validator::make($request->all(), Venue::$rules);
        if ($v->fails()) {
            return redirect()->back()->withInput()->withErrors($v);
        }
        $venue->name = $request->get('name');
        $venue->address = $request->get('address');
        $venue->phone = $request->get('phone');
        $venue->website = $request->get('website');
        $venue->email = $request->get('email');
        $venue->save();
//TODO: Add feature logic
//        $barfeatures = Feature::where('bar_id', '=', $bar->id);
//        $barfeatures->delete();
//        $barfeatures = new Feature();
//        $barfeatures->bar_id = $bar->id;
//        $barinput = $request->input('features');
//        $barinput = explode(',', $barinput);
//
//        foreach($barinput as $key => $feature){
//            $barfeatures->$feature = 1;
//        }
//        $barfeatures->save();
        session()->flash('success', $venue->name . ' was updated successfully!');
        return redirect()->action('VenueController@show', $venue->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $venue = Venue::find($id);
        if (!$venue) {
            abort(404);
        }
        $venue->delete();
        $request->session()->flash('success', $venue->name . ' was deleted successfully!');
        return redirect()->action('VenueController@index');
    }













}
